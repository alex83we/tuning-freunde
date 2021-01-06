@extends('layouts.main')

@section('title', 'Downloads')

@section('canonical')
    <link rel="canonical" href="{{ url()->full() }}"/>
@endsection

@section('meta')
    <meta name="robots" content="noindex, nofollow" />
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
                    <li>{{ __('Downloads') }}</li>

                </ol>
                <div class="row">
                    <div class="col-lg-6">
                        <h2>{{ __('Downloads') }}</h2>
                    </div>
                </div>

            </div>
        </section><!-- End Breadcrumbs -->

        <!-- ======= Team Section ======= -->
        <section id="team" class="team">
            <div class="container">

                <div class="row">

                    <div class="col-lg-6">
                        <div class="card mb-4">
                            <div class="row no-gutters">
                                <div class="col-lg-4 text-center" oncontextmenu="return false">
                                    <img src="{{ asset('images/wallpaper/HD_Wallpaper_TTF.png') }}" class="card-img"
                                         alt="HD_Wallpaper_TTF">
                                </div>
                                <div class="col-lg-8">
                                    <div class="card-body">
                                        <h5 class="card-title">HD Wallpaper Thüringer Tuning Freunde</h5>
                                        <p class="card-text">Hier könnt ihr euch ein Wallpaper für euer Smartphone herunterladen.</p>
                                        <p class="card-text"><small style="font-size: x-small;">Size: 1,39 MB, Auflösung: HD 1280 x 720</small><a class="float-right" role="button" href="{{ url('images/wallpaper/HD_Wallpaper_TTF.png') }}" download="HD_Wallpaper_TTF.png"><i class="fa fa-download"></i> Download</a></p>
                                        <p class="card-text"><small style="font-size: x-small;">Size: 2,74 MB, Auflösung: Full HD 1920 x 1080</small><a class="float-right" role="button" href="{{ url('images/wallpaper/FullHD_Wallpaper_TTF.png') }}" download="FullHD_Wallpaper_TTF.png"> <i class="fa fa-download"></i> Download</a></p>
                                        <p class="card-text"><small style="font-size: x-small;">Size: 4,39 MB, Auflösung: Quad HD 1440 x 2560</small><a class="float-right" role="button" href="{{ url('images/wallpaper/QuadHD_Wallpaper_TTF.png') }}" download="QuadHD_Wallpaper_TTF.png"> <i class="fa fa-download"></i> Download</a></p>
                                        <p class="card-text"><small style="font-size: x-small;">Size: 8,50 MB, Auflösung: Ultra HD 2160 x 3840</small><a class="float-right" role="button" href="{{ url('images/wallpaper/UltraHD_Wallpaper_TTF.png') }}" download="UltraHD_Wallpaper_TTF.png"> <i class="fa fa-download"></i> Download</a></p>
                                        <p class="card-text"><small style="font-size: x-small;">Size: 8,82 MB, Auflösung: 4K 2160 x 4096</small><a class="float-right" role="button" href="{{ url('images/wallpaper/4K_Wallpaper_TTF.png') }}" download="4K_Wallpaper_TTF.png"> <i class="fa fa-download"></i> Download</a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="card mb-4">
                            <div class="text-center" oncontextmenu="return false">
                                <img src="{{ asset('images/wallpaper/pc/Wallpaper_1024_600.gif') }}" class="card-img"
                                     alt="Wallpaper_1024_600" style="height: 350px;">
                            </div>
                            <div class="card-body">
                                <h5 class="card-title">Wallpaper Thüringer Tuning Freunde</h5>
                                <p class="card-text">Hier könnt ihr euch ein Wallpaper für den PC herunterladen.</p>
                                <div class="card-text">
                                    <div class="row my-2">
                                        <div class="col-lg-3"><a role="button" href="{{ url('images/wallpaper/pc/Wallpaper_1024_600.gif') }}" download="Wallpaper_1024_600.gif"><i class="fa fa-download"></i> 1024 x 600</a></div>
                                        <div class="col-lg-3"><a role="button" href="{{ url('images/wallpaper/pc/Wallpaper_1024_768.gif') }}" download="Wallpaper_1024_768.gif"><i class="fa fa-download"></i> 1024 x 768</a></div>
                                        <div class="col-lg-3"><a role="button" href="{{ url('images/wallpaper/pc/Wallpaper_1280_800.gif') }}" download="Wallpaper_1280_800.gif"><i class="fa fa-download"></i> 1280 x 800</a></div>
                                        <div class="col-lg-3"><a role="button" href="{{ url('images/wallpaper/pc/Wallpaper_1600_1200.gif') }}" download="Wallpaper_1600_1200.gif"><i class="fa fa-download"></i> 1600 x 1200</a></div>
                                    </div>
                                    <div class="row my-2">
                                        <div class="col-lg-3"><a role="button" href="{{ url('images/wallpaper/pc/Wallpaper_1920_1080.gif') }}" download="Wallpaper_1920_1080.gif"><i class="fa fa-download"></i> 1920 x 1080</a></div>
                                        <div class="col-lg-3"><a role="button" href="{{ url('images/wallpaper/pc/Wallpaper_1920_1280.gif') }}" download="Wallpaper_1920_1280.gif"><i class="fa fa-download"></i> 1920 x 1280</a></div>
                                        <div class="col-lg-3"><a role="button" href="{{ url('images/wallpaper/pc/Wallpaper_2048_1152.gif') }}" download="Wallpaper_2048_1152.gif"><i class="fa fa-download"></i> 2048 x 1152</a></div>
                                        <div class="col-lg-3"><a role="button" href="{{ url('images/wallpaper/pc/Wallpaper_2560_1024.gif') }}" download="Wallpaper_2560_1024.gif"><i class="fa fa-download"></i> 2560 x 1024</a></div>
                                    </div>
                                    <div class="row my-2">
                                        <div class="col-lg-3"><a role="button" href="{{ url('images/wallpaper/pc/Wallpaper_2560_1080.gif') }}" download="Wallpaper_2560_1080.gif"><i class="fa fa-download"></i> 2560 x 1080</a></div>
                                        <div class="col-lg-3"><a role="button" href="{{ url('images/wallpaper/pc/Wallpaper_2560_1440.gif') }}" download="Wallpaper_2560_1440.gif"><i class="fa fa-download"></i> 2560 x 1440</a></div>
                                        <div class="col-lg-3"><a role="button" href="{{ url('images/wallpaper/pc/Wallpaper_2560_1600.gif') }}" download="Wallpaper_2560_1600.gif"><i class="fa fa-download"></i> 2560 x 1600</a></div>
                                        <div class="col-lg-3"><a role="button" href="{{ url('images/wallpaper/pc/Wallpaper_3840_2160.gif') }}" download="Wallpaper_3840_2160.gif"><i class="fa fa-download"></i> 3840 x 2160</a></div>
                                    </div>
                                    <div class="row my-2">
                                        <div class="col-lg-3"><a role="button" href="{{ url('images/wallpaper/pc/Wallpaper_3840_2400.gif') }}" download="Wallpaper_3840_2400.gif"><i class="fa fa-download"></i> 3840 x 2400</a></div>
                                        <div class="col-lg-3"><a role="button" href="{{ url('images/wallpaper/pc/Wallpaper_4096_3072.gif') }}" download="Wallpaper_4096_3072.gif"><i class="fa fa-download"></i>4096 x 3072</a></div>
                                        <div class="col-lg-3"><a role="button" href="{{ url('images/wallpaper/pc/Wallpaper_5760_1080.gif') }}" download="Wallpaper_5760_1080.gif"><i class="fa fa-download"></i> 5760 x 1080</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </section>

    </main>
@endsection

@push('js')

@endpush