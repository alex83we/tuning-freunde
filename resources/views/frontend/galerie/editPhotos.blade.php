@extends('layouts.main')

@section('title')
    {{ \Illuminate\Support\Str::limit('Fotos hinzufügen | '.$photo->title, 32) }}
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
                    <li>Galerie</li>
                </ol>
                <div class="row">
                    <div class="col-lg-12">
                        <h2>Bilder zu dem Album <i style="color: #ff4400;">"{{ $photo->title }}" </i>&nbsp;hinzufügen</h2>
                    </div>
                </div>

            </div>
        </section><!-- End Breadcrumbs -->

        <!-- ======= Portfolio Section ======= -->
        <section id="portfolio" class="portfolio">
            <div class="container">

                <h3 class="text-cyan">Bilder zum ausgewählen Album hinzufügen.</h3>
                <form action="{{ route('frontend.photos.update', $photo->slug) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <input type="hidden" name="album_id" value="{{ $photo->id }}">
                    <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                    <input type="hidden" name="title" value="{{ $photo->title }}">
                    <input type="hidden" name="slug" value="{{ $photo->slug }}">
                    <div class="row mb-4 mb-lg-0">
                        <div class="col-lg-12">
                            <div class="form-row">
                                <div class="col-lg-6 mb-4 mb-lg-3">
                                    <label for="inputTitle">&nbsp;</label>
                                    <div class="custom-control custom-switch">
                                        <input type="checkbox" class="custom-control-input" id="switchPublished" name="published" value="1" @if($photo->published) checked @endif>
                                        <label class="custom-control-label" for="switchPublished">Veröffentlicht</label>
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-4 mb-lg-3">
                                    <label for="inputPublischedat">Veröffentlicht am</label>
                                    <input id="inputPublishedat" type="text" class="form-control" name="published_at" value="{{ \Carbon\Carbon::parse(now())->isoFormat('DD.MM.YYYY HH:mm') }}" data-inputmask-alias="datetime" data-inputmask-inputformat="dd.mm.yyyy HH:MM" data-mask>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-lg-12 mb-4 mb-lg-3">
                                    <div class="file-loading">
                                        <input id="album" type="file" name="images[]" multiple class="file" data-overwrite-initial="false" data-browse-on-zone-click="true" data-msg-placeholder="Wählen Sie {files} zum Hochladen aus ...">
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-lg-6 mb-4 mb-lg-3">
                                    <button type="submit" class="btn btn-sm btn-primary">Speichern</button>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-lg-6 mb-4 mb-lg-3">

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

        // fileinput
        $("#album").fileinput({
            theme: "fas",
            language: "de",
            allowedFileExtensions: ['jpg', 'jpeg', 'png', 'gif', 'tif', 'tiff', 'svg'],
            overwriteInitial: false,
            maxFileSize: 10000,
            maxFileNum: 10,
        });
    </script>
@endpush
