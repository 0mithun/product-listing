@extends('backend.settings.setting-layout')
@section('title') WebsiteSite Settings @endsection

@section('layout')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title" style="line-height: 36px;">Layout</h3>
        </div>
        <div class="row pt-3 pb-4">
            <div class="col-6">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title m-0">Top Navigation Layout</h5>
                    </div>
                    <div class="card-body">
                        <button class="btn btn-primary">Apply</button>
                    </div>
                </div>
            </div>

            <div class="col-6">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title m-0">Left Navigation Layout</h5>
                    </div>
                    <div class="card-body">
                        <button class="btn btn-primary">Apply</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
