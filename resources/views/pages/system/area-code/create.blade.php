@extends('layout.master')

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="container">
                <h4 class="mt-0 header-title mb-3">Area Code Create</h4>
                {{ Form::model($model, ['route' => ['area-code.store']]) }}
                @include('pages.system.area-code.form', ['button' => 'Create'])
                {{ Form::close() }}
            </div>
        </div>
    </div>
@endsection

@push('plugin-scripts')
@endpush

