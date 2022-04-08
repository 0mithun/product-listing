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
                        {{ __('dashboard') }}
                    </x-admin.sidebar-list>
                @endif

                @if ($user->can('setting.view') || $user->can('setting.update'))
                    <x-admin.sidebar-list :linkActive="Request::is('settings/*')  ? true : false" route="settings.website" icon="fas fa-cog">
                        {{ __('settings') }}
                    </x-admin.sidebar-list>
                @endif
                {{-- @if ($user->can('categories.view') || $user->can('categories.update')) --}}
                    <x-admin.sidebar-list :linkActive="Request::is('categories/*')  ? true : false" route="categories.index" icon="fas fa-cog">
                        {{ __('categories') }}
                    </x-admin.sidebar-list>
                {{-- @endif  --}}
                {{-- @if ($user->can('categories.view') || $user->can('categories.update')) --}}
                    <x-admin.sidebar-list :linkActive="Request::is('products/*')  ? true : false" route="products.index" icon="fas fa-cog">
                        {{ __('products') }}
                    </x-admin.sidebar-list>
                {{-- @endif  --}}

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
