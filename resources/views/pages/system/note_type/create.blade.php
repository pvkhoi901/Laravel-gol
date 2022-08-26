@extends('layout.master')

@section('content')
<div class="content">
    <div class="container">
        <h4 class="mt-0 header-title mb-3">Note type Add</h4>
        {{ Form::model($model, ['route' => ['note_type.store']]) }}
        @include('pages.system.note_type.form', ['button' => 'Add'])
        {{ Form::close() }}
    </div>
</div>
@endsection


@push('plugin-scripts')
<script src="{{ asset('assets/plugins/jquery-ui-dist/jquery-ui.min.js') }}"></script>
@endpush