<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-body">
                @csrf
                {{ Form::hidden('id', null) }}
                <div class="form-group">
                    <label for="model_name">Model Name <span class="text-danger">*</span></label>
                    {{ Form::text('model_name', null, ['class' => 'form-control', 'id' => 'model_name', 'placeholder' => 'Model name']) }}
                    @error('model_name')<span class="text-danger">{{ $message }}</span>@enderror
                </div>
                <div class="form-group">
                    <label for="name">SKU <span class="text-danger">*</span></label>
                    {{ Form::text('sku', null, ['class' => 'form-control', 'id' => 'sku', 'placeholder' => 'Only characters in the group: "A-Z", "a-z", "0-9" and "-_"']) }}
                    @error('sku')<span class="text-danger">{{ $message }}</span>@enderror
                </div>
                <div class="form-group">
                    <label for="name">Screen <span class="text-danger">*</span></label>
                    {{ Form::text('screen', null, ['class' => 'form-control', 'id' => 'sku', 'placeholder' => 'Only 1 decimal number will be applied: "4.7" or "5.5"']) }}
                    @error('screen')<span class="text-danger">{{ $message }}</span>@enderror
                </div>
                <div class="form-group">
                    <label for="name">Price</label>
                    {{ Form::text('price', null, ['class' => 'form-control', 'id' => 'price', 'placeholder' => 'Price']) }}
                    @error('price')<span class="text-danger">{{ $message }}</span>@enderror
                </div>
                @include('layout.attribute', ['model' => $model])
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <div class="form-group">
                    <label for="name">Status</label>
                    <div class="custom-control custom-switch">
                        {{ Form::checkbox('status', true, null, ['class' => 'custom-control-input form-control-lg', 'id' => 'status']) }}
                        <label class="custom-control-label pt-1" for="status">Active</label>
                    </div>
                </div>
                <div class="form-group">
                    <label for="name">Brand <span class="text-danger">*</span></label>
                    {{ Form::select('brand_id', $brands, null, ['class' => 'form-control form-control-lg select2', 'id' => 'brand_id', 'required' => true]) }}
                    @error('brand_id')<span class="text-danger">{{ $message }}</span>@enderror
                </div>
                <div class="form-group">
                    <label for="name">Category <span class="text-danger">*</span></label>
                    {{ Form::select('category_id', $categories, null, ['class' => 'form-control form-control-lg select2', 'id' => 'category_id', 'required' => true]) }}
                    @error('category_id')<span class="text-danger">{{ $message }}</span>@enderror
                </div>
                <div class="form-group">
                    <label for="data_capable">Data Capable <span class="text-danger">*</span></label>
                    {{ Form::select('data_capable', $dataCapableList, null, ['class' => 'form-control form-control-lg select2', 'id' => 'data_capable', 'required' => true]) }}
                    @error('data_capable')<span class="text-danger">{{ $message }}</span>@enderror
                </div>
                <div class="form-group">
                    <label for="os">OS <span class="text-danger">*</span></label>
                    {{ Form::select('os', $osList, null, ['class' => 'form-control form-control-lg select2', 'id' => 'os', 'required' => true]) }}
                    @error('os')<span class="text-danger">{{ $message }}</span>@enderror
                </div>
                <div class="form-group">
                    <label for="name">Supplier <span class="text-danger">*</span></label>
                    {{ Form::select('supplier_id', $suppliers, null, ['class' => 'form-control form-control-lg select2', 'id' => 'supplier_id', 'required' => true]) }}
                    @error('supplier_id')<span class="text-danger">{{ $message }}</span>@enderror
                </div>
                <div class="form-group">
                    <label for="name">Tax </label>
                    {{ Form::select('tax_id', $taxes, null, ['class' => 'form-control form-control-lg select2', 'id' => 'tax']) }}
                    @error('tax_id')<span class="text-danger">{{ $message }}</span>@enderror
                </div>
            </div>
        </div>
    </div>
</div>
<div class="form-group text-right mt-5">
    <a class="btn btn-secondary" href="{{ route('accessories.index') }}">Cancel</a>
    <button class="btn btn-primary">{{ $button }}</button>
</div>
