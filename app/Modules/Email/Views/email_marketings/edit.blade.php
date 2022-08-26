@extends('layout.master')

@section('content')
    <div class="content px-3">

        @include('adminlte-templates::common.errors')

        <div class="card">

            {!! Form::model($emailMarketing, ['route' => ['emailMarketings.update', $emailMarketing->id], 'method' => 'patch']) !!}

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
