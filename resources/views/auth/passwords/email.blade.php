@extends('layouts.users')

@section('content')

    <p class="login-box-msg">Du hast dein Passwort vergessen? Hier kannst du ganz einfach ein neues Passwort abrufen.</p>

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <div class="input-group mb-3">
            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                   value="{{ old('email') }}" placeholder="E-Mail Adresse" required autocomplete="email" autofocus>
            <div class="input-group-append">
                <div class="input-group-text">
                    <span class="fas fa-envelope"></span>
                </div>
            </div>
            @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
            @enderror
        </div>

        <div class="row">
            <div class="col-12">
                <button type="submit" class="btn btn-primary btn-block">Fordere ein neues Passwort an</button>
            </div>
            <!-- /.col -->
        </div>
    </form>

@endsection
