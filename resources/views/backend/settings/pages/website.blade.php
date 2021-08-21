@extends('backend.settings.setting-layout')
@section('title') WebsiteSite Settings @endsection

@section('website-settings')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title" style="line-height: 36px;">Settings</h3>
        </div>
        <div class="row pt-3 pb-4">
            <div class="col-md-6 offset-md-3">
                @foreach ($site_settings as $setting)
                    <form class="form-horizontal" action="{{ route('setting.website', $setting->id) }}" method="POST"
                        enctype="multipart/form-data">
                        @method('PUT')
                        @csrf
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Site Name</label>
                            <div class="col-sm-9">
                                <input value="{{ $setting->name }}" name="name" type="text"
                                    class="form-control @error('name') is-invalid @enderror" placeholder="Enter Site Name">
                                @error('name') <span class="invalid-feedback"
                                    role="alert"><strong>{{ $message }}</strong></span> @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Site Email</label>
                            <div class="col-sm-9">
                                <input value="{{ $setting->email }}" name="email" type="email"
                                    class="form-control @error('email') is-invalid @enderror"
                                    placeholder="Enter Site Email">
                                @error('email') <span class="invalid-feedback"
                                    role="alert"><strong>{{ $message }}</strong></span> @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Site Logo</label>
                            <div class="col-sm-9">
                                <div class="row">
                                    <div class="col-6">
                                        @if (file_exists($setting->logo_image))
                                            <input type="file" class="form-control dropify" data-default-file="{{ asset($setting->favicon_image) }}" name="logo_image" autocomplete="image"
                                            onchange="document.getElementById('logo_image').src = window.URL.createObjectURL(this.files[0])">
                                        @else
                                            <img class="img-circle" src="{{ asset('backend/image/logo-default.png') }}"
                                                id="logo_image"
                                                style="border: 3px solid #adb5bd;margin: 0 auto;padding: 3px;height:85px;width:85px;">
                                        @endif
                                    </div>
                                    <div class="col-6 mt-4">
                                        @error('logo_image') <span class="text-danger"
                                                role="alert"><strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Site Favicon</label>
                            <div class="col-sm-9">
                                <div class="row">
                                    <div class="col-6">
                                        @if (file_exists($setting->favicon_image))
                                            <input type="file" class="form-control dropify"  data-default-file="{{ asset($setting->logo_image) }}" name="favicon_image" autocomplete="image"
                                            onchange="document.getElementById('favicon_image').src = window.URL.createObjectURL(this.files[0])">
                                        @else
                                            <img class="img-circle" src="{{ asset('backend/image/logo-default.png') }}"
                                                id="favicon_image"
                                                style="border: 3px solid #adb5bd;margin: 0 auto;padding: 3px;height:85px;width:85px;">
                                        @endif
                                    </div>
                                    <div class="col-4 mt-4">
                                    </div>
                                    <div class="col-6 mt-4">
                                        @error('favicon_image') <span class="text-danger"
                                                role="alert"><strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="offset-sm-3 col-sm-9">
                                <button type="submit" class="btn btn-success"><i class="fas fa-sync"></i>
                                    Update</button>
                            </div>
                        </div>
                    </form>
                @endforeach
            </div>
        </div>
    </div>
@endsection
@section('style')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/css/dropify.css" integrity="sha512-In/+MILhf6UMDJU4ZhDL0R0fEpsp4D3Le23m6+ujDWXwl3whwpucJG1PEmI3B07nyJx+875ccs+yX2CqQJUxUw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
@endsection


@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.min.js" integrity="sha512-8QFTrG0oeOiyWo/VM9Y8kgxdlCryqhIxVeRpWSezdRRAvarxVtwLnGroJgnVW9/XBRduxO/z1GblzPrMQoeuew==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        $('.dropify').dropify();
    </script>
@endsection
