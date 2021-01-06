<!-- ======= Top Bar ======= -->
<section id="topbar">
    <div class="container-fluid d-flex">
        <div class="contact-info mr-auto d-none d-lg-block">
            <i class="icofont-envelope"></i><a href="mailto:{{ env('TTF_EMAIL') }}">{{ env('TTF_EMAIL') }}</a>
            <i class="icofont-phone"></i> <span><a href="tel:{{ env('TTF_TELEFON') }}">{{ env('TTF_TELEFON') }}</a></span>
        </div>
        <div class="social-links d-none d-lg-block">
            <a href="//twitter.com/TuningFreunde" class="twitter"><i class="icofont-twitter"></i></a>
            <a href="//www.facebook.com/groups/thueringer.tuning.freunde" class="facebook"><i class="icofont-facebook"></i></a>
            <a href="//www.instagram.com/tuning_freunde/" class="instagram"><i class="icofont-instagram"></i></a>
        </div>
        @if(auth()->check() == false)
            <div class="ml-3 mr-2" style="color: #aaaaaa">
                @include('layouts.partials.frontend.darkmode')
            </div>
        @endif
    </div>
</section>
