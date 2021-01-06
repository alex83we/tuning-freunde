@extends('layouts.intern')

@push('css')
    <style>
        .title-value h4 {
            font-size: 12px;
            text-transform: uppercase;
            color: #666;
            margin: 0;
        }

        .report-widget .title-value p {
            font-weight: 100;
            /*font-size: 40px;*/
        }

        .report-widget h3 {
            padding-left: 0;
            -webkit-transition: padding 0.2s;
            transition: 0.2s;
            font-size: 14px;
            color: #7e8c8d;
            text-transform: uppercase;
            font-weight: 600;
            margin-top: 0;
            margin-bottom: 30px;
        }

        .title-value p {
            color: #666;
            margin: 0;
            font-size: 26px;
            line-height: 41px;
        }

        .title-value p.description {
            color: #999;
            font-weight: 300;
            line-height: 100%;
            font-size: 13px;
        }
    </style>
@endpush

@section('breadcrumb-title')
    Dashboard
@endsection

@section('breadcrumb')
    {{ Breadcrumbs::render('dashboard') }}
@endsection

@section('content')
    <!-- Main content -->
    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="report-widget">
                                        <h3 style="margin-bottom: 5px;"><i class="icofont-key"></i> Letzte Anmeldungen</h3>
                                        @foreach($logins as $item)
                                            <div class="float-left scoreboard-item title-value"
                                                 style="margin: 20px 20px 0 0; width: 231px;">
                                                <h4>{{ \Carbon\Carbon::parse($item->created_at)->isoFormat('DD.MM.YYYY HH:mm:ss') }}</h4>
                                                <p>
                                                    <a href=""
                                                       class="text-decoration-none">{{ $item->vorname.' '.$item->nachname }}</a>
                                                </p>
                                                <p class="description"><a href="https://www.dein-ip-check.de/suche/?ip={{ $item->ip_addresse }}" target="_blank" style="color: #666666;">{{ $item->ip_addresse }}</a></p>
                                            </div>
                                        @endforeach

                                    </div>
                                </div>
                            </div>

                            <div class="card">
                                <div class="card-body">
                                    <div class="report-widget">
                                        <h3 style="margin-bottom: 5px;"><i class="icofont-car"></i> Deine Fahrzeuge</h3>

                                        <div class="table-responsive">
                                        <table width="100%">
                                            <tr>
                                                <th>ID</th>
                                                <th>Fahrzeug</th>
                                                <th>Bild</th>
                                                <th>Aktion</th>
                                            </tr>

                                            @foreach($teams as $team)
                                                @if($team->user_id == auth()->user()->id)
                                                    @if($team->fahrzeugvorhanden == false)
                                                        @foreach($team->fahrzeuges as $fahrzeuge)
                                                            @if($fahrzeuge->user_id == auth()->user()->id)
                                                                <tr>
                                                                    <td>{{ $fahrzeuge->id }}</td>
                                                                    <td>{{ $fahrzeuge->fahrzeug }}</td>
                                                                    <td>
                                                                        @if($fahrzeuge->images == 'default.png')
                                                                            <img
                                                                                src="{{ \Illuminate\Support\Facades\Storage::disk('public')->url('default.png') }}"
                                                                                class="img-thumbnail"
                                                                                style="border-radius: 50%; width: 75px;">
                                                                    </td>
                                                                    @else
                                                                        <img
                                                                            src="{{ \Illuminate\Support\Facades\Storage::disk('public')->url('images/'.$fahrzeuge->slug.'/thumbnails/'.$fahrzeuge->images) }}"
                                                                            class="img-thumbnail"
                                                                            style="border-radius: 50%; width: 75px;"></td>
                                                                    @endif
                                                                    <td>
                                                                        <a href="{{ route('frontend.fahrzeuge.show', $fahrzeuge->slug) }}"
                                                                           class="btn btn-sm btn-info"><i
                                                                                class="icofont-eye"></i>
                                                                        </a>
                                                                        <a href="{{ route('frontend.fahrzeuge.edit', $fahrzeuge->slug) }}"
                                                                           class="btn btn-sm btn-success"><i
                                                                                class="icofont-edit"></i> </a>
                                                                        <form
                                                                            action="{{ route('frontend.fahrzeuge.destroy', $fahrzeuge->slug) }}"
                                                                            method="post" class="d-inline">
                                                                            @csrf
                                                                            @method('DELETE')
                                                                            <input type="hidden" name="id"
                                                                                   value="{{ $fahrzeuge->id }}">
                                                                            <input type="hidden" name="slug"
                                                                                   value="{{ $fahrzeuge->slug }}">
                                                                            <button type="submit"
                                                                                    class="btn btn-sm btn-danger">
                                                                                <i
                                                                                    class="icofont-trash"></i></button>
                                                                        </form>
                                                                    </td>
                                                                </tr>
                                                            @endif
                                                        @endforeach
                                                    @else
                                                    <tr>
                                                        <td colspan="4" class="text-center">
                                                            Kein Fahrzeug vorhanden
                                                        </td>
                                                    </tr>
                                                    @endif
                                                @endif
                                            @endforeach

                                        </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
	
	                        
		                    <div class="card">
		                        <div class="card-body">
		                            <div class="report-widget">
		                                <h3 style="margin-bottom: 5px;"><i class="fas fa-birthday-cake"></i> Geburtstage im {{ \Carbon\Carbon::now()->isoFormat('MMMM YYYY') }}</h3>
			
			                            @foreach($teamsAll as $team)
				                            @if (\Carbon\Carbon::parse($team->geburtsdatum)->isoFormat('DD.MM') == date('d.m'))
				                                <div class="text-center">
				                                    <h2 class="text-center">Alles Gute<br> @if($team->title != $team->vorname) ({{ $team->title }}) / @endif {{ $team->vorname.' '.$team->nachname }}
				                                        <br>zum @php
				                                        date_default_timezone_set("Europe/Berlin");
				                                        $geburtsdatum = $team->geburtsdatum;
				                                        $datum1 = new DateTime($geburtsdatum);
				                                        $datum2 = new DateTime(date('d').'-'.date('m').'-'.date('Y'));
				                                        $interval = $datum2->diff($datum1);
				                                        $geburtsdatum = ($interval->format('%Y. Geburtstag'));
				                                        $team->gebdatum = $geburtsdatum;
				                                        @endphp
				                                        {{ $team->gebdatum }}
				                                    </h2>
				                                </div>
				                            @else
												@if (\Carbon\Carbon::parse($team->geburtsdatum)->isoFormat('MM') == date('m'))
					                            <div class="row">
													<div class="col-12">
														<div class="d-table-row">
															<div class="d-table-cell">
																<strong>Name: </strong>
															</div>
															<div class="d-table-cell">
																&nbsp; @if($team->title != $team->vorname)
																({{ $team->title }})
																/ @endif {{ $team->vorname.' '.$team->nachname }}
															</div>
														</div>
														<div class="d-table-row">
															<div class="d-table-cell">
																<strong>Geburtstag: </strong>
															</div>
															<div class="d-table-cell">
																&nbsp; {{ $team->geburtsdatum }}
															</div>
														</div>
														<div class="d-table-row">
															<div class="d-table-cell">
																<strong>Alter: </strong>
															</div>
															<div class="d-table-cell">
																<?php
																date_default_timezone_set("Europe/Berlin");
																$geburtsdatum = $team->geburtsdatum;
																$datum1 = new DateTime($geburtsdatum);
																$datum2 = new DateTime(date('d') . '-' . date('m') . '-' . date('Y'));
																$datum3 = date_add($datum2,
                                                                    date_interval_create_from_date_string('1 Years'));
																$interval = $datum3->diff($datum1);
																$geburtsdatum = ($interval->format('wird %Y Jahre alt'));
																$team->gebdatum = $geburtsdatum;
																?>
																&nbsp; {{ $team->gebdatum }}
															</div>
														</div>
														<div class="d-table-row">
															<div class="d-table-cell">&nbsp;
															</div>
														</div>
													</div>
					                            </div>
												@endif
				                            @endif
			                            @endforeach
		                            </div>
		                        </div>
		                    </div>

                        </div>

                        <div class="col-lg-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="report-widget">
                                        <h3 style="margin-bottom: 5px;"><i class="icofont-users"></i> Die letzten 6 neuen Teammitglieder</h3>

                                        <div class="table-responsive">
                                        <table width="100%">
                                            <tr>
                                                <th class="w-25">Name</th>
                                                <th class="w-25">Fahrzeug</th>
                                                <th class="w-25">letzter login</th>
                                                @hasanyrole('Super Admin|Admin')
                                                <th class="w-25">IP Adresse</th>
                                                @endhasanyrole
                                            </tr>
                                            @foreach($mitglieder as $team)
                                            <tr>
                                                <td class="w-25"><a href="{{ url('team',$team->slug) }}" target="_self">{{ $team->vorname.' '.$team->nachname }}</a></td>
                                                <td class="w-25">
                                                    @if(\App\Models\Frontend\Fahrzeuge\Fahrzeuge::where('user_id', '=', $team->user_id)->first() == true)
                                                        @foreach(\App\Models\Frontend\Fahrzeuge\Fahrzeuge::where('user_id', '=', $team->user_id)->get() as $fahrzeug)
                                                            <a href="{{ url('fahrzeuge',$fahrzeug->slug) }}"
                                                               target="_self">{{ $fahrzeug->fahrzeug }}</a>
                                                        @endforeach
                                                    @else
                                                        Kein Fahrzeug vorhanden
                                                    @endif
                                                </td>
                                                <td class="w-25">
                                                    @foreach(\App\User::where('id', '=', $team->user_id)->get() as $user)
                                                        @if($user->last_login_at)
                                                            {{ \Carbon\Carbon::parse($user->last_login_at)->isoFormat('DD.MM.YYYY') }}
                                                        @else
                                                            War noch nie eingeloggt!
                                                        @endif
                                                    @endforeach
                                                </td>
                                                @hasanyrole('Super Admin|Admin')
                                                @foreach(\App\User::where('id', '=', $team->user_id)->get() as $user)
                                                    <td class="w-25"><a href="https://www.dein-ip-check.de/suche/?ip={{ $user->last_login_ip }}" target="_blank">{{ $user->last_login_ip }}</a></td>
                                                @endforeach
                                                @endhasanyrole
                                            </tr>
                                            @endforeach
                                        </table>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- /.card -->

                            <div class="card">
                                <div class="card-body">
                                    <div class="report-widget">
                                        <h3 style="margin-bottom: 5px;"><i class="icofont-image"></i> Deine Alben</h3>

                                        <div class="table-responsive">
                                        <table width="100%">
                                            <tr>
                                                <th>ID</th>
                                                <th>Title</th>
                                                <th>Bild</th>
                                                <th>Aktion</th>
                                            </tr>
                                            @foreach($teams as $team)
                                                @if($team->user_id == auth()->user()->id)
                                                    @if(\App\Models\Frontend\Album\Album::where('user_id', '=', $team->user_id)->first() == true)
                                                        @foreach(\App\Models\Frontend\Album\Album::where('user_id', '=', $team->user_id)->get() as $album)
                                                            @if($album->user_id == auth()->user()->id)
                                                                <tr>
                                                                    <td>{{ $album->id }}</td>
                                                                    <td><a href="{{ url('galerie',$album->slug) }}"
                                                                           target="_self">{{ $album->title }}</a></td>
                                                                    <td><img
                                                                            src="{{ \Illuminate\Support\Facades\Storage::disk('public')->url('images/'.$album->slug.'/thumbnails/'.$album->images) }}"
                                                                            class="img-thumbnail"
                                                                            style="border-radius: 50%; width: 75px;">
                                                                    </td>
                                                                    <td>
                                                                        <a href="{{ route('frontend.galerie.show', $album->slug) }}"
                                                                           class="btn btn-sm btn-info"><i
                                                                                class="icofont-eye"></i>
                                                                        </a>
                                                                        <a href="{{ route('frontend.galerie.edit', $album->slug) }}"
                                                                           class="btn btn-sm btn-success"><i
                                                                                class="icofont-edit"></i> </a>
                                                                        <form
                                                                            action="{{ route('frontend.galerie.destroy', $album->slug) }}"
                                                                            method="POST"
                                                                            style="display: inline;" class="d-inline">
                                                                            @csrf
                                                                            @method('DELETE')
                                                                            <button class="btn btn-sm btn-danger"><i
                                                                                    class="icofont-trash"></i> Album
                                                                                löschen
                                                                            </button>
                                                                        </form>
                                                                    </td>
                                                                </tr>
                                                            @else
                                                                <tr>
                                                                    <td colspan="4" class="text-center">
                                                                        Kein Album vorhanden
                                                                    </td>
                                                                </tr>
                                                            @endif
                                                        @endforeach
                                                    @endif
                                                @endif
                                            @endforeach
                                        </table>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <div class="col-lg-6">
                        </div>

                        <div class="col-lg-6">

                        </div>
                    </div>

                </div>

            </div>
            <!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
@endsection

@push('js')

@endpush
