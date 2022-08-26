@extends('layout.master')

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="container">
                <h4 class="mt-0 header-title mb-3">Attribute Create</h4>
                {{ Form::model($model, ['route' => ['attributes.store']]) }}
                    @include('pages.product_catalog.attribute.form', ['button' => 'Create'])
                {{ Form::close() }}
            </div>
        </div>
    </div>
@endsection
