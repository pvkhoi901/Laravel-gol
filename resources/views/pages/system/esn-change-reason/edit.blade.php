@extends('layout.master')

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="container">
                <h4 class="mt-0 header-title mb-3">Esn Change Reason Update</h4>
                {{Form::model($model, ['route' => ['esn-change-reason.update', $model], 'method' => 'put'])}}
                @include('pages.system.esn-change-reason.form', ['button' => 'Update'])
                {{Form::close()}}
            </div>
        </div>
    </div>
@endsection

@push('plugin-scripts')
@endpush

