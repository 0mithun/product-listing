<aside id="sidebar" class="main-sidebar sidebar-dark-primary elevation-4"
    style="background-color: {{ $setting->dark_mode ? '' : $setting->sidebar_color }}">
    <!-- Brand Logo -->
    <a href="{{ route('admin.dashboard') }}" class="brand-link">
        <img src="{{ $setting->logo_image_url }}" alt="Logo" class="img-circle elevation-3"
                style="opacity: .8">
        <span class="brand-text font-weight-light">{{ $setting->name }}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <div class="avatar">
                    <img src="{{$user->image_url }}" class="elevation-2" alt="User Image">
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
                    <x-admin.sidebar-list :linkActive="Route::is('admin.dashboard') ? true : false" route="admin.dashboard"
                        icon="fas fa-tachometer-alt">
                        Dashboard
                    </x-admin.sidebar-list>
                @endif
                @if ($user->can('admin.view') || $user->can('admin.create') || $user->can('admin.edit') || $user->can('admin.delete') || $user->can('role.view') || $user->can('role.create') || $user->can('role.edit') || $user->can('role.delete'))

                    <x-admin.sidebar-dropdown
                        :linkActive="Route::is('role.index') || Route::is('role.create') || Route::is('role.edit') || Route::is('user.index') || Route::is('user.create') || Route::is('user.edit') ? true : false"
                        :subLinkActive="Route::is('role.index') || Route::is('role.create') || Route::is('role.edit') || Route::is('user.index') || Route::is('user.create') || Route::is('user.edit') ? true : false"
                        icon="fas fa-lock">
                        @slot('title')
                            User & Role Manage
                        @endslot

                        @if ($user->can('admin.view') || $user->can('admin.create') || $user->can('admin.edit') || $user->can('admin.delete'))
                            <ul class="nav nav-treeview">
                                <x-admin.sidebar-list
                                    :linkActive="Route::is('user.index') || Route::is('user.create') || Route::is('user.edit') ? true : false"
                                    route="user.index" icon="fas fa-users">
                                    All Users
                                </x-admin.sidebar-list>
                            </ul>
                        @endif
                        @if ($user->can('role.view') || $user->can('role.create') || $user->can('role.edit') || $user->can('role.delete'))
                            <ul class="nav nav-treeview">
                                <x-admin.sidebar-list
                                    :linkActive="Route::is('role.index') || Route::is('role.create') || Route::is('role.edit') ? true : false"
                                    route="role.index" icon="fas fa-lock">
                                    All Roles
                                </x-admin.sidebar-list>
                            </ul>
                        @endif
                    </x-admin.sidebar-dropdown>
                @endif
                <x-admin.sidebar-list :linkActive="Request::is('settings/*')  ? true : false" route="settings.website" icon="fas fa-cog">
                    Settings
                </x-admin.sidebar-list>
                <x-admin.sidebar-list :linkActive="Request::is('languages/*')  ? true : false" route="language.index" icon="fas fa-language">
                    Language
                </x-admin.sidebar-list>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
