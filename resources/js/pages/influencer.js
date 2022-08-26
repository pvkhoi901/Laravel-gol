$(document).ready(function () {



    $('.date_search').datepicker({
        format: "yyyy-mm-dd",
        autoclose: true,
        todayHighlight: true,
        toggleActive: true
    });

    getCategoryCountry(0);

    $(document).on('change', '.search_condition', function () {
        try {
            getDataDetail()
        } catch (e) {
            alert('.pagination li' + e.message);
        }
    });


    $(document).on('change', '.change_country', function (e) {
        try {
            let index_nox_category_id = $("#nox_category_id option:selected").index();
            getCategoryCountry(index_nox_category_id)
        } catch (e) {
            alert('.change_country li' + e.message);
        }
    });

});


function getDataDetail() {
    try {
        var url = "/crawl_data/influencer_search"
        var data = {};
        data.region             = $("#country_id").val();
        data.youtube_category_id = $("#youtube_category_id").val();
        data.nox_category_id     = $("#nox_category_id").val();
        data.date_search         = $("#date_search").val();

        $.ajax({
            url: url,
            data: data,
            type: "POST",
            dataType: "html",
            loading: true,
            success: function (res) {
                $(".table_seach").html(res);
                $('#datatable').DataTable();
            }
        });

    } catch (e) {
        alert('#getDataDetail ' + e.message);
    }
}

function getCategoryCountry(index_nox_category_id) {
    try {
        var url = "/crawl_data/influencer_change_country"
        var data = {};
        data.region = $("#country_id").val();
        data.index_nox_category_id = index_nox_category_id;
        $.ajax({
            url: url,
            data: data,
            type: "POST",
            dataType: "html",
            loading: false,
            success: function (res) {
                $(".div_result_change_country").html(res);
                $(".div_result_change_country select").select2();
                getDataDetail() ;
            }
        });

    } catch (e) {
        alert('#getCategoryCountry ' + e.message);
    }
}
