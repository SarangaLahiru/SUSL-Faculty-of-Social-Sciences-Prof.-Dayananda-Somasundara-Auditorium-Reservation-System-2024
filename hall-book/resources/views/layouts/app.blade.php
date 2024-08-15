<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>
    <link rel="icon" type="image/png" href="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcStbJ4CDaAVPY2HEO-24xhHccIyQkbZFfy37w&s">

    <!-- Bootstrap and FontAwesome -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/check_availability.css') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

<body>
    <!--====== NAVBAR ONE PART START ======-->
    <section class="navbar-area navbar-one">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <nav class="navbar navbar-expand-lg">
                        <a class="navbar-brand" href="/">
                            <img src="/logo.png" alt="Logo" width="300px" />
                        </a>
                        <button
                            class="navbar-toggler"
                            type="button"
                            data-toggle="collapse"
                            data-target="#navbarOne"
                            aria-controls="navbarOne"
                            aria-expanded="false"
                            aria-label="Toggle navigation"
                        >
                            <span class="toggler-icon"></span>
                            <span class="toggler-icon"></span>
                            <span class="toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse sub-menu-bar" id="navbarOne">
                            <ul class="navbar-nav m-auto">
                                <li class="nav-item">
                                    <a href="/" class="nav-link">
                                        Booking
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/calendar" class="nav-link">
                                        Calendar
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/staff" class="nav-link">
                                        Staff & Resources
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/resources" class="nav-link">
                                        Past Events
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a href="/support" class="nav-link">
                                        Help
                                    </a>
                                </li>
                            </ul>
                            <div class="navbar-btn d-none d-sm-inline-block">
                                {{-- Commented out contact details --}}
                            </div>
                            <ul class="navbar-nav">
                                @auth
                                <!-- User is authenticated -->
                                <li class="dropdown">
                                    <a
                                        class="nav-link dropdown-toggle"
                                        href="#"
                                        id="navbarDropdown"
                                        role="button"
                                        data-toggle="dropdown"
                                        aria-expanded="false"
                                    >
                                        <span
                                            class="rounded-circle bg-warning text-white d-inline-block text-center p-2"
                                            style="font-size: 18px; width:40px"
                                        >
                                            {{ strtoupper(Auth::user()->first_name[0] ?? '') }}{{ strtoupper(Auth::user()->last_name[0] ?? '') }}
                                        </span>
                                    </a>

                                    <ul class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="navbarDropdown">
                                        <li>
                                            <a class="dropdown-item" href="#">
                                                <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                                {{ Auth::user()->email }}
                                            </a>
                                        </li>
                                        <li>
                                            <div class="dropdown-divider"></div>
                                        </li>
                                        <li>
                                            <a class="dropdown-item" href="{{ route('account') }}">
                                                <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                                Dashboard
                                            </a>
                                        </li>
                                        <li>
                                            <div class="dropdown-divider"></div>
                                        </li>
                                        <li>
                                            <form method="POST" action="{{ route('logout') }}" style="display: inline;">
                                                @csrf
                                                <button type="submit" class="dropdown-item">
                                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i> Logout
                                                </button>
                                            </form>
                                        </li>
                                    </ul>

                                </li>
                                @else
                                <!-- User is not authenticated -->
                                <div class="navbar-btn d-none d-sm-inline-block">
                                    <ul>
                                        <li>
                                            <a class="btn primary-btn-outline" href="{{ route('login') }}">
                                                Sign In
                                            </a>
                                        </li>
                                        <li>
                                            <a class="btn primary-btn" href="{{ route('register') }}">
                                                Sign Up
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                                @endauth
                            </ul>
                        </div>
                    </nav>
                    <!-- navbar -->
                </div>
            </div>
            <!-- row -->
        </div>
        <!-- container -->
    </section>
    <!--====== NAVBAR ONE PART ENDS ======-->

    <div>
        @yield('content')
    </div>

    <!-- Enhanced Footer -->
    <footer class="bg-primary text-light pt-5 pb-4" style="margin-top: 50px;">
        <div class="container">
            <div class="row">
                <!-- Contact Info -->
                <div class="col-md-4 mb-4" style="color: white;">
                    <h5 class="text-uppercase font-weight-bold">Contact Information</h5>
                    <p>
                        <i class="fas fa-map-marker-alt me-2"></i> Faculty of Social Sciences and Languages,<br>
                        Sabaragamuwa University of Sri Lanka,<br>
                        P.O. Box 02, Belihuloya 70140, Sri Lanka
                    </p>
                    <p>
                        <i class="fas fa-phone-alt me-2"></i> +94 45-2280021
                    </p>
                    <p>
                        <i class="fas fa-envelope me-2"></i><a href="mailto:example@gmail.com" class="text-light"> audi@ssl.sab.ac.lk </a>
                    </p>
                </div>
                <!-- Navigation Links -->
                <div class="col-md-4 mb-4">
                    <h5 class="text-uppercase font-weight-bold">Quick Links</h5>
                    <ul class="list-unstyled">
                        <li><a href="#" class="text-light d-block mb-2"><i class="fas fa-calendar-alt me-2"></i> Booking Calendar</a></li>
                        <li><a href="#" class="text-light d-block mb-2"><i class="fas fa-users me-2"></i> Staff & Resources</a></li>
                        <li><a href="#" class="text-light d-block mb-2"><i class="fas fa-history me-2"></i> Past Events</a></li>
                        <li><a href="#" class="text-light d-block mb-2"><i class="fas fa-question-circle me-2"></i> Help</a></li>
                    </ul>
                </div>
                <!-- Logo and Social Media -->
                <div class="col-md-4 mb-4 text-center">
                    <img src="logo.png" alt="Logo" class="img-fluid mb-3" style="max-width: 100%;">
                </div>
            </div>
            <hr style="background-color: white;">
            <div class="row mt-4">
                <div class="col text-center">
                    <p style="color: white;">&copy; 2024 Prof. Dayananda Somasundara Auditorium - Hall Reservation System. All Rights Reserved.</p>
                </div>
            </div>
        </div>
    </footer>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-KsvH2XxJ4JknvRbA0jbGkz2yZJquFV18BxjzBXCGj2L1fu+NXV9aW4G5f7qNyngg" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

    <script>
        // Initialize AOS
        AOS.init();

        // Toggle navbar collapse on click
        var navbarTogglerOne = document.querySelector(".navbar-one .navbar-toggler");
        navbarTogglerOne.addEventListener("click", function() {
            navbarTogglerOne.classList.toggle("active");
        });
    </script>
</body>

</html>
