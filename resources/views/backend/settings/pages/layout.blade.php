@extends('backend.settings.setting-layout')
@section('title') Layout Settings @endsection

@section('layout')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title" style="line-height: 36px;">Layout Setting</h3>
        </div>
        <div class="row pt-3 pb-4">
            <form action="{{ route('layout.change') }}" method="post" id="layout_form">
                @csrf
                @method('PUT')
                <input type="hidden" name="layout" id="layout_mode">
            </form>
            <div class="col-6">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title m-0">Left Navigation Layout</h5>
                    </div>
                    <img height="200px" width="600px" src="{{ asset('backend/image/setting/left-nav.png') }}"
                        class="card-img-top img-fluid" alt="top nav">
                    <div class="card-body">
                        @if (session('layout_mode') === 'left_nav')
                            <a href="javascript:void(0)" onclick="layoutChange('top_nav')"
                                class="btn btn-danger">Inactivate</a>
                        @else
                            <a href="javascript:void(0)" onclick="layoutChange('left_nav')"
                                class="btn btn-primary">Activate</a>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-6">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title m-0">Top Navigation Layout</h5>
                    </div>
                    <img height="200px" width="600px" src="{{ asset('backend/image/setting/top-nav.png') }}"
                        class="card-img-top img-fluid" alt="top nav">
                    <div class="card-body">
                        @if (session('layout_mode') === 'top_nav')
                            <a href="javascript:void(0)" onclick="layoutChange('left_nav')"
                                class="btn btn-danger">Inactivate</a>
                        @else
                            <a href="javascript:void(0)" onclick="layoutChange('top_nav')"
                                class="btn btn-primary">Activate</a>
                        @endif
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection

@section('script')
    <script>
        function layoutChange(value) {
            $('#layout_mode').val(value)
            $('#layout_form').submit()
        }
    </script>
@endsection
