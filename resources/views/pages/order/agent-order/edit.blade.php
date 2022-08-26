@extends('layout.master')

@section('content')
    <div class="content">
        <div class="container">
            <h4 class="mt-0 header-title mb-3">Agent Order Update</h4>
            {{ Form::model($model, ['route' => ['agent-orders.update', $model->id], 'class' => 'validate', 'method' => 'put']) }}
            @include('pages.order.agent-order.components.form')
            {{ Form::submit('Update', ['class' => 'btn btn-primary mt-3 btn-lg float-right']) }}
            {{ Form::close() }}
        </div>
    </div>
@endsection

@push('plugin-styles')
@endpush

@push('plugin-scripts')
@endpush
