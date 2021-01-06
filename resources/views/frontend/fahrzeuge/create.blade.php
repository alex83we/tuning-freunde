@extends('layouts.main')

@section('title')
    Fahrzeug anlegen
@endsection

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
                    <li>Fahrzeuge</li>
                </ol>
                <div class="row">
                    <div class="col-lg-6">
                        <h2>Fahrzeuge</h2>
                    </div>
                    <div class="col-lg-6">

                    </div>
                </div>

            </div>
        </section><!-- End Breadcrumbs -->

        <!-- ======= Team Section ======= -->
        <section id="team" class="team">
            <div class="container">

                <div class="row">
                    <div class="col-lg-12 col-md-6 align-items-stretch members-description">
                        <h1>Fahrzeug hinzufügen</h1>
                        <form action="{{ route('frontend.fahrzeuge.store') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            {!! Form::hidden('user_id', auth()->user()->id, ['id' => 'user_id']) !!}

                            <div class="form-row">
                                <div class="form-group col-lg-6">
                                    <label for="fahrzeug">Fahrzeug</label>
                                    <input type="text" class="form-control form-control-sm @error('fahrzeug') is-invalid @enderror" name="fahrzeug" id="fahrzeug"
                                           placeholder="Fahrzeug" maxlength="255" value="{{ old('fahrzeug') }}">
                                    @error('fahrzeug')
                                    <small class="form-text text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group col-lg-6">
                                    <label for="baujahr">Baujahr</label>
                                    <input type="text" class="form-control form-control-sm @error('baujahr') is-invalid @enderror" name="baujahr" id="baujahr"
                                           placeholder="Baujahr" maxlength="4" data-inputmask-alias="datetime" data-inputmask-inputformat="yyyy" data-mask  value="{{ old('baujahr') }}">
                                    @error('baujahr')
                                    <small class="form-text text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-lg-6">
                                    <label for="besonderheiten">Besonderheiten</label>
                                    <textarea class="form-control form-control-sm" name="besonderheiten"
                                           id="besonderheiten" placeholder="Besonderheiten" maxlength="255" value="{{ old('besonderheiten') }}"></textarea>
                                    @error('besonderheiten')
                                    <small class="form-text text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group col-lg-6">
                                    <label for="motor">Motor</label>
                                    <textarea class="form-control form-control-sm @error('motor') is-invalid @enderror" name="motor" id="motor"
                                           placeholder="Motor" maxlength="255" value="{{ old('motor') }}"></textarea>
                                    @error('motor')
                                    <small class="form-text text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-lg-6">
                                    <label for="karosserie">Karosserie</label>
                                    <textarea class="form-control form-control-sm" name="karosserie"
                                           id="karosserie" placeholder="Karosserie" maxlength="255" value="{{ old('karosserie') }}"></textarea>
                                    @error('karosserie')
                                    <small class="form-text text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group col-lg-6">
                                    <label for="felgen">Felgen</label>
                                    <textarea class="form-control form-control-sm" name="felgen" id="felgen"
                                           placeholder="Felgen" maxlength="255" value="{{ old('felgen') }}"></textarea>
                                    @error('felgen')
                                    <small class="form-text text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-lg-6">
                                    <label for="fahrwerk">Fahrwerk</label>
                                    <textarea class="form-control form-control-sm" name="fahrwerk" id="fahrwerk"
                                           placeholder="Fahrwerk" maxlength="255" value="{{ old('fahrwerk') }}"></textarea>
                                    @error('fahrwerk')
                                    <small class="form-text text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group col-lg-6">
                                    <label for="bremsen">Bremsen</label>
                                    <textarea class="form-control form-control-sm" name="bremsen" id="bremsen"
                                           placeholder="Bremsen" maxlength="255" value="{{ old('bremsen') }}"></textarea>
                                    @error('bremsen')
                                    <small class="form-text text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-lg-6">
                                    <label for="innenraum">Innenraum</label>
                                    <textarea class="form-control form-control-sm" name="innenraum" id="innenraum"
                                           placeholder="Innenraum" maxlength="255" value="{{ old('innenraum') }}"></textarea>
                                    @error('innenraum')
                                    <small class="form-text text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group col-lg-6">
                                    <label for="anlage">Anlage</label>
                                    <textarea class="form-control form-control-sm" name="anlage" id="anlage"
                                           placeholder="Anlage" maxlength="255" value="{{ old('anlage') }}"></textarea>
                                    @error('anlage')
                                    <small class="form-text text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="col-lg-12 mb-2 mb-lg-3">
                                    <label for="description">Beschreibung</label>
                                    <textarea name="description" id="description">
                                    {{ old('description') }}
                                </textarea>
                                    @error('description')
                                    <small class="form-text text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="col-lg-12 mb-2 mb-lg-0">
                                    <div class="form-group">
                                        <label for="selectKategorie">Kategorie:</label>
                                        <select class="custom-select custom-select-sm  @error('kategorie') {{ 'Du musst eine Kategorie auswählen.' }} is-invalid @enderror" name="kategorie" id="selectKategorie">
                                            <option value="" selected disabled>Kategorie auswählen</option>
                                            <option value="Fahrzeuge" {{ old('kategorie') == 'Fahrzeuge' ? 'selected=selected' : '' }}>Fahrzeuge</option>
                                            <option value="Projekte" {{ old('kategorie') == 'Projekte' ? 'selected=selected' : '' }}>Projekte</option>
                                        </select>
                                        @error('kategorie')
                                        <small id="title" class="form-text" style="color: #ff0000;">Du musst eine Kategorie auswählen.</small>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="col-lg-12 mb-2 mb-lg-3">
                                    <label for="album">Fotos hinzufügen (maximal 10 Fotos)</label>
                                    <div class="file-loading">
                                        <input id="album" type="file" name="images[]" multiple class="file" data-overwrite-initial="false" data-browse-on-zone-click="true" data-msg-placeholder="Wählen Sie {files} zum Hochladen aus maximal 10 ...">
                                    </div>
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
                </div>

            </div>
        </section><!-- End Portfolio Section -->

    </main><!-- End #main -->
@endsection

@push('js')
    <script src="https://cdn.tiny.cloud/1/53e1tip0oepb1d25vvj08xkbumpxwhae75ghq6btf0pl905w/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
        $(function () {
            $('#baujahr').inputmask('yyyy', { 'placeholder': 'yyyy' })
        });

        // fileinput
        $("#album").fileinput({
            theme: "fas",
            language: "de",
            allowedFileExtensions: ['jpg', 'jpeg', 'png', 'gif', 'tif', 'tiff', 'svg'],
            overwriteInitial: false,
            maxFileSize: 10000,
            maxFileNum: 10,
        });

        tinymce.init({
            selector: '#description',
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
            toolbar: 'undo redo | formatselect | ' +
                'bold italic | alignleft aligncenter ' +
                'alignright alignjustify | bullist numlist outdent indent | ' +
                'removeformat preview | wordcount',
            // toolbar_mode: 'floating',
            language: 'de',
            placeholder: 'Beschreibe dein Fahrzeug und deine Veränderungen am Fahrzeug',
        });
    </script>
@endpush
