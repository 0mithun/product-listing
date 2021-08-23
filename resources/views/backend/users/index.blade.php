@extends('layouts.admin')
@section('title') Users List @endsection

@section('content')

    @php
    $userr = Auth::user();
    @endphp

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title" style="line-height: 36px;">Users List</h3>
                        @if ($userr->can('admin.create'))
                            <a href="{{ route('user.create') }}"
                                class="btn bg-primary float-right d-flex align-items-center justify-content-center"><i
                                    class="fas fa-plus"></i>&nbsp;Create User</a>
                        @endif
                    </div>
                    <div class="card-body">
                        <div class="row justify-content-center">
                            @forelse ($users as $user)
                                <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch flex-column">
                                    <div class="card bg-light d-flex flex-fill">
                                        <div class="card-header text-muted border-bottom-0  mt-2">
                                            @foreach ($user->roles as $role)
                                                <span class="badge badge-primary">{{ $role->name }}</span>
                                            @endforeach
                                        </div>
                                        <div class="card-body pt-0">
                                            <div class="row">
                                                <div class="col-7 mt-5">
                                                    <h2 class="lead"><b>{{ $user->name }}</b></h2>
                                                    <p class="text-muted text-sm"><b>Email: </b> {{ $user->email }}</p>
                                                </div>
                                                <div class="col-5 text-center">
                                                    <img src="{{ $user->image }}" alt="user-avatar"
                                                        class="img-circle img-fluid">
                                                </div>
                                            </div>
                                        </div>
                                        @if ($userr->can('admin.edit') || $userr->can('admin.delete'))
                                            <div class="card-footer">
                                                <div class="text-right">
                                                    @if ($userr->can('admin.edit'))
                                                        <a href="{{ route('user.edit', $user->id) }}"
                                                            class="btn btn-sm btn-primary">
                                                            <i class="fas fa-user"></i> Edit
                                                        </a>
                                                    @endif
                                                    @if ($userr->can('admin.delete'))
                                                        <form action="{{ route('user.destroy', $user->id) }}"
                                                            method="POST" class="d-inline">
                                                            @method('DELETE')
                                                            @csrf
                                                            <button type="submit"
                                                                onclick="return confirm('Are you sure you want to delete this item?');"
                                                                class="btn btn-sm btn-danger">
                                                                <i class="fas fa-trash"></i> Delete
                                                            </button>
                                                        </form>
                                                    @endif
                                                </div>
                                            </div>
                                        @endif
                                    </div>
                                </div>
                            @empty
                                <div class="col-6 text-center">
                                    <x-not-found route="user.create" />
                                </div>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
