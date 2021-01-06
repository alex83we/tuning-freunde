@extends('layouts.intern')

@push('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.css" />
@endpush

@section('breadcrumb-title')
    Miete Übersicht
@endsection

@section('breadcrumb')
    {{ Breadcrumbs::render('miete') }}
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

                    @hasanyrole('Super Admin|Admin')
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header bg-dark text-center font-weight-bold">
                                    Buchung
                                </div>
                                <div class="card-body">
                                    <form action="{{ route('intern.miete.store') }}" method="POST">
                                        @csrf
                                        <div class="form-row">
                                            <div class="form-group col-lg-3">
                                                <label for="name">Name:</label>
                                                <select class="custom-select custom-select-sm" name="name" id="name">
                                                    <option selected disabled>-- Bitte wähle ein Mitglied aus --</option>
                                                    @foreach($teams as $team)
                                                        <option value="{{ $team->vorname.' '.$team->nachname }}">{{ $team->vorname.' '.$team->nachname }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <div class="form-group col-lg-3">
                                            <label for="verwendungszweck">Verwendungszweck:</label>
                                            <select class="custom-select custom-select-sm" name="verwendungszweck" id="verwendungszweck">
                                                <option selected disabled>-- Bitte wähle einen Verwendungszweck aus --</option>
                                                <option value="Miete">Miete</option>
                                                <option value="Mitgliedsbeitrag">Mitgliedsbeitrag</option>
                                            </select>
                                            </div>
                                            <div class="form-group col-lg-3">
                                                <label for="summe">Summe:</label>
                                                    <input type="text" class="form-control form-control-sm" name="summe" id="summe" data-inputmask-inputformat="999.99" placeholder="Summe">
                                            </div>
                                            <div class="form-group col-lg-3">
                                                <label for="zahlungsdatum" class="font-weight-bold">Monat:</label>
                                                <select class="custom-select custom-select-sm" name="zahlungsdatum" id="zahlungsdatum">
                                                    @foreach($getMonth as $monat)
                                                        <option value="{{ \Carbon\Carbon::parse($monat) }}">{{ \Carbon\Carbon::parse($monat)->monthName }}</option>
                                                    @endforeach
                                                </select>
                                                {{--<input type="text" id="zahlungsdatum" name="zahlungsdatum"
                                                       class="form-control form-control-sm @error ('zahlungsdatum') is-invalid @enderror"
                                                       value="{{ date('d.m.Y') }}"
                                                       data-inputmask-alias="datetime" data-inputmask-inputformat="dd.mm.yyyy" data-mask
                                                       maxlength="10">--}}
                                            </div>
                                        </div>
                                        <button class="btn btn-sm btn-success float-lg-right" type="submit">Speichern</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endhasanyrole

                    <div class="row">
                        <div class="col-lg-6">
                            <div class="card">
                                <div class="card-header border-0">
                                    <div class="d-flex justify-content-between">
                                        <h3 class="card-title">Miete / Mitgliedsbeitrag</h3>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <canvas id="pie-chart"></canvas>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="card">
                                <div class="card-header border-0">
                                    <div class="d-flex justify-content-between">
                                        <h3 class="card-title">Miete / Mitgliedsbeitrag</h3>
                                    </div>
                                </div>
                                <div class="card-body">
                                    <canvas id="piename-chart"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header bg-dark text-center font-weight-bold">
                            Miete für Werkstatt / Mitgliedsbeitrag
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="miete-uebersicht" class="table table-bordered table-hover w-100">
                                    <thead>
                                    <tr class="align-middle">
                                        <th>Name</th>
{{--                                        <th>Monat</th>--}}
                                        @hasanyrole('Super Admin|Admin')
                                        <th>Bezahlt</th>
                                        @endhasanyrole
{{--                                        <th>Bezahlt am:</th>--}}
                                        @hasanyrole('Super Admin|Admin')
                                        <th style="width: 150px;">Aktion</th>
                                        @endhasanyrole
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($mieten as $monat => $miete)
                                        @hasanyrole('Super Admin|Admin')
                                        <tr class="align-middle">
                                            <td colspan="5" class="text-center font-weight-bold">{{ $monat }}</td>
                                        </tr>
                                        @else
                                        <tr class="align-middle">
                                            <td colspan="4" class="text-center font-weight-bold">{{ $monat }}</td>
                                        </tr>
                                        @endhasanyrole
                                        @foreach($miete as $item)
                                            @if($item->verwendungszweck == 'Miete')
                                            <tr class="align-middle">
                                                <td>{{ $item->name }}</td>
{{--                                                <td>{{ Carbon\Carbon::parse($item->zahlungsdatum)->monthName }}</td>--}}
                                                @hasanyrole('Super Admin|Admin')
                                                <td>{{ $item->summe.' €' }}</td>
                                                @endhasanyrole
{{--                                                <td>{{ Carbon\Carbon::parse($item->zahlungsdatum)->monthName }}</td>--}}
                                                @hasanyrole('Super Admin|Admin')
                                                <td class="text-center">
                                                    <button type="button" class="btn btn-xs btn-success" data-toggle="modal" data-target="#buchung-{{$item->id}}">
                                                        <i class="icofont-edit"></i> Ändern
                                                    </button>
                                                </td>
                                                @endhasanyrole
                                            </tr>
                                            @else
                                            <tr class="align-middle" style="background-color: #0b5394; color: white;">
                                                <td>{{ $item->name }}</td>
{{--                                                <td>{{ Carbon\Carbon::parse($item->zahlungsdatum)->monthName }}</td>--}}
                                                @hasanyrole('Super Admin|Admin')
                                                <td>{{ $item->summe.' €' }}</td>
                                                @endhasanyrole
{{--                                                <td>{{ Carbon\Carbon::parse($item->zahlungsdatum)->isoFormat('DD.MM.YYYY') }}</td>--}}
                                                @hasanyrole('Super Admin|Admin')
                                                <td class="text-center">
                                                    <button type="button" class="btn btn-xs btn-success" data-toggle="modal" data-target="#buchung-{{$item->id}}">
                                                        <i class="icofont-edit"></i> Ändern
                                                    </button>
                                                </td>
                                                @endhasanyrole
                                            </tr>
                                            @endif
                                        @endforeach
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <!-- Modal -->
        @foreach($mieten as $monat => $miete)
            @foreach($miete as $item)
                <form action="{{ route('intern.miete.update', $item->id) }}" method="POST">
                    @csrf
                    @method('PATCH')
                    <div class="modal fade" id="buchung-{{$item->id}}" tabindex="-1" role="dialog"
                         aria-labelledby="buchungLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="buchungLabel">Buchung bearbeiten</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <div class="form-row">
                                        <div class="form-group col-lg-6">
                                            <label for="name">Name:</label>
                                            <select class="custom-select custom-select-sm" name="name" id="name">
                                                <option value="{{ $item->name }}" selected>{{ $item->name }}</option>
                                                @foreach($teams as $team)
                                                    <option value="{{ $team->vorname.' '.$team->nachname }}">{{ $team->vorname.' '.$team->nachname }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        {{--<div class="form-group col-lg-6">
                                            <label for="verwendungszweck">Verwendungszweck:</label>
                                            <select class="custom-select custom-select-sm" name="verwendungszweck" id="verwendungszweck">
                                                <option value="Miete">Miete</option>
                                                <option value="Mitgliedsbeitrag">Mitgliedsbeitrag</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-row">--}}
                                        <div class="form-group col-lg-6">
                                            <label for="summe">Summe:</label>
                                            <input type="text" class="form-control form-control-sm" name="summe" id="summe" data-inputmask-inputformat="999.99" value="{{ $item->summe }}" placeholder="Summe">
                                        </div>
                                        <div class="form-group col-lg-6">
                                            {{--<label for="zahlungsdatum" class="font-weight-bold">Zahlungsdatum:</label>
                                            <select class="custom-select custom-select-sm" name="zahlungsdatum" id="zahlungsdatum">
                                                @foreach($getMonth as $monat)
                                                    <option value="{{ \Carbon\Carbon::parse($monat) }}">{{ \Carbon\Carbon::parse($monat)->monthName }}</option>
                                                @endforeach
                                            </select>--}}
                                            {{--<input type="text" id="zahlungsdatum" name="zahlungsdatum"
                                                   class="form-control form-control-sm @error ('zahlungsdatum') is-invalid @enderror"
                                                   value="{{ Carbon\Carbon::parse($item->zahlungsdatum)->isoFormat('DD.MM.YYYY') }}"
                                                   data-inputmask-alias="datetime" data-inputmask-inputformat="dd.mm.yyyy" data-mask
                                                   maxlength="10">--}}
                                        </div>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">
                                        Schließen
                                    </button>
                                    <button type="submit" class="btn btn-sm btn-primary">Speichern</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            @endforeach
        @endforeach
    </section>

@endsection

@push('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#summe').inputmask('9.9{3} €', { numericInput: true });
            $('#zahlungsdatum').inputmask('dd.mm.yyyy', {'placeholder': 'dd.mm.yyyy'});
        });
    </script>

    <script>
        $(function () {
            //Holen Sie sich die Kreisdiagramm Leinwand
            var cData = JSON.parse(`<?php echo $chart_data; ?>`);
            var ctx = $("#pie-chart");

            // Kreisdiagrammdaten
            var data = {
                labels: cData.label,
                datasets: [
                    {
                        label: 'Miete',
                        data: cData.data,
                        backgroundColor: [
                            "rgba(255, 68, 0, 0.2)",
                            "rgba(204, 156, 0, 0.2)",
                            "rgba(124, 0, 163, 0.2)",
                            "rgba(0, 114, 86, 0.2)",
                            "rgba(68, 0, 17, 0.2)",
                            "rgba(117, 0, 29, 0.2)",
                            "rgba(204, 54, 0, 0.2)",
                            "rgba(163, 124, 0, 0.2)",
                            "rgba(86, 0, 114, 0.2)",
                            "rgba(0, 68, 51, 0.2)",
                            "rgba(40, 0, 10, 0.2)",
                            "rgba(158, 76, 96, 0.2)",
                        ],
                        borderColor: [
                            "rgba(255, 68, 0, 1)",
                            "rgba(204, 156, 0, 1)",
                            "rgba(124, 0, 163, 1)",
                            "rgba(0, 114, 86, 1)",
                            "rgba(68, 0, 17, 1)",
                            "rgba(117, 0, 29, 1)",
                            "rgba(204, 54, 0, 1)",
                            "rgba(163, 124, 0, 1)",
                            "rgba(86, 0, 114, 1)",
                            "rgba(0, 68, 51, 1)",
                            "rgba(40, 0, 10, 1)",
                            "rgba(158, 76, 96, 1)",
                        ],
                        borderWidth: 1
                    }
                ]
            };

            //options
            var options = {
                responsive: true,
                title: {
                    display: true,
                    position: "top",
                    text: "Mietzahlungen - Monatsübersicht",
                    fontSize: 18,
                    fontColor: "#111"
                },
                legend: {
                    display: false,
                    position: "bottom",
                    labels: {
                        fontColor: "#aaa",
                        fontSize: 16
                    }
                },
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            };

            //create Pie Chart class object
            var chart1 = new Chart(ctx, {
                type: "bar",
                data: data,
                options: options
            });
        });;
    </script>

@endpush
