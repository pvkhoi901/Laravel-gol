<div>
    <div class="row">
        <div class="col-8">
            <div class="form-group from-inline">
                {{ Form::select('shipment_id', $shipments, null, ['class' => 'form-control select2', 'id' => 'shipment-id', 'placeholder' => 'Transfer to']) }}
                <span class="text-danger" id="shipment-id-error"></span>
            </div>
        </div>
        <div class="col-4">
            <a class="btn btn-success" href="javascript:;" id="shipment-id-transfer" data-url="{{ route('shipments.transfer.box')  }}"><i class="fas fa-random"></i></a>
        </div>
    </div>
</div>
<span class="text-danger" id="box-id-error"></span>
@include('pages.order.box.components.table', ['boxes' => $model->boxes])
