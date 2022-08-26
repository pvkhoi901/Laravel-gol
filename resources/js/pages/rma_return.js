$('#button_upload_return').click(function(){
    $('#upload_csv_return').trigger('click');
});

var key = 0;
var esn = [];

$('#esn').keyup(function(e) {

    if (e.keyCode === 13) {
        var decOrHex = $('#esn').val();

        var hasDuplicateEsn = false;
        $.each(esn, function(key, value) {
            if (decOrHex === value.dec || decOrHex === value.hex) {
                hasDuplicateEsn = true;
                return;
            }
        });

        if (hasDuplicateEsn == true) {
            return Swal.fire('Warning', 'Duplicate ESN found!', 'error');
        }

        $.ajax({
            url: config.routes_get_esn_input,
            data: {
                decOrHex: decOrHex
            },
            dataType: "json",
            success: function(rs) {
                if (rs.status === 'success') {
                    if (rs.content == 'Esn Duplicate') {
                        $('#check_esn_duplicate').modal();
                        $("#form_check_esn_duplicate").html(rs.data);
                    } else {
                        $('#list_esn_return tbody').prepend(renderRowTable(rs.data, key));
                        esn.push({
                            dec: rs.data.dec,
                            hex:  rs.data.hex
                        });
                        key += 1;
                    }
                } else {
                    Swal.fire('Warning', rs.content, 'error');
                }
            }
        });
    }
});

function renderRowTable(item, key) {

    return `
        <tr>
            <td>
                ${item.id}
                <input type="hidden" class="esn_id" value="${item.id}" name="data[${key}][esn_id]" />
                <input type="hidden" class="status_return" value="${item.status_return}" name="data[${key}][status_rma]" />
            </td>
            <td>
                ${item?.dec}
            </td>
            <td>
                ${item?.hex}
            </td>
            <td>
                 ${item?.uccid_sim || ''}
            </td>
            <td>
                ${item?.model_name}
            </td>
            <td>
                ${item?.sale_order}
            </td>
            <td>
                ${item?.defect_reason}
            </td>
            <td>
                ${item?.defect_note_custom || ''}
            </td>
            <td>
                ${item?.shipped_date}
            </td>
            <td>
                <span class="btn ${item?.is_active  ? 'btn-success' : 'btn-danger'}">${item?.is_active  ? 'ACTIVE' : 'INACTIVE'}</span>
            </td>
            <td>
                <span class="btn btn-success">${item?.status_return == 2 ? 'CREDIT' : 'RETURNED'}</span>
            </td>
            <td>
                <a href="javascript:void(0)" data-id="${item.id}" class="btn btn-flat btn-danger delete_rma_esn_return"><i class="fa fa-trash"></i></a>
            </td>
        </tr>
    `;
}

$('body').on('click','.delete_rma_esn_return', function(){
    $(this).parent().parent().remove();
});


$("#upload_csv_return").change(function () {
    let fileReturnRma = $(this).prop('files')[0];
    Papa.parse(fileReturnRma, {
        download:true,
        header:true,
        skipEmptyLines: 'greedy',
        complete: function (results) {
            $.ajax({
                method: 'post',
                url: config.routes_check_csv_return,
                data: {
                    fileCsvReturn: results.data.map(function (item) {
                        return item.ESN;
                    }),
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
                    $('#list_esn_return tbody').empty();

                    data.res.map(function (item) {
                        $('#list_esn_return tbody').prepend(renderRowTable(item, key));
                        key += 1;
                    })
                },
            });
        }
    });
});

$('#table_esn_return_today').DataTable({
    dom: 'Bfrtip',
    processing: true,
    searching: true,
    buttons: []
});

$('body').on('click','.add_esn_return', function(){
    $('#check_esn_duplicate').modal('hide');
    $('#esn').val('');
    let data = {
        id: $(this).data('id'),
        dec: $(this).data('dec'),
        hex: $(this).data('hex'),
        uccid: $(this).data('uccid'),
        sale_order: $(this).data('sale_order'),
        model_name: $(this).data('model_name'),
        defect_reason: $(this).data('defect_reason'),
        status_return: $(this).data('status_return'),
    };

    var hasDuplicateEsn = false;

    $.each(esn, function(key, value) {
        if (dec === value.dec || hex === value.hex) {
            hasDuplicateEsn = true;
            return;
        }
    });

    if (hasDuplicateEsn == true) {
        return Swal.fire('Warning', 'Duplicate ESN found!', 'error');
    }

    $('#list_esn_return tbody').prepend(renderRowTable(data, key));
    esn.push({
        dec: data.dec,
        hex:  data.hex
    });
    key += 1;
});
