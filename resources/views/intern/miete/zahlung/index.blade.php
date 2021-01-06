@extends('layouts.intern')

@push('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.css" />
@endpush

@section('breadcrumb-title')
    Zahlungs Übersicht
@endsection

@section('breadcrumb')
    {{ Breadcrumbs::render('zahlung') }}
@endsection

@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">

            <div class="row">
                <div class="col-lg-12">
                    @hasanyrole('Super Admin|Admin')
                    {{--<div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header bg-dark text-center font-weight-bold">
                                    Zahlung
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        @foreach($team as $mitglied)
                                            @foreach($mitglied->miete_mitgliedsbeitrag as $miete)
                                                @if($mitglied->aktiv == true)
                                                    <div class="col-lg-2">
                                                        @if($mitglied->funktion == 'Gründungsmitglied')<span
                                                                class="font-weight-bolder text-danger">{{
                                                            $mitglied->vorname }} {{
                                                            $mitglied->nachname }}</span>@else<span
                                                                class="font-weight-bold">{{ $mitglied->vorname }} {{
                                                            $mitglied->nachname }}</span>@endif {{ '('
                                                            . number_format($miete->betrag, 2, ',', '.') .' €)' }}
                                                            <br>
                                                        <span>Mitglied seit: </span>{{ \Carbon\Carbon::parse
                                                    ($mitglied->published_at)->isoFormat('DD.MM.YYYY') }}<br>
                                                        @if($miete->type == 'Miete')
                                                            <div>
                                                                Zahlt: <b class="text-success">{{ $miete->type }}</b>
                                                        </div>
                                                        @else
                                                                <div>
                                                                    Zahlt: <b class="text-primary">{{ $miete->type }}</b>
                                                                </div>
                                                        @endif
                                                        @if(true)
                                                            <span>Letzte Zahlung: </span> <b>@foreach($zahlung as
                                                            $zahlungMiete) @if($zahlungMiete->team_id == $mitglied->id) {{
                                                            \Carbon\Carbon::parse($zahlungMiete->last_paid)
                                                            ->isoFormat('DD.MM.YYYY')
                                                            }} @endif @endforeach</b><br>
                                                        @endif
                                                        <form method="POST"
                                                              action="{{ route('intern.zahlung.store') }}">
                                                            @csrf
                                                            <input type="hidden" name="id"
                                                                   value="{{ $mitglied->id }}">
                                                            <input type="hidden" name="betrag"
                                                                   value="{{ $miete->betrag }}">
                                                            <input type="hidden" name="type"
                                                                   value="{{ $miete->type }}">
                                                            <input type="hidden" name="last_paid"
                                                                   value="{{ $miete->last_paid }}">
                                                            <div class="form-group">
                                                                <select class="form-control form-control-sm" name="month" id="month">
                                                                    @for($i = 1; $i <=12; $i++)
                                                                        @if($zahlungMiete->team_id == $mitglied->id)
                                                                            @if($zahlungMiete->month_year == \Carbon\Carbon::parse(now())->month)
                                                                                <option value="{{ $i }}"
                                                                                        @if ($i == \Carbon\Carbon::now()->month) selected @endif>
                                                                                    {{ \Carbon\Carbon::parse ('01.'.$i.'.'.date('Y'))->addMonth()->monthName }}
                                                                                </option>
                                                                            @endif
                                                                        @else
                                                                            <option value="{{ $i }}"
                                                                                    @if ($i == \Carbon\Carbon::now()->month) selected @endif>
                                                                                {{ \Carbon\Carbon::parse ('01.'.$i.'.'.date('Y'))->monthName }}
                                                                            </option>
                                                                        @endif
                                                                    @endfor
                                                                </select>
                                                            </div>
                                                            <div class="form-group">
                                                                <div class="row">
                                                                    <div class="col-lg-12">
                                                                        <button type="submit" class="btn btn-sm btn-danger btn-block">
                                                                            {{ \Carbon\Carbon::now()->addMonth()->monthName }} Bezahlen?
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </form>
                                                    </div>
                                                @endif
                                            @endforeach
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>--}}


                    {{--<div class="row">
                        <div class="col-lg-12">
                            <div class="card">
                                <div class="card-header bg-dark text-center font-weight-bold">
                                    Zahlungsübersicht
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="table-responsive">
                                            <table class="table table-bordered table-striped
                                                        table-hover">
                                                <thead>
                                                <tr>
                                                    <th>Monat</th>
                                                    --}}{{--@for ($i = 1; $i <= 12; $i++)
                                                       <th>{{ \Carbon\Carbon::parse('01.'.$i.'.'.date('Y'))->monthName }}</th>
                                                    @endfor--}}{{--
                                                    @foreach($team as $mitglied)
                                                        @if($mitglied->aktiv == true)
                                                            <th>{{ $mitglied->vorname }}</th>
                                                        @endif
                                                    @endforeach
                                                </tr>
                                                </thead>
                                                <tbody>
                                                @foreach($zahlung as $mitglied)
--}}{{--                                                    @foreach($mitglied->zahlung as $miete)--}}{{--
                                                        <tr>
                                                            <td>{{ $mitglied }}</td>
                                                        </tr>
--}}{{--                                                    @endforeach--}}{{--
                                                @endforeach
                                                {{ $zahlung }}
                                                --}}{{--@foreach($team as $mitglied)
                                                    @if($mitglied->aktiv == true)
                                                        @foreach($mitglied->miete_mitgliedsbeitrag as $mieteType)
                                                        @if($mieteType->type == 'Miete')
                                                        <tr>
                                                            <td>{{ $mitglied->vorname . ' ' . $mitglied->nachname }}</td>
                                                            @for ($i = 1; $i <= 12; $i++)
                                                                <td @foreach ($mitglied->zahlung as $miete)
                                                                        @if($i == $miete->month_year)
                                                                            @if($miete->team_id == $mitglied->id)
                                                                            class="bg-success" style="color:
                                                                                        #1b1e21 !important;"
                                                                            @endif
                                                                        @endif
                                                                    @endforeach class="bg-danger">
                                                                    @foreach($mitglied->zahlung as $miete)
                                                                         @if($miete->team_id == $mitglied->id)
                                                                            @if($i == $miete->month_year)
                                                                                123456
                                                                            @endif
                                                                        @endif
                                                                    @endforeach
                                                                </td>
                                                            @endfor
                                                        </tr>
                                                        @else
                                                        <tr>
                                                            <td class="bg-primary text-white">{{ $mitglied->vorname . ' ' . $mitglied->nachname }}</td>
                                                            @for ($i = 1; $i <= 12; $i++)
                                                                <td @foreach ($mitglied->zahlung as $miete)
                                                                    @if($i == $miete->month_year)
                                                                    @if($miete->team_id == $mitglied->id)
                                                                    class="bg-success" style="color:
                                                                                #1b1e21 !important;"
                                                                    @endif
                                                                    @endif
                                                                    @endforeach class="bg-danger">
                                                                    @foreach($mitglied->zahlung as $miete)
                                                                        @if($i == $miete->month_year)
                                                                            @if($miete->team_id == $mitglied->id)

                                                                            @endif
                                                                        @endif
                                                                    @endforeach
                                                                </td>
                                                            @endfor
                                                        </tr>
                                                        @endif
                                                        @endforeach
                                                    @endif
                                                @endforeach--}}{{--
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>--}}

                    <div class="col-lg-12">
                        <div class="card">

                            <div class="card-body">
                                <iframe src="https://docs.google.com/spreadsheets/d/1_I_VNg43BNDdj3WvW87gJszKdnlc94PNmcA359H8z_0/edit?usp=sharing" style="width:100%; height: 1200px; border: none;"></iframe>
                            </div>

                        </div>
                    </div>
                    @endhasanyrole

                </div>
            </div>

        </div>
    </section>

@endsection