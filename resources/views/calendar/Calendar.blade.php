@extends('Admin.main')

@section('title', 'Dashboard')

@section('content')

<section v-if="active === 'performance'" id="performance">


    <header class="border-b border-solid border-gray-300 bg-white p-6">
        <h1 class="text-3xl font-bold">Calendar</h1>
    </header>


    <section class="m-4 bg-white border border-gray-300 border-solid rounded shadow">


        <header class="border-b border-solid border-gray-300 p-4 text-lg font-medium">
            Activity Calendar
        </header>
        
        <section id="chart" class="p-4">
            <div id='full_calendar_events'></div>
        </section>
    </section>
</section>
</main>

{{-- Scripts --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script>
    $(document).ready(function() {
        var SITEURL = "{{ url('/') }}";
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        var calendar = $('#full_calendar_events').fullCalendar({
            editable: true,
            editable: true,
            events: SITEURL + "/calendar-event",
            displayEventTime: true,
            eventRender: function(event, element, view) {
                if (event.allDay === 'true') {
                    event.allDay = true;
                } else {
                    event.allDay = false;
                }
            },
            selectable: true,
            selectHelper: true,
            select: function(startDate, endDate, allDay) {
                var event_name = prompt('Event Name:');
                if (event_name) {
                    var startDate = $.fullCalendar.formatDate(startDate, "Y-MM-DD HH:mm:ss");
                    var endDate = $.fullCalendar.formatDate(endDate, "Y-MM-DD HH:mm:ss");
                    $.ajax({
                        url: SITEURL + "/calendar-crud-ajax",
                        data: {
                            event_name: event_name,
                            startDate: startDate,
                            endDate: endDate,
                            type: 'create'
                        },
                        type: "POST",
                        success: function(data) {
                            displayMessage("Event created.");
                            calendar.fullCalendar('renderEvent', {
                                id: data.id,
                                title: event_name,
                                start: startDate,
                                end: endDate,
                                allDay: allDay
                            }, true);
                            calendar.fullCalendar('unselect');
                        }
                    });
                }
            },
            eventDrop: function(event, delta) {
                var startDate = $.fullCalendar.formatDate(event.start, "Y-MM-DD");
                var endDate = $.fullCalendar.formatDate(event.end, "Y-MM-DD");
                $.ajax({
                    url: SITEURL + '/calendar-crud-ajax',
                    data: {
                        title: event.event_name,
                        start: startDate,
                        end: endDate,
                        id: event.id,
                        type: 'edit'
                    },
                    type: "POST",
                    success: function(response) {
                        displayMessage("Event updated");
                    }
                });
            },
            eventClick: function(event) {
                var eventDelete = confirm("Are you sure?");
                if (eventDelete) {
                    $.ajax({
                        type: "POST",
                        url: SITEURL + '/calendar-crud-ajax',
                        data: {
                            id: event.id,
                            type: 'delete'
                        },
                        success: function(response) {
                            calendar.fullCalendar('removeEvents', event.id);
                            displayMessage("Event removed");
                        }
                    });
                }
            }
        });
    });

    function displayMessage(message) {
        toastr.success(message, 'Event');
    }
</script>

@endsection