@extends('layout.master')

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="container">
                <h4 class="mt-0 header-title mb-3">Rejection Reason Category Create</h4>
                {{Form::model($model, ['route' => ['rejection-reason-category.store']])}}
                @include('pages.system.rejection-reason-category.form', ['button' => 'Create'])
                {{Form::close() }}
            </div>
        </div>
    </div>
@endsection

@push('plugin-scripts')
@endpush

