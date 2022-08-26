<!-- Title Field -->

                            
<div class="form-group col-sm-12">
    <label for="customer_region">Lựa chọn khách hàng theo khu vực</label>
    {!! Form::select('customer_region', COUNTRIES, null, ['class' => 'form-control custom-select select2' , "id"=>"customer_region"]) !!}
</div>

<div class="form-group col-sm-12">
    {!! Form::label('email_received', 'Email received:') !!}
    {!! Form::textarea('email_received', null, ['class' => 'form-control tags required']) !!}
</div>

<div class="form-group col-sm-12">
    {!! Form::label('email_title', 'Email Title:') !!}
    {!! Form::text('email_title', null, ['class' => 'form-control']) !!}
</div>

<!-- Title Field -->
<div class="form-group col-sm-12">
    {!! Form::label('email_cc', 'Email CC:') !!}
    {!! Form::textarea('email_cc', null, ['class' => 'form-control tags']) !!}
</div>


<div class="form-group col-sm-12">
    {!! Form::label('email_bcc', 'Email BCC:') !!}
    {!! Form::textarea('email_bcc', null, ['class' => 'form-control tags']) !!}
</div>

<!-- Email Content Field -->
<div class="form-group col-sm-12">
    {!! Form::label('email_content', 'Email Content:') !!}
    {!! Form::textarea('email_content', null, ['class' => 'form-control required' , "id"=>"email_content"]) !!}
</div>



@push('plugin-scripts')
<script src="/vendor/ckeditor/ckeditor.js"></script>
<script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>

<script>
    CKEDITOR.replace('email_content', {
        filebrowserBrowseUrl: '/filemanager?type=product_photo'
        , filebrowserUploadUrl: "{{route('unisharp.lfm.upload', ['_token' => csrf_token() ])}}"
        , filebrowserUploadMethod: 'form'
        , floatSpacePreferRight: true
    , });


    $(document).ready(function() {


        $('#email_received').tagsInput({
            'width': '100%'
            , 'height': '100%'
            , 'interactive': true
            , 'defaultText': 'Add more Email'
            , 'removeWithBackspace': true
            , 'minChars': 0
            , 'maxChars': 100
            , 'placeholderColor': '#666666'
        });


        $('#email_cc').tagsInput({
            'width': '100%'
            , 'height': '100%'
            , 'interactive': true
            , 'defaultText': 'Add more Email CC'
            , 'removeWithBackspace': true
            , 'minChars': 0
            , 'maxChars': 100
            , 'placeholderColor': '#666666'
        });

        $('#email_bcc').tagsInput({
            'width': '100%'
            , 'height': '100%'
            , 'interactive': true
            , 'defaultText': 'Add more Email BCC'
            , 'removeWithBackspace': true
            , 'minChars': 0
            , 'maxChars': 100
            , 'placeholderColor': '#666666'
        });


        $(document).on('click', '.send_email', function() {

            if (!_validate($(".data_email_from"))) {
                return;
            }
            var data = {};
            data['customer_region'] = $("#customer_region").val();
            data['email_received'] = $("#email_received").val();
            data['email_title'] = $("#email_title").val();
            data['email_cc'] = $("#email_cc").val();
            data['email_bcc'] = $("#email_bcc").val();
            data['email_content'] = CKEDITOR.instances.email_content.getData();

            console.log(data)
            try {

                $.ajax({
                    method: 'POST'
                    , url: "/email/email_send_custom"
                    , data: data
                    , loading: true
                    , success: function(res) {
                        switch (res['status']) {
                            // success
                            case 200:
                                Swal.fire(
                                    'Send Email Success'
                                    , res['message']
                                    , 'success'
                                )
                                break;
                            case 201:
                                Swal.fire(
                                    'Error'
                                    , res['message']
                                    , 'error'
                                ).then((result) => {
                                    console.log(res)
                                    $(res.class).focus();
                                });
                                break;
                            default:
                                Swal.fire(
                                    'Error'
                                    , res['message']
                                    , 'error'
                                )
                                break;
                        }

                    }
                });


            } catch (e) {
                alert('#btn-back: ' + e.message);
            }
        });

    });

</script>
@endpush

