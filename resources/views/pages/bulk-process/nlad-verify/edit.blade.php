@extends('layout.master')

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="container">
                <h4 class="mt-0 header-title mb-3">NLAD Verify Update</h4>
                {{Form::model($model, ['route' => ['nlad-verify.update', $model], 'method' => 'put'])}}
                @include('pages.bulk-process.nlad-verify.form', ['button' => 'Update'])
                {{Form::close() }}
            </div>
        </div>
    </div>
@endsection

@push('plugin-scripts')
@endpush

