@extends('layout.master')

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="">
            <h4 class="mt-0 header-title mb-3">YOUTUBE CATEGORY CREATE</h4>
            {{ Form::model($model, ['route' => ['category.store']]) }}
                @include('pages.youtube.category.form', ['button' => 'Create'])
            {{ Form::close() }}
        </div>
    </div>
</div>
@endsection
