@extends('admin.settings.setting-layout')
@section('title') {{ __('mail_settings') }} @endsection

@section('website-settings')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title" style="line-height: 36px;">{{ __('mail_settings') }}</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('settings.email.update') }}" method="POST">
                @method('PUT')
                @csrf
                <div class="row">
                    <div class="col-6">
                        <div class="mb-3">
                            <label for="driver" class="form-label">{{ __('mail_driver') }}</label>
                            <input disabled type="text" class="form-control @error('driver') is-invalid @enderror" id="driver" value="smtp" name="driver">
                            @error('driver') <span class="invalid-feedback" role="alert">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="mb-3">
                            <label for="mail_host" class="form-label">{{ __('mail_host') }}</label>
                            <input type="text" class="form-control @error('mail_host') is-invalid @enderror" id="mail_host" value="{{ config('mail.mailers.smtp.host') }}" name="mail_host">
                            @error('mail_host') <span class="invalid-feedback" role="alert">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="mb-3">
                            <label for="mail_port" class="form-label">{{ __('mail_port') }}</label>
                            <input type="text" class="form-control @error('mail_port') is-invalid @enderror" id="mail_port" value="{{ config('mail.mailers.smtp.port') }}" name="mail_port">
                            @error('mail_port') <span class="invalid-feedback" role="alert">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="mb-3">
                            <label class="form-label" for="mail_username">{{ __('mail_username') }}</label>
                            <input type="text" class="form-control @error('mail_username') is-invalid @enderror" id="mail_username" placeholder="{{ __('change_mail_username') }}" name="mail_username" value="{{ config('mail.mailers.smtp.username') }}">
                            @error('mail_username') <span class="invalid-feedback" role="alert">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="mb-3">
                            <label for="mail_password" class="form-label">{{ __('mail_password') }}</label>
                            <input type="text" class="form-control @error('mail_password') is-invalid @enderror" id="mail_password" placeholder="{{ __('change_mail_password') }}" name="mail_password" value="{{ config('mail.mailers.smtp.password') }}">
                            @error('mail_password') <span class="invalid-feedback" role="alert">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="mb-3">
                            <label for="mail_encryption" class="form-label">{{ __('mail_encryption') }}</label>
                            <input type="text" class="form-control @error('mail_encryption') is-invalid @enderror" id="mail_encryption" value="{{ config('mail.mailers.smtp.encryption') }}" name="mail_encryption">
                            @error('mail_encryption') <span class="invalid-feedback" role="alert">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="mb-3">
                            <label for="mail_from_address" class="form-label">{{ __('mail_from_address') }}</label>
                            <input type="text" class="form-control @error('mail_from_address') is-invalid @enderror" id="mail_from_address" value="{{ config('mail.from.address') }}" name="mail_from_address">
                            @error('mail_from_address') <span class="invalid-feedback" role="alert">{{ $message }}</span> @enderror
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="mb-3">
                            <label for="mail_from_name" class="form-label">{{ __('mail_from_name') }}</label>
                            <input type="text" class="form-control @error('mail_from_name') is-invalid @enderror" id="mail_from_name" value="{{ config('mail.from.name') }}" name="mail_from_name">
                            @error('mail_from_name') <span class="invalid-feedback" role="alert">{{ $message }}</span> @enderror
                        </div>
                    </div>
                </div>
                @if (userCan('setting.update'))
                <div class="mx-auto">
                    <div class="text-center">
                        <button type="submit" class="btn btn-success"><i class="fas fa-sync"></i> {{ __('update') }}</button>
                    </div>
                </div>
                @endif
            </form>
        </div>
    </div>
    <div class="card mt-3">
        <div class="card-header">
            <h3 class="card-title">{{ __('send_test_mail') }}</h3>
        </div>
        <div class="card-body">
            <div class="d-flex justify-content-center">
                <form class="form-inline" action="{{ route('settings.email.test') }}" method="POST">
                    @csrf
                    <div class="form-group mb-2">
                       <label for="test_email">{{ __('email_address') }}</label>
                    </div>
                    <div class="form-group mx-sm-3 mb-2">
                      <input name="test_email" type="email" class="form-control  @error('test_email') is-invalid @enderror" id="test_email" placeholder="{{ __('enter_email') }}" style="min-width: 400px">
                      @error('test_email') <span class="invalid-feedback" role="alert">{{ $message }}</span> @enderror
                    </div>
                    @if (userCan('setting.update'))
                    <button type="submit" class="btn btn-primary mb-2"><i class="far fa-paper-plane"></i> {{ __('send_mail') }}</button>
                    @endif
                </form>
            </div>
        </div>
        </div>
@endsection


