@extends('layout.master')

@section('content')
<div class="content">
    <div class="container">
        <h4 class="mt-0 header-title mb-3">Payment Gateway Settings Edit</h4>
        {{ Form::model($model, ['route' => ['payment_gateway_setting.update', $model], 'method' => 'put', 'files' => false]) }}
        @include('pages.system.payment_gateway_setting.form', ['button' => 'Edit'])
        {{ Form::close() }}
    </div>
</div>
@endsection


@push('plugin-scripts')
<script src="{{ asset('assets/plugins/jquery-ui-dist/jquery-ui.min.js') }}"></script>

<script src="{{ asset('js/payment_gateway_setting/all.js') }}"></script>
@endpush