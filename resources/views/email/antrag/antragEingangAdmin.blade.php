@extends('email.layouts.email')

@section('titleEmail')
    Neuer Mitgliedsantrag von {{ $team->vorname . ' ' . $team->nachname }}
    @if ($team->fahrzeugvorhanden == false)
        @if($team->fahrzeuge->fahrzeug) mit dem Fahrzeug {{ $team->fahrzeuge->fahrzeug }}@endif
    @endif
@endsection

@section('contentEmail')
    <p>Ein neuer Mitgliedsantrag ist eingeangen:</p>
    <p>Zum Antrag: <a href="{{ url('intern/antrag', $team->id) }}">hier klicken</a></p>
    <div style="width: 100%; background-color: #404040; color: white; text-align: center;">Persönliche Daten</div>
    <table width="100%" border="0">
        <tr>
            <td style="width: 200px;">Name:</td>
            <td>{{ $team->anrede.' '.$team->vorname.' '.$team->nachname }}</td>
        </tr>
        <tr>
            <td style="width: 200px;">Anschrift:</td>
            <td>{{ $team->straße }}<br>{{ $team->plz.' '.$team->wohnort }}</td>
        </tr>
        <tr>
            <td style="width: 200px;">Kontaktmöglichkeit:</td>
            <td>{{ $team->telefon.' / '.$team->mobil }}<br>{{ $team->email }}</td>
        </tr>
        <tr>
            <td style="width: 200px;">Geburtsdatum:</td>
            <td>
                {{ $team->geburtsdatum }}
                {{ 'Dein Alter: '.$team->gebdatum }}
            </td>
        </tr>
        @if($team->beruf)
            <tr>
                <td style="width: 200px;">Beruf:</td>
                <td>{{ $team->beruf }}</td>
            </tr>
        @endif
        <tr>
            <td style="width: 200px;">Social Media:</td>
            <td>
                <a href="https://www.facebook.com/{{ $team->facebook }}" target="_blank">{{ $team->facebook }}</a><br>
                <a href="https://twitter.com/{{ $team->twitter }}" target="_blank">{{ $team->twitter }}</a><br>
                <a href="https://www.instagram.com/{{ $team->instagram }}/" target="_blank">{{ $team->instagram }}</a>
            </td>
        </tr>
        @if($team->image)
            <tr>
                <td style="width: 200px;">Profilbild:</td>
                <td><img src="{{ url('storage/images/profil/'.$team->image) }}" style="width: 150px; height: auto;">
                </td>
            </tr>
        @endif
        <tr>
            <td style="width: 200px;">Beschreibung:</td>
            <td>{!! $team->description !!}</td>
        </tr>
        @if ($team->fahrzeugvorhanden == false)
            <tr>
                <td colspan="2">Dein Fahrzeug</td>
            </tr>
            @if($team->fahrzeuge->fahrzeug)
                <tr>
                    <td style="width: 200px;">Fahrzeug:</td>
                    <td>{{ $team->fahrzeuge->fahrzeug }} Baujahr: {{ $team->fahrzeuge->baujahr }}</td>
                </tr>
            @endif
            @if($team->fahrzeuge->besonderheiten)
                <tr>
                    <td style="width: 200px;">Besonderheiten:</td>
                    <td>{!! $team->fahrzeuge->besonderheiten !!}</td>
                </tr>
            @endif
            @if($team->fahrzeuge->motor)
                <tr>
                    <td style="width: 200px;">Motor:</td>
                    <td>{!! $team->fahrzeuge->motor !!}</td>
                </tr>
            @endif
            @if($team->fahrzeuge->karosserie)
                <tr>
                    <td style="width: 200px;">Karosserie:</td>
                    <td>{!! $team->fahrzeuge->karosserie !!}</td>
                </tr>
            @endif
            @if($team->fahrzeuge->felgen)
                <tr>
                    <td style="width: 200px;">Felgen:</td>
                    <td>{!! $team->fahrzeuge->felgen !!}</td>
                </tr>
            @endif
            @if($team->fahrzeuge->fahrwerk)
                <tr>
                    <td style="width: 200px;">Fahrwerk:</td>
                    <td>{!! $team->fahrzeuge->fahrwerk !!}</td>
                </tr>
            @endif
            @if($team->fahrzeuge->bremsen)
                <tr>
                    <td style="width: 200px;">Bremsen:</td>
                    <td>{!! $team->fahrzeuge->bremsen !!}</td>
                </tr>
            @endif
            @if($team->fahrzeuge->innenraum)
                <tr>
                    <td style="width: 200px;">Innenraum:</td>
                    <td>{!! $team->fahrzeuge->innenraum !!}</td>
                </tr>
            @endif
            @if($team->fahrzeuge->anlage)
                <tr>
                    <td style="width: 200px;">Anlage:</td>
                    <td>{!! $team->fahrzeuge->anlage !!}</td>
                </tr>
            @endif
            @if($team->fahrzeuge->description)
                <tr>
                    <td style="width: 200px;">Beschreibung:</td>
                    <td>{!! $team->fahrzeuge->description !!}</td>
                </tr>
            @endif
            {{--@if(count($team->photos) > 0)
                <tr>
                    <td class="text-right w-25 bg-gray-light">Fahrzeugbilder:</td>
                    <td>
                        @foreach($team->photos as $photo)
                            <img
                                src="{{ Storage::disk('public')->url('images/'.$team->fahrzeuge->slug.'/thumbnails/'.$photo->images) }}"
                                class="img-fluid img-thumbnail"
                                style="width: 150px; height: 150px; object-fit: cover; object-position: center center; margin: 5px;">
                        @endforeach
                    </td>
                </tr>
            @else
                <tr>
                    <td class="text-right w-25 bg-gray-light">Fahrzeugbilder:</td>
                    <td class="text-danger font-weight-bold">Es wurden keine Bilder hochgeladen!</td>
                </tr>
            @endif--}}
        @endif
    </table>
    <p>Zum Antrag: <a href="{{ url('intern/antrag', $team->id) }}">hier klicken</a></p>
@endsection
