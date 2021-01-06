@extends('layouts.main')

@section('title', 'Impressum')

@section('canonical')
    <link rel="canonical" href="{{ url()->full() }}"/>
@endsection

@section('meta')
    <meta name="robots" content="index, follow" />
@endsection

@section('description')Dies ist unser Impressum.@endsection
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
                    <li>{{ __('Impressum') }}</li>

                </ol>
                <div class="row">
                    <div class="col-lg-6">
                        <h2>{{ __('Impressum') }}</h2>
                    </div>
                    <div class="col-lg-6">

                    </div>
                </div>

            </div>
        </section><!-- End Breadcrumbs -->

        <!-- ======= Team Section ======= -->
        <section id="team" class="team">
            <div class="container">

                <div class="row">
                    <div class="col-lg-12">
                        <h2>Impressum</h2>
                        <p>{{ env('TTF_NAME') }}<br>
                            {{ env('TTF_NAME1') }}<br/>
                            {{ env('TTF_STRASSE') }}<br/>{{ env('TTF_ORT') }}</p>
                        <p>Telefon: {{ env('TTF_TELEFON') }}<br/>
                            Telefax: {{ env('TTF_FAX') }}<br/>
                            E-Mail: <a
                                href="mailto:{{ env('TTF_EMAIL') }}">{{ env('TTF_EMAIL') }}</a><br/>
                        </p>
                        <br/>
                        <h2>Vertretungsberechtigte</h2>
                        <p><b>Vertretungsberechtigt:</b> Heiko Eisenschmidt</p>
                        <br>
                        <h2>Social Media und andere Onlinepräsenzen</h2>
                        <p><b>Dieses Impressum gilt auch für die folgenden Social-Media-Präsenzen und Onlineprofile:</b></p>
                        <p><a href="https://www.facebook.com/groups/thueringer.tuning.freunde/" target="_blank">https://www.facebook.com/groups/thueringer.tuning.freunde/</a></p>
                        <p><a href="https://twitter.com/TuningFreunde" target="_blank">https://twitter.com/TuningFreunde</a></p>
                        <p><a href="https://www.instagram.com/tuning_freunde/" target="_blank">https://www.instagram.com/tuning_freunde/</a></p>
                        <br/>
                        <h2>Disclaimer – rechtliche Hinweise</h2>
                        § 1 Warnhinweis zu Inhalten<br/>
                        Die kostenlosen und frei zugänglichen Inhalte dieser Webseite wurden mit größtmöglicher Sorgfalt
                        erstellt. Der Anbieter dieser Webseite übernimmt jedoch keine Gewähr für die Richtigkeit und
                        Aktualität der bereitgestellten kostenlosen und frei zugänglichen journalistischen Ratgeber und
                        Nachrichten. Namentlich gekennzeichnete Beiträge geben die Meinung des jeweiligen Autors und
                        nicht immer die Meinung des Anbieters wieder. Allein durch den Aufruf der kostenlosen und frei
                        zugänglichen Inhalte kommt keinerlei Vertragsverhältnis zwischen dem Nutzer und dem Anbieter
                        zustande, insoweit fehlt es am Rechtsbindungswillen des Anbieters.<br/>
                        <br/>
                        § 2 Externe Links<br/>
                        Diese Website enthält Verknüpfungen zu Websites Dritter ("externe Links"). Diese Websites
                        unterliegen der Haftung der jeweiligen Betreiber. Der Anbieter hat bei der erstmaligen
                        Verknüpfung der externen Links die fremden Inhalte daraufhin überprüft, ob etwaige
                        Rechtsverstöße bestehen. Zu dem Zeitpunkt waren keine Rechtsverstöße ersichtlich. Der Anbieter
                        hat keinerlei Einfluss auf die aktuelle und zukünftige Gestaltung und auf die Inhalte der
                        verknüpften Seiten. Das Setzen von externen Links bedeutet nicht, dass sich der Anbieter die
                        hinter dem Verweis oder Link liegenden Inhalte zu Eigen macht. Eine ständige Kontrolle der
                        externen Links ist für den Anbieter ohne konkrete Hinweise auf Rechtsverstöße nicht zumutbar.
                        Bei Kenntnis von Rechtsverstößen werden jedoch derartige externe Links unverzüglich
                        gelöscht.<br/>
                        <br/>
                        § 3 Urheber- und Leistungsschutzrechte<br/>
                        Die auf dieser Website veröffentlichten Inhalte unterliegen dem deutschen Urheber- und
                        Leistungsschutzrecht. Jede vom deutschen Urheber- und Leistungsschutzrecht nicht zugelassene
                        Verwertung bedarf der vorherigen schriftlichen Zustimmung des Anbieters oder jeweiligen
                        Rechteinhabers. Dies gilt insbesondere für Vervielfältigung, Bearbeitung, Übersetzung,
                        Einspeicherung, Verarbeitung bzw. Wiedergabe von Inhalten in Datenbanken oder anderen
                        elektronischen Medien und Systemen. Inhalte und Rechte Dritter sind dabei als solche
                        gekennzeichnet. Die unerlaubte Vervielfältigung oder Weitergabe einzelner Inhalte oder
                        kompletter Seiten ist nicht gestattet und strafbar. Lediglich die Herstellung von Kopien und
                        Downloads für den persönlichen, privaten und nicht kommerziellen Gebrauch ist erlaubt.<br/>
                        <br/>
                        Die Darstellung dieser Website in fremden Frames ist nur mit schriftlicher Erlaubnis
                        zulässig.<br/>
                        <br/>
                        § 4 Besondere Nutzungsbedingungen<br/>
                        Soweit besondere Bedingungen für einzelne Nutzungen dieser Website von den vorgenannten
                        Paragraphen abweichen, wird an entsprechender Stelle ausdrücklich darauf hingewiesen. In diesem
                        Falle gelten im jeweiligen Einzelfall die besonderen Nutzungsbedingungen.<br>
                        <br>
                        <p>Quelle: <a
                                href="https://www.juraforum.de/impressum-generator/">Impressum Vorlage von
                                JuraForum.de</a></p>
                    </div>
                </div>
            </div>
        </section><!-- End Team Section -->

    </main><!-- End #main -->
@endsection

@push('js')

@endpush
