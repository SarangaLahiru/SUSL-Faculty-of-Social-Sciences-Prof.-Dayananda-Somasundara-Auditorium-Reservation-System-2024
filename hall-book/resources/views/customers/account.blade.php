<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Account</title>

    <!-- Custom fonts for this template-->
    <link href="/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="/css/sb-admin-2.min.css" rel="stylesheet">
    <link href="/vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">
        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon">
                    {{-- <i class="fas fa-laugh-wink"></i> --}}
                    {{-- <i class="fas fa-user-tie"></i> --}}
                </div>
                <div class="sidebar-brand-text mx-3">{{ Auth::user()->first_name }}</div>
            </a>
            <!-- Divider -->
            <hr class="sidebar-divider my-0">
            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="{{ route('admin.dashboard') }}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>
            <!-- Divider -->
            <hr class="sidebar-divider">
            <!-- Heading -->
            <div class="sidebar-heading">
                Interface
            </div>
            <!-- Nav Item - Analytics -->
            <li class="nav-item">
                <a class="nav-link" href="{{ route('admin.analytics') }}" aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-fw fa-wrench"></i>
                    <span>Analytics</span>
                </a>
            </li>

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>
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
                    <h2>Hi! {{ Auth::user()->first_name }}</h2>
                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Nav Item - Alerts -->
                        <div class="topbar-divider d-none d-sm-block"></div>
                        <!-- Nav Item - User Information -->
                        <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ Auth::user()->first_name }}</span>
                                <img class="img-profile rounded-circle" src="https://www.svgrepo.com/show/192244/man-user.svg">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    {{ Auth::user()->email }}
                                </a>
                                <div class="dropdown-divider"></div>

                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <form method="POST" action="{{ route('logout') }}" style="display: inline;">
                                        @csrf
                                        <button type="submit" class="dropdown-item">
                                            <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i> Logout
                                        </button>
                                    </form>
                                </a>
                            </div>
                        </li>
                    </ul>
                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">
                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
                    </div>

                    <div class="col-xl-4 col-md-6 mb-4">
                        <div class="card shadow h-100 py-2 border-primary bg-light">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1 d-flex align-items-center">
                                            <i class="fas fa-calendar-plus fa-2x mr-3 text-primary"></i>
                                            <span><strong>Create New Booking</strong></span>
                                        </div>
                                        <div class="mt-3">
                                            <p class="text-muted small mb-0">Quickly schedule your next event or meeting with just a few clicks.</p>
                                        </div>
                                    </div>
                                    <div class="col-auto">
                                        <a href="/" class="btn btn-primary btn-sm mt-3">Start Now</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Content Row -->
                    <div class="row">
                        @foreach ($bookings->sortByDesc('created_at') as $booking)
                        <div class="col-xl-4 col-md-6 mb-4">
                            <div class="card shadow h-100 py-2
                                {{ $booking->status === 'pending' ? 'border-left-warning' : ($booking->status === 'accepted' ? 'border-left-success' : 'border-left-secondary') }}">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Booking #{{ $loop->iteration }}
                                            </div>
                                            <div class="mb-2">
                                                <strong>Creation Date:</strong> {{ $booking->created_at->format('Y-m-d') }}
                                            </div>
                                            <div class="mb-2">
                                                <strong>Reason:</strong> {{ $booking->event_type }}
                                            </div>
                                            <div class="mb-2">
                                                <strong>Request Dates:</strong>
                                                <ul class="pl-3">
                                                    @foreach ($booking->booking_dates as $date)
                                                    <li>{{ $date['date'] }} - {{ date('g:i A', strtotime($date['start_time'])) }} to {{ date('g:i A', strtotime($date['end_time'])) }}</li>
                                                    @endforeach
                                                </ul>
                                            </div>
                                            <div class="mb-2 {{ $booking->status === 'pending' ? 'text-warning' : ($booking->status === 'accepted' ? 'text-success' : 'text-secondary') }}">
                                                <strong>Status:</strong> {{ $booking->status }}
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-center mt-3">
                                        <button type="button" class="btn btn-sm btn-outline-primary" data-toggle="modal" data-target="#viewMoreModal{{ $loop->iteration }}">View More</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Modal for Viewing More Details -->
                        <div class="modal fade" id="viewMoreModal{{ $loop->iteration }}" tabindex="-1" role="dialog" aria-labelledby="viewMoreModalLabel{{ $loop->iteration }}" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="viewMoreModalLabel{{ $loop->iteration }}">Booking Details</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                        <p><strong>Booking ID:</strong> {{ $booking->id }}</p>
                                        <p><strong>Created At:</strong> {{ $booking->created_at->format('Y-m-d H:i:s') }}</p>
                                        <p><strong>Event Type:</strong> {{ $booking->event_type }}</p>
                                        <p><strong>Status:</strong> {{ $booking->status }}</p>
                                        <p><strong>Request Dates:</strong></p>
                                        <ul>
                                            @foreach ($booking->booking_dates as $date)
                                            <li>{{ $date['date'] }} - {{ date('g:i A', strtotime($date['start_time'])) }} to {{ date('g:i A', strtotime($date['end_time'])) }}</li>
                                            @endforeach
                                        </ul>
                                        <p><strong>Description:</strong> {{ $booking->description }}</p>
                                        <!-- Add more detailed fields as necessary -->
                                        <div class="mt-3">
                                            <iframe src="{{ asset('storage/'.$booking->documents) }}" width="100%" height="500px" frameborder="0"></iframe>
                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="/vendor/jquery/jquery.min.js"></script>
    <script src="/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="/vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="/js/sb-admin-2.min.js"></script>
    <script src="/vendor/datatables/jquery.dataTables.min.js"></script>
    <script src="/vendor/datatables/dataTables.bootstrap4.min.js"></script>
    <script src="/js/demo/datatables-demo.js"></script>
</body>

</html>
