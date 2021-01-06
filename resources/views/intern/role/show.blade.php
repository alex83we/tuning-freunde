@extends('layouts.intern')

@push('css')

@endpush

@section('breadcrumb-title')
    Rolle bearbeiten
@endsection

@section('breadcrumb')
    {{ Breadcrumbs::render('rollen-show', $role) }}
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

            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <label>Name:</label>
                        {{ $role->name }}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <label>Permissions:</label>
                        @if(!empty($rolePermissions))
                            @foreach($rolePermissions as $v)
                                <label class="label label-success">{{ $v->name }},</label>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </section>

@endsection

@push('js')

@endpush
