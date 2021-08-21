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
                    <a href="javascript:void(0)" class="nav-link">Home</a>
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
                <img src="{{ asset('backend') }}/image/64x64.png" alt="AdminLTE Logo"
                    class="brand-image img-circle elevation-3" style="opacity: .8">
                <span class="brand-text font-weight-light">Zakir Soft</span>
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

                        <!-- Company Module -->
                        @if (Module::collections()->has('Company'))
                            <x-sidebar-list
                                :linkActive="Route::is('module.product.company.index') || Route::is('module.company.index') || Route::is('module.company.create') || Route::is('module.company.edit') ? true : false"
                                route="module.company.index" icon="fas fa-store">
                                Company
                            </x-sidebar-list>
                        @endif
                        <!-- Candidate -->
                        @if (Module::collections()->has('Candidate'))
                            <x-sidebar-list
                                :linkActive="Route::is('module.product.candidate.index') || Route::is('module.candidate.index') || Route::is('module.candidate.create') || Route::is('module.candidate.edit') ? true : false"
                                route="module.candidate.index" icon="fas fa-store">
                                Candidate
                            </x-sidebar-list>
                        @endif

                        @if (Module::collections()->has('Product'))
                            <x-sidebar-list
                                :linkActive="Route::is('module.product.gallery.index') || Route::is('module.product.index') || Route::is('module.product.create') || Route::is('module.product.edit') ? true : false"
                                route="module.product.index" icon="fas fa-box">
                                Product
                            </x-sidebar-list>
                        @endif
                        @if (Module::collections()->has('Attribute'))
                            <x-sidebar-list
                                :linkActive="Route::is('module.attributes.index') || Route::is('module.attributes.create') || Route::is('module.attributes.edit') || Route::is('module.attribute.value.index') || Route::is('module.attribute.value.edit') ? true : false"
                                route="module.attributes.index" icon="fas fa-plus">
                                Attributes
                            </x-sidebar-list>
                        @endif

                        @if (Module::collections()->has('Category') || Module::collections()->has('Brand'))
                            <x-sidebar-dropdown
                                :linkActive="Route::is('module.product.edit') || Route::is('module.category.index') || Route::is('module.category.create') || Route::is('module.category.edit') || Route::is('module.subcategory.index') || Route::is('module.subcategory.create') || Route::is('module.subcategory.edit') ? true : false"
                                :subLinkActive="Route::is('module.category.index') || Route::is('module.category.create') || Route::is('module.category.edit') || Route::is('module.subcategory.index') || Route::is('module.subcategory.create') || Route::is('module.subcategory.edit') ? true : false"
                                icon="fas fa-tags">
                                @slot('title')
                                    Categories
                                @endslot

                                <ul class="nav nav-treeview">
                                    <x-sidebar-list
                                        :linkActive="Route::is('module.category.index') || Route::is('module.category.create') || Route::is('module.category.edit') ? true : false"
                                        route="module.category.index" icon="fas fa-circle">
                                        Category
                                    </x-sidebar-list>
                                </ul>
                                <ul class="nav nav-treeview">
                                    <x-sidebar-list
                                        :linkActive="Route::is('module.subcategory.index') || Route::is('module.subcategory.create') || Route::is('module.subcategory.edit') ? true : false"
                                        route="module.subcategory.index" icon="fas fa-circle">
                                        Subcategory
                                    </x-sidebar-list>
                                </ul>
                            </x-sidebar-dropdown>
                        @endif
                        @if (Module::collections()->has('Brand'))
                            <x-sidebar-list
                                :linkActive="Route::is('module.brand.index') || Route::is('module.brand.create') || Route::is('module.brand.edit') ? true : false"
                                route="module.brand.index" icon="fas fa-tags">
                                Brand
                            </x-sidebar-list>
                        @endif
                        @if (Module::collections()->has('Blog'))
                            <x-sidebar-list
                                :linkActive="Route::is('module.post.index') || Route::is('module.post.create') || Route::is('module.post.edit') ? true : false"
                                route="module.post.index" icon="fas fa-blog">
                                Blog
                            </x-sidebar-list>
                        @endif
                        @if (Module::collections()->has('Faq'))
                            <li class="nav-item">
                                <a href="{{ route('module.faq.index') }}"
                                    class="nav-link {{ Route::is('module.faq.index') || Route::is('module.faq.create') || Route::is('module.faq.edit') ? ' active' : '' }}">
                                    <i class="nav-icon fas fa-blog"></i>
                                    <p>Faq</p>
                                </a>
                            </li>
                        @endif
                        @if (Module::collections()->has('Comment'))
                            <li class="nav-item">
                                <a href="{{ route('comment.index') }}"
                                    class="nav-link {{ Route::is('comment.index') || Route::is('comment.create') ? ' active' : '' }}">
                                    <i class="nav-icon fas fa-comments"></i>
                                    <p>Comment</p>
                                </a>
                            </li>
                        @endif
                        @if (Module::collections()->has('Tag'))
                            <x-sidebar-list
                                :linkActive="Route::is('module.tag.index') || Route::is('module.tag.create') || Route::is('module.tag.edit') ? true : false"
                                route="module.tag.index" icon="fas fa-tag">
                                Tag
                            </x-sidebar-list>
                        @endif
                        @if (Module::collections()->has('Team'))
                            <x-sidebar-list
                                :linkActive="Route::is('module.team.index') || Route::is('module.team.create') || Route::is('module.team.edit') ? true : false"
                                route="module.team.index" icon="fas fa-users">
                                Team
                            </x-sidebar-list>
                        @endif
                        @if (Module::collections()->has('Priceplan'))
                            <x-sidebar-list
                                :linkActive="Route::is('module.priceplan.index') || Route::is('module.priceplan.create') || Route::is('module.priceplan.edit') ? true : false"
                                route="module.priceplan.index" icon="fas fa-money-check">
                                Priceplan
                            </x-sidebar-list>
                        @endif
                        @if (Module::collections()->has('Newsletter'))
                            <x-sidebar-list
                                :linkActive="Route::is('review.index') || Route::is('review.create') || Route::is('review.edit') ? true : false"
                                route="review.index" icon="fas fa-star">
                                Review
                            </x-sidebar-list>
                        @endif
                        @if (Module::collections()->has('Newsletter'))
                            <x-sidebar-list
                                :linkActive="Route::is('module.newsletter.index') || Route::is('module.newsletter.create') || Route::is('module.newsletter.edit') ? true : false"
                                route="module.newsletter.index" icon="fas fa-newspaper">
                                Newsletter
                            </x-sidebar-list>
                        @endif
                        @if (Module::collections()->has('Portfolio'))
                            <x-sidebar-list
                                :linkActive="Route::is('module.portfolio.index') || Route::is('module.portfolio.create') || Route::is('module.portfolio.edit') ? true : false"
                                route="module.portfolio.index" icon="fas fa-user">
                                Portfolio
                            </x-sidebar-list>
                        @endif
                        @if (Module::collections()->has('Job'))
                            <x-sidebar-list
                                :linkActive="Route::is('module.job.index') || Route::is('module.job.create') || Route::is('module.job.edit') ? true : false"
                                route="module.job.index" icon="fas fa-briefcase">
                                Jobs
                            </x-sidebar-list>
                        @endif
                        @if (Module::collections()->has('Testimonial'))
                            <x-sidebar-list
                                :linkActive="Route::is('module.testimonial.index') || Route::is('module.testimonial.create') || Route::is('module.testimonial.edit') ? true : false"
                                route="module.testimonial.index" icon="fas fa-briefcase">
                                Testimonial
                            </x-sidebar-list>
                        @endif
                        @if (Module::collections()->has('Coupon'))
                            <x-sidebar-list
                                :linkActive="Route::is('coupon.index') || Route::is('coupon.create') || Route::is('coupon.edit') ? true : false"
                                route="coupon.index" icon="fas fa-percentage">
                                Coupon
                            </x-sidebar-list>
                        @endif
                        @if (Module::collections()->has('Wishlist'))
                            <x-sidebar-list :linkActive="Route::is('module.wishlist.index') ? true : false"
                                route="module.wishlist.index" icon="fas fa-heart">
                                Wishlist
                            </x-sidebar-list>
                        @endif
                        @if (Module::collections()->has('Job'))
                            <x-sidebar-list
                                :linkActive="Route::is('module.contact.index') || Route::is('module.contact.create') || Route::is('module.contact.edit') ? true : false"
                                route="module.contact.index" icon="fas fa-address-book">
                                Contact
                            </x-sidebar-list>
                        @endif
                        @if ($user->can('admin.view') || $user->can('admin.create') || $user->can('admin.edit') || $user->can('admin.delete') || $user->can('role.view') || $user->can('role.create') || $user->can('role.edit') || $user->can('role.delete'))

                            <x-sidebar-dropdown
                                :linkActive="Route::is('role.index') || Route::is('role.create') || Route::is('role.edit') || Route::is('user.index') || Route::is('user.create') || Route::is('user.edit') ? true : false"
                                :subLinkActive="Route::is('role.index') || Route::is('role.create') || Route::is('role.edit') || Route::is('user.index') || Route::is('user.create') || Route::is('user.edit') ? true : false"
                                icon="fas fa-lock">
                                @slot('title')
                                    Others
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
                                <ul class="nav nav-treeview">
                                    {{-- <li class="nav-item">
                                        <a href="{{ url('setting/website') }}" class="nav-link">
                                            <i class="nav-icon fas fa-users-cog"></i>
                                            <p>Settings</p>
                                        </a>
                                    </li> --}}
                                    <x-sidebar-list :linkActive="Route::is('setting')  ? true : false" route="setting"
                                        parameter="website" icon="fas fa-users-cog">
                                        Settings
                                    </x-sidebar-list>
                                    {{-- || Route::is('setting.create') || Route::is('setting.edit') --}}
                                </ul>
                            </x-sidebar-dropdown>
                        @endif



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
