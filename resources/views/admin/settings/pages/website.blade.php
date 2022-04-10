@extends('admin.settings.setting-layout')
@section('title') {{ __('website_settings') }} @endsection
@section('website-settings')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title" style="line-height: 36px;">{{ __('settings') }}</h3>
        </div>
        <div class="row pt-3 pb-4">
            <div class="col-md-11 offset-1">
                <form class="form-horizontal" action="{{ route('settings.website.update') }}" method="POST"
                    enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="col-sm-12 col-form-label">{{ __('site_name') }}</label>
                                <div class="col-sm-12">
                                    <input value="{{ $setting->name }}" name="name" type="text"
                                        class="form-control @error('name') is-invalid @enderror" placeholder="Enter Site Name">
                                    @error('name') <span class="invalid-feedback"
                                        role="alert"><strong>{{ $message }}</strong></span> @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="col-sm-12 col-form-label">{{ __('email') }}</label>
                                <div class="col-sm-12">
                                    <input value="{{ $setting->email }}" name="email" type="email"
                                        class="form-control @error('email') is-invalid @enderror" placeholder="Enter Site Email">
                                    @error('email') <span class="invalid-feedback"
                                        role="alert"><strong>{{ $message }}</strong></span> @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="col-sm-3 col-form-label">{{ __('phone') }}</label>
                                <div class="col-sm-12">
                                    <input value="{{ $setting->phone }}" name="phone" type="text"
                                        class="form-control @error('phone') is-invalid @enderror" placeholder="Enter phone">
                                    @error('phone') <span class="invalid-feedback"
                                        role="alert"><strong>{{ $message }}</strong></span> @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="col-md-6 col-form-label">{{ __('site_logo') }}</label>
                                <div class="col-md-6">
                                    <input type="file" class="form-control dropify"
                                        data-default-file="{{ $setting->logo_image_url }}" name="logo_image">
                                    @error('logo_image')
                                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>

                            </div>

                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="col-md-6 col-form-label">{{ __('site_favicon') }}</label>
                                <div class="col-md-6">
                                    <input type="file" class="form-control dropify" accept="image/png"
                                        data-default-file="{{ $setting->favicon_image_url }}" name="favicon_image">
                                    @error('favicon_image')
                                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror
                                </div>

                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="col-md-6 col-form-label">{{ __('og_image') }}</label>
                                <div class="col-md-6">
                                    <input type="file" class="form-control dropify"
                                        data-default-file="{{ $setting->og_image_url }}" name="og_image">
                                </div>

                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">

                        </div>
                        <div class="col-md-6">

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="col-sm-12 col-form-label">{{ __('copyright_text') }}</label>
                                <div class="col-sm-12">
                                    <input value="{{ $setting->copyright_text }}" copyright_text="copyright_text" type="text"
                                        class="form-control @error('copyright_text') is-invalid @enderror" placeholder="Enter Site copyright_text">
                                    @error('copyright_text') <span class="invalid-feedback"
                                        role="alert"><strong>{{ $message }}</strong></span> @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="col-sm-12 col-form-label">{{ __('map_text') }}</label>
                                <div class="col-sm-12">
                                    <input value="{{ $setting->map_text }}" name="map_text" type="map_text"
                                        class="form-control @error('map_text') is-invalid @enderror" placeholder="Enter Site map_text">
                                    @error('map_text') <span class="invalid-feedback"
                                        role="alert"><strong>{{ $message }}</strong></span> @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="col-sm-12 col-form-label">{{ __('full_address') }}</label>
                                <div class="col-sm-12">
                                    <input value="{{ $setting->full_address }}" name="full_address" type="text"
                                        class="form-control @error('full_address') is-invalid @enderror" placeholder="Enter full address">
                                    @error('full_address') <span class="invalid-feedback"
                                        role="alert"><strong>{{ $message }}</strong></span> @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="col-sm-12 col-form-label">{{ __('facebook') }}</label>
                                <div class="col-sm-12">
                                    <input value="{{ $setting->facebook }}" name="facebook" type="text"
                                        class="form-control @error('facebook') is-invalid @enderror" placeholder="Enter facebook">
                                    @error('facebook') <span class="invalid-feedback"
                                        role="alert"><strong>{{ $message }}</strong></span> @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="col-sm-12 col-form-label">{{ __('twitter') }}</label>
                                <div class="col-sm-12">
                                    <input value="{{ $setting->twitter }}" name="twitter" type="text"
                                        class="form-control @error('twitter') is-invalid @enderror" placeholder="Enter twitter">
                                    @error('twitter') <span class="invalid-feedback"
                                        role="alert"><strong>{{ $message }}</strong></span> @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="col-sm-12 col-form-label">{{ __('instagram') }}</label>
                                <div class="col-sm-12">
                                    <input value="{{ $setting->instagram }}" name="instagram" type="text"
                                        class="form-control @error('instagram') is-invalid @enderror" placeholder="Enter instagram">
                                    @error('instagram') <span class="invalid-feedback"
                                        role="alert"><strong>{{ $message }}</strong></span> @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="col-sm-12 col-form-label">{{ __('pinterest') }}</label>
                                <div class="col-sm-12">
                                    <input value="{{ $setting->pinterest }}" name="pinterest" type="text"
                                        class="form-control @error('pinterest') is-invalid @enderror" placeholder="Enter pinterest">
                                    @error('pinterest') <span class="invalid-feedback"
                                        role="alert"><strong>{{ $message }}</strong></span> @enderror
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-sm-12 col-form-label">{{ __('meta_keyword') }}</label>
                                <div class="col-sm-12">
                                    <textarea value="{{ $setting->meta_keyword }}" name="meta_keyword"
                                        class="form-control @error('meta_keyword') is-invalid @enderror" placeholder="Enter meta keyword">{{ $setting->meta_keyword }}</textarea>
                                    @error('meta_keyword') <span class="invalid-feedback"
                                        role="alert"><strong>{{ $message }}</strong></span> @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="col-sm-12 col-form-label">{{ __('meta_description') }}</label>
                                <div class="col-sm-12">
                                    <textarea value="{{ $setting->meta_description }}" name="meta_description"
                                        class="form-control @error('meta_description') is-invalid @enderror" placeholder="Enter meta keyword">{{ $setting->meta_description }}</textarea>
                                    @error('meta_description') <span class="invalid-feedback"
                                        role="alert"><strong>{{ $message }}</strong></span> @enderror
                                </div>
                            </div>
                        </div>
                    </div>

                    @if (userCan('setting.update'))
                    <div class="form-group row">
                        <div class="offset-sm-3 col-sm-12">
                            <button type="submit" class="btn btn-success"><i class="fas fa-sync"></i>
                                {{ __('update') }}</button>
                        </div>
                    </div>
                    @endif
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
