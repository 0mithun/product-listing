@extends('backend.settings.setting-layout')
@section('title') WebsiteSite Settings @endsection

@section('custom-setting')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title" style="line-height: 36px;">Custom CSS & JS</h3>
        </div>
        <div class="row pt-3 pb-4">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('setting.custom') }}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="role_name">Header custom style (before head end) </label>
                                <textarea name="header_css" class="form-control @error('name') is-invalid @enderror"
                                    rows="5">{{ $setting->header_css }}</textarea>
                                @error('name')<span class="invalid-feedback"
                                    role="alert"><strong>{{ $message }}</strong></span>@enderror
                            </div>
                            <div class="form-group">
                                <label for="role_name">Header custom script (before head end) </label>
                                <textarea name="header_script" class="form-control @error('name') is-invalid @enderror"
                                    rows="5">{{ $setting->header_script }}</textarea>
                                @error('name')<span class="invalid-feedback"
                                    role="alert"><strong>{{ $message }}</strong></span>@enderror
                            </div>
                            <div class="form-group">
                                <label for="role_name">Footer custom script (before body end) </label>
                                <textarea name="body_script" class="form-control @error('name') is-invalid @enderror"
                                    rows="5">{{ $setting->body_script }}</textarea>
                                @error('name')<span class="invalid-feedback"
                                    role="alert"><strong>{{ $message }}</strong></span>@enderror
                            </div>
                            <div class="form-group">
                                <button class="btn btn-primary">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
