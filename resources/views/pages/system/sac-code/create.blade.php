@extends('layout.master')

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="container">
                <h4 class="mt-0 header-title mb-3">SAC Code Create</h4>
                {{ Form::model($model, ['route' => ['sac-code.store']]) }}
                @include('pages.system.sac-code.form', ['button' => 'Create'])
                {{ Form::close() }}
            </div>
        </div>
    </div>
@endsection

@push('plugin-scripts')
@endpush

