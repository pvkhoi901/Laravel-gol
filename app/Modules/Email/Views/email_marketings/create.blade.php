@extends('layout.master')

@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-12">
                <h1>Create Email Marketing</h1>
            </div>
        </div>
    </div>
</section>

<div class="content px-3">

    @include('adminlte-templates::common.errors')

    <div class="card">

        {!! Form::open(['route' => 'emailMarketings.store']) !!}

        <div class="card-body">

            <div class="row">
                @include('Email::email_marketings.fields')
            </div>
        </div>

        <div class="card-footer">
            {!! Form::submit('Save Draft', ['class' => 'btn btn-primary']) !!}
            <a href="{{ route('emailMarketings.index') }}" class="btn btn-default">Cancel</a>

            <button type="button" class="btn btn-primary send_email">Send Email</button>
        </div>

        {!! Form::close() !!}

    </div>
</div>
@endsection
