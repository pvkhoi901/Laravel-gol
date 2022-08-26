@extends('layout.master')

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="container">
                <h4 class="mt-0 header-title mb-3">Rejection Reason Category Update</h4>
                {{Form::model($model, ['route' => ['rejection-reason-category.update', $model], 'method' => 'put'])}}
                @include('pages.system.rejection-reason-category.form', ['button' => 'Update'])
                {{Form::close()}}
            </div>
        </div>
    </div>
@endsection

@push('plugin-scripts')
@endpush

