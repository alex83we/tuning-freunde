@extends('layouts.main')

@section('title', 'Gästebucheintrag')

@section('canonical')
    <link rel="canonical" href="{{ url()->full() }}"/>
@endsection

@section('meta')
    <meta name="robots" content="index, follow" />
@endsection

@section('description')Hier kannst du uns einen netten Kommentar hinterlassen.@endsection
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
                    <li>Gaestebuch</li>
                </ol>
                <div class="row">
                    <div class="col-lg-12">
                        <h2>Gästebuch</h2>
                    </div>
                </div>

            </div>
        </section><!-- End Breadcrumbs -->

        <!-- ======= Team Section ======= -->
        <section id="gaestebuch" class="gaestebuch">
            <div class="container">

                <div class="row">

                    <div class="col-lg-12 mb-4">

                        <a class="btn btn-success text-dark font-weight-bold float-right" href="{{ url('gaestebuch') }}"><i class="icofont-arrow-left"></i> Zurück zum Gästebuch</a>

                    </div>

                    <div class="col-lg-12">

                        <form action="{{ route('frontend.gaestebuch.store') }}" method="post" class="gaestebuch-form">
                            @csrf
                            <div class="form-row">
                                <div class="form-group col-lg-4">
                                    <label for="name">Name:</label>
                                    <input type="text" class="form-control form-control-sm @error('name') is-invalid @enderror" id="name" name="name">
                                </div>
                                <div class="form-group col-lg-4">
                                    <label for="email">E-Mail:</label>
                                    <input type="email" class="form-control form-control-sm @error('email') is-invalid @enderror" id="email" name="email">
                                </div>
                                <div class="form-group col-lg-4">
                                    <label for="website">Webseite:</label>
                                    <input type="text" class="form-control form-control-sm @error('website') is-invalid @enderror" id="website" name="website">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-lg-4">
                                    <label for="facebook">Facebook:</label>
                                    <input type="text" class="form-control form-control-sm" id="facebook" name="facebook">
                                </div>
                                <div class="form-group col-lg-4">
                                    <label for="twitter">Twitter:</label>
                                    <input type="text" class="form-control form-control-sm" id="twitter" name="twitter">
                                </div>
                                <div class="form-group col-lg-4">
                                    <label for="instagram">Instagram:</label>
                                    <input type="text" class="form-control form-control-sm" id="instagram" name="instagram">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-lg-12">
                                    <label for="nachricht">Nachricht:</label>
                                    <textarea class="form-control form-control-sm" name="message" id="nachricht"></textarea>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-lg-12">
                                    <button type="submit" class="btn btn-success text-dark font-weight-bold float-right">Speichern</button>
                                </div>
                            </div>
                        </form>

                    </div>
                </div>

                <div class="row">

                    <div class="col-lg-12">

                    </div>

                </div>

            </div>
        </section><!-- End Portfolio Section -->

    </main><!-- End #main -->
@endsection

@push('js')
    <script src="https://cdn.tiny.cloud/1/53e1tip0oepb1d25vvj08xkbumpxwhae75ghq6btf0pl905w/tinymce/5/tinymce.min.js"
            referrerpolicy="origin"></script>
    <script>
        tinymce.init({
            selector: 'textarea',
            height: 250,
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
            placeholder: 'Hier kannst du uns einen Gästebucheintrag hinterlassen!',
        });
    </script>
@endpush
