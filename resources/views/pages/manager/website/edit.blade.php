@extends('layout.master')

@section('content')
<div class="content">
    <div class="container-fluid">
        <h4 class="mt-0 header-title mb-3">WEBSITE CRAWL DATA EDIT</h4>
        {{ Form::model($model, ['route' => ['website.update', $model], 'method' => 'put']) }}
        @include('pages.crawl_data.website.form', ['button' => 'Edit'])
        {{ Form::close() }}
    </div>
</div>
@endsection


@push('plugin-styles')
{{-- <link href="{{ mix('css/custom.css') }}" rel="stylesheet" /> --}}
@endpush

@push('plugin-scripts')
@endpush