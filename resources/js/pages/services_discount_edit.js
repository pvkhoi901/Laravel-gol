$(document).ready(function () {
    $('#state').on("select2:select", function (e) {
        var data_value = e.params.data.id;
        if (data_value == 'all') {
            $("#state > option").prop("selected", "selected");
            $("#state").trigger("change");
        }
    });
});
 