<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                @csrf
                {{ Form::hidden('id', null) }}
                {{ Form::hidden('shipment_id', request('shipment_id')) }}
                {{ Form::hidden('order_id', request('order_id')) }}
                <div class="form-group">
                    <label for="order_id">Available Order</label>
                    {{ Form::select('order_id', $orders, null, ['class' => 'form-control select2', 'id' => 'order_id', 'placeholder' => 'Ready in Stock']) }}
                    @error('order_id')<span class="text-danger">{{ $message }}</span>@enderror
                </div>
                <div class="form-group">
                    <label for="order_agent_id">Available Order Agent</label>
                    {{ Form::select('order_agent_id', $agents, null, ['class' => 'form-control select2', 'id' => 'order_agent_id', 'placeholder' => 'Please select']) }}
                    @error('order_agent_id')<span class="text-danger">{{ $message }}</span>@enderror
                </div>
                <div class="form-group">
                    <label for="tracking_number">Tracking number</label>
                    {{ Form::text('tracking_number', null, ['class' => 'form-control', 'id' => 'tracking_number', 'placeholder' => 'Tracking number']) }}
                    @error('tracking_number')<span class="text-danger">{{ $message }}</span>@enderror
                </div>
                <div class="form-group">
                    <label for="shipped_date">Shipped date</label>
                    {{ Form::text('shipped_date', null, ['class' => 'form-control datepicker', 'id' => 'shipped_date', 'placeholder' => 'Shipped date', 'autocomplete' => 'off', 'readonly']) }}
                    @error('shipped_date')<span class="text-danger">{{ $message }}</span>@enderror
                </div>
                <div class="form-group">
                    <label for="note">Note</label>
                    {{ Form::textarea('note', null, ['class' => 'form-control', 'id' => 'note', 'placeholder' => 'Note']) }}
                    @error('note')<span class="text-danger">{{ $message }}</span>@enderror
                </div>
                <div class="form-group">
                    <div class="custom-control custom-switch">
                        {{ Form::checkbox('is_kitted', true, null, ['class' => 'custom-control-input form-control-lg', 'id' => 'kitted']) }}
                        <label class="custom-control-label pt-1" for="kitted">Kitted</label>
                    </div>
                </div>
                <div class="collapse" id="is-shipped">
                    <div class="form-group">
                        <div class="custom-control custom-switch">
                            {{ Form::checkbox('is_shipped', true, null, ['class' => 'custom-control-input form-control-lg', 'id' => 'shipped']) }}
                            <label class="custom-control-label pt-1" for="shipped">Is shipped</label>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="note">Dimension</label>
                        {{ Form::text('dimension', null, ['class' => 'form-control', 'id' => 'note', 'placeholder' => 'Dimension']) }}
                        @error('dimension')<span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                    <div class="form-group">
                        <label for="note">Weight</label>
                        {{ Form::text('weight', null, ['class' => 'form-control', 'id' => 'note', 'placeholder' => 'Weight']) }}
                        @error('weight')<span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                </div>
                <div class="form-group">
                    <label for="shipment_id">Shipment</label>
                    {{ Form::select('shipment_id', $shipments, null, ['class' => 'form-control select2', 'id' => 'shipment_id', 'placeholder' => 'Please select']) }}
                    @error('shipment_id')<span class="text-danger">{{ $message }}</span>@enderror
                </div>

                @if ($button == 'Edit')
                <label for="box_id">Transfer to Box</label>
                <div class="form-group row">
                    <div class="col-6">
                        {{ Form::select('', $boxes, null, ['class' => 'form-control select2', 'id' => 'box_id', 'placeholder' => 'Please select']) }}
                        <span class="text-danger" id="box-id-error"></span>
                    </div>
                    <div class="col-6">
                        <a class="btn btn-success" href="javascript:;" id="box-id-transfer" data-url="{{ route('boxes.transfer.inventory')  }}"><i class="fas fa-random"></i></a>
                    </div>
                </div>

                <span class="text-danger" id="inventory-id-error"></span>
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <td style="width: 30px">
                                <div class="form-check form-check-flat form-check-primary">
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input check-all">
                                        <i class="input-frame"></i>
                                    </label>
                                </div>
                            </td>
                            <td><b>No.</b></td>
                            <td><b>ESN (DEC)</b></td>
                            <td><b>ESN (HEX)</b></td>
                            <td><b>UCCID</b></td>
                            <td><b>Model name</b></td>
                            <td><b>Status</b></td>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($model->inventoryStock as $inventory)
                        <tr>
                            <td>
                                <div class="form-check form-check-flat form-check-primary">
                                    <label class="form-check-label">
                                        <input type="checkbox" class="form-check-input check" value="{{ $inventory->id }}">
                                        <i class="input-frame"></i>
                                    </label>
                                </div>
                            </td>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $inventory->dec }}</td>
                            <td>{{ $inventory->hex }}</td>
                            <td>{{ $inventory->uccid_sim }}</td>
                            <td>{{ $inventory->product_variant->product->name }}</td>
                            <td>{{ $inventory->status }}</td>
                        </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
<div class="form-group text-right mt-5">
    <a class="btn btn-secondary" href="{{ route('boxes.index') }}">Cancel</a>
    <button class="btn btn-primary">{{ $button }}</button>
</div>
