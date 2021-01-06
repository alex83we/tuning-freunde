@extends('email.layouts.email')

@section('titleEmail')
    Kontaktanfrage
@endsection

@section('contentEmail')
    <table width="100%" border="0">
        <tbody>
        <tr>
            <td style="width: 200px;">Name:</td>
            <td>{{ $kontakt->name }}</td>
        </tr>
        <tr>
            <td style="width: 200px;">E-Mail:</td>
            <td>{{ $kontakt->email }}</td>
        </tr>
        <tr>
            <td style="width: 200px;">Betreff:</td>
            <td>{{ $kontakt->subject }}</td>
        </tr>
        <tr>
            <td style="width: 200px; vertical-align: top;">Nachricht:</td>
            <td>{!! nl2br($kontakt->message) !!}</td>
        </tr>
        </tbody>
    </table>
@endsection
