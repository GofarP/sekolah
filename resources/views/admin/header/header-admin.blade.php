<head>

    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <title>M School - Selamat Datang di M School</title>

    {{-- Bootstrap --}}
    <link href="{{ url('bs/css/bootstrap.min.css') }}">
    {{-- Font Awesome --}}
    <link href="{{ url('bs/fontawesome/css/all.min.css') }}" rel="stylesheet" type="text/css">
    {{-- sb admin theme --}}
    <link href="{{ url('bs/css/sb-admin-2.min.css') }}" rel="stylesheet" />
    {{-- data tables --}}
    <link href="{{ url('bs/css/dataTables.bootstrap4.css') }}" rel="stylesheet" />
    {{-- bootstrap css date time picker --}}
    <link href="{{ url('bs/css/bootstrap-datetimepicker.min.css') }}" rel="stylesheet">


</head>

<body>
    @include('sweetalert::alert')

    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="/">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">Sekolah Lanjutan</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item {{ Request::is('/dashboard') ? 'active' : '' }}">
                <a class="nav-link " href="/admin/dashboard">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Keperluan Sekolah
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item {{ Request::is('admin/artikel*') ? 'active' : '' }}">
                <a class="nav-link collapsed " href="/admin/artikel" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-newspaper"></i>
                    <span>Artikel</span>
                </a>

                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Opsi Artikel Lanjutan:</h6>
                        <a class="collapse-item" href="{{ url('admin/artikel') }}">Daftar Artikel</a>
                        <a class="collapse-item" href="{{ url('admin/artikel/create') }}">Tambah Artikel</a>
                    </div>
                </div>

            </li>

            <!-- Nav Item - Utilities Collapse Menu -->
            <li class="nav-item {{ Request::is('admin/pengumuman*') ? 'active' : '' }}">
                <a class="nav-link collapsed " href="#" data-toggle="collapse" data-target="#collapsePengumuman"
                    aria-expanded="true" aria-controls="collapseAgenda">
                    <i class="fas fa-bullhorn"></i>
                    <span>Pengumuman</span>
                </a>

                <div id="collapsePengumuman" class="collapse" aria-labelledby="headingTwo"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded w-auto">
                        <h6 class="collapse-header">Opsi Pengumuman<br> Lanjutan:</h6>
                        <a class="collapse-item" href="{{ route('pengumuman.index') }}">Daftar Pengumuman</a>
                        <a class="collapse-item" href="{{ route('pengumuman.create') }}">Tambah Pengumuman</a>
                    </div>
                </div>
            </li>

            <li class="nav-item {{ Request::is('admin/agenda*') ? 'active' : '' }}">
                <a class="nav-link collapsed " href="#" data-toggle="collapse" data-target="#collapseAgenda"
                    aria-expanded="true" aria-controls="collapseAgenda">
                    <i class="fas fa-calendar-week"></i>
                    <span>Agenda</span>
                </a>

                <div id="collapseAgenda" class="collapse" aria-labelledby="headingTwo"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Opsi Agenda Lanjutan:</h6>
                        <a class="collapse-item" href="{{ route('agenda.index') }}">Daftar Agenda</a>
                        <a class="collapse-item" href="{{ route('agenda.create') }}">Tambah Agenda</a>
                    </div>
                </div>
            </li>


            <li class="nav-item {{ Request::is('admin/kategori*') ? 'active' : '' }}">
                <a class="nav-link collapsed " href="#" data-toggle="collapse" data-target="#collapseKategori"
                    aria-expanded="true" aria-controls="collapseKategori">
                    <i class="fas fa-list-ul"></i>
                    <span>Kategori</span>
                </a>

                <div id="collapseKategori" class="collapse" aria-labelledby="headingTwo"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Opsi Kategori Lanjutan:</h6>
                        <a class="collapse-item" href="{{ route('kategori.index') }}">Daftar Kategori</a>
                        <a class="collapse-item" href="{{ route('kategori.create') }}">Tambah Kategori</a>
                    </div>
                </div>

            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Heading -->
            <div class="sidebar-heading">
                Pengaturan Website
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="{{ route('settings.index') }}">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Akun</span>
                </a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <li class="nav-item">
                <form action="/logout" method="post">
                    @csrf
                    <button class="nav-link" style="background-color:#365ccd; border:none;">
                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i> <span>Log Out</span>
                    </button>
                </form>
            </li>

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline mt-3">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

            <!-- Sidebar Message -->
            <div class="sidebar-card d-none d-lg-flex">
                <img class="sidebar-card-illustration mb-2" src="{{ url('/images/sbadmin/undraw_rocket.svg') }}"
                    alt="...">
                <p class="text-center mb-2"><strong>SB Admin Pro</strong> is packed with premium features, components,
                    and
                    more!</p>
                <a class="btn btn-success btn-sm" href="https://startbootstrap.com/theme/sb-admin-pro">Upgrade to
                    Pro!</a>
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

                    <!-- Topbar Navbar -->
                    <ul class="navbar-nav ml-auto">

                        <!-- Nav Item - Alerts -->
                        {{-- <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-bell fa-fw"></i>
                                <!-- Counter - Alerts -->
                                <span class="badge badge-danger badge-counter">3+</span>
                            </a>
                            <!-- Dropdown - Alerts -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="alertsDropdown">
                                <h6 class="dropdown-header">
                                    Alerts Center
                                </h6>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-primary">
                                            <i class="fas fa-file-alt text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 12, 2019</div>
                                        <span class="font-weight-bold">A new monthly report is ready to download!</span>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-success">
                                            <i class="fas fa-donate text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 7, 2019</div>
                                        $290.29 has been deposited into your account!
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="mr-3">
                                        <div class="icon-circle bg-warning">
                                            <i class="fas fa-exclamation-triangle text-white"></i>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="small text-gray-500">December 2, 2019</div>
                                        Spending Alert: We've noticed unusually high spending for your account.
                                    </div>
                                </a>
                                <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>
                            </div>
                        </li> --}}

                        <!-- Nav Item - Messages -->
                        {{-- <li class="nav-item dropdown no-arrow mx-1">
                            <a class="nav-link dropdown-toggle" href="#" id="messagesDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-envelope fa-fw"></i>
                                <!-- Counter - Messages -->
                                <span class="badge badge-danger badge-counter">7</span>
                            </a>
                            <!-- Dropdown - Messages -->
                            <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="messagesDropdown">
                                <h6 class="dropdown-header">
                                    Message Center
                                </h6>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="img/undraw_profile_1.svg"
                                            alt="...">
                                        <div class="status-indicator bg-success"></div>
                                    </div>
                                    <div class="font-weight-bold">
                                        <div class="text-truncate">Hi there! I am wondering if you can help me with a
                                            problem I've been having.</div>
                                        <div class="small text-gray-500">Emily Fowler · 58m</div>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="img/undraw_profile_2.svg"
                                            alt="...">
                                        <div class="status-indicator"></div>
                                    </div>
                                    <div>
                                        <div class="text-truncate">I have the photos that you ordered last month, how
                                            would you like them sent to you?</div>
                                        <div class="small text-gray-500">Jae Chun · 1d</div>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="img/undraw_profile_3.svg"
                                            alt="...">
                                        <div class="status-indicator bg-warning"></div>
                                    </div>
                                    <div>
                                        <div class="text-truncate">Last month's report looks great, I am very happy with
                                            the progress so far, keep up the good work!</div>
                                        <div class="small text-gray-500">Morgan Alvarez · 2d</div>
                                    </div>
                                </a>
                                <a class="dropdown-item d-flex align-items-center" href="#">
                                    <div class="dropdown-list-image mr-3">
                                        <img class="rounded-circle" src="https://source.unsplash.com/Mv9hjnEUHR4/60x60"
                                            alt="...">
                                        <div class="status-indicator bg-success"></div>
                                    </div>
                                    <div>
                                        <div class="text-truncate">Am I a good boy? The reason I ask is because someone
                                            told me that people say this to all dogs, even if they aren't good...</div>
                                        <div class="small text-gray-500">Chicken the Dog · 2w</div>
                                    </div>
                                </a>
                                <a class="dropdown-item text-center small text-gray-500" href="#">Read More Messages</a>
                            </div>
                        </li> --}}

                        {{-- <div class="topbar-divider d-none d-sm-block"></div> --}}

                        <!-- Nav Item - User Information -->
                        {{-- <li class="nav-item dropdown no-arrow">
                            <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="mr-2 d-none d-lg-inline text-gray-600 small">{{ auth()->user()->username }}</span>
                                <img class="img-profile rounded-circle"
                                    src="{{ url('/images/sbadmin/undraw_profile.svg') }}">
                            </a>
                            <!-- Dropdown - User Information -->
                            <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                                aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Profile
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-cogs fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Settings
                                </a>
                                <a class="dropdown-item" href="#">
                                    <i class="fas fa-list fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Activity Log
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                    <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                    Logout
                                </a>
                            </div>
                        </li> --}}

                    </ul>

                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        @yield('content-header')
                    </div>

                    <!-- Content Row -->
                    <div class="row">
                        @yield('content')

                    </div>

                    <!-- Content Row -->

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            <footer class="sticky-footer bg-white">
                <div class="container my-auto">
                    <div class="copyright text-center my-auto">
                        <span>Copyright &copy; Your Website 2021</span>
                    </div>
                </div>
            </footer>
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
</body>

<script src="{{ url('/bs/js/jquery.min.js') }}"></script>

<script src="{{ url('/bs/js/bootstrap.bundle.min.js') }}"></script>

<!-- Core plugin JavaScript-->
<script src="{{ url('/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

<!-- Custom scripts for all pages-->
<script src="{{ url('/bs/js/sb-admin-2.min.js') }}"></script>

<script src="{{ url('bs/js/jquery.dataTables.min.js') }}"></script>

<script src="{{ url('bs/js/dataTables.bootstrap4.js') }}"></script>

{{-- Moment JS --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.21.0/moment.min.js" type="text/javascript"></script>

{{-- Javascript Date Time Picker --}}
<script src="{{ url('bs/js/bootstrap-datetimepicker.min.js') }}"></script>


{{-- <!-- Page level plugins -->
    <script src="{{ url('bs/chart.js/Chart.min.js') }}"></script> --}}

<!-- Page level custom scripts -->
{{-- <script src="{{ url('bs/js/chart-area-demo.js') }}"></script> --}}
