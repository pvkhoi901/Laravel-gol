@extends('layout.master')

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="container">
                <h4 class="mt-0 header-title mb-3">Shipping Box Create</h4>
                {{ Form::model($model, ['route' => ['boxes.store']]) }}
                    @include('pages.order.box.form', ['button' => 'Create'])
                {{ Form::close() }}
            </div>
        </div>
    </div>
@endsection
@push('plugin-scripts')
    <script src="{{ mix('js/pages/box.js') }}"></script>
@endpush
