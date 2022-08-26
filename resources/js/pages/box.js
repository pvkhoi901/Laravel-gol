import {Transfer} from "./transfer";

const openIsShippedData = (isKitted) => {
    let isShipped = $('#is-shipped');
    if (isKitted) {
        isShipped.addClass('collapsed').removeClass('collapse');
    } else {
        isShipped.removeClass('collapsed').addClass('collapse');
    }
}

// const ajaxGetOrderAgent = () => {
//     axios.get(url, {
//         params: {
//             order_id: orderAgentId,
//         }
//     }).then(function (response) {
//         $('#lineTabContent').html(response.data);
//
//     })
// }

$(document).ready(function () {
    let kitted = $('#kitted');

    openIsShippedData(kitted.is(":checked"));
    kitted.on('click', function () {
        openIsShippedData($(this).is(":checked"));
    })

    $('#box-id-transfer').on('click', function () {
        Transfer.transferBox($(this));
    });
})
