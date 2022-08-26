<div class="d-flex justify-content-between align-items-baseline">
    <h6>Shipping box</h6>
    <a href="{{ route('boxes.create', ['order_agent' => $order_agent->id]) }}" class="btn btn-outline-primary">Create Box</a>
</div>
<div class="d-flex justify-content-between align-items-baseline my-3 border rounded p-3">
    <div class="row w-100">
        <div class="col-2 font-weight-bold">Ship to:</div>
        <div class="col-10">
            <a href="javascript:;" class="edit-order-agent" data-toggle="modal" data-target="#agentOrderModal" data-order-agent="{{ $order_agent }}" data-url-edit="{{ route('agent-order-agents.update', $order_agent) }}">
                {{ $order_agent->attention_name }}<br>
                {{ "{$order_agent->shipping_address}, {$order_agent->city}, {$order_agent->state}, {$order_agent->zipcode}" }}
            </a>
        </div>
    </div>
</div>
@if (!empty($order_agent->boxes) && $order_agent->boxes->isNotEmpty())
<div class="table-responsive mt-3">
    <span class="text-danger" id="box-id-error"></span>
    @include('pages.order.box.components.table', ['boxes' => $order_agent->boxes, 'isShowShipment' => true])
</div>
@endif
