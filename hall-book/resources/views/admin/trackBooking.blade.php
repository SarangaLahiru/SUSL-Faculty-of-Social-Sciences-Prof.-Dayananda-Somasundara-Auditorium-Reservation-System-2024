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
        <div class="card-header py-3 d-flex justify-content-between">
            <h6 class="m-0 font-weight-bold text-primary">Bookings for {{ $user->first_name }} {{ $user->last_name }}</h6>
            <button class="btn btn-danger btn-sm" id="deleteSelectedBtn" disabled>Delete Selected</button>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th><input type="checkbox" id="selectAll"></th> <!-- Checkbox for selecting all -->
                            <th>#</th>
                            <th>Event Type</th>
                            <th>Booking Dates</th>
                            <th>Status</th>
                            <th>Description</th>
                            <th>Created At</th>
                            <th>Actions</th> <!-- Column for actions like delete -->
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($bookings as $index => $booking)
                        <tr>
                            <td><input type="checkbox" class="bookingCheckbox" value="{{ $booking->id }}"></td> <!-- Checkbox for each row -->
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $booking->event_type ?? 'N/A' }}</td>
                            <td>
                                @if($booking->booking_dates)
                                    @foreach ($booking->booking_dates as $date)
                                        <div>
                                            {{ $date['date'] }} - {{ date('g:i A', strtotime($date['start_time'])) }} to {{ date('g:i A', strtotime($date['end_time'])) }}
                                        </div>
                                    @endforeach
                                @else
                                    N/A
                                @endif
                            </td>
                            <td>{{ $booking->status ?? 'N/A' }}</td>
                            <td>{{ $booking->event_description ?? 'N/A' }}</td>
                            <td>{{ $booking->created_at ? $booking->created_at->format('d M Y, g:i A') : 'N/A' }}</td>
                            <td>
                                <!-- Button for deleting a single booking -->
                                <button class="btn btn-danger btn-sm deleteBtn" data-id="{{ $booking->id }}">Delete</button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- Add Bootstrap JS (optional) -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        // jQuery for handling checkbox selection
        $(document).ready(function() {
            $('#selectAll').on('click', function() {
                $('.bookingCheckbox').prop('checked', this.checked);
                toggleDeleteButton();
            });

            $('.bookingCheckbox').on('change', function() {
                $('#selectAll').prop('checked', $('.bookingCheckbox:checked').length === $('.bookingCheckbox').length);
                toggleDeleteButton();
            });

            function toggleDeleteButton() {
                $('#deleteSelectedBtn').prop('disabled', $('.bookingCheckbox:checked').length === 0);
            }

            $('.deleteBtn').on('click', function() {
                let bookingId = $(this).data('id');
                if (confirm('Are you sure you want to delete this booking?')) {
                    deleteBooking([bookingId]);
                }
            });

            $('#deleteSelectedBtn').on('click', function() {
                let selectedIds = $('.bookingCheckbox:checked').map(function() {
                    return $(this).val();
                }).get();
                if (confirm('Are you sure you want to delete the selected bookings?')) {
                    deleteBooking(selectedIds);
                }
            });

            function deleteBooking(ids) {
                $.ajax({
                    url: '{{ route('bookings.delete') }}', // Your route for deleting bookings
                    method: 'POST',
                    data: {
                        _token: '{{ csrf_token() }}', // CSRF token for security
                        ids: ids
                    },
                    success: function(response) {
                        alert('Bookings deleted successfully');
                        location.reload(); // Reload the page to update the table
                    },
                    error: function(xhr) {
                        alert('An error occurred while deleting the bookings');
                    }
                });
            }
        });
    </script>
</body>
</html>
