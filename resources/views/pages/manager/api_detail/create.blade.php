@extends('layout.master')

@section('content')
<div class="content">
    <div class="container-fluid">
        <div class="container">
            <h4 class="mt-0 header-title mb-3">Api Create</h4>
            {{ Form::model($model, ['route' => ['api_detail.store']]) }}
            @include('pages.manager.api_detail.form', ['button' => 'Create'])
            {{ Form::close() }}
        </div>
    </div>
</div>
@endsection


@push('plugin-scripts')
<script src="{{ mix('js/pages/api_detail.js') }}"></script>


<script src="/vendor/ckeditor/ckeditor.js"></script>
<script src="/vendor/laravel-filemanager/js/stand-alone-button.js"></script>

<script>
    CKEDITOR.replace('description', {
        filebrowserBrowseUrl: '/filemanager?type=api_photo'
        , filebrowserUploadUrl: "{{route('unisharp.lfm.upload', ['_token' => csrf_token() ])}}"
        , filebrowserUploadMethod: 'form'
        , floatSpacePreferRight: true
    , });

</script>
@endpush