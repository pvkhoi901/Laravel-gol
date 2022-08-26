@if (!empty($order_agent))
<div class="card">
    <div class="card-header">
        <div class="d-flex justify-content-between align-items-baseline">
            <h6 class="card-title mb-0">Order Products</h6>
            <button class="btn btn-outline-primary btn-icon float-right add-order-phone" data-toggle="modal" data-target="#phoneOrderModal">
                <i class="fas fa-plus"></i>
            </button>
        </div>
    </div>
    <div class="card-body">
        <ul class="list-group list-group-flush">
            @forelse ($order_agent->order_phones as $order_phone)
                <li class="list-group-item">
                    <div class="row">
                        <div class="col-8">
                            <a href="{{ route('products.edit', $order_phone->phone_variant->product) }}" target="_blank">
                                <h5 class="d-inline">{{ $order_phone->phone_variant->name }}</h5>
                            </a>
                        </div>
                        <div class="col-4 text-right pt-1">
                            <a href="javascript:;" class="btn btn-icon btn-link text-danger text-right delete-order-phone" data-url="{{ route('agent-order-phones.destroy', $order_phone) }}">
                                <i class="fas fa-trash"></i>
                            </a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-8">Quantity:</div>
                        <div class="col-4 text-right">
                            {{ $order_phone->quantity }}
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-8">Committed Quantity:</div>
                        <div class="col-4 text-right">{{ 0 }}</div>
                    </div>
                    <div class="row">
                        <div class="col-8">Area code:</div>
                        <div class="col-4 text-right">{{ $order_phone->area_code->state }} - {{ $order_phone->area_code->area_code }}</div>
                    </div>
                    <div class="row">
                        <div class="col-8">Tribal:</div>
                        <div class="col-4 text-right">{{ $order_phone->is_tribal ? 'Yes' : 'No' }}</div>
                    </div>
                    <div class="row">
                        <div class="col-8">Carrier:</div>
                        <div class="col-4 text-right">{{ CARRIER[$order_phone->carrier] ?? '' }}</div>
                    </div>
                </li>
            @empty
                No product
            @endforelse
        </ul>
    </div>
</div>

<div class="modal fade" id="phoneOrderModal" tabindex="-1" aria-labelledby="phoneOrderModalTitle" aria-hidden="true"
    style="display: none;">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="phoneOrderModalTitle">Add Product</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            {!! Form::open(['url' => route('agent-order-phones.store'), 'class' => 'validate']) !!}
            <div class="modal-body">
                {{ Form::hidden('order_agent_id', $order_agent->id) }}
                <div class="form-group">
                    {{ Form::label('phone_type', 'Phone type', ['class' => 'control-label required']) }}
                    {{ Form::select('phone_type', $categories, null, ['class' => 'select2', 'id' => 'phone-type', 'placeholder' => 'Select', 'data-url' => route('products.list_by_category', 'category_id'), 'required' => true]) }}
                </div>
                <div class="form-group">
                    {{ Form::label('product_variant_id', 'Phone Name', ['class' => 'control-label required']) }}
                    {{ Form::select('product_variant_id', [], null, ['class' => 'select2', 'id' => 'product_variant_id', 'placeholder' => 'Select', 'required' => true, 'data-url' => route('agent-order-phones.get_product_variants')]) }}
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            {{ Form::label('quantity', 'Quantity', ['class' => 'control-label required']) }}
                            {{ Form::number('quantity', null, ['class' => 'form-control form-control-lg', 'required' => true]) }}
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            {{ Form::label('price', 'Price', ['class' => 'control-label required']) }}
                            {{ Form::number('price', null, ['class' => 'form-control form-control-lg', 'required' => true, 'data-url' => route('agent-order-phones.get_product_variant_price')]) }}
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <div class="form-group">
                            {{ Form::label('area_code_id', null, ['class' => 'control-label required']) }}
                            {{ Form::select('area_code_id', $area_codes, null, ['class' => 'form-control form-control-lg select2', 'required' => true, 'placeholder' => 'Please select']) }}
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="form-group">
                            {{ Form::label('carrier', null, ['class' => 'control-label required']) }}
                            {{ Form::select('carrier', WHOLE_SALSE, null, ['class' => 'form-control form-control-lg select2', 'required' => true, 'placeholder' => 'Please select']) }}
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="custom-control custom-switch">
                        {{ Form::checkbox('is_tribal', true, false, ['class' => 'custom-control-input form-control-lg', 'id' => 'is_tribal']) }}
                        <label class="custom-control-label pt-1" for="is_tribal">Is tribal order</label>
                    </div>
                </div>
            </div>
            <div class="modal-footer text-right">
                {{ Form::submit('Add', ['class' => 'btn btn-primary']) }}
            </div>
            {!! Form::close() !!}
        </div>
    </div>
</div>
@endif
