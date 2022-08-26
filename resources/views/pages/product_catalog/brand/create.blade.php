@extends('layout.master')

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="container">
                <h4 class="mt-0 header-title mb-3">Brand Create</h4>
                {{ Form::model($model, ['route' => ['brands.store']]) }}
                    @include('pages.product_catalog.brand.form', ['button' => 'Create'])
                {{ Form::close() }}
            </div>
        </div>
    </div>
@endsection
