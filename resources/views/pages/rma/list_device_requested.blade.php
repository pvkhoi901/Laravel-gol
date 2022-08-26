<?php
    $listDevice = $listDevice->groupBy('product_id');
?>

@forelse($listDevice as $device)
    <div class="panel panel-default">
        <div class="panel-heading">
            <div class="row">
                <div class="col-md-8">
                    <h4 style="margin: 10px 0"><b>{{ $device[0]->product->brand->name ?? '' }}
                            &nbsp;{{ $device[0]->product->model_name ?? '' }}</b></h4>
                </div>
            </div>
            <p>{{ $device[0]->product->type ?? 'NO DATA' }} |
                {{ $device[0]->storage->name ?? 'NO DATA' }} |
                {{ $device[0]->color->name ?? 'NO DATA' }} |
                {{ $device[0]->product->phone_type ?? 'NO DATA' }} |
                {{ $device[0]->product->data_capable_custom ?? 'NO DATA' }} |
                {{ $device[0]->product->upgraded_price ?? 'NO DATA' }}
            </p>
        </div>
        <?php
            $esnReturned = $device->filter(function ($value, $key) {
                return $value->status_rma == 3;
            });
        ?>
        <div class="panel-body">
            <div class="row">
                <div class="col-md-6" style="text-align: center">
                    <p><b>Quantity</b></p>
                    <p>{{$device->count()}}</p>
                </div>
                <div class="col-md-6" style="text-align: center">
                    <p><b>Committed Qty</b></p>
                    <p>{{ $esnReturned->count()}}</p>
                </div>
            </div>
        </div>
    </div>
@empty
    <div style="text-align: center">NO DATA</div>
@endforelse
