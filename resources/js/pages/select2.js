export const Select2 = (() => {
    let modules = {};

    modules.refreshSelect2 = (select, response) => {
        select.find('option').remove()
        select.append('<option value="">Please select</option>');
        $.each(response, function (index, value) {
            if (index) {
                select.append('<option value="' + index + '">' + value + '</option>');
            } else {
                select.prepend('<option selected value="' + index + '">' + value + '</option>');
            }
        });
        select.select2("destroy");
        select.select2();
    }

    modules.refreshSelect2Group = (select, response) => {
        select.find('optgroup').remove()
        select.find('option').remove()
        select.append('<option value="">Please select</option>');

        $.each(response, function (index, group) {
            let optionGroup = `<optgroup label="${index}">`
            $.each(group, function (id, value) {
                optionGroup += `<option value="${id}">` + value + `</option>`;
            });
            optionGroup += `</optgroup>`;
            select.append(optionGroup);
        });
    }

    return modules;
})(window.jQuery, window, document);
