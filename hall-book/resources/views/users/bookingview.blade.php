<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Booking Details</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }

        .card-header {
            background-color: #007bff;
            color: white;
            font-weight: bold;
        }
        .modal-header {
            background-color: #007bff;
            color: white;
        }
        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }
        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #0056b3;
        }
        .card-body table {
            width: 100%;
            border-collapse: collapse;
        }
        .card-body th, .card-body td {
            border: 1px solid #ddd;
            padding: 8px;
        }
        .card-body th {
            background-color: #f2f2f2;
            text-align: left;
        }
        .card-body tr:nth-child(even) {
            background-color: #f9f9f9;
        }
        .card-body tr:hover {
            background-color: #ddd;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Booking Details</h1>
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0">{{ $booking->name ." - " .$booking->post." - " .$booking->category }}</h5>
            </div>
            <div class="card-body">
                <table>
                    <tr>
                        <th>Status</th>
                        <td>{{ $booking->status }}</td>
                    </tr>
                    @if($booking->student_no)
                        <tr>
                            <th>Student No:</th>
                            <td>{{ $booking->student_no }}</td>
                        </tr>
                    @endif

                    @if($booking->nic_no)
                        <tr>
                            <th>NIC No:</th>
                            <td>{{ $booking->nic_no }}</td>
                        </tr>
                    @endif

                    @if($booking->phone)
                        <tr>
                            <th>Phone:</th>
                            <td>{{ $booking->phone }}</td>
                        </tr>
                    @endif

                    @if($booking->email)
                        <tr>
                            <th>Email:</th>
                            <td>{{ $booking->email }}</td>
                        </tr>
                    @endif

                    @if($booking->faculty)
                        <tr>
                            <th>Faculty:</th>
                            <td>{{ $booking->faculty }}</td>
                        </tr>
                    @endif
                    @if($booking->department)
                    <tr>
                        <th>Department:</th>
                        <td>{{ $booking->department }}</td>
                    </tr>
                @endif

                    @if($booking->society)
                        <tr>
                            <th>Society:</th>
                            <td>{{ $booking->society }}</td>
                        </tr>
                    @endif

                    @if($booking->institution)
                        <tr>
                            <th>Institution:</th>
                            <td>{{ $booking->institution }}</td>
                        </tr>
                    @endif
                    @if($booking->address)
                        <tr>
                            <th>Address:</th>
                            <td>{{ $booking->address }}</td>
                        </tr>
                    @endif
                    @if($booking->division)
                    <tr>
                        <th>division:</th>
                        <td>{{ $booking->division }}</td>
                    </tr>
                @endif

                    @if($booking->post)
                        <tr>
                            <th>Post:</th>
                            <td>{{ $booking->post }}</td>
                        </tr>
                    @endif

                    @if($booking->category)
                        <tr>
                            <th>Category:</th>
                            <td>{{ $booking->category }}</td>
                        </tr>
                    @endif

                    @if($booking->event_type)
                        <tr>
                            <th>Event Type:</th>
                            <td>{{ $booking->event_type }}</td>
                        </tr>
                    @endif

                    @if($booking->event_description)
                        <tr>
                            <th>Event Description:</th>
                            <td>{{ $booking->event_description }}</td>
                        </tr>
                    @endif

                    @if($booking->booking_dates)
                        <tr>
                            <th>Request booking Dates:</th>
                            <td>
                                @foreach ($booking->booking_dates as $date)
                                    <div>{{ $date['date'] }} - {{ date('g:i A', strtotime($date['start_time'])) }} to {{ date('g:i A', strtotime($date['end_time'])) }}
                                    </div>
                                @endforeach
                            </td>
                        </tr>
                    @endif

                    @if($booking->facilities)
                        <tr>
                            <th>Facilities:</th>
                            <td>{{ implode(', ', $booking->facilities) }}</td>
                        </tr>
                    @endif

                    @if($booking->documents)
                        <tr>
                            <th>Documents:</th>
                            <td>
                                <a href="#" data-toggle="modal" data-target="#documentModal" class="btn btn-outline-primary btn-sm">View Document</a>
                            </td>
                        </tr>
                    @else
                        <tr>
                            <th>Documents:</th>
                            <td>No Document Uploaded</td>
                        </tr>
                    @endif
                </table>
                {{--  <div class="text-right mt-3">
                    <form action="{{ route('booking.accept', $booking->id) }}" method="POST" style="display: inline;">
                        @csrf
                        <button type="submit" class="btn btn-success">Accept</button>
                    </form>
                    <button class="btn btn-danger" data-toggle="modal" data-target="#rejectModal">Reject</button>
                </div>  --}}
                <a href="{{ route('admin.dashboard') }}" class="btn btn-primary">Back to Dashboard</a>
            </div>
                {{--  <a href="{{ route('admin.dashboard') }}" class="btn btn-primary">Back to Dashboard</a>  --}}



            </div>
        </div>
    </div>



    <!-- Modal -->
    <div class="modal fade" id="documentModal" tabindex="-1" aria-labelledby="documentModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="documentModalLabel">Document</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    @if($booking->documents)
                        <iframe src="{{ asset('storage/' . $booking->documents) }}" frameborder="0" style="width: 100%; height: 500px;"></iframe>
                    @else
                        <p>No Document Uploaded</p>
                    @endif
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
