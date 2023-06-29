<!DOCTYPE html>

<html lang="en" class="default-style layout-fixed layout-navbar-fixed">
<head>
    @include('layouts.front.title')

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0">
    <meta name="description"
        content="" />
    <meta name="keywords" content="">
    <meta name="author" content="" />
    @include('layouts.css')
    <!-- Core stylesheets -->
    <link rel="stylesheet" href="{{ asset('Admin/assets/css/bootstrap-material.css')}}">
    <link rel="stylesheet" href="{{ asset('Admin/assets/css/shreerang-material.css')}}">
    <link rel="stylesheet" href="{{ asset('Admin/assets/css/uikit.css')}}">
    <link rel="stylesheet" href="{{ asset('Admin/assets/libs/fullcalendar/fullcalendar.css')}}">

</head>

<body>
    <!-- [ Preloader ] Start -->
    <div class="page-loader">
        <div class="bg-primary"></div>
    </div>
    <!-- [ Preloader ] End -->

    <!-- [ Layout wrapper ] Start -->
    <div class="layout-wrapper layout-2">
        <div class="layout-inner">
            <!-- [ Layout sidenav ] Start -->
            <div id="layout-sidenav" class="layout-sidenav sidenav sidenav-vertical bg-white logo-dark">
                <!-- Brand demo (see assets/css/demo/demo.css) -->
                <div class="app-brand demo">
                    <span class="app-brand-logo demo">
                        {{--<img src="{{ asset('Admin/assets/img/logo.png')}}" alt="Brand Logo" class="img-fluid">--}}
                    </span>
                    <a href="/dashboard" class="app-brand-text demo sidenav-text font-weight-normal ml-2">Mukono Primary School</a>
                    <a href="javascript:" class="layout-sidenav-toggle sidenav-link text-large ml-auto">
                        <i class="ion ion-md-menu align-middle"></i>
                    </a>
                </div>
                <div class="sidenav-divider mt-0"></div>

                <!-- Links -->
                @include('layouts.sidebar')
            </div>
            <!-- [ Layout sidenav ] End -->
            <!-- [ Layout container ] Start -->
            <div class="layout-container">
                <!-- [ Layout navbar ( Header ) ] Start -->
                @include('layouts.navbar')
                <!-- [ Layout navbar ( Header ) ] End -->

                <!-- [ Layout content ] Start -->
                <div class="layout-content">

                    <!-- [ content ] Start -->
                    <div class="container-fluid flex-grow-1 container-p-y">
                        @include('layouts.breadcrumb')
                        @include('livewire.timetables')
                    </div>
                    <!-- [ content ] End -->

                    <!-- [ Layout footer ] Start -->
                    @include('layouts.footer')
                    <!-- [ Layout footer ] End -->
                </div>
                <!-- [ Layout content ] Start -->
            </div>
            <!-- [ Layout container ] End -->
        </div>
        <!-- Overlay -->
        <div class="layout-overlay layout-sidenav-toggle"></div>
    </div>
    <!-- [ Layout wrapper] End -->

    <!-- Modal -->
    {{-- @include('layouts.modal') --}}
    <!-- Core scripts -->
    @include('layouts.javascript')
    <script src="{{ asset('Admin/assets/libs/chartjs/chartjs.js')}}"></script>

    <!-- Demo -->
    <script src="{{ asset('Admin/assets/js/pages/charts_chartjs.js')}}"></script>
    <script src="{{ asset('Admin/assets/libs/moment/moment.js')}}"></script>
    <script src="{{ asset('Admin/assets/libs/fullcalendar/fullcalendar.js')}}"></script>
    {{-- <script src="{{ asset('Admin/assets/js/pages/ui_fullcalendar.js')}}"></script> --}}
    <script>
        $(function () {
        var today = new Date();
        var y = today.getFullYear();
        var m = today.getMonth();
        var d = today.getDate();
        

        var eventList = [{
            
            dow:1,
            title:'{{ auth()->user()->getStartingTime()}} - {{ auth()->user()->getEndingTime()}} \n {{auth()->user()->getSubject()}} \n {{auth()->user()->getClass()}}',
            start: new Date(y, m, d -1),
            end: new Date(y, m, d - 5),
            className: 'fc-event-danger'
        },
        {
            dow:2,
            title: '{{ auth()->user()->getStartingTime()}} - {{ auth()->user()->getEndingTime()}} \n {{auth()->user()->getSubject()}} \n {{auth()->user()->getClass()}}',
            start: new Date(y, m, d - 2),
            end: new Date(y, m, d - 5),
            className: 'fc-event-warning'
        },
        {
            dow:3,
            title: '{{ auth()->user()->getStartingTime()}} - {{ auth()->user()->getEndingTime()}} \n {{auth()->user()->getSubject()}} \n {{auth()->user()->getClass()}}',
            //start: new Date(y, m, d - 6, 16, 0)
            start: new Date(y, m, d - 0),
            end: new Date(y, m, d - 3, 12, 30),
        },
        {
            dow:4,
            title: '{{ auth()->user()->getStartingTime()}} - {{ auth()->user()->getEndingTime()}} \n {{auth()->user()->getSubject()}} \n {{auth()->user()->getClass()}}',
            //start: new Date(y, m, d + 1, 16, 0),
            start: new Date(y, m, d + 1),
            end: new Date(y, m, d - 3, 12, 30),
            className: 'fc-event-success',
        },
        {
            dow:5,
            title: '{{ auth()->user()->getStartingTime()}} - {{ auth()->user()->getEndingTime()}} \n {{auth()->user()->getSubject()}} \n {{auth()->user()->getClass()}}',
            start: new Date(y, m, d + 2),
            end: new Date(y, m, d - 2),
        },
        {
            dow:6,
            title: '{{ auth()->user()->getStartingTime()}} - {{ auth()->user()->getEndingTime()}} \n {{auth()->user()->getSubject()}} \n {{auth()->user()->getClass()}}',
            //start: new Date(y, m, d - 3, 10, 30),
            //end: new Date(y, m, d - 3, 12, 30),
            start: new Date(y, m, d + 3),
            end: new Date(y, m, d - 3, 12, 30),
            className: 'fc-event-danger'
        },
        {
            dow:7,
            title: 'Resting and Personal Activities',
            start: new Date(y, m, d  + 4),
            end: new Date(y, m, d - 3, 12, 30),
            className: 'fc-event-info'
        },
        {{-- {
            title: 'Meeting',
            start: new Date(y, m, d - 3, 14, 30),
            end: new Date(y, m, d - 3, 12, 30),
            className: 'fc-event-dark'
        },
        {
            title: 'Happy Hour',
            start: new Date(y, m, d - 3, 17, 30)
        },
        {
            title: 'Dinner',
            start: new Date(y, m, d - 3, 20, 0)
        },
        {
            title: 'Birthday Party',
            start: new Date(y, m, d - 2, 7, 0)
        },
        {
            title: 'Background event',
            start: new Date(y, m, d + 5),
            end: new Date(y, m, d + 7),
            rendering: 'background'
        },
        {
            title: 'Click for Google',
            url: 'http://google.com/',
            start: new Date(y, m, d + 13)
        } --}}
        ];

        // Default view
        // color classes: [ fc-event-success | fc-event-info | fc-event-warning | fc-event-danger | fc-event-dark ]
        $('#fullcalendar-default-view').fullCalendar({
            // Bootstrap styling
            themeSystem: 'bootstrap4',
            bootstrapFontAwesome: {
            close: ' ion ion-md-close',
            prev: ' ion ion-ios-arrow-back scaleX--1-rtl',
            next: ' ion ion-ios-arrow-forward scaleX--1-rtl',
            prevYear: ' ion ion-ios-arrow-dropleft-circle scaleX--1-rtl',
            nextYear: ' ion ion-ios-arrow-dropright-circle scaleX--1-rtl'
            },

            header: {
            left: 'title',
            center: 'month,agendaWeek,agendaDay',
            right: 'prev,next today'
            },

            defaultDate: today,
            navLinks: true, // can click day/week names to navigate views
            selectable: true,
            selectHelper: true,
            weekNumbers: true, // Show week numbers
            nowIndicator: true, // Show "now" indicator
            firstDay: 1, // Set "Monday" as start of a week
            businessHours: {
            dow: [1, 2, 3, 4, 5,6], // Monday - Saturday
            start: '6:20',
            end: '5:00',
            },
            editable: true,
            eventLimit: true, // allow "more" link when too many events
            events: eventList,
            select: function (start, end) {
            $('#fullcalendar-default-view-modal')
                .on('shown.bs.modal', function() {
                $(this).find('input[type="text"]').trigger('focus');
                })
                .on('hidden.bs.modal', function() {
                $(this)
                    .off('shown.bs.modal hidden.bs.modal submit')
                    .find('input[type="text"], select').val('');
                $('#fullcalendar-default-view').fullCalendar('unselect');
                })
                .on('submit', function(e) {
                e.preventDefault();
                var title = $(this).find('input[type="text"]').val();
                var className = $(this).find('select').val() || null;

                if (title) {
                    var eventData = {
                    title: title,
                    start: start,
                    end: end,
                    className: className
                    }
                    $('#fullcalendar-default-view').fullCalendar('renderEvent', eventData, true);
                }

                $(this).modal('hide');
                })
                .modal('show');
            },
            eventClick: function(calEvent, jsEvent, view) {
            alert('Event: ' + calEvent.title);
            }
        });

        // List view
        // color classes: [ fc-event-success | fc-event-info | fc-event-warning | fc-event-danger | fc-event-dark ]
        $('#fullcalendar-list-view').fullCalendar({
            // Bootstrap styling
            themeSystem: 'bootstrap4',
            bootstrapFontAwesome: {
            close: ' ion ion-md-close',
            prev: ' ion ion-ios-arrow-back scaleX--1-rtl',
            next: ' ion ion-ios-arrow-forward scaleX--1-rtl',
            prevYear: ' ion ion-ios-arrow-dropleft-circle scaleX--1-rtl',
            nextYear: ' ion ion-ios-arrow-dropright-circle scaleX--1-rtl'
            },

            header: {
            left: 'title',
            center: 'listDay,listWeek,month',
            right: 'prev,next today'
            },

            // customize the button names,
            views: {
            listDay: {
                buttonText: 'list day'
            },
            listWeek: {
                buttonText: 'list week'
            }
            },

            defaultView: 'listWeek',
            defaultDate: today,
            navLinks: true, // can click day/week names to navigate views
            editable: true,
            eventLimit: true, // allow "more" link when too many events
            events: eventList
        });
        });

    </script>
</body>

</html>
