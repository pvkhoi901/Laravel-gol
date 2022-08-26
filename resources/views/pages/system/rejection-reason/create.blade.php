@extends('layout.master')

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="container">
                <h4 class="mt-0 header-title mb-3">Rejection Reason Create</h4>
                {{Form::model($model, ['route' => ['rejection-reason.store']])}}
                @include('pages.system.rejection-reason.form', ['button' => 'Create'])
                {{Form::close()}}
            </div>
        </div>
    </div>
@endsection

@push('plugin-scripts')
@endpush

