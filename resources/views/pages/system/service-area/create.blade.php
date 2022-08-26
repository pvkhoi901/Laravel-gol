@extends('layout.master')

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="container">
                <h4 class="mt-0 header-title mb-3">Service Area Create</h4>
                {{ Form::model($model, ['route' => ['service-area.store']]) }}
                @include('pages.system.service-area.form', ['button' => 'Create / Update'])
                {{ Form::close() }}
            </div>
        </div>
    </div>
@endsection


@push('plugin-scripts')
@endpush

