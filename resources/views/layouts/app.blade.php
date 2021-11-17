<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    {{-- <meta name="robots" content="all,follow"> --}}

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" href="{{asset('favicon.ico')}}">

    <title>{{ config('app.name', 'Laravel') }}</title>



    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Libre+Franklin:wght@300;400;700&amp;display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Martel+Sans:wght@300;400;800&amp;display=swap">
    <!-- FontAwesome CSS - loading as last, so it doesn't block rendering-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">


    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="{{asset('frontend/vendor/bootstrap/css/bootstrap.min.css')}}">
    <!-- Lightbox-->
    <link rel="stylesheet" href="{{asset('frontend/vendor/lightbox2/css/lightbox.min.css')}}">
    <!-- Range slider-->
    <link rel="stylesheet" href="{{asset('frontend/vendor/nouislider/nouislider.min.css')}}">
    <!-- Bootstrap select-->
    <link rel="stylesheet" href="{{asset('frontend/vendor/bootstrap-select/css/bootstrap-select.min.css')}}">
    <!-- Owl Carousel-->
    <link rel="stylesheet" href="{{asset('frontend/vendor/owl.carousel2/assets/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/vendor/owl.carousel2/assets/owl.theme.default.css')}}">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="{{asset('frontend/css/style.default.css')}}"  id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="{{asset('frontend/css/custom.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/mycustom.css')}}">


    @livewireStyles
    @yield('style')

    {{-- <script defer src="https://unpkg.com/alpinejs@3.4.2/dist/cdn.min.js"></script> --}}
</head>
<body>


    <div id="app" class="page-holder {{request()->routeIs('frontend.detail') ? 'bg-light' : null}}">

        @include('partial.frontend.header')
        <div class="container">
            @yield('content')
        </div>

        @include('partial.frontend.footer')
    </div>

    <livewire:frontend.product-modal-shared />

      <!-- Scripts -->
      @livewireScripts
      <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>

      @include('sweetalert::alert', ['cdn' => "https://cdn.jsdelivr.net/npm/sweetalert2@9"])

      <x-livewire-alert::scripts />


      <script src="{{ asset('js/app.js') }}" ></script>

      <script src="{{asset('frontend/vendor/lightbox2/js/lightbox.min.js')}}"></script>
      <script src="{{asset('frontend/vendor/nouislider/nouislider.min.js')}}"></script>
      <script src="{{asset('frontend/vendor/bootstrap-select/js/bootstrap-select.min.js')}}"></script>
      <script src="{{asset('frontend/vendor/owl.carousel2/owl.carousel.min.js')}}"></script>
      <script src="{{asset('frontend/vendor/owl.carousel2.thumbs/owl.carousel2.thumbs.min.js')}}"></script>
      <script src="{{asset('frontend/js/front.js')}}"></script>

      <script src="{{asset('frontend/js/custome.js')}}"></script>

      <script>
        function injectSvgSprite(path) {

            var ajax = new XMLHttpRequest();
            ajax.open("GET", path, true);
            ajax.send();
            ajax.onload = function(e) {
            var div = document.createElement("div");
            div.className = 'd-none';
            div.innerHTML = ajax.responseText;
            document.body.insertBefore(div, document.body.childNodes[0]);
            }
        }

      </script>


 @yield('script')

</body>
</html>
