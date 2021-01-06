<!-- ======= Footer ======= -->
<footer id="footer">

    <div class="footer-top">
        <div class="container">
            <div class="row">

                <div class="col-lg-3 col-md-6 footer-links">
                    <h4>Nützliche Links</h4>
                    <ul>
                        <li><i class="icofont-swoosh-right"></i> <a href="{{ url('/') }}">Home</a></li>
                        <li><i class="icofont-swoosh-right"></i> <a href="{{ url('kontakt') }}">Kontakt</a></li>
                        <li><i class="icofont-swoosh-right"></i> <a href="{{ url('impressum') }}">Impressum / Disclaimer</a></li>
                        <li><i class="icofont-swoosh-right"></i> <a href="{{ url('datenschutz') }}">Datenschutz-Bestimmungen</a></li>
                        @hasanyrole('Mitglied|Admin|Super Admin')
                        <li><i class="icofont-swoosh-right"></i> <a href="{{ url('downloads') }}">Downloads</a></li>
                        @endhasanyrole
{{--                        <li><i class="icofont-swoosh-right"></i> <a href="{{ url('cookies') }}">Cookie Einstellungen</a></li>--}}
                        <li><i class="icofont-swoosh-right"></i> <a href="#" onclick="CCM.openWidget();return false;">Cookie Einstellungen</a></li>
                    </ul>
                </div>

                <div class="col-lg-3 col-md-6 footer-links">
                    <h4>Unsere Vorteile</h4>
                    <ul>
                        <li><i class="icofont-swoosh-right"></i> <a >Tuning</a></li>
                        <li><i class="icofont-swoosh-right"></i> <a >Eigene Werkstatt</a></li>
                        <li><i class="icofont-swoosh-right"></i> <a >Reifenservice</a></li>
                        <li><i class="icofont-swoosh-right"></i> <a >Clubhaus</a></li>
                        <li><i class="icofont-swoosh-right"></i> <a >Ersatzteile in kurzer Zeit</a></li>
                    </ul>
                </div>

                <div class="col-lg-3 col-md-6 footer-contact">
                    <h4>Kontaktiere uns</h4>
                    <p>
                        {{ env('TTF_NAME') }}<br>
                        {{ env('TTF_STRASSE') }}<br>
                        {{ env('TTF_ORT') }}<br><br>
                        <strong>Telefon:</strong> <a href="tel:{{ env('TTF_TELEFON') }}">{{ env('TTF_TELEFON') }}</a><br>
                        <strong>E-Mail:</strong> <a href="mailto:{{ env('TTF_EMAIL') }}" style="color: white;">{{ env('TTF_EMAIL') }}</a><br>
                    </p>

                </div>

                <div class="col-lg-3 col-md-6 footer-info">
                    <h4>Über uns</h4>
                    <p>Dezent getunt oder voll aufgemotzt. … jeder fährt das, was sein Geldbeutel hergibt. Bei uns ist jeder willkommen, der am Tuning oder einfach nur Schrauben Spaß hat.</p>
                    <div class="social-links mt-3">
                        <a href="//twitter.com/TuningFreunde" class="twitter" target="_blank"><i class="icofont-twitter"></i></a>
                        <a href="//www.facebook.com/groups/thueringer.tuning.freunde" class="facebook" target="_blank"><i class="icofont-facebook"></i></a>
                        <a href="//www.instagram.com/tuning_freunde/" class="instagram" target="_blank"><i class="icofont-instagram"></i></a>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="container">
        <div class="copyright">
            &copy; Copyright <strong><span>{{ env('TTF_NAME') }}</span></strong>. Alle Rechte vorbehalten
        </div>
        <div class="credits">
            Designed by <a href="{{ url('team/alex') }}">@Alex</a> | <a href="{{ env('TTF_URL') }}">{{ env('TTF_URL') }}</a>
        </div>
    </div>
</footer><!-- End Footer -->

<a href="#" class="back-to-top"><i class="icofont-simple-up"></i></a>
