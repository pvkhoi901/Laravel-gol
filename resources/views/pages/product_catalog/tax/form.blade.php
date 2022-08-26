<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">
                @csrf
                <div class="form-group">
                    <label for="name">Name <span class="text-danger">*</span></label>
                    {{ Form::text('name', null, ['class' => 'form-control', 'id' => 'name', 'placeholder' => 'Name']) }}
                    @error('name')<span class="text-danger">{{ $message }}</span>@enderror
                </div>
                <div class="form-group">
                    <label for="name">Value (%) <span class="text-danger">*</span></label>
                    {{ Form::text('value', null, ['class' => 'form-control', 'id' => 'value', 'placeholder' => 'Value']) }}
                    @error('value')<span class="text-danger">{{ $message }}</span>@enderror
                </div>
            </div>
        </div>
    </div>
</div>
<div class="form-group text-right mt-5">
    <a class="btn btn-secondary" href="{{ route('taxes.index') }}">Cancel</a>
    <button class="btn btn-primary">{{ $button }}</button>
</div>
