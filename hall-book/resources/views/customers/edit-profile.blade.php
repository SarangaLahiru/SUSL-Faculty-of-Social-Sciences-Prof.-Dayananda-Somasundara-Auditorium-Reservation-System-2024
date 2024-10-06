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
                <div class="container mt-5">
                    <h1 class="mb-4">Edit Profile</h1>

                    <!-- Display validation errors -->
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <!-- Profile Edit Form -->
                    <form method="POST" action="{{ route('customer.profile.update') }}">
                        @csrf

                        <div class="card shadow-sm border-light mb-4">
                            <div class="card-body">

                                <div class="form-group">
                                    <label for="first_name">First Name</label>
                                    <input type="text" name="first_name" id="first_name" class="form-control" value="{{ old('first_name', $user->first_name) }}" required>
                                </div>

                                <div class="form-group">
                                    <label for="last_name">Last Name</label>
                                    <input type="text" name="last_name" id="last_name" class="form-control" value="{{ old('last_name', $user->last_name) }}" required>
                                </div>

                                @if($user->email)
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="email" name="email" id="email" class="form-control" value="{{ old('email', $user->email) }}" required>
                                    </div>
                                @endif

                                @if($user->phone_number)
                                    <div class="form-group">
                                        <label for="phone_number">Phone Number</label>
                                        <input type="text" name="phone_number" id="phone_number" class="form-control" value="{{ old('phone_number', $user->phone_number) }}">
                                    </div>
                                @endif



                                {{--  @if($user->student_no)
                                    <div class="form-group">
                                        <label for="student_no">Student Number</label>
                                        <input type="text" name="student_no" id="student_no" class="form-control" value="{{ old('student_no', $user->student_no) }}">
                                    </div>
                                @endif  --}}





                                @if($user->institution)
                                    <div class="form-group">
                                        <label for="institution">Institution</label>
                                        <input type="text" name="institution" id="institution" class="form-control" value="{{ old('institution', $user->institution) }}">
                                    </div>
                                @endif

                                @if($user->division)
                                    <div class="form-group">
                                        <label for="division">Division</label>
                                        <input type="text" name="division" id="division" class="form-control" value="{{ old('division', $user->division) }}">
                                    </div>
                                @endif

                                @if($user->society)
                                    <div class="form-group">
                                        <label for="society">Society</label>
                                        <input type="text" name="society" id="society" class="form-control" value="{{ old('society', $user->society) }}">
                                    </div>
                                @endif

                                @if($user->post)
                                    <div class="form-group">
                                        <label for="post">Designation</label>
                                        <input type="text" name="post" id="post" class="form-control" value="{{ old('post', $user->post) }}">
                                    </div>
                                @endif

                                @if($user->address)
                                    <div class="form-group">
                                        <label for="address">Address</label>
                                        <input type="text" name="address" id="address" class="form-control" value="{{ old('address', $user->address) }}">
                                    </div>
                                @endif




                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary btn-lg">Save Changes</button>
                    </form>
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
