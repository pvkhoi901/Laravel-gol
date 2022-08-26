@extends('layout.master')

@section('content')
<div class="content">
    <form method="POST" action="http://localhost:7415/emailMarketings" accept-charset="UTF-8">
        <input type="hidden" name="_token" id="token" value="{!! csrf_token() !!}" autocomplete="off" />
        <div class="container-fluid">
            <h4 class="mt-0 header-title mb-3">Email</h4>
            <div class="row data_email_from">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <div class="form-group">
                                <label for="email">Email received</label>
                                <textarea name="email_received" class="form-control tags required" cols="30" rows="10" id="email_received"></textarea>
                            </div>

                            <div class="form-group">
                                <label for="email_title">Title</label>
                                <input type="text" class="form-control required" id="email_title" value="{{ $emailMarketing->title }}">
                            </div>

                            <div class="form-group">
                                <label for="email_cc">Email CC</label>
                                <textarea name="email_cc" class="form-control tags" cols="30" rows="10" id="email_cc"></textarea>
                            </div>

                            <div class="form-group">
                                <label for="email_bcc">Email BCC</label>
                                <textarea name="email_bcc" class="form-control tags" cols="30" rows="10" id="email_bcc"></textarea>
                            </div>

                            <div class="form-group">
                                <label for="email_content">Email Content</label>
                                <textarea name="email_content" class="form-control required" cols="100" rows="100" id="email_content">{{ $emailMarketing->email_content }}</textarea>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="form-group text-right mt-5">
                <a class="btn btn-secondary" href="{{ route('email.index') }}">Cancel</a>
                <button type="button" class="btn btn-primary send_email">Send Email</button>
                <button type="submit" class="btn btn-primary send_email">Save Draft</button>
            </div>
        </div>
    </form>
</div>
@endsection
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
            data['email_received'] = $("#email_received").val();
            data['email_title'] = $("#email_title").val();
            data['email_cc'] = $("#email_cc").val();
            data['email_bcc'] = $("#email_bcc").val();
            data['email_content'] = CKEDITOR.instances.email_content.getData();
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
