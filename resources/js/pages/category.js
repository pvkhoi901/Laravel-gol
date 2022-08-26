$(document).on('click', '.status', function () {
    let cateogry_id = $(this).attr("id");
    let status_click = 0;
    if ( $(this).is(':checked')){
        status_click =1;
    }
    $.ajax({
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: "category/update_category_status", 
        data: {
            status: status_click,
            cateogry_id: cateogry_id,
        },
        success: function (data) {
                console.log(data)
        }
    });
})