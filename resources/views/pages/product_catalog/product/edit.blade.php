@extends('layout.master')

@section('content')
    <div class="content">
        <div class="container">
            <h4 class="mt-0 header-title mb-3">{{ $product->name }}</h4>

            <ul class="nav nav-tabs nav-tabs-line" id="lineTab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link active" id="product-tab" data-toggle="tab" href="#home" role="tab"
                        aria-controls="home" aria-selected="true">Product</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" id="variant-tab" data-toggle="tab" href="#variant" role="tab"
                        aria-controls="variant" aria-selected="false">Variants ({{ $product->variants->count() }})</a>
                </li>
            </ul>
            <div class="tab-content mt-3" id="lineTabContent">
                <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="product-tab">
                    {{ Form::model($product, ['route' => ['products.update', $product->id], 'method' => 'put', 'files' => true]) }}
                    @include('pages.product_catalog.product.components.form', ['button' => 'Update'])
                    {{ Form::close() }}
                </div>
                <div class="tab-pane fade" id="variant" role="tabpanel" aria-labelledby="variant-tab">
                    @include('pages.product_catalog.product.variant.edit')
                </div>
            </div>
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
        const variantUpdateUrl = "{{ route('product-variants.update_modal', 'variantId') }}";
    </script>

    <script src="{{ mix('js/pages/product.js') }}"></script>
    <script src="{{ mix('js/pages/product-variant.js') }}"></script>
@endpush
