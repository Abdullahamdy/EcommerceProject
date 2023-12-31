<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
{{--    <meta name="robots" content="all,follow">--}}<!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Favicon-->
    <link rel="shortcut icon" href="{{asset('favicon.ico')}}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Libre+Franklin:wght@300;400;700&amp;display=swap">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Martel+Sans:wght@300;400;800&amp;display=swap">
    <!-- FontAwesome CSS - loading as last, so it doesn't block rendering-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="{{asset('frontend/vendor/bootstrap/css/bootstrap.min.css')}}">
    <!-- Styles -->
    <!-- Lightbox-->
    <link rel="stylesheet" href="{{ asset('frontend/vendor/lightbox2/css/lightbox.min.css') }}">
    <!-- Range slider-->
    <link rel="stylesheet" href="{{ asset('frontend/vendor/nouislider/nouislider.min.css') }}">
    <!-- Bootstrap select-->
    <link rel="stylesheet" href="{{ asset('frontend/vendor/bootstrap-select/css/bootstrap-select.min.css') }}">
    <!-- Owl Carousel-->
    <link rel="stylesheet" href="{{ asset('frontend/vendor/owl.carousel2/assets/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/vendor/owl.carousel2/assets/owl.theme.default.css') }}">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="{{asset('frontend/css/style.default.css')}}" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="{{ asset('frontend/css/custom.css') }}">
    <!-- Tweaks for older IEs--><!--[if lt IE 9]>
        @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script><![endif]-->

    @yield('style')

</head>
<body>
    <div id="app" class="page-holder {{ request()->routeIs('frontend.product') ? 'bg-light' : null }}">

        @include('partial.frontend.header')

        <div class="container">
            @yield('content')
        </div>

        @include('partial.frontend.footer')

    </div>






    <!-- JavaScript files-->
    <script src="{{asset('frontend/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('frontend/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('frontend/vendor/lightbox2/js/lightbox.min.js')}}"></script>
    <script src="{{asset('frontend/vendor/nouislider/nouislider.min.js')}}"></script>
    <script src="{{asset('frontend/vendor/bootstrap-select/js/bootstrap-select.min.js')}}"></script>
    <script src="{{asset('frontend/vendor/owl.carousel2/owl.carousel.min.js')}}"></script>
    <script src="{{asset('frontend/vendor/owl.carousel2.thumbs/owl.carousel2.thumbs.min.js')}}"></script>
    <script src="{{asset('frontend/js/front.js')}}"></script>
    @yield('script')

</body>
</html>
