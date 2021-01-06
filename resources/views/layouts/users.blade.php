<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <script src="https://5f3c395.ccm19.de/app/public/ccm19.js?apiKey=11f2d495d42f7cf9c6f1bff5d966f69f74078b87d0cdd9ee&amp;domain=25af8a9" referrerpolicy="origin"></script>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title') | {{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="https://cdn.jsdelivr.net/npm/boxicons@2.0.5/css/boxicons.min.css" rel="stylesheet">
    {{--    <link href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" rel="stylesheet">--}}
    <link href="https://cdnjs.cloudflare.com/ajax/libs/venobox/1.9.0/venobox.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.0/animate.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/css/bootstrap4-toggle.min.css" rel="stylesheet">
    <link href="{{ asset('css/intern.css') }}" rel="stylesheet">
    <link href="{{ asset('css/all.css') }}" rel="stylesheet">

    <style>
        div.main{
            background: #ff4400; /* Old browsers */
            background: -moz-radial-gradient(center, ellipse cover,  #ff4400 1%, #7A2000 100%); /* FF3.6+ */
            background: -webkit-gradient(radial, center center, 0px, center center, 100%, color-stop(1%,#ff4400), color-stop(100%,#7A2000)); /* Chrome,Safari4+ */
            background: -webkit-radial-gradient(center, ellipse cover,  #ff4400 1%,#7A2000 100%); /* Chrome10+,Safari5.1+ */
            background: -o-radial-gradient(center, ellipse cover,  #ff4400 1%,#7A2000 100%); /* Opera 12+ */
            background: -ms-radial-gradient(center, ellipse cover,  #ff4400 1%,#7A2000 100%); /* IE10+ */
            background: radial-gradient(ellipse at center,  #ff4400 1%,#7A2000 100%); /* W3C */
            filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#ff4400', endColorstr='#7A2000',GradientType=1 ); /* IE6-9 fallback on horizontal gradient */
            height:calc(100vh);
            width:100%;
        }

        [class*="fontawesome-"]:before {
            font-family: 'FontAwesome', sans-serif;
        }

        /* ---------- GENERAL ---------- */

        * {
            box-sizing: border-box;
            margin:0px auto;
        }

        *:before,
        *:after {
             box-sizing: border-box;
         }

        body {

            color: #aaa;
            font: 87.5%/1.5em 'Open Sans', sans-serif;
            margin: 0;
        }

        a {
            color: #eee;
            text-decoration: none;
        }

        a:hover {
            text-decoration: underline;
        }

        input {
            border: none;
            font-family: 'Open Sans', Arial, sans-serif;
            font-size: 14px;
            line-height: 1.5em;
            padding: 0;
        }

        p {
            line-height: 1.5em;
        }

        .clearfix {
            *zoom: 1;
        }

        .clearfix:before,
        .clearfix:after {
             content: ' ';
             display: table;
         }

        .clearfix:after {
             clear: both;
         }

        .container {
            left: 50%;
            position: fixed;
            top: 50%;
            transform: translate(-50%, -50%);
        }

        .middle {
            display: flex;
            width: 600px;
        }
        .ccm-settings-summoner {
            display: none;
        }
    </style>

    @toastr_css
    @stack('css')
</head>
<body class="hold-transition login-page">
<div id="load"></div>
{{--<div id="app">--}}

    <div class="login-box" style="width: 400px;">

        <div class="login-logo">
            <a href="{{ url('/') }}"><img src="{{ url('images/logofrei.png') }}" style="width: 375px;"></a>
        </div>

        <div class="card">
            <div class="card-body login-card-body" style="width: 375px;">
                @yield('content')
            </div>
        </div>

    </div>

{{--</div>--}}

<!-- Scripts -->
<script src="{{ asset('js/app.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.sticky/1.0.4/jquery.sticky.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Counter-Up/1.0.0/jquery.counterup.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/waypoints/4.0.1/jquery.waypoints.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.isotope/3.0.6/isotope.pkgd.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/venobox/1.9.0/venobox.min.js"></script>
<script src="https://unpkg.com/boxicons@latest/dist/boxicons.js"></script>
<script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>
<script src="{{ url('js/all.js') }}" defer></script>
@toastr_js
@toastr_render
@stack('js')
</body>
</html>
