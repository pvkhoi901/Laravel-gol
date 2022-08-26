@extends('layout.master')

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="container">
                <h4 class="mt-0 header-title mb-3">Shelter Address Update</h4>
                {{Form::model($model, ['route' => ['shelter-address.update', $model], 'method' => 'put'])}}
                @include('pages.system.shelter-address.form', ['button' => 'Create'])
                {{Form::close()}}
            </div>
        </div>
    </div>
@endsection

@push('plugin-scripts')
@endpush

