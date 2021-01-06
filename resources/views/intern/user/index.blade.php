@extends('layouts.intern')

@push('css')

@endpush

@section('breadcrumb-title')
    Mitglieder Übersicht
@endsection

@section('breadcrumb')
    {{ Breadcrumbs::render('mitglieder') }}
@endsection

@section('content')
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12 margin-bottom">
                    <div class="float-right clearfix mb-4">
                        <a class="btn btn-sm btn-success" href="{{ route('intern.user.create') }}">Neuen Benutzer erstellen</a>
                    </div>
                </div>
            </div>

            <div class="table-responsive">
                <table class="table table-bordered table-hover table-striped">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Rolle</th>
                        <th style="width: 280px;">Aktion</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($data as $key => $user)
                        <tr>
                            @if($user->banned)
                                <td class="text-danger font-weight-bold align-middle">{{ ++$i }}</td>
                                <td class="text-danger font-weight-bold align-middle">{{ $user->vorname.' '.$user->nachname  }} Gebannt bis: {{ Carbon\Carbon::parse($user->banned)->isoFormat('DD.MM.YYYY') }}</td>
                                <td class="text-danger font-weight-bold align-middle">{{ $user->email }}</td>
                                <td class="align-middle">
                                    @if (!empty($user->getRoleNames()))
                                        @foreach($user->getRoleNames() as $v)
                                            <span class="badge badge-pill badge-success text-dark">{{ $v }}</span>
                                        @endforeach
                                    @endif
                                </td>
                                <td class="float-right align-middle" style="width: 280px;">
                                    <a class="btn btn-xs btn-info" href="{{ route('intern.user.show', $user->id) }}"><i class="fa fa-eye"></i> Anzeigen</a>
                                    <a class="btn btn-xs btn-primary" href="{{ route('intern.user.edit', $user->id) }}"><i class="fa fa-edit"></i>Bearbeiten</a>
                                    <form action="{{ route('intern.user.destroy', $user->id) }}" method="post" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i> Löschen</button>
                                    </form>
                                </td>
                            @else
                                <td class="align-middle">{{ ++$i }}</td>
                                <td class="align-middle">{{ $user->vorname.' '.$user->nachname  }}</td>
                                <td class="align-middle">{{ $user->email }}</td>
                                <td class="align-middle">
                                    @if (!empty($user->getRoleNames()))
                                        @foreach($user->getRoleNames() as $v)
                                            <span class="badge badge-pill badge-success text-dark">{{ $v }}</span>
                                        @endforeach
                                    @endif
                                </td>
                                <td class="float-right align-middle" style="width: 280px;">
                                    <a class="btn btn-xs btn-info" href="{{ route('intern.user.show', $user->id) }}"><i class="fa fa-eye"></i> Anzeigen</a>
                                    <a class="btn btn-xs btn-primary" href="{{ route('intern.user.edit', $user->id) }}"><i class="fa fa-edit"></i>Bearbeiten</a>
                                    <form action="{{ route('intern.user.destroy', $user->id) }}" method="post" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-xs btn-danger"><i class="fa fa-trash"></i> Löschen</button>
                                    </form>
                                </td>
                            @endif
                        </tr>
                    @endforeach
                    </tbody>
                </table>

                {!! $data->render() !!}
            </div>
        </div>
    </section>

@endsection

@push('js')

@endpush
