$(document).ready(function () {
    config.id_list.DataTable({
        processing: true,
        serverSide: true,
        searching: true,
        ajax: {
            url: config.route_filter,
            data: function (d) {
                d.params = config.params ? config.params : '';
            }
        },
        columns: config.column_array,
        responsive: true,
        autoWidth: false,
        order: [[ 0, "desc" ]]
    });
});
