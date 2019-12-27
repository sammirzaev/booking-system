<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{ config('app.name', 'Booking') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta name="description" content="Licensed travel agency in Uzbekistan, with the safest services and most convenient locations in the highest priority market" />
    <meta name="keywords" content="Hotel, travels" />
    <meta name="author" content="sayyau.uz" />

    <!-- Facebook and Twitter integration -->
    <meta property="og:title" content="Licensed travel agency"/>
    <meta property="og:image" content="{{ asset('img/default/og.png') }}"/>
    <meta property="og:url" content="http://sayyah.uz/"/>
    <meta property="og:site_name" content="SaYYah.UZ travellers club"/>
    <meta property="og:description" content="Network of trusted hotels, transports and travel service partners in Uzbekistan"/>
    <meta name="twitter:title" content="Licensed travel agency" />
    <meta name="twitter:image" content="{{ asset('img/default/og.png') }}" />
    <meta name="twitter:url" content="http://sayyah.uz/" />
    <meta name="twitter:card" content="http://sayyah.uz/" />

    <link rel="icon" type="image/ico" href="{{ asset('img/default/favicon.ico') }}" />

    <link href="https://fonts.googleapis.com/css?family=Quicksand:300,400,500,700" rel="stylesheet">

    <!-- Animate.css -->
    <link rel="stylesheet" href="{{ asset('css/animate.css') }}">
    <!-- Icomoon Icon Fonts-->
    <link rel="stylesheet" href="{{ asset('css/icomoon.css') }}">
    <!-- Bootstrap  -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">

    <!-- Magnific Popup -->
    <link rel="stylesheet" href="{{ asset('css/magnific-popup.css') }}">

    <!-- Flexslider  -->
    <link rel="stylesheet" href="{{ asset('css/flexslider.css') }}">

    <!-- Owl Carousel -->
    <link rel="stylesheet" href="{{ asset('css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/owl.theme.default.min.css') }}">

    <!-- Date Picker -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap-datepicker.css') }}">
    <!-- Flaticons  -->
    <link rel="stylesheet" href="{{ asset('fonts/flaticon/font/flaticon.css') }}">

    <!-- Theme style  -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">

    <!-- Modernizr JS -->
    <script src="{{ asset('js/modernizr-2.6.2.min.js') }}"></script>
    <!-- FOR IE9 below -->
    <!--[if lt IE 9]>
{{--    <script src="{{ asset('js/respond.min.js') }}"></script>--}}
    <![endif]-->

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    @stack('css')

</head>
<body>

<div class="colorlib-loader"></div>

<div id="page">
    @section('navigation')
        @include('layouts.navigation')
    @show

    @yield('slides')

    @yield('reservation')
</div>

@yield('content')

@include('layouts.subscribe')

@include('layouts.footer')

<div class="gototop js-top">
    <a href="#" class="js-gotop"><i class="icon-arrow-up2"></i></a>
</div>

<!-- Scripts -->
{{--<script src="{{ asset('js/app.js') }}"></script>--}}

<!-- jQuery -->
<script src="{{ asset('js/jquery.min.js') }}"></script>
<!-- jQuery Easing -->
<script src="{{ asset('js/jquery.easing.1.3.js') }}"></script>
<!-- Bootstrap -->
<script src="{{ asset('js/bootstrap.min.js') }}"></script>
<!-- Waypoints -->
<script src="{{ asset('js/jquery.waypoints.min.js') }}"></script>
<!-- Flexslider -->
<script src="{{ asset('js/jquery.flexslider-min.js') }}"></script>
<!-- Owl carousel -->
<script src="{{ asset('js/owl.carousel.min.js') }}"></script>
<!-- Magnific Popup -->
<script src="{{ asset('js/jquery.magnific-popup.min.js') }}"></script>
<script src="{{ asset('js/magnific-popup-options.js') }}"></script>
<!-- Date Picker -->
<script src="{{ asset('js/bootstrap-datepicker.js') }}"></script>
<!-- Stellar Parallax -->
<script src="{{ asset('js/jquery.stellar.min.js') }}"></script>
<!-- Main -->
<script src="{{ asset('js/main.js') }}"></script>

@stack('js')

</body>
</html>

