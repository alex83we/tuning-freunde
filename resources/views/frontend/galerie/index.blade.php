@extends('layouts.main')

@section('title', 'Galerie')

@section('canonical')
    <link rel="canonical" href="{{ url()->full() }}"/>
@endsection

@section('meta')
    <meta name="robots" content="index, follow" />
@endsection

@section('description')Hier siehst du eine übersicht über unsere Bilder.@endsection
@section('url'){{ url()->full() }}@endsection

@push('css')
    <style>
        .content {
            text-align: right;
        }

        .content nav ul.pagination {
            justify-content: flex-end;
        }
    </style>
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
                        @can('galerie-edit')
                            <a href="{{ route('frontend.galerie.create') }}" class="float-none float-lg-right mt-2 mt-lg-0"><i class="icofont-plus"></i> Erstellen</a>
                        @endcan
                    </div>
                </div>

            </div>
        </section><!-- End Breadcrumbs -->

        <!-- ======= Portfolio Section ======= -->
        <section id="portfolio" class="portfolio">
            <div class="container">

                @if (count($albums) > 0)

                    <div class="row">
                        <div class="col-lg-12 d-flex justify-content-center">
                            <ul id="portfolio-flters">
                                <li data-filter="*" class="filter-active">Alle</li>
                                @foreach($kategorie as $item)
                                    <li data-filter=".filter-{{ $item->kategorie }}">{{ str_replace('-', ' ', $item->kategorie) }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>

                    <div class="row portfolio-container">
                    @foreach($albums as $item)
                        @if($item->published_at <= now() and $item->published == true)

                            <div class="col-lg-3 col-md-6 col-sm-6 portfolio-item filter-{{ $item->kategorie }}">
                                <a href="{{ url('galerie/'.$item->slug) }}" title="Galerie anzeigen"
                                   style="color: #272B30">
                                    <div class="portfolio-wrap img-thumbnail">
                                        @if($item->images === 'default.png')
                                            <img
                                                src="{{ Storage::disk('public')->url('default.png') }}"
                                                class="img-fluid galerie filter-gray" alt="{{ $item->title }}">
                                        @else
                                        <img
                                            src="{{ Storage::disk('public')->url('images/'.$item->slug.'/thumbnails/'.$item->images) }}"
                                            class="img-fluid galerie filter-gray" alt="{{ $item->title }}">
                                        @endif
                                        <div class="portfolio-info">
                                            <h4><span>{{ $item->title }}</span></h4>
                                            <p class="portfolio-description">
                                                <small>{!! Str::limit($item->description, 75) !!}</small>
                                            </p>
                                        </div>
                                    </div>
                                </a>
                            </div>

                            @endif
                    @endforeach
                    </div>

                    <div class="row">
                        <div class="col-lg-12">
                            <div class="content">
{{--                                {!! $albums->appends(Request::all())->render() !!}--}}
                                <div class="well">
                                    <ul class="list-unstyled">
{{--                                        <small>Alben insgesamt: {!! $albums->total() !!}</small> |--}}
                                        <small>Auf dieser Seite: {!! $albums->count() !!}</small> |
{{--                                        <small>Alle Seiten: {!! $albums->lastPage() !!}</small> |--}}
                                        <small>Photos insgesamt: {!! $photos->count() !!}</small>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>

                @else
                    <div class="col-lg-12 portfolio-item" style="height: 200px;">
                        <div class="portfolio-wrap">
                            <p class="align-middle text-center font-weight-bold mt-3" style="font-size: 150%;">Es sind noch keine Alben vorhanden.</p>
                        </div>
                    </div>
                @endif

            </div>
        </section><!-- End Portfolio Section -->

    </main><!-- End #main -->
@endsection

@push('js')
    <script>
        var time = new Date().getTime();
        $(document.body).bind("mousemove keypress", function (e) {
            time = new Date().getTime();
        });

        function refresh() {
            if (new Date().getTime() - time >= 600000)
                window.location.reload(true);
            else
                setTimeout(refresh, 600000);
        }

        setTimeout(refresh, 600000);
    </script>
@endpush
