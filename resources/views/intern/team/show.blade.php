@extends('layouts.intern')

@push('css')
<style>
    .teammit {
        height: 280px;
        max-height: 280px;
    }

    #profileImage-{{ $team->id }}  {
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
</style>
@endpush

@section('breadcrumb-title')
    Teammitglied {{ $team->vorname.' '.$team->nachname }}
@endsection

@section('breadcrumb')
    {{ Breadcrumbs::render('team-show', $team) }}
@endsection

@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">

            {{--<div class="row">
                <div class="col-lg-12 mb-4">
                    <div class="control-toolbar">
                        <div class="toolbar-item">
                            <div class="toolbar">
                                <a href="{{ route('intern.galerie.create') }}" class="btn btn-sm btn-primary px-3"><i class="icofont-plus"></i> Erstellen</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>--}}

            <div class="row">
                <div class="col-lg-12">
                    <div class="mb-3">
                        <h4>Persönliche Daten der Anmeldung von {{ $team->title }} inklusive aller Fahrzeuge und
                            Alben!</h4>
                        <h6>Hinweis:</h6>
                        <small class="text-danger">
                            Wir bitten euch darum diese Daten vertraulich zu behandeln diese sind nur für uns
                            als Mitglieder hinterlegt diese sehen auch nur aktive Mitglieder.
                            <br>
                            Missbrauch dieser hier gezeigten Daten wird zur Anzeige gebracht und mit sofortigem
                            Ausschluss aus unserem Club bestraft.
                            <br>
                            <span class="text-uppercase font-weight-bold">Wir bitten euch darum die Privatsphäre des jeweils anderen zu schützen.</span>
                        </small>
                    </div>
                        <div class="row">
                            <div class="col-lg-4">
                                <div class="card teammit">
                                    <div class="card-body">
                                        <div class="d-table w-100">
                                            <div class="d-table-row">
                                                <div class="d-table-cell w-25">Name:</div>
                                                <div class="d-table-cell w-75">{{ $team->vorname.' '.$team->nachname }}</div>
                                            </div>
                                            <div class="d-table-row">
                                                <div class="d-table-cell w-25 align-text-top">Anschrift:</div>
                                                @if ($team->user_id == auth()->user()->id)
                                                <div class="d-table-cell w-75">
                                                    {{ $team->straße }}<br>
                                                    {{ $team->plz.' '.$team->wohnort }}
                                                </div>
                                                @else
                                                <div class="d-table-cell w-75">
                                                    *** Zensur ***
                                                </div>
                                                @endif
                                            </div>
                                            <div class="text-center font-weight-bold mt-2"><p>Kontaktmöglichkeiten</p></div>
                                            @if ($team->telefon)
                                            <div class="d-table-row">
                                                <div class="d-table-cell w-25 align-text-top">Telefon:</div>
                                                <div class="d-table-cell w-75">{{ $team->telefon }} </div>
                                            </div>
                                            @endif
                                            @if ($team->mobil)
                                            <div class="d-table-row">
                                                <div class="d-table-cell w-25 align-text-top">Mobiltelefon:</div>
                                                <div class="d-table-cell w-75">{{ $team->mobil }} </div>
                                            </div>
                                            @endif
                                            @if ($team->email)
                                            <div class="d-table-row">
                                                <div class="d-table-cell w-25 align-text-top">E-Mail Adresse:</div>
                                                <div class="d-table-cell w-75"><a href="mailto:{{ $team->email }}">{{ $team->email }}</a> </div>
                                            </div>
                                            @endif
                                            @if ($team->emailIntern)
                                            <div class="d-table-row">
                                                <div class="d-table-cell w-25 align-text-top">E-Mail Adresse Intern:</div>
                                                <div class="d-table-cell w-75"><a href="mailto:{{ $team->emailIntern }}@thueringer-tuning-freunde.de">{{ $team->emailIntern }}@thueringer-tuning-freunde.de</a> </div>
                                            </div>
                                            @endif
                                            @if ($team->facebook or $team->instagram or $team->twitter)
                                            <div class="d-table-row">
                                                <div class="d-table-cell w-25 align-text-top">Social-Media:</div>
                                                <div class="d-table-cell w-75">
                                                    @if($team->facebook)
                                                    <a href="https://www.facebook.com/{{ $team->facebook }}"><i class="icofont-facebook"></i></a>&nbsp;
                                                    @endif
                                                    @if($team->instagram)
                                                         | &nbsp; <a href="https://www.instagram.com/{{ $team->instagram }}/"><i class="icofont-instagram"></i></a>&nbsp;
                                                    @endif
                                                    @if($team->twitter)
                                                         | &nbsp; <a href="https://twitter.com/{{ $team->twitter }}"><i class="icofont-twitter"></i></a>
                                                    @endif
                                                </div>
                                            </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="card teammit">
                                    <div class="card-body">
                                        <div class="d-table w-100">
                                            <div class="d-table-row">
                                                <div class="d-table-cell w-25">Funktion:</div>
                                                <div class="d-table-cell w-75">{{ $team->funktion }}</div>
                                            </div>
                                            <div class="d-table-row">
                                                <div class="d-table-cell w-25">Beruf:</div>
                                                <div class="d-table-cell w-75">{{ $team->beruf }}</div>
                                            </div>
                                            @if(\Carbon\Carbon::parse($team->geburtsdatum)->isoFormat('DD.MM') != date('d.m'))
                                            <div class="d-table-row">
                                                <div class="d-table-cell w-25">Geburtstag:</div>
                                                <div class="d-table-cell w-75">{{ $team->geburtsdatum }}</div>
                                            </div>
                                            @else
                                            <div class="d-table-row">
                                                <div class="d-table-cell w-25">Geburtstag:</div>
                                                <div class="d-table-cell w-75 font-weight-bold">{{ $team->geburtsdatum }}<br>
                                                    🎉 🥳 Alles Gute zum Geburtstag wünscht dir das Team der Thüringer Tuning Freunde und viel Glück auf deinem weiteren Lebensweg. 🥳 🎉
                                                </div>
                                            </div>
                                            @endif
                                            <div class="d-table-row">
                                                <div class="d-table-cell w-25">Alter:</div>
                                                <div class="d-table-cell w-75">{{ $team->gebdatum }}</div>
                                            </div>
                                            <div class="d-table-row">
                                                <div class="d-table-cell w-25">Mitglied seit:</div>
                                                <div class="d-table-cell w-75">{{ \Carbon\Carbon::parse($team->published_at)->isoFormat('DD.MM.YYYY') }}</div>
                                            </div>
                                        </div>
                                        <div class="text-right my-3">
                                        <span><a href="{{ route('frontend.team.show', $team->slug) }}"><i class="icofont-eye"></i> Ansehen</a> </span>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-4">
                                <div class="card">
                                    <div class="card-body teammit">
                                        @if($team->image == true)
                                        <p>Dein Profil (Team) Foto</p>
                                        <img src="{{ \Illuminate\Support\Facades\Storage::disk('public')->url('images/profil/'.$team->image) }}" class="img-fluid img-rounded img-thumbnail" width="200px" height="200px" alt="Profilbild">
                                        @else
                                            <div id="profileImage-{{ $team->id }}" ></div>
                                            <span id="vorname-{{ $team->id }}" class="d-none"
                                                  style="font-size: 1.125rem;">{{ $team->vorname }}</span> <span
                                                id="nachname-{{ $team->id }}" class="d-none"
                                                style="font-size: 1.125rem;">{{ $team->nachname }}</span>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-lg-6">

                                <div class="card">
                                    <div class="card-body">
                                        <p>Fahrzeuge</p>
                                        @if(count($team->fahrzeuges) > 0)
                                        <div class="d-table w-100">
                                            @foreach($team->fahrzeuges as $fahrzeug)
                                            <div class="d-table-row">
                                                <div class="d-table-cell">
                                                    <a href="{{ route('frontend.fahrzeuge.show', $fahrzeug->slug) }}">{{ $fahrzeug->fahrzeug.' | Baujahr: '.$fahrzeug->baujahr.' | Erstellt am: '.\Carbon\Carbon::parse($fahrzeug->created_at)->isoFormat('DD.MM.YYYY').' | Letztes Update am: '.\Carbon\Carbon::parse($fahrzeug->updated_at)->isoFormat('DD.MM.YYYY') }}</a>
                                                </div>
                                            </div>
                                            @endforeach
                                        </div>
                                        @else
                                            <span>Keine Fahrzeuge vorhanden</span>
                                        @endif
                                    </div>
                                </div>

                            </div>

                            <div class="col-lg-6">

                                <div class="card">
                                    <div class="card-body">
                                        <p>Fotoalben</p>
                                        @if(count($team->galerie) > 0)
                                            <div class="d-table w-100">
                                                @foreach($team->galerie as $galerie)
                                                    <div class="d-table-row">
                                                        <div class="d-table-cell">
                                                            <a href="{{ route('frontend.galerie.show', $galerie->slug) }}">{{ $galerie->title . ' | Kategorie: '. $galerie->kategorie .' | Erstellt am: '.\Carbon\Carbon::parse($galerie->created_at)->isoFormat('DD.MM.YYYY').' | Letztes Update am: '.\Carbon\Carbon::parse($galerie->updated_at)->isoFormat('DD.MM.YYYY'). ' | ' . $galerie->photos->count(). ' Photos' }}</a>
                                                        </div>
                                                    </div>
                                                @endforeach
                                            </div>
                                        @else
                                            <span>Keine Galerie vorhanden</span>
                                        @endif
                                    </div>
                                </div>

                            </div>
                        </div>

                        <div class="col-lg-12 mb-2">
                            <div class="text-right"><small>IP Adresse bei der Anmeldung: {{ $team->ip_adresse }}</small></div>
                        </div>
                </div>
            </div>
        </div>
    </section>

@endsection

@push('js')
    <script>
        $(document).ready(function () {
{{--            @foreach($teams as $team)--}}
            var vorname = $('#vorname-{{ $team->id }}').text();
            var nachname = $('#nachname-{{ $team->id }}').text();
            var initials = $('#vorname-{{ $team->id }}').text().charAt(0) + $('#nachname-{{ $team->id }}').text().charAt(0);
            var profileImage = $('#profileImage-{{ $team->id }}').text(initials);
{{--            @endforeach--}}
        });
    </script>
@endpush
