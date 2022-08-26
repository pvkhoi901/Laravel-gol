@extends('layout.master')

@section('content')
    <div class="content">
        <div class="container">
            <h4 class="mt-0 header-title mb-3">Product Create</h4>
            {{ Form::open(['route' => ['products.store'], 'files' => true, 'class' => 'validate']) }}
            @include('pages.product_catalog.product.components.form', ['button' => 'Create'])
            {{ Form::close() }}
        </div>
    </div>
@endsection

@push('plugin-styles')
    <link rel="stylesheet" href="{{ asset('assets/plugins/file-upload/file-upload-with-preview.min.css') }}">
    <link href="{{ asset('assets/plugins/summernote/summernote-bs4.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/plugins/jquery-tags-input/jquery.tagsinput.min.css') }}">
@endpush

@push('plugin-scripts')
    <script src="{{ asset('assets/plugins/jquery-ui-dist/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/file-upload/file-upload-with-preview.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/summernote/summernote-bs4.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/jquery-tags-input/jquery.tagsinput.min.js') }}"></script>

    <script>
        const gallery = [];
    </script>

    <script src="{{ mix('js/pages/product.js') }}"></script>
@endpush