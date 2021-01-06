@extends('layouts.main')

@section('title'){{ $fahrzeuge->fahrzeug }}@endsection

@section('canonical')
    <link rel="canonical" href="{{ url()->full() }}"/>
@endsection

@section('meta')
    <meta name="robots" content="index, follow" />
@endsection

@section('description'){!! strip_tags(Str::limit($fahrzeuge->description, 155)) !!}@endsection
@section('url'){{ url()->full() }}@endsection

@push('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.css" />
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
                        <h2>{{ $fahrzeuge->title }}</h2>
                    </div>
                    <div class="col-lg-6">
                        @can('fahrzeug-create')
                            <a href="{{ route('frontend.fahrzeuge.create') }}" class="float-none float-lg-right mt-2 mt-lg-0"><i
                                    class="icofont-plus"></i> Erstellen</a>
                        @endcan
                        @can('fahrzeug-edit')
                            @if(auth()->user()->id == $fahrzeuge->user_id)
                                <a href="{{ route('frontend.fahrzeuge.edit', $fahrzeuge->slug) }}"
                                   class="float-none float-lg-right mt-2 mt-lg-0 mr-3"><i class="icofont-edit"></i>
                                    Bearbeiten</a>
                            @endif
                        @endcan
                            <a href="{{ route('frontend.fahrzeuge.index') }}" class="float-none float-lg-right mt-2 mt-lg-0 mr-3"><i
                                    class="icofont-arrow-left"></i> Zurück</a>
                    </div>
                </div>

            </div>
        </section><!-- End Breadcrumbs -->

        <!-- ======= Team Section ======= -->
        <section id="team" class="team">
            <div class="container">

                <div class="row">
                    <div class="col-lg-6">
                        @if(isset($previous))
                            <div class="alert alert-link pr-0 pl-0">
                                <a href="{{ url('/fahrzeuge/'.$previous->slug) }}">
                                    <div class="btn-content-title d-inline"><i class="icofont-arrow-left"> </i> Zurück zum {{ $previous->title }} </div>
                                </a>
                            </div>
                        @endif
                    </div>
                    <div class="col-lg-6">
                        @if(isset($next))
                            <div class="alert alert-link pr-0 pl-0 text-right">
                                <a href="{{ url('/fahrzeuge/'.$next->slug) }}">
                                    <div class="btn-content-title d-inline">Weiter zum {{ $next->title }} <i class="icofont-arrow-right"> </i></div>
                                </a>
                            </div>
                        @endif
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12 col-md-6">
                        <div class="row">
                            <div class="col-lg-8 col-md-6 align-items-stretch members-description">
                                <h1>{{ $fahrzeuge->fahrzeug }}</h1>
                                <h4>Karosserie:</h4>
                                <span>{!! $fahrzeuge->karosserie !!}</span>
                                <hr>
                                <h4>Fahrwerk:</h4>
                                <span>{!! $fahrzeuge->fahrwerk !!}</span>
                                <hr>
                                <h4>Felgen:</h4>
                                <span>{!! $fahrzeuge->felgen !!}</span>
                                <hr>
                                <h4>Bremsen:</h4>
                                <span>{!! $fahrzeuge->bremsen !!}</span>
                                <hr>
                                <h4>Innenraum:</h4>
                                <span>{!! $fahrzeuge->innenraum !!}</span>
                                <hr>
                                <h4>Anlage:</h4>
                                <span>{!! $fahrzeuge->anlage !!}</span>
                                <hr>
                                <h4>Beschribung:</h4>
                                <p class="trennung">{!! $fahrzeuge->description !!}</p>
                            </div>
                            <div class="col-lg-4 col-md-6 align-items-stretch pt-4 pt-lg-0">
                                <div class="members">
                                    <h2>Fahrzeugdaten</h2>
                                    <hr>
                                    <span>Fahrzeug: <p>{!! $fahrzeuge->fahrzeug !!}</p></span>
                                    <span>Baujahr: <p>{!! $fahrzeuge->baujahr !!}</p></span>
                                    <span class="p-0">Besonderheiten: {!! $fahrzeuge->besonderheiten !!}</span>
                                    <span class="p-0">Motor: {!! $fahrzeuge->motor !!}</span>
                                    @foreach($team as $item)
                                    @if($fahrzeuge->user_id == $item->user_id)
                                        <span>Mitglied: <a href="{{ url('/team/'.$item->slug) }}">{{ $item->title }}</a></span>
                                    @else
                                        <span class="text-danger font-weight-bold">Fahrzeug ist nicht zugeordnet!</span>
                                    @endif
                                    @endforeach
                                    <hr>
                                    <span>Erstellt am: {{ \Carbon\Carbon::parse($fahrzeuge->published_at)->isoFormat('DD.MM.YYYY') }}</span>
                                    <span>Letzte Änderungen: {{ \Carbon\Carbon::parse($fahrzeuge->updated_at)->fromNow() }}</span>

                                    @if($fahrzeuge->published == true)
                                        @can('fahrzeug-edit')
                                            @if($fahrzeuge->user_id == auth()->user()->id)
                                                <br>
                                                <form
                                                    action="{{ route('frontend.fahrzeuge.unpublished', $fahrzeuge->slug) }}"
                                                    method="post">
                                                    @csrf
                                                    @method('PATCH')
                                                    <input type="hidden" name="published" value="0">
                                                    <button type="submit" class="btn btn-sm btn-danger">Fahrzeug
                                                        ausblenden
                                                    </button>
                                                </form>
                                            @else
                                                @hasanyrole('Super Admin|Admin')
                                                <br>
                                                <form
                                                    action="{{ route('frontend.fahrzeuge.unpublished', $fahrzeuge->slug) }}"
                                                    method="post">
                                                    @csrf
                                                    @method('PATCH')
                                                    <input type="hidden" name="published" value="0">
                                                    <button type="submit" class="btn btn-sm btn-danger">Fahrzeug
                                                        ausblenden
                                                    </button>
                                                </form>
                                                @endhasanyrole
                                            @endif
                                        @endcan
                                    @else
                                        @can('fahrzeug-edit')
                                            @if($fahrzeuge->user_id == auth()->user()->id)
                                                <br>
                                                <form
                                                    action="{{ route('frontend.fahrzeuge.published', $fahrzeuge->slug) }}"
                                                    method="post">
                                                    @csrf
                                                    @method('PATCH')
                                                    <input type="hidden" name="published" value="1">
                                                    <button type="submit" class="btn btn-sm btn-success text-dark">Fahrzeug
                                                        einblenden
                                                    </button>
                                                </form>
                                            @else
                                                @hasanyrole('Super Admin|Admin')
                                                <br>
                                                <form
                                                    action="{{ route('frontend.fahrzeuge.published', $fahrzeuge->slug) }}"
                                                    method="post">
                                                    @csrf
                                                    @method('PATCH')
                                                    <input type="hidden" name="published" value="1">
                                                    <button type="submit" class="btn btn-sm btn-success text-dark">Fahrzeug
                                                        einblenden
                                                    </button>
                                                </form>
                                                @endhasanyrole
                                            @endif
                                        @endcan
                                    @endif

                                    @can('fahrzeug-delete')
                                        @if($fahrzeuge->user_id == auth()->user()->id)
                                            <br>
                                            <form action="{{ route('frontend.fahrzeuge.destroy', $fahrzeuge->slug) }}"
                                                  method="post">
                                                @csrf
                                                @method('DELETE')
                                                <input type="hidden" name="id" value="{{ $fahrzeuge->id }}">
                                                <input type="hidden" name="slug" value="{{ $fahrzeuge->slug }}">
                                                <button type="submit" class="btn btn-sm btn-danger"><i
                                                        class="icofont-trash"></i> Endgültig Löschen
                                                </button>
                                            </form>
                                        @else
                                            @hasanyrole('Super Admin|Admin')
                                            <br>
                                            <form action="{{ route('frontend.fahrzeuge.destroy', $fahrzeuge->slug) }}"
                                                  method="post">
                                                @csrf
                                                @method('DELETE')
                                                <input type="hidden" name="id" value="{{ $fahrzeuge->id }}">
                                                <input type="hidden" name="name" value="{{ $fahrzeuge->name }}">
                                                <button type="submit" class="btn btn-sm btn-danger"><i
                                                        class="icofont-trash"></i> Endgültig Löschen
                                                </button>
                                            </form>
                                            @endhasanyrole
                                        @endif
                                    @endcan

                                </div>
                            </div>
                        </div>
                        {{--<hr style="border-top: 2px solid #7cf12e">
                        <p class="trennung text-danger">Alle hier gemachten Angaben oder Texte werden von unseren Mitgliedern geschrieben und 1 : 1 übernommen bzw. auf Rechtschreibung und Grammatik geprüft und veröffentlicht.</p>--}}

                        @if(count($albums) > 0)
                            <hr style="border-top: 2px solid #7cf12e">
                            <p class="trennung">Hier könnt ihr einen Auszug aus der Galerie von dem Oben
                                vorgestelltem Auto sehen.</p>
                            @foreach($albums as $item)
                                @if($item == true)
                                    @if($item->images == 'default.png')
                                        <a class="thumbnail" href="{{ Storage::disk('public')->url('default.png') }}" data-fancybox="images" data-caption="@if ($item->description) {{ $item->description }} @else {{ $item->title }} @endif">
                                            <img src="{{ Storage::disk('public')->url('default.png') }}" alt="@if($item->description) {{ $item->description }} @else {{ $item->title }}
                                            @endif" title="Anhang: @if ($item->description) {{ $item->description }}
                                            @else {{ $item->title }} @endif" class="fzimg filter-gray">
                                        </a>
                                    @else
                                    <a class="thumbnail" href="{{ Storage::disk('public')->url('images/'.$item->slug.'/'.$item->images) }}" data-fancybox="images" data-caption="@if ($item->description) {{ $item->description }} @else {{ $item->title }} @endif">
                                        <img src="{{ Storage::disk('public')->url('images/'.$item->slug.'/thumbnails/'.$item->images) }}" alt="@if ($item->description) {{ $item->description }} @else {{ $item->title }} @endif" title="Anhang: @if ($item->description) {{ $item->description }} @else {{ $item->title }} @endif" class="fzimg filter-gray">
                                    </a>
                                    @endif
                                @endif
                            @endforeach
                        @else
                            <p class="trennung">
                                Es wurde vom Fahrzeug ({{ $fahrzeuge->title }}) noch kein Album angelegt.
                            </p>
                        @endif
                    </div>
                </div>



                <div class="row">
                    <div class="col-lg-6">
                        @if(isset($previous))
                            <div class="alert alert-link pr-0 pl-0">
                                <a href="{{ url('/fahrzeuge/'.$previous->slug) }}">
                                    <div class="btn-content-title d-inline"><i class="icofont-arrow-left"> </i> Zurück zum {{ $previous->title }} </div>
                                </a>
                            </div>
                        @endif
                    </div>
                    <div class="col-lg-6">
                        @if(isset($next))
                            <div class="alert alert-link pr-0 pl-0 text-right">
                                <a href="{{ url('/fahrzeuge/'.$next->slug) }}">
                                    <div class="btn-content-title d-inline">Weiter zum {{ $next->title }} <i class="icofont-arrow-right"> </i></div>
                                </a>
                            </div>
                        @endif
                    </div>
                </div>


            </div>
        </section><!-- End Portfolio Section -->

    </main><!-- End #main -->
@endsection

@push('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js"></script>
    <script>
        $('[data-fancybox="images"]').fancybox({
            buttons : [
                'slideShow',
                'share',
                'zoom',
                'fullScreen',
                'close'
            ],
            touch: true,
        });
    </script>
@endpush
