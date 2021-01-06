@extends('layouts.main')

@section('title', 'Startseite')

@section('canonical')
    <link rel="canonical" href="{{ url()->full() }}"/>
@endsection

@section('meta')
    <meta name="robots" content="index, follow" />
@endsection

@push('css')

@endpush

@section('content')
    <!-- ======= Hero Section ======= -->
    <section id="hero">
        <div class="hero-container">
            <div id="heroCarousel" class="carousel slide carousel-fade" data-ride="carousel">

                <ol class="carousel-indicators" id="hero-carousel-indicatiors"></ol>

                <div class="carousel-inner" role="listbox">

                    <!-- Slide Weihnachten -->
                    <div class="carousel-item active" style="background: url({{ asset('images/Weihnachten_TTF_Website.jpg') }}); background-size: cover; background-position: center; background-repeat: no-repeat;">
                        <div class="carousel-container">
                            <div class="carousel-content">
{{--                                <h2 class="animated fadeInDown">Willkommen bei den <span>Thüringer Tuning Freunden</span></h2>--}}
{{--                                <p class="animated fadeInUp">Ein lustiges Team, das gerne schraubt, Grillt und sich mit anderen Clubs trifft.</p>--}}
                            </div>
                        </div>
                    </div>

                    <!-- Slide1 -->
                    <div class="carousel-item" style="background: url({{ asset('images/WhatsApp_Image_2019-10-28_at_11.21.22.jpeg') }}); background-size: cover; background-position: center; background-repeat: no-repeat;">
                        <div class="carousel-container">
                            <div class="carousel-content">
                                <h2 class="animated fadeInDown">Willkommen bei den <span>Thüringer Tuning Freunden</span></h2>
                                <p class="animated fadeInUp">Ein lustiges Team, das gerne schraubt, Grillt und sich mit anderen Clubs trifft.</p>
                            </div>
                        </div>
                    </div>

                    <!-- Slide 2 -->
                    <div class="carousel-item" style="background: url({{ asset('images/IMG-20200223-WA0004.jpg') }}); background-size: cover; background-position: center; background-repeat: no-repeat;">
                        <div class="carousel-container">
                            <div class="carousel-content">
                                <h2 class="animated fadeInDown">Das <span>bieten</span> wir</h2>
                                <p class="animated fadeInUp">Eine Werkstatt mit der Möglichkeit um an euren Autos auch was zu machen. Unsere Werkstatt und unser Clubhaus ist in Roßleben und befindet sich in einem kleinen Wohngebiet. Wir sind für euch da, wenn ihr Hilfe braucht egal bei welchem Anliegen wir helfen gerne.</p>
                                <a href="{{ url('ueber-uns') }}" class="btn-get-started animated fadeInUp">Weiterlesen</a>
                            </div>
                        </div>
                    </div>

                </div>

                <a class="carousel-control-prev" href="#heroCarousel" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon icofont-rounded-left" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>

                <a class="carousel-control-next" href="#heroCarousel" role="button" data-slide="next">
                    <span class="carousel-control-next-icon icofont-rounded-right" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>

            </div>
        </div>
    </section> <!-- End Hero -->

    <main id="main">

        <!-- ======= Featured Section ======= -->
        <section id="featured" class="featured">
            <div class="container">

                <div class="row">
                    <div class="col-lg-4">
                        <div class="icon-box">
                            <i class="icofont-car"></i>
                            <h3><a href="">Marken offener Tuningclub</a></h3>
                            <p>Keine Markenbindung alle Fahrzeugtypen sind willkommen bei uns. Auch du musst nicht der Jugendliche sein Tuning macht auch im Alter Spaß.</p>
                        </div>
                    </div>
                    <div class="col-lg-4 mt-4 mt-lg-0">
                        <div class="icon-box">
                            <i class="icofont-wrench"></i>
                            <h3><a href="">Werkstatt</a></h3>
                            <p>Kleine Werkstatt mit ca. 245 m² steht euch jeder Zeit zur Verfügung. Und circa 250 m² Außenfläche. Hier befindet sich auch unser Club.</p>
                        </div>
                    </div>
                    <div class="col-lg-4 mt-4 mt-lg-0">
                        <div class="icon-box">
                            <i class="icofont-people"></i>
                            <h3><a href="">Was erwartet Dich?</a></h3>
                            <p>Ein lustiges Team, das gerne schraubt, grillt und sich mit anderen Clubs trifft. Wir treffen uns 1 mal im Monat, ansonsten zu jedem Treffen das wir besuchen.</p>
                        </div>
                    </div>
                </div>

            </div>
        </section><!-- End Featured Section -->

        <!-- ======= About Section ======= -->
        <section id="about" class="about">
            <div class="container">

                <div class="row">
                    <div class="col-lg-6">
                        <img src="{{ asset('images/ueber-uns.png') }}" class="img-fluid filter-gray" alt="logo">
                    </div>
                    <div class="col-lg-6 pt-4 pt-lg-0 content">
                        <h3>Hallo liebe Intressenten!</h3>
                        <p class="font-italic">
                            Wir sind eine kleine Gruppe von Schraubern und Autobegeisterten, die sich schon länger kennen aber sich erst im Juli 2017 entschlossen haben, zusammen einen Club zu gründen.
                        </p>
                        <ul>
                            <li><i class="icofont-check-circled"></i> Eigene Werkstatt mit diversem Spezialwerkzeug.</li>
                            <li><i class="icofont-check-circled"></i> Bei uns gibt es keine Markenbindung oder Markenhass.</li>
                            <li><i class="icofont-check-circled"></i> Du schraubst gern an Autos, gehörst keinen Club an, und willst das ändern dann bist Du hier genau richtig.</li>
                        </ul>
                        <p>
                            Markenoffener Tuningclub egal ob Audi, Alfa, oder Trabant jeder der sein Fahrzeug liebt und gern schraubt und dabei noch Spaß daran hat, darf sich melden bei uns. Ob Familie oder Single, ob Alt oder Jung alles passt.
                        </p>
                    </div>
                </div>

            </div>
        </section><!-- End About Section -->

        <!-- ======= Services Section ======= -->
        <section id="services" class="services">
            <div class="container">

                <div class="section-title" data-aos="fade-up">
                    <h2>Fahrzeuge und Mitglieder</h2>
                </div>

                <div class="row">
                    <div class="col-lg-4 col-md-12 d-flex align-items-stretch">
                        <div class="icon-box w-100">
                            <div class="icon"><i class="icofont-people"></i></div>
                            <h4><a href="">Aktuelle Mitglieder</a></h4>
                            <p>Wir sind stand heute {{ $team }} Mitglieder</p>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-12 d-flex align-items-stretch mt-4 mt-lg-0">
                        <div class="icon-box w-100">
                            <div class="icon"><i class="icofont-car"></i></div>
                            <h4><a href="">Aktuelle Fahrzeuge</a></h4>
                            <p>Wir haben aktuell {{ $fahrzeuge }} Fahrzeuge</p>
                        </div>
                    </div>

                    <div class="col-lg-4 col-md-12 d-flex align-items-stretch mt-4 mt-lg-0">
                        <div class="icon-box w-100">
                            <div class="icon"><i class="fa fa-handshake"></i></div>
                            <h4><a href="">Treffen 2020</a></h4>
                            <p>Aktuell sind wir auf keinem Treffen.</p>
                        </div>
                    </div>

                </div>
            </div>
        </section><!-- End Services Section -->

        @if(date('22.12.2020') != date('10.01.2021'))
        <!-- Modal -->
        <div class="modal fade" id="modal-christmas" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Frohe Weihnachten und einen guten Rutsch ins
                            neue Jahr
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body" style="color: black">
                        <p>Liebe Clubmitglieder und Freunde,</p>
                        <p>2020 liegt nun fast hinter uns, ein Jahr, das sich komplett anders entwickelt hat, als wir
                            es zu Beginn erwarten konnten. Die Pandemie war und ist eine Prüfung für uns alle; sie
                            hat uns im Familien- und Freundeskreis, aber auch im beruflichen Umfeld, auf sehr besondere Weise herausgefordert. Für viele von uns bedeutete dies vor allem Einschränkungen und Verzicht auf Liebgewonnenes.</p>
                        <p>Wir hoffen, Sie und Ihre Angehörigen sind bisher gut und vor allem gesund durch diese Zeit gekommen. Die kommenden Festtage geben uns nun die Möglichkeit, ein Stück weit zur Normalität zurückzukehren, denn es gehörte schon immer zur Tradition, an Weihnachten und an den Tagen zwischen den Jahren zu entschleunigen und mit den Liebsten im familiären Kreis zu feiern, wenn auch etwas eingeschränkt.</p>
                        <p>Vielleicht bedeutet Weihnachten in diesen Zeiten aber sogar noch mehr; eine Chance, über das wirklich Wichtige im Leben nachzudenken – über das, auf was es wirklich ankommt: die Menschen in unserer Nähe; Familie und Arbeitskollegen, mit denen wir die schönen Zeiten, aber eben auch die täglichen Herausforderungen teilen.</p>
                        <p>Wir wünschen Ihnen – auch und ganz besonders im Namen der Thüringer-Tuning- Freunde – von ganzem Herzen ein frohes Fest und erholsame Tage. Vor allem aber viel Kraft, frische Energie und neue Zuversicht, die wir auch im neuen Jahr sicher benötigen werden.</p>
                        <p>Es grüßen Sie sehr herzlich</p>
                        <p>Eisenschmidt Heiko</p>
                        <p>Und das gesamte Team der Thüringer-Tuning-Freunde</p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
        @endif
    </main><!-- End #main -->
@endsection

@push('js')
    <script>
        $('#modal-christmas').modal({
            show: true
        });
    </script>
@endpush
