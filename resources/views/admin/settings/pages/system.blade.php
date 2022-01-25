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
    <hr>
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
    <hr>
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
@endsection


