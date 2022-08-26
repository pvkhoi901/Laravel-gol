<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                @csrf
                <div class="form-group">
                    <label for="name">Parent Category </label>
                    {{ Form::select('category_id', $categories, null, ['class' => 'form-control select2', 'id' => 'category_id']) }}
                    @error('category_id')<span class="text-danger">{{ $message }}</span>@enderror
                </div>
                <div class="form-group">
                    <label for="name">Category type <span class="text-danger">*</span></label>
                    {{ Form::select('type', CATEGORY_TYPE, null, ['class' => 'form-control select2', 'id' => 'type']) }}
                    @error('type')<span class="text-danger">{{ $message }}</span>@enderror
                </div>
                <div class="form-group">
                    <label for="name">Title <span class="text-danger">*</span></label>
                    {{ Form::text('name', null, ['class' => 'form-control', 'id' => 'name', 'placeholder' => 'Name']) }}
                    @error('name')<span class="text-danger">{{ $message }}</span>@enderror
                </div>
                <div class="form-group">
                    <div class="custom-control custom-switch">
                        {{ Form::checkbox('display', true, null, ['class' => 'custom-control-input form-control-lg', 'id' => 'display']) }}
                        <label class="custom-control-label pt-1" for="display">Display</label>
                    </div>
                </div>
                <div class="form-group">
                    <div class="custom-control custom-switch">
                        {{ Form::checkbox('status', true, null, ['class' => 'custom-control-input form-control-lg', 'id' => 'status']) }}
                        <label class="custom-control-label pt-1" for="status">Status</label>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="form-group text-right mt-5">
    <a class="btn btn-secondary" href="{{ route('categories.index') }}">Cancel</a>
    <button class="btn btn-primary">{{ $button }}</button>
</div>
