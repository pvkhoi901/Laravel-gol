@extends('layout.master')

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="container">
                <h4 class="mt-0 header-title mb-3">Tax Edit</h4>
                {{ Form::model($model, ['route' => ['taxes.update', $model], 'method' => 'put']) }}
                    @include('pages.product_catalog.tax.form', ['button' => 'Edit'])
                {{ Form::close() }}
            </div>
        </div>
    </div>
@endsection
