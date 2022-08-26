<div class="row">
    <div class="col-md-8">
        <div class="card">
            <div class="card-body">
                <div class="form-group">
                    <label for="name">Model Name <span class="text-danger">*</span></label>
                    {{ Form::text('name', null, ['class' => 'form-control form-control-lg', 'id' => 'name', 'placeholder' => 'Model name', 'required' => true]) }}
                    @error('name')<span class="text-danger">{{ $message }}</span>@enderror
                </div>
                <div class="form-group">
                    <label for="description">Description</label>
                    {{ Form::text('description', null, ['class' => 'form-control form-control-lg', 'id' => 'description', 'placeholder' => 'Description...']) }}
                    @error('description')<span class="text-danger">{{ $message }}</span>@enderror
                </div>
                <div class="form-group">
                    <div class="custom-file-container" data-upload-id="galleryUpload">
                        <label>Gallery <a href="javascript:void(0)" class="custom-file-container__image-clear"
                                title="Clear Image">&times;</a></label>
                        <label class="custom-file-container__custom-file">
                            {{ Form::file('gallery[]', ['class' => 'custom-file-container__custom-file__custom-file-input form-control file-upload-info', 'accept' => 'image/*', 'required' => $button === 'Create', 'multiple' => true]) }}
                            <input type="hidden" name="MAX_FILE_SIZE" value="10485760" />
                            <span class="custom-file-container__custom-file__custom-file-control"></span>
                        </label>
                        @error('gallery')<span class="text-danger">{{ $message }}</span>@enderror
                        <div class="custom-file-container__image-preview" id="gallery-sortable-container"></div>
                    </div>
                </div>
                {{-- @include('pages.product_catalog.product.components.variant') --}}
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <div class="form-group">
                    <label for="status">Status</label>
                    <div class="custom-control custom-switch">
                        {{ Form::checkbox('status', true, true, ['class' => 'custom-control-input form-control-lg', 'id' => 'status']) }}
                        <label class="custom-control-label pt-1" for="status">Active</label>
                    </div>
                </div>
                <div class="form-group">
                    <label for="screen">Screen <span class="text-danger">*</span></label>
                    {{ Form::select(
                        'screen',
                        [
                            '4.7' => '4.7',
                            '5.5' => '5.5',
                        ],
                        null,
                        ['class' => 'form-control form-control-lg', 'id' => 'screen', 'placeholder' => 'Select', 'required' => true],
                    ) }}
                    @error('screen')<span class="text-danger">{{ $message }}</span>@enderror
                </div>
                <div class="form-group">
                    <label for="brand_id">Brand <span class="text-danger">*</span></label>
                    {{ Form::select('brand_id', $brands, null, ['class' => 'form-control form-control-lg select2', 'placeholder' => 'Select', 'id' => 'brand_id', 'required' => true]) }}
                    @error('brand_id')<span class="text-danger">{{ $message }}</span>@enderror
                </div>
                <div class="form-group">
                    <label for="category_id">Category <span class="text-danger">*</span></label>
                    {{ Form::select('category_id', $categories, null, ['class' => 'form-control form-control-lg select2', 'placeholder' => 'Select', 'id' => 'category_id', 'required' => true]) }}
                    @error('category_id')<span class="text-danger">{{ $message }}</span>@enderror
                </div>
                <div class="form-group">
                    <label for="data_capable">Data Capable <span class="text-danger">*</span></label>
                    {{ Form::select('data_capable', $dataCapableList, null, ['class' => 'form-control form-control-lg select2', 'placeholder' => 'Select', 'id' => 'data_capable', 'required' => true]) }}
                    @error('data_capable')<span class="text-danger">{{ $message }}</span>@enderror
                </div>
                <div class="form-group">
                    <label for="device_type">Device Type <span class="text-danger">*</span></label>
                    {{ Form::select('device_type', $deviceList, null, ['class' => 'form-control form-control-lg select2', 'placeholder' => 'Select', 'id' => 'device_type', 'required' => true]) }}
                    @error('device_type')<span class="text-danger">{{ $message }}</span>@enderror
                </div>
                <div class="form-group">
                    <label for="os">OS <span class="text-danger">*</span></label>
                    {{ Form::select('os', $osList, null, ['class' => 'form-control form-control-lg select2', 'placeholder' => 'Select', 'id' => 'os', 'required' => true]) }}
                    @error('os')<span class="text-danger">{{ $message }}</span>@enderror
                </div>
                <div class="form-group">
                    <label for="supplier_id">Supplier <span class="text-danger">*</span></label>
                    {{ Form::select('supplier_id', $suppliers, null, ['class' => 'form-control form-control-lg select2', 'placeholder' => 'Select', 'id' => 'supplier_id', 'required' => true]) }}
                    @error('supplier_id')<span class="text-danger">{{ $message }}</span>@enderror
                </div>
            </div>
        </div>
    </div>
</div>
<div class="form-group text-right mt-4">
    <button class="btn btn-primary btn-lg">{{ $button }}</button>
</div>
