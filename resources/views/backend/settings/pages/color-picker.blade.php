@extends('backend.settings.setting-layout')
@section('title') WebsiteSite Settings @endsection

@section('color-picker')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title" style="line-height: 36px;">Color Picker</h3>
        </div>
        <div class="row pt-3 pb-4">
            <div class="col-3">
                <form action="{{ route('setting', 'color') }}" method="post">
                    @csrf
                    @method('PUT')
                    <div class="card">
                        <div class="card-header">Slider Color</div>
                        <div class="card-body">
                            <div class="sidebar-color-picker"></div>
                            <input id="slider_color" type="hidden" name="slider_color">
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary btn-block">Update</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection

@section('style')
    <link rel="stylesheet" href="{{ asset('backend/plugins/pickr') }}/classic.min.css" /> <!-- 'classic' theme -->
    {{-- <link rel="stylesheet" href="{{ asset('backend/plugins/pickr') }}/nano.min.css" /> <!-- 'nano' theme --> --}}
    {{-- <link rel="stylesheet" href="{{ asset('backend/plugins/pickr') }}/monolith.min.css" /> <!-- 'monolith' theme --> --}}
@endsection

@section('script')
    <script src="{{ asset('backend/plugins/pickr') }}/pickr.min.js"></script>
    <script>
        const sidebarPickr = Pickr.create({
            el: ".sidebar-color-picker",
            theme: "classic",
            default: '{{ setting()->slider_color }}',

            components: {
                preview: true,
                opacity: true,
                hue: true,

                interaction: {
                    hex: true,
                    rgba: true,
                    cmyk: true,
                    input: true,
                    save: true,
                    clear: true,
                }
            }
        });

        sidebarPickr.on('change', (color, source, instance) => {
            $("#sidebar").css("backgroundColor", color.toRGBA().toString(0));
            $("#slider_color").val(color.toRGBA().toString(0));
        }).on('save', (color, instance) => {
            $("#sidebar").css("backgroundColor", color.toRGBA().toString(0));
            $("#slider_color").val(color.toRGBA().toString(0));
            sidebarPickr.hide();
        }).on('clear', instance => {
            $("#sidebar").css("backgroundColor", " #343a40");
            sidebarPickr.hide();
        });
    </script>
@endsection
