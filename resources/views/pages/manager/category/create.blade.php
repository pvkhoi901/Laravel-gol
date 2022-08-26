@extends('layout.master')

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="container">
            <h4 class="mt-0 header-title mb-3">Category Api Create</h4>
            {{ Form::model($model, ['route' => ['categoryapi.store']]) }}
            @include('pages.manager.category.form', ['button' => 'Create'])
            {{ Form::close() }}
        </div>
    </div>
</div>
@endsection
