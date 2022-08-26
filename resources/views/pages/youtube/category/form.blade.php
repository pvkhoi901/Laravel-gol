<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                @csrf
                {{ Form::text('plan_id', $model->id, ['class' => 'form-control ', 'id' => 'plan_id', 'placeholder' => 'plan_id' , "hidden" =>"hidden" ]) }}
                <div class="form-group">
                    <label for="id_youtube">
                        ID Youtube <span class="text-danger">*</span></label>
                    {{ Form::select('id_youtube', \App\Models\YoutubeCategory::CATEGORY_YOUTUBE, null, ['class' => 'form-control select2', 'id' => 'id_youtube']) }}
                    @error('id_youtube')<span class="text-danger">{{ $message }}</span>@enderror
                </div>
                <div class="form-group">
                    <label for="name_vn">Name VN <span class="text-danger">*</span></label>
                    {{ Form::text('name_vn', null, ['class' => 'form-control ', 'id' => 'name_vn', 'placeholder' => 'VETV7 ESPORTS', 'required' => true]) }}
                    @error('name_vn')<span class="text-danger">{{ $message }}</span>@enderror
                </div>
                <div class="form-group">
                    <label for="name_en">Name EN</label>
                    {{ Form::text('name_en', null, ['class' => 'form-control ', 'id' => 'name_en', 'placeholder' => 'VETV7 ESPORTS', 'required' => false]) }}
                    @error('name_en')<span class="text-danger">{{ $message }}</span>@enderror
                </div>
                <div class="form-group">
                    <label for="name_ko">Name KR</label>
                    {{ Form::text('name_ko', null, ['class' => 'form-control ', 'id' => 'name_ko', 'placeholder' => 'VETV7 ESPORTS', 'required' => false]) }}
                    @error('name_ko')<span class="text-danger">{{ $message }}</span>@enderror
                </div>
                <div class="form-group">
                    <label for="name_cn">Name CN</label>
                    {{ Form::text('name_cn', null, ['class' => 'form-control ', 'id' => 'name_cn', 'placeholder' => 'VETV7 ESPORTS', 'required' => false]) }}
                    @error('name_cn')<span class="text-danger">{{ $message }}</span>@enderror
                </div>
                <div class="form-group">
                    <label for="numerical_order">No.</label>
                    {{ Form::text('numerical_order', null, ['class' => 'form-control ', 'id' => 'numerical_order', 'placeholder' => '1', 'required' => false]) }}
                    @error('numerical_order')<span class="text-danger">{{ $message }}</span>@enderror
                </div>
                <div class="form-group">
                    <div class="custom-control custom-switch">
                        {{ Form::checkbox('status', true,$model->status == '0' ? false : true, ['class' => 'custom-control-input form-control-lg', 'id' => 'status']) }}
                        <label class="custom-control-label pt-1" for="status">Status</label>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="form-group text-right mt-5">
    <a class="btn btn-secondary" href="{{ route('website.index') }}">Cancel</a>
    <button class="btn btn-primary">{{ $button }}</button>
</div>


<div class="modal fade" id="showPopUpSoc" tabindex="-1" role="dialog" aria-labelledby="showPopUpSocLabel" aria-hidden="true">
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