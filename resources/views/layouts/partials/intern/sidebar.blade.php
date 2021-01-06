<?php
$team = NULL;
$teams = DB::table('teams')->where('user_id', '=', auth()->user()->id)->get();
foreach ($teams as $item) (
    $team = $item
)
?>
<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ url('/') }}" class="brand-link text-center">
        {{--<img src="dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
             style="opacity: .8">--}}
        <span class="brand-text font-weight-light">{{ env('APP_NAME') }}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                @if(count($teams) > 0)
                    @if($team->image == true)
                        <img src="{{ Storage::disk('public')->url('images/profil/'.$team->image) }}" class="img-circle elevation-2" alt="User Image">
                    @endif
                @else
                    <div id="profileImage"></div>
                    <div class="d-none">
                        <span id="vorname">{{ auth()->user()->vorname }}</span>
                        <span id="nachname">{{ auth()->user()->nachname }}</span>
                    </div>
                @endif
            </div>
            <div class="info">
                <a href="#" class="d-block">{{ auth()->user()->vorname.' '.auth()->user()->nachname }}</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                <li class="nav-item">
                    <a href="{{ route('intern.dashboard') }}" class="nav-link {{ Request::is('intern/dashboard') ? 'active' : '' }}">
                        <i class="nav-icon fa fa-tachometer"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('intern.team.index') }}" class="nav-link {{ Request::is('intern/team*') ? 'active' : '' }}">
                        <i class="nav-icon fa fa-users"></i>
                        <p>
                            Team
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('intern.telefonliste.index') }}" class="nav-link {{ Request::is('intern/telefonliste*') ? 'active' : '' }}">
                        <i class="nav-icon fa fa-phone"></i>
                        <p>
                            Kontaktliste
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('intern.geburtstagsliste.index') }}" class="nav-link {{ Request::is('intern/geburtstagsliste*') ? 'active' : '' }}">
                        <i class="nav-icon fa fa-birthday-cake"></i>
                        <p>
                            Geburtstagsliste
                        </p>
                    </a>
                </li>
                @if (\Carbon\Carbon::now() >= '2020-08-22 13:30:00')
                <li class="nav-item">
                    <a href="{{ route('intern.satzung.index') }}" class="nav-link {{ Request::is('intern/satzung*') ? 'active' : '' }}">
                        <i class="nav-icon fa fa-balance-scale"></i>
                        <p>
                            Satzung
                        </p>
                    </a>
                </li>
                @endif
                {{--@role('Mitglied')
                <li class="nav-item">
                    <a href="{{ route('intern.miete.index') }}" class="nav-link {{ Request::is('intern/miete*') ? 'active' : '' }}">
                        <i class="nav-icon fa fa-euro"></i>
                        <p>
                            {{ Str::limit('Miete / Mitgliedsbeitrag', 20) }}
                        </p>
                    </a>
                </li>
                @endrole--}}
                {{--<li class="nav-item has-treeview {{ Request::is('intern/cms*') ? 'menu-open' : '' }}">
                    <a href="" class="nav-link {{ Request::is('intern/cms*') ? 'active' : '' }}">
                        <i class="nav-icon fa fa-file"></i>
                        <p>
                            CMS
                            <i class="right fa fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        @foreach(\App\Models\Backend\Navigation::with('subnavigation')->orderBy('sort', 'ASC')->get() as $item)
                            @if($item->subnavigation->count() >0)
                        <li class="nav-item has-treeview {{ Request::is('intern/cms/'.$item->slug.'*') ? 'menu-open' : '' }}">
                            <a href="" class="nav-link {{ Request::is('intern/cms/'.$item->slug.'*') ? 'active' : '' }}">
                                <i class="fa fa-circle nav-icon"></i>
                                <p>
                                    {{ $item->title }}
                                    <i class="right fa fa-angle-left"></i>
                                </p>
                            </a>
                            <ul class="nav nav-treeview">
                                @foreach($item->subnavigation as $subitem)
                                <li class="nav-item">
                                    <a href="{{ url('intern/cms/'.$item->slug.'/'.$subitem->slug) }}" class="nav-link  {{ Request::is('intern/cms/'.$item->slug.'/'.$subitem->slug) ? 'active' : '' }}">
                                        <i class="fa fa-dot-circle nav-icon"></i>
                                        <p>{{ 'cms/'.$subitem->title }}</p>
                                    </a>
                                </li>
                                @endforeach
                            </ul>
                        </li>
                        @else
                        <li class="nav-item">
                            <a href="{{ url('intern/cms/'.$item->slug) }}" class="nav-link {{ Request::is('intern/cms/'.$item->slug.'*') ? 'active' : '' }}">
                                <i class="fa fa-circle nav-icon"></i>
                                <p>{{ $item->title }}</p>
                            </a>
                        </li>
                        @endif
                        @endforeach
                    </ul>
                </li>--}}
                {{--@can('Fahrzeug erstellen')
                <li class="nav-item">
                    <a href="{{ route('fahrzeuge.create') }}" class="nav-link">
                        <i class="nav-icon fa fa-car"></i>
                        <p>
                            Fahrzeug anlegen
                        </p>
                    </a>
                </li>
                @endcan--}}
                @hasanyrole('Super Admin|Admin')
                <li class="nav-header">Admin Menü</li>
                @can('antrag-list')
                <li class="nav-item">
                    <a href="{{ route('intern.antrag.index') }}" class="nav-link {{ Request::is('intern/antrag*') ? 'active' : '' }}">
                        <i class="nav-icon fa fa-file"></i>
                        <p>
                            Antrag
                        </p>
                    </a>
                </li>
                @endcan
                <li class="nav-item">
                    <a href="{{ route('intern.zahlung.index') }}" class="nav-link {{ Request::is('intern/zahlung*') ?
                    'active' : '' }}">
                        <i class="nav-icon fa fa-euro"></i>
                        <p>
                            {{ Str::limit('Zahlung', 20) }}
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('intern.user.index') }}" class="nav-link {{ Request::is('intern/user*') ? 'active' : '' }}">
                        <i class="nav-icon fa fa-users"></i>
                        <p>
                            Mitglieder
                        </p>
                    </a>
                </li>
                @endhasanyrole
                @role('Super Admin')
                <li class="nav-item">
                    <a href="{{ route('intern.role.index') }}" class="nav-link {{ Request::is('intern/role*') ? 'active' : '' }}">
                        <i class="nav-icon fa fa-user-tag"></i>
                        <p>
                            Rollen
                        </p>
                    </a>
                </li>
                {{--<li class="nav-item">
                    <a href="{{ route('intern.permission.index') }}" class="nav-link {{ Request::is('intern/permission*') ? 'active' : '' }}">
                        <i class="nav-icon fa fa-key"></i>
                        <p>
                            Berechtigungen
                        </p>
                    </a>
                </li>--}}
                @endrole
                @hasrole('Super Admin')
                <li class="nav-item">
                    <a href="{{ route('intern.miete.index') }}" class="nav-link {{ Request::is('intern/miete*') ? 'active' : '' }}">
                        <i class="nav-icon fa fa-euro"></i>
                        <p>
                            {{ Str::limit('Miete / Mitgliedsbeitrag', 20) }}
                        </p>
                    </a>
                </li>
                @endhasrole
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>

@push('js')
    <script>
        $(document).ready(function () {
            var vorname = $('#vorname').text();
            var nachname = $('#nachname').text();
            var initials = $('#vorname').text().charAt(0) + $('#nachname').text().charAt(0);
            var profileImage = $('#profileImage').text(initials);
        });
    </script>
@endpush
