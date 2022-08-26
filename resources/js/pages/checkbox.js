export const Checkbox = (() => {
    let modules = {};

    modules.checkBoxAll = () => {
        let checkAll = $('.check-all');
        let check = $('.check');
        checkAll.on('click', function () {
            check.prop('checked', checkAll.is(':checked'));
        });

        check.on('click', function () {
            checkAll.prop('checked', check.length === $('.check:checked').length)
        });
    }

    return modules;
})(window.jQuery, window, document);
