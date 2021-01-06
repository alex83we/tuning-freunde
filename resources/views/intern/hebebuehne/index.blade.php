@extends('layouts.intern')

@push('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.css" />
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
                    <div class="response"></div>
                    <div id='calendar'></div>
                </div>
            </div>
        </div>

    </section>

@endsection

@push('js')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js" integrity="sha256-4iQZ6BVL4qNKlQ27TExEhBN1HFPvAvAMbFavKKosSWQ=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.js"></script>

    <script>
        $(document).ready(function () {
            var SITEURL = "{{url('/intern/')}}";
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            var calendar = $('#calendar').fullCalendar({
                editable: true,
                events: SITEURL + "/hebebuehne",
                displayEventTime: true,
                editable: true,
                eventRender: function (event, element, view) {
                    if (event.allDay === 'true') {
                        event.allDay = true;
                    } else {
                        event.allDay = false;
                    }
                },
                selectable: true,
                selectHelper: true,
                select: function (start, end, allDay) {
                    var title = prompt('Event Title:');
                    if (title) {
                        var start = $.fullCalendar.formatDate(start, "Y-MM-DD HH:mm:ss");
                        var end = $.fullCalendar.formatDate(end, "Y-MM-DD HH:mm:ss");
                        $.ajax({
                            url: SITEURL + "/hebebuehne/create",
                            data: 'title=' + title + '&start=' + start + '&end=' + end,
                            type: "POST",
                            success: function (data) {
                                displayMessage("Added Successfully");
                            }
                        });
                        calendar.fullCalendar('renderEvent',
                            {
                                title: title,
                                start: start,
                                end: end,
                                allDay: allDay
                            },
                            true
                        );
                    }
                    calendar.fullCalendar('unselect');
                },
                eventDrop: function (event, delta) {
                    var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD HH:mm:ss");
                    var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD HH:mm:ss");
                    $.ajax({
                        url: SITEURL + '/hebebuehne/update',
                        data: 'title=' + event.title + '&start=' + start + '&end=' + end + '&id=' + event.id,
                        type: "POST",
                        success: function (response) {
                            displayMessage("Updated Successfully");
                        }
                    });
                },
                eventClick: function (event) {
                    var deleteMsg = confirm("Do you really want to delete?");
                    if (deleteMsg) {
                        $.ajax({
                            type: "POST",
                            url: SITEURL + '/hebebuehne/delete',
                            data: "&id=" + event.id,
                            success: function (response) {
                                if(parseInt(response) > 0) {
                                    $('#calendar').fullCalendar('removeEvents', event.id);
                                    displayMessage("Deleted Successfully");
                                }
                            }
                        });
                    }
                }
            });
        });
        function displayMessage(message) {
            $(".response").html(" "+message+" ");
            setInterval(function() { $(".success").fadeOut(); }, 1000);
        }
    </script>
@endpush
