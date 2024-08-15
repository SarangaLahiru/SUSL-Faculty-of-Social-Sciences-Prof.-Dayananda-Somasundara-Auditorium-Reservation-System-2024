@extends('layouts.app')

@section('title', 'Events')

@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.11.3/font/bootstrap-icons.min.css"
    integrity="sha512-dPXYcDub/aeb08c63jRq/k6GaKccl256JQy/AnOq7CAnEZ9FzSL9wSbcZkMp4R26vBsMLFYH4kQ67/bbV8XaCQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />

<link rel="stylesheet" href="{{ asset('css/app.css') }}">
<link rel="stylesheet" href="{{ asset('css/services.css') }}">
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
<!-- Bootstrap and FontAwesome -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" rel="stylesheet">
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">

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




<!--====== SLIDER ONE PART START ======-->
{{-- <section class="slider-area slider-one">
    <div class="bd-example">
        <div id="carouselOne" class="carousel slide" data-bs-ride="carousel">
            <ol class="carousel-indicators">
                <li data-bs-target="#carouselOne" data-bs-slide-to="0" class="active"></li>
                <li data-bs-target="#carouselOne" data-bs-slide-to="1"></li>
                <li data-bs-target="#carouselOne" data-bs-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item bg_cover active" style="
                   background-image: url(/Images/_AVU8959.JPG);
                   background-size:'cover';
                   ">
                    <div class="carousel-caption">
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-xl-6 col-lg-7 col-sm-10">
                                    <h2 class="carousel-title">
                                        Unlimited Friendly & Easy Customisable
                                    </h2>
                                    <p class="text">
                                        Lorem Ipsum is simply dummy text of the printing and
                                        typesetting industry. Lorem Ipsum has been the
                                        industrys standard.
                                    </p>
                                    <ul class="carousel-btn rounded-buttons">
                                        <li>
                                            <a class="btn primary-btn rounded-full" href="javascript:void(0)">
                                                GET STARTED
                                            </a>
                                        </li>
                                        <li>
                                            <a class="btn primary-btn-outline rounded-full" href="javascript:void(0)">
                                                DOWNLOAD
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <!-- row -->
                        </div>
                        <!-- container -->
                    </div>
                    <!-- carousel caption -->
                </div>
                <!-- carousel-item -->
                <div class="carousel-item bg_cover" style="
                   background-image: url(/Images/_AVU5214.JPG);
                   ">
                    <div class="carousel-caption">
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-xl-6 col-lg-7 col-sm-10">
                                    <h2 class="carousel-title">
                                        Unlimited Friendly & Easy Customisable
                                    </h2>
                                    <p class="text">
                                        Lorem Ipsum is simply dummy text of the printing and
                                        typesetting industry. Lorem Ipsum has been the
                                        industrys standard.
                                    </p>
                                    <ul class="carousel-btn rounded-buttons">
                                        <li>
                                            <a class="btn primary-btn rounded-full" href="javascript:void(0)">
                                                GET STARTED
                                            </a>
                                        </li>
                                        <li>
                                            <a class="btn primary-btn-outline rounded-full" href="javascript:void(0)">
                                                DOWNLOAD
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <!-- row -->
                        </div>
                        <!-- container -->
                    </div>
                    <!-- carousel caption -->
                </div>
                <!-- carousel-item -->
                <div class="carousel-item bg_cover" style="
                   background-image: url(/Images/_AVU4617.JPG);
                   ">
                    <div class="carousel-caption">
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-xl-6 col-lg-7 col-sm-10">
                                    <h2 class="carousel-title">
                                        Unlimited Friendly & Easy Customisable
                                    </h2>
                                    <p class="text">
                                        Lorem Ipsum is simply dummy text of the printing and
                                        typesetting industry. Lorem Ipsum has been the
                                        industrys standard.
                                    </p>
                                    <ul class="carousel-btn rounded-buttons">
                                        <li>
                                            <a class="btn primary-btn rounded-full" href="javascript:void(0)">
                                                GET STARTED
                                            </a>
                                        </li>
                                        <li>
                                            <a class="btn primary-btn-outline rounded-full" href="javascript:void(0)">
                                                DOWNLOAD
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <!-- row -->
                        </div>
                        <!-- container -->
                    </div>
                    <!-- carousel caption -->
                </div>
                <!-- carousel-item -->
            </div>
            <!-- carousel-inner -->
            <a class="carousel-control-prev" href="#carouselOne" role="button" data-bs-slide="prev">
                {{-- <i class="lni lni-chevron-left"></i> --}}
                {{-- <i class="bi bi-arrow-left-short"></i>
            </a>
            <a class="carousel-control-next" href="#carouselOne" role="button" data-bs-slide="next">
                {{-- <i class="lni lni-chevron-right"></i> --}}
                {{-- <i class="bi  bi-arrow-right-short"></i>
            </a>
        </div>
        <!-- carousel -->
    </div>
    <!-- bd-example -->
</section> --}}
<!--====== SLIDER ONE PART ENDS ======-->

<!--====== gLightBox CSS ======-->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/glightbox@3.1.0/dist/css/glightbox.min.css" />

<!--====== portfolio ONE PART START ======-->
<section class="portfolio-area portfolio-one">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xxl-6 col-xl-7 col-lg-8">
                <div class="section-title text-center mb-5">
                    <h2 class="mb-3 fw-bold ">Events at the Prof. Dayananda Somasundara Auditorum</h2>

                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="portfolio-menu">
                    {{--  <button data-filter="all" class="active">Events</button>  --}}
                    {{-- <button data-filter="branding">Lighting system</button>
                    <button data-filter="marketing">Audio System</button>
                    <button data-filter="planning">Stage</button> --}}
                    {{-- <button data-filter="research">RESEARCH</button> --}}
                </div>
                <!-- portfolio menu -->
            </div>
        </div>
        <!-- row -->
        <div class="row grid">
            <div class="col-lg-4 col-sm-6" data-filter="branding">
                <div class="portfolio-style-one text-center">
                    <div class="portfolio-image">
                        <img src="/Images/img-10.png" alt="image" />
                    </div>
                    <div class="portfolio-overlay d-flex align-items-center">
                        <div class="portfolio-content">
                            <div class="portfolio-icon">
                                <a class="image-popup-two glightbox"
                                    href="https://cdn.ayroui.com/1.0/images/portfolio/portfolio-1/pf1.jpg">
                                    <i class="lni lni-zoom-in"></i>
                                </a>
                            </div>
                            <div class="portfolio-text">
                                <h4 class="portfolio-title">
                                    <a href="javascript:void(0)">Events</a>
                                </h4>
                                <p class="text">
                                    Ceremony celebrating the achievements of our graduates.
                                </p>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- single portfolio -->
            </div>
            <div class="col-lg-4 col-sm-6" data-filter="marketing">
                <div class="portfolio-style-one text-center">
                    <div class="portfolio-image">
                        <img src="/Images/img-1.png" alt="image" />
                    </div>
                    <div class="portfolio-overlay d-flex align-items-center">
                        <div class="portfolio-content">
                            <div class="portfolio-icon">
                                <a class="image-popup-two glightbox"
                                    href="https://cdn.ayroui.com/1.0/images/portfolio/portfolio-1/pf2.jpg">
                                    <i class="lni lni-zoom-in"></i>
                                </a>
                            </div>
                            <div class="portfolio-text">
                                <h4 class="portfolio-title">
                                    <a href="javascript:void(0)">Events</a>
                                </h4>
                                <p class="text">
                                    Ceremony celebrating the achievements of our graduates.
                                </p>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- single portfolio -->
            </div>
            <div class="col-lg-4 col-sm-6" data-filter="branding">
                <div class="portfolio-style-one text-center">
                    <div class="portfolio-image">
                        <img src="/Images/img-2.png" alt="image" />
                    </div>
                    <div class="portfolio-overlay d-flex align-items-center">
                        <div class="portfolio-content">
                            <div class="portfolio-icon">
                                <a class="image-popup-two glightbox"
                                    href="https://cdn.ayroui.com/1.0/images/portfolio/portfolio-1/pf3.jpg">
                                    <i class="lni lni-zoom-in"></i>
                                </a>
                            </div>
                            <div class="portfolio-text">
                                <h4 class="portfolio-title">
                                    <a href="javascript:void(0)">Events</a>
                                </h4>
                                <p class="text">
                                    Ceremony celebrating the achievements of our graduates.
                                </p>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- single portfolio -->
            </div>
            <div class="col-lg-4 col-sm-6" data-filter="research">
                <div class="portfolio-style-one text-center">
                    <div class="portfolio-image">
                        <img src="/Images/img-3.png" alt="image" />
                    </div>
                    <div class="portfolio-overlay d-flex align-items-center">
                        <div class="portfolio-content">
                            <div class="portfolio-icon">
                                <a class="image-popup-two glightbox"
                                    href="https://cdn.ayroui.com/1.0/images/portfolio/portfolio-1/pf4.jpg">
                                    <i class="lni lni-zoom-in"></i>
                                </a>
                            </div>
                            <div class="portfolio-text">
                                <h4 class="portfolio-title">
                                    <a href="javascript:void(0)">Events</a>
                                </h4>
                                <p class="text">
                                    Ceremony celebrating the achievements of our graduates.
                                </p>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- single portfolio -->
            </div>
            <div class="col-lg-4 col-sm-6" data-filter="planning">
                <div class="portfolio-style-one text-center">
                    <div class="portfolio-image">
                        <img src="/Images/img-4.png" alt="image" />
                    </div>
                    <div class="portfolio-overlay d-flex align-items-center">
                        <div class="portfolio-content">
                            <div class="portfolio-icon">
                                <a class="image-popup-two glightbox"
                                    href="https://cdn.ayroui.com/1.0/images/portfolio/portfolio-1/pf5.jpg">
                                    <i class="lni lni-zoom-in"></i>
                                </a>
                            </div>
                            <div class="portfolio-text">
                                <h4 class="portfolio-title">
                                    <a href="javascript:void(0)">Events</a>
                                </h4>
                                <p class="text">
                                    Ceremony celebrating the achievements of our graduates.
                                </p>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- single portfolio -->
            </div>
            <div class="col-lg-4 col-sm-6" data-filter="research">
                <div class="portfolio-style-one text-center">
                    <div class="portfolio-image">
                        <img src="/Images/img-5.png" alt="image" />
                    </div>
                    <div class="portfolio-overlay d-flex align-items-center">
                        <div class="portfolio-content">
                            <div class="portfolio-icon">
                                <a class="image-popup-two glightbox"
                                    href="https://cdn.ayroui.com/1.0/images/portfolio/portfolio-1/pf6.jpg">
                                    <i class="lni lni-zoom-in"></i>
                                </a>
                            </div>
                            <div class="portfolio-text">
                                <h4 class="portfolio-title">
                                    <a href="javascript:void(0)">Events</a>
                                </h4>
                                <p class="text">
                                    Ceremony celebrating the achievements of our graduates.
                                </p>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- single portfolio -->
            </div>
            <div class="col-lg-4 col-sm-6" data-filter="planning">
                <div class="portfolio-style-one text-center">
                    <div class="portfolio-image">
                        <img src="/Images/img-6.png" alt="image" />
                    </div>
                    <div class="portfolio-overlay d-flex align-items-center">
                        <div class="portfolio-content">
                            <div class="portfolio-icon">
                                <a class="image-popup-two glightbox"
                                    href="https://cdn.ayroui.com/1.0/images/portfolio/portfolio-1/pf7.jpg">
                                    <i class="lni lni-zoom-in"></i>
                                </a>
                            </div>
                            <div class="portfolio-text">
                                <h4 class="portfolio-title">
                                    <a href="javascript:void(0)">Events</a>
                                </h4>
                                <p class="text">
                                    Ceremony celebrating the achievements of our graduates.
                                </p>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- single portfolio -->
            </div>
            <div class="col-lg-4 col-sm-6" data-filter="branding">
                <div class="portfolio-style-one text-center">
                    <div class="portfolio-image">
                        <img src="/Images/img-7.png" alt="image" />
                    </div>
                    <div class="portfolio-overlay d-flex align-items-center">
                        <div class="portfolio-content">
                            <div class="portfolio-icon">
                                <a class="image-popup-two glightbox"
                                    href="https://cdn.ayroui.com/1.0/images/portfolio/portfolio-1/pf8.jpg">
                                    <i class="lni lni-zoom-in"></i>
                                </a>
                            </div>
                            <div class="portfolio-text">
                                <h4 class="portfolio-title">
                                    <a href="javascript:void(0)">Events</a>
                                </h4>
                                <p class="text">
                                    Ceremony celebrating the achievements of our graduates.
                                </p>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- single portfolio -->
            </div>
            <div class="col-lg-4 col-sm-6" data-filter="marketing">
                <div class="portfolio-style-one text-center">
                    <div class="portfolio-image">
                        <img src="/Images/img-9.png" alt="image" />
                    </div>
                    <div class="portfolio-overlay d-flex align-items-center">
                        <div class="portfolio-content">
                            <div class="portfolio-icon">
                                <a class="image-popup-two glightbox"
                                    href="https://cdn.ayroui.com/1.0/images/portfolio/portfolio-1/pf9.jpg">
                                    <i class="lni lni-zoom-in"></i>
                                </a>
                            </div>
                            <div class="portfolio-text">
                                <h4 class="portfolio-title">
                                    <a href="javascript:void(0)">Events</a>
                                </h4>
                                <p class="text">
                                    Ceremony celebrating the achievements of our graduates.
                                </p>
                            </div>

                        </div>
                    </div>
                </div>
                <!-- single portfolio -->
            </div>
        </div>
        <!-- row -->
    </div>
    <!-- container -->
</section>
<!--====== portfolio ONE PART ENDS ======-->

<!--====== gLightBox js ======-->
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
    const filters = document.querySelectorAll(".portfolio-menu button");

    filters.forEach((filter) => {
        filter.addEventListener("click", function () {
            // ==== Filter btn toggle
            let filterBtn = filters[0];
            while (filterBtn) {
                if (filterBtn.tagName === "BUTTON") {
                    filterBtn.classList.remove("active");
                }
                filterBtn = filterBtn.nextSibling;
            }
            this.classList.add("active");

            // === filter
            let selectedFilter = filter.getAttribute("data-filter");
            let itemsToHide = document.querySelectorAll(
                `.grid .col-lg-4:not([data-filter='${selectedFilter}'])`
            );
            let itemsToShow = document.querySelectorAll(
                `.grid [data-filter='${selectedFilter}']`
            );

            if (selectedFilter == "all") {
                itemsToHide = [];
                itemsToShow = document.querySelectorAll(".grid [data-filter]");
            }

            itemsToHide.forEach((el) => {
                el.classList.add("hide");
                el.classList.remove("show");
            });

            itemsToShow.forEach((el) => {
                el.classList.remove("hide");
                el.classList.add("show");
            });
        });
    });

    //========= glightbox
    const myGallery = GLightbox({
        selector: ".glightbox",
        type: "image",
        width: 900,
    });
</script>


<script src="https://cdn.ayroui.com/1.0/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
    integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
    crossorigin="anonymous"></script>

@endsection
