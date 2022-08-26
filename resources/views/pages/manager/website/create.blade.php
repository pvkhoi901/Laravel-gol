@extends('layout.master')

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="">
            <h4 class="mt-0 header-title mb-3">CREATE WEBSITE CRAWL DATA</h4>
            {{ Form::model($model, ['route' => ['website.store']]) }}
                @include('pages.crawl_data.website.form', ['button' => 'Create'])
            {{ Form::close() }}
        </div>
    </div>
</div>
@endsection

@push('plugin-scripts')
@endpush
