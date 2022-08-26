@extends('layout.master')

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="container">
                <h4 class="mt-0 header-title mb-3">Clear ESN/SIM Update</h4>
                {{Form::model($model, ['route' => ['clear-esn-sim.update', $model], 'method' => 'put'])}}
                @include('pages.bulk-process.clear-esn-sim.form', ['button' => 'Update'])
                {{Form::close() }}
            </div>
        </div>
    </div>
@endsection

@push('plugin-scripts')
@endpush

