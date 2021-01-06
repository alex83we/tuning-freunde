@extends('layouts.intern')

@push('css')

@endpush

@section('breadcrumb-title')
    Rollen Übersicht
@endsection

@section('breadcrumb')
    {{ Breadcrumbs::render('rollen') }}
@endsection

@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 margin-bottom">
                    <div class="float-right clearfix mb-4">
                        @can('role-create')
                            <a class="btn btn-sm btn-success" href="{{ route('intern.role.create') }}">Neue Rolle erstellen</a>
                        @endcan
                    </div>
                </div>
            </div>

            <div class="table-responsive">
                <table class="table table-bordered table-hover table-striped">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th style="width: 280px;">Aktion</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($roles as $role)
                    <tr>
                        <td>{{ ++$i }}</td>
                        <td>{{ $role->name }}</td>
                        <td style="max-width: 280px;">
                            <a class="btn btn-xs btn-info" href="{{ route('intern.role.show', $role->id) }}"><i class="fa fa-eye"></i> Anzeigen</a>
                            @can('role-list ')
                            <a class="btn btn-xs btn-primary" href="{{ route('intern.role.edit', $role->id) }}"><i class="fa fa-edit"></i>Bearbeiten</a>
                            @endcan
                            @can('role-delete')
                            {!! Form::open(['method' => 'DELETE', 'route' => ['intern.role.destroy', $role->id], 'class' => 'd-inline']) !!}
                                <button type="submit" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i> Löschen</button>
                            {!! Form::close() !!}
                            @endcan
                        </td>
                    </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </section>

@endsection

@push('js')

@endpush
