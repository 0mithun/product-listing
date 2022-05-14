@extends('admin.layouts.app')
@section('title') {{ __('edit_product') }} @endsection
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title" style="line-height: 36px;">{{ __('edit_product') }}</h3>
                        <a href="{{ route('products.index') }}"
                            class="btn bg-primary float-right d-flex align-items-center justify-content-center"><i
                                class="fas fa-arrow-left"></i>&nbsp; {{ __('back') }}</a>
                    </div>
                    <div class="row pt-3 pb-4">
                        <div class="col-md-6 offset-md-3">
                            <form class="form-horizontal" action="{{ route('products.update', $product->slug) }}" method="POST"
                                enctype="multipart/form-data">
                                @method('PUT')
                                @csrf

                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label" for="title">{{ __('title') }}<small class="text-danger">*</small></label>
                                    <div class="col-sm-9">
                                        <input id="title" value="{{ $product->title }}" name="title" type="text"
                                            class="form-control @error('title') is-invalid @enderror"
                                            placeholder="{{ __('title') }}">
                                        @error('title') <span class="invalid-feedback"
                                            role="alert"><strong>{{ $message }}</strong></span> @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label" for="category_id">{{ __('category') }}<small class="text-danger">*</small></label>
                                    <div class="col-sm-9">
                                        <select name="category_id" id="category_id" class="form-control @error('parent_id') is-invalid @enderror">
                                            @foreach ($categories as $category)
                                                {{ nestedCategories(0, $category, $product->category_id, '|___') }}
                                            @endforeach
                                        </select>
                                        @error('category_id') <span class="invalid-feedback"
                                            role="alert"><strong>{{ $message }}</strong></span> @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label" for="dimension">{{ __('dimension') }}<small class="text-danger">*</small></label>
                                    <div class="col-sm-9">
                                        <input id="dimension" value="{{ $product->dimension }}" name="dimension" type="text"
                                            class="form-control @error('dimension') is-invalid @enderror"
                                            placeholder="{{ __('dimension') }}">
                                        @error('dimension') <span class="invalid-feedback"
                                            role="alert"><strong>{{ $message }}</strong></span> @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label" for="origin">{{ __('origin') }}<small class="text-danger">*</small></label>
                                    <div class="col-sm-9">
                                        <input id="origin" value="{{ $product->origin }}" name="origin" type="text"
                                            class="form-control @error('origin') is-invalid @enderror"
                                            placeholder="{{ __('origin') }}">
                                        @error('origin') <span class="invalid-feedback"
                                            role="alert"><strong>{{ $message }}</strong></span> @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label" for="price">{{ __('price') }}</label>
                                    <div class="col-sm-9">
                                        <input id="price" value="{{ $product->price }}" name="price" type="text"
                                            class="form-control @error('price') is-invalid @enderror"
                                            placeholder="{{ __('price') }}">
                                        @error('price') <span class="invalid-feedback"
                                            role="alert"><strong>{{ $message }}</strong></span> @enderror
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label" for="metadata">{{ __('metadata') }}<small class="text-danger">*</small></label>
                                    <div class="col-sm-9">
                                        <textarea id="metadata" name="metadata"
                                            class="form-control @error('metadata') is-invalid @enderror"
                                            placeholder="{{ __('metadata') }}">{{ $product->metadata }}</textarea>
                                        @error('metadata') <span class="invalid-feedback"
                                            role="alert"><strong>{{ $message }}</strong></span> @enderror
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label" for="description">{{ __('description') }}<small class="text-danger">*</small></label>
                                    <div class="col-sm-9">
                                        <textarea id="description" name="description"
                                            class="form-control @error('description') is-invalid @enderror"
                                            placeholder="{{ __('description') }}">{{ $product->description }}</textarea>
                                        @error('description') <span class="invalid-feedback"
                                            role="alert"><strong>{{ $message }}</strong></span> @enderror
                                    </div>
                                </div>
                                <div class="form-group form-check">
                                    <div class="col-sm-12 offset-sm-3">
                                        <input type="checkbox" class="form-check-input" id="home_page" name="home_page" value="1" @if ($product->home_page) checked @endif>
                                        <label class="form-check-label" for="home_page">Home Page</label>
                                    </div>
                                </div>


                                <div class="form-group row">
                                    <div class="offset-sm-3 col-sm-4">
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
    {{-- <script src="{{ asset('backend') }}/dist/js/ckeditor.js"></script>
    <script>
        ClassicEditor
            .create(document.querySelector('#description'))
            .then( editor => {
                editor.editing.view.change(writer=>{
                    writer.setStyle('min-height', '150px', editor.editing.view.document.getRoot());
                })
            } )
            .catch(error => {
                console.error(error);
            });
    </script> --}}

    <script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace( 'description', {
            filebrowserUploadUrl: "{{ route('product.description.upload', ['_token' => csrf_token() ]) }}",
            filebrowserUploadMethod: 'form'
        });
    </script>
@endsection
