@extends('layouts.main')

@section('title', 'Veranstaltungen')

@section('canonical')
    <link rel="canonical" href="{{ url()->full() }}"/>
@endsection

@section('meta')
    <meta name="robots" content="index, follow" />
@endsection

@section('description'){!! strip_tags(Str::limit($veranstaltungen->description, 155)) !!}@endsection
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
                    <li>{{ __('Veranstaltungen') }}</li>

                </ol>
                <div class="row">
                    <div class="col-lg-6">
                        <h2>{{ __('Veranstaltungen') }}</h2>
                    </div>
                    <div class="col-lg-6">
                        @hasanyrole('Super Admin|Admin')
                        <form action="{{ route('frontend.veranstaltungen.destroy', $veranstaltungen->slug) }}"
                              method="POST" class="float-none float-lg-right mt-2 mt-lg-0 ml-lg-2">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-link text-danger py-lg-0 p-0  text-decoration-none"><i
                                    class="icofont-trash"></i> Löschen
                            </button>
                        </form>
                        @endhasanyrole
                        <a href="{{ route('frontend.veranstaltungen.edit', $veranstaltungen->slug) }}"
                           class="float-none float-lg-right mt-2 mt-lg-0"><i class="icofont-calendar"></i> Veranstaltung
                            bearbeiten</a>
                    </div>
                </div>

            </div>
        </section><!-- End Breadcrumbs -->

        <!-- ======= Team Section ======= -->
        <section id="team" class="team">
            <div class="container">

                <div class="row">

                    <div class="col-lg-12 mt-2">
                        <div class="card">
                            <div class="card-body">
                                <div class="card-title">
                                    @if ($veranstaltungen->veranstaltung == true or $veranstaltungen->veranstalter == true)
                                        <b style="padding-left: 18px;">Veranstaltung:</b> {{ $veranstaltungen->veranstaltung }}
                                        <br>
                                        <b style="padding-left: 18px;">Veranstalter:</b> {{ $veranstaltungen->veranstalter }}
                                        <br>
                                    @endif
                                    <i class="icofont-info-circle" style="color: #ff4400;"></i>
                                    @if (\Carbon\Carbon::parse($veranstaltungen->datum_von)->isoFormat('DD.MM.YYYY') != \Carbon\Carbon::parse($veranstaltungen->datum_bis)->isoFormat('DD.MM.YYYY'))
                                        <b>wann</b> {{ \Carbon\Carbon::parse($veranstaltungen->datum_von)->isoFormat('DD.MM.YYYY') }}
                                        -
                                        {{ \Carbon\Carbon::parse($veranstaltungen->datum_bis)->isoFormat('DD.MM.YYYY') }}
                                        /
                                        <b>wo</b> {{ $veranstaltungen->veranstaltungsort }} / <b>Beginn:</b>
                                        {{ \Carbon\Carbon::parse($veranstaltungen->datum_von)->isoFormat('HH:mm') }}
                                        -
                                        <b>Ende:</b>/
                                        {{ \Carbon\Carbon::parse($veranstaltungen->datum_bis)->isoFormat('HH:mm') }}
                                    @else
                                        <b>wann</b> {{ \Carbon\Carbon::parse($veranstaltungen->datum_von)->isoFormat('DD.MM.YYYY') }}
                                        /
                                        <b>wo</b> {{ $veranstaltungen->veranstaltungsort }} / <b>Beginn:</b>
                                        {{ \Carbon\Carbon::parse($veranstaltungen->datum_von)->isoFormat('HH:mm') }}
                                        -
                                        <b>Ende:</b>
                                        {{ \Carbon\Carbon::parse($veranstaltungen->datum_bis)->isoFormat('HH:mm') }}
                                    @endif
                                    @if($veranstaltungen->eintritt)
                                        <br>
                                        <i class="icofont-ticket" style="color: #ff4400;"></i>
                                        <b>Eintrittspreis:</b> {{ $veranstaltungen->eintritt }} <i
                                            class="icofont-euro"></i>
                                    @endif
                                    @if($veranstaltungen->social_fb == true or $veranstaltungen->social_ig == true or $veranstaltungen->social_tw == true)
                                        <br>
                                        <div id="social-veranstaltungen">
                                            <div class="social-links d-block">
                                                <b style="padding-left: 18px;">Social-Media:</b>
                                                @if($veranstaltungen->social_fb)
                                                    <a href="{{ $veranstaltungen->social_fb }}" target="_blank"
                                                       class="facebook">
                                                        <i class="icofont-facebook"></i>
                                                    </a>
                                                @endif
                                                @if($veranstaltungen->social_tw)
                                                    <a href="{{ $veranstaltungen->social_tw }}" target="_blank"
                                                       class="twitter">
                                                        <i class="icofont-twitter"></i>
                                                    </a>
                                                @endif
                                                @if($veranstaltungen->social_ig)
                                                    <a href="{{ $veranstaltungen->social_ig }}" target="_blank"
                                                       class="instagram">
                                                        <i class="icofont-instagram"></i>
                                                    </a>
                                                @endif
                                            </div>
                                        </div>
                                    @endif
                                </div>
                                <hr style="border-top: 2px solid #7cf12e">
                                <p class="font-weight-bold" style="font-size: 22px;">Details:</p>
                                <span>
                                    {!! $veranstaltungen->beschreibung !!}
                                </span>
                                @hasanyrole('Super Admin|Admin')
                                @if ($veranstaltungen->published == false)
                                    <hr style="border-top: 2px solid #7cf12e;">
                                    <span class="float-right">
                                            <form
                                                action="{{ route('frontend.veranstaltungen.published', $veranstaltungen->slug) }}"
                                                method="post">
                                                @csrf
                                                @method('PATCH')
                                                <input type="hidden" name="slug" value="{{ $veranstaltungen->slug  }}">
                                                <input type="hidden" name="published" value="1">
                                                <button type="submit"
                                                        class="btn btn-sm btn-success text-dark font-weight-bold"><i
                                                        class="icofont-check"></i></button>
                                            </form>
                                        </span>
                                @else
                                    <hr style="border-top: 2px solid #7cf12e;">
                                    <span
                                        class="font-weight-bold">Veröffentlicht am: {{ \Carbon\Carbon::parse($veranstaltungen->published_at)->isoFormat('DD.MM.YYYY HH:mm') }}</span>
                                    <br>
                                    @if($veranstaltungen->created_at != $veranstaltungen->updated_at)
                                        <span
                                            class="font-weight-bold">Bearbeitet am: {{ \Carbon\Carbon::parse($veranstaltungen->updated_at)->isoFormat('DD.MM.YYYY HH:mm') }}</span>
                                    @endif
                                @endif
                                @endhasanyrole
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </section><!-- End Team Section -->

    </main><!-- End #main -->
@endsection

@push('js')

@endpush
