<table class="table table-bordered dt-responsive nowrap">
    <tbody>
    <th>
        <div class="form-check form-check-flat form-check-primary">
            <label class="form-check-label">
                <input type="checkbox" class="form-check-input check-all">
                <i class="input-frame"></i>
            </label>
        </div>
    </th>
    <th>ID</th>
    <th>Box</th>
    @if($isShowShipment ?? false)
    <th>Shipment</th>
    @endif
    <th>Quantity</th>
    <th>Tracking Number</th>
    <th>Discount Rate</th>
    <th>Shipping Fee</th>
    <th>Dimension</th>
    <th>Weight</th>
    <th>Status</th>
    @foreach($boxes as $box)
        <tr>
            <th>
                <div class="form-check form-check-flat form-check-primary">
                    <label class="form-check-label">
                        <input type="checkbox" class="form-check-input check" value="{{ $box->id }}">
                        <i class="input-frame"></i>
                    </label>
                </div>
            </th>
            <th>{{ $box->id }}</th>
            <th><a href="{{ route('boxes.edit', $box) }}">{{ $box->name }}</a></th>
            @if($isShowShipment ?? false)
            <th>
                @if($box->shipment)
                <a href="{{ route('shipments.show', ['shipment' => $box->shipment->id]) }}">{{ $box->shipment->name }}</a>
                @endif
            </th>
            @endif
            <th>0</th>
            <th>{{ $box->tracking_number }}</th>
            <th>0</th>
            <th>0</th>
            <th>{{ $box->dimension }}</th>
            <th>{{ $box->weight }}</th>
            <th>
                @if ($box->is_kitted && $box->is_shipped)
                    <span class='badge badge-success mr-2'>kitted</span>
                    <span class='badge badge-success mr-2'>shipped</span>
                @elseif ($box->is_kitted)
                    <span class='badge badge-success mr-2'>kitted</span>
                    <span class='badge badge-danger mr-2'>unshipped</span>
                @else
                    <span class='badge badge-warning mr-2'>processing</span>
                @endif
            </th>
        </tr>
    @endforeach
    </tbody>
</table>
