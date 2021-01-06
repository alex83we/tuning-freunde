@extends('layouts.main')

@section('title', 'Veranstaltungen')

@section('canonical')
    <link rel="canonical" href="{{ url()->full() }}"/>
@endsection

@section('meta')
    <meta name="robots" content="index, follow" />
@endsection

@section('description')Hier kannst du eine Übersicht über Veranstaltungen sehen die wir zusammen tragen.@endsection
@section('url'){{ url()->full() }}@endsection

@push('css')
    <style>
        .content {
            text-align: center;
        }

        .content nav ul.pagination {
            justify-content: center;
        }
    </style>
@endpush

@section('content')
    <main id="main">

        <!-- ======= Breadcrumbs ======= -->
        <section id="breadcrumbs" class="breadcrumbs">
            <div class="container">

                <ol>
                    <li><a href="{{ url('/') }}">Startseite</a></li>
                    <li>{{ __('Veranstaltungen') }}</li>

                </ol>
                <div class="row">
                    <div class="col-lg-6">
                        <h2>{{ __('Veranstaltungen') }}</h2>
                    </div>
                    <div class="col-lg-6">
                        <a href="{{ route('frontend.veranstaltungen.create') }}"
                           class="float-none float-lg-right mt-2 mt-lg-0"><i class="icofont-calendar"></i> Veranstaltung
                            eintragen</a>
                    </div>
                </div>

            </div>
        </section><!-- End Breadcrumbs -->

        <!-- ======= Team Section ======= -->
        <section id="team" class="team">
            <div class="container">

                <div class="row">

                    <div class="[ col-12 col-lg-12 ]">
                        @if(count($veranstaltungens) > 0)
                            @foreach($veranstaltungens as $veranstaltungen)
                                @if($veranstaltungen->published == true)
                                    @if (\Carbon\Carbon::parse($veranstaltungen->datum_von)->isoFormat('DD.MM.YYYY') == date('d.m.Y') or \Carbon\Carbon::parse($veranstaltungen->datum_bis)->isoFormat('DD.MM.YYYY') == date('d.m.Y'))
                                        <ul class="event-list">
                                            <li>
                                                <time datetime="{{ $veranstaltungen->datum_von }}" style="background-color: #7cf12e; color: black;">
                                                    <span
                                                        class="day">{{ \Carbon\Carbon::parse($veranstaltungen->datum_von)->isoFormat('DD') }}</span>
                                                    <span
                                                        class="month">{{ \Carbon\Carbon::parse($veranstaltungen->datum_von)->isoFormat('MMM') }}</span>
                                                    <span
                                                        class="year">{{ \Carbon\Carbon::parse($veranstaltungen->datum_von)->isoFormat('YYYY') }}</span>
                                                    {{--@if (\Carbon\Carbon::parse($veranstaltungen->datum_von)->isoFormat('DD.MM.YYYY') == \Carbon\Carbon::parse($veranstaltungen->datum_bis)->isoFormat('DD.MM.YYYY'))
                                                        <span class="time">ganztägig</span>
                                                    @endif--}}
                                                </time>
                                                {{--                                <img alt="Independence Day" src="https://farm4.staticflickr.com/3100/2693171833_3545fb852c_q.jpg">--}}
                                                <div class="info">
                                                    <h2 class="title">{{ $veranstaltungen->veranstaltung }}</h2>
                                                    <p class="date m-0"><i
                                                            class="icofont-calendar"></i> {{ \Carbon\Carbon::parse($veranstaltungen->datum_von)->isoFormat('DD.MM.YYYY HH:mm') }} @if(\Carbon\Carbon::parse($veranstaltungen->datum_von)->isoFormat('DD.MM.YYYY') != \Carbon\Carbon::parse($veranstaltungen->datum_bis)->isoFormat('DD.MM.YYYY'))
                                                            - {{ \Carbon\Carbon::parse($veranstaltungen->datum_bis)->isoFormat('DD.MM.YYYY HH:mm') }}@endif
                                                    </p>
                                                    <p class="desc"><a
                                                            href="{{ url('veranstaltungen/'.$veranstaltungen->slug) }}"><i
                                                                class="icofont-link"></i> mehr Details</a></p>
                                                    <ul>
                                                        <li style="width:50%;">@if($veranstaltungen->webseite)<a
                                                                href="{{ $veranstaltungen->webseite }}" target="_blank"><span
                                                                    class="icofont-globe"></span> Webseite @else
                                                                    &nbsp; @endif
                                                            </a>
                                                        </li>
                                                        <li style="width:50%;">@if($veranstaltungen->eintritt)<span
                                                                class="icofont-euro"></span>
                                                            Eintritt: {{ $veranstaltungen->eintritt }}@else
                                                                &nbsp; @endif
                                                        </li>
                                                    </ul>
                                                </div>
                                                @if($veranstaltungen->social_fb == true or $veranstaltungen->social_ig == true or $veranstaltungen->social_tw == true)
                                                    <div class="social">
                                                        <ul>
                                                            @if($veranstaltungen->social_fb)
                                                                <li class="facebook" style="width:33%;">
                                                                    <a href="{{ $veranstaltungen->social_fb }}"
                                                                       target="_blank">
                                                                        <span class="icofont-facebook"></span>
                                                                    </a>
                                                                </li>
                                                            @else
                                                                <li class="facebook" style="width:33%;">
                                                                    <a><span class="icofont-facebook"></span></a>
                                                                </li>
                                                            @endif
                                                            @if($veranstaltungen->social_tw)
                                                                <li class="twitter" style="width:34%;">
                                                                    <a href="{{ $veranstaltungen->social_tw }}"
                                                                       target="_blank">
                                                                        <span class="icofont-twitter"></span>
                                                                    </a>
                                                                </li>
                                                            @else
                                                                <li class="twitter" style="width:34%;">
                                                                    <a><span class="icofont-twitter"></span></a>
                                                                </li>
                                                            @endif
                                                            @if($veranstaltungen->social_ig)
                                                                <li class="instagram" style="width:33%;">
                                                                    <a href="{{ $veranstaltungen->social_ig }}"
                                                                       target="_blank">
                                                                        <span class="icofont-instagram"></span>
                                                                    </a>
                                                                </li>
                                                            @else
                                                                <li class="instagram" style="width:33%;">
                                                                    <a><span class="icofont-instagram"></span></a>
                                                                </li>
                                                            @endif
                                                        </ul>
                                                    </div>
                                                @endif
                                            </li>
                                        </ul>
                                    @else
                                        <ul class="event-list">
                                            <li>
                                                <time datetime="{{ $veranstaltungen->datum_von }}">
                                                    <span
                                                        class="day">{{ \Carbon\Carbon::parse($veranstaltungen->datum_von)->isoFormat('DD') }}</span>
                                                    <span
                                                        class="month">{{ \Carbon\Carbon::parse($veranstaltungen->datum_von)->isoFormat('MMM') }}</span>
                                                    <span
                                                        class="year">{{ \Carbon\Carbon::parse($veranstaltungen->datum_von)->isoFormat('YYYY') }}</span>
                                                    {{--@if (\Carbon\Carbon::parse($veranstaltungen->datum_von)->isoFormat('DD.MM.YYYY') == \Carbon\Carbon::parse($veranstaltungen->datum_bis)->isoFormat('DD.MM.YYYY'))
                                                        <span class="time">ganztägig</span>
                                                    @endif--}}
                                                </time>
                                                {{--                                <img alt="Independence Day" src="https://farm4.staticflickr.com/3100/2693171833_3545fb852c_q.jpg">--}}
                                                <div class="info">
                                                    <h2 class="title">{{ $veranstaltungen->veranstaltung }}</h2>
                                                    <p class="date m-0"><i
                                                            class="icofont-calendar"></i> {{ \Carbon\Carbon::parse($veranstaltungen->datum_von)->isoFormat('DD.MM.YYYY HH:mm') }} @if(\Carbon\Carbon::parse($veranstaltungen->datum_von)->isoFormat('DD.MM.YYYY') != \Carbon\Carbon::parse($veranstaltungen->datum_bis)->isoFormat('DD.MM.YYYY'))
                                                            - {{ \Carbon\Carbon::parse($veranstaltungen->datum_bis)->isoFormat('DD.MM.YYYY HH:mm') }}@endif
                                                    </p>
                                                    <p class="desc"><a
                                                            href="{{ url('veranstaltungen/'.$veranstaltungen->slug) }}"><i
                                                                class="icofont-link"></i> mehr Details</a></p>
                                                    <ul>
                                                        <li style="width:50%;">@if($veranstaltungen->webseite)<a
                                                                href="{{ $veranstaltungen->webseite }}" target="_blank"><span
                                                                    class="icofont-globe"></span> Webseite @else
                                                                    &nbsp; @endif
                                                            </a>
                                                        </li>
                                                        <li style="width:50%;">@if($veranstaltungen->eintritt)<span
                                                                class="icofont-euro"></span>
                                                            Eintritt: {{ $veranstaltungen->eintritt }}@else
                                                                &nbsp; @endif
                                                        </li>
                                                    </ul>
                                                </div>
                                                @if($veranstaltungen->social_fb == true or $veranstaltungen->social_ig == true or $veranstaltungen->social_tw == true)
                                                    <div class="social">
                                                        <ul>
                                                            @if($veranstaltungen->social_fb)
                                                                <li class="facebook" style="width:33%;">
                                                                    <a href="{{ $veranstaltungen->social_fb }}"
                                                                       target="_blank">
                                                                        <span class="icofont-facebook"></span>
                                                                    </a>
                                                                </li>
                                                            @else
                                                                <li class="facebook" style="width:33%;">
                                                                    <a><span class="icofont-facebook"></span></a>
                                                                </li>
                                                            @endif
                                                            @if($veranstaltungen->social_tw)
                                                                <li class="twitter" style="width:34%;">
                                                                    <a href="{{ $veranstaltungen->social_tw }}"
                                                                       target="_blank">
                                                                        <span class="icofont-twitter"></span>
                                                                    </a>
                                                                </li>
                                                            @else
                                                                <li class="twitter" style="width:34%;">
                                                                    <a><span class="icofont-twitter"></span></a>
                                                                </li>
                                                            @endif
                                                            @if($veranstaltungen->social_ig)
                                                                <li class="instagram" style="width:33%;">
                                                                    <a href="{{ $veranstaltungen->social_ig }}"
                                                                       target="_blank">
                                                                        <span class="icofont-instagram"></span>
                                                                    </a>
                                                                </li>
                                                            @else
                                                                <li class="instagram" style="width:33%;">
                                                                    <a><span class="icofont-instagram"></span></a>
                                                                </li>
                                                            @endif
                                                        </ul>
                                                    </div>
                                                @endif
                                            </li>
                                        </ul>
                                    @endif
                                @else
                                    @hasanyrole('Super Admin|Admin')
                                    <ul class="event-list">
                                        <li>
                                            <time datetime="{{ $veranstaltungen->datum_von }}"
                                                  style="background-color: darkred; color: #aaaaaa;">
                                                <span
                                                    class="day">{{ \Carbon\Carbon::parse($veranstaltungen->datum_von)->isoFormat('DD') }}</span>
                                                <span
                                                    class="month">{{ \Carbon\Carbon::parse($veranstaltungen->datum_von)->isoFormat('MMM') }}</span>
                                                <span
                                                    class="year">{{ \Carbon\Carbon::parse($veranstaltungen->datum_von)->isoFormat('YYYY') }}</span>
                                                {{--@if (\Carbon\Carbon::parse($veranstaltungen->datum_von)->isoFormat('DD.MM.YYYY') == \Carbon\Carbon::parse($veranstaltungen->datum_bis)->isoFormat('DD.MM.YYYY'))
                                                    <span class="time">ganztägig</span>
                                                @endif--}}
                                            </time>
                                            {{--                                <img alt="Independence Day" src="https://farm4.staticflickr.com/3100/2693171833_3545fb852c_q.jpg">--}}
                                            <div class="info">
                                                <h2 class="title">{{ $veranstaltungen->veranstaltung }}</h2>
                                                <p class="date m-0"><i
                                                        class="icofont-calendar"></i> {{ \Carbon\Carbon::parse($veranstaltungen->datum_von)->isoFormat('DD.MM.YYYY HH:mm') }} @if(\Carbon\Carbon::parse($veranstaltungen->datum_von)->isoFormat('DD.MM.YYYY') != \Carbon\Carbon::parse($veranstaltungen->datum_bis)->isoFormat('DD.MM.YYYY'))
                                                        - {{ \Carbon\Carbon::parse($veranstaltungen->datum_bis)->isoFormat('DD.MM.YYYY HH:mm') }}@endif
                                                </p>
                                                <p class="desc"><a
                                                        href="{{ url('veranstaltungen/'.$veranstaltungen->slug) }}"><i
                                                            class="icofont-link"></i> mehr Details</a></p>
                                                <ul>
                                                    <li style="width:50%;">@if($veranstaltungen->webseite)<a
                                                            href="{{ $veranstaltungen->webseite }}"
                                                            target="_blank"><span
                                                                class="icofont-globe"></span> Webseite @else
                                                                &nbsp; @endif
                                                        </a>
                                                    </li>
                                                    <li style="width:50%;">@if($veranstaltungen->eintritt)<span
                                                            class="icofont-euro"></span>
                                                        Eintritt: {{ $veranstaltungen->eintritt }}@else
                                                            &nbsp; @endif
                                                    </li>
                                                </ul>
                                            </div>
                                            @if($veranstaltungen->social_fb == true or $veranstaltungen->social_ig == true or $veranstaltungen->social_tw == true)
                                                <div class="social">
                                                    <ul>
                                                        @if($veranstaltungen->social_fb)
                                                            <li class="facebook" style="width:33%;">
                                                                <a href="{{ $veranstaltungen->social_fb }}"
                                                                   target="_blank">
                                                                    <span class="icofont-facebook"></span>
                                                                </a>
                                                            </li>
                                                        @else
                                                            <li class="facebook" style="width:33%;">
                                                                <a><span class="icofont-facebook"></span></a>
                                                            </li>
                                                        @endif
                                                        @if($veranstaltungen->social_tw)
                                                            <li class="twitter" style="width:34%;">
                                                                <a href="{{ $veranstaltungen->social_tw }}"
                                                                   target="_blank">
                                                                    <span class="icofont-twitter"></span>
                                                                </a>
                                                            </li>
                                                        @else
                                                            <li class="twitter" style="width:34%;">
                                                                <a><span class="icofont-twitter"></span></a>
                                                            </li>
                                                        @endif
                                                        @if($veranstaltungen->social_ig)
                                                            <li class="instagram" style="width:33%;">
                                                                <a href="{{ $veranstaltungen->social_ig }}"
                                                                   target="_blank">
                                                                    <span class="icofont-instagram"></span>
                                                                </a>
                                                            </li>
                                                        @else
                                                            <li class="instagram" style="width:33%;">
                                                                <a><span class="icofont-instagram"></span></a>
                                                            </li>
                                                        @endif
                                                    </ul>
                                                </div>
                                            @endif
                                        </li>
                                    </ul>
                                    @endhasanyrole
                                @endif
                            @endforeach
                        @else
                            <div style="height: 150px">
                                <p class="align-middle text-center font-weight-bold mt-3" style="font-size: 150%;">Es
                                    sind noch keine Veranstaltungen vorhanden.</p>
                            </div>
                        @endif
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="content">
                            {!! $veranstaltungens->appends(Request::all())->render() !!}
                            <div class="well">
                                <ul class="list-unstyled">
                                    <small>Veranstaltungen insgesamt: {!! $veranstaltungens->total() !!}</small> |
                                    <small>Auf dieser Seite: {!! $veranstaltungens->count() !!}</small> |
                                    <small>Alle Seiten: {!! $veranstaltungens->lastPage() !!}</small>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </section><!-- End Team Section -->

    </main><!-- End #main -->
@endsection

@push('js')

@endpush
