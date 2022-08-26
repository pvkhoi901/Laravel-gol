$(document).ready(function () {
    $(document).on('change', '#url', function () {
        let url = $('#url').val();
        $.ajax({
            method: 'POST',
            url: "/crawl_data/website_element/get_domain",
            data: {
                url: url,
            },
            success: function (data) {
                $('#domain').val(data.data)
            }
        });
    });

});