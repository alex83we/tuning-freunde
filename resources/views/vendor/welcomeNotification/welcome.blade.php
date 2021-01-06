@extends('layouts.main')

@section('title', 'Passwort vergeben')

@section('content')
    <div class="container my-5 mx-auto" style="min-height: 100vh;">
        <form method="POST">
            @csrf

            <input type="hidden" name="email" value="{{ $user->email }}"/>

            <div class="form-row">

                <div class="form-group  col-lg-4">
                    <label for="password">{{ __('Passwort') }}</label>
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
                           name="password" required autocomplete="new-password">

                    @error('password')
                    <span>
                    <strong>{{ $message }}</strong>
                </span>
                    @enderror
                </div>

                <div class="form-group  col-lg-4">
                    <label for="password-confirm">{{ __('Bestätige das Passwort') }}</label>
                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
                           required
                           autocomplete="new-password">
                </div>
            </div>

            <div>
                <button type="submit" class="btn btn-success">
                    {{ __('Passwort speichern und anmelden') }}
                </button>
            </div>
        </form>
    </div>
@endsection
