@extends('layouts.intern')

@push('css')
    <style>
        .d-table-row:nth-child(even) {
            background: #f6f6f6;
        }

        .d-table-cell {
            width: 20%;
            padding: 5px 10px;
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
    Geburtstagsliste
@endsection

@section('breadcrumb')
    {{ Breadcrumbs::render('geburtstagsliste') }}
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
                                <h4 class="d-inline-block">Geburtagsliste</h4>
                                <button class="float-right d-inline-block btn btn-link print-btn" onclick="window.print()"><i class="icofont-print"></i> </button>
                                <div class="d-table w-100">
                                    <div class="d-table-row">
                                        <div class="d-table-cell">
                                            <b>Name</b>
                                        </div>
                                        <div class="d-table-cell">
                                            <b>Geburtstag</b>
                                        </div>
                                        <div class="d-table-cell">
                                            <b>Alter</b>
                                        </div>
                                    </div>
                                    @foreach($teams as $team)
                                        @if (\Carbon\Carbon::parse($team->geburtsdatum)->isoFormat('DD.MM') == date('d.m'))
                                            <div class="d-table-row">
                                                <div class="d-table-cell bg-success" style="color: black !important;">
                                                    @if($team->title != $team->vorname) ({{ $team->title }}) / @endif {{ $team->vorname.' '.$team->nachname }}
                                                </div>
                                                <div class="d-table-cell bg-success" style="color: black !important;">
                                                    {{ $team->geburtsdatum }} Happy Birthday
                                                </div>
                                                <div class="d-table-cell bg-success" style="color: black !important;">
                                                    <?php
                                                        date_default_timezone_set("Europe/Berlin");
                                                        $geburtsdatum = $team->geburtsdatum;
                                                        $datum1 = new DateTime($geburtsdatum);
                                                        $datum2 = new DateTime(date('d').'-'.date('m').'-'.date('Y'));
                                                        $interval = $datum2->diff($datum1);
                                                        $geburtsdatum = ($interval->format('%Y Jahre'));
                                                        $team->gebdatum = $geburtsdatum;
                                                    ?>
                                                    {{ $team->gebdatum }}
                                                </div>
                                            </div>
                                        @else
			                                <div class="d-table-row">
				                                <div class="d-table-cell">
					                                @if($team->title != $team->vorname) ({{ $team->title }})
					                                                                    / @endif {{ $team->vorname.' '.$team->nachname }}
				                                </div>
				                                <div class="d-table-cell">
					                                {{ $team->geburtsdatum }}
				                                </div>
				                                <div class="d-table-cell">
													<?php
													date_default_timezone_set("Europe/Berlin");
													$geburtsdatum = $team->geburtsdatum;
													$datum1 = new DateTime($geburtsdatum);
													$datum2 = new DateTime(date('d') . '-' . date('m') . '-' . date('Y'));
													$interval = $datum2->diff($datum1);
													$geburtsdatum = ($interval->format('%Y Jahre'));
													$team->gebdatum = $geburtsdatum;
													?>
					                                {{ $team->gebdatum }}
				                                </div>
			                                </div>
                                        @endif
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

@endpush
