@extends('layouts.intern')

@push('css')

@endpush

@section('breadcrumb-title')
    Mitglied bearbeiten
@endsection

@section('breadcrumb')
    {{ Breadcrumbs::render('mitglied-edit', $user) }}
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

            {!! Form::model($user, ['method' => 'PATCH', 'route' => ['intern.user.update', $user->id]]) !!}
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <label>Vorname:</label>
                            {!! Form::text('vorname', null, array('placeholder' => 'Vorname','class' => 'form-control')) !!}
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <label>Nachame:</label>
                            {!! Form::text('nachname', null, array('placeholder' => 'Nachname','class' => 'form-control')) !!}
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <label>E-Mail:</label>
                            {!! Form::email('email', null, array('placeholder' => 'E-Mail','class' => 'form-control')) !!}
                        </div>
                    </div>
                    {{--<div class="col-xs-12 col-sm-12 col-md-12">
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
                    </div>--}}
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <label>Rolle:</label>
                            {!! Form::select('roles[]', $roles,$userRole, array('class' => 'form-control','multiple')) !!}
                        </div>
                    </div>

                    @hasanyrole('Super Admin|Admin')
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <label for="banned">Mitglied sperren: @if($user->banned){{ 'Gebannt bis '.\Carbon\Carbon::parse($user->banned)->isoFormat('DD.MM.YYYY') }}@endif</label>
                            <input name="banned" id="banned" class="form-control"
                                   data-inputmask-alias="datetime" data-inputmask-inputformat="dd.mm.yyyy" data-mask
                            value="">
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="custom-control custom-switch custom-switch-off-danger custom-switch-on-success">
                            <input type="checkbox" class="custom-control-input" id="is_checked" name="is_checked" value="1" @if ($user->is_checked) checked @endif>
                            @if ($user->is_checked)
                                <label class="custom-control-label" for="is_checked">Mitglied deaktivieren</label>
                            @else
                                <label class="custom-control-label" for="is_checked">Mitglied aktivieren</label>
                            @endif
                        </div>
                    </div>
                    @endhasanyrole
                    <div class="col-xs-12 col-sm-12 col-md-12 text-right">
                        <button class="btn btn-sm btn-primary" type="submit">Mitglied bearbeiten</button>
                    </div>
                </div>
            {!! Form::close() !!}
        </div>
    </section>

@endsection

@push('js')
    <script>
        $(function () {
            $('#banned').inputmask('dd.mm.yyyy', {'placeholder': 'dd.mm.yyyy'})
        });
    </script>
@endpush
