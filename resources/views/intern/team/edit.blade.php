@extends('layouts.intern')

@push('css')

@endpush

@section('breadcrumb-title')
    Teammitglied {{ $team->vorname.' '.$team->nachname }}
@endsection

@section('breadcrumb')
    {{ Breadcrumbs::render('team-edit', $team) }}
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
                        <div class="card-header bg-dark text-center font-weight-bolder">
                            Miete / Mitgliedsbeitrag
                        </div>
                        <div class="card-body">
                            @if($miete == true)
                                <div class="text-right pb-2"><small>Letzte Änderung: <b>{{ \Carbon\Carbon::parse
                                ($miete->updated_at)->isoFormat('DD.MM.YYYY')
                                }}</b></small></div>
                                <form method="POST" action="{{ route('intern.team.update', $team->slug) }}">
                                    @csrf
                                    @method('PUT')
                                    <input type="hidden" value="{{ $team->id }}" name="team_id">
                                    <input type="hidden" value="{{ $miete->id }}" name="id">
                                    <div class="form-group">
                                        <label for="type">Type:</label>
                                        <select class="form-control" name="type" id="type">
                                            <option value="Mitgliedsbeitrag" @if ($miete->type) selected @endif>Mitgliedsbeitrag</option>
                                            <option value="Miete" @if ($miete->type) selected @endif>Miete</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label for="betrag">Betrag:</label>
                                        <input type="text" class="form-control" name="betrag" id="betrag"
                                               data-inputmask-inputformat="9.999" value="{{ number_format
                                               ($miete->betrag, 0) }}"
                                               placeholder="Betrag">
                                    </div>
                                    <div class="form-group">
                                    <button type="submit" class="btn btn-success btn-block"><i class="icofont-euro"></i>
                                        Ändern</button>
                                    </div>
                                </form>
                            @else
                            <form method="POST" action="{{ route('intern.team.store') }}">
                                @csrf
                                <input type="hidden" value="{{ $team->id }}" name="team_id">
                                <div class="form-group">
                                    <label for="type">Type:</label>
                                    <select class="form-control" name="type" id="type">
                                        <option value="Mitgliedsbeitrag" selected>Mitgliedsbeitrag</option>
                                        <option value="Miete">Miete</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="betrag">Betrag:</label>
                                    <input type="text" class="form-control" name="betrag" id="betrag"
                                           data-inputmask-inputformat="9.999" value="" placeholder="Betrag">
                                </div>
                                <div class="form-group">
                                <button type="submit" class="btn btn-success btn-block"><i class="icofont-euro"></i>
                                    Speichern</button>
                                </div>
                            </form>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

@push('js')
    <script>
        $(document).ready(function () {
            $('#betrag').inputmask('9.9{3} €', { numericInput: true });
        });
    </script>
@endpush
