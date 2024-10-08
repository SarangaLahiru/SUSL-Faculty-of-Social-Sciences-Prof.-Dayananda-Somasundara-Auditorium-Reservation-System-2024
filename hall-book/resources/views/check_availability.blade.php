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
                        <div class="header-content" data-ao="fade-up" data-ao-duration="3000">
                            <h1 class="header-title">
                                Prof. Dayananda Somasundara Auditorium
                            </h1>
                            <p class="text-lg" style="font-size: 24px">
                                Hall Reservation System
                            </p>

                        </div>
                        <!-- header content -->
                    </div>
                </div>
                <div class="col">

                    <div class="shadow">

                        <div id="calendar" class="calendar"  data-ao="fade-left">

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

    <div class="row justify-content-center" data-ao="fade-u" data-ao-duration="1000">
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
<div class="modal fade" id="eventDetailsModal" tabindex="-1" style="position: absolut; z-index:100000;" role="dialog"
    aria-labelledby="eventDetailsModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered " role="document">
        <div class="modal-content">
            <div class="modal-header" style="background-color: rgb(56, 132, 255); color:white;">
                <h5 class="modal-title"  id="eventDetailsModalLabel">Event Details</h5>
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

<!-- Confirmation Modal -->
<!-- Confirmation Modal -->
<div class="modal fade" id="bookingConfirmationModal" tabindex="-1" role="dialog" aria-labelledby="bookingConfirmationLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="bookingConfirmationLabel">Availability</h5>

            </div>
            <div class="modal-body">
                @if(session('confirm_model'))
                <div class="alert alert-success" role="alert">

                     <p><i class="fas fa-check-circle me-2 m-1" style="font-size: 1.5rem;"></i> Your selected time slots are <strong>available</strong>!</p>
                    <hr>
                    <p>Your selected time slots</p>

                    <ul>
                        @foreach(session('confirm_model')['availabilityData'] as $data)
                            <li >
                                {{ $data['date'] }} :
                                <strong>{{ date('g:i A', strtotime($data['start_time'])) }}</strong> to
                                <strong>{{ date('g:i A', strtotime($data['end_time'])) }}</strong>
                            </li>
                        @endforeach
                    </ul>
                       </div>

                @else
                    <div class="alert alert-danger" role="alert">
                        <strong>No time slots are currently available.</strong> Please check back later.
                    </div>
                @endif

                @if(!Auth::check())
                <div class="alert alert-warning d-flex align-items-center" role="alert">
                    <i class="fas fa-exclamation-circle me-2" style="font-size: 1.5rem;"></i>
                    <div>
                         If you want to make reservations, you must first  <strong>register or login</strong>
                    </div>
                </div>
                <div class="mt-2">
                    <a href="{{ route('register') }}" class="btn btn-primary w-100">Register</a>

                </div>
            @endif
            </div>
            <div class="modal-footer">

                @if(!Auth::check())
                <p class=" w-100 " style="font-size: 15px">If you already have an account ? <a href="{{ route('login') }}">Login in here</a>.</p>

            @endif
                <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="$('#bookingConfirmationModal').modal('hide')">Cancel</button>
                @if(Auth::check() && session('confirm_model'))
                <a href="/create-booking" class="btn btn-primary"></>Proceed to Book Selected Time Slots</a>
                @endif
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="bookingConfirmationalertModal" tabindex="-1" role="dialog" aria-labelledby="bookingConfirmationLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <div class="alert alert-success w-100" role="alert">

                    <p><i class="fas fa-check-circle me-2" style="font-size: 1.5rem;"></i> Now you are <strong>Login successfully</strong>!</p>

                      </div>

            </div>
            <div class="modal-body">
                @if(session('confirm_model_alert'))
                <div class="alert alert-success" role="alert">

                     <p>Your previous selected time slots are <strong>available</strong>!</p>
                    <hr>
                    <p>Your selected time slots</p>

                    <ul>
                        @foreach(session('confirm_model_alert')['availabilityData'] as $data)
                            <li >
                                {{ $data['date'] }} :
                                <strong>{{ date('g:i A', strtotime($data['start_time'])) }}</strong> to
                                <strong>{{ date('g:i A', strtotime($data['end_time'])) }}</strong>
                            </li>
                        @endforeach
                    </ul>
                       </div>

                @else
                    <div class="alert alert-danger" role="alert">
                        <strong>No time slots are currently available.</strong> Please check back later.
                    </div>
                @endif

                @if(!Auth::check())
                <div class="alert alert-warning d-flex align-items-center" role="alert">
                    <i class="fas fa-exclamation-circle me-2 mt-1" style="font-size: 1.5rem;"></i>
                    <div>
                        <strong>Registration Required:</strong> To book the selected time slots, you need to register.
                    </div>
                </div>
                <div class="mt-2">
                    <a href="{{ route('register') }}" class="btn btn-primary w-100">Register</a>

                </div>
            @endif
            </div>
            <div class="modal-footer">

                @if(!Auth::check())
                <p class="">If you already have an account, <a href="{{ route('login') }}">Login in here</a>.</p>

            @endif
                <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="$('#bookingConfirmationalertModal').modal('hide')">Try another</button>
                @if(Auth::check() && session('confirm_model_alert'))

                    <a href="/create-booking" class="btn btn-primary"></>Proceed to Book Selected Time Slots</a>

                @endif
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
                center: 'prev,next',
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
                title: '<span style="font-size: 24px; color: #ff6b6b; font-weight: bold;">Available</span>',
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

        // Check if confirm_model session variable is set
        @if (session('confirm_model'))
        $('#bookingConfirmationModal').modal('show');

       @endif
       @if (session('confirm_model_alert'))
       $('#bookingConfirmationalertModal').modal('show');

      @endif

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

        @if (session('error3'))
        Swal.fire({
            title: 'Unavailable',
            text: 'You cannot book time slots for past dates.',
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
