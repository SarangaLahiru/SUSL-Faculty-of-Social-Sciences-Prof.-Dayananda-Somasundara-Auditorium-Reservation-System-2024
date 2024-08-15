@extends('layouts.app')

@section('title', 'Staff & Services')

@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.11.3/font/bootstrap-icons.min.css"
    integrity="sha512-dPXYcDub/aeb08c63jRq/k6GaKccl256JQy/AnOq7CAnEZ9FzSL9wSbcZkMp4R26vBsMLFYH4kQ67/bbV8XaCQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="https://cdn.ayroui.com/1.0/css/bootstrap.min.css" />

<!--====== Lineicons CSS ======-->
<link href="https://cdn.lineicons.com/3.0/lineicons.css" rel="stylesheet" />

<!--====== Style css ======-->
<link rel="stylesheet" href="https://cdn.ayroui.com/1.0/css/starter.css" />
<link rel="stylesheet" href="{{ asset('css/app.css') }}">
<link rel="stylesheet" href="{{ asset('css/resources.css') }}">
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
<!-- Bootstrap and FontAwesome -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">

<style>
    .feature-icon {
        font-size: 2rem;
        color: #007bff;
        flex-shrink: 0;
    }

    .feature-list {
        list-style: none;
        padding-left: 0;
    }

    .feature-list li {
        display: flex;
        align-items: center;
        margin-bottom: 20px;
        border-bottom: 1px solid #ddd;
        padding-bottom: 10px;
    }

    .feature-list li:last-child {
        border-bottom: none;
    }

    .feature-list li i {
        margin-right: 15px;
    }

    .feature-list li span {
        font-size: 1.2rem;
    }

    .common-image {
        max-width: 100%;
        height: auto;
        border-radius: 10px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .feature-section {
        display: flex;
        align-items: center;
        justify-content: space-between;
    }
</style>
<div id="loadingIndicator" class="loading-indicator">
    <div class="d-flex justify-content-center align-items-center"
        style="height: 100vh; position: fixed; top: 0; left: 0; right: 0; bottom: 0; background-color: rgba(255, 255, 255, 0.8); z-index: 1000;">
        <div class="spinner-border text-primary" role="status">
            <span class="visually-hidden"></span>
        </div>
        {{-- Uncomment below to add loading text --}}
        {{-- <p class="loading-text" style="color:rgb(0, 153, 255);">Loading...</p> --}}
    </div>
</div>


<!--======  Start Section Title One ======-->
<div class="section-title-one mt-4">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="text-center">
                    <div class="content mt-2">
                        <h2 class="fw-bold">Meet Our Staff</h2>
                        <p class="lead">
                            Our dedicated team is here to ensure your event is a success.
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <!-- row -->
    </div>
    <!-- container -->
</div>
<!--====== ABOUT TWO PART ENDS ======-->
<!--====== TEAM STYLE ONE START ======-->
<section class="team-area">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-lg-4">
                <div class="single-team text-center team-style-one">
                    <div class="team-image">
                        <img src="Images/Mrs. YS Chandrasekara.jpg" alt="Team" />
                    </div>
                    <div class="team-content">
                        <h4 class="name">Mrs. Yashoda Chandrasekara</h4>
                        <span class="sub-title">Manager</span>
                        <ul class="social">
                            {{--  <li>
                                <a href="javascript:void(0)">
                                    <i class="lni lni-facebook-filled"></i>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0)">
                                    <i class="lni lni-twitter-original"></i>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0)">
                                    <i class="lni lni-linkedin-original"></i>
                                </a>
                            </li>  --}}
                        </ul>
                    </div>
                </div>
                <!-- single team -->
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="single-team text-center team-style-one">
                    <div class="team-image">

                        <img src="Images/PM Chamith Janaka Bandara.jpg" alt="Team" />
                    </div>
                    <div class="team-content">
                        <h4 class="name">Mr.Chamith Bandara</h4>
                        <span class="sub-title">Technical Officer</span>
                        <ul class="social">
                            {{--  <li>
                                <a href="javascript:void(0)">
                                    <i class="lni lni-facebook-filled"></i>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0)">
                                    <i class="lni lni-twitter-original"></i>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0)">
                                    <i class="lni lni-linkedin-original"></i>
                                </a>
                            </li>  --}}
                        </ul>
                    </div>
                </div>
                <!-- single team -->
            </div>
            <div class="col-md-6 col-lg-4">
                <div class="single-team text-center team-style-one">
                    <div class="team-image">
                        <img src="Images/G kithsiri Fernando.png" height="450px" alt="Team" />

                    </div>
                    <div class="team-content">
                        <h4 class="name">Mr.Kithsiri Fernando</h4>
                        <span class="sub-title">Technical Officer</span>
                        <ul class="social">
                            {{--  <li>
                                <a href="javascript:void(0)">
                                    <i class="lni lni-facebook-filled"></i>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0)">
                                    <i class="lni lni-twitter-original"></i>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0)">
                                    <i class="lni lni-linkedin-original"></i>
                                </a>
                            </li>  --}}
                        </ul>
                    </div>
                </div>
                <!-- single team -->
            </div>

        </div>
        <!-- row -->
    </div>
    <!-- container -->
</section>
<!--====== TEAM STYLE ONE ENDS ======-->
<div class="container" style="margin-top: 80px;">
    <div class="text-center mb-5">
        <h1> Our Features!</h1>
        <p class="lead">At the Prof. Dayananda Somasundara Auditorum, we pride ourselves on providing top-notch
            facilities to make your events unforgettable.</p>
    </div>

    <div class="row feature-section">
        <div class="col-md-6 mb-4">
            <img src="images/img-9.png" class="common-image" alt="Hall Image">
        </div>
        <div class="col-md-6">
            <ul class="feature-list">
                <li>
                    <i class="fas fa-building feature-icon"></i>
                    <span>Spacious Hall</span>
                </li>
                <li>
                    <i class="fas fa-chess-king feature-icon"></i>
                    <span>Elegant Stage</span>
                </li>
                <li>
                    <i class="fas fa-lightbulb feature-icon"></i>
                    <span>Advanced Lighting System</span>
                </li>
                <li>
                    <i class="fas fa-volume-up feature-icon"></i>
                    <span>High-Quality Audio System</span>
                </li>
                <li>
                    <i class="fas fa-tv feature-icon"></i>
                    <span>Multimedia Facilities</span>
                </li>
                <li>
                    <i class="fas fa-binoculars feature-icon"></i>
                    <span>Balcony Seating</span>
                </li>
            </ul>
        </div>
    </div>
</div>





<script src="https://cdn.jsdelivr.net/npm/glightbox@3.1.0/dist/js/glightbox.min.js"></script>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        showLoadingIndicator();
    });
    window.onload = function () {
        hideLoadingIndicator();
    };

    function showLoadingIndicator() {
        document.getElementById('loadingIndicator').style.display = 'block';
    }

    function hideLoadingIndicator() {
        document.getElementById('loadingIndicator').style.display = 'none';
    }
</script>
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
<script src="https://cdn.jsdelivr.net/npm/glightbox@3.1.0/dist/js/glightbox.min.js"></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
    integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
    crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
    integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
    crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
    integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
    crossorigin="anonymous"></script>

@endsection
