import {Transfer} from "./transfer";

$(document).ready(function () {
    $('#shipment-id-transfer').on('click', function () {
        Transfer.transferShipment($(this));
    });
});
