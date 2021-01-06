@extends('layouts.main')

@section('title', 'Kontaktanfrage')

@section('canonical')
    <link rel="canonical" href="{{ url()->full() }}"/>
@endsection

@section('meta')
    <meta name="robots" content="index, follow" />
@endsection

@section('description')Hier kannst du uns kontaktieren.@endsection
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
                    <li>Kontakt</li>
                </ol>
                <div class="row">
                    <div class="col-lg-12">
                        <h2>Kontakt</h2>
                    </div>
                </div>

            </div>
        </section><!-- End Breadcrumbs -->

        <!-- ======= Team Section ======= -->
        <section id="contact" class="contact">
            <div class="container">

                <div class="row">
                    <div class="col-lg-6">
                        <div class="info-box mb-4">
                            <i class="icofont-google-map"></i>
                            <h3>Unsere Adresse:</h3>
                            <p>{{ env('TTF_STRASSE') }}, {{ env('TTF_ORT') }}</p>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="info-box mb-4">
                            <i class="icofont-envelope"></i>
                            <h3>Schreiben Sie uns eine E-Mail:</h3>
                            <p>{{ env('TTF_EMAIL') }}</p>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="info-box mb-4">
                            <i class="icofont-phone"></i>
                            <h3>Rufen Sie uns an:</h3>
                            <p>{{ env('TTF_TELEFON') }}</p>
                        </div>
                    </div>
                </div>

                <div class="row">

                    <div class="col-lg-6">
                        <iframe class="mb-4 mb-lg-0" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d9978.15027595595!2d11.435052!3d51.3012335!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x95ced3453404d44a!2sTh%C3%BCringer%20Tuning%20Freunde!5e0!3m2!1sde!2sde!4v1594718977680!5m2!1sde!2sde" frameborder="0" style="border: 0; width: 100%; height: 384px;" allowfullscreen></iframe>
                    </div>

                    <div class="col-lg-6">
                        <?php $xml = simplexml_load_file("http://www.stopforumspam.com/api?ip=".urlencode($_SERVER['REMOTE_ADDR']));
                        if($xml->appears == "yes")
                        { ?>
                        <div class="php-email-form">
                            <img src="{{ url('images/nospam.png') }}" width="475px" height="340px">
                        </div>
                        <?php } else { ?>
                            <form action="{{ route('frontend.kontakt.store') }}" method="post" role="form" class="php-email-form" id="captcha-form">
                                @csrf
                                <div class="form-row">
                                    <div class="col form-group">
                                        <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" placeholder="Dein Name" data-rule="minlen:4" data-msg="Bitte geben Sie mindestens 4 Zeichen ein.">
                                        @error('name')
                                        <small class="form-text text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                    <div class="col form-group">
                                        <input type="email" name="email" id="email" class="form-control @error('email') is-invalid @enderror" placeholder="Deine E-Mail Adresse" data-rule="email" data-msg="Bitte geben Sie eine gültige Email-Adresse ein.">
                                        @error('email')
                                        <small class="form-text text-danger">{{ $message }}</small>
                                        @enderror
                                    </div>
                                </div>
                                <div class="form-group">
                                    <input type="text" name="subject" id="subject" placeholder="Betreff" class="form-control @error('subject') is-invalid @enderror" data-rule="minlen:4" data-msg="Bitte geben Sie mindestens 8 Zeichen des Betreffs ein.">
                                    @error('subject')
                                    <small class="form-text text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <textarea name="message" id="message" placeholder="Deine Nachricht" data-rule="required" data-msg="Bitte schreiben Sie etwas an uns" class="form-control @error('message') is-invalid @enderror" rows="6"></textarea>
                                    @error('message')
                                    <small class="form-text text-danger">{{ $message }}</small>
                                    @enderror
                                </div>
                                <div class="text-center"><button type="submit">Nachricht senden</button></div>
                            </form>
                        <?php } ?>
                    </div>

                </div>

            </div>
        </section><!-- End Portfolio Section -->

    </main><!-- End #main -->
@endsection

@push('js')
<script>
    $(document).ajaxStart(function () {
        $('.loading').show();
    });

    $(document).ajaxComplete(function () {
        $('.loading').hide();
    });
</script>
@endpush
