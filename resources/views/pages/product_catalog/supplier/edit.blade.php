@extends('layout.master')

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="container">
                <h4 class="mt-0 header-title mb-3">Supplier Edit</h4>
                {{ Form::model($model, ['route' => ['suppliers.update', $model], 'method' => 'put']) }}
                    @include('pages.product_catalog.supplier.form', ['button' => 'Edit'])
                {{ Form::close() }}
            </div>
        </div>
    </div>
@endsection
