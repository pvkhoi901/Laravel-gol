import {Select2} from "./select2";

const AgentAttr = {
    masterId: '#master-id',
    distributorId: '#distributor-id',
    retailerId: '#retailer-id',
}

const Agent = (() => {
    let modules = {};

    modules.ajaxGetDistributor = () => {
        axios({
            method: "get",
            url: $(AgentAttr.distributorId).data('url'),
            params: {
                master_id: $(AgentAttr.masterId).val(),
            },
        }).then(function (response) {
            Select2.refreshSelect2($(AgentAttr.distributorId), response.data);
            if ($(AgentAttr.retailerId)) {
                modules.ajaxGetRetailer();
            }
        });
    }

    modules.ajaxGetRetailer = () => {
        axios({
            method: "get",
            url: $(AgentAttr.retailerId).data('url'),
            params: {
                distributor_id: $(AgentAttr.distributorId).val(),
            },
        }).then(function (response) {
            Select2.refreshSelect2($(AgentAttr.retailerId), response.data);
        });
    }

    return modules;
})(window.jQuery, window, document);

export { Agent };

$(document).ready(() => {
    $(AgentAttr.masterId).on('change', function () {
        Agent.ajaxGetDistributor();
    });

    if ($(AgentAttr.masterId).val()) {
        Agent.ajaxGetDistributor();
    }

    $(document).on('change', AgentAttr.distributorId, function () {
        Agent.ajaxGetRetailer();
    });
});
