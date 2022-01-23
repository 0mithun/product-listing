<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>

    @include('layouts.partials.styles')
</head>

<body class="hold-transition sidebar-collapse layout-top-nav {{ $setting->dark_mode ? 'dark-mode' : '' }}">
    @php
        $user = Auth::user();
    @endphp
    <div class="wrapper">
        <!-- Navbar -->
        <nav id="nav"
            class="main-header navbar navbar-expand-md {{ $setting->dark_mode ? 'navbar-dark navbar-dark' : 'navbar-white navbar-light' }}"
            style="background-color:{{ $setting->dark_mode ? '' : $setting->nav_color }}">
            <div class="container">
                <a href="{{ route('home') }}" class="navbar-brand">
                    @if (file_exists($setting->logo_image))
                        <img src="{{ asset($setting->logo_image) }}" alt="AdminLTE Logo"
                            class="brand-image img-circle elevation-3" style="opacity: .8">
                    @else
                        <img src="{{ asset('backend/image/logo-default.png') }}" alt="AdminLTE Logo"
                            class="brand-image img-circle elevation-3" style="opacity: .8">
                    @endif

                    <span class="brand-text font-weight-light">{{ $setting->name }}</span>
                </a>
                <button class="navbar-toggler order-1" type="button" data-toggle="collapse"
                    data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false"
                    aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse order-3" id="navbarCollapse">
                    <!-- Left navbar links -->
                    <ul class="navbar-nav">
                        <li class="nav-item">
                            <a id="nav_collapse" class="nav-link" data-widget="pushmenu" href="#" role="button"><i
                                    class="fas fa-bars"></i></a>
                        </li>
                    </ul>

                    <!-- SEARCH FORM -->
                    <form class="form-inline ml-0 ml-md-3">
                        <div class="input-group input-group-sm">
                            <input class="form-control form-control-navbar" type="search" placeholder="Search"
                                aria-label="Search">
                            <div class="input-group-append">
                                <button class="btn btn-navbar" type="submit">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>

                <!-- Right navbar links -->
                <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
                    @include('layouts.partials.top-right-nav')
                </ul>
            </div>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        @include('layouts.partials.sidebar')

        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            <!-- Content Header (Page header) -->
            <div class="content-header">
                <div class="container">
                    @yield('breadcrumbs')
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content-header -->

            <!-- Main content -->
            <div class="content">
                <div class="container">
                    @yield('content')
                </div><!-- /.container-fluid -->
            </div>
            <!-- /.content -->
        </div>
        <!-- /.content-wrapper -->

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->

        <!-- Main Footer -->
        @include('layouts.partials.footer')

    </div>
    <!-- ./wrapper -->

    @include('layouts.partials.scripts')
</body>

</html>
