@extends('layouts.main')

@section('title', 'Team')

@section('canonical')
    <link rel="canonical" href="{{ url()->full() }}"/>
@endsection

@section('meta')
    <meta name="robots" content="index, follow" />
@endsection

@section('description')Hier kannst du alle aktiven Teammitglieder sehen.@endsection
@section('url'){{ url()->full() }}@endsection

@push('css')
    <style>
        .content {
            text-align: right;
        }

        .content nav ul.pagination {
            justify-content: flex-end;
        }

        @foreach($teams as $team)
        #profileImage-{{ $team->id }} {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            background: #7cf12e;
            font-size: 72px;
            font-weight: bold;
            color: #404040;
            text-align: center;
            line-height: 150px;
            margin: 0px auto;
        }
        @endforeach
    </style>
@endpush

@section('content')
    <main id="main">

        <!-- ======= Breadcrumbs ======= -->
        <section id="breadcrumbs" class="breadcrumbs">
            <div class="container">

                <ol>
                    <li><a href="{{ url('/') }}">Startseite</a></li>
                    <li>{{ __('Team') }}</li>

                </ol>
                <h2>{{ __('Teamübersicht') }}</h2>

            </div>
        </section><!-- End Breadcrumbs -->

        <!-- ======= Team Section ======= -->
        <section id="team" class="team">
            <div class="container">

                <div class="row">
                    @if(count($teams) > 0)
                        @foreach($teams as $team)
                            @if($team->aktiv == true)
                                @if(\Carbon\Carbon::parse($team->published_at) >= now()->subMonth())
                                    <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
                                        <div class="member" id="teammember">
                                            @if($team->image == true)
                                                <a id="teamlink"
                                                   href="{{ url('team/'.$team->slug) }}">
                                                    <img src="{{ Storage::disk('public')->url('images/profil/'.$team->image) }}"
                                                        alt="{{ $team->vorname.' '.$team->nachname }}" class="filter-gray">
                                                </a>
                                            @else
                                                <a id="teamlink"
                                                   href="{{ url('team/'.$team->slug) }}"><div style="margin: 0 0 30px 0; vertical-align: middle;">
                                                    <div id="profileImage-{{ $team->id }}" class="filter-gray"></div>
                                                    <span id="vorname-{{ $team->id }}" class="d-none"
                                                          style="font-size: 1.125rem;">{{ $team->vorname }}</span> <span
                                                        id="nachname-{{ $team->id }}" class="d-none"
                                                        style="font-size: 1.125rem;">{{ $team->nachname }}</span>
                                                    </div></a>
                                            @endif
                                            <div style="height: 170px;">
                                                <h4 style="color: red; font-weight: bold;">{{ $team->title }}</h4>
                                                <span style="color: red; font-weight: bold;">{{ 'Neues '.$team->funktion }}</span>
                                                <span>{!! strip_tags(Str::limit($team->description, 120)) !!}</span>
                                                @if($team->facebook == true or $team->instagram or $team->twitter)
                                                <div class="social">
                                                    @if($team->facebook)
                                                    <a href="https://www.facebook.com/{{ $team->facebook }}" target="_blank"><i
                                                            class="icofont-facebook"></i></a>
                                                    @endif
                                                    @if($team->twitter)
                                                    <a href="https://twitter.com/{{ $team->twitter }}" target="_blank"><i
                                                            class="icofont-twitter"></i></a>
                                                    @endif
                                                        @if($team->instagram)
                                                    <a href="https://www.instagram.com/{{ $team->instagram }}/" target="_blank"><i
                                                            class="icofont-instagram"></i></a>
                                                        @endif
                                                </div>
                                                @else
                                                    <div class="social">
                                                        &nbsp;
                                                    </div>
                                                @endif
                                                <p class="mb-0"><a id="teamlink"
                                                                   href="{{ url('team/'.$team->slug) }}"><i
                                                            class="icofont-link"></i> Über mich</a></p>
                                            </div>
                                        </div>
                                    </div>
                                @else
                                    <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
                                        <div class="member" id="teammember">
                                            @if($team->image == true)
                                                <a id="teamlink"
                                                   href="{{ url('team/'.$team->slug) }}">
                                                    <img src="{{ Storage::disk('public')->url('images/profil/'.$team->image) }}"
                                                         alt="{{ $team->vorname.' '.$team->nachname }}" class="filter-gray">
                                                </a>
                                            @else
                                                <a id="teamlink"
                                                   href="{{ url('team/'.$team->slug) }}"><div style="margin: 0 0 30px 0; vertical-align: middle;">
                                                        <div id="profileImage-{{ $team->id }}" class="filter-gray"></div>
                                                        <span id="vorname-{{ $team->id }}" class="d-none"
                                                              style="font-size: 1.125rem;">{{ $team->vorname }}</span> <span
                                                            id="nachname-{{ $team->id }}" class="d-none"
                                                            style="font-size: 1.125rem;">{{ $team->nachname }}</span>
                                                    </div></a>
                                            @endif
                                            <div style="height: 170px;">
                                                <h4>{{ $team->title }}</h4>
                                                <span>{{ $team->funktion }}</span>
                                                <span>{!! strip_tags(Str::limit($team->description, 120)) !!}</span>
                                                @if($team->facebook == true or $team->instagram or $team->twitter)
                                                    <div class="social">
                                                        @if($team->facebook)
                                                            <a href="https://www.facebook.com/{{ $team->facebook }}" target="_blank"><i
                                                                    class="icofont-facebook"></i></a>
                                                        @endif
                                                        @if($team->twitter)
                                                            <a href="https://twitter.com/{{ $team->twitter }}" target="_blank"><i
                                                                    class="icofont-twitter"></i></a>
                                                        @endif
                                                        @if($team->instagram)
                                                            <a href="https://www.instagram.com/{{ $team->instagram }}/" target="_blank"><i
                                                                    class="icofont-instagram"></i></a>
                                                        @endif
                                                    </div>
                                                @else
                                                    <div class="social">
                                                        &nbsp;
                                                    </div>
                                                @endif
                                                <p class="mb-0"><a id="teamlink"
                                                                   href="{{ url('team/'.$team->slug) }}"><i
                                                            class="icofont-link"></i> Über mich</a></p>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @endif
                        @endforeach
                    @else
                        <div class="col-lg-12">
                        <div style="height: 250px;">
                            <div class="member">
                                <span>Aktuell sind keine Teammitglieder vorhanden!</span>
                            </div>
                        </div>
                        </div>
                    @endif
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="content">
                            {!! $teams->appends(Request::all())->render() !!}
                            <div class="well">
                                <ul class="list-unstyled">
                                    <small>Mitglieder insgesamt: {!! $teams->total() !!}</small> |
                                    <small>Auf dieser Seite: {!! $teams->count() !!}</small> |
                                    <small>Alle Seiten: {!! $teams->lastPage() !!}</small>
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
    <script>
        $(document).ready(function () {
            @foreach($teams as $team)
            var vorname = $('#vorname-{{ $team->id }}').text();
            var nachname = $('#nachname-{{ $team->id }}').text();
            var initials = $('#vorname-{{ $team->id }}').text().charAt(0) + $('#nachname-{{ $team->id }}').text().charAt(0);
            var profileImage = $('#profileImage-{{ $team->id }}').text(initials);
            @endforeach
        });
    </script>
@endpush
