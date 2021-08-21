<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    <!-- FavIcons -->
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('backend/dist/img') }}/16x16.png">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('backend/dist/img') }}/32x32.png">
    <link rel="icon" type="image/png" sizes="64x64" href="{{ asset('backend/dist/img') }}/64x64.png">

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ asset('backend') }}/plugins/fontawesome-free/css/all.min.css">
    <!-- IonIcons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('backend') }}/dist/css/adminlte.min.css">
    <!-- Toastr -->
    <link rel="stylesheet" type="text/css" href="{{ asset('backend') }}/plugins/toastr/toastr.min.css">
    <!-- Custom Link -->
    @yield('style')
</head>

<body class="hold-transition sidebar-mini layout-fixed {{ session('dark_mode') ? 'dark-mode' : '' }}">
    <div class="wrapper">
        <!-- Navbar -->
        <nav
            class="main-header navbar navbar-expand navbar-light {{ session('dark_mode') ? 'navbar-dark' : 'navbar-white' }}">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="index3.html" class="nav-link">Home</a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!-- Navbar Search -->
                <li class="nav-item">
                    <a class="nav-link" data-widget="navbar-search" href="#" role="button">
                        <i class="fas fa-search"></i>
                    </a>
                    <div class="navbar-search-block">
                        <form class="form-inline">
                            <div class="input-group input-group-sm">
                                <input class="form-control form-control-navbar" type="search" placeholder="Search"
                                    aria-label="Search">
                                <div class="input-group-append">
                                    <button class="btn btn-navbar" type="submit">
                                        <i class="fas fa-search"></i>
                                    </button>
                                    <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                                        <i class="fas fa-times"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </li>

                <li class="nav-item">
                    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <form action="{{ route('mode.change') }}" method="post" id="mode_form">
                        @csrf
                        @if (session('dark_mode'))
                            <input type="hidden" name="mode" value="0">
                        @else
                            <input type="hidden" name="mode" value="1">
                        @endif
                    </form>
                    <a onclick="$('#mode_form').submit()" class="nav-link" href="#" role="button">
                        @if (session('dark_mode'))
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                                stroke-linejoin="round" class="icon icon-tabler icon-tabler-brightness-down">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <circle cx="12" cy="12" r="3"></circle>
                                <line x1="12" y1="5" x2="12" y2="5.01"></line>
                                <line x1="17" y1="7" x2="17" y2="7.01"></line>
                                <line x1="19" y1="12" x2="19" y2="12.01"></line>
                                <line x1="17" y1="17" x2="17" y2="17.01"></line>
                                <line x1="12" y1="19" x2="12" y2="19.01"></line>
                                <line x1="7" y1="17" x2="7" y2="17.01"></line>
                                <line x1="5" y1="12" x2="5" y2="12.01"></line>
                                <line x1="7" y1="7" x2="7" y2="7.01"></line>
                            </svg>
                        @else
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                                stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                                stroke-linejoin="round" class="icon icon-tabler icon-tabler-moon">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path
                                    d="M12 3c.132 0 .263 0 .393 0a7.5 7.5 0 0 0 7.92 12.446a9 9 0 1 1 -8.313 -12.454z">
                                </path>
                            </svg>
                        @endif
                    </a>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="{{ route('home') }}" class="brand-link">
                <img src="{{ asset('backend') }}/image/64x64.png" alt="AdminLTE Logo"
                    class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">Zakir Soft</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        {{-- <img src="{{ asset(Auth::user()->image) }}" class="img-circle elevation-2" alt="User Image"> --}}
                    </div>
                    <div class="info">
                        {{-- <a href="#" class="d-block">{{ Auth::user()->name }}</a> --}}
                    </div>
                </div>

                <!-- SidebarSearch Form -->
                <div class="form-inline">
                    <div class="input-group" data-widget="sidebar-search">
                        <input class="form-control form-control-sidebar" type="search" placeholder="Search"
                            aria-label="Search">
                        <div class="input-group-append">
                            <button class="btn btn-sidebar">
                                <i class="fas fa-search fa-fw"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column nav-child-indent nav-legacy nav-flat"
                        data-widget="treeview" role="menu" data-accordion="false">

                        <!-- candidate -->
                        @auth('customer')
                            <x-sidebar-list :linkActive="Route::is('customer.dashboard') ? true : false"
                                route="customer.dashboard" icon="fas fa-home">
                                Dashboard
                            </x-sidebar-list>
                            <li class="nav-item">
                                <form action="{{ route('auth.logout') }}" class="d-inline" method="POST">
                                    @csrf
                                    <input type="hidden" value="customer" name="auth">
                                    <button type="submit" class="btn btn-primary btn-sm btn-block">Logout</button>
                                </form>
                            </li>
                        @endauth

                        <!-- company -->
                        @auth('company')
                            <x-sidebar-list :linkActive="Route::is('company.dashboard') ? true : false"
                                route="company.dashboard" icon="fas fa-home">
                                Dashboard
                            </x-sidebar-list>
                            <li class="nav-item">
                                <form action="{{ route('auth.logout') }}" class="d-inline" method="POST">
                                    @csrf
                                    <input type="hidden" value="company" name="auth">
                                    <button type="submit" class="btn btn-primary btn-sm btn-block">Logout</button>
                                </form>
                            </li>
                        @endauth

                        <!-- teacher -->
                        @auth('teacher')
                            <x-sidebar-list :linkActive="Route::is('teacher.dashboard') ? true : false"
                                route="teacher.dashboard" icon="fas fa-home">
                                Dashboard
                            </x-sidebar-list>
                            <li class="nav-item">
                                <form action="{{ route('auth.logout') }}" class="d-inline" method="POST">
                                    @csrf
                                    <input type="hidden" value="teacher" name="auth">
                                    <button type="submit" class="btn btn-primary btn-sm btn-block">Logout</button>
                                </form>
                            </li>
                        @endauth


                        <!-- user -->
                        @auth('user')
                            <x-sidebar-list :linkActive="Route::is('user.dashboard') ? true : false" route="user.dashboard"
                                icon="fas fa-home">
                                Dashboard
                            </x-sidebar-list>
                            <li class="nav-item">
                                <form action="{{ route('auth.logout') }}" class="d-inline" method="POST">
                                    @csrf
                                    <input type="hidden" value="user" name="auth">
                                    <button type="submit" class="btn btn-primary btn-sm btn-block">Logout</button>
                                </form>
                            </li>
                        @endauth
                        <!-- student -->
                        @auth('student')
                            <x-sidebar-list :linkActive="Route::is('student.dashboard') ? true : false"
                                route="student.dashboard" icon="fas fa-home">
                                Dashboard
                            </x-sidebar-list>
                            <li class="nav-item">
                                <form action="{{ route('auth.logout') }}" class="d-inline" method="POST">
                                    @csrf
                                    <input type="hidden" value="student" name="auth">
                                    <button type="submit" class="btn btn-primary btn-sm btn-block">Logout</button>
                                </form>
                            </li>
                        @endauth
                    </ul>
                </nav>
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container-fluid">
                    @yield('breadcrumbs')
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <div class="content">
                <div class="container-fluid">
                    @yield('content')
                    <!-- /.row -->
                </div>
                <!-- /.container-fluid -->
            </div>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->


        <!-- Main Footer -->

        <footer class="main-footer">
            <strong>Copyright &copy; {{ date('Y') }} <a href="http://zakirsoft.com">zakirsoft.com</a>.</strong>
            All rights reserved.
            <div class="float-right d-none d-sm-inline-block">
                <b>Version</b> 3.0.5
            </div>
        </footer>
    </div>
    <!-- ./wrapper -->

    <!-- jQuery -->
    <script src="{{ asset('backend') }}/plugins/jquery/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="{{ asset('backend') }}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <!-- AdminLTE -->
    <script src="{{ asset('backend') }}/dist/js/adminlte.js"></script>
    <!-- toastr notification -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"> </script>
    <script>
        @if (Session::has('success'))
            toastr.success("{{ Session::get('success') }}", 'Success!')
        @elseif(Session::has('warning'))
            toastr.warning("{{ Session::get('warning') }}", 'Warning!')
        @elseif(Session::has('error'))
            toastr.error("{{ Session::get('error') }}", 'Error!')
        @endif
        // toast config
        toastr.options = {
            "closeButton": false,
            "debug": false,
            "newestOnTop": true,
            "progressBar": true,
            "positionClass": "toast-top-right",
            "preventDuplicates": true,
            "onclick": null,
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "hideMethod": "fadeOut"
        }

        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    </script>
    <!-- Custom Script -->
    @yield('script')
</body>

</html>
