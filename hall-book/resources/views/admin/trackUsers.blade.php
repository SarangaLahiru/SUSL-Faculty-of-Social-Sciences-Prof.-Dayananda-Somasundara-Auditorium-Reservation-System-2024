<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>User Details</title>
    <!-- Add Bootstrap CSS for styling -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-4">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary">Details for {{ $user->first_name }} {{ $user->last_name }}</h6>
            </div>
            <div class="card-body">
                <ul class="list-group">
                    <li class="list-group-item"><strong>First Name:</strong> {{ $user->first_name }}</li>
                    <li class="list-group-item"><strong>Last Name:</strong> {{ $user->last_name }}</li>
                    <li class="list-group-item"><strong>NIC:</strong> {{ $user->NIC }}</li>
                    <li class="list-group-item"><strong>Phone Number:</strong> {{ $user->phone_number }}</li>
                    <li class="list-group-item"><strong>Email:</strong> {{ $user->email }}</li>
                    <li class="list-group-item"><strong>Student Number:</strong> {{ $user->student_no ?? 'N/A' }}</li>
                    <li class="list-group-item"><strong>Faculty:</strong> {{ $user->faculty ?? 'N/A' }}</li>
                    <li class="list-group-item"><strong>Department:</strong> {{ $user->department ?? 'N/A' }}</li>
                    <li class="list-group-item"><strong>Institution:</strong> {{ $user->institution ?? 'N/A' }}</li>
                    <li class="list-group-item"><strong>Division:</strong> {{ $user->division ?? 'N/A' }}</li>
                    <li class="list-group-item"><strong>Society:</strong> {{ $user->society ?? 'N/A' }}</li>
                    <li class="list-group-item"><strong>Post:</strong> {{ $user->post ?? 'N/A' }}</li>
                    <li class="list-group-item"><strong>Category:</strong> {{ $user->category }}</li>
                </ul>
                <!-- Optional: Add a button to go back or take other actions -->
                <a href="{{ route('admin.accounts') }}" class="btn btn-primary mt-3">Back to Accounts</a>
            </div>
        </div>
    </div>
    <!-- Add Bootstrap JS (optional) -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
