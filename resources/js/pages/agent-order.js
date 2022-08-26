import {Checkbox} from "./checkbox";
import {Transfer} from "./transfer";
import {Select2} from "./select2";
import {Toast} from "./toast";

function initAutocomplete() {
    const autocomplete = new google.maps.places.Autocomplete(
        document.getElementById("shipping_address"),
        {
            componentRestrictions: { country: "us" },
            types: ["address"],
        }
    );

    google.maps.event.addListener(autocomplete, "place_changed", function () {
        const data = $("#shipping_address").val();
        console.log(data);
        let city = data.split(",")[1];
        let state = data.split(",")[2] == " USA" ? "NY" : data.split(",")[2];

        $("#shipping_address").val(data.replace(/, .*/, "")).trigger("change");
        $("input[name=city]")
            .val(city.replace(" ニュー・ヨーク NY", "ニュー・ヨーク"))
            .trigger("change");
        $("input[name=state]").val(state.trim()).trigger("change");

        var place = autocomplete.getPlace();
        for (var i = 0; i < place.address_components.length; i++) {
            for (var j = 0; j < place.address_components[i].types.length; j++) {
                if (place.address_components[i].types[j] == "postal_code") {
                    $("#zipcode")
                        .val(place.address_components[i].long_name)
                        .trigger("change");
                }
            }
        }
        return false;
    });
}

function createShipment (element) {
    let url = $(element).data('url');
    let orderId = $(element).data('order');

    axios.post(url, {
        order_id: orderId,
    }).then(function (response) {
        location.reload();
    }).catch(function (error) {
        location.reload();
    })
}

function changeDataModalOrderAgent (agentOrderInfo, url, method, btn)
{
    let agentOrderModal = $('#agentOrderModal');

    agentOrderModal.find('#agent_id').val(agentOrderInfo.agent_id).change();
    agentOrderModal.find("option:selected").val(agentOrderInfo.agent_id);
    agentOrderModal.find('#company_name').val(agentOrderInfo.company_name);
    agentOrderModal.find('#attention_name').val(agentOrderInfo.attention_name);
    agentOrderModal.find('#shipping_address').val(agentOrderInfo.shipping_address);
    agentOrderModal.find('#shipping_address_2').val(agentOrderInfo.shipping_address_2);
    agentOrderModal.find('#city').val(agentOrderInfo.city);
    agentOrderModal.find('#state').val(agentOrderInfo.state);
    agentOrderModal.find('#zipcode').val(agentOrderInfo.zipcode);

    agentOrderModal.find('form').attr('action', url);
    agentOrderModal.find('input[name=_method]').val(method);

    agentOrderModal.find('label.error').remove();
    agentOrderModal.find('input[type=submit]').html(btn).val(btn);
}

function changeDataModalOrderPhone (agentPhoneInfo, url, method, btn)
{
    let orderPhoneModal = $('#phoneOrderModal');

    console.log(agentPhoneInfo);

    orderPhoneModal.find('#phone-type').val(agentPhoneInfo.phone_type).change();
}

$(function () {
    "use strict";

    initAutocomplete();

    $('#modal-note').modal('show');

    $('#create-shipment').on('click', function () {
        createShipment($(this));
    });

    $('#quickbook, #invoice').on('change', function () {
        let url = $(this).data('url');
        let form = new FormData;
        form.append('file', $(this).prop('files')[0]);
        axios.post(url, form, {
            headers: {
                'Content-Type': 'multipart/form-data',
            }
        }).then(function (response) {
            Toast.fire({
                icon: 'success',
                title: response.data.messages
            })
            setTimeout(function () {location.reload();}, 1000);
        });
    });

    $('.delete-invoice').on('click', function () {
        let url = $(this).data('url');
        axios.delete(url).then(function (response) {
            Toast.fire({
                icon: 'success',
                title: response.data.messages
            })
            setTimeout(function () {location.reload();}, 1000);
        });
    });

    $("#phone_type").on("change", function ({ target: { value } }) {
        const url = $(this).attr("data-url");

        axios
            .get(url.replace("category_id", value))
            .then(({ data }) => {
                if (data.status) {
                    const phones = $.map(data.data, function (value, key) {
                        return {
                            id: key,
                            text: value,
                        };
                    });

                    $("#product_id").select2({
                        data: phones,
                    });
                }
            })
            .catch((err) => {
                console.error(err);
            });
    });

    let orderAgentNavLink = $('#lineTab .nav-link');
    orderAgentNavLink.on('click', function () {
        orderAgentNavLink.removeClass('active');
        $(this).addClass('active');

        let orderAgentId = $(this).data('order-agent-id');
        let url = $('#lineTab').data('url');

        axios.get(url, {
            params: {
                order_agent_id: orderAgentId,
            }
        }).then(function (response) {
            $('#lineTabContent').html(response.data.shipping_box);
            $('#order-note').html(response.data.order_note);
            $('#order-phone').html(response.data.order_phone).find('.select2').select2({width: "100%",});
            Checkbox.checkBoxAll();
        })
    });

    $(document).on('click', '.edit-order-agent', function () {
        let agentOrderInfo = $(this).data('order-agent');
        let urlEdit = $(this).data('url-edit');
        changeDataModalOrderAgent(agentOrderInfo, urlEdit, 'PUT', 'Edit');
    })

    $(document).on('click', '.create-order-agent', function () {
        let agentOrderInfo = {};
        let urlEdit = $(this).data('url');
        changeDataModalOrderAgent(agentOrderInfo, urlEdit, 'POST', 'Create');
    })

    $('#shipment-id-transfer').on('click', function () {
        Transfer.transferShipment($(this));
    });

    $('#order-agent-id-transfer').on('click', function () {
        Transfer.transferOrderAgent($(this));
    });

    let order = $('#order');
    let orderAgent = $('#order-agent');
    order.on('change', function () {
        axios.get(orderAgent.data('url'), {
            params: {
                order_id: order.val()
            }
        }).then(function (response) {
            Select2.refreshSelect2(orderAgent, response.data);
        })
    });

    let phoneName = $('#product_variant_id');
    $(document).on('change', '#phone-type', function () {
        axios.get(phoneName.data('url'), {
            params: {
                phone_type: $(this).val()
            }
        }).then(function (response) {
            Select2.refreshSelect2Group($('#product_variant_id'), response.data);
        })
    });

    let price = $('#price');
    $(document).on('change', '#product_variant_id', function () {
        axios.get(price.data('url'), {
            params: {
                product_variant_id: $(this).val()
            }
        }).then(function (response) {
            $('#price').val(response.data.agent_price.price);
        })
    })

    $(document).on('click', '.delete-order-phone', function () {
        axios.delete($(this).data('url')).then(function () {
            location.reload();
        }).catch(function (error) {
            location.reload();
        });
    });

    $(document).on('click', '.edit-order-phone', function () {
        let agentPhoneInfo = $(this).data('order-phone');
        let url = $(this).data('url-edit');
        changeDataModalOrderPhone(agentPhoneInfo, url, 'PUT', 'Edit');
    })

    $(document).on('click', '.create-order-phone', function () {
        let agentPhoneInfo = {};
        let url = $(this).data('url');
        changeDataModalOrderPhone(agentPhoneInfo, url, 'POST', 'Create');
    })
});
