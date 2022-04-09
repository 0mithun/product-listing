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
                {{-- @if ($user->can('dashboard.view')) --}}
                    <x-admin.sidebar-list :linkActive="Route::is('settings.about.update') ? true : false" route="settings.about.update"
                        icon="fas fa-tachometer-alt">
                        {{ __('about') }}
                    </x-admin.sidebar-list>
                {{-- @endif --}}

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

                {{-- <x-sidebar-list
                    :linkActive="Route::is('module.contact.index') || Route::is('module.contact.create') || Route::is('module.contact.edit') ? true : false"
                    route="module.contact.index" icon="fas fa-circle">
                    {{ __('contact') }}
                </x-sidebar-list> --}}

                <x-admin.sidebar-dropdown
                    :linkActive="Route::is('module.faq.index') || Route::is('module.faq.create') || Route::is('module.faq.edit') ? true : false"
                    :subLinkActive="Route::is('module.faq.category.index') || Route::is('module.faq.category.create') || Route::is('module.faq.category.edit') || Route::is('module.faq.index') || Route::is('module.faq.create') || Route::is('module.faq.edit') ? true : false"
                    icon="far fa-list-alt">
                    @slot('title')
                    {{ __('Faq') }}
                    @endslot
                    <ul class="nav nav-treeview">
                        <x-admin.sidebar-list
                            :linkActive="Route::is('module.faq.category.index') || Route::is('module.faq.category.create') || Route::is('module.faq.category.edit') ? true : false"
                            route="module.faq.category.index" icon="fas fa-circle">
                            {{ __('faq_category') }}
                        </x-admin.sidebar-list>
                    </ul>
                    <ul class="nav nav-treeview">
                        <x-admin.sidebar-list
                            :linkActive="Route::is('module.faq.index') || Route::is('module.faq.create') || Route::is('module.faq.edit') ? true : false"
                            route="module.faq.index" icon="fas fa-circle">
                            {{ __('faq') }}
                        </x-admin.sidebar-list>
                    </ul>
                </x-admin.sidebar-dropdown>

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
