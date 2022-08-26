@extends('layout.master')

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card-box">
                    <h4 class="mt-0 header-title">Detail Api {{$detail->name ?? ""}}</h4>
                    <div class="my-3 text-right">
                        <a class="btn btn-primary" href="/managerapi/categoryapi/list_api" role="button">List Apis</a>
                        <a class="btn btn-danger" href="/managerapi/api_detail/{{$detail->id ?? "0"}}/edit" role="button">Edit Api</a>
                    </div>
                    <div class="card">
                        <div class="card-body">
                            <div class="row form-group">
                                <div class="col-md-12">
                                    @include('pages.manager.category.detail_api')
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> 

@endsection
@push('plugin-scripts')

<script> 
    $(document).ready(function() {

        $(".description_api img").each(function (index, element) {
            var image_src =  $(this).attr("src");
             $(this).addClass("open-image").attr("data-toggle" , "lightbox").attr("data-remote" , image_src);
        });


        $('.open-image').click(function (e) {
            e.preventDefault();
            $(this).ekkoLightbox();
        });

    });

</script>


@endpush

@push('plugin-styles')
<link href="{{ asset('assets/css/form/list_api.css?').time() }}" rel="stylesheet">
<style>
    .machineColumnContents {
        transform: none !important;
    }

    .machineColumnDestination div {
        margin-left: 20px !important;
    }

    .parametersList,
    .machineColumnTitleText,
    .parametersTitle {
        margin-left: 20px !important;
    }

</style>
@endpush