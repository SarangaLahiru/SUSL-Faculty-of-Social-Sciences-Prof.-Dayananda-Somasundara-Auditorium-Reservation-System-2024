@extends('layouts.app')

@section('title', 'Home | Booking')

@section('content')

<div id="loadingIndicator" class="loading-indicator">
    <div class="d-flex justify-content-center align-items-center"
        style="height: 100vh; position: fixed; top: 0; left: 0; right: 0; bottom: 0; background-color: rgba(255, 255, 255, 0.8); z-index: 1000;">
        <div class="spinner-border text-primary" role="status">
            <span class="visually-hidden"></span>
        </div>
        {{-- Uncomment below to add loading text --}}
        {{-- <p class="loading-text" style="color:rgb(0, 153, 255);">Loading...</p> --}}
    </div>
</div>


<!--====== HEADER ONE PART START ======-->
<section class="header-area header-one">
    <div class="header-content-area " style="height: 580px;">
        <div class="container">
            <div class="row align-items-center dis" style="margin-top: 0px">
                <div class="col-lg-6 col-12">
                    <div class="header-wrapper">
                        <div class="header-content" data-aos="fade-up" data-aos-duration="3000">
                            <h1 class="header-title">
                                Prof. Dayananda Somasundara Auditorum
                            </h1>
                            <p class="text-lg" style="font-size: 24px">
                                Hall Reservation System
                            </p>
                            {{-- <div class="header-btn rounded-buttons">
                                <a class="btn primary-btn-outline btn-lg" href="javascript:void(0)">
                                    DOWNLOAD NOW
                                </a>
                            </div> --}}
                        </div>
                        <!-- header content -->
                    </div>
                </div>
                <div class="col">
                    {{-- <div class="header-image d-none d-lg-block">
                        <div class="image">
                            <img src="https://cdn.ayroui.com/1.0/images/header/header-1.svg" alt="Header" />
                        </div>
                    </div> --}}
                    <div class="shadow">

                        <div id="calendar" class="calendar" style="margin-top: -10px;" data-aos="fade-left">

                            <ul class="legend" style="display: flex">
                                <li>
                                    <div class="color-box accepted"></div>Accepted
                                </li>
                                <li>
                                    <div class="color-box pending"></div>Pending
                                </li>
                            </ul>
                        </div>

                    </div>
                </div>
            </div>
            <!-- row -->
        </div>
        <!-- container -->
        <div class="header-shape">
            <img src="https://cdn.ayroui.com/1.0/images/header/header-shape.svg" alt="shape" />
        </div>
        <!-- header-shape -->
    </div>
    <!-- header content area -->
</section>
<!--====== HEADER ONE PART ENDS ======-->
<div class="container check">
    {{-- <div class="row">
        <div class="col-md-6">
            <h2 class="text-xl-start fs-3 fs-md-4 title">Hall Reservation System</h2>
        </div>
        <div class="col-md-6 text-md-right">
            <div id="calendar" class="calendar"></div>
        </div>
    </div> --}}

    <div class="row justify-content-center mt-4" data-aos="fade-up" data-aos-duration="1000">
        <div class="col">
            <div class="car">
                <div class="card-body">
                    <form id="multipleDaysForm" action="/check-multiple-days-availability" method="POST">
                        @csrf
                        <div class="modal-dialo modal-xl modal-dialog-centered" role="document">
                            <div class="modal-content shadow-lg" style="border: none;">

                                <div class="modal-body ">
                                    <div id="multiple-days-fields">
                                        <!-- Fields for the first day -->
                                        <div class="row mt-3">
                                            <div class="col-md-4">
                                                <label for="booking_date" class="form-label">Booking Date:</label>
                                                <input type="date" id="booking_date" name="availability_data[0][date]"
                                                    class="form-control" required>
                                            </div>
                                            <div class="col-md-3">
                                                <label for="start_time" class="form-label">Start Time:</label>
                                                <input type="time" id="start_time"
                                                    name="availability_data[0][start_time]" class="form-control"
                                                    required>
                                            </div>
                                            <div class="col-md-3">
                                                <label for="end_time" class="form-label">End Time:</label>
                                                <input type="time" id="end_time" name="availability_data[0][end_time]"
                                                    class="form-control" required>
                                            </div>
                                            <div class="col d-flex align-items-end">

                                                <button type="submit" id="check-availability" class="btn btn-primary"
                                                    style="font-size: 15px;" >Check Availability</button>
                                                {{-- <button type="button"
                                                    class="btn btn-danger remove-day-btn">Remove</button> --}}
                                                {{-- <button type="submit" id="check-availability"
                                                    class="btn btn-primary a2">Check Availability</button> --}}
                                            </div>
                                        </div>

                                    </div>
                                    <div class="text-left mt-2">
                                        {{-- <button type="button" id="add-day-btn" class="btn btn-success">Add more
                                            Days</button> --}}
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" id="add-day-btn" class="btn btn-success">Add more
                                        Days</button>



                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>


</div>
<div class="modal fade" id="eventDetailsModal" tabindex="-1" style="position: absolute; z-index:100000;" role="dialog"
    aria-labelledby="eventDetailsModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="eventDetailsModalLabel">Event Details</h5>
                {{-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button> --}}
            </div>
            <div class="modal-body">
                {{-- <h5 id="eventTitle"></h5> --}}
                <p><strong>Status:</strong> <span id="eventTitle"></span></p>
                <p><strong>Start:</strong> <span id="eventStart"></span></p>
                <p><strong>End:</strong> <span id="eventEnd"></span></p>
                <p><strong>Description:</strong></p>
                <p id="eventDescription"></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="manualCloseBtn" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>


<link href='packages/core/main.css' rel='stylesheet' />
<link href='packages/bootstrap/main.css' rel='stylesheet' />
<link href='packages/timegrid/main.css' rel='stylesheet' />
<link href='packages/daygrid/main.css' rel='stylesheet' />
<link href='packages/list/main.css' rel='stylesheet' />
<script src='packages/core/main.js'></script>
<script src='packages/interaction/main.js'></script>
<script src='packages/bootstrap/main.js'></script>
<script src='packages/daygrid/main.js'></script>
<script src='packages/timegrid/main.js'></script>
<script src='packages/list/main.js'></script>
<script src='js/theme-chooser.js'></script>

<!-- Ensure FullCalendar JS is loaded -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<!-- Bootstrap JS (Ensure you have Bootstrap CSS included in your app layout) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<!-- Include jQuery library -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>


<script>
    document.addEventListener('DOMContentLoaded', function () {

        showLoadingIndicator();


        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
            plugins: ['bootstrap', 'interaction', 'dayGrid', 'timeGrid', 'list'],
            themeSystem: 'bootstrap',
            events: @json($events),
            eventDidMount: function (info) {
                info.el.classList.add('booked-date');
            },
            header: {
                left: 'title',
                center: 'prev,next today',
                right: 'dayGridMonth,timeGridWeek,timeGridDay'
            },
            weekNumbers: true,
            navLinks: true,
            eventLimit: true,
            eventClick: function (info) {
                // Populate modal with event details
                var eventObj = info.event;
                console.log(eventObj)
                document.getElementById('eventTitle').innerText = eventObj.extendedProps.status;
                document.getElementById('eventStart').innerText = eventObj.start.toLocaleString();
                document.getElementById('eventEnd').innerText = eventObj.end ? eventObj.end.toLocaleString() : 'N/A';
                document.getElementById('eventDescription').innerText = eventObj.extendedProps.title1 || 'No description available';

                // Show the modal
                $('#eventDetailsModal').modal('show');
            },
            dateClick: function (info) {
                console.log(info)
                var bookingDate = info.dateStr;
                var bookedTimePeriods = getBookedTimePeriods(bookingDate);
                showBookedTimePeriods(bookedTimePeriods, bookingDate);
            }
        });
        calendar.render();
        document.getElementById('manualCloseBtn').addEventListener('click', function () {
            $('#eventDetailsModal').modal('hide');
        });


        function getBookedTimePeriods(bookingDate) {
            var events = calendar.getEvents();
            var bookedTimePeriods = [];
            var bookingDateTime = new Date(bookingDate).getTime();
            events.forEach(function (event) {
                var eventStartDate = event.start ? event.start.toISOString().split('T')[0] : null;
                var eventEndDate = event.end ? event.end.toISOString().split('T')[0] : null;
                var eventStartTime = event.start ? event.start.getTime() : null;
                var eventEndTime = event.end ? event.end.getTime() : null;

                if (eventStartDate && eventEndDate) {
                    var startOfDay = new Date(bookingDate).setHours(0, 0, 0, 0);
                    var endOfDay = new Date(bookingDate).setHours(23, 59, 59, 999);

                    if (eventStartTime <= endOfDay && eventEndTime >= startOfDay) {
                        var startTime = event.start ? formatTime(event.start) : '';
                        var endTime = event.end ? formatTime(event.end) : '';
                        bookedTimePeriods.push(startTime + ' - ' + endTime);
                    }
                }
            });
            console.log(bookedTimePeriods);
            return bookedTimePeriods;
        }

        function formatTime(date) {
            if (!date) return '';
            var hours = date.getHours();
            var minutes = date.getMinutes();
            var suffix = hours >= 12 ? 'PM' : 'AM';
            hours = hours % 12 || 12;
            minutes = minutes.toString().padStart(2, '0');
            return hours + ':' + minutes + ' ' + suffix;
        }
        function showBookedTimePeriods(bookedTimePeriods, bookingDate) {
            var formattedTimePeriods = bookedTimePeriods.length ? bookedTimePeriods.join('<br>') : 'No bookings for this date';

            Swal.fire({
                title: '<span style="font-size: 24px; color: #ff6b6b; font-weight: bold;">Booked Time Periods</span>',
                html: '<div class="card" style="font-size: 18px; color: green; padding: 20px;background-color: rgb(232, 255, 230);">' + formattedTimePeriods + '</div>',
                icon: 'info',
                confirmButtonText: 'Close',
                confirmButtonColor: '#6c5ce7',
                customClass: {
                    title: 'text-center',
                    htmlContainer: 'text-center',
                    popup: 'custom-popup-class',
                    confirmButton: 'btn btn-primary',
                },
                buttonsStyling: false,
                animation: true,
                showClass: {
                    popup: 'animated bounceInDown faster',
                },
                hideClass: {
                    popup: 'animated bounceOutUp faster',
                },
            });
        }



        var dayCount = 0;

        document.getElementById('add-day-btn').addEventListener('click', function () {
            if (dayCount >= 5) {
                Swal.fire({
                    title: 'Limit Reached',
                    text: 'You can only add up to 5 days.',
                    icon: 'warning'
                });
                return;
            }
            dayCount++;
            var container = document.getElementById('multiple-days-fields');
            var dayDiv = document.createElement('div');
            dayDiv.innerHTML = `
            <div class="row mt-3">
                <div class="col-md-4">
                    <label for="additional_booking_date_${dayCount}">Booking Date:</label>
                    <input type="date" id="additional_booking_date_${dayCount}" name="availability_data[${dayCount}][date]" class="form-control" required>
                </div>
                <div class="col-md-3">
                    <label for="additional_start_time_${dayCount}">Start Time:</label>
                    <input type="time" id="additional_start_time_${dayCount}" name="availability_data[${dayCount}][start_time]" class="form-control" required>
                </div>
                <div class="col-md-3">
                    <label for="additional_end_time_${dayCount}">End Time:</label>
                    <input type="time" id="additional_end_time_${dayCount}" name="availability_data[${dayCount}][end_time]" class="form-control" required>
                </div>
                <div class="col-md-2 d-flex align-items-end">
                    <button type="button" class="btn btn-danger remove-day-btn">Remove</button>
                </div>
            </div>
            `;
            container.appendChild(dayDiv);

            dayDiv.querySelector('.remove-day-btn').addEventListener('click', function () {
                container.removeChild(dayDiv);
                dayCount--;
            });
        });

        @if (session('error'))
            $(document).ready(function () {
                var unavailableSlotsHtml = '';

                @if (count(session('error')['unavailable_slots']) > 0)
                    unavailableSlotsHtml += '<p>Unavailable Time Slots:</p><ul>';
                @foreach(session('error')['unavailable_slots'] as $slot)
                    <?php
                        $formattedStartTime = date('g:i A', strtotime($slot['start_time']));
                        $formattedEndTime = date('g:i A', strtotime($slot['end_time']));
                    ?>
                    unavailableSlotsHtml += '<li>{{ $slot['date'] }} - {{ $formattedStartTime }} to {{ $formattedEndTime }}</li>';
                @endforeach
                unavailableSlotsHtml += '</ul>';
                @endif

                Swal.fire({
                    title: 'Unavailable',
                    html: '<p>{{ session('error')['message'] }}</p>' + unavailableSlotsHtml,
                    icon: 'error'
                });
            });
        @endif
        @if (session('error2'))
            Swal.fire({
                title: 'Unavailable',
                text: 'Time slots cannot span multiple days',
                icon: 'error'
            });

        @endif



        {

                document.getElementById('save-multiple-days').addEventListener('click', function () {
                    var container = document.getElementById('multiple-days-container');
                    var fieldsContainer = document.getElementById('multiple-days-fields').innerHTML;
                    container.innerHTML = fieldsContainer;
                    $('#multipleDaysModal').modal('hide');
                });
        }
    });
    window.onload = function () {
        hideLoadingIndicator();
    };

    function showLoadingIndicator() {
        document.getElementById('loadingIndicator').style.display = 'block';
    }

    function hideLoadingIndicator() {
        document.getElementById('loadingIndicator').style.display = 'none';
    }

</script>


@endsection
