<?php
/* setzen der Cacheverwaltung auf 'private' */
session_cache_limiter('public');
header('Cache-Control: max-age=31536000, public'); //one week
header('Expires: '.gmdate(DATE_RFC1123,time()+60*60*24*365)); //one week
?>
<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <script src="https://5f3c395.ccm19.de/app/public/ccm19.js?apiKey=11f2d495d42f7cf9c6f1bff5d966f69f74078b87d0cdd9ee&amp;domain=25af8a9" referrerpolicy="origin"></script>
    <title>@yield('title') | {{ config('app.name', 'Laravel') }}</title>

    <meta name="description" content="@yield('description', 'Wir sind ein kleiner Marken offener Tuning Club')">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @yield('canonical')
    @yield('meta')
    @include('layouts.partials.meta.fav')
    @include('layouts.partials.meta.og')
    @include('layouts.partials.meta.twitter')
    @include('layouts.partials.meta.meta')


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/venobox/1.9.0/venobox.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.0/animate.min.css" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/all.css') }}" rel="stylesheet">
    @toastr_css
    @stack('css')
    <style>
        .ccm-settings-summoner {
            display: none;
        }
    </style>

    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
                new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
            j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
            'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
        })(window,document,'script','dataLayer','GTM-P5DTKN5');</script>
    <!-- End Google Tag Manager -->

</head>
<body>
<div id="load"></div>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-P5DTKN5"
                  height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
{{--<div id="app">--}}
    <div class="page-container">
        @include('layouts.partials.frontend.navigation')

        @yield('content')

    </div>
    @include('layouts.partials.frontend.footer')

{{--</div>--}}

<!-- Scripts -->
<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ url('js/all.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.sticky/1.0.4/jquery.sticky.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Counter-Up/1.0.0/jquery.counterup.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/waypoints/4.0.1/jquery.waypoints.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.isotope/3.0.6/isotope.pkgd.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/venobox/1.9.0/venobox.min.js"></script>
@toastr_js
@toastr_render
@stack('js')
</body>
</html>
