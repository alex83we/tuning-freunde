@extends('layouts.intern')

@push('css')
    <style>
        .d-table-row:nth-child(even) {
            background: #f6f6f6;
        }

        .d-table-cell {
            width: 20%;
        }

        .d-table-cell a {
            color: #212529;
        }

        @media print {
            /** Verstecke jedes andere Element **/
            body * {
                visibility: hidden;
            }

            /** Anzeigen von Druckcontainerelementen **/
            .print-container, .print-container * {
                visibility: visible;
            }

            /** Passen Sie die Position so an, dass sie immer von oben links beginnt **/
            .print-container {
                position: absolute;
                left: 0px;
                top: 0px;
            }
        }
    </style>
@endpush

@section('breadcrumb-title')
    Team Übersicht
@endsection

@section('breadcrumb')
    {{ Breadcrumbs::render('telefonliste') }}
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
                            <div class="table-responsive print-container">
                                <h4 class="d-inline-block">Telefon & Kontaktliste</h4>
                                <button class="float-right d-inline-block btn btn-link print-btn" onclick="window.print()"><i class="icofont-print"></i> </button>
                                <div class="d-table w-100">
                                    <div class="d-table-row">
                                        <div class="d-table-cell">
                                            <b>Name</b>
                                        </div>
                                        <div class="d-table-cell">
                                            <b>Telefon</b>
                                        </div>
                                        <div class="d-table-cell">
                                            <b>Mobil</b>
                                        </div>
                                        <div class="d-table-cell">
                                            <b>E-Mail</b>
                                        </div>
                                        <div class="d-table-cell">
                                            <b>E-Mail Intern</b>
                                        </div>
                                    </div>
                                    @foreach($teams as $team)
                                        <div class="d-table-row">
                                            <div class="d-table-cell">
                                                @if($team->title != $team->vorname) ({{ $team->title }}) / @endif {{ $team->vorname.' '.$team->nachname }}
                                            </div>
                                            <div class="d-table-cell">
                                                {{ $team->telefon }}
                                            </div>
                                            <div class="d-table-cell">
                                                {{ $team->mobil }}
                                            </div>
                                            <div class="d-table-cell">
                                                <a href="mailto:{{ $team->email }}" target="_blank">{{ $team->email }}</a>
                                            </div>
                                            <div class="d-table-cell">
                                                <a href="mailto:{{ $team->emailIntern }}@thueringer-tuning-freunde.de" target="_blank">{{ $team->emailIntern }}@thueringer-tuning-freunde.de</a>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
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
                "order": [[ 2, "asc" ]],
                "columnDefs": [
                    { "orderable": false,
                        "targets": [0, 5],
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
