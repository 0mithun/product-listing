@extends('admin.layouts.app')
@section('title') {{ __('edit_about') }} @endsection
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title" style="line-height: 36px;">{{ __('edit_about') }}</h3>
                    </div>
                    <div class="row pt-3 pb-4">
                        <div class="col-md-8 offset-md-1">
                            <form class="form-horizontal" action="{{ route('settings.about.update') }}" method="POST">
                                @method('PUT')
                                @csrf
                                <div class="form-group row">
                                    <label class="col-2 col-form-label" for="about">{{ __('about') }}<small class="text-danger">*</small></label>
                                    <div class="col-10">
                                        <textarea id="about" name="about"
                                            class="form-control @error('about') is-invalid @enderror"
                                            placeholder="{{ __('about') }}">{{ $setting->about }}</textarea>
                                        @error('about') <span class="invalid-feedback"
                                            role="alert"><strong>{{ $message }}</strong></span> @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <div class="offset-2 col-10">
                                        <button type="submit" class="btn btn-success">
                                            <i class="fas fa-plus"></i>&nbsp; {{ __('update') }}
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection



@section('script')
    <script src="{{ asset('backend') }}/dist/js/ckeditor.js"></script>
    <script>
        ClassicEditor
            .create(document.querySelector('#about'))
            .then( editor => {
                editor.editing.view.change(writer=>{
                    writer.setStyle('min-height', '350px', editor.editing.view.document.getRoot());
                })
            } )
            .catch(error => {
                console.error(error);
            });
    </script>
@endsection
