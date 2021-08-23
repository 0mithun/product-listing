@extends('backend.settings.setting-layout')
@section('title') WebsiteSite Settings @endsection

@section('color-picker')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title" style="line-height: 36px;">Color Picker</h3>
        </div>
        <div class="row pt-3 pb-4">
            <form id="color_picker_form" action="" method="post">
                @csrf
                @method('PUT')
                <input id="sidebar_color_id" type="hidden" name="sidebar_color">
                <input id="nav_color_id" type="hidden" name="nav_color">
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
        <div class="card-footer">
            <button onclick="$('#color_picker_form').submit()" type="submit"
                class="btn btn-primary btn-block">Update</button>
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
        // Sidebar Color Change
        const sidebarPickr = Pickr.create({
            el: ".sidebar-color-picker",
            theme: "classic",
            default: '{{ setting()->sidebar_color ? setting()->sidebar_color : '#343a40' }}',

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
            sidebarPickr.hide();
        });

        // Navbar Color Change
        const NavbarPickr = Pickr.create({
            el: ".navbar-color-picker",
            theme: "classic",
            default: '{{ setting()->nav_color ? setting()->nav_color : '#f8f9fa' }}',

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
            NavbarPickr.hide();
        });
    </script>
@endsection
