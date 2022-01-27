@extends('admin.settings.setting-layout')
@section('title') {{ __('social_login_setting') }} @endsection

@section('website-settings')
    <div class="row">

    {{-- Google Login Credential Setting --}}
    <div class="col-sm-6">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title" style="line-height: 36px;">{{ __('google_login_credential') }}</h3>
            </div>
            <div class="card-body">
                <form class="form-horizontal" action="{{ route('settings.social.login.update') }}" method="POST"
                    enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <input type="hidden" value="google" name="type">
                    <div class="form-group row">
                        <label class="col-sm-5 col-form-label" for="google_client_id">{{ __('google_client_id') }}</label>
                        <div class="col-sm-7">
                            <input value="{{ env("GOOGLE_CLIENT_ID") }}" name="google_client_id" type="text"
                                class="form-control @error('google_client_id') is-invalid @enderror"
                                autocomplete="off">
                            @error('google_client_id') <span class="invalid-feedback"
                                role="alert"><span>{{ $message }}</span></span> @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-5 col-form-label" for="google_client_secret">{{ __('google_client_secret') }}</label>
                        <div class="col-sm-7">
                            <input value="{{ env('GOOGLE_CLIENT_SECRET') }}" name="google_client_secret" type="text"
                                class="form-control @error('google_client_secret') is-invalid @enderror"
                                autocomplete="off">
                            @error('google_client_secret') <span class="invalid-feedback"
                                role="alert"><span>{{ $message }}</span></span> @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-5 col-form-label">{{ __('status') }}</label>
                        <div class="col-sm-7">
                            <input type="checkbox" name="google" {{ $socialite->google ? 'checked':'' }}  data-bootstrap-switch value="1">
                        </div>
                    </div>
                    @if (userCan('setting.update'))
                    <div class="form-group row">
                        <div class="offset-sm-5 col-sm-7">
                            <button type="submit" class="btn btn-success"><i class="fas fa-sync"></i>
                                {{ __('update') }}</button>
                        </div>
                    </div>
                    @endif
                </form>
            </div>
        </div>
    </div>



    {{-- Facebook Login Credential Setting --}}
    <div class="col-sm-6">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title" style="line-height: 36px;">{{ __('facebook_login_credential') }}</h3>
            </div>
            <div class="card-body">
                <form class="form-horizontal" action="{{ route('settings.social.login.update') }}" method="POST"
                    enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <input type="hidden" value="facebook" name="type">
                    <div class="form-group row">
                        <label class="col-sm-5 col-form-label" for="facebook_client_id">{{ __('facebook_client_id') }}</label>
                        <div class="col-sm-7">
                            <input value="{{ env("FACEBOOK_CLIENT_ID") }}" name="facebook_client_id" type="text"
                                class="form-control @error('facebook_client_id') is-invalid @enderror"
                                autocomplete="off">
                            @error('facebook_client_id') <span class="invalid-feedback"
                                role="alert"><span>{{ $message }}</span></span> @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-5 col-form-label" for="facebook_client_secret">{{ __('facebook_client_secret') }}</label>
                        <div class="col-sm-7">
                            <input value="{{ env('FACEBOOK_CLIENT_SECRET') }}" name="facebook_client_secret" type="text"
                                class="form-control @error('facebook_client_secret') is-invalid @enderror"
                                autocomplete="off">
                            @error('facebook_client_secret') <span class="invalid-feedback"
                                role="alert"><span>{{ $message }}</span></span> @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-5 col-form-label">{{ __('status') }}</label>
                        <div class="col-sm-7">
                            <input type="checkbox" {{ $socialite->facebook ? 'checked':'' }} name="facebook" data-bootstrap-switch value="1">
                        </div>
                    </div>
                    @if (userCan('setting.update'))
                    <div class="form-group row">
                        <div class="offset-sm-5 col-sm-7">
                            <button type="submit" class="btn btn-success"><i class="fas fa-sync"></i>
                                {{ __('update') }}</button>
                        </div>
                    </div>
                    @endif
                </form>
            </div>
        </div>
    </div>

    {{-- Twitter Login Credential Setting --}}
    <div class="col-sm-6">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title" style="line-height: 36px;">{{ __('twitter_login_credential') }}</h3>
            </div>
            <div class="card-body">
                <form class="form-horizontal" action="{{ route('settings.social.login.update') }}" method="POST"
                    enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <input type="hidden" value="twitter" name="type">
                    <div class="form-group row">
                        <label class="col-sm-5 col-form-label" for="twitter_client_id">{{ __('twitter_client_id') }}</label>
                        <div class="col-sm-7">
                            <input value="{{ env("TWITTER_CLIENT_ID") }}" name="twitter_client_id" type="text"
                                class="form-control @error('twitter_client_id') is-invalid @enderror"
                                autocomplete="off">
                            @error('twitter_client_id') <span class="invalid-feedback"
                                role="alert"><span>{{ $message }}</span></span> @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-5 col-form-label" for="twitter_client_secret">{{ __('twitter_client_secret') }}</label>
                        <div class="col-sm-7">
                            <input value="{{ env('TWITTER_CLIENT_SECRET') }}" name="twitter_client_secret" type="text"
                                class="form-control @error('twitter_client_secret') is-invalid @enderror"
                                autocomplete="off">
                            @error('twitter_client_secret') <span class="invalid-feedback"
                                role="alert"><span>{{ $message }}</span></span> @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-5 col-form-label">{{ __('status') }}</label>
                        <div class="col-sm-7">
                            <input type="checkbox" {{ $socialite->twitter ? 'checked':'' }} name="twitter" data-bootstrap-switch value="1">
                        </div>
                    </div>
                    @if (userCan('setting.update'))
                    <div class="form-group row">
                        <div class="offset-sm-5 col-sm-7">
                            <button type="submit" class="btn btn-success"><i class="fas fa-sync"></i>
                                {{ __('update') }}</button>
                        </div>
                    </div>
                    @endif
                </form>
            </div>
        </div>
    </div>


    {{-- Linkedin Login Credential Setting --}}
    <div class="col-sm-6">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title" style="line-height: 36px;">{{ __('linkedin_login_credential') }}</h3>
            </div>
            <div class="card-body">
                <form class="form-horizontal" action="{{ route('settings.social.login.update') }}" method="POST"
                    enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <input type="hidden" value="linkedin" name="type">
                    <div class="form-group row">
                        <label class="col-sm-5 col-form-label" for="linkedin_client_id">{{ __('linkedin_client_id') }}</label>
                        <div class="col-sm-7">
                            <input value="{{ env("LINKEDIN_CLIENT_ID") }}" name="linkedin_client_id" type="text"
                                class="form-control @error('linkedin_client_id') is-invalid @enderror"
                                autocomplete="off">
                            @error('linkedin_client_id') <span class="invalid-feedback"
                                role="alert"><span>{{ $message }}</span></span> @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-5 col-form-label" for="linkedin_client_secret">{{ __('linkedin_client_secret') }}</label>
                        <div class="col-sm-7">
                            <input value="{{ env('LINKEDIN_CLIENT_SECRET') }}" name="linkedin_client_secret" type="text"
                                class="form-control @error('linkedin_client_secret') is-invalid @enderror"
                                autocomplete="off">
                            @error('linkedin_client_secret') <span class="invalid-feedback"
                                role="alert"><span>{{ $message }}</span></span> @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-5 col-form-label">{{ __('status') }}</label>
                        <div class="col-sm-7">
                            <input type="checkbox" {{ $socialite->linkedin ? 'checked':'' }} name="linkedin" data-bootstrap-switch value="1">
                        </div>
                    </div>
                    @if (userCan('setting.update'))
                    <div class="form-group row">
                        <div class="offset-sm-5 col-sm-7">
                            <button type="submit" class="btn btn-success"><i class="fas fa-sync"></i>
                                {{ __('update') }}</button>
                        </div>
                    </div>
                    @endif
                </form>
            </div>
        </div>
    </div>

</div>
@endsection


@section('script')
<script src="{{ asset('backend') }}/plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>
<script>
    $("input[data-bootstrap-switch]").each(function () {
        $(this).bootstrapSwitch('state', $(this).prop('checked'));
    })
    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
    })
</script>
@endsection

@section('style')
<link rel="stylesheet" href="{{ asset('backend') }}/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
@endsection



