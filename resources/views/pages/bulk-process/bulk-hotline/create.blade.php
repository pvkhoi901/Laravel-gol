@extends('layout.master')

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="container">
                <h4 class="mt-0 header-title mb-3">Bulk Hotline Create</h4>
                {{Form::model($model, ['route' => ['bulk-hotline.store'], 'files' => true])}}
                @include('pages.bulk-process.bulk-hotline.form', ['button' => 'Create'])
                {{Form::close()}}
            </div>
        </div>
    </div>
@endsection

@push('plugin-scripts')
@endpush

