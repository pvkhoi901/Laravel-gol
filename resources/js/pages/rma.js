$('body').on('change','#id_code_explain', function(e){
    let val = $(this).val();

    if (val == 24) {
        $("#note_defect_req").prop('disabled', false);
    } else {
        $("#note_defect_req").prop('disabled', true).val('');
    }
});

$('#modal-note').modal('show');

$('#create_label_submit').on('click', function () {
    $(this).prop('disabled', true);
    $.ajax({
        method: 'post',
        url: config.routes_create_label,
        data: $('#create_labels form').serialize(),
        success: function (data) {
            if (data.error == 1) {
                alertMsg('error', data.msg, 'Warning');
                return;
            } else {
                window.location.reload(false);
            }
        },
        error: function(response) {
            $('.form-group').removeClass('has-error');
            $('.help-block').html('');
            var errors = response.responseJSON.errors;
            $.each(errors, function (error, message) {
                var parent = $('#' + error).parents('.form-group-custom');
                parent.addClass('has-error');
                parent.find('.help-block').html(message);
            });
            $('#create_label_submit').prop('disabled', false);
        },
    });
});

$(document).on('click', '#delete_label', function () {
    let id = $(this).data('id');
    $.ajax({
        method: 'post',
        url: config.routes_delete_label,
        data: {
            id: id,
        },
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        success: function (data) {
            if (data.error == 1) {
                alertMsg('error', data.msg, 'Warning');
            } else {
                Swal.fire({
                    title: 'Delete Label Success',
                    type: 'success',
                }).then((result) => {
                    if (result.value) {
                        window.location.reload(false);
                    }
                });
            }
        },
    });
});

$(document).on('click', '.add_tracking', function () {
    let id = $(this).data('id');
    let number_labels = $(this).data('number-labels');
    $.ajax({
        method: 'post',
        url: config.routes_modal_tracking,
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {
            id: id,
            number_labels: number_labels,
            rma: '{{ $rma->id }}'
        },
        success: function (data) {
            $("#form_add_tracking").html(data.res);
        },
    });
});

$(document).on('click', '#add_note_btn', function () {
    var ticketAgentId = $(this).data('ticket-agent-id');
    $.ajax({
        method: 'post',
        url: config.routes_add_note_ticket,
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {
            ticket_agent_id: ticketAgentId,
            note: $('#add_note').val(),
            user_id: config.auth_id,
        },
        success: function (data) {
            if (data.error == 1) {
                alertMsg('error', data.msg, 'Warning');
                return;
            } else {
                const swalWithBootstrapButtons = Swal.mixin({
                    customClass: {
                        confirmButton: 'btn btn-success',
                        cancelButton: 'btn btn-danger'
                    },
                    buttonsStyling: true,
                });
                swalWithBootstrapButtons.fire(
                    data.msg,
                    'Add note success',
                    'success',
                ).then(() => {
                    $.ajax({
                        method: 'get',
                        url: config.routes_get_ticket_agent,
                        data: {
                            ticket_agent_id: ticketAgentId,
                        },
                        success: function (data) {
                            if (data.error == 1) {
                                alertMsg('error', data.msg, 'WARNING');
                            } else {
                                $('#rma-note-list').html(data.rmaNote).attr('data-ticket-agent-id', data.ticket_agent_id);
                            }
                        }
                    });
                });
            }
        }
    });
})

localStorage.removeItem('bad-phone');

var esnInLocal = localStorage.getItem('bad-phone');
var esnBad = esnInLocal ? JSON.parse(esnInLocal) : [];
var itemBad = [
    "id",
    "dec",
    "hex",
    "model_name",
    "sale_order",
    "shipped_date",
    "status",
];

$('body').on('click','#add_bad_phone_form', function(){
    var badPhoneValForm = {};
    let data_form = $('#add_bad_phone #form_add_item').serializeArray();

    $.each(data_form, function () {
        badPhoneValForm[this.name] = this.value;
    });
    let esn = badPhoneValForm.esn;

    var hasDuplicateEsn = false;
    $.each(esnBad, function(key, value) {
        if (esn === value.dec || esn === value.hex) {
            hasDuplicateEsn = true;
            return;
        }
    });

    if (hasDuplicateEsn == true) {
        $("#mess_warning").text("Warning: The ESN Duplicate.").css('display', 'block');
        return;
    }



    if (esn.length == 0) {
        $("#mess_warning").text("Warning: The ESN is required.").css('display', 'block');
        return;
    }

    $.ajax({
        method: 'get',
        url: config.routes_add_single_bad_phone,
        data: {
            esn: esn,
            master_agent: config.agent_id,
        },
        success: function (data) {
            if (data.error == 1) {
                $("#mess_warning").text("Warning: " +data.msg).css('display', 'block');
            } else {
                $.each(itemBad, function(key, value) {
                    badPhoneValForm[value] = data.res[0][value];
                });

                $("#mess_warning").css('display', 'none');

                esnBad = [...esnBad, badPhoneValForm];

                localStorage.setItem('bad-phone', JSON.stringify(esnBad));

                $('#bad_phone_list tbody').empty();

                esnBad?.map((item, index) => renderRow(item, index));
            }
        },
    });
});

$("#add_bad_phone_submit").click(function (e) {
    e.preventDefault();
    if (esnBad == '') {
        swal.fire('Error', 'List Bad Phone is empty!', 'error');
        return;
    }
    let list_bad_phone = JSON.stringify(esnBad);
    let ticket_agent = $('.agent_ticket.active').data('id');
    let ticket_rma = config.rma_id;

    $.ajax({
        type: "POST",
        url: config.routes_submit_bad_phone_form,
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {
            bad_phone: list_bad_phone,
            ticket_agent: ticket_agent,
            ticket_rma: ticket_rma
        },
        success: function () {
            localStorage.removeItem("bad-phone");
            window.location.reload();
        },
        error: function () {
            swal.fire('Error', 'An error occurred', 'error');
        }
    });
});

function renderRow(item, index) {
    $('#bad_phone_list tbody').prepend(`
        <tr>
            <td>
                ${item?.dec}
            </td>
            <td>
                ${item?.hex}
            </td>
            <td>
                ${item?.model_name}
            </td>
            <td>
                ${item?.sale_order}
            </td>
            <td>
                ${item?.shipped_date}
            </td>
            <td>
                Bad
            </td>
            <td>
                ${getDefectNote(item?.id_code_explain, item?.note_defect_req)}
            </td>
            <td>
                <button class="btn btn-success">Using</button>
            </td>
            <td>
                <button class="btn btn-danger">Inactive</button>
            </td>
        </tr>
    `);}

function getDefectNote(idCodeExplain, noteDefectOther) {
    var defectNote = '';
    $.ajax({
        type: "get",
        url: config.routes_get_defect_note,
        async: false,
        data: {
            id: idCodeExplain,
            note_other : noteDefectOther
        },
        success: function (res) {
            defectNote = res.res
        },
    });
    return defectNote;
}

$('#add_bad_phone').on('hidden.bs.modal', function () {
    localStorage.removeItem('bad-phone');
    $(this).find('form')[0].reset();
    $('#bad_phone_list tbody').empty();
    $("#mess_warning").css('display', 'none');
});

$('#add_aging_phone').on('hidden.bs.modal', function () {
    $(this).find('form')[0].reset();
    $('#aging_phone_list tbody').empty();
    $("#mess_warning_aging").css('display', 'none');
});

var oTable = $('#esn_ticket_table').DataTable({
    processing: true,
    serverSide: true,
    lengthChange: false,
    searching: false,
    ordering: false,
    paging: false,
    info: false,
    ajax: {
        url: config.routes_filter_labels_ticket,
        data: function(d) {
            d.agent_ticket = $('.agent_ticket.active').data('id');
        }
    },
    columns: [
        {
            render: (data, type, row) => row.id
        },
        {
            render: (data, type, row) => row.dec
        },
        {
            render: (data, type, row) => `${row.model_name}`
        },
        {
            render: (data, type, row) => {
                return '<a href="#" target="_blank">' + row.box_name +'</a>';
            }
        },
        {
            render: (data, type, row) => {
                return '<a href="#" target="_blank">' + row.sale_order +'</a>';
            }
        },
        {
            render: (data, type, row) => `${row.defect_reason}`
        },
        {
            render: (data, type, row) => {
                return '<span style="color: red">' + row.remaining_day_esn +'</span>';
            }
        },
        // {
        //     render: (data, type, row) => {
        //         return row.is_active ? '<span class="label label-success">ACTIVE</span>' : '<span class="label label-danger">INACTIVE</span>';
        //     }
        // },
        {
            render: (data, type, row) => {
                const CLASS_STATUS = {
                    ESN_RMA_NEW: {status: 1, class: 'primary'},
                    ESN_RMA_CREDITED: {status: 2, class: 'warning'},
                    ESN_RMA_RETURNED: {status: 3, class: 'success'},
                    ESN_RMA_CHARGE_BACK: {status: 4, class: 'danger'},
                }
                switch (row.status_rma) {
                    case CLASS_STATUS.ESN_RMA_NEW.status:
                        return `<span class="label label-${CLASS_STATUS.ESN_RMA_NEW.class}">New</span>`
                    case CLASS_STATUS.ESN_RMA_CREDITED.status:
                        return `<span class="label label-${CLASS_STATUS.ESN_RMA_CREDITED.class}">Credited</span>`
                    case CLASS_STATUS.ESN_RMA_RETURNED.status:
                        return `<span class="label label-${CLASS_STATUS.ESN_RMA_RETURNED.class}">Returned</span>`
                    case CLASS_STATUS.ESN_RMA_CHARGE_BACK.status:
                        return `<span class="label label-${CLASS_STATUS.ESN_RMA_CHARGE_BACK.class}">Charge Back</span>`
                }
            }
        },
    ]
});

$(".custom-file-input").on("change", function() {
    var fileName = $(this).val().split("\\").pop();
    $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
});

$('.agent_ticket').on('click', function(e) {
    let ticket_agent_id = $(this).data('id');
    $('.agent_ticket').removeClass('active');
    $(this).addClass('active');
    oTable.draw();

    $.ajax({
        method: 'get',
        url: config.routes_get_ticket_agent,
        data: {
            ticket_agent_id: ticket_agent_id,
        },
        success: function (res) {
            $('#rma-device-list').html(res.rmaDevice);
            $('#rma-note-list').html(res.rmaNote).attr('data-ticket-agent-id', res.ticket_agent_id);
        }
    });

    e.preventDefault();
});

$("#upload_file_csv").click(function () {
    let fileBadPhone = $("#input_up_csv").prop('files')[0];
    Papa.parse(fileBadPhone, {
        download:true,
        header:true,
        skipEmptyLines: 'greedy',
        complete: function (results) {
            $.ajax({
                method: 'post',
                url: config.routes_check_file_csv_bad,
                data: {
                    fileCsvBad: JSON.stringify(results.data),
                    master_agent: config.agent_id,
                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function (data) {
                    if (data.error == 1) {
                        $("#mess_warning").text("Warning: " +data.msg).css('display', 'block');
                    } else {
                        $("#mess_warning").css('display', 'none');
                    }
                    localStorage.removeItem("bad-phone");
                    esnBad = [];
                    $.each(data.res, function( index, value ) {
                        esnBad = [...esnBad, value];
                    });
                    localStorage.setItem('bad-phone', JSON.stringify(esnBad));
                    $('#bad_phone_list tbody').empty();
                    esnBad?.map((item) => renderRow(item));
                },
            });
        }
    });
    $(".custom-file-input-bad").val('');
    $(".custom-file-label-bad").html('Upload CSV File Bad Phone');
});

var key = 0;
var esn_add = [];

$('body').on('click','#add_aging_phone_form', function(){
    let esn = $('#esn_aging').val();

    if (esn.length == 0) {
        $("#mess_warning_aging").text("Warning: The ESN is required.").css('display', 'block');
        return;
    }

    var hasDuplicateEsn = false;
    $.each(esn_add, function(key, value) {
        if (esn === value.dec || esn === value.hex) {
            hasDuplicateEsn = true;
            return;
        }
    });

    if (hasDuplicateEsn == true) {
        $("#mess_warning_aging").text("Warning: The ESN Duplicate").css('display', 'block');
        return;
    }

    $.ajax({
        method: 'get',
        url: config.routes_check_aging_phone_single,
        data: {
            esn: esn,
            master_agent: config.agent_id,
        },
        success: function (rs) {
            if (rs.status === 'success') {
                $("#mess_warning_aging").css('display', 'none');
                renderRowTableAgingList(rs.data);
                esn_add.push({
                    dec: rs.data.dec,
                    hex:  rs.data.hex
                });
            } else {
                $("#mess_warning_aging").text("Warning: " +rs.content).css('display', 'block');
            }
        },
    });
});

function renderRowTableAgingList(item) {
    $('#aging_phone_list tbody').prepend(`
            <tr>
                <td>
                    ${item?.dec}
                <input type="hidden" class="esn_id" value="${item.id}" name="data[${key++}][esn_id]" />
                </td>
                <td>
                    ${item?.hex}
                </td>

                <td>
                    ${item?.model_name}
                </td>
                <td>
                    ${item?.sale_order}
                </td>
                <td>
                    ${item?.shipped_date}
                </td>
                <td>
                    Aging
                </td>
                <td>
                <button class="btn btn-success">Using</button>
                </td>
                <td>
                    <button class="btn btn-danger">Inactive</button>
                </td>
            </tr>
        `);
}

$("#upload_file_csv_aging").click(function () {
    let fileAgingPhone = $("#input_up_csv_aging").prop('files')[0];
    Papa.parse(fileAgingPhone, {
        download:true,
        header:true,
        skipEmptyLines: 'greedy',
        complete: function (results) {
            $.ajax({
                method: 'post',
                url: config.routes_check_aging_phone_csv,
                data: {
                    fileCsvAging: results.data,
                    master_agent: config.agent_id,
                },
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function (data) {
                    if (data.error == 1) {
                        $("#mess_warning_aging").text("Warning: " +data.msg).css('display', 'block');
                    } else {
                        $("#mess_warning_aging").css('display', 'none');
                    }
                    $('#aging_phone_list tbody').empty();
                    data.res?.map((item, index) => renderRowTableAgingList(item, index));
                },
            });
        }
    });
    $(".custom-file-input-aging").val('');
    $(".custom-file-label-aging").html('Upload CSV File Aging Phone');

});

localStorage.removeItem('esn.ids');

$('body').on('change','.input-check', function(){
    var esnLocal = localStorage.getItem('esn.ids');
    var esnLocals = esnLocal ? JSON.parse(esnLocal) : [];
    var value = $(this).data("id");
    if ($(this).is(':checked')){
        esnLocals.push(value);
        localStorage.setItem('esn.ids', JSON.stringify(esnLocals));
    } else {
        var idRemove = esnLocals.indexOf(value);
        if (idRemove != -1) {
            esnLocals.splice(idRemove, 1);
            localStorage.setItem('esn.ids', JSON.stringify(esnLocals));
        }
    }
});

$('.table-esn-aging').on( 'draw.dt', function () {
    $('.input-check').each(function (k, v) {
        let id = $(v).data("id");
        let esnLocalstorage = localStorage.getItem('esn.ids') ? JSON.parse(localStorage.getItem('esn.ids')) : [];
        if (esnLocalstorage.includes(id) ) {
            $(v).prop('checked', true);
        } else {
            $(v).prop('checked', false);
        }
    });
} );

$(".create_ticket").click(function () {
    let ids_esn_local = localStorage.getItem('esn.ids') ? JSON.parse(localStorage.getItem('esn.ids')) : [];
    var id_master_agent = config.id;

    $.ajax({
        method: 'post',
        url: config.route_create_ticket,
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {
            esn_id: ids_esn_local,
            master_agent_id : id_master_agent,
        },
        success: function (data) {
            if (data.error == 1) {
                alertMsg('error', data.msg);
                return;
            } else {
                Swal.fire({
                    title: 'Add Ticket Success',
                    type: 'success',
                    text: "Add Success",
                }).then((result) => {
                    if (result.value) {
                        window.location.href = config.route_return
                    }
                });
            }
        }
    });
});

$(".create_ticket_all").click(function () {
    let id_master_agent = config.id;
    $.ajax({
        method: 'post',
        url: config.route_create_ticket_all,
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {
            master_agent_id : id_master_agent,
        },
        success: function (data) {
            if (data.error == 1) {
                alertMsg('error', data.msg);
                return;
            } else {
                Swal.fire({
                    title: 'Add Ticket Success',
                    type: 'Success',
                    text: "Add Success",
                }).then((result) => {
                    if (result.value) {
                        window.location.href = config.route_return
                    }
                });
            }
        }
    });
});
