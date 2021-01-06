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
    Satzung
@endsection

@section('breadcrumb')
    {{ Breadcrumbs::render('satzung') }}
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
                                <h4 class="d-inline-block">Satzung des nicht eingetragenen Clubs „Thüringer Tuning Freunde“</h4>
                                <button class="float-right d-inline-block btn btn-link print-btn" onclick="window.print()"><i class="icofont-print"></i> </button>
                                <h6 class="text-center font-weight-bold">§ 1 Name und Sitz des Clubs</h6>
                                <ul class="list-unstyled">
                                    <li>1. Der Club führt den Namen „Thüringer Tuning Freunde“</li>
                                    <li>2. Der Club ist ein „nicht eingetragener Verein“</li>
                                <li>3. Der Club hat seinen Sitz unter folgender Adresse:<br>
                                    &nbsp;&nbsp;&nbsp;&nbsp;Rosenstraße 2a<br>
                                    &nbsp;&nbsp;&nbsp;&nbsp;06571 Roßleben</li>
                                </ul>
                                <h6 class="text-center font-weight-bold">§ 2 Zweck des Clubs</h6>
                                <ul class="list-unstyled">
                                    <li>1. Bekämpfung des Markenhasses untereinander und die aufrecht Erhaltung älterer
                                        Fahrzeuge</li>
                                    <li>2. Spaß am Hobby Auto (Tuning, Instandsetzen älterer Fahrzeuge, Schrauben Allgemein)</li>
                                </ul>
                                <h6 class="text-center font-weight-bold">§ 3 Der Clubs erfüllt seine Aufgaben durch</h6>
                                <ul class="list-unstyled">
                                    <li>1. Regelmäßige Fahrten zu Tuning Treffen</li>
                                    <li>2. Mindestens 2 gemeinsame Jährliche Treffen</li>
                                    <li>3. Wechselnde Ausfahrten über das Jahr vereitelt</li>
                                </ul>
                                <h6 class="text-center font-weight-bold">§ 4 Eintragung in das Vereinsregister</h6>
                                <ul class="list-unstyled">
                                    <li>1. Der Club ist nicht im Vereinsregister eingetragen</li>
                                    <li>2. Die erwirtschafteten Einnahmen aus Reparaturen oder der Nutzung der Werkstatt dienen der monatlichen Miete für das Clubhaus und kommen so fern noch was übrigbleibt, dem Club zugute</li>
                                </ul>
                                <h6 class="text-center font-weight-bold">§ 5 Eintritt der Mitglieder</h6>
                                <ul class="list-unstyled">
                                    <li>1. Der Bedarf wird durch die Gründungsmitglieder bestimmt</li>
                                    <li>2. Für eine dauerhafte Mitgliedschaft muss sich der/die
                                        Interessent/Interessentin schriftlich über unsere Homepage an die
                                        Gründungsmitglieder wenden
                                    </li>
                                    <li>3. Eine Aufnahmegebühr wird nicht erhoben</li>
                                    <li>4. Die Mitgliedschaft ist wirksam mit der Bestätigungs E-Mail
                                        (Willkommens-E-Mail durch den Webmaster)
                                    </li>
                                </ul>
                                <h6 class="text-center font-weight-bold">§ 6 Austritt der Mitglieder</h6>
                                <ul class="list-unstyled">
                                    <li>1. Dauerhafte Mitgliedschaften können schriftlich oder mündlich den
                                        Gründungsmitgliedern angezeigt werden. Die formale Mitgliedschaft
                                        endet zum jeweiligen Ende eines Quartals (31.03, 30.06, 30.09 oder
                                        31.12)
                                    </li>
                                </ul>
                                <h6 class="text-center font-weight-bold">§ 7 Mitgliedsbeiträge</h6>
                                <ul class="list-unstyled">
                                    <li>1. Es wird ein Mitgliedsbeitrag von 5 € pro Monat erhoben. Dieser ist fällig zum
                                        15. Des jeweiligen Monats.
                                    </li>
                                    <li>2. Eine Beteiligung an der Werkstatt ist möglich dies ist in 3
                                        Staffeln unterteilt:<br>
                                        &nbsp;&nbsp;&nbsp;&nbsp;25 € Monatlich freie Nutzung im Monat von 10 Stunden der Werkstatt vorher Anzumelden<br>
                                        &nbsp;&nbsp;&nbsp;&nbsp;50 € Monatlich freie Nutzung im Monat von 25 Stunden der Werkstatt vorher Anzumelden<br>
                                        &nbsp;&nbsp;&nbsp;&nbsp;100 € Monatlich freie Nutzung im Monat (für Fahrzeuge naher Familien Angehöriger sind für euch maximal 20 Stunden freie Nutzung vorgesehen)
                                    </li>
                                    <li>3. Über die
                                        Freistunden hinaus kostet euch jede weiter Stunde 5 € die erste
                                        volle Stunde wird voll abgerechnet jede weitere Stunde im ¼
                                        Stunden Takt
                                    </li>
                                    <li>4. Die Mitgliedsbeiträge werden zur Miete und
                                        Aufwandsentschädigung genutzt. Der Mitgliedsbeitrag kann
                                        jährlich durch die Gründungsmitglieder neu bestimmt werden
                                        (Grillen an den zweimal im Jahr stattfindenden Versammlungen)
                                    </li>
                                    <li>5. Die Restlichen Beiträge sind fällig zum 1. Bankarbeitstag Des
                                        jeweiligen Monats.
                                    </li>
                                </ul>
                                <h6 class="text-center font-weight-bold">§ 8 Organe des Clubs</h6>
                                <ul class="list-unstyled">
                                    <li>1. Gründungsmitglieder</li>
                                    <li>2. Clubmitglieder</li>
                                </ul>
                                <h6 class="text-center font-weight-bold">§ 9 Gründungsmitglieder</h6>
                                <ul class="list-unstyled">
                                    <li>Die Gründungsmitglieder des Clubs „Thüringer Tuning Freunde“ besteht aus</li>
                                    <li>1. Den Gründungsmitgliedern (siehe Anlage Gründungsmitglieder)</li>
                                    <li>2. Den Clubmitgliedern (siehe Anlage Clubmitglieder)</li>
                                </ul>
                                <h6 class="text-center font-weight-bold">§ 10 Mitgliederversammlung</h6>
                                <ul class="list-unstyled">
                                    <li>1. Die Mitgliederversammlung erfolgt zweimal im Jahr (Februar und August) und wird min. 4 Wochen vorher angekündigt</li>
                                </ul>
                                <h6 class="text-center font-weight-bold">§ 11 Beschlussfähigkeit des Clubs</h6>
                                <ul class="list-unstyled">
                                    <li>1. Gründungsmitglieder entscheiden über die Alltäglichen Dinge des Clubs</li>
                                </ul>
                                <h6 class="text-center font-weight-bold">§ 12 Beschlussfassung</h6>
                                <ul class="list-unstyled">
                                    <li>1. Es wird per Handzeichen abgestimmt</li>
                                    <li>2. Eines der Clubmitglieder wird vorab zum Protokollführer ernannt</li>
                                    <li>3. Änderungen des Zweckes des Clubs obliegen ausschließlich den Gründungsmitgliedern</li>
                                </ul>
                                <h6 class="text-center font-weight-bold">§ 13 Beurkundung der Versammlungsbeschlüsse</h6>
                                <ul class="list-unstyled">
                                    <li>Über die in den Versammlungen gefassten Beschlüsse ist eine Niederschrift anzulegen und zu archivieren</li>
                                </ul>
                                <h6 class="text-center font-weight-bold">§ 14 Auflösung des Clubs</h6>
                                <ul class="list-unstyled">
                                    <li>1. Der Club „Thüringer Tuning Freunde“ kann ausschließlich durch die Gründungsmitglieder aufgelöst werden.</li>
                                </ul>
                                <h6 class="text-center font-weight-bold">§ 15 Haftung des Clubs</h6>
                                <ul class="list-unstyled">
                                    <li>1. Die Haftung in jeglichen Fragen wird auf die Gründungsmitglieder beschränkt. Eine Haftung der Clubmitglieder besteht nicht. (Nur bei grobfahrlässigen Verletzungen.)</li>
                                    <li>2. Die Haftung ist auf das Clubvermögen (aus Mitgliedsbeiträgen) beschränkt.</li>
                                </ul>
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
