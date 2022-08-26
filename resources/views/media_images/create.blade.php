@extends('layout.master')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1>Create Media Image</h1>
                </div>
            </div>
        </div>
    </section>

    <div class="content px-3">
 
        <div class="card">

            {!! Form::open(['route' => 'media_images.store']) !!}

            <div class="card-body">

                <div class="row">
                    @include('media_images.fields')
                </div>

            </div>

            <div class="card-footer">
                {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
                <a href="{{ route('media_images.index') }}" class="btn btn-default">Cancel</a>
            </div>

            {!! Form::close() !!}

        </div>
    </div>
@endsection
