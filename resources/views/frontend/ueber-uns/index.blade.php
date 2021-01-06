@extends('layouts.main')

@section('title', 'Über uns')

@section('canonical')
    <link rel="canonical" href="{{ url()->full() }}"/>
@endsection

@section('meta')
    <meta name="robots" content="index, follow" />
@endsection

@section('description'){!! strip_tags(Str::limit('Wir sind eine kleine Gruppe von Schraubern und Autobegeisterten, die sich schon länger kennen aber sich erst im Juli 2017 entschlossen haben, zusammen einen Club zu gründen. Von den ursprünglichen Gründern sind nur noch 2 übrig, der Rest geht seinen eigenen weg.', 155)) !!}@endsection
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
                    <li>Über uns</li>
                </ol>
                <h2>Über uns</h2>

            </div>
        </section><!-- End Breadcrumbs -->

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
                            Von den ursprünglichen Gründern sind nur noch 2 übrig, der Rest geht seinen eigenen weg.
                        </p>
                        <ul>
                            <li><i class="icofont-check-circled"></i> Eigene Werkstatt mit diversem Spezialwerkzeug.</li>
                            <li><i class="icofont-check-circled"></i> Bei uns gibt es keine Markenbindung oder Markenhass.</li>
                            <li><i class="icofont-check-circled"></i> Du schraubst gern an Autos, gehörst keinen Club an, und willst das ändern dann bist Du hier genau richtig.</li>
                        </ul>
                        <p class="trennung">
                            Markenoffener Tuningclub egal ob Audi, Alfa, oder Trabant jeder der sein Fahrzeug liebt und gern schraubt und dabei noch Spaß daran hat, darf sich melden bei uns. Ob Familie oder Single, ob Alt oder Jung alles passt.
                        </p>
                    </div>
                </div>

            </div>
        </section><!-- End About Section -->

        <!-- ======= Counts Section ======= -->
        <section id="counts" class="counts">
            <div class="container">

                <div class="row no-gutters">

                    <div class="col-lg-3 col-md-6 d-md-flex align-items-md-stretch">
                        <div class="count-box">
                            <i class="icofont-people"></i>
                            <span data-toggle="counter-up">{{ $team }}</span>
                            <p><strong>Mitglieder</strong> sind aktuell in unserem Club</p>
                            <a href="{{ url('team') }}">Finde mehr heraus &raquo;</a>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 d-md-flex align-items-md-stretch">
                        <div class="count-box">
                            <i class="icofont-car"></i>
                            <span data-toggle="counter-up">{{ $fahrzeuge }}</span>
                            <p><strong>Fahrzeuge</strong> haben wir aktuell in unserem Club</p>
                            <a href="{{ url('fahrzeuge') }}">Finde mehr heraus &raquo;</a>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 d-md-flex align-items-md-stretch">
                        <div class="count-box">
                            <i class="fa fa-handshake"></i>
                            <span data-toggle="counter-up">0</span>
                            <p><strong>Treffen</strong> die wir {{ date('Y') }} Besuchen werden</p>
                            <a href="{{ url('veranstaltungen') }}">Finde mehr heraus &raquo;</a>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 d-md-flex align-items-md-stretch">
                        <div class="count-box">
                            <i class="icofont-under-construction-alt"></i>
                            <span data-toggle="counter-up">{{ $project }}</span>
                            <p><strong>Projekte</strong> unserer Mitglieder</p>
                            <a href="{{ url('galerie') }}">Finde mehr heraus &raquo;</a>
                        </div>
                    </div>

                </div>

            </div>
        </section><!-- End Counts Section -->

        <section id="about-2" class="about-2">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 content">
                        <p class="trennung">Gebt uns eine kleine Minute um uns kurz vorzustellen.
                            Wir sind eine kleine Gruppe von Schraubern und Autobegeisterten, die sich schon länger kennen aber sich erst im Juli 2017 entschlossen haben, zusammen einen Club zu gründen.
                            Also überlegten wir, was wir für einen Namen nehmen und schliesslich waren wir uns einig, das Thüringer Tuning Freunde der Name unseres Clubs seien soll.
                            Das soll natürlich nicht heißen das unsere Mitglieder nur aus Thüringen kommen müssen.
                            Von den ursprünglichen Gründern sind nur noch 2 übrig, der Rest geht seinen eigenen weg.</p>
                    </div>
                    <div class="col-lg-6 pt-4 pt-lg-0 content">
                        <img src="{{ asset('images/logo.svg') }}" class="img-fluid" alt="logo">
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 pt-4 pt-lg-0 content">
                        <p class="trennung">Nun zu Dir/Euch.</p>
                        <p class="trennung">Du schraubst gern an Autos, gehörst keinen Club an, und willst das ändern dann bist Du hier genau richtig.
                            Hast Spaß an deinem Tun und gibt’s dein Wissen gern wieder, bist teamfähig dann solltest schnell das Kontaktformular ausfüllen.
                            Du möchtest aber gleich Mitglied werden, dann musst du nur das Mitgliedsformular ausfüllen. Du kennst jemanden der jemanden kennt dann bring ihn mit.
                            Gern auch Familien mit Kindern. Wir freuen uns auf jedes neue Mitglied.</p>
                        <p class="trennung">Egal was du fährst, ob Oldtimer oder Neuwagen, bei uns wird jeder gleich behandelt.</p>
                        <p class="trennung">Markenoffener Tuningclub egal ob Audi, Alfa, oder Trabant jeder der sein Fahrzeug liebt und gern schraubt und dabei noch Spaß daran hat, darf sich melden bei uns.
                            Ob Familie oder Single, ob Alt oder Jung alles passt.</p>
                        <p class="trennung">Dezent getunt oder voll aufgemotzt. … jeder fährt das was sein Geldbeutel hergibt.</p>
                        <p class="trennung">Meldet euch einfach.</p>
                        <p class="trennung">Was wir erwarten von jedem Mitglied das wir anständig mit einander umgehen. Alles kann nix muss heißt die Deviese.
                            Deine Meinung ist uns wichtig, und sollte sie auch vertreten.
                            Mitsprache Recht für alle.</p>
                        <p class="trennung">Ab Mai 2019 werden wir uns regelmäßig am 1. Samstag im Monat treffen.
                            In unserer Halle zum Quatschen und austauschen aber gerne kann da auch mal über das ein oder andere Problem gesprochen werden.
                            Auch da könnt Ihr euch gern schon anschließen.</p>
                        <p class="trennung">Was erwartet dich.
                            Ein lustiges Team das gern schraubt, grillt und sich mit anderen Clubs trifft.</p>
                        <p class="trennung">Wir hatten bis Ende November 2019 eine Halle, mit Hebebühne in Bad Berka, wo man an seinem Fahrzeug schrauben konnte, diese war 24 h befahrbar.
                            Die Halle in Bad Berka mussten wir aufgeben da unser Vermieter keine Schrauber mehr möchte und wir uns sowieso schon nach was anderem umgesehen haben.
                            Unsere neue Werkstatt ist seit Dezember 2019 in Roßleben wo wir ein ehemaliges Autohaus angemietet haben.
                            Allerdings haben wir diese nur angemietet.
                            Näheres beim Erstgespräch.</p>
                        <p class="trennung">Jedes Mitglied, welches die Halle nutzen möchte, kann das gerne tun.
                            Die Halle ist unabhängig vom Club, ein kleiner Obolus für die Clubkasse sollte drinne sein für neu Anschaffungen. z. B. Werkzeug, Partys, usw.</p>
                        <p class="trennung">Hallennutzung: ab 25,00 € Monatlich kannst du unsere Halle mit Nutzen in Absprache mit uns.</p>
                        <p class="trennung">So das war’s erstmal.</p>
                        <p class="trennung">Sollte dein Interesse weiterhin bestehen dann melde dich über das Mitgliedsformular an.</p>
                        <p class="trennung">Wir melden uns umgehend bei dir.</p>
                        <p class="trennung">Eure Thüringer Tuning Freunde</p>
                    </div>
                </div>
            </div>
        </section>
    </main>
@endsection

@push('js')

@endpush
