@extends('layout.master')

@section('content')
    <div class="content">
        <div class="container">
            <h4 class="mt-0 header-title mb-3">{{ $product->name }}</h4>
            <div class="form-group">
                <label>Variants</label>
                <div id="variants">
                    <div class="variant">
                        <div class="form-group row">
                            <div class="col-sm-3">
                                {{ Form::select('attr_1', $attributes, null, ['class' => 'form-control form-control-lg', 'placeholder' => 'Select', 'required' => true]) }}
                            </div>
                            <div class="col-sm-9">
                                {{ Form::text('values_1', null, ['class' => 'form-control form-control-lg', 'id' => 'values_1', 'disabled' => true]) }}
                            </div>
                        </div>
                    </div>
                    <div class="variant">
                        <div class="form-group row">
                            <div class="col-sm-3">
                                {{ Form::select('attr_2', $attributes, null, ['class' => 'form-control form-control-lg', 'placeholder' => 'Select']) }}
                            </div>
                            <div class="col-sm-9">
                                {{ Form::text('values_2', null, ['class' => 'form-control form-control-lg', 'id' => 'values_2', 'disabled' => true]) }}
                            </div>
                        </div>
                    </div>
                    <div class="variant">
                        <div class="form-group row">
                            <div class="col-sm-3">
                                {{ Form::select('attr_3', $attributes, null, ['class' => 'form-control form-control-lg', 'placeholder' => 'Select']) }}
                            </div>
                            <div class="col-sm-9">
                                {{ Form::text('values_3', null, ['class' => 'form-control form-control-lg', 'id' => 'values_3', 'disabled' => true]) }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <h6 class="card-title m-0">Preview</h6>
                </div>
                {{ Form::open(['route' => ['product-variants.store', $product->id], 'class' => 'variant-form validate', 'method' => 'post']) }}
                <div>
                    <div class="table-responsive">
                        <table class="table table-hover" id="variant-preview">
                            <thead>
                                <tr>
                                    <th width="30"></th>
                                    <th id="attr_1">Attr 1</th>
                                    <th id="attr_2">Attr 2</th>
                                    <th id="attr_3">Attr 3</th>
                                    <th>Quantity</th>
                                    <th>Retail Price</th>
                                    <th>New-Enroll Price</th>
                                    <th>Existing Price</th>
                                    <th>Agent Price</th>
                                </tr>
                            </thead>
                            <tbody></tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer d-flex justify-content-between">
                    <div></div>
                    <button type="submit" class='btn btn-primary'>Create</button>
                </div>
                {{ Form::close() }}
            </div>
        </div>
    </div>
@endsection

@push('plugin-styles')
    <link rel="stylesheet" href="{{ asset('assets/plugins/jquery-tags-input/jquery.tagsinput.min.css') }}">
@endpush

@push('plugin-scripts')
    <script src="{{ asset('assets/plugins/jquery-tags-input/jquery.tagsinput.min.js') }}"></script>
    <script src="{{ mix('js/pages/product-variant.js') }}"></script>
@endpush
