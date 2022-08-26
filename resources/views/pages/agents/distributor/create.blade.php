@extends('layout.master')

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 mx-auto">
                    <div class="card-box">
                        <h4 class="mt-0 header-title mb-3">Distributor Create</h4>
                        {{ Form::model($model, ['route' => ['distributors.store']]) }}
                            @include('pages.agents.distributor.form', ['button' => 'Create'])
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
