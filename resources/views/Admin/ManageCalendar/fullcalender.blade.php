@extends('Admin.main')

@section('title', 'Calendar')

@section('content')

<div class="flex relative justify-center text-center items-center h-full w-full">
    <main class="bg-gray-100 h-screen w-full overflow-y-auto">
        <section v-if="active === 'performance'" id="performance">
            <header class="border-b border-solid border-gray-300 bg-white p-6">
                <h1 class="text-3xl font-bold">Calendar</h1>
            </header>
            <section class="m-4 bg-white border border-gray-300 border-solid rounded shadow">
                <header class="border-b border-solid border-gray-300 p-4 text-lg font-medium">
                    Activity Calendar
                </header>

                <section id="chart" class="p-4">
                    <div id='calendar'></div>
                </section>

            </section>
        </section>
    </main>
</div>

<!-- Script -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.js"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" />


<script>
    $(document).ready(function() {



        var SITEURL = "{{ url('/admin') }}";



        $.ajaxSetup({

            headers: {

                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

            }

        });



        var calendar = $('#calendar').fullCalendar({

            editable: true,

            events: SITEURL + "/fullcalender",

            displayEventTime: false,

            eventRender: function(event, element, view) {

                if (event.allDay === 'true') {

                    event.allDay = true;

                } else {

                    event.allDay = false;

                }

            },

            selectable: true,

            selectHelper: true,

            select: function(start, end, allDay) {

                var title = prompt('Event Title:');

                if (title) {

                    var start = $.fullCalendar.formatDate(start, "Y-MM-DD");

                    var end = $.fullCalendar.formatDate(end, "Y-MM-DD");

                    $.ajax({

                        url: SITEURL + "/fullcalenderAjax",

                        data: {

                            title: title,

                            start: start,

                            end: end,

                            type: 'add'

                        },

                        type: "POST",

                        success: function(data) {

                            displayMessage("Event Created Successfully");



                            calendar.fullCalendar('renderEvent',

                                {

                                    id: data.id,

                                    title: title,

                                    start: start,

                                    end: end,

                                    allDay: allDay

                                }, true);



                            calendar.fullCalendar('unselect');

                        }

                    });

                }

            },

            eventDrop: function(event, delta) {

                var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD");

                var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD");



                $.ajax({

                    url: SITEURL + '/fullcalenderAjax',

                    data: {

                        title: event.title,

                        start: start,

                        end: end,

                        id: event.id,

                        type: 'update'

                    },

                    type: "POST",

                    success: function(response) {

                        displayMessage("Event Updated Successfully");

                    }

                });

            },

            eventClick: function(event) {

                var deleteMsg = confirm("Do you really want to delete?");

                if (deleteMsg) {

                    $.ajax({

                        type: "POST",

                        url: SITEURL + '/fullcalenderAjax',

                        data: {

                            id: event.id,

                            type: 'delete'

                        },

                        success: function(response) {

                            calendar.fullCalendar('removeEvents', event.id);

                            displayMessage("Event Deleted Successfully");

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