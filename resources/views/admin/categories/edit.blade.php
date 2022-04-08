@extends('admin.layouts.app')
@section('title') {{ __('edit_category') }} @endsection
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title" style="line-height: 36px;">{{ __('edit_category') }}</h3>
                        <a href="{{ route('categories.index') }}"
                            class="btn bg-primary float-right d-flex align-items-center justify-content-center">
                            <i class="fas fa-arrow-left"></i>&nbsp; {{ __('back') }}
                        </a>
                    </div>
                    <div class="row pt-3 pb-4">
                        <div class="col-md-6 offset-md-3">
                            <form class="form-horizontal" action="{{ route('categories.update', $category->id) }}"
                                method="POST" enctype="multipart/form-data">
                                @method('PUT')
                                @csrf
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">{{ __('category_name') }}<small class="text-danger">*</small></label>
                                    <div class="col-sm-9">
                                        <input value="{{ $category->name }}" name="name" type="text"
                                            class="form-control @error('name') is-invalid @enderror"
                                            placeholder="{{ __('enter_category_name') }}">
                                        @error('name') <span class="invalid-feedback"
                                            role="alert"><strong>{{ $message }}</strong></span> @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label">{{ __('parent_category') }}<small class="text-danger">*</small></label>
                                    <div class="col-sm-9">
                                        <select name="parent_id" id="parent_id" class="form-control @error('parent_id') is-invalid @enderror">
                                            @foreach ($categories as $categoryItem)
                                               {{ nestedCategories(0, $categoryItem, $category->parent_id, '|___') }}
                                            @endforeach
                                        </select>
                                        @error('name') <span class="invalid-feedback"
                                            role="alert"><strong>{{ $message }}</strong></span> @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="offset-sm-3 col-sm-4">
                                        <button type="submit" class="btn btn-success">
                                            <i class="fas fa-sync"></i>&nbsp; {{ __('update') }}
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

