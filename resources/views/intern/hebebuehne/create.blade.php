@extends('layouts.intern')

@push('css')
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/fullcalendar@5/main.min.css">
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

                </div>
            </div>
        </div>

    </section>

@endsection

@push('js')
    <script src="//cdn.jsdelivr.net/npm/fullcalendar@5/main.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/fullcalendar@5/locales-all.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.27.0/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.27.0/locale/de.min.js"></script>
@endpush
