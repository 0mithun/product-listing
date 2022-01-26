@php
$user = auth()->user();
@endphp
<li class="nav-item dropdown">
    <a class="nav-link" data-toggle="dropdown" href="#" aria-expanded="false">
        <i class="fas fa-plus"></i>
    </a>
    <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right" style="left: inherit; right: 0px;">
        <span class="dropdown-item dropdown-header">{{ __('quick_actions') }}</span>
        <div class="dropdown-divider"></div>
        <div class="row row-paddingless" style="padding-left: 15px; padding-right: 15px;">
            <div class="col-6 p-0 border-bottom border-right">
                <a href="{{ route('user.create') }}" class="d-block text-center py-3 bg-hover-light"> <i
                        class="fas fa-users"></i>
                    <span class="w-100 d-block text-muted">{{ __('add_user') }}</span>
                </a>
            </div>
            <div class="col-6 p-0 border-bottom border-right">
                <a href="{{ route('role.create') }}" class="d-block text-center py-3 bg-hover-light"> <i
                        class="fas fa-lock"></i>
                    <span class="w-100 d-block text-muted">{{ __('add_role') }}</span>
                </a>
            </div>
            <div class="col-12 p-0 border-bottom border-right">
                <a href="{{ route('settings.website') }}" class="d-block text-center py-3 bg-hover-light"> <i
                        class="fas fa-cog"></i>
                    <span class="w-100 d-block text-muted">{{ __('settings') }}</span>
                </a>
            </div>
        </div>
        <div class="dropdown-divider"></div>
    </div>
</li>
<li class="nav-item dropdown">
    <a class="nav-link" data-toggle="dropdown" href="#" aria-expanded="false">
          <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-language" width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="{{ $setting->dark_mode ? '#ffffff':'#1f2d3d' }}" fill="none" stroke-linecap="round" stroke-linejoin="round">
            <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
            <path d="M4 5h7" />
            <path d="M9 3v2c0 4.418 -2.239 8 -5 8" />
            <path d="M5 9c-.003 2.144 2.952 3.908 6.7 4" />
            <path d="M12 20l4 -9l4 9" />
            <path d="M19.1 18h-6.2" />
          </svg>
    </a>
    <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right" style="left: inherit; right: 0px;">
        <a class="dropdown-item {{ session('admin_lang') === 'default' ? 'active' : '' }}" href="{{ route('changeLanguage', 'default') }}">
            {{ __('english_default') }}
        </a>
        @foreach (languages() as $lang)
            <a class="dropdown-item {{ session('admin_lang') === $lang->code ? 'active' : '' }}" href="{{ route('changeLanguage', $lang->code) }}">
                {{ $lang->name }}
            </a>
        @endforeach
    </div>
</li>
<li class="nav-item">
    <a class="nav-link" data-widget="fullscreen" href="#" role="button">
        <i class="fas fa-expand-arrows-alt"></i>
    </a>
</li>
<li class="nav-item">
    <form action="" method="post" id="mode_form">
        @csrf
        @method("PUT")
        @if ($setting->dark_mode)
            <input type="hidden" name="dark_mode" value="0">
        @else
            <input type="hidden" name="dark_mode" value="1">
        @endif
    </form>
    <a onclick="$('#mode_form').submit()" class="nav-link" href="#" role="button">
        @if ($setting->dark_mode)
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" stroke-width="2"
                stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"
                class="icon icon-tabler icon-tabler-brightness-down">
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
            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" stroke-width="2"
                stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round"
                class="icon icon-tabler icon-tabler-moon">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                <path d="M12 3c.132 0 .263 0 .393 0a7.5 7.5 0 0 0 7.92 12.446a9 9 0 1 1 -8.313 -12.454z">
                </path>
            </svg>
        @endif
    </a>
</li>
<li class="nav-item dropdown user-menu">
    <a href="{{ route('profile') }}" class="nav-link dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
            <img src="{{ $user->image_url }}" class="user-image img-circle elevation-2" alt="User Image">
        <span class="d-none d-md-inline">{{ $user->name }}</span>
    </a>
    <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right rounded border-0" style="left: inherit; right: 0px;">
        <!-- User image -->
        <li class="user-header bg-primary rounded-top">
                <img src="{{  $user->image_url }}" class="user-image img-circle elevation-2" alt="User Image">
            <p>
                {{ $user->name }} -
                @foreach ($user->getRoleNames() as $role)
                    ( <span>{{ ucwords($role) }}</span> )
                @endforeach
                <small>Member since {{ $user->created_at->format('M d, Y') }}</small>
            </p>
        </li>
        <!-- Menu Footer-->
        <li class="user-footer border-bottom d-flex">
            <a href="{{ route('profile') }}" class="btn btn-default">Profile</a>
            <a href="javascript:void(0)"
                onclick="event.preventDefault();document.getElementById('logout-form').submit();"
                class="btn btn-default ml-auto">Sign out</a>
            <form id="logout-form" action="{{ route('admin.logout') }}" method="POST" class="d-none invisible">
                @csrf
            </form>
        </li>
    </ul>
</li>
