@extends('layouts.intern')

@push('css')

@endpush

@section('breadcrumb-title')
    Mitglied erstellen
@endsection

@section('breadcrumb')
    {{ Breadcrumbs::render('mitglied-erstellen') }}
@endsection

@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 margin-bottom">
                    <div class="float-right clearfix mb-4">
                        <a class="btn btn-sm btn-primary" href="{{ route('intern.user.index') }}"> Zurück</a>
                    </div>
                </div>
            </div>

            {!! Form::open(array('route' => 'intern.user.store','method'=>'POST')) !!}
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <label>Vorname:</label>
                            {!! Form::text('vorname', null, array('placeholder' => 'Vorname','class' => 'form-control')) !!}
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <label>Nachname:</label>
                            {!! Form::text('nachname', null, array('placeholder' => 'Nachname','class' => 'form-control')) !!}
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <label>E-Mail:</label>
                            {!! Form::email('email', null, array('placeholder' => 'Email','class' => 'form-control')) !!}
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <label>Passwort:</label>
                            {!! Form::password('password', array('placeholder' => 'Passwort','class' => 'form-control')) !!}
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <label>Bestätige das Passwort:</label>
                            {!! Form::password('confirm-password', array('placeholder' => 'Bestätige das Passwort','class' => 'form-control')) !!}
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <label>Rolle:</label>
                            {!! Form::select('roles[]', $roles,[], array('class' => 'form-control','multiple')) !!}
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 text-right">
                        <button class="btn btn-sm btn-primary" type="submit">Mitglied anlegen</button>
                    </div>
                </div>
            {!! Form::close() !!}

        </div>
    </section>

@endsection

@push('js')

@endpush
