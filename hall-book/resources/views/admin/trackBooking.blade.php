<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Booking Details</title>
    <!-- Add Bootstrap CSS for styling (optional) -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container card shadow mb-4 mt-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Bookings for {{ $user->first_name }} {{ $user->last_name }}</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Event Type</th>
                            <th>Booking Dates</th>
                            <th>Status</th>
                            <th>Description</th>
                            <th>Created At</th> <!-- Added column for creation date -->
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($bookings as $index => $booking)
                        <tr>
                            <td>{{ $index + 1 }}</td>

                            @if($booking->event_type)
                            <td>{{ $booking->event_type }}</td>
                            @else
                            <td>N/A</td>
                            @endif

                            @if($booking->booking_dates)
                            <td>
                                @foreach ($booking->booking_dates as $date)
                                    <div>
                                        {{ $date['date'] }} - {{ date('g:i A', strtotime($date['start_time'])) }} to {{ date('g:i A', strtotime($date['end_time'])) }}
                                    </div>
                                @endforeach
                            </td>
                            @else
                            <td>N/A</td>
                            @endif

                            @if($booking->status)
                            <td>{{ $booking->status }}</td>
                            @else
                            <td>N/A</td>
                            @endif

                            @if($booking->event_description)
                            <td>{{ $booking->event_description }}</td>
                            @else
                            <td>N/A</td>
                            @endif

                            @if($booking->created_at)
                            <td>{{ $booking->created_at->format('d M Y, g:i A') }}</td> <!-- Format creation date -->
                            @else
                            <td>N/A</td>
                            @endif
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- Add Bootstrap JS (optional) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
