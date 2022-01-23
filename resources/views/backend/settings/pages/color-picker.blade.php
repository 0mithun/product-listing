@extends('backend.settings.setting-layout')
@section('title') WebsiteSite Settings @endsection

@section('website-settings')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title" style="line-height: 36px;">Color Picker</h3>
        </div>
        <div class="row pt-3 pb-4">
            <form id="color_picker_form" action="{{ route('settings.color.update') }}" method="post">
                @csrf
                @method('PUT')
                <input id="sidebar_color_id" type="hidden" name="sidebar_color"
                    value="{{ $setting->sidebar_color ? $setting->sidebar_color : '#343a40' }}">
                <input id="nav_color_id" type="hidden" name="nav_color"
                    value="{{ $setting->nav_color ? $setting->nav_color : '#f8f9fa' }}">
            </form>

            <div class="col-2">
                <div class="card">
                    <div class="card-header">Slider Color</div>
                    <div class="card-body">
                        <div class="sidebar-color-picker"></div>
                    </div>
                </div>
            </div>
            <div class="col-2">
                <div class="card">
                    <div class="card-header">Nav Color</div>
                    <div class="card-body">
                        <div class="navbar-color-picker"></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card-footer text-center">
            <button style="width: 250px;" onclick="$('#color_picker_form').submit()" type="submit"
                class="btn btn-primary">Update</button>
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
        var sidebarColor = '{{ $setting->sidebar_color ? $setting->sidebar_color : '#343a40' }}';
        var navbarColor = '{{ $setting->nav_color ? $setting->nav_color : '#f8f9fa' }}';

        // Sidebar Color Change
        const sidebarPickr = Pickr.create({
            el: ".sidebar-color-picker",
            theme: "classic",
            default: sidebarColor,

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
            $("#sidebar_color_id").val(color.toRGBA().toString(0));
        }).on('save', (color, instance) => {
            $("#sidebar").css("backgroundColor", color.toRGBA().toString(0));
            $("#sidebar_color_id").val(color.toRGBA().toString(0));
            sidebarPickr.hide();
        }).on('clear', instance => {
            // $("#sidebar").css("backgroundColor", sidebarColor);
            sidebarPickr.hide();
        });

        // Navbar Color Change
        const NavbarPickr = Pickr.create({
            el: ".navbar-color-picker",
            theme: "classic",
            default: navbarColor,

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

        NavbarPickr.on('change', (color, source, instance) => {
            $("#nav").css("backgroundColor", color.toRGBA().toString(0));
            $("#nav_color_id").val(color.toRGBA().toString(0));
        }).on('save', (color, instance) => {
            $("#nav").css("backgroundColor", color.toRGBA().toString(0));
            $("#nav_color_id").val(color.toRGBA().toString(0));
            NavbarPickr.hide();
        }).on('clear', instance => {
            $("#nav").css("backgroundColor", navbarColor);
            NavbarPickr.hide();
        });
    </script>
@endsection
