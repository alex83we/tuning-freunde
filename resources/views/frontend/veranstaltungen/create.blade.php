@extends('layouts.main')

@section('title', 'Veranstaltung hinzufügen')

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
                    <li>{{ __('Veranstaltungen') }}</li>

                </ol>
                <h2>{{ __('Veranstaltung hinzufügen') }}</h2>

            </div>
        </section><!-- End Breadcrumbs -->

        <!-- ======= Team Section ======= -->
        <section id="team" class="team">
            <div class="container">

                <div class="row">

                    <div class="col-lg-12">
                        <form action="{{ route('frontend.veranstaltungen.store') }}" method="post">
                            @csrf

                            <div class="eventlist">

                                <div class="form-row">
                                    <div class="form-group col-lg-3">
                                        <label for="datum_von">Datum von:</label>
                                        <input type="text"
                                               class="form-control form-control-sm @error('datum_von') is-invalid @enderror"
                                               name="datum_von" id="datum_von"
                                               placeholder="Datum von" maxlength="16" data-inputmask-alias="datetime"
                                               data-inputmask-inputformat="dd.mm.yyyy HH:MM" data-mask
                                               value="{{ old('datum_von') }}">
                                        @error('datum_von')
                                        <small class="form-text text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <div class="form-group col-lg-3">
                                        <label for="datum_bis">Datum bis:</label>
                                        <input type="text"
                                               class="form-control form-control-sm @error('datum_bis') is-invalid @enderror"
                                               name="datum_bis" id="datum_bis"
                                               placeholder="Datum bis" maxlength="16" data-inputmask-alias="datetime"
                                               data-inputmask-inputformat="dd.mm.yyyy HH:MM" data-mask
                                               value="{{ old('datum_bis') }}">
                                        @error('datum_bis')
                                        <small class="form-text text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <div class="form-group col-lg-6">
                                        <label for="veranstaltung">Veranstaltung:</label>
                                        <input type="text"
                                               class="form-control form-control-sm @error('Veranstaltung') is-invalid @enderror"
                                               name="veranstaltung" id="veranstaltung"
                                               placeholder="Veranstaltung">
                                        @error('veranstaltung')
                                        <small class="form-text text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-lg-4">
                                        <label for="veranstaltungsort">Veranstaltungsort:</label>
                                        <input type="text"
                                               class="form-control form-control-sm @error('veranstaltungsort') is-invalid @enderror"
                                               name="veranstaltungsort" id="veranstaltungsort"
                                               placeholder="Veranstaltungsort">
                                        @error('veranstaltungsort')
                                        <small class="form-text text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <div class="form-group col-lg-4">
                                        <label for="veranstalter">Veranstalter:</label>
                                        <input type="text"
                                               class="form-control form-control-sm @error('veranstalter') is-invalid @enderror"
                                               name="veranstalter" id="veranstalter"
                                               placeholder="Veranstalter">
                                        @error('veranstalter')
                                        <small class="form-text text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <div class="form-group col-lg-4">
                                        <label for="webseite">Webseite:</label>
                                        <input type="text"
                                               class="form-control form-control-sm @error('webseite') is-invalid @enderror"
                                               name="webseite" id="webseite"
                                               placeholder="Webseite">
                                        @error('webseite')
                                        <small class="form-text text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-lg-4">
                                        <label for="facebook">Facebook:</label>
                                        <input type="text"
                                               class="form-control form-control-sm @error('facebook') is-invalid @enderror"
                                               name="facebook" id="facebook"
                                               placeholder="Facebook">
                                        @error('facebook')
                                        <small class="form-text text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <div class="form-group col-lg-4">
                                        <label for="instagram">Instagram:</label>
                                        <input type="text"
                                               class="form-control form-control-sm @error('instagram') is-invalid @enderror"
                                               name="instagram" id="instagram"
                                               placeholder="Instagram">
                                        @error('instagram')
                                        <small class="form-text text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <div class="form-group col-lg-4">
                                        <label for="twitter">Twitter:</label>
                                        <input type="text"
                                               class="form-control form-control-sm @error('twitter') is-invalid @enderror"
                                               name="twitter" id="twitter"
                                               placeholder="twitter">
                                        @error('twitter')
                                        <small class="form-text text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-lg-12">
                                        <label for="beschreibung">Beschreibung</label>
                                        <textarea name="beschreibung" id="beschreibung">
                                            {{ old('beschreibung') }}
                                        </textarea>
                                        @error('beschreibung')
                                        <small class="form-text text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>

                                <div class="form-row">
                                    <div class="form-group col-lg-6">
                                        <input type="text"
                                               class="form-control form-control-sm @error('eintritt') is-invalid @enderror"
                                               name="eintritt" id="eintritt"
                                               placeholder="Eintritt">
                                        @error('eintritt')
                                        <small class="form-text text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>

                                    <div class="form-group offset-lg-4 col-lg-2 text-right">
                                        <button type="submit" class="btn btn-sm btn-success text-dark font-weight-bold">
                                            Speichern
                                        </button>
                                    </div>
                                </div>

                            </div>

                        </form>
                    </div>

                </div>

            </div>
        </section><!-- End Team Section -->

    </main><!-- End #main -->
@endsection

@push('js')
    <script src="https://cdn.tiny.cloud/1/53e1tip0oepb1d25vvj08xkbumpxwhae75ghq6btf0pl905w/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
        $(function () {
            $('#datum_von').inputmask('dd.mm.yyyy HH:MM', {'placeholder': 'dd.mm.yyyy HH:MM'})
            $('#datum_bis').inputmask('dd.mm.yyyy HH:MM', {'placeholder': 'dd.mm.yyyy HH:MM'})
        });

        tinymce.init({
            selector: 'textarea',
            height: 300,
            menubar: true,
            plugins: [
                'advlist autolink lists link image charmap print preview anchor',
                'searchreplace visualblocks code fullscreen codesample',
                'insertdatetime media table paste code emoticons help wordcount '
            ],
            toolbar: 'undo redo | ' +
                'bold italic | alignleft aligncenter alignright alignjustify ' +
                ' bullist numlist outdent indent | fontselect fontsizeselect formatselect | codesample |' +
                'removeformat preview | emoticons | wordcount',
            // toolbar_mode: 'floating',
            language: 'de',
            placeholder: 'Infos zu deiner Veranstaltung!',
        });
    </script>
@endpush
