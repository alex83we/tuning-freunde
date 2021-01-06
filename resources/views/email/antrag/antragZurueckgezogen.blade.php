@extends('email.layouts.email')

@section('titleEmail')
    Wir wurden Verlassen &#128557.
@endsection

@section('contentEmail')
    <p>Hallo,</p>
    <p>soeben hat uns {{ $antrag->vorname }} verlassen.</p>

    <p>Wir wünschen dir viel Spass auf deinem weiteren Weg.</p>
    <p>Das Team von Thüringer Tuning Freunde.</p>
@endsection
