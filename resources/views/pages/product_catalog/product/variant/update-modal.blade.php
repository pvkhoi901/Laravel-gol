{{ Form::model($variant, ['route' => ['product-variants.update', $variant->id], 'method' => 'put']) }}
@csrf
<div class="modal-body">
    <div class="row">
        <div class="col-sm-6">
            <div class="form-group">
                {{ Form::label('sku') }}
                {{ Form::text('sku', null, ['class' => 'form-control', 'required' => true, 'readonly' => true]) }}
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group">
                {{ Form::label('barcode') }}
                {{ Form::text('barcode', null, ['class' => 'form-control', 'required' => true, 'readonly' => true]) }}
            </div>
        </div>
    </div>
    <div class="form-group">
        {{ Form::label('option_1', $variant->product->attr_one->name) }}
        {{ Form::text('option_1', null, ['class' => 'form-control', 'required' => true]) }}
    </div>

    @if ($variant->product->attr_two)
        <div class="form-group">
            {{ Form::label('option_2', $variant->product->attr_two->name) }}
            {{ Form::text('option_2', null, ['class' => 'form-control', 'required' => true]) }}
        </div>
    @endif

    @if ($variant->product->attr_three)
        <div class="form-group">
            {{ Form::label('option_3', $variant->product->attr_three->name) }}
            {{ Form::text('option_3', null, ['class' => 'form-control', 'required' => true]) }}
        </div>
    @endif

    <div class="row">
        <div class="col-sm-6">
            <div class="form-group">
                {{ Form::label('quantity') }}
                {{ Form::number('quantity', null, ['class' => 'form-control', 'required' => true]) }}
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-6">
            <div class="form-group">
                {{ Form::label('retail_price') }}
                {{ Form::number('retail_price', $variant->retail_price->price ?? 0, ['class' => 'form-control', 'required' => true]) }}
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group">
                {{ Form::label('ne_price', 'New Enroll Price') }}
                {{ Form::number('ne_price', $variant->ne_price->price ?? 0, ['class' => 'form-control', 'required' => true]) }}
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-6">
            <div class="form-group">
                {{ Form::label('existing_price') }}
                {{ Form::number('existing_price', $variant->existing_price->price ?? 0, ['class' => 'form-control', 'required' => true]) }}
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group">
                {{ Form::label('agent_price') }}
                {{ Form::number('agent_price', $variant->agent_price->price ?? 0, ['class' => 'form-control', 'required' => true]) }}
            </div>
        </div>
    </div>
    <div class="form-group mb-0">
        <div class="form-check form-check-inline">
            <label class="form-check-label">
                {{ Form::radio('status', 'active', null, ['class' => 'form-check-input']) }}
                Active
                <i class="input-frame"></i></label>
        </div>
        <div class="form-check form-check-inline">
            <label class="form-check-label">
                {{ Form::radio('status', 'inactive', null, ['class' => 'form-check-input']) }}
                Inactive
                <i class="input-frame"></i></label>
        </div>
    </div>
</div>
<div class="modal-footer d-flex justify-content-between">
    <a class="btn btn-secondary" data-dismiss="modal">Close</a>
    {{ Form::submit('Save Changes', ['class' => 'btn btn-primary']) }}
</div>
{{ Form::close() }}
