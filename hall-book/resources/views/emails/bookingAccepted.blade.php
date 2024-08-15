<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Booking Accepted</title>
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #fff;

            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 600px;
            margin: 20px auto;
            background-color: #ffffff;
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
    <div class="container">
        <div class="header">
            <h1>Your Booking Has Been Accepted</h1>
            <p>Prof. Dayananda Somasundara Auditorium</p>
        </div>
        <div class="content">
            <p>Dear Sir/Madam,</p>
            <p>We are pleased to inform you that your booking has been accepted. Below are the details:</p>
            <p><strong>Event Type:</strong> {{ $booking->event_type }}</p>
            <p><strong>Event Description:</strong> {{ $booking->event_description }}</p>
            <p><strong>Booking Dates:</strong></p>
            <ul>
                @foreach ($booking->booking_dates as $date)
                <li>{{ $date['date'] }} - {{ $date['start_time'] }} to {{ $date['end_time'] }}</li>
                @endforeach
            </ul>
            <p>Thank you for choosing our service!</p>
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
