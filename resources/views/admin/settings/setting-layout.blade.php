@extends('admin.layouts.app')
@section('title') Site Settings @endsection
@section('breadcrumbs')
    <div class="row mb-2 mt-4">
        <div class="col-sm-6">
            <h1 class="m-0">Settings</h1>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Home</a></li>
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
                    <a class="nav-link {{ Route::is('settings.website') ? 'active' : '' }}"
                        href="{{ route('settings.website') }}">Website</a>
                    <a class="nav-link {{ Route::is('settings.layout') ? 'active' : '' }}"
                        href="{{ route('settings.layout') }}">Layout</a>
                    <a class="nav-link {{ Route::is('settings.color') ? 'active' : '' }}"
                        href="{{ route('settings.color') }}">Color Picker</a>
                    <a class="nav-link {{ Route::is('settings.custom') ? 'active' : '' }}"
                        href="{{ route('settings.custom') }}">Custom CSS &
                        JS</a>
                    <a class="nav-link {{ Route::is('settings.email') ? 'active' : '' }}"
                        href="{{ route('settings.email') }}">Email</a>
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
