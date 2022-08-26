<!-- Country Field -->
<div class="form-group col-sm-6">
    {!! Form::label('country', 'Country:') !!}
    {!! Form::select('country', COUNTRY, null, ['class' => 'form-control custom-select select2']) !!}
</div>


<!-- Language Key Field -->
<div class="form-group col-sm-6">
    {!! Form::label('language_key', 'Language Key:') !!}
    {!! Form::text('language_key', null, ['class' => 'form-control', "maxlength" => 255]) !!}
</div>

<!-- Language Title Field -->
<div class="form-group col-sm-6">
    {!! Form::label('language_title', 'Language Title:') !!}
    {!! Form::text('language_title', null, ['class' => 'form-control', "maxlength" => 255]) !!}
</div>


<!-- Language Url Field -->
<div class="form-group col-sm-6">
    {!! Form::label('language_url', 'Language Url:') !!}
    {!! Form::text('language_url', $languages->language_url ?? "javascript:;", ['class' => 'form-control', "maxlength" => 255]) !!}
</div>

<!-- Language Image Field -->
<div class="form-group col-sm-6">

    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-8">
                    {!! Form::label('language_image', 'Language Image:') !!}

                    <div class="input-group">
                        <span class="input-group-btn">
                            <a id="lfm" data-input="language_image" data-preview="holder" class="btn btn-primary">
                                <i class="fa fa-picture-o"></i> Choose
                            </a>
                        </span>
                        <input id="language_image" name="language_image" class="form-control" type="text" name="filepath" value="{{$languages->language_image ?? ""}}">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="holder" id="holder">
                        @php
                        $language_image = $languages->language_image ??"";
                        @endphp
                        @if($language_image !="")
                        <img alt="Bootstrap Image Preview" style="max-height:250px ; max-width: 250px" src="{{$languages->language_image ?? ""}}" />
                        @endif

                    </div>

                </div>
            </div>
        </div>
    </div>


</div>


<!-- Language Image Field -->
<div class="form-group col-sm-6">

    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-8">
                    {!! Form::label('language_image_mobile', 'Language Image for mobile:') !!}

                    <div class="input-group">
                        <span class="input-group-btn">
                            <a id="lfm_mobile" data-input="language_image_mobile" data-preview="holder_mobile" class="btn btn-primary">
                                <i class="fa fa-picture-o"></i> Choose File
                            </a>
                        </span>
                        <input id="language_image_mobile" name="language_image_mobile" class="form-control" type="text" name="filepath" value="{{$languages->language_image_mobile ?? ""}}">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="holder_mobile" id="holder_mobile">
                        @php
                        $language_image_mobile = $languages->language_image_mobile ??"";
                        @endphp
                        @if($language_image_mobile !="")
                        <img alt="Bootstrap Image Preview" style="max-height:250px ; max-width: 250px" src="{{$languages->language_image_mobile ?? ""}}" />
                        @endif

                    </div>

                </div>
            </div>



        </div>
    </div>


</div>


<!-- Language Image Field -->
<div class="form-group col-sm-6">

    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-8">
                    {!! Form::label('language_image_2', 'Language Image 2:') !!}

                    <div class="input-group">
                        <span class="input-group-btn">
                            <a id="lfm_2" data-input="language_image_2" data-preview="holder" class="btn btn-primary image_filemanager">
                                <i class="fa fa-picture-o"></i> Choose
                            </a>
                        </span>
                        <input id="language_image_2" name="language_image_2" class="form-control" type="text" name="filepath" value="{{$languages->language_image_2 ?? ""}}">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="holder" id="holder">
                        @php
                        $language_image_2 = $languages->language_image_2 ??"";
                        @endphp
                        @if($language_image_2 !="")
                        <img alt="Bootstrap Image Preview" style="max-height:250px ; max-width: 250px" src="{{$languages->language_image_2 ?? ""}}" />
                        @endif

                    </div>

                </div>


                <!-- Language Url Field -->
                <div class="form-group col-sm-12">
                    {!! Form::label('language_image_url_2', 'Language Url 2:') !!}
                    {!! Form::text('language_image_url_2', $languages->language_image_url_2 ?? "javascript:;", ['class' => 'form-control', "maxlength" => 255]) !!}
                </div>



            </div>
        </div>
    </div>


</div>


<!-- Language Image Field -->
<div class="form-group col-sm-6">

    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-8">
                    {!! Form::label('language_image_mobile_2', 'Language Image for mobile 2:') !!}

                    <div class="input-group">
                        <span class="input-group-btn">
                            <a id="lfm_mobile_2" data-input="language_image_mobile_2" data-preview="holder_mobile" class="btn btn-primary image_filemanager">
                                <i class="fa fa-picture-o"></i> Choose File
                            </a>
                        </span>
                        <input id="language_image_mobile_2" name="language_image_mobile_2" class="form-control" type="text" name="filepath" value="{{$languages->language_image_mobile_2 ?? ""}}">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="holder_mobile" id="holder_mobile">
                        @php
                        $language_image_mobile_2 = $languages->language_image_mobile_2 ??"";
                        @endphp
                        @if($language_image_mobile_2 !="")
                        <img alt="Bootstrap Image Preview" style="max-height:250px ; max-width: 250px" src="{{$languages->language_image_mobile_2 ?? ""}}" />
                        @endif

                    </div>

                </div>

            </div>
        </div>
    </div>


</div>


<!-- Language Image Field -->
<div class="form-group col-sm-6">

    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-8">
                    {!! Form::label('language_image_3', 'Language Image 3:') !!}

                    <div class="input-group">
                        <span class="input-group-btn">
                            <a id="lfm_2" data-input="language_image_3" data-preview="holder" class="btn btn-primary image_filemanager">
                                <i class="fa fa-picture-o"></i> Choose
                            </a>
                        </span>
                        <input id="language_image_3" name="language_image_3" class="form-control" type="text" name="filepath" value="{{$languages->language_image_3 ?? ""}}">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="holder" id="holder">
                        @php
                        $language_image_3 = $languages->language_image_3 ??"";
                        @endphp
                        @if($language_image_3 !="")
                        <img alt="Bootstrap Image Preview" style="max-height:250px ; max-width: 250px" src="{{$languages->language_image_3 ?? ""}}" />
                        @endif

                    </div>

                </div>

                
                <!-- Language Url Field -->
                <div class="form-group col-sm-12">
                    {!! Form::label('language_image_url_3', 'Language Url 3:') !!}
                    {!! Form::text('language_image_url_3', $languages->language_image_url_3 ?? "javascript:;", ['class' => 'form-control', "maxlength" => 255]) !!}
                </div>

            </div>
        </div>
    </div>


</div>


<!-- Language Image Field -->
<div class="form-group col-sm-6">

    <div class="row">
        <div class="col-md-12">
            <div class="row">
                <div class="col-md-8">
                    {!! Form::label('language_image_mobile_3', 'Language Image for mobile 3:') !!}

                    <div class="input-group">
                        <span class="input-group-btn">
                            <a id="lfm_mobile_2" data-input="language_image_mobile_3" data-preview="holder_mobile" class="btn btn-primary image_filemanager">
                                <i class="fa fa-picture-o"></i> Choose File
                            </a>
                        </span>
                        <input id="language_image_mobile_3" name="language_image_mobile_3" class="form-control" type="text" name="filepath" value="{{$languages->language_image_mobile_3 ?? ""}}">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="holder_mobile" id="holder_mobile">
                        @php
                        $language_image_mobile_3 = $languages->language_image_mobile_3 ??"";
                        @endphp
                        @if($language_image_mobile_3 !="")
                        <img alt="Bootstrap Image Preview" style="max-height:100px ; max-width: 100px" src="{{$languages->language_image_mobile_3 ?? ""}}" />
                        @endif

                    </div>

                </div>
            </div>
        </div>
    </div>


</div>



<!-- Description Field -->
<div class="form-group col-sm-12">
    {!! Form::label('description', 'Description:') !!}
    {!! Form::textarea('description', null, ['class' => 'form-control']) !!}

    <span>Class Popular : font_size_mobile</span>

</div>


@push('plugin-scripts')
<script src="/vendor/ckeditor/ckeditor.js"></script>
<script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>

<script>
    CKEDITOR.replace('description', {
        filebrowserBrowseUrl: '/filemanager?type=product_photo'
        , filebrowserUploadUrl: "{{route('unisharp.lfm.upload', ['_token' => csrf_token() ])}}"
        , filebrowserUploadMethod: 'form'
        , floatSpacePreferRight: true
    , });
    $(document).ready(function() {

        $(document).on('click', '.send_email', function() {

        });

        $('#lfm').filemanager('ladding_image');
        $('#lfm_mobile').filemanager('ladding_image');

        $('.image_filemanager').filemanager('ladding_image');
    });

</script>
@endpush
