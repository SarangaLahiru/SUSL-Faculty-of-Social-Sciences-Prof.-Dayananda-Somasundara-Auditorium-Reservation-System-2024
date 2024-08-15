<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Request Received</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #e3e3e3;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 600px;
            margin: 20px auto;
            background-color: #fff;
            border-radius: 8px;
            overflow: hidden;
            border-radius: 8px;
            border: 1px rgb(228, 228, 228) solid;
        }

        .header {
            background-color: #007bff;
            color: #fff;
            text-align: center;
            padding: 30px 0;
        }

        .header h1 {
            margin: 0;
            font-size: 24px;
        }

        .content {
            padding: 30px;
        }

        .content p {
            margin: 0 0 10px;
            line-height: 1.6;
        }

        .content ul {
            margin-top: 10px;
            padding-left: 20px;
        }

        .footer {
            background-color: #f8f9fa;
            color: #333;
            text-align: center;
            padding: 10px 0;
        }

        .footer small {
            font-size: 12px;
        }
    </style>
</head>

<body>
    <div class="container shadow-lg">
        <div class="header">
            <h1>Booking Request Received</h1>
            <p>Prof. Dayananda Somasundara Auditorium </p>
        </div>
        <div class="content">
            <p>Dear Sir/Madam,</p>
            <p>Your hall booking request has been received and is awaiting confirmation.</p>
            <p>Below are the details of your booking request:</p>
            <p><strong>Event Type:</strong> {{ $booking->event_type }}</p>
            <p><strong>Event Description:</strong> {{ $booking->event_description }}</p>
            <p><strong>Booking Dates:</strong></p>
            <ul>
                @foreach ($booking->booking_dates as $date)
                <li>{{ $date['date'] }} - {{ $date['start_time'] }} to {{ $date['end_time'] }}</li>
                @endforeach
            </ul>
            <p>We will notify you once your booking request is accepted. Thank you for choosing our service!</p>
            <p>Best regards,</p>
            <p>Manager,</p>
            <p>Prof. Dayananda Somasundara Auditorium - Hall Reservation System</p>
            <p>Contact Information:</p>
            <p>Phone: +94 45-2280021</p>
            <p>Email: audi@ssl.sab.ac.lk </p>
        </div>
        <div class="footer">
            <small>&copy; {{ date('Y') }} Prof. Dayananda Somasundara Auditorium - Hall Reservation System. All rights
                reserved.</small>
        </div>
    </div>
</body>

</html>
