@extends('layouts.intern')

@push('css')
    <style>
        tr td p {
            margin: 0;
        }

        .fahrzeuge {
            width: 150px;
            height: 150px;
            object-fit: cover;
            object-position: center center;
            margin: 5px;
        }
    </style>
@endpush

@section('breadcrumb-title')
Antrag Übersicht
@endsection

@section('breadcrumb')
{{ Breadcrumbs::render('antrag-show', $antrag) }}
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
                            <a href="{{ route('backend.galerie.create') }}" class="btn btn-sm btn-primary px-3"><i class="icofont-plus"></i> Erstellen</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>--}}

        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <h2 class="card-text text-center @if($antrag->aktiv == true) bg-success @else bg-danger @endif p-2">Mitgliedsantrag #{{ $antrag->id }}</h2>
                        <div class="table-responsive">
                            <table id="antrag-uebersicht" class="table table-bordered w-100">
                                <tbody>
                                <tr>
                                    <td class="text-right w-25 bg-gray-light">Name:</td>
                                    <td>
                                        {{ $antrag->anrede }}
                                        {{ $antrag->vorname }}
                                        {{ $antrag->nachname }}
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-right w-25 bg-gray-light">Anschrift:</td>
                                    <td>
                                        {{ $antrag->straße }}<br>
                                        {{ $antrag->plz }} {{ $antrag->wohnort }}
                                    </td>
                                </tr>
                                <tr>
                                    <td class="text-right w-25 bg-gray-light">Geburtsdatum:</td>
                                    <td>{{ $antrag->geburtsdatum .' / '. $antrag->gebdatum }}</td>
                                </tr>
                                @if($antrag->beruf)
                                <tr>
                                    <td class="text-right w-25 bg-gray-light">Beruf:</td>
                                    <td>{{ $antrag->beruf }}</td>
                                </tr>
                                @endif
                                <tr>
                                    <td class="text-right w-25 bg-gray-light">Kontaktmöglichkeiten:</td>
                                    <td>
                                        @if($antrag->telefon){{ $antrag->telefon }} /@endif {{ $antrag->mobil }}<br>
                                        {{ $antrag->email }}
                                    </td>
                                </tr>
                                @if($antrag->facebook or $antrag->twitter or $antrag->instagram)
                                <tr>
                                    <td class="text-right w-25 bg-gray-light">Social Media:</td>
                                    <td>
                                        <a class="text-dark font-weight-bold"
                                           href="https://www.facebook.com/{{ $antrag->facebook }}"><i
                                                class="icofont-facebook"></i> {{ $antrag->facebook }}</a>&nbsp; <br>
                                        <a class="text-dark font-weight-bold"
                                           href="https://twitter.com/{{ $antrag->twitter }}"><i
                                                class="icofont-twitter"></i> {{ $antrag->twitter }}</a>&nbsp; <br>
                                        <a class="text-dark font-weight-bold"
                                           href="https://www.instagram.com/{{ $antrag->instagram }}/"><i
                                                class="icofont-instagram"></i> {{ $antrag->instagram }}</a>
                                    </td>
                                </tr>
                                @endif
                                <tr>
                                    <td class="text-right w-25 bg-gray-light">Beschreibung:</td>
                                    <td>{!! $antrag->description !!}</td>
                                </tr>
                                <tr>
                                    <td class="text-right w-25 bg-gray-light">Profilbild:</td>
                                    <td><img
                                            src="{{ Storage::disk('public')->url('images/profil/'.$antrag->image) }}"
                                            class="img-thumbnail img-fluid w-25" alt="Profilbild"></td>
                                </tr>
                                @if($antrag->fahrzeug_id == true)
                                    <tr>
                                        <td colspan="2" class="text-center"><h3>Fahrzeug</h3></td>
                                    </tr>
                                    @if($antrag->fahrzeuge->fahrzeug)
                                    <tr>
                                        <td class="text-right w-25 bg-gray-light">Fahrzeug:</td>
                                        <td>{{ $antrag->fahrzeuge->fahrzeug }}</td>
                                    </tr>
                                    @endif
                                    @if($antrag->fahrzeuge->baujahr)
                                    <tr>
                                        <td class="text-right w-25 bg-gray-light">Baujahr:</td>
                                        <td>{{ $antrag->fahrzeuge->baujahr }}</td>
                                    </tr>
                                    @endif
                                    @if($antrag->fahrzeuge->besonderheiten)
                                    <tr>
                                        <td class="text-right w-25 bg-gray-light">Besonderheiten:</td>
                                        <td>{!! $antrag->fahrzeuge->besonderheiten !!}</td>
                                    </tr>
                                    @endif
                                    @if($antrag->fahrzeuge->motor)
                                    <tr>
                                        <td class="text-right w-25 bg-gray-light">Motor:</td>
                                        <td>{!! $antrag->fahrzeuge->motor !!}</td>
                                    </tr>
                                    @endif
                                    @if($antrag->fahrzeuge->karosserie)
                                    <tr>
                                        <td class="text-right w-25 bg-gray-light">Karosserie:</td>
                                        <td>{!! $antrag->fahrzeuge->karosserie !!}</td>
                                    </tr>
                                    @endif
                                    @if($antrag->fahrzeuge->felgen)
                                    <tr>
                                        <td class="text-right w-25 bg-gray-light">Felgen:</td>
                                        <td>{!! $antrag->fahrzeuge->felgen !!}</td>
                                    </tr>
                                    @endif
                                    @if($antrag->fahrzeuge->fahrwerk)
                                    <tr>
                                        <td class="text-right w-25 bg-gray-light">Fahrwerk:</td>
                                        <td>{!! $antrag->fahrzeuge->fahrwerk !!}</td>
                                    </tr>
                                    @endif
                                    @if($antrag->fahrzeuge->bremsen)
                                    <tr>
                                        <td class="text-right w-25 bg-gray-light">Bremsen:</td>
                                        <td>{!! $antrag->fahrzeuge->bremsen !!}</td>
                                    </tr>
                                    @endif
                                    @if($antrag->fahrzeuge->innenraum)
                                    <tr>
                                        <td class="text-right w-25 bg-gray-light">Innenraum:</td>
                                        <td>{!! $antrag->fahrzeuge->innenraum !!}</td>
                                    </tr>
                                    @endif
                                    @if($antrag->fahrzeuge->anlage)
                                    <tr>
                                        <td class="text-right w-25 bg-gray-light">Anlage:</td>
                                        <td>{!! $antrag->fahrzeuge->anlage !!}</td>
                                    </tr>
                                    @endif
                                    @if($antrag->fahrzeuge->description)
                                    <tr>
                                        <td class="text-right w-25 bg-gray-light">Beschreibung:</td>
                                        <td>{!! $antrag->fahrzeuge->description !!}</td>
                                    </tr>
                                    @endif
                                    @if(count($antrag->photos) > 0)
                                    <tr>
                                        <td class="text-right w-25 bg-gray-light">Fahrzeugbilder:</td>
                                        <td>
                                            @foreach($antrag->photos as $photo)
                                                <img src="{{ Storage::disk('public')->url('images/'.$antrag->fahrzeuge->slug.'/thumbnails/'.$photo->images) }}" class="img-fluid img-thumbnail fahrzeuge" alt="{{ 'Fahrzeugbild: ' .$photo->images }}">
                                            @endforeach
                                        </td>
                                    </tr>
                                    @else
                                        <tr>
                                            <td class="text-right w-25 bg-gray-light">Fahrzeugbilder:</td>
                                            <td class="text-danger font-weight-bold">Es wurden keine Bilder hochgeladen!</td>
                                        </tr>
                                    @endif
                                @endif
                                </tbody>
                            </table>
                        </div>
                        @if($antrag->aktiv == 0)
                            <form action="{{ route('intern.antrag.updateChecked', $antrag->id) }}"
                                  method="POST">
                                @csrf
                                @method('PATCH')
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group row m-0">
                                            <label for="title"
                                                   class="col-lg-2 col-form-label text-right @error ('title') is-invalid @enderror">Titel:</label>
                                            <div class="col-lg-10">
                                                <input class="form-control form-control-sm" type="text" name="title"
                                                       id="title" maxlength="255">
                                                @error('title')
                                                <small class="form-text text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row m-0">
                                            <label for="emailIntern"
                                                   class="col-lg-2 col-form-label text-right @error ('emailIntern') is-invalid @enderror">eMail Intern:</label>
                                            <div class="col-lg-10">
                                                <input class="form-control form-control-sm" type="text" name="emailIntern"
                                                       id="emailIntern" maxlength="255" value="{{ $antrag->vorname.'.'.$antrag->nachname[0] }}">
                                                @error('emailIntern')
                                                <small class="form-text text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row m-0">
                                            <label for="published_at"
                                                   class="col-lg-2 col-form-label text-right @error ('published_at') is-invalid @enderror">Mitglied seit:</label>
                                            <div class="col-lg-10">
                                                <input class="form-control form-control-sm" type="text" name="published_at"
                                                       id="published_at" maxlength="255" value="{{ Carbon\Carbon::parse(now())->isoFormat('DD.MM.YYYY') }}">
                                                @error('published_at')
                                                <small class="form-text text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group row m-0">
                                            <label for="funktion"
                                                   class="col-lg-2 col-form-label text-right @error ('funktion') is-invalid @enderror">Funktion:</label>
                                            <div class="col-lg-10">
                                                <select class="form-control form-control-sm" type="text" name="funktion"
                                                        id="funktion">
                                                    <option value="Clubmitglied" selected>Clubmitglied</option>
                                                    <option value="Gründungsmitglied & Webmaster">Gründungsmitglied & Webmaster</option>
                                                    <option value="Gründungsmitglied & Chef">Gründungsmitglied & Chef</option>
                                                </select>
                                                @error('funktion')
                                                <small class="form-text text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="text-right">
                                            <input type="hidden" name="is_checked" value="1">
                                            @if ($antrag->fahrzeugvorhanden == false)
                                            <input type="hidden" name="album_id" value="{{ $antrag->fahrzeuge->album_id }}">
                                            <input type="hidden" name="fahrzeug_id"
                                                   value="{{ $antrag->fahrzeug_id }}">
                                            <input type="hidden" name="titleFZ"
                                                   value="{{ $antrag->fahrzeuge->title }}">
                                            <input type="hidden" name="nameFZ"
                                                   value="{{ $antrag->fahrzeuge->name }}">
                                            <input type="hidden" name="slugFZ"
                                                   value="{{ $antrag->fahrzeuge->slug }}">
                                            @endif
                                            <button type="submit" class="btn btn-sm btn-danger"><i
                                                    class="fa fa-times"></i> Freigeben
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        @else
                            <form action="{{ route('intern.antrag.updateRevoke', $antrag->id) }}" method="post">
                                @csrf
                                @method('PATCH')
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="text-right">
                                            <input type="hidden" name="is_checked" value="0">
                                            @if ($antrag->fahrzeugvorhanden == false)
                                            <input type="hidden" name="antrag_id" value="{{ $antrag->id }}">
                                            <input type="hidden" name="album_id"
                                                   value="{{ $antrag->fahrzeuge->album_id }}">
                                            <input type="hidden" name="slugFZ"
                                                   value="{{ $antrag->fahrzeuge->slug }}">
                                            <input type="hidden" id="slugTeam"
                                                   name="slugTeam"
                                                   class="form-control form-control-sm @error ('slug') is-invalid @enderror"
                                                   value="{{ $antrag->slug }}" maxlength="255">
                                            @endif
                                            <button type="submit" class="btn btn-sm btn-success"><i
                                                    class="fa fa-check"></i> Zurückziehen
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        @endif
                    </div>
                </div>
            </div>

            <div class="col-lg-12 mb-2">
                <div class="text-right "><small>IP Adresse: {{ $antrag->ip_adresse }}</small></div>
                <div class="text-right"><small>Erstellt
                        am: {{ \Carbon\Carbon::parse($antrag->created_at)->isoFormat('DD.MM.YYYY HH:mm:ss') }}</small>
                </div>
            </div>
        </div>

    </div>
</section>

@endsection

@push('js')

@endpush
