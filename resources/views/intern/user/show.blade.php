@extends('layouts.intern')

@push('css')
    <style>
        .fahrzeug img {
            width: 100%;
            height: auto;
            vertical-align: middle;
            object-position: center center;
            object-fit: cover;
        }
    </style>
@endpush

@section('breadcrumb-title')
    {{ $user->name }}
@endsection

@section('breadcrumb')
    {{ Breadcrumbs::render('mitglied-show', $user) }}
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

            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <label>Name:</label>
                        {{ $user->vorname.' '.$user->nachname }}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <label>E-Mail:</label>
                        {{ $user->email }}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <label>Rolle:</label>
                        @if (!empty($user->getRoleNames()))
                            @foreach($user->getRoleNames() as $v)
                                <label class="badge badge-success">{{ $v }}</label>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
            {{--<form action="" method="post">
                @csrf
                @method('PATCH')
                <div class="row">
                    @foreach($fahrzeuge as $item)
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-2">
                            <div class="fahrzeug">
                                <div class="fahrzeug-wrap img-thumbnail">
                                    <img alt="{{ $item->fahrzeug.' von '.$user->vorname.' '.$user->nachname }}" class="img-fluid" src="{{ Storage::disk('public')->url('images/'.$item->slug.'/thumbnails/'.$galerie->images) }}">
                                    <div class="p-2">
                                        <h5>{{ $item->fahrzeug }}</h5>
                                        <button type="button" class="btn btn-sm btn-danger">Ausblenden</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </form>--}}
        </div>
    </section>

@endsection

@push('js')

@endpush
