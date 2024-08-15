<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Rejected</title>
    <style>
        /* Styles for the email template */
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            color: #333;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 600px;
            margin: 20px auto;
            border-radius: 8px;
            background-color: #ffffff;
            border-radius: 8px;
            border: 1px rgb(228, 228, 228) solid;
        }

        .header {
            background-color: #007bff;
            color: white;
            padding: 20px;
            text-align: center;
        }

        .header h1 {
            margin: 0;
        }

        .header .reject-icon {
            font-size: 48px;
            margin-bottom: 10px;
        }

        .content {
            padding: 20px;
        }

        .content p {
            margin: 10px 0;
        }

        .footer {
            background-color: #f8f9fa;
            color: #333;
            padding: 10px;
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="container shadow-lg">
        <div class="header">
            <!-- <div class="reject-icon">X</div> -->
            <h1>Booking Rejected</h1>
            <p>Prof. Dayananda Somasundara Auditorium </p>
        </div>
        <div class="content">
            <p>Dear Sir/Madam,</p>
            <p>We regret to inform you that your booking has been rejected for the following reason:</p>
            <p><strong>Reason for Rejection:</strong> {{ $reason }}</p>
            <p><strong>Requested Booking Dates:</strong></p>
            <ul>
                @foreach ($booking->booking_dates as $date)
                <li>{{ $date['date'] }} - {{ date('g:i A', strtotime($date['start_time'])) }} to {{ date('g:i A',
                    strtotime($date['end_time'])) }}</li>
                @endforeach
            </ul>
            <p>If you have any questions or need further clarification, please feel free to contact us.</p>
            <p>Thank you.</p>
            <p>Best regards,</p>
            <p>Manager,</p>
            <p>Prof. Dayananda Somasundara Auditorium Hall Reservation System</p>
            <p>Contact Information:</p>
            <p>Phone: +94 45-2280021</p>
            <p>Email: audi@ssl.sab.ac.lk </p>
        </div>
        <div class="footer">
            <small>&copy; {{ date('Y') }} Prof. Dayananda Somasundara Auditorium Hall Reservation System. All rights
                reserved.</small>
        </div>
    </div>
</body>

</html>
