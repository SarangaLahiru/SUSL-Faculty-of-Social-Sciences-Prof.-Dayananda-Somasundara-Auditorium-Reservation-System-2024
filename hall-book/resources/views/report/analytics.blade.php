<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>Analytics Report</h1>
<table class="table">
    <thead>
        <tr>
            <th>Category</th>
            <th>Total Accepted Bookings</th>
        </tr>
    </thead>
    <tbody>
        @foreach($analyticsData as $data)
            <tr>
                <td>{{ $data->category }}</td>
                <td>{{ $data->total }}</td>
            </tr>
        @endforeach
    </tbody>
</table>
</body>
</html>
