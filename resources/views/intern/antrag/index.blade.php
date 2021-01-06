@extends('layouts.intern')

@push('css')
<link rel="stylesheet" type="text/css" href="//cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css">
@endpush

@section('breadcrumb-title')
Antrag Übersicht
@endsection

@section('breadcrumb')
{{ Breadcrumbs::render('antrag') }}
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
                            <table id="antrag-uebersicht" class="table table-bordered table-hover w-100">
                                <thead>
                                <tr>
                                    <th style="width: 50px;">ID</th>
                                    <th style="width: 100px;">IP Adresse</th>
                                    <th>Antragsteller</th>
                                    <th>Gespeicherte Daten</th>
                                    <th style="width: 250px;">Erstellt am</th>
                                    <th>Aktion</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if(count($antrags) > 0)
                                    @foreach ($antrags as $antrag)
                                        @if($antrag->fahrzeug_id == true or $antrag->fahrzeugvorhanden == true)
                                            <tr class="align-middle">
                                                <td id="antrag" href="{{ route('intern.antrag.show', $antrag->id) }}">{{ $antrag->id }}</td>
                                                <td id="antrag" href="{{ route('intern.antrag.show', $antrag->id) }}">{{ $antrag->ip_adresse }}</td>
                                                <td id="antrag" href="{{ route('intern.antrag.show', $antrag->id) }}">{{ $antrag->anrede.' '.$antrag->vorname.' '.$antrag->nachname }}</td>
                                                <td id="antrag" href="{{ route('intern.antrag.show', $antrag->id) }}">Anrede, Vorname, Nachname, Straße, PLZ, Ort, Telefon, Mobil, eMail, Geburtsdatum, Beruf, Facebook, Twitter, Instagram, Beschreibung, Profilbild</td>
                                                <td id="antrag" href="{{ route('intern.antrag.show', $antrag->id) }}">{{ \Carbon\Carbon::parse($antrag->created_at)->isoFormat('ddd, DD. MMMM YYYY HH:mm:ss') }}</td>
                                                <td class="text-center align-middle">
                                                    @if($antrag->aktiv == 0)
                                                        <i class="fa fa-times text-danger"></i>
                                                    @else
                                                        <i class="fa fa-check text-success"></i>
                                                    @endif
                                                </td>
                                            </tr>

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
            $("#antrag-uebersicht").DataTable({
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
                "order": [[ 0, "DESC" ]],
                "columnDefs": [
                    { "orderable": false,
                        "targets": [5],
                    },
                ]
            });
        });

        $('#antrag-uebersicht #antrag').css("cursor", "pointer");
        $('#antrag-uebersicht #antrag').click(function () {
            var link = $(this).attr('href');
            open(link, '_self')
        });
    </script>
@endpush
