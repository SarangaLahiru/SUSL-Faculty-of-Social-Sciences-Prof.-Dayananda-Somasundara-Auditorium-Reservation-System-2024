@extends('layouts.app')

@section('title', 'Calendar')

@section('content')
<link href='https://use.fontawesome.com/releases/v5.0.6/css/all.css' rel='stylesheet'>
<link href='packages/core/main.css' rel='stylesheet' />
<link href='packages/bootstrap/main.css' rel='stylesheet' />
<link href='packages/timegrid/main.css' rel='stylesheet' />
<link href='packages/daygrid/main.css' rel='stylesheet' />
<link href='packages/list/main.css' rel='stylesheet' />
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"
    integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="{{ asset('css/check_availability.css') }}">
<link rel="stylesheet" href="{{ asset('css/app.css') }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.11.3/font/bootstrap-icons.min.css"
    integrity="sha512-dPXYcDub/aeb08c63jRq/k6GaKccl256JQy/AnOq7CAnEZ9FzSL9wSbcZkMp4R26vBsMLFYH4kQ67/bbV8XaCQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />


<link rel="stylesheet" href="{{ asset('css/services.css') }}">

<!--====== Bootstrap CSS ======-->

<!--====== gLightBox CSS ======-->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/glightbox@3.1.0/dist/css/glightbox.min.css" />



<body>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-size: 14px;
        }

        #top,
        #calendar.fc-unthemed {
            font-family: Arial, Helvetica Neue, Helvetica, sans-serif;
        }

        #top {
            background: #eee;
            border-bottom: 1px solid #ddd;
            padding: 0 10px;
            line-height: 40px;
            font-size: 12px;
            color: #000;
        }

        #top .selector {
            display: inline-block;
            margin-right: 10px;
        }

        #top select {
            font: inherit;
            /* mock what Boostrap does, don't compete  */
        }

        .left {
            float: left
        }

        .right {
            float: right
        }

        .clear {
            clear: both
        }

        #calendar {
            max-width: 1000px;
            margin: 40px auto;
            padding: 0 10px;
        }
    </style>

    <ul class="legend" style="display: flex; margin:  10px  auto; width:60%">
        <li>
            <div class="color-box accepted"></div>Accepted
        </li>
        <li>
            <div class="color-box pending"></div>Pending
        </li>
    </ul>

    <div class="shadow-lg p-3 mb-5 bg-body-tertiary rounded w-75 m-auto">
        <div id='calendar'></div>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/glightbox@3.1.0/dist/js/glightbox.min.js"></script>

<script src='packages/core/main.js'></script>
<script src='packages/interaction/main.js'></script>
<script src='packages/bootstrap/main.js'></script>
<script src='packages/daygrid/main.js'></script>
<script src='packages/timegrid/main.js'></script>
<script src='packages/list/main.js'></script>
<script src="https://cdn.ayroui.com/1.0/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
    integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
    crossorigin="anonymous"></script>

<script>
    //===== close navbar-collapse when a  clicked
    var navbarTogglerOne = document.querySelector(
        ".navbar-one .navbar-toggler"
    );
    navbarTogglerOne.addEventListener("click", function () {
        navbarTogglerOne.classList.toggle("active");
    });
</script>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
    integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
    crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
    integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
    crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
    integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
    crossorigin="anonymous"></script>


<script>

    document.addEventListener('DOMContentLoaded', function () {
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
            plugins: ['bootstrap', 'interaction', 'dayGrid', 'timeGrid', 'list'],

            themeSystem: 'bootstrap',
            events: @json($events),
            eventDidMount: function (info) {
                info.el.classList.add('booked-date');
            },
            header: {
                left: 'title',
                center: 'prev,next today',
                right: 'dayGridMonth,timeGridDay,listMonth'
            },


            weekNumbers: true,
            navLinks: true,
            eventLimit: true,
            initialView: 'listMonth',

        });
        calendar.render();



    });

</script>

@endsection
