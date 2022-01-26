@extends('admin.settings.setting-layout')
@section('title') {{ __('system_setting') }} @endsection

@section('website-settings')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('settings.mode.commingsoon') }}" method="POST">
                @method('PUT')
                @csrf
                <div class="form-group">
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" name="commingsoon_mode" id="commingsoon_mode" value="1" @if($setting->commingsoon_mode == 1) checked  @endif>
                      <label class="form-check-label" for="commingsoon_mode">Comming Soon Mode</label>
                    </div>
                </div>

                <div class="row">
                    <div class="col-4">
                        <div class="mb-3">
                            <button type="submit" class="btn btn-success" onclick="return confirm('Are you sure?')"><i class="fas fa-sync"></i> {{ __('update') }}</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <form action="{{ route('settings.mode.maintaince') }}" method="POST">
                @method('PUT')
                @csrf
                <div class="form-group">
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" name="maintenance_mode" id="maintenance_mode" value="1"  @if($setting->maintenance_mode == 1) checked  @endif>
                      <label class="form-check-label" for="maintenance_mode">Maintenance Mode</label>
                    </div>
                    <span class="help-text">Live Mode Enable URL:
                        <span class="badge badge-dark">
                            {{  env('APP_MAINTENCE_MODE_DISABLE_URL', '/admin/site/live')  }}
                        </span>
                    </span>
                </div>
                <div class="row">
                    <div class="col-4">
                        <div class="mb-3">
                            <button type="submit" class="btn btn-success" onclick="return confirm('Are you sure?')"><i class="fas fa-sync"></i> {{ __('update') }}</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <form action="{{ route('settings.search.indexing') }}" method="POST">
                @method('PUT')
                @csrf
                <div class="form-group">
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" name="search_engine_indexing" id="search_engine_indexing" value="1" @if($setting->search_engine_indexing == 1) checked  @endif>
                      <label class="form-check-label" for="search_engine_indexing">Search Engine Indexing</label>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                        <div class="mb-3">
                            <button type="submit" class="btn btn-success" onclick="return confirm('Are you sure?')"><i class="fas fa-sync"></i> {{ __('update') }}</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <form action="{{ route('settings.google.analytics') }}" method="POST">
                @method('PUT')
                @csrf
                <div class="form-group">
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" name="google_analytics" id="google_analytics" value="1" @if($setting->google_analytics == 1) checked  @endif>
                      <label class="form-check-label" for="google_analytics">Google Analytics</label>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                        <div class="mb-3">
                            <button type="submit" class="btn btn-success"><i class="fas fa-sync"></i> {{ __('update') }}</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <form action="{{ route('settings.facebook.pixel') }}" method="POST">
                @method('PUT')
                @csrf
                <div class="form-group">
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" name="facebook_pixel" id="facebook_pixel" value="1" @if($setting->facebook_pixel == 1) checked  @endif>
                      <label class="form-check-label" for="facebook_pixel">Facebook Pixels</label>
                    </div>
                </div>
                <div class="row">
                    <div class="col-4">
                        <div class="mb-3">
                            <button type="submit" class="btn btn-success"><i class="fas fa-sync"></i> {{ __('update') }}</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection


