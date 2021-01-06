@extends('layouts.intern')

@push('css')
    <link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css">
@endpush

@section('breadcrumb-title')
    Team Übersicht
@endsection

@section('breadcrumb')
    {{ Breadcrumbs::render('team') }}
@endsection

@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">

            {{--<div class="row">
                <div class="col-lg-12 mb-4">
                    <div class="control-toolbar">
                        <div class="toolbar-item">
                            <div class="toolbar">
                                <a href="{{ route('intern.galerie.create') }}" class="btn btn-sm btn-primary px-3"><i class="icofont-plus"></i> Erstellen</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>--}}

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="team-uebersicht" class="table table-bordered table-hover w-100">
                                    <thead>
                                    <tr>
                                        <th style="width: 50px;">ID</th>
                                        <th style="width: 100px;">Name</th>
                                        <th>Wohnort</th>
                                        <th>Private E-Mail</th>
                                        <th>Mitglied seit</th>
                                        {{--@hasanyrole('Super Admin|Admin')
                                        <th>Zahlung</th>
                                        @endhasanyrole--}}
                                        <th>Letzter Login</th>
                                        <th style="width: 300px;">Aktion</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @if(count($teams) > 0)
                                        @foreach ($teams as $key=>$team)
                                            @if ($team->aktiv == true)
                                                @if($team->fahrzeug_id == true or $team->fahrzeugvorhanden == true)
                                                    <tr class="align-middle">
                                                        <td id="team" href="{{ route('intern.team.show', $team->slug) }}">{{ ++$key }}</td>
                                                        <td id="team" href="{{ route('intern.team.show', $team->slug) }}">{{ $team->title }}</td>
                                                        <td id="team" href="{{ route('intern.team.show', $team->slug) }}">{{ $team->plz.' '.$team->wohnort }}</td>
                                                        <td id="team" href="{{ route('intern.team.show', $team->slug) }}">{{ $team->email }}</td>
                                                        <td id="team" href="{{ route('intern.team.show', $team->slug) }}">
                                                            {{ \Carbon\Carbon::parse($team->published_at)->isoFormat('DD.MM.YYYY') }}
                                                        </td>
                                                        {{--@hasanyrole('Super Admin|Admin')
                                                        <td id="team" href="{{ route('intern.team.show', $team->slug)
                                                         }}">
                                                            @foreach($team->miete_mitgliedsbeitrag as $miete)
                                                                {{ number_format($miete->betrag, 2, ',', '.').' €' }}
                                                            @endforeach
                                                        </td>
                                                        @endhasanyrole--}}
                                                        <td id="team" href="{{ route('intern.team.show', $team->slug) }}">
                                                            @foreach(\App\User::where('id', '=', $team->user_id)->get() as $user)
                                                                @if($user->last_login_at == true)
                                                                {{ \Carbon\Carbon::parse($user->last_login_at)->isoFormat('DD.MM.YYYY') }}
                                                                @else
                                                                    War noch nie eingeloggt!
                                                                @endif
                                                            @endforeach
                                                        </td>
                                                        <td>
                                                            <a href="{{ route('frontend.team.show', $team->slug) }}"><i class="icofont-eye"></i> Ansehen</a>
                                                            @can('team-edit')
                                                                @if($team->user_id == auth()->user()->id)
                                                                   | <a href="{{ route('frontend.team.edit', $team->slug) }}"><i class="icofont-edit"></i> Bearbeiten</a>
                                                                @endif
                                                            @endcan
                                                            {{--@hasanyrole('Super Admin|Admin')
                                                            | <a href="{{ route('intern.team.edit', $team->slug) }}" title="Miete oder Mitgliedsbeitrag einfügen!"><i class="icofont-euro"></i> Betrag</a>
                                                            @endhasanyrole--}}
                                                        </td>
                                                    </tr>
                                                @endif
                                            @endif
                                        @endforeach
                                    @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

@push('js')
    <script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.21/js/jquery.dataTables.js"></script>
    <script type="text/javascript" charset="utf8" src="//cdn.datatables.net/1.10.21/js/dataTables.bootstrap4.min.js"></script>
    <script>
        $(document).ready(function () {
            $("#team-uebersicht").DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": true,
                "ordering": true,
                "info": true,
                "responsive": true,
                "autoWidth": false,
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/German.json"
                },
                "order": [[ 0, "asc" ]],
                "columnDefs": [
                    { "orderable": false,
                        "targets": [5],
                    },
                ]
            });
        });

        $('#team-uebersicht #team').css("cursor", "pointer");
        $('#team-uebersicht #team').click(function () {
            var link = $(this).attr('href');
            open(link, '_self')
        });
    </script>
@endpush
