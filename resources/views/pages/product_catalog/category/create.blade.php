@extends('layout.master')

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="container">
                    <h4 class="mt-0 header-title mb-3">Category Create</h4>
                    {{ Form::model($model, ['route' => ['categories.store']]) }}
                        @include('pages.product_catalog.category.form', ['button' => 'Create'])
                    {{ Form::close() }}
            </div>
        </div>
    </div>
@endsection
