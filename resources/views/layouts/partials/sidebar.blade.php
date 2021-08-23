<aside id="sidebar" class="main-sidebar sidebar-dark-primary elevation-4"
    style="background-color: {{ setting()->slider_color }}">
    <!-- Brand Logo -->
    <a href="{{ route('home') }}" class="brand-link">
        @if ($logo = setting()->logo_image)
            <img src="{{ asset($logo) }}" alt="AdminLTE Logo" class="img-circle elevation-3" style="opacity: .8">
        @else
            <img src="{{ asset('backend') }}/image/64x64.png" alt="AdminLTE Logo" class="img-circle elevation-3"
                style="opacity: .8">
        @endif
        <span class="brand-text font-weight-light">{{ setting()->name }}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <div class="avatar">
                    @if ($user->image)
                        <img src="{{ asset($user->image) }}" class="elevation-2" alt="User Image">
                    @else
                        <img src="{{ asset('backend/image/default.png') }}" class="elevation-2" alt="User Image">
                    @endif
                </div>
            </div>
            <div class="info">
                <a href="{{ route('profile') }}" class="d-block">{{ $user->name }}</a>
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
                <x-sidebar-list :linkActive="Route::is('setting')  ? true : false" route="setting" parameter="website"
                    icon="fas fa-cog">
                    Settings
                </x-sidebar-list>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
