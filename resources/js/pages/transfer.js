import {Toast} from "./toast";

export const Transfer = (() => {
    let modules = {};

    modules.transferShipment = (element) => {
        let url = $(element).data('url');
        let boxId = $.map($('.check.form-check-input:checked'), function(c){return c.value; })
        let shipmentId = $('#shipment-id').val();

        axios.post(url, {
            box_id: boxId,
            shipment_id: shipmentId,
        }).then(function (response) {
            Toast.fire({
                icon: 'success',
                title: 'Transfer box success'
            })
            setTimeout(function() {location.reload()}, 1000);
        }).catch(function (error) {
            let messages = error.response.data.errors;
            $('#shipment-id-error').html('').html(messages.shipment_id);
            $('#box-id-error').html('').html(messages.box_id);
        })
    }

    modules.transferOrderAgent = (element) => {
        let url = $(element).data('url');
        let boxId = $.map($('.check.form-check-input:checked'), function(c){return c.value; })
        let orderAgent = $('#order-agent').val();

        axios.post(url, {
            box_id: boxId,
            order_agent_id: orderAgent,
        }).then(function (response) {
            Toast.fire({
                icon: 'success',
                title: 'Transfer box success'
            })
            setTimeout(function() {location.reload()}, 1000);
        }).catch(function (error) {
            let messages = error.response.data.errors;
            $('#order-agent-id-error').html('').html(messages.order_agent_id);
            $('#box-id-error').html('').html(messages.box_id);
        })
    }

    modules.transferBox = (element) => {
        let url = $(element).data('url');
        let inventoryId = $.map($('.check.form-check-input:checked'), function(c){return c.value; })
        let boxId = $('#box_id').val();

        axios.post(url, {
            box_id: boxId,
            inventory_id: inventoryId,
        }).then(function (response) {
            Toast.fire({
                icon: 'success',
                title: 'Transfer inventory success'
            })
            setTimeout(function() {location.reload()}, 1000);
        }).catch(function (error) {
            let messages = error.response.data.errors;
            $('#inventory-id-error').html('').html(messages.inventory_id);
            $('#box-id-error').html('').html(messages.box_id);
        })
    }

    return modules;
})(window.jQuery, window, document);
