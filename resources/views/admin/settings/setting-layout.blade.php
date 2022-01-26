@extends('admin.layouts.app')
@section('title') {{ __('site_settings') }} @endsection
@section('breadcrumbs')
    <div class="row mb-2 mt-4">
        <div class="col-sm-6">
            <h1 class="m-0">{{ __('settings') }}</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                <li class="breadcrumb-item active">{{ __('settings') }}</li>
            </ol>
        </div>
    </div>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-2">
                <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <a class="nav-link {{ Route::is('settings.website') ? 'active' : '' }}"
                        href="{{ route('settings.website') }}">{{ __('website') }}</a>
                    <a class="nav-link {{ Route::is('settings.layout') ? 'active' : '' }}"
                        href="{{ route('settings.layout') }}">{{ __('layout') }}</a>
                    <a class="nav-link {{ Route::is('settings.color') ? 'active' : '' }}"
                        href="{{ route('settings.color') }}">{{ __('color_picker') }}</a>
                    <a class="nav-link {{ Route::is('settings.custom') ? 'active' : '' }}"
                        href="{{ route('settings.custom') }}">{{ __('custom_css_js') }}</a>
                    <a class="nav-link {{ Route::is('settings.email') ? 'active' : '' }}"
                        href="{{ route('settings.email') }}">{{ __('email') }}</a>

                    <a class="nav-link {{ Route::is('settings.system') ? 'active' : '' }}"
                        href="{{ route('settings.system') }}">{{ __('system') }}</a>

                    <a class="nav-link {{ Route::is('settings.social.login') ? 'active' : '' }}"
                        href="{{ route('settings.social.login') }}">{{ __('social_login') }}</a>
                </div>
            </div>
            <div class="col-10">
                <div class="tab-content" id="v-pills-tabContent">
                    <div class="tab-pane fade show active ">
                        @yield('website-settings')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
