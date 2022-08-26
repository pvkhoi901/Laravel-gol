@extends('layout.master')

@section('content')
    <div class="content">
        <div class="container">
            <h4 class="mt-0 header-title mb-3">Agent Order Create</h4>
            {{ Form::open(['route' => ['agent-orders.store'], 'class' => 'validate']) }}
            @include('pages.order.agent-order.components.form')
            {{ Form::submit('Create', ['class' => 'btn btn-primary mt-3 btn-lg float-right']) }}
            {{ Form::close() }}
        </div>
    </div>
@endsection

@push('plugin-styles')
@endpush

@push('plugin-scripts')
@endpush
