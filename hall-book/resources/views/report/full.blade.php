<!DOCTYPE html>
<html>

<head>
    <title>Prof. Dayananda Somasundara Auditorium - Hall Reservation System</title>
    <style>
        @page {
            size: A4 landscape;;
            margin: 20mm;
        }

        body {
            font-family: 'Roboto', Arial, sans-serif;
            font-size: 14px;
            margin: 0;
            padding: 0;
            background-color: #f9f9f9;
            color: #333;
        }

        .container {
            width: 100%;
            max-width: 210mm;
            /* A4 width */
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            box-sizing: border-box;
        }

        .title {
            text-align: center;
            margin-bottom: 20px;
        }

        .title img {
            margin-bottom: 10px;
        }

        .title h1 {
            font-size: 32px;
            margin-bottom: 5px;
            color: #333;
        }

        .title p {
            font-size: 18px;
            margin-bottom: 5px;
            color: #666;
        }

        .title .date-time {
            font-size: 7px;
            color: #999;
            position: relative;
            left: -100px;

        }

        table {
            width: 90%;
            border-collapse: collapse;
            margin-top: 20px;
            font-size: 10px;
        }

        th,
        td {
            padding: 12px 15px;
            text-align: left;
            border: 1px solid #ddd;
        }

        th {
            background-color: #f4f4f4;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="title">
            <img src="./logo2.png" alt="Logo" height="80">
            <h1>Prof. Dayananda Somasundara Auditorium</h1>
            <p>Hall Reservation System</p>
            {{--  <div class="date-time">
                <p>{{ \Carbon\Carbon::now()->toFormattedDateString() }}</p>
                <p>{{ \Carbon\Carbon::now()->toTimeString() }}</p>
            </div>  --}}
        </div>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Booking Dates</th>
                    <th>Created Date</th>
                    <th>Status</th>
                    <th>Category</th>
                    <th>Reason</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($fullReportData as $index => $booking)
                <tr>
                    <td class="index">{{ $loop->iteration }}</td>
                    <td class="name" style="width:20px;">{{ $booking->name }}</td>
                    <td class="email" style="width:50px;"><div>{{ $booking->email }}</div></td>
                    <td class="booking-dates">
                        @foreach ($booking->booking_dates as $date)
                        <div style="width:150px;">{{ \Carbon\Carbon::parse($date['date'])->format('Y-m-d') }} ({{
                            \Carbon\Carbon::parse($date['start_time'])->format('h:i A') }} - {{
                            \Carbon\Carbon::parse($date['end_time'])->format('h:i A') }})</div>
                        @endforeach
                    </td>
                    <td class="created-date">{{ $booking->created_at->format('Y-m-d h:i A') }}</td>
                    <td class="status">{{ $booking->status }}</td>
                    <td class="category">{{ $booking->category }}</td>
                    <td class="reason">{{ $booking->event_type }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>

</html>
