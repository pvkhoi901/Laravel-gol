$(document).ready(function () {

    getCarrrierData();
    getServicesDiscountByState();

    $('#state').on("select2:select", function (e) {
        var data_value = e.params.data.id;
        if (data_value == 'all') {
            $("#state > option").prop("selected", "selected");
            $("#state").trigger("change");
        }
    });

    $(document).on('change', '#state', function () {
        try {
            getServicesDiscountByState()
        } catch (e) {
            alert('.pagination li' + e.message);
        }
    });

    $(document).on('change', '#carrier_id', function () {
        try {
            console.log($(this).val());
            getCarrrierData()
        } catch (e) {
            alert('.pagination li' + e.message);
        }
    });

    $(document).on('change', '.check_servies_discount,#plan_rate', function () {
        try {
            var plan_rate = $("#plan_rate").val().replace(/,/g, '') * 1
            var total_service_amount = 0;
            $(".check_servies_discount").each(function (i, val) {
                if ($(this).is(':checked')) {
                    total_service_amount = total_service_amount + $(this).closest("tr").find(".service_amount").val().replace(/,/g, '') * 1
                }
            })
            var bill_amount = plan_rate - total_service_amount;
            $("#bill_amount").val(bill_amount.toFixed(2));
        } catch (e) {
            alert('.chage check_servies_discount' + e.message);
        }
    });

    $(document).on('click', '.add_plan_code', function () {
        try {
            var PlancodeVal = $(this).attr("PlancodeVal");
            var voice = $(this).attr("voice");
            var sms = $(this).attr("sms");
            var data = $(this).attr("data");
            $("#plan_code").val(PlancodeVal);
            $("#voice").val(voice);
            $("#sms").val(sms);
            $("#data").val(data);

            var refer_elem = $(".plan_code_api_" + PlancodeVal);
            var PlanName = refer_elem.attr("PlanName");
            var PlancodeVal = refer_elem.attr("PlancodeVal");
            var VALID_FROM = refer_elem.attr("VALID_FROM");
            var VALID_TO = refer_elem.attr("VALID_TO");
            $(".PlanName").html(PlanName);
            $(".PlancodeVal").html(PlancodeVal);
            $(".VALID_FROM").html(VALID_FROM);
            $(".VALID_TO").html(VALID_TO);
            $(".div_carrier_choose").show();
        } catch (e) {
            alert('.pagination li' + e.message);
        }
    });

    $(document).on('click', '.btn_clear_plan_code', function () {
        try {
            $(".plan_attr").val("");
            $(".PlanName").html("");
            $(".PlancodeVal").html("");;
            $(".VALID_FROM").html("");
            $(".VALID_TO").html("");
            $(".div_carrier_choose").hide();
        } catch (e) {
            alert('.pagination li' + e.message);
        }
    });

    $(document).on('change', '#apply_tax', function () {
        try {
            var apply_tax = $(this).val();
            if (apply_tax == "1") {
                $(".div_check_tax").removeClass("hidden");
            } else {
                $(".div_check_tax").addClass("hidden");
                $("#tax_inclued").val("0");
                $("#regulatory_code").val("");
            }
        } catch (e) {
            alert('.pagination li' + e.message);
        }
    });

    $(document).on('change', '#plan_type', function () {
        try {
            var plan_type = $(this).val();
            if(plan_type =='Lifeline'){
                $(".plan_div").removeClass("d-none");
                $(".ebb_div").removeClass("d-none");
                $(".div_prepaid").addClass("d-none");
            }else  if(plan_type =='Prepaid/Postpaid'){
                $(".plan_div").addClass("d-none");
                $(".ebb_div").addClass("d-none");
                $(".div_prepaid").removeClass("d-none");
                $("#service_type").val("");
            } else{
                $(".div_prepaid").addClass("d-none");
                $(".plan_div").addClass("d-none");
            }
             
            $("#service_type").trigger("change");
        } catch (e) {
            alert('.pagination li' + e.message);
        }
    });

    $(document).on('change', '#service_type', function () {
        try {
            var service_type = $(this).val();
            if(service_type =='Lifeline Only'  || service_type ==""){
                $(".ebb_div").addClass("d-none");
            }else{
                $(".ebb_div").removeClass("d-none");
            }
             
        } catch (e) {
            alert('.pagination li' + e.message);
        }
    });

    
    $(document).on('click', '.show_more_soc', function () {
        try {
            var html = $(this).closest("tr").find(".list_soc_for_modal").html();
            $(".modal_body_soc_state").html(html);
        } catch (e) {
            alert('.show_more_soc: ' + e.message);
        }
    });
});


function getCarrrierData() {
    try {
        var url = "/services/plans/get_carrier"
        var data = {};
        data.carrier_id = $("#carrier_id").val();
        axios
            .post(url, data, {

            })
            .then(function (res) {
                $(".div_carrier_data").html(res.data);
                var plan_code = $("#plan_code").val();
                if (plan_code != "") {
                    $(".div_carrier_choose").show();
                    var refer_elem = $(".plan_code_api_" + plan_code);
                    var PlanName = refer_elem.attr("PlanName");
                    var PlancodeVal = refer_elem.attr("PlancodeVal");
                    var VALID_FROM = refer_elem.attr("VALID_FROM");
                    var VALID_TO = refer_elem.attr("VALID_TO");
                    $(".PlanName").html(PlanName);
                    $(".PlancodeVal").html(PlancodeVal);
                    $(".VALID_FROM").html(VALID_FROM);
                    $(".VALID_TO").html(VALID_TO);
                } else {
                    $(".div_carrier_choose").hide();
                }
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

function getServicesDiscountByState() {
    try {
        var url = "/services/plans/search_by_state"
        var data = {};
        data.state = $("#state").val();
        data.plan_id = $("#plan_id").val();
        axios
            .post(url, data, {

            })
            .then(function (res) {
                console.log(res)
                $(".div_state_list").html(res.data);
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
