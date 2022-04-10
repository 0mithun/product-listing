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
                @if ($user->can('admin.view') || $user->can('admin.create') || $user->can('admin.edit') || $user->can('admin.delete') || $user->can('role.view') || $user->can('role.create') || $user->can('role.edit') || $user->can('role.delete'))

                <x-admin.sidebar-dropdown
                    :linkActive="Route::is('role.index') || Route::is('role.create') || Route::is('role.edit') || Route::is('user.index') || Route::is('user.create') || Route::is('user.edit') ? true : false"
                    :subLinkActive="Route::is('role.index') || Route::is('role.create') || Route::is('role.edit') || Route::is('user.index') || Route::is('user.create') || Route::is('user.edit') ? true : false"
                    icon="fas fa-lock">
                    @slot('title')
                        {{ __('user_role_manage') }}
                    @endslot

                    @if ($user->can('admin.view') || $user->can('admin.create') || $user->can('admin.edit') || $user->can('admin.delete'))
                        <ul class="nav nav-treeview">
                            <x-admin.sidebar-list
                                :linkActive="Route::is('user.index') || Route::is('user.create') || Route::is('user.edit') ? true : false"
                                route="user.index" icon="fas fa-users">
                                {{ __('all_users') }}
                            </x-admin.sidebar-list>
                        </ul>
                    @endif
                    @if ($user->can('role.view') || $user->can('role.create') || $user->can('role.edit') || $user->can('role.delete'))
                        <ul class="nav nav-treeview">
                            <x-admin.sidebar-list
                                :linkActive="Route::is('role.index') || Route::is('role.create') || Route::is('role.edit') ? true : false"
                                route="role.index" icon="fas fa-lock">
                                {{ __('all_roles') }}
                            </x-admin.sidebar-list>
                        </ul>
                    @endif
                </x-admin.sidebar-dropdown>
            @endif
                @if ($user->can('dashboard.view'))
                    <x-admin.sidebar-list :linkActive="Route::is('settings.about.edit') ? true : false" route="settings.about.update"
                        icon="fas fa-info-circle">
                        {{ __('about') }}
                    </x-admin.sidebar-list>
                @endif

                @if ($user->can('setting.view') || $user->can('setting.edit'))
                    <x-admin.sidebar-list :linkActive="Request::is('settings/*')  ? true : false" route="settings.website" icon="fas fa-cog">
                        {{ __('settings') }}
                    </x-admin.sidebar-list>
                @endif
                @if ($user->can('category.view') || $user->can('category.edit'))
                    <x-admin.sidebar-list :linkActive="Request::is('categories/*')  ? true : false" route="categories.index" icon="fas fa-book">
                        {{ __('categories') }}
                    </x-admin.sidebar-list>
                @endif
                @if ($user->can('product.view') || $user->can('product.edit'))
                    <x-admin.sidebar-list :linkActive="Request::is('products/*')  ? true : false" route="products.index" icon="fas fa-tag">
                        {{ __('products') }}
                    </x-admin.sidebar-list>
                @endif

                @if ($user->can('contact.view') || $user->can('contact.edit'))
                <x-admin.sidebar-list
                    :linkActive="Route::is('module.contact.index') || Route::is('module.contact.create') || Route::is('module.contact.edit') ? true : false"
                    route="module.contact.index" icon="fas fa-envelope">
                    {{ __('contact') }}
                </x-admin.sidebar-list>
                @endif


                @if($user->can('faq.view') || $user->can('faq.edit') || $user->can('faq.create') || $user->can('faq.delete')  || $user->can('faq.category.create') || $user->can('faq.category.view')  || $user->can('faq.category.edit')  || $user->can('faq.category.delete'))
                    <x-admin.sidebar-dropdown
                        :linkActive="Route::is('module.faq.index') || Route::is('module.faq.create') || Route::is('module.faq.edit') ? true : false"
                        :subLinkActive="Route::is('module.faq.category.index') || Route::is('module.faq.category.create') || Route::is('module.faq.category.edit') || Route::is('module.faq.index') || Route::is('module.faq.create') || Route::is('module.faq.edit') ? true : false"
                        icon="fas fa-question">
                        @slot('title')
                        {{ __('Faq') }}
                        @endslot
                        @if($user->can('faq.category.create') || $user->can('faq.category.view')  || $user->can('faq.category.edit')  || $user->can('faq.category.delete'))
                        <ul class="nav nav-treeview">
                            <x-admin.sidebar-list
                                :linkActive="Route::is('module.faq.category.index') || Route::is('module.faq.category.create') || Route::is('module.faq.category.edit') ? true : false"
                                route="module.faq.category.index" icon="fas fa-circle">
                                {{ __('faq_category') }}
                            </x-admin.sidebar-list>
                        </ul>
                        @endif
                        @if ($user->can('faq.view') || $user->can('faq.edit') || $user->can('faq.create') || $user->can('faq.delete') )
                        <ul class="nav nav-treeview">
                            <x-admin.sidebar-list
                                :linkActive="Route::is('module.faq.index') || Route::is('module.faq.create') || Route::is('module.faq.edit') ? true : false"
                                route="module.faq.index" icon="fas fa-circle">
                                {{ __('faq') }}
                            </x-admin.sidebar-list>
                        </ul>
                        @endif
                    </x-admin.sidebar-dropdown>
                @endif
                @if ($user->can('contact.view') || $user->can('contact.edit'))
                <x-admin.sidebar-list
                    :linkActive="Route::is('admin.dashboard') ? true : false"
                    route="product.submits" icon="fas fa-universal-access">
                    {{ __('submit_products') }}
                </x-admin.sidebar-list>
                @endif

            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>
