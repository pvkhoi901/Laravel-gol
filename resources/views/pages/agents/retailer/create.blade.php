@extends('layout.master')

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 mx-auto">
                    <div class="card-box">
                        <h4 class="mt-0 header-title mb-3">Retailer Create</h4>
                        {{ Form::model($model, ['route' => ['retailers.store']]) }}
                            @include('pages.agents.retailer.form', ['button' => 'Create'])
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('plugin-scripts')
    <script src="{{ asset('js/pages/agent.js') }}"></script>
@endpush
