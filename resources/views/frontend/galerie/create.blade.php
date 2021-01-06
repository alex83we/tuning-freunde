@extends('layouts.main')

@section('title', 'Galerie erstellen')

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
                    <li>Galerie</li>
                </ol>
                <div class="row">
                    <div class="col-lg-6">
                        <h2>Galerie</h2>
                    </div>
                    <div class="col-lg-6">

                    </div>
                </div>

            </div>
        </section><!-- End Breadcrumbs -->

        <!-- ======= Portfolio Section ======= -->
        <section id="portfolio" class="portfolio">
            <div class="container">

                <form action="{{ route('frontend.galerie.store') }}" method="post" enctype="multipart/form-data">
                    {!! csrf_field() !!}
                    <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                    <div class="row mb-2 mb-lg-0">
                        <div class="col-lg-12">
                            <div class="form-row">
                                <div class="col-lg-4 mb-2 mb-lg-3">
                                    <label for="inputTitle">Title:</label>
                                    <input type="text" class="form-control @error('title') {{ 'Du musst einen Title angeben.' }} is-invalid @enderror" id="inputTitle" name="title" placeholder="Title" value="{{ old('title') }}">
                                    @error('title')
                                    <small id="title" class="form-text" style="color: #ff0000;">Du musst einen Title angeben.</small>
                                    @enderror
                                </div>
                                <div class="col-lg-3 mb-2 mb-lg-0">
                                    <div class="form-group">
                                        <label for="selectKategorie">Kategorie:</label>
                                        <select class="custom-select  @error('kategorie') {{ 'Du musst eine Kategorie auswählen.' }} is-invalid @enderror" name="kategorie" id="selectKategorie">
                                            <option value="Fahrzeuge" {{ old('kategorie') == 'Fahrzeuge' ? 'selected=selected' : '' }}>Fahrzeuge</option>
                                            <option value="Projekte" {{ old('kategorie') == 'Projekte' ? 'selected=selected' : '' }}>Projekte</option>
                                            <option value="Treffen" {{ old('kategorie') == 'Treffen' ? 'selected=selected' : '' }}>Treffen</option>
                                            <option value="Club-interne-Treffen" {{ old('kategorie') == 'Club-interne-Treffen' ? 'selected=selected' : '' }}>Club interne Treffen</option>
                                        </select>
                                        @error('kategorie')
                                        <small id="title" class="form-text" style="color: #ff0000;">Du musst eine Kategorie auswählen.</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-lg-3 mb-2 mb-lg-0">
                                    <label for="inputPublischedat">Veröffentlicht am:</label>
                                    <input id="inputPublishedat" type="text" class="form-control" name="published_at" data-inputmask-alias="datetime" data-inputmask-inputformat="dd.mm.yyyy HH:MM" data-mask  value="{{ \Carbon\Carbon::now()->isoFormat('DD.MM.YYYY HH:mm') }}">
                                </div>
                                <div class="col-lg-2 mb-2 mb-lg-0">
                                    <label for="inputTitle" class="d-none d-lg-inline">&nbsp;&nbsp;</label>
                                    <div class="custom-control custom-switch mt-0 mt-lg-3">
                                        <input type="checkbox" class="custom-control-input" id="switchPublished" name="published" value="1" @if (old('published')) checked @endif>
                                        <label class="custom-control-label" for="switchPublished">Veröffentlicht</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-lg-12 mb-2 mb-lg-3">
                                    <label for="description">Beschreibung:</label>
                                    <textarea id="description" class="form-control" name="description"></textarea>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-lg-12 mb-2 mb-lg-3">
                                    <div class="file-loading">
                                        <input id="album" type="file" name="images[]" multiple class="file" data-overwrite-initial="false" data-browse-on-zone-click="true" data-msg-placeholder="Wählen Sie {files} zum Hochladen aus ...">
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-lg-6 mb-2 mb-lg-3">
                                    <button type="submit" class="btn btn-sm btn-primary">Speichern</button>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-lg-6 mb-2 mb-lg-3">

                                </div>
                            </div>
                        </div>
                    </div>
                </form>

            </div>
        </section><!-- End Portfolio Section -->

    </main><!-- End #main -->
@endsection

@push('js')
    <script src="https://cdn.tiny.cloud/1/53e1tip0oepb1d25vvj08xkbumpxwhae75ghq6btf0pl905w/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <script>
        $(function () {
            $('#inputPublishedat').inputmask('dd.mm.yyyy HH:MM', { 'placeholder': 'dd.mm.yyyy HH:MM' })
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
