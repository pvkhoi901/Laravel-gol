@extends('layout.master')

@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Languages</h1>
            </div>
            <div class="col-sm-6">
                <a class="btn btn-primary float-right" href="{{ route('languages.create') }}">
                    Add New
                </a>
            </div>
        </div>
    </div>
</section>

<div class="content px-3">

    @include('flash::message')

    <div class="clearfix"></div>

    <div class="card">
        <div class="card-body p-0">
            @include('Setting::languages.table')

            <div class="card-footer clearfix">
                <div class="float-right">

                </div>
            </div>
        </div>

    </div>
</div>

@endsection

@push('plugin-scripts')
<script>
    $(document).ready(function() {

        $(document).on('click', '.open-image', function(e) {
            try {
                e.preventDefault();
                $(this).ekkoLightbox();
            } catch (e) {
                alert('#open-image: ' + e.message);
            }
        });


    });

</script>


@endpush

@push('plugin-styles')
<style>
</style>
@endpush
