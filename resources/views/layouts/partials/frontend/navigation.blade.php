@include('layouts.partials.frontend.topbar')
{{--<div class="d-none"> {{ $navigation = \App\Models\Frontend\Navigation\Navigation::with('subnavigation')->orderBy('navigations.sort', 'ASC')->get() }}</div>--}}
<!-- ======= Header ======= -->
<header id="header">
    <nav class="navbar navbar-expand-lg navbar-light bg-white">
{{--        <a class="navbar-brand" href="{{ url('/') }}">{{ env('APP_NAME') }}</a>--}}
        <a class="navbar-brand" href="{{ url('/') }}">
            <img src="/images/logo.svg" type="image/svg+xml" class="logoheader" style="width:auto; height: 30px;">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarToggler" aria-controls="navbarToggler" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse align-item-center w-100" id="navbarToggler">
            <ul class="navbar-nav mx-auto text-left navbar-mod">
                {{--@foreach($navigation as $item)
                        <li class="nav-item {{ Request::is($item->slug) ? 'active' : '' }}">
                            <a class="nav-link {{ Request::is($item->slug) ? 'active' : '' }}" href="{{ url($item->slug) }}">{{ $item->title }}</a>
                        </li>
                @endforeach--}}
                    <li class="nav-item {{ Request::is('team') ? 'active' : '' }}">
                        <a class="nav-link {{ Request::is('team') ? 'active' : '' }}" href="{{ route('frontend.team.index') }}">Team</a>
                    </li>
                    <li class="nav-item {{ Request::is('ueber-uns') ? 'active' : '' }}">
                        <a class="nav-link {{ Request::is('ueber-uns') ? 'active' : '' }}" href="{{ route('frontend.ueber-uns') }}">Über uns</a>
                    </li>
                    <li class="nav-item {{ Request::is('fahrzeuge') ? 'active' : '' }}">
                        <a class="nav-link {{ Request::is('fahrzeuge') ? 'active' : '' }}" href="{{ route('frontend.fahrzeuge.index') }}">Fahrzeuge</a>
                    </li>
                    <li class="nav-item {{ Request::is('galerie') ? 'active' : '' }}">
                        <a class="nav-link {{ Request::is('galerie') ? 'active' : '' }}" href="{{ route('frontend.galerie.index') }}">Galerie</a>
                    </li>
                    <li class="nav-item {{ Request::is('veranstaltungen') ? 'active' : '' }}">
                        <a class="nav-link {{ Request::is('veranstaltungen') ? 'active' : '' }}" href="{{ route('frontend.veranstaltungen.index') }}">Veranstaltungen</a>
                    </li>
                    <li class="nav-item {{ Request::is('kontakt') ? 'active' : '' }}">
                        <a class="nav-link {{ Request::is('kontakt') ? 'active' : '' }}" href="{{ route('frontend.kontakt.index') }}">Kontakt</a>
                    </li>
                    <li class="nav-item {{ Request::is('antrag') ? 'active' : '' }}">
                        <a class="nav-link {{ Request::is('antrag') ? 'active' : '' }}" href="{{ route('frontend.antrag.index') }}">Antrag</a>
                    </li>
                    <li class="nav-item {{ Request::is('gaestebuch') ? 'active' : '' }}">
                        <a class="nav-link {{ Request::is('gaestebuch') ? 'active' : '' }}" href="{{ route('frontend.gaestebuch.index') }}">Gästebuch</a>
                    </li>
                @hasanyrole('Mitglied|Admin|Super Admin')
                <li class="nav-item {{ Request::is('intern') ? 'active' : '' }}">
                    <a class="nav-link {{ Request::is('intern') ? 'active' : '' }}" href="{{ route('intern.dashboard') }}">Intern</a>
                </li>
                <li class="nav-item {{ Request::is('downloads') ? 'active' : '' }}">
                    <a class="nav-link {{ Request::is('downloads') ? 'active' : '' }}" href="{{ url('downloads') }}">Downloads</a>
                </li>
                @endhasanyrole
            </ul>
            <ul class="nav navbar-nav">
                <!-- Authentication Links -->
                @guest
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}"> {{ __('Login') }}</a>
                    </li>
                @else

                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->vorname.' '.Auth::user()->nachname }} <span class="caret"></span>
                        </a>

                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a href="{{ url('/intern/dashboard') }}" class="dropdown-item">Interner Bereich</a>
                            <a class="dropdown-item" href="{{ route('logout') }}"
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>

                            <hr>
                            <div class="text-left pl-4 pb-2">
                                @include('layouts.partials.frontend.darkmode')
                            </div>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </nav>
</header>
