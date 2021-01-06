@extends('email.layouts.email')

@section('titleEmail')
    Neuer Gästebucheintrag
@endsection

@section('contentEmail')
    <table width="100%" border="0">
        <tbody>
        <tr>
            <td style="width: 200px;">Name:</td>
            <td>{{ $gästebuch->name }}</td>
        </tr>
        <tr>
            <td style="width: 200px;">E-Mail:</td>
            <td>{{ $gästebuch->email }}</td>
        </tr>
        <tr>
            <td style="width: 200px;">Webseite:</td>
            <td>{{ $gästebuch->website }}</td>
        </tr>
        <tr style="margin-bottom: 20px;">
            <td style="width: 200px;">Social Media:</td>
            <td>
                <a href="https://www.facebook.com/{{ $gästebuch->facebook }}"><i class="icofont-facebook"></i> Facebook</a> |
                <a href="https://twitter.com/{{ $gästebuch->twitter }}"><i class="icofont-twitter"></i> Twitter</a> |
                <a href="https://www.instagram.com/{{ $gästebuch->instagram }}/"><i class="icofont-twitter"></i> Instagram</a>
            </td>
        </tr>
        <tr>
            <td style="width: 200px;">Eintrag:</td>
            <td>{!! $gästebuch->message !!}</td>
        </tr>
        </tbody>
    </table>
@endsection
