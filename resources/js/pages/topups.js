$(document).ready(function () {
    
    $(document).on('change', '.change_search', function () {
        try {
            $('#topup_data_table').dataTable().fnFilter();
        } catch (e) {
            alert('.pagination li' + e.message);
        }
    });

    $(document).on('click', '.show_more_state', function () {
        try {
            var html = $(this).closest("tr").find(".list_state_for_modal").html();
            $(".modal_body_list_state").html(html);
        } catch (e) {
            alert('.show_more_state' + e.message);
        }
    });
});
 