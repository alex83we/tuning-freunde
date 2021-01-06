@extends('layouts.main')

@section('title', 'Gästebuch')

@section('canonical')
    <link rel="canonical" href="{{ url()->full() }}"/>
@endsection

@section('meta')
    <meta name="robots" content="index, follow" />
@endsection

@section('description')Hier kannst du uns einen netten Kommentar hinterlassen.@endsection
@section('url'){{ url()->full() }}@endsection

@push('css')

@endpush

@section('content')
    <main id="main">

        <!-- ======= Breadcrumbs ======= -->
        <section id="breadcrumbs" class="breadcrumbs">
            <div class="container">

                <ol>
                    <li><a href="{{ url('/') }}">Startseite</a></li>
                    <li>Gaestebuch</li>
                </ol>
                <div class="row">
                    <div class="col-lg-12">
                        <h2>Gästebuch</h2>
                    </div>
                </div>

            </div>
        </section><!-- End Breadcrumbs -->

        <!-- ======= Team Section ======= -->
        <section id="gaestebuch" class="gaestebuch">
            <div class="container">

                <div class="row">

                    <div class="col-lg-12 mb-4">

                        <a class="btn btn-success text-dark font-weight-bold float-right" href="{{ url('gaestebuch/erstellen') }}">Eintragen</a>

                    </div>

                    <div class="col-lg-12">
                        <div class="gb_shadow">

                            @if(count($gaestebuchs) > 0)
                                <div class="row m-0 wrap">
                                    @foreach($gaestebuchs as $gaestebuch)
                                        @if($gaestebuch->published == true)
                                            <div class="col-lg-4 mb-4 p-0">
                                                <div class="gbook_book_bg">
                                                    <span class="gbook_submitted">Geschrieben von:</span>
                                                    <br class="clearfix">
                                                </div>
                                                <div class="gbook_content">
                                        <span class="gbook_submitted_by">Name: <div
                                                class="d-inline font-weight-bold">{{ $gaestebuch->name }}</div> </span>
                                                    <br class="clearfix">
                                                    @if($gaestebuch->email)
                                                        <span class="gbook_submitted_by">E-Mail: <a
                                                                href="mailto:{{ $gaestebuch->email }}"><i
                                                                    class="icofont-envelope"></i> </a> </span>
                                                        <br class="clearfix">
                                                    @endif
                                                    @if($gaestebuch->facebook or $gaestebuch->twitter or $gaestebuch->instagram)
                                                        <span class="gbook_submitted_by">Social Media:
                                                            <a href="https://www.facebook.com/{{ $gaestebuch->facebook }}"
                                                               target="_blank"><i class="icofont-facebook"></i> </a>&nbsp; |&nbsp;
                                                            <a href="https://twitter.com/{{ $gaestebuch->twitter }}" target="_blank"><i
                                                                    class="icofont-twitter"></i> </a>&nbsp; |&nbsp;
                                                            <a href="https://www.instagram.com/{{ $gaestebuch->instagram }}/"
                                                               target="_blank"><i class="icofont-instagram"></i> </a>
                                                        </span>
                                                        <br class="clearfix">
                                                    @endif
                                                    @if($gaestebuch->website)
                                                        <span class="gbook_submitted_by">Webseite:
                                                            <a href="{{ $gaestebuch->website }}" target="_blank"><i
                                                                    class="icofont-link"></i> </a>
                                                        </span>
                                                        <br class="clearfix">
                                                    @endif
                                                    @if($gaestebuch->created_at)
                                                        <span class="gbook_submitted_by">Geschrieben
                                                            <span><i class="icofont-clock-time"></i> {{ Carbon\Carbon::parse($gaestebuch->created_at)->fromNow() }}</span>
                                                        </span>
                                                        <br class="clearfix">
                                                    @endif
                                                </div>
                                            </div>

                                            <div class="col-lg-8 mb-4 p-0">
                                                <div class="gbook_book_bg">
                                                    <span class="gbook_comments">Gästebuchkommentar:</span>
                                                    <br class="clearfix">
                                                </div>
                                                <div class="gbook_content">
                                                    <div class="gbook_comment">
                                                        {!! $gaestebuch->message !!}
                                                    </div>
                                                    <br class="clearfix">
                                                    <hr class="m-0">
                                                    <div class="row m-0">
                                                        <div class="col-lg-6 p-0">
                                                            <div class="gbook_content">
                                                            <span class="gbook_added">
                                                                # {{ $gaestebuch->id }} | <i>Freigegeben am: {{ \Carbon\Carbon::parse($gaestebuch->published_at)->isoFormat('ddd DD. MMMM YYYY') }}</i>
                                                            </span>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6 p-0">
                                                            @can('Super Admin|Admin')
                                                                <div class="gbook_content float-right">
                                                                    <form
                                                                        action="{{ route('frontend.gaestebuch.destroy', $gaestebuch->id) }}"
                                                                        method="POST">
                                                                        @csrf
                                                                        @method('DELETE')
                                                                        <input type="hidden" name="id"
                                                                               value="{{ $gaestebuch->id }}">
                                                                        <button type="submit"
                                                                                class="btn btn-sm p-0 text-danger"
                                                                                name="delete" value="true"><i
                                                                                class="icofont-trash"></i></button>
                                                                    </form>
                                                                </div>
                                                            @endcan
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @else
                                            @can('Super Admin|Admin')
                                                <div class="col-lg-4 mb-4 p-0">
                                                    <div class="gbook_book_bg">
                                                        <span class="gbook_submitted">Geschrieben von:</span>
                                                        <br class="clearfix">
                                                    </div>
                                                    <div class="gbook_content">
                                                        <span class="gbook_submitted_by">Name:
                                                            <div class="d-inline font-weight-bold">{{ $gaestebuch->name }}</div>
                                                        </span>
                                                        <br class="clearfix">
                                                        @if($gaestebuch->email)
                                                            <span class="gbook_submitted_by">E-Mail: <a
                                                                    href="mailto:{{ $gaestebuch->email }}"><i
                                                                        class="icofont-envelope"></i> </a> </span>
                                                            <br class="clearfix">
                                                        @endif
                                                        @if($gaestebuch->facebook or $gaestebuch->twitter or $gaestebuch->instagram)
                                                            <span class="gbook_submitted_by">Social Media:
                                                                <a href="https://www.facebook.com/{{ $gaestebuch->facebook }}"
                                                                   target="_blank"><i class="icofont-facebook"></i> </a>&nbsp; |&nbsp;
                                                                <a href="https://twitter.com/{{ $gaestebuch->twitter }}"
                                                                   target="_blank"><i
                                                                        class="icofont-twitter"></i> </a>&nbsp; |&nbsp;
                                                                <a href="https://www.instagram.com/{{ $gaestebuch->instagram }}/"
                                                                   target="_blank"><i class="icofont-instagram"></i> </a>
                                                            </span>
                                                            <br class="clearfix">
                                                        @endif
                                                        @if($gaestebuch->website)
                                                            <span class="gbook_submitted_by">Webseite:
                                                                <a href="{{ $gaestebuch->website }}" target="_blank"><i
                                                                        class="icofont-link"></i> </a>
                                                            </span>
                                                            <br class="clearfix">
                                                        @endif
                                                    </div>
                                                </div>

                                            <div class="col-lg-8 mb-4 p-0">
                                                <div class="gbook_book_bg">
                                                    <span class="gbook_comments">Gästebuchkommentar:</span>
                                                    <br class="clearfix">
                                                </div>
                                                <div class="gbook_content">
                                                    <div class="gbook_comment">
                                                        {!! $gaestebuch->message !!}
                                                    </div>
                                                    <br class="clearfix">
                                                    <hr class="m-0">
                                                    <div class="row m-0">
                                                        <div class="col-lg-6 p-0">
                                                            <div class="gbook_content">
                                                            <span class="gbook_added">
                                                                # {{ $gaestebuch->id }} | <i>Hinzugefügt am: {{ \Carbon\Carbon::parse($gaestebuch->created_at)->isoFormat('ddd DD. MMMM YYYY') }}</i>
                                                            </span>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6 p-0">
                                                            <div class="gbook_content float-right">
                                                                <form
                                                                    action="{{ route('frontend.gaestebuch.update', $gaestebuch->id) }}"
                                                                    method="POST">
                                                                    @csrf
                                                                    @method('PATCH')
                                                                    <input type="hidden" name="id"
                                                                           value="{{ $gaestebuch->id }}">
                                                                    <input type="hidden" name="published"
                                                                           value="1">
                                                                    <button type="submit"
                                                                            class="btn btn-sm p-0 text-success"><i
                                                                            class="icofont-check"></i></button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            @endcan
                                        @endif
                                    @endforeach
                                </div>
                            @endif

                        </div>
                    </div>

                </div>

            </div>
        </section><!-- End Portfolio Section -->

    </main><!-- End #main -->
@endsection

@push('js')

@endpush
