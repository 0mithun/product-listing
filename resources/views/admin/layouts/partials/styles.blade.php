    <!-- FavIcons -->
    <link rel="icon" type="image/png" sizes="32x32" href="{{ $setting->favicon_image_url }}">

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="{{ asset('css/google-font.css') }}">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ asset('backend') }}/plugins/fontawesome-free/css/all.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('backend') }}/dist/css/adminlte.min.css">
    <!-- Toastr -->
    <link rel="stylesheet" type="text/css" href="{{ asset('backend') }}/plugins/toastr/toastr.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/main.css') }}">
    <!-- Custom Link -->
    @yield('style')

    <style>

    .text-center.paginations {
        padding: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
    }
        {!! $setting->header_css !!}
    </style>
    <script>
        {!! $setting->header_script !!}
    </script>
