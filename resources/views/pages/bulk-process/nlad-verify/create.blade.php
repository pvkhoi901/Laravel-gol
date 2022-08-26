@extends('layout.master')

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="container">
                <h4 class="mt-0 header-title mb-3">NLAD Verify Create</h4>
                {{Form::model($model, ['route' => ['nlad-verify.store'], 'files' => true])}}
                @include('pages.bulk-process.nlad-verify.form', ['button' => 'Submit'])
                {{Form::close()}}
            </div>
        </div>
    </div>
@endsection

@push('plugin-scripts')
@endpush

