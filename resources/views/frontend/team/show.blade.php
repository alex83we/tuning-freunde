@extends('layouts.main')

@section('title')
    {{ $team->title }}
@endsection

@section('canonical')
    <link rel="canonical" href="{{ url()->full() }}"/>
@endsection

@section('meta')
    <meta name="robots" content="index, follow" />
@endsection

@section('description'){!! strip_tags(Str::limit($team->description, 155)) !!}@endsection
@section('url'){{ url()->full() }}@endsection
@section('image'){{ url('images/team/'.$team->image) }}@endsection

@push('css')
    <style>
        #profileImage {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: #7cf12e;
            font-size: 14px;
            font-weight: bold;
            color: #404040;
            text-align: center;
            line-height: 40px;
            float: right;
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
                    @foreach($navigation as $item)
                        @if($item->title == 'Team')
                            <li>{{ $item->title }}</li>
                        @endif
                    @endforeach

                </ol>
                <div class="row">
                    <div class="col-lg-6">
                        <h2>{{ $team->title }}</h2>
                    </div>
                    <div class="col-lg-6">
                        {{--@can('team-create')
                            <a href="{{ route('frontend.team.create') }}" class="float-none float-lg-right mt-2 mt-lg-0"><i
                                    class="icofont-plus"></i> Erstellen</a>
                        @endcan--}}
                        @can('team-edit')
                            @if(auth()->user()->id == $team->user_id)
                                <a href="{{ route('frontend.team.edit', $team->slug) }}"
                                   class="float-none float-lg-right mt-2 mt-lg-0 mr-3"><i class="icofont-edit"></i>
                                    Bearbeiten</a>
                            @endif
                        @endcan
                    </div>

                </div>
            </div>
        </section><!-- End Breadcrumbs -->

        <!-- ======= Team Section ======= -->
        <section id="team" class="team">
            <div class="container">

                <div class="row">
                    <div class="col-lg-8 col-md-6 align-items-stretch members-description">
                        <h1>Mitglied seit {{ \Carbon\Carbon::parse($team->published_at)->isoFormat('DD.MM.YYYY') }}</h1>
                        {!! $team->description !!}
                    </div>
                    <div class="col-lg-4 col-md-6 align-items-stretch pt-4 pt-lg-0">
                        <div class="members">
                            @if($team->image == true)
                                <img src="{{ Storage::disk('public')->url('images/profil/'.$team->image) }}"
                                     alt="{{ $team->title }}" class="profilimg filter-gray">
                            @else
                                <div id="profileImage" class="filter-gray"></div>
                            @endif
                            <h2>Über mich</h2>
                            <hr>
                            <div class="row m-0 w-100">
                                <div class="col-lg-3 p-0">
                                    <h5>Name:</h5>
                                </div>
                                <div class="col-lg-9">
                                    <h5><span id="vorname" class="d-inline"
                                              style="font-size: 1.125rem;">{{ $team->vorname }}</span> <span
                                            id="nachname" class="d-inline"
                                            style="font-size: 1.125rem;">{{ $team->nachname }}</span></h5>
                                </div>
                                <div class="col-lg-3 p-0">
                                    <span>Alter: </span>
                                </div>
                                <div class="col-lg-9">
                                    <span> {{ $team->gebdatum }}</span>
                                </div>
                                <div class="col-lg-3 p-0">
                                    <span>Funktion: </span>
                                </div>
                                <div class="col-lg-9">
                                    <span>{{ $team->funktion }}</span>
                                </div>
                                <div class="col-lg-3 p-0">
                                    <span>Wohnort: </span>
                                </div>
                                <div class="col-lg-9">
                                    <span> {{ $team->wohnort }}</span>
                                </div>
                                <div class="col-lg-3 p-0">
                                    <span>Kontakt: </span>
                                </div>
                                <div class="col-lg-9">
                                    <span> <a href="mailto:{{ $team->emailIntern }}@thueringer-tuning-freunde.de"
                                              target="_blank"><i
                                                class="icofont-envelope"></i> Schreib mir</a></span>
                                </div>
                                <div class="col-lg-3 p-0">
                                    <span>Beruf: </span>
                                </div>
                                <div class="col-lg-9">
                                    <span> {{ $team->beruf }}</span>
                                </div>
                                @if(count($fahrzeuge) > 0)
                                    <div class="col-lg-3 p-0">
                                        <span>Fahrzeuge: </span>
                                    </div>
                                    <div class="col-lg-9">
                                        <span>
                                            @foreach($fahrzeuge as $item)
                                                <a href="{{ url('fahrzeuge/'.$item->slug) }}">{{ $item->fahrzeug }}</a>
                                                <br>
                                            @endforeach
                                        </span>
                                    </div>
                                @endif

                                <div class="col-lg-12 p-0">
                                    <div class="social">
                                        @if($team->twitter)
                                            <a href="{{ '//www.twitter.com/'.$team->twitter }}" target="_blank"><i
                                                    class="icofont-twitter"></i></a>
                                        @endif
                                        @if($team->facebook)
                                            <a href="{{ '//www.facebook.com/'.$team->facebook }}" target="_blank"><i
                                                    class="icofont-facebook"></i></a>
                                        @endif
                                        @if($team->instagram)
                                            <a href="{{ '//www.instagram.com/'.$team->instagram.'/' }}"
                                               target="_blank"><i class="icofont-instagram"></i></a>
                                        @endif
                                    </div>
                                    @hasanyrole('Super Admin|Admin')
                                    <br>
                                    <form action="{{ route('frontend.team.destroy', $team->slug) }}"
                                          method="post">
                                        @csrf
                                        @method('DELETE')
                                        <input type="hidden" name="id" value="{{ $team->id }}">
                                        <input type="hidden" name="slug" value="{{ $team->slug }}">
                                        <button type="submit" class="btn btn-sm btn-danger"><i
                                                class="icofont-trash"></i> Löschen
                                        </button>
                                    </form>
                                    @endhasanyrole
                                </div>
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
            var vorname = $('#vorname').text();
            var nachname = $('#nachname').text();
            var initials = $('#vorname').text().charAt(0) + $('#nachname').text().charAt(0);
            var profileImage = $('#profileImage').text(initials);
        });
    </script>
@endpush
