@extends('backend.settings.setting-layout')
@section('title') WebsiteSite Settings @endsection

@section('color-picker')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title" style="line-height: 36px;">Color Picker</h3>
        </div>
        <div class="row pt-3 pb-4">
            <div class="col-6">
                <div class="card">
                    <div class="card-header">
                        <h5 class="card-title m-0">Sidebar Color</h5>
                    </div>
                    <div class="card-body">
                        <input class="sidebar-color-picker"></input>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('style')
    {{-- <link rel="stylesheet" href="{{ asset('backend/plugins/pickr') }}/nano.min.css" /> <!-- 'nano' theme --> --}}
    <link rel="stylesheet" href="{{ asset('backend/plugins/pickr') }}/classic.min.css" /> <!-- 'classic' theme -->
    {{-- <link rel="stylesheet" href="{{ asset('backend/plugins/pickr') }}/monolith.min.css" /> <!-- 'monolith' theme --> --}}
@endsection

@section('script')
    <script src="{{ asset('backend/plugins/pickr') }}/pickr.min.js"></script>
    <script>
        // Simple example, see optional options for more configuration.
        const pickr = Pickr.create({
            el: '.sidebar-color-picker',
            theme: 'classic', // 'classic', or 'monolith', or 'nano'

            swatches: [
                'rgba(244, 67, 54, 1)',
                'rgba(233, 30, 99, 0.95)',
                'rgba(156, 39, 176, 0.9)',
                'rgba(103, 58, 183, 0.85)',
                'rgba(63, 81, 181, 0.8)',
                'rgba(33, 150, 243, 0.75)',
                'rgba(3, 169, 244, 0.7)',
                'rgba(0, 188, 212, 0.7)',
                'rgba(0, 150, 136, 0.75)',
                'rgba(76, 175, 80, 0.8)',
                'rgba(139, 195, 74, 0.85)',
                'rgba(205, 220, 57, 0.9)',
                'rgba(255, 235, 59, 0.95)',
                'rgba(255, 193, 7, 1)'
            ],

            components: {
                // Main components
                preview: true,
                opacity: true,
                hue: true,

                // Input / output Options
                interaction: {
                    hex: true,
                    rgba: true,
                    input: true,
                    clear: true,
                    save: true
                }
            }
        });
    </script>
@endsection
