@extends('admin.settings.setting-layout')
@section('title') {{ __('system_settings') }} @endsection

@section('website-settings')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('settings.mode.commingsoon') }}" method="POST">
                @method('PUT')
                @csrf
                <div class="form-group">
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" name="commingsoon_mode" id="commingsoon_mode" value="1" @if($setting->commingsoon_mode == 1) checked  @endif>
                      <label class="form-check-label" for="commingsoon_mode">{{ __('comming_soon_mode') }}</label>
                    </div>
                </div>
                @if (userCan('setting.update'))
                <div class="row">
                    <div class="col-4">
                        <div class="mb-3">
                            <button type="submit" class="btn btn-success" onclick="return confirm('Are you sure?')"><i class="fas fa-sync"></i> {{ __('update') }}</button>
                        </div>
                    </div>
                </div>
                @endif
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
                      <label class="form-check-label" for="maintenance_mode">{{ __('maintenance_mode') }}</label>
                    </div>
                    <span class="help-text">{{ __('live_mode_enable_url') }}
                        <span class="badge badge-dark">
                            {{  env('APP_MAINTENCE_MODE_DISABLE_URL', '/admin/site/live')  }}
                        </span>
                    </span>
                </div>
                @if (userCan('setting.update'))
                <div class="row">
                    <div class="col-4">
                        <div class="mb-3">
                            <button type="submit" class="btn btn-success" onclick="return confirm('Are you sure?')"><i class="fas fa-sync"></i> {{ __('update') }}</button>
                        </div>
                    </div>
                </div>
                @endif
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
                      <label class="form-check-label" for="search_engine_indexing">{{ __('search_engine_ndexing') }}</label>
                    </div>
                </div>
                @if (userCan('setting.update'))
                <div class="row">
                    <div class="col-4">
                        <div class="mb-3">
                            <button type="submit" class="btn btn-success" onclick="return confirm('Are you sure?')"><i class="fas fa-sync"></i> {{ __('update') }}</button>
                        </div>
                    </div>
                </div>
                @endif
            </form>
        </div>
    </div>
    <div class="card">
        <div class="card-body">
            <form action="{{ route('settings.google.analytics') }}" method="POST">
                @method('PUT')
                @csrf
                <div class="form-group row">
                    <label class="col-sm-5 col-md-2 col-form-label" for="google_analytics_id">{{ __('google_analytics_id') }}</label>
                    <div class="col-sm-7 col-md-4">
                        <input value="{{ env('GOOGLE_ANALYTICS_ID') }}" name="google_analytics_id" type="text"
                            class="form-control @error('google_analytics_id') is-invalid @enderror"
                            autocomplete="off">
                        @error('google_analytics_id') <span class="invalid-feedback"
                            role="alert"><span>{{ $message }}</span></span> @enderror
                    </div>
                </div>
                <div class="form-group form-check row">
                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                    <label class="form-check-label" for="exampleCheck1">Check me out</label>
                  </div>
                <div class="form-group">
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" name="google_analytics" id="google_analytics" value="1" @if($setting->google_analytics == 1) checked  @endif>
                      <label class="form-check-label" for="google_analytics">{{ __('google_nalytics') }}</label>
                    </div>
                </div>
                @if (userCan('setting.update'))
                <div class="row">
                    <div class="col-4">
                        <div class="mb-3">
                            <button type="submit" class="btn btn-success"><i class="fas fa-sync"></i> {{ __('update') }}</button>
                        </div>
                    </div>
                </div>
                @endif
            </form>
        </div>
    </div>
@endsection


