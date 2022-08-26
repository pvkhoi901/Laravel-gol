<!DOCTYPE html>
<html>

<head>
    <title>{{env("APP_NAME")}}</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <link rel="shortcut icon" href="{{ asset('/img/favicon.png') }}">

    <!-- plugin css -->
    <link href="{{ asset('assets/fonts/feather-font/css/iconfont.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/plugins/flag-icon-css/css/flag-icon.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/plugins/perfect-scrollbar/perfect-scrollbar.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/plugins/fontawesome/css/all.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/plugins/select2/select2.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/plugins/bootstrap-datepicker/bootstrap-datepicker.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/plugins/sweetalert2/sweetalert2.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('assets/plugins/jquery-tags-input/jquery.tagsinput.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/plugins/lightbox/dist/ekko-lightbox.css') }}" rel="stylesheet">


    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
    <link href="{{ asset('assets/plugins/calander/css/bootstrap-datepicker.min.css') }}" rel="stylesheet">


    <!-- end plugin css -->

    @stack('plugin-styles')

    <!-- common css -->
    <link href="{{ mix('css/' . auth()->user()->theme . '.css') }}" rel="stylesheet" />
    <link href="{{ mix('css/custom.css') }}" rel="stylesheet" />
    <!-- end common css -->

</head>

<body data-base-url="{{ url('/') }}">

    <script src="{{ asset('assets/js/spinner.js') }}"></script>

    <div class="main-wrapper" id="app">
        @include('layout.sidebar')
        <div class="page-wrapper">
            @include('layout.header')
            <div class="page-content">
                @yield('content')
            </div>
            @include('layout.footer')
        </div>
    </div>

    <!-- base js -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('assets/plugins/feather-icons/feather.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/select2/select2.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/bootstrap-datepicker/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/sweetalert2/sweetalert2.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/jquery-validation/jquery.validate.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/pjax/jquery.pjax.js')}}"></script>
    <script src="{{ asset('assets/plugins/jquery-tags-input/jquery.tagsinput.min.js') }}"></script>
    @include('layout.datatables')
    
    @stack('third_party_stylesheets')
    <!-- end base js -->

    <!-- plugin js -->
    <script src="{{ asset('vendor/datatables/buttons.server-side.js') }}"></script>
    <!-- end plugin js -->

    <!-- common js -->
    <script src="{{ asset('assets/js/template.js') }}"></script>
    <script src="{{ asset('assets/js/common_custom.js') }}"></script>
    <script src="{{ mix('js/common.js') }}" type="module"></script>
    <!-- end common js -->
    @include('sweetalert::alert', ['cdn' => 'https://cdn.jsdelivr.net/npm/sweetalert2@9'])

    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    
    <script src="{{ asset('assets/plugins/calander/js/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/lightbox/dist/ekko-lightbox.js') }}"></script>

    @stack('plugin-scripts')
    @stack('third_party_scripts')


    <div class="div_loading">
        <div class="image_loading_popup">
            <img src="{{ asset('img/loading.gif') }}">
        </div>
    </div>
    
</body>

</html>
