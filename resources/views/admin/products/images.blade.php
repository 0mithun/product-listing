@php
$user = auth()->user();
@endphp

@extends('admin.layouts.app')

@section('title') {{ __('product_list') }} @endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title" style="line-height: 36px;">{{ __('product_list') }}</h3>
                        <a href="{{ route('products.index') }}"
                        class="btn bg-primary float-right d-flex align-items-center justify-content-center"><i
                            class="fas fa-arrow-left"></i>&nbsp; {{ __('back') }}</a>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6 offset-md-2">
                                <form class="form-horizontal" action="{{ route('product.images.add', $product->slug) }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label" for="price">{{ __('image') }}</label>
                                        <div class="col-sm-9">
                                            <input id="image" name="image" type="file"
                                                class="form-control-file @error('image') is-invalid @enderror"
                                                placeholder="{{ __('image') }}">
                                            @error('image') <span class="invalid-feedback"
                                                role="alert"><strong>{{ $message }}</strong></span> @enderror
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-3 col-form-label" for="alt">{{ __('alt') }}</label>
                                        <div class="col-sm-9">
                                            <input id="alt" name="alt" type="text"
                                                class="form-control @error('alt') is-invalid @enderror"
                                                placeholder="{{ __('alt') }}">
                                            @error('alt') <span class="invalid-feedback"
                                                role="alert"><strong>{{ $message }}</strong></span> @enderror
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="offset-sm-3 col-sm-4">
                                            <button type="submit" class="btn btn-success">
                                                <i class="fas fa-plus"></i>&nbsp; {{ __('add_image') }}
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <hr>
                        <div class="row">
                            @php
                                $media = $product->getMedia('gallery');
                            @endphp
                            @forelse ($media as $image)
                                <div class="col-md-2 col-sm-1">
                                    <div class="image-box">
                                        <div class="delete-button">
                                            <a onclick="return confirm('Are you sure?');" href="{{ route('product.images.delete', ['slug'=> $product->slug, 'image'=> $loop->index]) }}">
                                                <i class="fas fa-trash"></i>
                                            </a>
                                        </div>
                                        <div class="image">
                                            <img src="{{ $media[$loop->index]->getFullUrl() }}" class="img-thumbnail" alt="...">

                                        </div>
                                        <div class="description">
                                            {{ $media[$loop->index]->getCustomProperty('alt') }}
                                        </div>
                                    </div>
                                </div>
                            @empty
                                <div class="col-md-4 offset-md-2">
                                    <div class="alert alert-danger">No Images Found!</div>
                                </div>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('style')
    <style>
        .image-box {
            position: relative;
        }
        .image-box .image .img-thumbnail {
            width: 100%;
        }

        .delete-button {
            position: absolute;
            right: 6px;
            top: 5px;
            background: white;
            padding: 20px;
            width: 30px;
            height: 30px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            background: rgba(255, 255, 255, 1);
            box-shadow: 2px 2px 2px 1px rgba(0, 0, 0, 0.2);
            cursor: pointer;
        }
        .delete-button a {
            color: red;
        }

        .description {
            padding: 5px;
        }
    </style>
@endsection
