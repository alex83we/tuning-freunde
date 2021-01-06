@extends('layouts.main')

@section('title', 'Cookies')

@section('canonical')
    <link rel="canonical" href="{{ url()->full() }}"/>
@endsection

@section('meta')
    <meta name="robots" content="index, follow" />
@endsection

@section('description')Dies ist unsere Cookie Übersicht.@endsection
@section('url'){{ url()->full() }}@endsection

@push('css')

@endpush

@section('content')
    <main id="main">

        <!-- ======= Breadcrumbs ======= -->
        <section id="breadcrumbs" class="breadcrumbs">
            <div class="container">

                <ol>
                    <li><a href="{{ url('/') }}">Startseite</a></li>
                    <li>{{ __('Cookies') }}</li>

                </ol>
                <div class="row">
                    <div class="col-lg-6">
                        <h2>{{ __('Cookies') }}</h2>
                    </div>
                    <div class="col-lg-6">

                    </div>
                </div>

            </div>
        </section><!-- End Breadcrumbs -->

        <!-- ======= Team Section ======= -->
        <section id="team" class="team">
            <div class="container">

                <div class="row" style="min-height: 200px;">
                    <div class="col-lg-12">
{{--                        <script id="CookieDeclaration" src="https://consent.cookiebot.com/48541541-62fc-417f-8ac7-d160ecd31575/cd.js" type="text/javascript"></script>--}}
                    </div>
                </div>
            </div>
        </section><!-- End Team Section -->

    </main><!-- End #main -->
@endsection

@push('js')

@endpush
