@extends('layout.master')

@section('content')
    <div class="content">
        <div class="container">
            <h4 class="mt-0 header-title mb-3">Product Edit</h4>
            {{ Form::model($model, ['route' => ['products.update', $model], 'method' => 'put', 'files' => true]) }}
            @include('product_catalog.product.form', ['button' => 'Edit'])
            {{ Form::close() }}
        </div>
    </div>
@endsection

@push('plugin-styles')
    <link rel="stylesheet" href="{{ asset('assets/plugins/file-upload/file-upload-with-preview.min.css') }}">
    <link href="{{ asset('assets/plugins/summernote/summernote-bs4.min.css') }}" rel="stylesheet">
@endpush

@push('plugin-scripts')
    <script src="{{ asset('assets/plugins/jquery-ui-dist/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/file-upload/file-upload-with-preview.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/summernote/summernote-bs4.min.js') }}"></script>
    <script>
        const gallery = @json($gallery);
    </script>
    <script src="{{ asset('js/product/all.js') }}"></script>
@endpush
