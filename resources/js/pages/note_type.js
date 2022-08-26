$(document).ready(function () {
    $(document).on('change', '.change_search', function () {
        try {
            $('#note_type_datatable').dataTable().fnFilter();
        } catch (e) {
            alert('.pagination li' + e.message);
        }
    }); 
});
 