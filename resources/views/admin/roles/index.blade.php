@extends('layouts.admin')
@section('title') Roles @endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title" style="line-height: 36px;">Roles List</h3>
                        @if (Auth::user()->can('role.create'))
                            <a href="{{ route('role.create') }}"
                                class="btn bg-primary float-right d-flex align-items-center justify-content-center"><i
                                    class="fas fa-plus"></i>&nbsp;Create Role</a>
                        @endif
                    </div>
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap">
                            <thead>
                                <tr>
                                    <th width="5%">SL</th>
                                    <th width="20%">Name</th>
                                    <th>Permission</th>
                                    @if (Auth::user()->can('role.edit') || Auth::user()->can('role.delete'))
                                        <th width="10%">Action</th>
                                    @endif
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($roles as $role)
                                    <tr>
                                        <td>{{ $loop->index + 1 }}</td>
                                        <td>{{ ucwords($role->name) }}</td>
                                        <td>
                                            @foreach ($role->permissions as $item)
                                                <span class="badge badge-primary">{{ $item->name }}</span>
                                            @endforeach
                                        </td>
                                        @if (Auth::user()->can('role.edit') || Auth::user()->can('role.delete'))
                                            <td>
                                                @if (Auth::user()->can('role.edit'))
                                                    <a href="{{ route('role.edit', $role->id) }}" class="btn bg-info"><i
                                                            class="fas fa-edit"></i></a>
                                                @endif
                                                @if (Auth::user()->can('role.delete'))
                                                    <form action="{{ route('role.destroy', $role->id) }}" method="POST"
                                                        class="d-inline">
                                                        @method('DELETE')
                                                        @csrf
                                                        <button
                                                            onclick="return confirm('Are you sure you want to delete this item?');"
                                                            class="btn bg-danger"><i class="fas fa-trash"></i></button>
                                                    </form>
                                                @endif
                                            </td>
                                        @endif
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="10" class="text-center">
                                            <x-admin.not-found word="Role" route="role.create" />
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                        {{ $roles->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
