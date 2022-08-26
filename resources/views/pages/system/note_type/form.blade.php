<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                @csrf
                <div class="form-group">
                    <label for="name">Note Type Name <span class="text-danger">*</span></label>
                    {{ Form::text('name', null, ['class' => 'form-control ', 'id' => 'name', 'placeholder' => 'Name', 'required' => true]) }}
                    @error('name')<span class="text-danger">{{ $message }}</span>@enderror
                </div>

                <div class="form-group">
                    <label for="notes">Notes <span class="text-danger">*</span></label>
                    {{ Form::textarea('notes', null, ['class' => 'form-control', 'id' => 'notes', 'placeholder' => 'Note']) }}
                    @error('notes')<span class="text-danger">{{ $message }}</span>@enderror
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
    <a class="btn btn-secondary" href="{{ route('note_type.index') }}">Cancel</a>
    <button class="btn btn-primary">{{ $button }}</button>
</div>
