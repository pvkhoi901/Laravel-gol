@extends('layout.master')

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="container">
                <h4 class="mt-0 header-title mb-3">Accessory Create</h4>
                {{ Form::model($model, ['route' => ['accessories.store']]) }}
                    @include('pages.product_catalog.accessory.form', ['button' => 'Create'])
                {{ Form::close() }}
            </div>
        </div>
    </div>
@endsection
