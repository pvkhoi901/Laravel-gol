@if (!empty($order->shipments) && $order->shipments->isNotEmpty())
<table class="table table-bordered dt-responsive nowrap">
    <thead>
        <tr>
            <th>Name</th>
            <th>Quantity</th>
            <th>Status</th>
        </tr>
    </thead>
    <tbody>
    @foreach($order->shipments->sortByDesc('id') as $shipment)
        <tr>
            <td>
                <a href="{{ route('shipments.show', $shipment->id) }}">{{ $shipment->name }}</a>
            </td>
            <td>{{ $shipment->boxes_count }}</td>
            <td>
                <span class="badge badge-{{ \App\Models\Shipment::STATUS_COLOR[$shipment->status] }}">
                    {{ \App\Models\Shipment::STATUS[$shipment->status] }}
                </span>
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
@endif
