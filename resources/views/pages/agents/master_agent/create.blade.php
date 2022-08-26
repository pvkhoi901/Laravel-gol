@extends('layout.master')

@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 mx-auto">
                    <div class="card-box">
                        <h4 class="mt-0 header-title mb-3">Master Agent Create</h4>
                        {{ Form::model($model, ['route' => ['masters.store']]) }}
                            @include('pages.agents.master_agent.form', ['button' => 'Create'])
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
