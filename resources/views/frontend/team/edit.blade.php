@extends('layouts.main')

@section('title', 'Team')

@section('canonical')
    <link rel="canonical" href="{{ url()->full() }}"/>
@endsection

@section('meta')
    <meta name='robots' content='noindex'>
@endsection

@push('css')

@endpush

@section('content')
    <main id="main">

        <!-- ======= Breadcrumbs ======= -->
        <section id="breadcrumbs" class="breadcrumbs">
            <div class="container">

                <ol>
                    <li><a href="{{ url('/') }}">Startseite</a></li>
                    <li>{{ __('Team') }}</li>
                    <li>{{ $team->title }}</li>

                </ol>
                <h2>{{ 'Mitglied ' . $team->vorname . ' ' . $team->nachname . ' bearbeiten' }}</h2>

            </div>
        </section><!-- End Breadcrumbs -->

        <!-- ======= Team Section ======= -->
        <section id="team" class="team">
            <div class="container">

                <form action="{{ route('frontend.team.update', $team->slug) }}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                    {!! Form::hidden('user_id', auth()->user()->id, ['id' => 'user_id']) !!}

                    <div class="font-weight-bold"><h5>Persönliche Daten</h5></div>

                    <div class="form-row">
                        <div class="form-group col-lg-4">
                            <label for="anrede" class="font-weight-bold">Anrede:</label>
                            <select id="anrede" name="anrede"
                                    class="form-control form-control-sm @error ('anrede') is-invalid @enderror">
                                <option value="Herr" @if ($team->anrede == 'Herr') {{ ('selected=selected') }} @endif>
                                    Herr
                                </option>
                                <option value="Frau"  @if ($team->anrede == 'Frau') {{ ('selected=selected') }} @endif>
                                    Frau
                                </option>
                                <option
                                    value="keine Angabe"  @if ($team->anrede == 'keine Angabe') {{ ('selected=selected') }} @endif>
                                    keine Angabe
                                </option>
                            </select>
                            @error('anrede')
                            <span class="form-text text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group col-lg-4">
                            <label for="vorname" class="font-weight-bold">Vorname:</label>
                            <input type="text" id="vorname" name="vorname"
                                   class="form-control form-control-sm @error ('vorname') is-invalid @enderror"
                                   value="{{ $team->vorname }}" maxlength="255">
                            @error('vorname')
                            <span class="form-text text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group col-lg-4">
                            <label for="nachname" class="font-weight-bold">Nachname:</label>
                            <input type="text" id="nachname" name="nachname"
                                   class="form-control form-control-sm @error ('nachname') is-invalid @enderror"
                                   value="{{ $team->nachname }}" maxlength="255">
                            @error('nachname')
                            <span class="form-text text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-lg-4">
                            <label for="straße" class="font-weight-bold">Straße:</label>
                            <input type="text" id="straße" name="straße"
                                   class="form-control form-control-sm @error ('straße') is-invalid @enderror"
                                   value="{{ $team->straße }}" maxlength="255">
                            @error('straße')
                            <span class="form-text text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group col-lg-4">
                            <label for="plz" class="font-weight-bold">PLZ:</label>
                            <input type="text" id="plz" name="plz"
                                   class="form-control form-control-sm @error ('plz') is-invalid @enderror"
                                   value="{{ $team->plz }}" maxlength="5">
                            @error('plz')
                            <span class="form-text text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group col-lg-4">
                            <label for="wohnort" class="font-weight-bold">Ort:</label>
                            <input type="text" id="wohnort" name="wohnort"
                                   class="form-control form-control-sm @error ('ort') is-invalid @enderror"
                                   value="{{ $team->wohnort }}" maxlength="255">
                            @error('wohnort')
                            <span class="form-text text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="font-weight-bold"><h5>Kontaktdaten</h5></div>

                    <div class="form-row">
                        <div class="form-group col-lg-4">
                            <label for="telefon">Telefon:</label>
                            <input type="text" id="telefon" name="telefon"
                                   class="form-control form-control-sm @error ('telefon') is-invalid @enderror"
                                   value="{{ $team->telefon }}" maxlength="15">
                            @error('telefon')
                            <span class="form-text text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group col-lg-4">
                            <label for="mobil">Mobilfunk:</label>
                            <input type="text" id="mobil" name="mobil"
                                   class="form-control form-control-sm @error ('mobil') is-invalid @enderror"
                                   value="{{ $team->mobil }}" maxlength="15">
                            @error('mobil')
                            <span class="form-text text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group col-lg-4">
                            <label for="email" class="font-weight-bold">E-Mail:</label>
                            <input type="email" id="email" name="email"
                                   class="form-control form-control-sm @error ('email') is-invalid @enderror"
                                   value="{{ $team->email }}" maxlength="255">
                            @error('email')
                            <span class="form-text text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-lg-4">
                            <label for="geburtsdatum" class="font-weight-bold">Geburtsdatum:</label>
                            <input type="text" id="geburtsdatum" name="geburtsdatum"
                                   class="form-control form-control-sm @error ('geburtsdatum') is-invalid @enderror"
                                   value="{{ $team->geburtsdatum }}"
                                   data-inputmask-alias="datetime" data-inputmask-inputformat="dd.mm.yyyy" data-mask
                                   maxlength="10">
                            @error('geburtsdatum')
                            <span class="form-text text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group col-lg-4">
                            <label for="beruf">Beruf:</label>
                            <input type="text" id="beruf" name="beruf"
                                   class="form-control form-control-sm @error ('beruf') is-invalid @enderror"
                                   value="{{ $team->beruf }}" maxlength="255">
                            @error('beruf')
                            <span class="form-text text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group col-lg-4">
                            <label for="facebook">Facebook: <a href="https://www.facebook.com/settings?tab=account" target="_blank"><i class="icofont-question"></i><small> Hilfe </small></a></label>
                            <div class="input-group input-group-sm">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">https://www.facebook.com/</div>
                                </div>
                                <input type="text" id="facebook" name="facebook"
                                       class="form-control form-control-sm @error ('facebook') is-invalid @enderror"
                                       value="{{ $team->facebook }}" placeholder="dein FB Benutzername" maxlength="255">
                            </div>
                            @error('facebook')
                            <span class="form-text text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group col-lg-4">
                            <label for="twitter">Twitter: <a href="https://twitter.com/settings/screen_name" target="_blank"><i class="icofont-question"></i><small> Hilfe </small></a></label>
                            <div class="input-group input-group-sm">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">https://twitter.com/</div>
                                </div>
                                <input type="text" id="twitter" name="twitter"
                                       class="form-control form-control-sm @error ('twitter') is-invalid @enderror"
                                       value="{{ $team->twitter }}" placeholder="dein Twitter Nutzername" maxlength="255">
                            </div>
                            @error('twitter')
                            <span class="form-text text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group col-lg-4">
                            <label for="instagram">Instagram: <a href="https://www.instagram.com/accounts/edit/" target="_blank"><i class="icofont-question"></i><small> Hilfe </small></a></label>
                            <div class="input-group input-group-sm">
                                <div class="input-group-prepend">
                                    <div class="input-group-text">https://www.instagram.com/</div>
                                </div>
                                <input type="text" id="instagram" name="instagram"
                                       class="form-control form-control-sm @error ('instagram') is-invalid @enderror"
                                       value="{{ $team->instagram }}" placeholder="dein Instagram Nutzername" maxlength="255">
                                <div class="input-group-append">
                                    <div class="input-group-text">/</div>
                                </div>
                            </div>
                            @error('instagram')
                            <span class="form-text text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="font-weight-bold"><h5>Über mich</h5></div>
                        <div class="form-row">
                            <div class="form-group col-lg-12">
                                <label for="profilbild">Profilbild:</label>
                                <input type="file" id="profilbild" class="form-control" name="profilImg" accept="image/gif, image/jpg, image/jpeg, image/png, image/tif, image/tiff, image/svg">
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-lg-12">
                                <label>Beschreibung: </label>
                                <textarea id="beschreibung" name="description"
                                          class="form-control form-control-sm @error ('description') is-invalid @enderror">{!! $team->description !!}</textarea>
                                @error('description')
                                <span class="form-text text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                        </div>

                    <div class="form-row">
                        <div class="form-group col-lg-4"></div>
                        <div class="form-group col-lg-4"></div>
                        <div class="form-group col-lg-4">
                            <button class="btn btn-sm btn-block btn-primary" type="submit">Speichern</button>
                        </div>
                    </div>
                </form>

            </div>
        </section><!-- End Team Section -->

    </main><!-- End #main -->
@endsection

@push('js')
    <script src="https://cdn.tiny.cloud/1/53e1tip0oepb1d25vvj08xkbumpxwhae75ghq6btf0pl905w/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
        tinymce.init({
            selector: 'textarea',
            height: 150,
            menubar: false,
            plugins: [
                'advlist autolink lists link image charmap print preview anchor',
                'searchreplace visualblocks code fullscreen',
                'insertdatetime media table paste code help wordcount'
            ],
            toolbar: 'undo redo | formatselect | ' +
                'bold italic | alignleft aligncenter ' +
                'alignright alignjustify | bullist numlist outdent indent | ' +
                'removeformat preview | wordcount',
            // toolbar_mode: 'floating',
            language: 'de',
            placeholder: 'Beschreibe dich, so das fremde dich einschätzen können!',
        });
    </script>
@endpush
