<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>

    <!-- FavIcons -->
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset(website_setting()->favicon_image) }}">

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
    <link rel="stylesheet" type="text/css" href="{{ asset('css/zakirsoft.css') }}">
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
                    <a id="nav_collapse" class="nav-link" data-widget="pushmenu" href="#" role="button"><i
                            class="fas fa-bars"></i></a>
                </li>
                {{-- <li class="nav-item d-none d-sm-inline-block">
                    <a href="javascript:void(0)" class="nav-link">Home</a>
                </li> --}}
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
                <li class="nav-item dropdown">
                    <a class="nav-link" data-toggle="dropdown" href="#" aria-expanded="false">
                        <i class="fas fa-th"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right" style="left: inherit; right: 0px;">
                        <span class="dropdown-item dropdown-header">Quick Actions</span>
                        <div class="dropdown-divider"></div>
                        <div class="row row-paddingless" style="padding-left: 15px; padding-right: 15px;">
                            <div class="col-6 p-0 border-bottom border-right">
                                <a href="#" class="d-block text-center py-3 bg-hover-light"> <i
                                        class="fas fa-users"></i>
                                    <span class="w-100 d-block text-muted">Add User</span>
                                </a>
                            </div>
                            <div class="col-6 p-0 border-bottom border-right">
                                <a href="#" class="d-block text-center py-3 bg-hover-light"> <i class="fas fa-lock"></i>
                                    <span class="w-100 d-block text-muted">Add Role</span>
                                </a>
                            </div>
                            <div class="col-6 p-0 border-bottom border-right">
                                <a href="#" class="d-block text-center py-3 bg-hover-light"> <i
                                        class="fas fa-users"></i>
                                    <span class="w-100 d-block text-muted">Add User</span>
                                </a>
                            </div>
                            <div class="col-6 p-0 border-bottom border-right">
                                <a href="#" class="d-block text-center py-3 bg-hover-light"> <i class="fas fa-lock"></i>
                                    <span class="w-100 d-block text-muted">Add Role</span>
                                </a>
                            </div>
                        </div>
                        {{-- <a href="#" class="dropdown-item">
                            <i class="fas fa-envelope mr-2"></i> 4 new messages
                            <span class="float-right text-muted text-sm">3 mins</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-users mr-2"></i> 8 friend requests
                            <span class="float-right text-muted text-sm">12 hours</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="#" class="dropdown-item">
                            <i class="fas fa-file mr-2"></i> 3 new reports
                            <span class="float-right text-muted text-sm">2 days</span>
                        </a> --}}
                        <div class="dropdown-divider"></div>
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
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"
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
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24"
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
                @php
                    $user = Auth::user();
                @endphp
                <li class="nav-item dropdown user-menu">
                    <a href="{{ route('profile') }}" class="nav-link dropdown-toggle" data-toggle="dropdown"
                        aria-expanded="false">
                        @if ($user->image)
                            <img src="{{ asset($user->image) }}" class="user-image img-circle elevation-2"
                                alt="User Image">
                        @else
                            <img src="{{ asset('backend/image/default.png') }}"
                                class="user-image img-circle elevation-2" alt="User Image">
                        @endif
                        <span class="d-none d-md-inline">{{ $user->name }}</span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right" style="left: inherit; right: 0px;">
                        <!-- User image -->
                        <li class="user-header bg-primary">
                            @if ($user->image)
                                <img src="{{ asset($user->image) }}" class="user-image img-circle elevation-2"
                                    alt="User Image">
                            @else
                                <img src="{{ asset('backend/image/default.png') }}"
                                    class="user-image img-circle elevation-2" alt="User Image">
                            @endif
                            <p>
                                {{ $user->name }} -
                                @foreach ($user->getRoleNames() as $role)
                                    ( <span>{{ ucwords($role) }}</span> )
                                @endforeach
                                <small>Member since {{ $user->created_at->format('M d, Y') }}</small>
                            </p>
                        </li>
                        <!-- Menu Body -->
                        <li class="user-body">
                            <div class="row justify-content-center">
                                <div class="col-12 text-center">
                                    <a href="{{ route('profile.setting') }}">Settings</a>
                                </div>
                                {{-- <div class="col-4 text-center">
                                    <a href="#">Followers</a>
                                </div>
                                <div class="col-4 text-center">
                                    <a href="#">Sales</a>
                                </div>
                                <div class="col-4 text-center">
                                    <a href="#">Friends</a>
                                </div> --}}
                            </div>
                            <!-- /.row -->
                        </li>
                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <a href="{{ route('profile') }}" class="btn btn-default btn-flat">Profile</a>
                            <a href="javascript:void(0)"
                                onclick="event.preventDefault();document.getElementById('logout-form').submit();"
                                class="btn btn-default btn-flat float-right">Sign out</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none"> @csrf
                            </form>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar sidebar-dark-primary elevation-4">
            <!-- Brand Logo -->
            <a href="{{ route('home') }}" class="brand-link">
                @if ($logo = website_setting()->logo_image)
                    <img src="{{ asset($logo) }}" alt="AdminLTE Logo" class="img-circle elevation-3"
                        style="opacity: .8">
                @else
                    <img src="{{ asset('backend') }}/image/64x64.png" alt="AdminLTE Logo"
                        class="img-circle elevation-3" style="opacity: .8">
                @endif
                <span class="brand-text font-weight-light">{{ website_setting()->name }}</span>
            </a>

            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                    <div class="image">
                        <img src="{{ asset($user->image) }}" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info">
                        <a href="#" class="d-block">{{ $user->name }}</a>
                    </div>
                </div>

                <!-- Sidebar Menu -->
                <nav class="mt-2">
                    <ul class="nav nav-pills nav-sidebar flex-column nav-child-indent nav-legacy nav-flat"
                        data-widget="treeview" role="menu" data-accordion="false">
                        @if ($user->can('dashboard.view'))
                            <x-sidebar-list :linkActive="Route::is('home') ? true : false" route="home"
                                icon="fas fa-tachometer-alt">
                                Dashboard
                            </x-sidebar-list>
                        @endif
                        @if ($user->can('admin.view') || $user->can('admin.create') || $user->can('admin.edit') || $user->can('admin.delete') || $user->can('role.view') || $user->can('role.create') || $user->can('role.edit') || $user->can('role.delete'))

                            <x-sidebar-dropdown
                                :linkActive="Route::is('role.index') || Route::is('role.create') || Route::is('role.edit') || Route::is('user.index') || Route::is('user.create') || Route::is('user.edit') ? true : false"
                                :subLinkActive="Route::is('role.index') || Route::is('role.create') || Route::is('role.edit') || Route::is('user.index') || Route::is('user.create') || Route::is('user.edit') ? true : false"
                                icon="fas fa-lock">
                                @slot('title')
                                    User & Role Manage
                                @endslot

                                @if ($user->can('admin.view') || $user->can('admin.create') || $user->can('admin.edit') || $user->can('admin.delete'))
                                    <ul class="nav nav-treeview">
                                        <x-sidebar-list
                                            :linkActive="Route::is('user.index') || Route::is('user.create') || Route::is('user.edit') ? true : false"
                                            route="user.index" icon="fas fa-users">
                                            All Users
                                        </x-sidebar-list>
                                    </ul>
                                @endif
                                @if ($user->can('role.view') || $user->can('role.create') || $user->can('role.edit') || $user->can('role.delete'))
                                    <ul class="nav nav-treeview">
                                        <x-sidebar-list
                                            :linkActive="Route::is('role.index') || Route::is('role.create') || Route::is('role.edit') ? true : false"
                                            route="role.index" icon="fas fa-lock">
                                            All Roles
                                        </x-sidebar-list>
                                    </ul>
                                @endif
                            </x-sidebar-dropdown>
                        @endif
                        <x-sidebar-list :linkActive="Route::is('setting')  ? true : false" route="setting"
                            parameter="website" icon="fas fa-cog">
                            Settings
                        </x-sidebar-list>


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

        var isNavCollapse = JSON.parse(localStorage.getItem("sidebar_collapse"))
        isNavCollapse ? $('body').addClass('sidebar-collapse') : null;

        $('#nav_collapse').on('click', function() {
            localStorage.setItem("sidebar_collapse", isNavCollapse == true ? false : true);
        });
    </script>
    <!-- Custom Script -->
    @yield('script')
</body>

</html>
