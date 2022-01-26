@extends('admin.settings.setting-layout')
@section('title') {{ __('website_settings') }} @endsection
@section('website-settings')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title" style="line-height: 36px;">{{ __('settings') }}</h3>
        </div>
        <div class="row pt-3 pb-4">
            <div class="col-md-6 offset-md-3">
                <form class="form-horizontal" action="{{ route('settings.website.update') }}" method="POST"
                    enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">{{ __('site_name') }}</label>
                        <div class="col-sm-9">
                            <input value="{{ $setting->name }}" name="name" type="text"
                                class="form-control @error('name') is-invalid @enderror" placeholder="Enter Site Name">
                            @error('name') <span class="invalid-feedback"
                                role="alert"><strong>{{ $message }}</strong></span> @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">{{ __('email') }}</label>
                        <div class="col-sm-9">
                            <input value="{{ $setting->email }}" name="email" type="email"
                                class="form-control @error('email') is-invalid @enderror" placeholder="Enter Site Email">
                            @error('email') <span class="invalid-feedback"
                                role="alert"><strong>{{ $message }}</strong></span> @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">{{ __('site_logo') }}</label>
                        <div class="col-sm-9">
                            <div class="row">
                                <div class="col-6">
                                    <input type="file" class="form-control dropify"
                                        data-default-file="{{ $setting->logo_image_url }}" name="logo_image">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-3 col-form-label">{{ __('site_favicon') }}</label>
                        <div class="col-sm-9">
                            <div class="row">
                                <div class="col-6">
                                    <input type="file" class="form-control dropify"
                                        data-default-file="{{ $setting->favicon_image_url }}" name="favicon_image">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="offset-sm-3 col-sm-9">
                            <button type="submit" class="btn btn-success"><i class="fas fa-sync"></i>
                                {{ __('update') }}</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('style')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.css" />
@endsection


@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js"></script>
    <script>
        $('.dropify').dropify();
    </script>
@endsection
