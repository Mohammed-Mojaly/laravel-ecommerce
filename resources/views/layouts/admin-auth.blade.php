<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="description" content="ecommerce app">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    {{-- <meta name="robots" content="all,follow"> --}}

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="shortcut icon" href="{{asset('favicon.ico')}}">

    <title>{{ config('app.name', 'Laravel') }}Dashboard</title>


    <link href="{{ asset('css/app.css') }}" rel="stylesheet">


     <!-- plugins:css -->
     <link rel="stylesheet" href="{{asset('backend/vendors/mdi/css/materialdesignicons.min.css')}}">
     <link rel="stylesheet" href="{{asset('backend/vendors/css/vendor.bundle.base.css')}}">
     <link rel="stylesheet" href="{{asset('backend/css/style.css')}}">

     @yield('style')

</head>
<body>


    <div class="container-scroller">
            @yield('content')
        </div>

      <script src="{{ asset('js/app.js') }}" ></script>

      <script src="{{asset('backend/vendors/js/vendor.bundle.base.js')}}"></script>

      <script src="{{asset('backend/js/off-canvas.js')}}"></script>
      <script src="{{asset('backend/js/hoverable-collapse.js')}}"></script>
      <script src="{{asset('backend/js/misc.js')}}"></script>
      <script src="{{asset('backend/js/settings.js')}}"></script>
      <script src="{{asset('backend/js/todolist.js')}}"></script>

@yield('script')
</body>
</html>
