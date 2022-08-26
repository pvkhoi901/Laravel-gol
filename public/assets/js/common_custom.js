



$(document).ready(() => {
    $("input").attr("autocomplete" , "off")
});
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
