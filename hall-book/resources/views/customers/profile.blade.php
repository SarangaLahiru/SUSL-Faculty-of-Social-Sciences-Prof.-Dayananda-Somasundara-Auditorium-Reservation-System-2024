@extends('layouts.app')

@section('title', 'user | profile Details')

@section('content')


<!-- Custom fonts for this template-->
{{--
<link href="/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css"> --}}
{{--
<link
    href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
    rel="stylesheet"> --}}

<!-- Custom styles for this template-->





<!-- Page Wrapper -->
<div id="wrapper">
    <!-- Sidebar -->
    <ul class="navbar-nav  sidebar toggled sidebar-dark accordion" style="background-color: rgb(35, 119, 255); id="
        accordionSideba">
        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#"">
                <div class=" sidebar-brand-icon">
            <i class="fas fa-building"></i>
            {{-- <i class="fas fa-user-tie"></i> --}}
</div>
<div class="sidebar-brand-text mx-3">{{ Auth::user()->first_name }}</div>
</a>
<!-- Divider -->
<hr class="sidebar-divider my-0">
<!-- Nav Item - Dashboard -->
<li class="nav-item">
    <a class="nav-link" href="{{ route('account') }}">
        <i class="fas fa-fw fa-tachometer-alt"></i>
        <span>Dashboard</span></a>
</li>
<!-- Divider -->
<hr class="sidebar-divider">

<!-- Nav Item - Analytics -->
<li class="nav-item active">
    <a class="nav-link"
       href="{{ route('customer.profile') }}"
       aria-expanded="true"
       aria-controls="collapseUtilities">
        <i class="fas fa-fw fa-user"></i>
        <span>Profile</span>
    </a>
</li>

{{-- <!-- Sidebar Toggler (Sidebar) -->
<div class="text-center d-none d-md-inline">
    <button class="rounded-circle border-0" id="sidebarToggle"></button>
</div> --}}
</ul>
<!-- End of Sidebar -->

<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">
    <!-- Main Content -->
    <div id="content">
        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
            <!-- Sidebar Toggle (Topbar) -->
            <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                <i class="fa fa-bars"></i>
            </button>
            <h2 class="h3 mb-0 text-gray-800">Hi! {{ Auth::user()->first_name }}</h2>

        </nav>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <div class="container-fluid">
            <!-- Page Heading -->
            <div class="container mt-5">
                <div class="row">
                    <div class="col-md-12">
                        <!-- Profile Header -->
                        <div class="text-center mb-4">
                            <h1>{{ $user->first_name }} {{ $user->last_name }}</h1>
                            <p class="text-muted">{{ $user->category }}</p>
                            <hr class="my-4" style="border-color: #007bff; width: 50px; height: 2px; margin: 0 auto;">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12">
                        <!-- User Details Section -->
                        <div class="card shadow-sm border-light">
                            <div class="card-body">
                                <h5 class="card-title">Profile Details</h5>
                                <hr>

                                @if($user->email)
                                    <p class="card-text"><strong>Email:</strong> {{ $user->email }}</p>
                                @endif

                                @if($user->phone_number)
                                    <p class="card-text"><strong>Phone Number:</strong> {{ $user->phone_number }}</p>
                                @endif

                                @if($user->NIC)
                                    <p class="card-text"><strong>NIC:</strong> {{ $user->NIC }}</p>
                                @endif

                                @if($user->student_no)
                                    <p class="card-text"><strong>Student No:</strong> {{ $user->student_no }}</p>
                                @endif

                                @if($user->faculty)
                                    <p class="card-text"><strong>Faculty:</strong> {{ $user->faculty }}</p>
                                @endif

                                @if($user->department)
                                    <p class="card-text"><strong>Department:</strong> {{ $user->department }}</p>
                                @endif

                                @if($user->institution)
                                    <p class="card-text"><strong>Institution:</strong> {{ $user->institution }}</p>
                                @endif

                                @if($user->division)
                                    <p class="card-text"><strong>Division:</strong> {{ $user->division }}</p>
                                @endif

                                @if($user->society)
                                    <p class="card-text"><strong>Society:</strong> {{ $user->society }}</p>
                                @endif

                                @if($user->post)
                                    <p class="card-text"><strong>Post:</strong> {{ $user->post }}</p>
                                @endif

                                @if($user->address)
                                    <p class="card-text"><strong>Address:</strong> {{ $user->address }}</p>
                                @endif

                                <!-- Add more fields if needed -->

                                <div class="text-center mt-4">
                                    <a href="{{ route('customer.profile.edit') }}" class="btn btn-primary btn-lg">Edit Profile</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>






        </div>
    </div>
</div>
</div>

<!-- Scripts -->
<script src="/vendor/jquery/jquery.min.js"></script>
{{--
<script src="/vendor/bootstrap/js/bootstrap.bundle.min.js"></script> --}}
{{--
<script src="/vendor/jquery-easing/jquery.easing.min.js"></script> --}}
<script src="/js/sb-admin-2.min.js"></script>
{{--
<script src="/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="/vendor/datatables/dataTables.bootstrap4.min.js"></script>
<script src="/js/demo/datatables-demo.js"></script> --}}
<script>
    document.getElementById('searchInput').addEventListener('keyup', function () {
        let searchText = this.value.toLowerCase();
        let bookingCards = document.querySelectorAll('.booking-card');

        bookingCards.forEach(function (card) {
            let reason = card.querySelector('.reason').innerText.toLowerCase();
            let status = card.querySelector('.status').innerText.toLowerCase();
            let dates = card.querySelector('.pl-3').innerText.toLowerCase();

            if (reason.includes(searchText) || status.includes(searchText) || dates.includes(searchText)) {
                card.style.display = '';
            } else {
                card.style.display = 'none';
            }
        });
    });
</script>


@endsection
