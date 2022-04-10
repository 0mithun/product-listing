@extends('admin.layouts.app')
@section('title') {{ __('contact_list') }} @endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title" style="line-height: 36px;">{{ __('submitted_lists') }}</h3>
                    </div>
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap table-bordered">
                            @if ($submits->count() > 0)
                                <thead>
                                    <tr>
                                        <th width="5%">{{ __('sl') }}</th>
                                        <th>{{ __('name') }}</th>
                                        <th>{{ __('email') }}</th>
                                        <th>{{ __('message') }}</th>
                                        <th>{{ __('date') }}</th>
                                    </tr>
                                </thead>
                            @endif
                            <tbody>
                                @forelse ($submits as $submit)
                                <tr id="item_id{{ $submit->id }}">
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $submit->name }}</td>
                                    <td>{{ $submit->email }}</td>
                                    <td>{{ $submit->message }}</td>
                                    <td>{{ $submit->created_at->format('Y-m-d H:i A') }}</td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="10" class="text-center">
                                        <x-admin.not-found word="Product Submits" route="" />
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                        <div class="text-center paginations">
                            {{ $submits->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

