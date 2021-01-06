@extends('layouts.main')

@section('title', 'Mitgliedsantrag')

@section('canonical')
    <link rel="canonical" href="{{ url()->full() }}"/>
@endsection

@section('meta')
    <meta name="robots" content="index, follow" />
@endsection

@section('description')Hier kannst du deinen Mitgliedsantrag einreichen.@endsection
@section('url'){{ url()->full() }}@endsection

@push('css')

@endpush

@section('content')
    <main id="main">

        <!-- ======= Breadcrumbs ======= -->
        <section id="breadcrumbs" class="breadcrumbs">
            <div class="container">

                <ol>
                    <li><a href="{{ url('/') }}">Startseite</a></li>
                            <li>{{ __('Antrag') }}</li>

                </ol>
                <div class="row">
                    <div class="col-lg-6">
                        <h2>Mitgliedsantrag</h2>
                    </div>
                    <div class="col-lg-6">

                    </div>

                </div>
            </div>
        </section><!-- End Breadcrumbs -->

        <!-- ======= Team Section ======= -->
        <section id="antrag" class="antrag">
            <div class="container">

                <form action="{{ route('frontend.antrag.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="card">
                        <div class="card-header font-weight-bold"><h5 class="m-0">Antragsteller</h5></div>
                        <div class="card-body">
                            <div class="form-row">
                                <div class="form-group col-lg-4">
                                    <label for="anrede" class="font-weight-bold">Anrede:</label>
                                    <select id="anrede" name="anrede"
                                            class="form-control form-control-sm @error ('anrede') is-invalid @enderror">
                                        <option value="" selected disabled>-- bitte wählen --</option>
                                        <option value="Herr" {{ old('anrede') == 'Herr' ? 'selected=selected' : '' }}>
                                            Herr
                                        </option>
                                        <option value="Frau" {{ old('anrede') == 'Frau' ? 'selected=selected' : '' }}>
                                            Frau
                                        </option>
                                        <option
                                            value="keine Angabe" {{ old('anrede') == 'keine Angabe' ? 'selected=selected' : '' }}>
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
                                           value="{{ old('vorname') }}" maxlength="255">
                                    @error('vorname')
                                    <span class="form-text text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group col-lg-4">
                                    <label for="nachname" class="font-weight-bold">Nachname:</label>
                                    <input type="text" id="nachname" name="nachname"
                                           class="form-control form-control-sm @error ('nachname') is-invalid @enderror"
                                           value="{{ old('nachname') }}" maxlength="255">
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
                                           value="{{ old('straße') }}" maxlength="255">
                                    @error('straße')
                                    <span class="form-text text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group col-lg-4">
                                    <label for="plz" class="font-weight-bold">PLZ:</label>
                                    <input type="text" id="plz" name="plz"
                                           class="form-control form-control-sm @error ('plz') is-invalid @enderror"
                                           value="{{ old('plz') }}" maxlength="5">
                                    @error('plz')
                                    <span class="form-text text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group col-lg-4">
                                    <label for="ort" class="font-weight-bold">Ort:</label>
                                    <input type="text" id="ort" name="ort"
                                           class="form-control form-control-sm @error ('ort') is-invalid @enderror"
                                           value="{{ old('ort') }}" maxlength="255">
                                    @error('ort')
                                    <span class="form-text text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="card-header font-weight-bold"><h5 class="m-0">Kontaktdaten</h5></div>
                        <div class="card-body">
                            <div class="form-row">
                                <div class="form-group col-lg-4">
                                    <label for="telefon">Telefon:</label>
                                    <input type="text" id="telefon" name="telefon"
                                           class="form-control form-control-sm @error ('telefon') is-invalid @enderror"
                                           value="{{ old('telefon') }}" maxlength="15">
                                    @error('telefon')
                                    <span class="form-text text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group col-lg-4">
                                    <label for="mobil">Mobilfunk:</label>
                                    <input type="text" id="mobil" name="mobil"
                                           class="form-control form-control-sm @error ('mobil') is-invalid @enderror"
                                           value="{{ old('mobil') }}" maxlength="15">
                                    @error('mobil')
                                    <span class="form-text text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group col-lg-4">
                                    <label for="email" class="font-weight-bold">E-Mail:</label>
                                    <input type="email" id="email" name="email"
                                           class="form-control form-control-sm @error ('email') is-invalid @enderror"
                                           value="{{ old('email') }}" maxlength="255">
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
                                           value="{{ old('geburtsdatum') }}"
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
                                           value="{{ old('beruf') }}" maxlength="255">
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
                                           value="{{ old('facebook') }}" placeholder="dein FB Benutzername" maxlength="255">
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
                                           value="{{ old('twitter') }}" placeholder="dein Twitter Nutzername" maxlength="255">
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
                                           value="{{ old('instagram') }}" placeholder="dein Instagram Nutzername" maxlength="255">
                                        <div class="input-group-append">
                                            <div class="input-group-text">/</div>
                                        </div>
                                    </div>
                                    @error('instagram')
                                    <span class="form-text text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="card-header font-weight-bold"><h5 class="m-0">Über mich</h5></div>
                        <div class="card-body">
                            <div class="form-row">
                                <div class="form-group col-lg-12">
                                    <label for="profilbild">Profilbild:</label>
                                    <input type="file" id="profilbild" class="form-control" name="profilImg" accept="image/gif, image/jpg, image/jpeg, image/png, image/tif, image/tiff, image/svg">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-lg-12">
                                    <label>Beschreibung: </label>
                                    <textarea id="beschreibung" name="beschreibung"
                                              class="form-control form-control-sm @error ('beschreibung') is-invalid @enderror">{{ old('beschreibung') }}</textarea>
                                    @error('beschreibung')
                                    <span class="form-text text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="card-header font-weight-bold">
                            <div class="row">
                                <div class="col-lg-6">
                                    <h5 class="m-0">Fahrzeugdaten</h5>
                                </div>
                                <div class="col-lg-6">
                                    <div class="custom-control custom-checkbox text-right">
                                        <input type="checkbox" class="custom-control-input" id="fahrzeugvorhanden"
                                               value="true" name="fahrzeugvorhanden" @if(old('fahrzeugvorhanden') == true) checked @endif>
                                        <label class="custom-control-label" for="fahrzeugvorhanden">Kein Fahrzeug
                                            vorhanden</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <p class="trennung font-weight-bold">Solltest du mehrere Fahrzeuge besitzen, oder im Moment noch an einem Projekt arbeiten, so
                                Kannst du das nach erfolgreicher Annahme ganz einfach unter Fahrzeuge hinzufügen?</p>
                            <div class="form-row">
                                <div class="form-group col-lg-6">
                                    <label for="fahrzeug" class="font-weight-bold">Fahrzeug:</label>
                                    <input type="text" id="fahrzeug" name="fahrzeug"
                                           class="form-control form-control-sm @error ('fahrzeug') is-invalid @enderror"
                                           value="{{ old('fahrzeug') }}" maxlength="255">
                                    @error('fahrzeug')
                                    <span class="form-text text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group col-lg-6">
                                    <label for="baujahr" class="font-weight-bold">Baujahr:</label>
                                    <input type="text" id="baujahr" name="baujahr"
                                           class="form-control form-control-sm @error ('baujahr') is-invalid @enderror"
                                           data-inputmask-alias="datetime" data-inputmask-inputformat="yyyy" data-mask
                                           value="{{ old('baujahr') }}" maxlength="4">
                                    @error('baujahr')
                                    <span class="form-text text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <h5>Modifikation</h5>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-lg-6">
                                    <label for="besonderheiten">Besonderheiten:</label>
                                    <textarea id="besonderheiten" name="besonderheiten"
                                              class="form-control form-control-sm @error ('besonderheiten') is-invalid @enderror">{{ old('besonderheiten') }}</textarea>
                                    @error('besonderheiten')
                                    <span class="form-text text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group col-lg-6">
                                    <label for="motor" class="font-weight-bold">Motor:</label>
                                    <textarea id="motor" name="motor"
                                              class="form-control form-control-sm @error ('motor') is-invalid @enderror">{{ old('motor') }}</textarea>
                                    @error('motor')
                                    <span class="form-text text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-lg-6">
                                    <label for="karosserie">Karosserie:</label>
                                    <textarea id="karosserie" name="karosserie"
                                              class="form-control form-control-sm @error ('karosserie') is-invalid @enderror">{{ old('karosserie') }}</textarea>
                                    @error('karosserie')
                                    <span class="form-text text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group col-lg-6">
                                    <label for="fahrwerk">Fahrwerk:</label>
                                    <textarea id="fahrwerk" name="fahrwerk"
                                              class="form-control form-control-sm @error ('fahrwerk') is-invalid @enderror">{{ old('fahrwerk') }}</textarea>
                                    @error('fahrwerk')
                                    <span class="form-text text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-lg-6">
                                    <label for="felgen">Felgen:</label>
                                    <textarea id="felgen" name="felgen"
                                              class="form-control form-control-sm @error ('felgen') is-invalid @enderror">{{ old('felgen') }}</textarea>
                                    @error('felgen')
                                    <span class="form-text text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group col-lg-6">
                                    <label for="bremsen">Bremsen:</label>
                                    <textarea id="bremsen" name="bremsen"
                                              class="form-control form-control-sm @error ('bremsen') is-invalid @enderror">{{ old('bremsen') }}</textarea>
                                    @error('bremsen')
                                    <span class="form-text text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-lg-6">
                                    <label for="innenraum">Innenraum:</label>
                                    <textarea id="innenraum" name="innenraum"
                                              class="form-control form-control-sm @error ('innenraum') is-invalid @enderror">{{ old('innenraum') }}</textarea>
                                    @error('innenraum')
                                    <span class="form-text text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group col-lg-6">
                                    <label for="anlage">Anlage:</label>
                                    <textarea id="anlage" name="anlage"
                                              class="form-control form-control-sm @error ('anlage') is-invalid @enderror">{{ old('anlage') }}</textarea>
                                    @error('anlage')
                                    <span class="form-text text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-lg-12">
                                    <label>Beschreibung: </label>
                                    <textarea id="beschreibungFz" name="beschreibungFz"
                                              class="form-control form-control-sm @error ('beschreibungFz') is-invalid @enderror">{{ old('beschreibungFz') }}</textarea>
                                    @error('beschreibungFz')
                                    <span class="form-text text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="card-header font-weight-bold"><h5 class="m-0">Fahrzeugbilder</h5></div>
                        <div class="card-body">
                            <div class="form-row">
                                <div class="form-group col-lg-12">
                                    <label for="images">Fahrzeugbilder:</label>
                                    <input id="images" name="images[]" type="file" class="file" data-overwrite-initial="false"
                                           data-browse-on-zone-click="true" data-msg-placeholder="Wählen Sie {files} zum Hochladen aus ..." multiple>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <button type="submit" class="float-right btn btn-sm btn-success text-dark font-weight-bold">
                                Antrag absenden
                            </button>
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
        $(function () {
            $('#geburtsdatum').inputmask('dd.mm.yyyy', {'placeholder': 'dd.mm.yyyy'})
            $('#baujahr').inputmask('yyyy', {'placeholder': 'yyyy'})
        });

        // fileinput
        $("#images").fileinput({
            theme: "fas",
            language: "de",
            allowedFileExtensions: ['jpg', 'jpeg', 'png', 'gif', 'tif', 'tiff', 'svg'],
            overwriteInitial: false,
            maxFileSize: 10000,
            maxFileNum: 10,
            mainClass: "input-group-sm",
        });

        tinymce.init({
            selector: '#beschreibung',
            height: 300,
            menubar: false,
            plugins: [
                'advlist autolink lists link image charmap print preview anchor',
                'searchreplace visualblocks code fullscreen',
                'insertdatetime media table paste code help wordcount'
            ],
            toolbar: 'undo redo | ' +
                'bold italic | alignleft aligncenter ' +
                'alignright alignjustify | bullist numlist outdent indent | ' +
                'removeformat preview | wordcount',
            // toolbar_mode: 'floating',
            language: 'de',
            placeholder: 'Beschreibe dich hier',
        });

        tinymce.init({
            selector: '#beschreibungFz',
            height: 300,
            menubar: false,
            plugins: [
                'advlist autolink lists link image charmap print preview anchor',
                'searchreplace visualblocks code fullscreen',
                'insertdatetime media table paste code help wordcount'
            ],
            toolbar: 'undo redo | ' +
                'bold italic | alignleft aligncenter ' +
                'alignright alignjustify | bullist numlist outdent indent | ' +
                'removeformat preview | wordcount',
            // toolbar_mode: 'floating',
            language: 'de',
            placeholder: 'Stelle dein Fahrzeug vor!',
        });

        tinymce.init({
            selector: 'textarea',
            height: 150,
            menubar: false,
            plugins: [
                'advlist autolink lists link image charmap print preview anchor',
                'searchreplace visualblocks code fullscreen',
                'insertdatetime media table paste code help wordcount'
            ],
            toolbar: 'undo redo | ' +
                'bold italic | alignleft aligncenter ' +
                'alignright alignjustify | bullist numlist outdent indent | ' +
                'removeformat preview | wordcount',
            // toolbar_mode: 'floating',
            language: 'de',
        });
    </script>
@endpush
