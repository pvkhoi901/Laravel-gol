@extends('layout.master')

@section('content')
<div class="content">
    <div class="container">
        <h4 class="mt-0 header-title mb-3">Shipping partner Add</h4>
        {{ Form::model($model, ['route' => ['shipping-partners.store']]) }}
        @include('pages.system.shipping-partner.form', ['button' => 'Add'])
        {{ Form::close() }}
    </div>
</div>
@endsection


@push('plugin-scripts')
<script src="{{ asset('assets/plugins/jquery-ui-dist/jquery-ui.min.js') }}"></script>

<script src="{{ asset('js/shipping-partners/all.js') }}"></script>
@endpush