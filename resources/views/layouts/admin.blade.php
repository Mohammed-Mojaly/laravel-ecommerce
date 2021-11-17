@php
    $current_page = \Route::currentRouteName();
@endphp
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="description" content="ecommerce">
    <meta name="auther" content="Mojaly">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    {{-- <meta name="robots" content="all,follow"> --}}

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" href="{{asset('favicon.ico')}}">

    <title>{{ config('app.name', 'Laravel') }} Dashboard</title>



    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <link rel="stylesheet" href="{{asset('backend/vendors/mdi/css/materialdesignicons.min.css')}}">
    <link rel="stylesheet" href="{{asset('backend/vendors/css/vendor.bundle.base.css')}}">

    <link rel="stylesheet" href="{{asset('backend/vendors/jvectormap/jquery-jvectormap.css')}}">
    <link rel="stylesheet" href="{{asset('backend/vendors/flag-icon-css/css/flag-icon.min.css')}}">
    <link rel="stylesheet" href="{{asset('backend/vendors/owl-carousel-2/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('backend/vendors/owl-carousel-2/owl.theme.default.min.css')}}">

    <link rel="stylesheet" href="{{asset('backend/css/style.css')}}">
    <link rel="stylesheet" href="{{ asset('backend/vendors/bootstrap-fileinput/css/fileinput.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/vendors/summernote/summernote-bs4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/vendors/select2/select2.min.css') }}">


    <link rel="stylesheet" href="{{ asset($current_page !='admin.index' ? 'backend/css/custme.css' : '') }}">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

    <script src="{{ asset('backend/js/sweetalert.min.js') }}"></script>

    @livewireStyles
    @yield('style')
</head>
<body>

    @if (Session()->has('success'))

        <script>
            swal("Success","{{Session()->get('success')}}","success");
        </script>

    @elseif(Session()->has('error'))
        <script>
            swal("Error","{{Session()->get('error')}}","error");
        </script>


    @endif

    <div id="app">
        <div class="container-scroller">
            @include('partial.backend.sidebar')
            <div class="container-fluid page-body-wrapper">

                @include('partial.backend.navbar')

                <div class="main-panel">
                    <div class="content-wrapper">
                    @yield('content')
                    </div>
                    @include('partial.backend.footer')
                </div>



            </div>




        </div>
    </div>
    @livewireScripts
    <script src="{{asset('js/app.js') }}" ></script>
    <script src="{{asset('backend/vendors/js/vendor.bundle.base.js')}}"></script>


    <script src="{{asset('backend/vendors/progressbar.js/progressbar.min.js')}}"></script>
    <script src="{{asset('backend/vendors/jvectormap/jquery-jvectormap.min.js')}}"></script>
    <script src="{{asset('backend/vendors/jvectormap/jquery-jvectormap-world-mill-en.js')}}"></script>
    <script src="{{asset('backend/vendors/owl-carousel-2/owl.carousel.min.js')}}"></script>

    <script src="{{asset('backend/js/off-canvas.js')}}"></script>
    <script src="{{asset('backend/js/hoverable-collapse.js')}}"></script>
    <script src="{{asset('backend/js/misc.js')}}"></script>
    <script src="{{asset('backend/js/settings.js')}}"></script>
    <script src="{{asset('backend/js/todolist.js')}}"></script>

    <script src="{{asset('backend/js/dashboard.js')}}"></script>

    <script src="{{ asset('backend/vendors/bootstrap-fileinput/js/plugins/piexif.min.js') }}"></script>
    <script src="{{ asset('backend/vendors/bootstrap-fileinput/js/plugins/sortable.min.js') }}"></script>
    <script src="{{ asset('backend/vendors/bootstrap-fileinput/js/fileinput.min.js') }}"></script>
    <script src="{{ asset('backend/vendors/bootstrap-fileinput/themes/fas/theme.min.js') }}"></script>
    <script src="{{ asset('backend/vendors/summernote/summernote-bs4.min.js') }}"></script>

    <script src="{{ asset('backend/vendors/select2/select2.min.js')}}"></script>
    <script src="{{ asset('backend/vendors/bootstrap-input-spinner/bootstrap-input-spinner.js') }}"></script>

    @include('sweetalert::alert', ['cdn' => "https://cdn.jsdelivr.net/npm/sweetalert2@9"])


    @yield('script')





</body>
</html>
