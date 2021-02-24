@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    <div class="response"></div>
                    <div id='calendar'></div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('css_lib')
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fullcalendar@3.9.0/dist/fullcalendar.min.css" />
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" />
@endpush

@push('scripts_lib')

<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@3.10.2/dist/fullcalendar.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script>
    $(document).ready(function () {

        var SITEURL = "{{url('/')}}";
        $.ajaxSetup({
            headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        var jsonData = SITEURL + "/fullcalendar";

        function flagEvent(event, element) {
            element.addClass('event-on-' + event.start.format('YYYY-MM-DD'))
            .css('display', 'none');
        }

        $('#calendar').fullCalendar({
        // put your options and callbacks here
        header: {
          left: '',
          center: 'prev title next',
          right: 'today'
        },
        eventRender: function(event, element) {
          // When rendering each event, add a class to it, so you can find it later.
          // Also add css to hide it so it is not displayed.
          // Note I used a class, so it is visible in source and easy to work with, but
          // you can use data attributes instead if you want.

          flagEvent(event, element);

          if (event.end && event.start.format('YYYY-MM-DD') !== event.end.format('YYYY-MM-DD')) {
            while (event.end > event.start) {
              event.start.add(1, 'day');
              console.log('flag', event.start.format('YYYY-MM-DD'))
              flagEvent(event, element);
            }
          }
        },
        eventAfterAllRender: function(view) {
          // After all events have been rendered, we can now use the identifying CSS
          // classes we added to each one to count the total number on each day.
          // Then we can display that count.
          // Iterate over each displayed day, and get its data-date attribute
          // that Fullcalendar provides.  Then use the CSS class we added to each event
          // to count the number of events on that day.  If there are some, add some
          // html to the day cell to show the count.

          $('#calendar .fc-day.fc-widget-content').each(function(i) {
            var date = $(this).data('date'),
              count = $('#calendar a.fc-event.event-on-' + date).length;
            if (count > 0) {
              $(this).html('<div class="fc-event-count">' + count + '<div>');
            }
          });
        },
        events: jsonData
      })

    });
</script>
@endpush
