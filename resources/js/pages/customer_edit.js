$(document).ready(function () {
 
    $(document).on('click', '.add_new_note_type', function () {
        try {
            saveNotType()
        } catch (e) {
            alert('.saveNotType : ' + e.message);
        }
    });

    $(document).on('click', '.btn_add_note_customer', function () {
        try {
            saveCustomerNote()
        } catch (e) {
            alert('.btn_add_note_customer : ' + e.message);
        }
    });

    $(document).on('change', '#note_type_id', function () {
        try {
            var note_type_id = $(this).val();
            if (note_type_id != "") {
                noteTypeDetail(note_type_id)
            }
        } catch (e) {
            alert('.saveNotType : ' + e.message);
        }
    });

    $('#customer_note_data_table').on('click', 'tbody tr .view_detail_note', function () {
        var customer_note_id = $(this).attr("customer_note_id");
        customerNoteTypeDetail(customer_note_id);
    });
 
});


function noteTypeDetail(note_type_id) {
    try {
        var url = "/system/note_type/get_detail"
        var data = {};
        data.note_type_id = note_type_id;
        axios
            .post(url, data, {

            })
            .then(function (res) {
                console.log(res.data)
                if (res.data.status == 200) {
                    $("#customer_notes").val(res.data.data_notes['notes']);
                    $("#note_type_id").val(note_type_id);
                } else {
                    Swal.fire({
                        icon: "error",
                        title: "Oops...",
                        text: "Something went wrong!",
                    });
                }
            })
            .catch(function (error) {
                console.log(error);
                Swal.fire({
                    icon: "error",
                    title: "Oops...",
                    text: "Something went wrong!",
                });
            });
        return;
    } catch (e) {
        alert('#noteTypeDetail ' + e.message);
    }
}


function customerNoteTypeDetail(customer_note_id) {
    try {
        var url = "/customers/customer_profile/get_detail_customer_note_type"
        var data = {};
        data.customer_note_id = customer_note_id;
        axios
            .post(url, data, {

            })
            .then(function (res) {
                $(".modal_content_detail").html(res.data);

                $("#priority_type").select2();
                $(".modal_customer_detail").modal("show")
            })
            .catch(function (error) {
                console.log(error);
                Swal.fire({
                    icon: "error",
                    title: "Oops...",
                    text: "Something went wrong!",
                });
            });
        return;
    } catch (e) {
        alert('#noteTypeDetail ' + e.message);
    }
}


function saveNotType() {
    try {
        if (_validate($(".form_note_type"))) {
            var url = "/system/note_type/save_note_type"
            var data = {};
            data.name = $("#name").val();
            data.notes = $("#notes").val();
            var status = 0;
            if ($("#status").prop('checked')) {
                status = 1;
            }
            data.status = status;
            axios
                .post(url, data, {

                })
                .then(function (res) {
                    console.log(res.data)
                    if (res.data.status == 200) {
                        $(".div_note_type").html(res.data.data_note_type_view);
                        $(".select2").select2({
                            width: "100%",
                        });
                        $('#modal_add_note_type').modal('hide');
                    } else {
                        Swal.fire({
                            icon: "error",
                            title: "Oops...",
                            text: "Something went wrong!",
                        });
                    }
                })
                .catch(function (error) {
                    console.log(error);
                    Swal.fire({
                        icon: "error",
                        title: "Oops...",
                        text: "Something went wrong!",
                    });
                });
            return;

        }

    } catch (e) {
        alert('#saveNotType ' + e.message);
    }
}


function saveCustomerNote() {
    try {
        if (_validate($(".div_add_customer_note"))) {
            var url = "/customers/customer_profile/save_customer_note"
            var data = {};
            data.customer_id = $("#customer_id").val();
            data.note_type_id = $("#note_type_id").val();
            data.carrier_id = $("#carrier_id").val();
            data.customer_notes = $("#customer_notes").val();
            data.priority = $("#priority").val();

            axios
                .post(url, data, {

                })
                .then(function (res) {
                    console.log(res.data)
                    if (res.data.status == 200) {
                        // Load customer note
                        loadCustomerNote();
                    } else {
                        Swal.fire({
                            icon: "error",
                            title: "Oops...",
                            text: "Something went wrong!",
                        });
                    }
                })
                .catch(function (error) {
                    console.log(error);
                    Swal.fire({
                        icon: "error",
                        title: "Oops...",
                        text: "Something went wrong!",
                    });
                });
            return;

        }

    } catch (e) {
        alert('#saveNotType ' + e.message);
    }
}


function loadCustomerNote() {
    try {

        $('#customer_note_data_table').dataTable().fnFilter();

        // var url = "/customers/customer_profile/get_customer_note"
        // var data = {};
        // data.customer_id = $("#customer_id").val();
        // axios
        //     .post(url, data, {

        //     })
        //     .then(function (res) {
        //         console.log(res.data)
        //         $(".div_customer_note_search").html(res.data);
        //     })
        //     .catch(function (error) {
        //         console.log(error);
        //         Swal.fire({
        //             icon: "error",
        //             title: "Oops...",
        //             text: "Something went wrong!",
        //         });
        //     });
        // return;
    } catch (e) {
        alert('#noteTypeDetail ' + e.message);
    }
}



function _validate(element) {
    if (!element) {
        element = $('body');
    }
    var error = 0;
    try {
        _clearErrors(1);
        // validate required
        var message = "Please input value";
        element.find('.required:enabled').each(function () {
            if ($(this).is(':visible') || typeof $(this).parents('.w-result-tabs').html() != 'undefined') {
                if (($(this).is("input") || $(this).is("textarea")) && $.trim($(this).val()) == '') {
                    $(this).addClass('boder-error');
                    error++;
                } else if ($(this).is("select") && ($(this).val() == '-1' || $(this).val() == undefined)) {
                    $(this).addClass('boder-error');
                    error++;
                }
            }

            if ($(this).hasClass('select2') && $(this).val() == '-1') {
                var div = $(this).closest('.num-length');
                $(div).find(".select2-selection").addClass("boder-error");
                error++;
            }
        });
        // item multiselect
        element.find('.multiselect').each(function () {
            if ($(this).hasClass('required')) {
                var div = $(this).closest('.multi-select-full');
                var check = 0;
                div.find('input[type=checkbox]').each(function () {
                    if ($(this).prop('checked')) {
                        check++;
                    }
                });
                //
                if (check == 0) {
                    div.errorStyle(message, 2);
                    error++;
                }
            }
        });

        if (error > 0) {
            _focusErrorItem();
            return false;
        } else {
            return true;
        }
    } catch (e) {
        alert('_validate: ' + e.toString());
    }
}

/**
 * Clear all red items. Call when no error detected.
 */
function _clearErrors() {
    try {
        $('.textbox-error').remove();
        $('input,select,textarea').removeClass('boder-error');
        $(".textbox-error").remove();
        $(".boder-error").removeClass("boder-error");
    } catch (e) {
        alert('_clearErrors' + e.message);
    }
}
/**
 * Find first error item and focus it
 */
function _focusErrorItem() {
    try {
        $('.textbox-error:first').focus();
        $('.boder-error:first').focus();
        $('.boder-error:first').closest('.num-length').find(".textbox-error").removeClass("hide");
    } catch (e) {
        alert('_focusErrorItem: ' + e.message);
    }
}