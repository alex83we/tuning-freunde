@extends('email.layouts.email')

@section('titleEmail')
    Eine Veranstaltung wurde bearbeitet und wartet auf Prüfung.
@endsection

@section('contentEmail')
    <p>Hallo Alex und Heiko,</p>
    <p>wir haben soeben unsere Veranstaltung ({{ $veranstaltungen->veranstaltung }}) geändert.</p>

    <p>Bitte Prüft die Veranstaltung schnell so das sie bald wieder Online ist.</p>

    <p>Zur Veranstaltung hier lang: <a class="btn btn-sm btn-secondary" href="{{ url('veranstaltungen/'.$veranstaltungen->slug) }}">{{ $veranstaltungen->veranstaltung }}</a></p>

    <p>Danke sagt der Veranstalter {{ $veranstaltungen->veranstalter }}.</p>
@endsection
