@extends('layout.master')

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="container">
                <h4 class="mt-0 header-title mb-3">Clear ESN/SIM Create</h4>
                {{Form::model($model, ['route' => ['clear-esn-sim.store']])}}
                @include('pages.bulk-process.clear-esn-sim.form', ['button' => 'Create'])
                {{Form::close()}}
            </div>
        </div>
    </div>
@endsection

@push('plugin-scripts')
@endpush

