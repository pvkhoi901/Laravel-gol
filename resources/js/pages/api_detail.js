
$(document).ready(function () {
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
            url: "categoryapi/update_api_detail",
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



    $(document).on('click', '.add_row', function (event) {
        try {
            event.preventDefault();
            var row = $("#table_copy_f008 tbody tr:first").clone();
            row.find(".parama_name").attr("name", 'parama_name[]');
            row.find(".api_data_type").attr("name", 'api_data_type[]').addClass("select2");
            row.find(".type_param").attr("name", 'type_param[]').addClass("select2");
            row.find(".description_detail").attr("name", 'description_detail[]');
            row.find(".order_by_detail").attr("name", 'order_by_detail[]');
            $('#table_sample_f008 tbody').append(row);

            $(".select2").select2();

        } catch (e) {
            console.log('add_row: ' + e.message);
        }
    });
    $(document).on('click', '.btn_delete_row', function (event) {
        try {
            event.preventDefault();
            $(this).parents("tr").remove();

        } catch (e) {
            console.log('add_row: ' + e.message);
        }
    });
})

