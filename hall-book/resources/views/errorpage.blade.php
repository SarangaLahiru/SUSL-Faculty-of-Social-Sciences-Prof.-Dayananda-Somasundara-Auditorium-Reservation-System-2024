<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>error</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
</head>

<body>
    <script>
        Swal.fire({
            title: 'Sorry!',
            html: '{{ $error }}<br><br>your timeslot is already booked .<br>Please check event calender',
            icon: 'error',
            confirmButtonText: 'try again',
            timer: 10000, // Set the timer to 3 seconds (3000 milliseconds)
            timerProgressBar: true, // Show a progress bar during the timer
            onClose: () => {
                // Redirect to another page after the timer expires
                window.location.href = '/';
            }
        });

    </script>
</body>

</html>
