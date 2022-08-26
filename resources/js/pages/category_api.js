$(document).on('click', '.status', function () {
    let cateogry_id = $(this).attr("id");
    let status_click = 0;
    if ($(this).is(':checked')) {
        status_click = 1;
    }
    $.ajax({
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: "categoryapi/update_category_status",
        data: {
            status: status_click,
            cateogry_id: cateogry_id,
        },
        success: function (res) {
            if (res.status == 200) {
                jMesssageSuccess(res.message)
            } else {
                jMesssageError(res.message)
            }
        }
    });
})

$(document).on('click', '.open-image', function (e) {
    e.preventDefault();
    $(this).ekkoLightbox();
})



$(document).on('click', '.goto_detail_api', function () {
    
    $(".detail_api").removeClass("detail_api");
    $(this).addClass("detail_api");


    let api_id = $(this).attr("api_id");
    let data = {};
    data['api_id'] = api_id;

    $.ajax({
        url: "/managerapi/api_detail/get_detail",
        data: data,
        type: "POST",
        dataType: "html",
        success: function (res) {
            $(".detail_api_seach").html(res);

            $(".description_api img").each(function (index, element) {
                var image_src =  $(this).attr("src");
                 $(this).addClass("open-image").attr("data-toggle" , "lightbox").attr("data-remote" , image_src);
            });
        }
    });
})


$(document).on('click', '.goto_category_api', function () {

    $(".select_category").removeClass("select_category");
    $(this).addClass("select_category");
    let category_id = $(this).attr("category_id");
    let data = {};
    data['category_id'] = category_id;


    $(".detail_api_seach").html("");

    $.ajax({
        url: "/managerapi/categoryapi/get_list_api",
        data: data,
        type: "POST",
        dataType: "html",
        success: function (res) {
            $(".div_list_cateogry").html(res);
        }
    });
})




