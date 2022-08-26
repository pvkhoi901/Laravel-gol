<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control']) !!}
</div>


<div class="form-group col-sm-6">
    {!! Form::label('type', 'Image Banner:') !!}
    <input id="url_image" name="url_image" type="" value="{{$mediaImage->url_image ?? ""}}" class="form-control parama_name">
    <div class="div_url_image ">
        @php
        $url_image = $mediaImage->url_image ?? "" ;
        @endphp
        @if($url_image !="")
        <div class="col-md-4 col-sm-4 col-xs-6 img-upload-preview image_view_multi_upload">
            <img src="{{$url_image}}" alt="" class="img-responsive" style="width: 150px">
        </div>
        @endif
    </div>
    <a target_input="url_image" target_preview="div_url_image" class="btn btn-primary image_filemanager">
        <i class="fa fa-picture-o"></i> Choose File
    </a>
</div>


@push('third_party_scripts')

<script src="/vendor/laravel-filemanager/js/upload_one_image.js"></script>
<script>
    $(document).ready(function() {
        $(".image_filemanager").each(function() {
            $(this).fileonefilemanager('product_image');
        });
    });

</script>
@endpush
