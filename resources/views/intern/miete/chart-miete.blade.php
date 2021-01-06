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

                    <div class="row">

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

                </div>
            </div>
        </div>
    </section>

{{--    @foreach($records as $record)--}}
    {{ $records }}
{{--    @endforeach--}}
@endsection

@push('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js"></script>
    <script src="https://cdn.jsdelivr.net/gh/emn178/chartjs-plugin-labels/src/chartjs-plugin-labels.js"></script>

    <script>
        $(function(){
            //get the pie chart canvas
            var cData = JSON.parse(`<?php echo $name_data; ?>`);
            var ctx = $("#piename-chart");

            //pie chart data
            var data = {
                labels: cData.label,
                datasets: [
                    {
                        label: "Users Count",
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
                        borderWidth: 0.2
                    }
                ]
            };

            //options
            var options = {
                responsive: true,
                title: {
                    display: true,
                    position: "top",
                    text: "Last Week Registered Users -  Day Wise Count",
                    fontSize: 18,
                    fontColor: "#111"
                },
                legend: {
                    display: true,
                    position: "bottom",
                    labels: {
                        fontColor: "#333",
                        fontSize: 16,
                    }
                },
                plugins: {
                    labels: {
                        render: 'value',
                        arc: true,
                        position: 'inside'
                    }
                }
            };

            //create Pie Chart class object
            var chart1 = new Chart(ctx, {
                type: "line",
                data: data,
                options: options
            });

        });
    </script>

@endpush
