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
                        {{-- @if (userCan('product.create')) --}}
                            <a href="{{ route('categories.create') }}"
                                class="btn bg-primary float-right d-flex align-items-center justify-content-center"><i
                                    class="fas fa-plus"></i>&nbsp; {{ __('add_product') }}</a>
                        {{-- @endif --}}
                    </div>
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap table-bordered" id="product_table">
                            <thead>
                                <tr class="text-center">
                                    <th>{{ __('name') }}</th>
                                    {{-- <th>{{ __('description') }}</th> --}}
                                    <th>{{ __('dimension') }}</th>
                                    <th>{{ __('origin') }}</th>
                                    <th>{{ __('price') }}</th>
                                    <th>{{ __('category') }}</th>
                                    {{-- @if (userCan('category.update') || userCan('category.delete')) --}}
                                    <th width="10%">{{ __('actions') }}</th>
                                    {{-- @endif --}}
                                </tr>
                            </thead>
                            <tbody id="sortable">
                                @forelse ($products as $product)
                                <tr data-id="{{ $product->id }}">
                                    <td class="text-center">{{ $product->title }}</td>
                                    {{-- <td class="text-center">{{ $product->description }}</td> --}}
                                    <td class="text-center">{{ $product->dimension }}</td>
                                    <td class="text-center">{{ $product->origin }}</td>
                                    <td class="text-center">{{ $product->price }}</td>
                                    <td class="text-center">{{ $product->category->name }}</td>
                                    {{-- @if (userCan('product.update') || userCan('product.delete')) --}}
                                    <td class="text-center">
                                        {{-- @if (userCan('product.update')) --}}
                                        <a title="{{ __('view_product') }}" href="{{ route('products.show', $product->slug) }}" class="btn bg-success mr-1">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                            <a title="{{ __('edit_product') }}" href="{{ route('products.edit', $product->slug) }}" class="btn bg-info mr-1">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                        {{-- @endif --}}
                                        {{-- @if (userCan('product.delete')) --}}
                                            <form action="{{ route('products.destroy', $product->slug) }}"
                                                method="POST" class="d-inline">
                                                @method('DELETE')
                                                @csrf
                                                <button data-toggle="tooltip" data-placement="top"
                                                    title="{{ __('delete_product') }}"
                                                    onclick="return confirm('{{ __('Are you sure want to delete this item?') }}');"
                                                    class="btn bg-danger mr-1"><i class="fas fa-trash"></i></button>
                                            </form>
                                        {{-- @endif --}}
                                    </td>
                                    {{-- @endif --}}
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="10" class="text-center">
                                        <x-admin.not-found word="product" route="products.create" />
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    @if ($products->count() > 0)
                        <div class="card-footer ">
                            <div class="d-flex justify-content-center">
                                {{ $products->links() }}
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection