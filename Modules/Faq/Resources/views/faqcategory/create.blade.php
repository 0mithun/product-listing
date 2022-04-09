@extends('admin.layouts.app')
@section('title') {{ __("create_faq_category") }} @endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title" style="line-height: 36px;">{{ __("create_faq_category") }}</h3>
                            <a href="{{ route('module.faq.category.index') }}" class="btn bg-success float-right d-flex align-items-center justify-content-center">
                                <i class="fas fa-arrow-left"></i>&nbsp; {{ __("back") }}
                            </a>
                    </div>
                    <div class="card-body table-responsive">
                        <div class="container">
                            <form method="POST" action="{{ route('module.faq.category.store') }}">
                                @csrf
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">{{ __("name") }}<small class="text-danger">*</small></label>
                                    <div class="col-sm-9">
                                        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}">
                                        @error('name') <span class="invalid-feedback" role="alert">{{ $message }}</span> @enderror
                                    </div>
                                </div>
                                <div class="text-center">
                                    <button type="submit" class="btn btn-success">
                                        <i class="fas fa-plus"></i>&nbsp; {{ __("create") }}
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
