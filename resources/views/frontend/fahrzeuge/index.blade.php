@extends('layouts.main')

@section('title', 'Fahrzeuge')

@section('canonical')
    <link rel="canonical" href="{{ url()->full() }}"/>
@endsection

@section('meta')
    <meta name="robots" content="index, follow" />
@endsection

@section('description')Hier kannst du eine Übersicht sehen mit unseren aktuellen Fahrzeugen oder Projekten.@endsection
@section('url'){{ url()->full() }}@endsection

@push('css')
    <style>
        .content {
            text-align: right;
        }

        .content nav ul.pagination {
            justify-content: flex-end;
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
                    <li>Fahrzeuge</li>
                </ol>
                <div class="row">
                    <div class="col-lg-6">
                        <h2>Fahrzeuge</h2>
                    </div>
                    <div class="col-lg-6">
                        @can('fahrzeug-create')
                            <a href="{{ route('frontend.fahrzeuge.create') }}" class="float-none float-lg-right mt-2 mt-lg-0"><i class="icofont-plus"></i> Erstellen</a>
                        @endcan
                    </div>
                </div>

            </div>
        </section><!-- End Breadcrumbs -->

        <!-- ======= Team Section ======= -->
        <section id="team" class="team">
            <div class="container">

                <div class="row">
                    @if(count($fahrzeuges) > 0)
                        @foreach($fahrzeuges as $fahrzeug)
                            @if($fahrzeug->published == true)
                                <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
                                    <div class="member">
                                        @if($fahrzeug->images == 'default.png')
                                            <a id="fzlink" href="{{ url('fahrzeuge/'.$fahrzeug->slug) }}"><img
                                                        src="{{ Storage::disk('public')->url('default.png') }}"
                                                        alt="{{ $fahrzeug->title }}"
                                                        class="filter-gray"></a>
                                        @else
                                            <a id="fzlink" href="{{ url('fahrzeuge/'.$fahrzeug->slug) }}"><img
                                                        src="{{ Storage::disk('public')->url('images/'.$fahrzeug->slug.'/thumbnails/'.$fahrzeug->images) }}"
                                                        alt="{{ $fahrzeug->title }}"
                                                        class="filter-gray"></a>
                                        @endif
                                            <div style="height: 150px; width: 310px;">
                                                <h4>{{ $fahrzeug->fahrzeug }}</h4>
                                                @if($fahrzeug->description)
                                                {!! Str::limit($fahrzeug->description, 100) !!}
                                                @else
                                                    <p>Noch keine Beschreibung vorhanden!</p>
                                                @endif
                                            </div>
                                        <p><a id="fzlink" href="{{ url('fahrzeuge/'.$fahrzeug->slug) }}"><i class="icofont-link"></i> zum Fahrzeug</a></p>
                                    </div>
                                </div>
                            @else
                                @can('fahrzeug-edit')
                                    @if($fahrzeug->user_id == auth()->user()->id)
                                    <div class="col-lg-4 col-md-6 d-flex align-items-stretch">
                                        <div class="member">
                                            <img
                                                src="{{ Storage::disk('public')->url('images/'.$fahrzeug->slug.'/thumbnails/'.$fahrzeug->images) }}"
                                                alt="{{ $fahrzeug->title }}">
                                            <div style="height: 150px; width: 310px;">
                                                <h4>{{ $fahrzeug->fahrzeug }}</h4>
                                                <span class="text-danger font-weight-bold">Dein ausgeblendetes Fahrzeug!</span>
                                                <span>{!! Str::limit($fahrzeug->description, 120) !!}</span>
                                                <p><a id="fzlink" href="{{ url('fahrzeuge/'.$fahrzeug->slug) }}"><i
                                                            class="icofont-link"></i> zum Fahrzeug</a></p>
                                            </div>
                                        </div>
                                    </div>
                                    @endif
                                @endcan
                            @endif
                        @endforeach
                    @endif
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="content">
                            {!! $fahrzeuges->appends(Request::all())->render() !!}
                            <div class="well">
                                <ul class="list-unstyled">
                                    <small>Fahrzeuge insgesamt: {!! $fahrzeuges->total() !!}</small> |
                                    <small>Auf dieser Seite: {!! $fahrzeuges->count() !!}</small> |
                                    <small>Alle Seiten: {!! $fahrzeuges->lastPage() !!}</small>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </section><!-- End Portfolio Section -->

    </main><!-- End #main -->
@endsection

@push('js')

@endpush
