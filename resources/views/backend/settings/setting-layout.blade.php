@extends('layouts.admin')
@section('title') Site Settings @endsection
@section('breadcrumbs')
    <div class="row mb-2 mt-4">
        <div class="col-sm-6">
            <h1 class="m-0">Settings</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                <li class="breadcrumb-item active">Settings</li>
            </ol>
        </div>
    </div>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-2">
                <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                    <a class="nav-link {{ request()->page == 'website' ? 'active' : '' }}"
                        href="{{ route('setting', 'website') }}">Website</a>
                    {{-- <a class="nav-link {{ request()->page == 'color' ? 'active' : '' }}"
                        href="{{ route('setting', 'color') }}">Color Picker</a>
                    <a class="nav-link {{ request()->page == 'layout' ? 'active' : '' }}"
                        href="{{ route('setting', 'layout') }}">Layout</a>
                    <a class="nav-link {{ request()->page == 'language' ? 'active' : '' }}"
                        href="{{ route('setting', 'language') }}">Language</a>
                    <a class="nav-link {{ request()->page == 'payment' ? 'active' : '' }}"
                        href="{{ route('setting', 'payment') }}">Payment</a>
                    <a class="nav-link {{ request()->page == 'mail' ? 'active' : '' }}"
                        href="{{ route('setting', 'mail') }}">Mail</a>
                    <a class="nav-link {{ request()->page == 'custom' ? 'active' : '' }}"
                        href="{{ route('setting', 'custom') }}">Custom Css &
                        Js</a>
                    <a class="nav-link {{ request()->page == 'currency' ? 'active' : '' }}"
                        href="{{ route('setting', 'currency') }}">Currency</a>
                    <a class="nav-link {{ request()->page == 'theme' ? 'active' : '' }}"
                        href="{{ route('setting', 'theme') }}">Theme</a> --}}
                </div>
            </div>
            <div class="col-10">
                <div class="tab-content" id="v-pills-tabContent">
                    <div class="tab-pane fade {{ request()->page == 'website' ? 'show active' : '' }}">
                        @yield('website-settings')
                    </div>
                    {{-- <div class="tab-pane fade {{ request()->page == 'color' ? 'show active' : '' }}">
                        @yield('color-picker')
                    </div>
                    <div class="tab-pane fade {{ request()->page == 'layout' ? 'show active' : '' }}" id="layout"
                        role="tabpanel" aria-labelledby="homee">
                        @yield('layout')
                    </div>
                    <div class="tab-pane fade {{ request()->page == 'language' ? 'show active' : '' }}" id="language"
                        role="tabpanel" aria-labelledby="homee">
                        @yield('language-setting')
                    </div>
                    <div class="tab-pane fade {{ request()->page == 'payment' ? 'show active' : '' }}" id="payment"
                        role="tabpanel" aria-labelledby="homee">
                        @yield('payment-setting')
                    </div>
                    <div class="tab-pane fade {{ request()->page == 'mail' ? 'show active' : '' }}" id="maill"
                        role="tabpanel" aria-labelledby="homee">
                        @yield('mail-setting')
                    </div>
                    <div class="tab-pane fade {{ request()->page == 'custom' ? 'show active' : '' }}" id="custom"
                        role="tabpanel" aria-labelledby="homee">
                        @yield('custom-setting')
                    </div>
                    <div class="tab-pane fade {{ request()->page == 'currency' ? 'show active' : '' }}" id="currency"
                        role="tabpanel" aria-labelledby="homee">
                        @yield('currency-setting')
                    </div>
                    <div class="tab-pane fade {{ request()->page == 'theme' ? 'show active' : '' }}" id="theme"
                        role="tabpanel" aria-labelledby="homee">
                        @yield('theme-setting')
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
@endsection
