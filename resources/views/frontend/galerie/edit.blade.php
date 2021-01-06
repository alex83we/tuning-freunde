@extends('layouts.main')

@section('title', 'Galerie bearbeiten')

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

                <form action="{{ route('frontend.galerie.update', $galerie->slug) }}" method="post"
                      enctype="multipart/form-data">
                    {!! csrf_field() !!}
                    @method('put')
                    <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                    <input type="hidden" name="id" value="{{ $galerie->id }}">
                    <input type="hidden" name="images" value="{{ $galerie->images }}">
                    <input type="hidden" name="size" value="{{ $galerie->size }}">
                    <input type="hidden" name="slug" value="{{ $galerie->slug }}">

                    <div class="row mb-2 mb-lg-0">
                        <div class="col-lg-12">
                            <div class="form-row">
                                <div class="col-lg-4 mb-2 mb-lg-3">
                                    <label for="inputTitle">Title</label>
                                    <input type="text" class="form-control" id="inputTitle" name="title" placeholder="Title"
                                           value="{{ $galerie->title }}" maxlength="255">
                                </div>
                                <div class="col-lg-3 mb-2 mb-lg-0">
                                    <div class="form-group">
                                        <label for="selectKategorie">Kategorie</label>
                                        <select class="custom-select" name="kategorie" id="selectKategorie">
                                            <option @if ($galerie->kategorie == 'Fahrzeuge') selected
                                                    @endif value="Fahrzeuge">Fahrzeuge
                                            </option>
                                            <option @if ($galerie->kategorie == 'Projekte') selected
                                                    @endif value="Projekte">Projekte
                                            </option>
                                            <option @if ($galerie->kategorie == 'Treffen') selected @endif value="Treffen">
                                                Treffen
                                            </option>
                                            <option @if ($galerie->kategorie == 'Club interne Treffen') selected
                                                    @endif value="Club interne Treffen">Club interne Treffen
                                            </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-3 mb-2 mb-lg-0">
                                    <label for="inputPublischedat">Veröffentlicht am</label>
                                    <input id="inputPublishedat" type="text" class="form-control" name="published_at"
                                           data-inputmask-alias="datetime" data-inputmask-inputformat="dd.mm.yyyy HH:MM"
                                           data-mask
                                           value="{{ \Carbon\Carbon::parse($galerie->published_at)->isoFormat('DD.MM.YYYY HH:mm') }}">
                                </div>
                                <div class="col-lg-2 mb-2 mb-lg-0">
                                    <label for="inputTitle" class="d-none d-lg-inline">&nbsp;&nbsp;</label>
                                    <div class="custom-control custom-switch mt-0 mt-lg-3">
                                        <input type="checkbox" class="custom-control-input" id="switchPublished"
                                               name="published" value="1" @if($galerie->published) checked @endif>
                                        <label class="custom-control-label" for="switchPublished">Veröffentlicht</label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="col-lg-12 mb-2 mb-lg-3">
                                    <label for="inputDescription">Beschreibung</label>
                                    <textarea id="beschreibung" class="form-control" name="description"
                                              @error('description') is-invalid @enderror maxlength="255">{{ $galerie->description }}</textarea>
                                    @error('description')
                                    <small id="title" class="form-text" style="color: #ff0000;">{{ $message }}</small>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="col-lg-6 mb-2 mb-lg-0">
                                    <button type="submit" class="btn btn-sm btn-primary">Speichern</button>
                                </div>

                                <div class="col-lg-6 mb-2 mb-lg-0 text-lg-right">
                                    <p class="m-0" style="font-size: small;">
                                        @if ($galerie->updated_at == $galerie->created_at)
                                            Erstellt am: {{ \Carbon\Carbon::parse($galerie->created_at)->isoFormat('DD.MM.YYYY HH:mm') }}
                                        @else
                                            Zuletzt bearbeitet am: {{ \Carbon\Carbon::parse($galerie->updated_at)->isoFormat('DD.MM.YYYY HH:mm') }}
                                        @endif
                                    </p>
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
