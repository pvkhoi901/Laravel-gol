<div class="card">
    <div class="card-body">
        <div class="row">
            <div class="col-md-8">
                <div class="form-group">
                    <label for="agent_id" class="col-form-label">Master Agent <span
                            class="text-danger">*</span></label>
                    {{ Form::select('agent_id', $master_agents, null, ['id' => 'agent_id', 'class' => 'select2 form-control form-control-lg', 'placeholder' => 'Select', 'required' => true]) }}
                    @error('carrier')<span class="text-danger">{{ $message }}</span>@enderror
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="state" class="col-form-label">State <span class="text-danger">*</span></label>
                    {{ Form::select('state', $state, null, ['id' => 'state', 'class' => 'select2 form-control form-control-lg', 'placeholder' => 'Select', 'required' => true]) }}
                    @error('carrier')<span class="text-danger">{{ $message }}</span>@enderror
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="payment_method" class="col-form-label">Payment Method <span
                            class="text-danger">*</span></label>
                    {{ Form::select('payment_method', $payment_method, null, ['id' => 'payment_method', 'class' => 'select2 form-control form-control-lg', 'placeholder' => 'Select', 'required' => true]) }}
                    @error('carrier')<span class="text-danger">{{ $message }}</span>@enderror
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="shipping_method" class="col-form-label">Shipping Method <span
                            class="text-danger">*</span></label>
                    {{ Form::select('shipping_method', $shipping_method, null, ['id' => 'shipping_method', 'class' => 'select2 form-control form-control-lg', 'placeholder' => 'Select', 'required' => true]) }}
                    @error('carrier')<span class="text-danger">{{ $message }}</span>@enderror
                </div>
            </div>
        </div>
    </div>
</div>
