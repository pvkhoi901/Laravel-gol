$(document).ready(function () {
    searchProduct();
    $(document).on('click', '.search', function () {
        try {
            searchProduct();
        } catch (e) {
            alert('search:' + e.message);
        }
    }); //change key
    $(document).on('click', '.page-item .page-link', function () {
        try {
            if ($(this).hasClass('disabled')) {
                //nothing
            } else {
                _current_page = $(this).attr('page');
                searchProduct(_current_page);
            }
        } catch (e) {
            alert('.pagination li' + e.message);
        }
    });
    $(document).on('change', '#state,#service_type,#status', function () {
        try {
            searchProduct(1)
        } catch (e) {
            alert('.pagination li' + e.message);
        }
    });


    $(document).on('select2:select', '#state', function () {
        try {
            console.log(1111111111111)
        } catch (e) {
            alert('.pagination li' + e.message);
        }
    });

    $('#state').on("select2:select", function (e) {
        var data = e.params.data.text;
        console.log(1111111111111)
        if (data == 'all') {
            $("#state > option").prop("selected", "selected");
            $("#state").trigger("change");
        }
    });

    
    $(document).on('click', '.show_more_state', function () {
        try {
            var html = $(this).closest("tr").find(".list_state_for_modal").html();
            $(".modal_body_list_state").html(html);
        } catch (e) {
            alert('.show_more_state: ' + e.message);
        }
    });



});

function searchProduct(page) {
    try {
        var url = "/services/discounts/search"
        var data = {};
        data.page = page;
        data.service_name = $("#service_name").val();
        data.state = $("#state").val();
        data.service_type = $("#service_type").val();
        data.status = $("#status").val();
        axios
            .post(url, data, {

            })
            .then(function (res) {
                $(".div_search").html(res.data);
                $(".dataTable").DataTable({
                    "searching": false,
                    "paging": false,
                    "info": false,
                    "order": [
                        [0, "desc"]
                    ]
                });
            })
            .catch(function (error) {
                console.log(error);
                Swal.fire({
                    icon: "error",
                    title: "Oops...",
                    text: "Something went wrong!",
                });
            });
        return;

    } catch (e) {
        alert('#search ' + e.message);
    }
}
