import { Checkbox } from "./pages/checkbox";

const CommonAttribute = {
    datatableId: "#datatable",
    btnDeleteClass: ".btn-delete",
    select2Class: ".select2",
    select2AjaxClass: ".select2.select2-ajax",
    btnAddAttributeClass: ".add-attribute",
    attributePriceClass: ".attribute-price",
    defaultAttributePriceClass: ".default-attribute-price",
    attributeGroupClass: ".attribute-group",
    btnCollapseClass: ".btn-collapse",
    collapsedClass: "collapsed",
    btnDeleteAttributeClass: ".btn-delete-attribute",
    attributePriceGroupClass: ".attribute-price-group",
    datepickerClass: ".datepicker",
    validateClass: ".validate",
};

const Common = (() => {
    let modules = {};

    modules.datatable = () => {
        if (typeof columns !== 'undefined') {
            $(CommonAttribute.datatableId).dataTable({
                order: [[0, "desc"]],
                processing: true,
                serviceSide: true,
                ajax: $(CommonAttribute.datatableId).data('filter'),
                columns: columns,
            });
        }
    };

    modules.delete = () => {
        const swalDeleteButtons = Swal.mixin({
            customClass: {
                confirmButton: "btn btn-success",
                cancelButton: "btn btn-danger mr-2",
            },
            buttonsStyling: false,
        });

        $(document).on("click", CommonAttribute.btnDeleteClass, function () {
            let url = $(this).data("url");
            let method = $(this).attr("method");
            if (method == undefined || method == '') {
                method = "DELETE"
            }

            var tr =  $(this).parents("tr");
            swalDeleteButtons
                .fire({
                    title: "Are you sure?",
                    text: "You won't be able to revert this!",
                    icon: "warning",
                    showCancelButton: true,
                    confirmButtonText: "Yes, delete it!",
                    cancelButtonText: "No, cancel!",
                    reverseButtons: true,
                })
                .then((result) => {
                    if (result.isConfirmed) {

                        $.ajax({
                            url: url,
                            method: method,
                            loading: true,
                            success: function () {
                                tr.remove();
                                // location.reload();
                            },
                            error: function () {
                                location.reload();
                            } 
                        });
                    } else if (result.dismiss === Swal.DismissReason.cancel) {
                        return 0;
                    }
                });
        });
    };

    modules.select2 = () => {
        $(CommonAttribute.select2Class)
            .select2({
                width: "100%",
            })
            .on("change", function (e) {
                $(this)
                    .parents()
                    .removeClass("has-danger")
                    .children(".error")
                    .remove(); //remove label
            });

        $(CommonAttribute.select2AjaxClass).each(function (index, element) {
            $(element).select2({
                width: "100%",
                ajax: {
                    url: $(element).data('url'),
                    dataType: 'json',
                    delay: 300,
                },
            })
        });
    };

    modules.validate = () => {
        $(CommonAttribute.validateClass).each(function () {
            $(this).validate({
                errorClass: "invalid",
                errorPlacement: function (label, element) {
                    if (
                        element.hasClass("select2") &&
                        element.next(".select2-container").length
                    ) {
                        label.addClass("mt-2 text-danger");
                        label.insertAfter(element.next(".select2-container"));
                    } else {
                        label.addClass("mt-2 text-danger");
                        label.insertAfter(element);
                    }
                },
            });
        });

        $(".required").each(function () {
            $(this).after('<span class="text-danger"> *</span>');
        });
    };

    modules.cloneAttribute = () => {
        $(CommonAttribute.btnAddAttributeClass).on("click", function () {
            let defaultAttributePrice = $(this)
                .parents(CommonAttribute.attributeGroupClass)
                .find(CommonAttribute.defaultAttributePriceClass);
            let newAttributePrice = defaultAttributePrice.clone();
            newAttributePrice.removeClass("default-attribute-price d-none");
            newAttributePrice.find("input").prop("disabled", false);
            let attributePrice = $(this)
                .parents(CommonAttribute.attributeGroupClass)
                .find(CommonAttribute.attributePriceClass);
            attributePrice.append(newAttributePrice);
        });
    };

    modules.removeAttribute = () => {
        $(document).on(
            "click",
            CommonAttribute.btnDeleteAttributeClass,
            function () {
                $(this)
                    .parents(CommonAttribute.attributePriceGroupClass)
                    .remove();
            }
        );
    };

    modules.datepicker = () => {
        $(CommonAttribute.datepickerClass).datepicker({
            format: "yyyy-mm-dd",
        });
    };

    return modules;
})(window.jQuery, window, document);

export { Common };


jQuery.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    },
    beforeSend: function () {
        // console.log(this.loading);
        if (this.loading) {
            OpenLoading();
        }
    },
    complete: function (res) {
        try {
            if (this.loading) {
                CloseLoading();
            }
        } catch (e) {
            alert('ajaxSetup: ' + e.message + ": message_cd :" + message_cd);
        }
    }
});



$(document).ready(() => {
    if ($("#datatable").length > 0) {
        Common.datatable();
    }
    Common.delete();
    Common.select2();
    Common.cloneAttribute();
    Common.removeAttribute();
    Common.datepicker();
    Common.validate();
    Checkbox.checkBoxAll();
});

init();

function init() {
    try {
        // blur money
        $(document).on('blur', '.money,.numeric', function (e) {
            try {
                var constant_maxlength = $(this).attr("constant_maxlength");
                $(this).attr("maxlength", constant_maxlength);
                let val = $(this).val().replaceAll(',', '').replaceAll(' ', '');
                // Convert haflsize
                val = toASCII(val);
                if (!isNumeric(val)) {
                    $(this).val("");
                    return;
                }
                // get only number
                val = val.replaceAll(/[^0-9-]/g, '');
                $(this).removeClass("negative");
                if (val == "") {
                    $(this).val("");
                    return;
                }
                val = val * 1;
                if (val < 0) {
                    $(this).addClass("negative");
                }
            } catch (e) {
                alert(e.message);
            }
        });
    } catch (e) {
        alert('initialize' + e.message);
    }
}


function isNumeric(n) {
    return !isNaN(parseFloat(n)) && isFinite(n);
}

function toASCII(chars) {
    var ascii = '';
    for (var i = 0, l = chars.length; i < l; i++) {
        var c = chars[i].charCodeAt(0);

        // make sure we only convert half-full width char
        if (c >= 0xFF00 && c <= 0xFFEF) {
            c = 0xFF & (c + 0x20);
        }

        ascii += String.fromCharCode(c);
    }

    return ascii;
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


function OpenLoading() {
    $('.div_loading').show();
}

function CloseLoading() {
    $('.div_loading').hide();
}
function jMesssageSuccess(title = "Success",) {
    Swal.fire({
        position: 'top-end',
        icon: 'success',
        title: title,
        showConfirmButton: false,
        timer: 1000
    })
}

function jMesssageError(title = "Success",) {
    Swal.fire({
        position: 'top-end',
        icon: 'error',
        title: title,
        showConfirmButton: false,
        timer: 1000
    })
}


