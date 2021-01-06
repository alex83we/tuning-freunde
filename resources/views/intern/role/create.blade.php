@extends('layouts.intern')

@push('css')

@endpush

@section('breadcrumb-title')
    Rolle erstellen
@endsection

@section('breadcrumb')
    {{ Breadcrumbs::render('rollen-erstellen') }}
@endsection

@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 margin-bottom">
                    <div class="float-right clearfix mb-4">
                        <a class="btn btn-sm btn-primary" href="{{ route('intern.role.index') }}"> Zurück</a>
                    </div>
                </div>
            </div>

            {!! Form::open(array('route' => 'intern.role.store','method'=>'POST')) !!}
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <label>Name:</label>
                        {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <label>Berechtigung:</label>
                        <br/>
                        @foreach($permission as $value)
                            <label>{{ Form::checkbox('permission[]', $value->id, false, array('class' => 'name')) }}
                                {{ $value->name }}</label>
                            <br/>
                        @endforeach
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 text-right">
                    <button class="btn btn-sm btn-primary" type="submit">Rolle anlegen</button>
                </div>
            </div>
            {!! Form::close() !!}

        </div>
    </section>

@endsection

@push('js')

@endpush
