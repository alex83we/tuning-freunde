@extends('layouts.main')

@section('title'){{ 'Galerie | '. $album->title . ' | ' . $album->photos->count() . ' Fotos im Album ' }}@endsection

@section('canonical')
    <link rel="canonical" href="{{ url()->full() }}"/>
@endsection

@section('meta')
    <meta name="robots" content="index, follow" />
@endsection

@section('description'){!! strip_tags(Str::limit($album->description, 155)) !!}@endsection
@section('url'){{ url()->full() }}@endsection
@section('image'){{ url('images/'.$album->images) }}@endsection

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
                    <li><a href="{{ url('/galerie') }}">Galerie</a></li>
                    <li>{{ $album->title }}</li>
                </ol>
                <div class="row">
                    <div class="col-lg-6">
                        <h2>{{ $album->title }}</h2>
                    </div>
                    <div class="col-lg-6">
                        @can('galerie-delete')
                            @if(auth()->user()->id == $album->user_id)
                                <form action="{{ route('frontend.galerie.destroy', $album->slug) }}" method="POST"
                                      style="display: inline;" class="float-none float-lg-right">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger"><i class="icofont-trash"></i> Löschen</button>
                                </form>
                            @endif
                        @endcan
                        @can('photo-create')
                            @if(auth()->user()->id == $album->user_id)
                                <a href="{{ route('frontend.photos.edit', $album->slug) }}"
                                   class="btn btn-success btn-sm float-none float-lg-right mt-2 mr-2 mt-lg-0 text-dark"><i
                                        class="icofont-plus"></i> Fotos hinzufügen</a>
                            @elseif($album->kategorie == 'Treffen' or $album->kategorie == 'Club-interne-Treffen')
                                <a href="{{ route('frontend.photos.edit', $album->slug) }}"
                                class="btn btn-success btn-sm float-none float-lg-right mt-2 mr-2 mt-lg-0 text-dark"><i
                                     class="icofont-plus"></i> Fotos hinzufügen</a>
                            @endif
                        @endcan
                    </div>
                </div>
            </div>
        </section><!-- End Breadcrumbs -->

        <!-- ======= Portfolio Section ======= -->
        <section id="portfolio" class="portfolio-images">
            <div class="container-fluid">

                <div class="col-lg-12">
                    {!! $album->description !!}
                </div>

                <div class="photo-images">
                    <div class="photo-gallery">
                        @foreach($album->photos as $item)
                            @if($item->published_at <= now() and $item->published == true)
                                <figure class="thumb">
                                    @if($item->images == 'default.png')
                                    <a class="thumbnail" href="{{ Storage::disk('public')->url('default.png') }}" data-fancybox="images" data-caption="@if ($item->description) {{ $item->description }} @else {{ $item->title }} @endif">
                                        <img class="filter-gray" src="{{ Storage::disk('public')->url('default.png') }}" alt="@if($item->description) {{ $item->description }} @else {{ $item->title }} @endif" title="Anhang: @if ($item->description) {{ $item->description }} @else {{ $item->title }} @endif">
                                    </a>
                                    @else
                                    <a class="thumbnail venobox filter-gray" href="{{ Storage::disk('public')->url('images/'.$item->slug.'/'.$item->images) }}" data-fancybox="images" data-caption="@if ($item->description) {{ $item->description }} @else {{ $item->title }} @endif">
                                        <img src="{{ Storage::disk('public')->url('images/'.$item->slug.'/thumbnails/'.$item->images) }}" alt="@if ($item->description) {{ $item->description }} @else {{ $item->title }} @endif" title="Anhang: @if ($item->description) {{ $item->description }} @else {{ $item->title }} @endif">
                                    </a>
                                    @endif
                                    <figcaption class="caption description">
                                        <div class="text-center text-white mb-2">
                                            @canany('galerie-delete|galerie-edit')
                                            @if(auth()->user()->id == $item->user_id)
                                                @if($item->images != $album->images)
                                                    {{--<a href="{{ route('frontend.photos.editPhoto' ,$item->id) }}"
                                                       class="btn btn-sm btn-info mt-2"><i class="icofont-edit"></i> Ändern</a>--}}
                                                    <form action="{{ route('frontend.photos.destroy', $item->id) }}" method="POST" style="display: inline-block;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-sm btn-danger mt-2"><i class="icofont-trash"></i> Löschen</button><br>
                                                    </form>

                                                    <form action="{{ route('frontend.photos.updatePreview', $item->id) }}" method="POST"
                                                          enctype="multipart/form-data" style="display: inline-block;">
                                                        @csrf
                                                        @method('put')
                                                        <input type="hidden" name="album_id" value="{{ $album->id }}">
                                                        <input type="hidden" name="id" value="{{ $item->id }}">
                                                        <input type="hidden" name="images" value="{{ $item->images }}">
                                                        <input type="hidden" name="size" value="{{ $item->size }}">
                                                        <button type="submit" class="btn btn-sm btn-secondary mt-2"><i
                                                                class="fa fa-image"></i> Vorschaubild <i
                                                                class="fa fa-times text-danger"></i></button>
                                                    </form>
                                                @else
                                                    <div class="btn btn-sm btn-success mt-2"><i class="fa fa-image"></i> Vorschaubild <i
                                                            class="icofont-check"></i></div>
                                                @endif
                                            @endif
                                            @endcanany
                                        </div>
                                    </figcaption>
                                </figure>
                            @endif
                        @endforeach
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
