@extends('layout.master')

@section('content')
    <div class="content">
        <div class="container">
            <h4 class="mt-0 header-title mb-3">Inventory Stock Create</h4>
            {{ Form::open(['route' => ['inventory-stocks.store'], 'files' => true, 'id' => 'inventory-stock-create', 'class' => 'validate']) }}
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                {{ Form::label('category_id', 'Category', ['class' => 'required']) }}
                                {{ Form::select('category_id', $categories, null, ['class' => 'select2 form-control', 'placeholder' => 'Select', 'required' => true]) }}
                                @error('category_id')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                {{ Form::label('agent_order_id', 'Agent Orders', ['class' => 'required']) }}
                                {{ Form::select('agent_order_id', $agent_orders, null, [
                                    'id' => 'agent_order_id',
                                    'class' => 'select2 form-control',
                                    'placeholder' => 'Select',
                                    'required' => true,
                                    'data-url' => route('api.agent-orders.show', 'agent_order_id'),
                                ]) }}
                                @error('agent_order_id')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                {{ Form::label('box_id', 'Box Name', ['class' => 'required']) }}
                                {{ Form::select('box_id', [], null, ['id' => 'box_id', 'class' => 'select2 form-control', 'placeholder' => 'Select', 'required' => true]) }}
                                @error('box_id')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                {{ FORM::label('product_variant_id', 'Available Product', ['class' => 'required']) }}
                                {{ Form::select('product_variant_id', [], null, ['id' => 'product_variant_id', 'class' => 'select2 form-control form-control-lg', 'placeholder' => 'Select', 'required' => true]) }}
                                @error('product_variant_id')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                {{ FORM::label('provision_kind', 'Provision Kind', ['class' => 'required']) }}
                                {{ Form::select('provision_kind', $provision_kind, null, ['id' => 'provision_kind', 'class' => 'select2 form-control form-control-lg', 'placeholder' => 'Select', 'required' => true]) }}
                                @error('provision_kind')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                        </div>
                    </div>
                    <div class="row add_activate">
                        <div class="col-md-6">
                            <div class="form-group">
                                {{ Form::label('carrier', null) }}
                                {{ Form::select('carrier', $carrier, null, ['id' => 'carrier', 'class' => 'select2 form-control', 'placeholder' => 'Select', 'required' => true]) }}
                                @error('carrier')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                {{ Form::label('state', null) }}
                                {{ Form::select('state', $state, null, ['id' => 'state', 'class' => 'select2 form-control', 'placeholder' => 'Select', 'required' => true]) }}
                                @error('state')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                {{ Form::label('plan_id', null) }}
                                {{ Form::select('plan_id', $plans, null, ['id' => 'plan_id', 'class' => 'select2 form-control form-control-lg', 'placeholder' => 'Select']) }}
                                @error('plan_id')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                {{ Form::label('zipcode', null) }}
                                {{ Form::number('zipcode', null, ['id' => 'zipcode', 'class' => 'form-control form-control-lg', 'placeholder' => 'Zipcode', 'minLength' => '5', 'maxLength' => '5']) }}
                                @error('zipcode')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                        </div>
                    </div>
                    <div class="form-group d-none">
                        <label for="uccid_sim_list" class="col-form-label d-flex justify-content-between">
                            MDN
                            <a class="file-upload-browse btn btn-primary float-right" href="#upload">Upload
                                file</a>
                        </label>
                        {{ Form::file('mdn_file', ['id' => 'mdn_file', 'class' => 'file-upload-default', 'data-url' => route('common.read_mdn_file'), 'accept' => 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet, application/vnd.ms-excel']) }}
                        {{ Form::text('mdn_list', null, ['id' => 'mdn_list', 'class' => 'form-control form-control-lg', 'placeholder' => 'Scan ESN...']) }}
                        @error('mdn_list')<span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                {{ Form::label('esn', 'Scan ESN', ['class' => 'required']) }}
                                {{ Form::text('esn', null, ['id' => 'esn', 'class' => 'form-control form-control-lg', 'placeholder' => 'Scan ESN...', 'data-url' => route('common.convert_meid')]) }}
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Import ESN</label>
                                <input type="file" name="img[]" class="file-upload-default">
                                <div class="input-group col-xs-12">
                                    <input type="text" class="form-control form-control-lg file-upload-info" disabled=""
                                        placeholder="Upload Excel File">
                                    <span class="input-group-append">
                                        <button class="file-upload-browse form-control-lg btn btn-primary" type="button">Upload</button>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            {{ Form::text('dec_list', null, ['id' => 'dec_list', 'class' => 'form-control', 'placeholder' => 'Scan ESN...', 'required' => true]) }}
                            <label for="dec_list" class="col-form-label">This is the list of ESNs (dec) have been
                                scanned.</label>
                            @error('dec_list')<span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                        <div class="col-md-6">
                            {{ Form::text('hex_list', null, ['id' => 'hex_list', 'class' => 'form-control', 'placeholder' => 'Scan ESN...', 'required' => true]) }}
                            <label for="hex_list" class="col-form-label"> This is the list of ESNs (hex) have been
                                scanned. </label>
                            @error('hex_list')<span class="text-danger">{{ $message }}</span>@enderror
                        </div>
                    </div>
                    <div class="form-check form-check-flat form-check-primary">
                        <label class="form-check-label">
                            {{ Form::checkbox('uccid_sim', false, false, ['id' => 'uccid_sim', 'class' => 'form-check-input']) }}
                            Add UCCID/SIM
                            <i class="input-frame"></i>
                        </label>
                    </div>
                    <div class="form-group uccid_sim_list">
                        <label for="uccid_sim_list" class="col-form-label">Scan UCCID/SIM</label>
                        {{ Form::text('uccid_sim_list', null, ['id' => 'uccid_sim_list', 'class' => 'form-control form-control-lg', 'placeholder' => 'Scan ESN...']) }}
                        @error('uccid_sim_list')<span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="wholesale_price" class="col-form-label">Wholesale Price</label>
                                {{ Form::number('wholesale_price', 0, ['id' => 'wholesale_price', 'class' => 'form-control form-control-lg']) }}
                                @error('wholesale_price')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="selling_price" class="col-form-label">Selling Price</label>
                                {{ Form::number('selling_price', 0, ['id' => 'selling_price', 'class' => 'form-control form-control-lg']) }}
                                @error('selling_price')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="activation_fee" class="col-form-label">Activation Fee</label>
                                {{ Form::number('activation_fee', 0, ['id' => 'activation_fee', 'class' => 'form-control form-control-lg']) }}
                                @error('activation_fee')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="msl_puk" class="col-form-label">MSL/PUK</label>
                                {{ Form::text('msl_puk', null, ['id' => 'msl_puk', 'class' => 'form-control form-control-lg']) }}
                                @error('msl_puk')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="puk_2" class="col-form-label">PUK 2</label>
                                {{ Form::text('puk_2', null, ['id' => 'puk_2', 'class' => 'form-control form-control-lg']) }}
                                @error('puk_2')<span class="text-danger">{{ $message }}</span>@enderror
                            </div>
                        </div>
                    </div>
                    <div>
                        <label for="puk_2" class="col-form-label m-0">Portin Reserved Status</label>
                        <div>
                            <div class="form-check form-check-inline">
                                <label class="form-check-label">
                                    {{ Form::radio('portin_reserved_status', 'yes', ['class' => 'form-check-input']) }}
                                    Yes
                                    <i class="input-frame"></i></label>
                            </div>
                            <div class="form-check form-check-inline">
                                <label class="form-check-label">
                                    {{ Form::radio('portin_reserved_status', 'no', null, ['class' => 'form-check-input']) }}
                                    No
                                    <i class="input-frame"></i></label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            {{ Form::submit('Create', ['class' => 'btn btn-primary mt-3 btn-lg float-right']) }}
            {{ Form::close() }}
        </div>
    </div>
@endsection

@push('plugin-styles')
    <link rel="stylesheet" href="{{ asset('assets/plugins/jquery-tags-input/jquery.tagsinput.min.css') }}">
@endpush

@push('plugin-scripts')
    <script src="{{ asset('assets/plugins/jquery-tags-input/jquery.tagsinput.min.js') }}"></script>
    <script src="{{ mix('js/pages/inventory.js') }}"></script>
@endpush
