<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Success</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
</head>

<body>
    <script>
        Swal.fire({
            title: 'Success!',
            html: '{{ $success }}<br><br>Check your email for further information.<br>If your request is accepted, we will inform you.',
            icon: 'success',
            confirmButtonText: 'Okay',
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