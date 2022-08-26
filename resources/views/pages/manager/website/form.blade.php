<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                @csrf
                {{ Form::text('plan_id', $model->id, ['class' => 'form-control ', 'id' => 'plan_id', 'placeholder' => 'plan_id' , "hidden" =>"hidden" ]) }}
                <div class="form-group">
                    <label for="url">
                    Url product <span class="text-danger">*</span></label>
                    {{ Form::text('url', null, ['class' => 'form-control ', 'id' => 'url', 'placeholder' => 'class', 'required' => false]) }}
                    @error('url')<span class="text-danger">{{ $message }}</span>@enderror
                </div>
                <div class="form-group">
                    <label for="target_product_name">Domain product <span class="text-danger">*</span></label>
                    {{ Form::text('domain', null, ['class' => 'form-control ', 'id' => 'target_product_name', 'placeholder' => '', 'required' => true]) }}
                    @error('target_product_name')<span class="text-danger">{{ $message }}</span>@enderror
                </div>
                <div class="form-group">
                    <label for="target_product_name">Target name product <span class="text-danger">*</span></label>
                    {{ Form::text('target_product_name', null, ['class' => 'form-control ', 'id' => 'target_product_name', 'placeholder' => 'class', 'required' => true]) }}
                    @error('target_product_name')<span class="text-danger">{{ $message }}</span>@enderror
                </div>
                <div class="form-group">
                    <label for="name">
                    Target images product </label>
                    {{ Form::text('target_image', null, ['class' => 'form-control ', 'id' => 'target_image', 'placeholder' => 'class', 'required' => false]) }}
                    @error('target_image')<span class="text-danger">{{ $message }}</span>@enderror
                </div>
                <div class="form-group">
                    <label for="name">
                    Target price product </label>
                    {{ Form::text('target_price', null, ['class' => 'form-control ', 'id' => 'target_price', 'placeholder' => 'class', 'required' => false]) }}
                    @error('target_price')<span class="text-danger">{{ $message }}</span>@enderror
                </div>
                <div class="form-group">
                    <label for="target_brand">
                    Target brand product </label>
                    {{ Form::text('target_brand', null, ['class' => 'form-control ', 'id' => 'target_brand', 'placeholder' => 'class', 'required' => false]) }}
                    @error('target_brand')<span class="text-danger">{{ $message }}</span>@enderror
                </div>
            </div>
        </div>
    </div>
</div>
<div class="form-group text-right mt-5">
    <a class="btn btn-secondary" href="{{ route('website.index') }}">Cancel</a>
    <button class="btn btn-primary">{{ $button }}</button>
</div>


<div class="modal fade" id="showPopUpSoc" tabindex="-1" role="dialog" aria-labelledby="showPopUpSocLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="showPopUpSocLabel">List SOC</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body modal_body_soc_state">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>