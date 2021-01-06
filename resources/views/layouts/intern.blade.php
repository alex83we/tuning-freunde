<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <script src="https://5f3c395.ccm19.de/app/public/ccm19.js?apiKey=11f2d495d42f7cf9c6f1bff5d966f69f74078b87d0cdd9ee&amp;domain=25af8a9" referrerpolicy="origin"></script>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/intern.css') }}" rel="stylesheet">
    <link href="{{ asset('css/all.css') }}" rel="stylesheet">
    @toastr_css
    @stack('css')
    <style>
        .ccm-settings-summoner {
            display: none;
        }
    </style>
</head>
<body>
<div id="load"></div>
{{--<div id="app">--}}
    <div class="wrapper">
        @include('layouts.partials.intern.navigation')
        @include('layouts.partials.intern.sidebar')

        <div class="content-wrapper">
            <div class="content-header">
                <div class="container-fluid">
                    @yield('breadcrumb')
                </div>
            </div>
            @yield('content')
        </div>
        @include('layouts.partials.intern.footer')
    </div>
{{--</div>--}}

<!-- Scripts -->
<script src="{{ asset('js/intern.js') }}"></script>
@toastr_js
@toastr_render
@stack('js')
</body>
</html>
