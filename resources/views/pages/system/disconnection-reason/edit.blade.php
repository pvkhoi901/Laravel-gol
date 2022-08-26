@extends('layout.master')

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="container">
                <h4 class="mt-0 header-title mb-3">Disconnection Reason Update</h4>
                {{Form::model($model, ['route' => ['disconnection-reason.update', $model], 'method' => 'put'])}}
                @include('pages.system.disconnection-reason.form', ['button' => 'Update'])
                {{Form::close() }}
            </div>
        </div>
    </div>
@endsection

@push('plugin-scripts')
@endpush

