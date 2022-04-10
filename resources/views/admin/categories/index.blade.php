@php
$user = auth()->user();
@endphp

@extends('admin.layouts.app')

@section('title') {{ __('category_list') }} @endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title" style="line-height: 36px;">{{ __('category_list') }}</h3>
                        @if (userCan('category.create'))
                            <a href="{{ route('categories.create') }}"
                                class="btn bg-primary float-right d-flex align-items-center justify-content-center"><i
                                    class="fas fa-plus"></i>&nbsp; {{ __('add_category') }}</a>
                        @endif
                    </div>
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap table-bordered" id="category_table">
                            <thead>
                                <tr class="text-center">
                                    <th>{{ __('name') }}</th>
                                    <th>{{ __('parent_category') }}</th>
                                    @if (userCan('category.edit') || userCan('category.delete'))
                                    <th width="10%">{{ __('actions') }}</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody id="sortable">
                                @forelse ($categories as $category)
                                <tr data-id="{{ $category->id }}">
                                    <td class="text-center">{{ $category->name }}</td>
                                    <td class="text-center">
                                        {{-- {!!  nestedPathPrint($category->name_path) !!} --}}
                                        {!! nestedPathPrint($category->name_path)  !!}
                                    </td>
                                    @if (userCan('category.edit') || userCan('category.delete'))
                                    <td class="text-center">
                                        @if (userCan('category.edit'))
                                            <a title="{{ __('edit_category') }}" href="{{ route('categories.edit', $category->id) }}" class="btn bg-info mr-1">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                        @endif
                                        @if (userCan('category.delete'))
                                            <form action="{{ route('categories.destroy', $category->id) }}"
                                                method="POST" class="d-inline">
                                                @method('DELETE')
                                                @csrf
                                                <button data-toggle="tooltip" data-placement="top"
                                                    title="{{ __('delete_category') }}"
                                                    onclick="return confirm('{{ __('Are you sure want to delete this item?') }}');"
                                                    class="btn bg-danger mr-1"><i class="fas fa-trash"></i></button>
                                            </form>
                                        @endif
                                    </td>
                                    @endif
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="10" class="text-center">
                                        @if (userCan('category.create'))
                                        <x-admin.not-found word="Category" route="categories.create" />
                                        @else
                                        <x-admin.not-found word="Category" route="" />
                                        @endif
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    @if ($categories->count() > 0)
                        <div class="card-footer ">
                            <div class="d-flex justify-content-center">
                                {{ $categories->links() }}
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
