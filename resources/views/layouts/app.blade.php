<!DOCTYPE html>
<html>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name='robots' content='index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1' />
    @yield('meta')


    <title>{{ $setting->name }} {{ isset($page_name) ?  ' | '. $page_name : '' }}</title>

    @include('layouts.partials.styles')
    @stack('styles')
    @stack('header_scripts')
</head>


<body>
    @include('layouts.partials._header')

    @yield('content')

    @include('layouts.partials._footer')
    @include('layouts.partials.scripts')

    @stack('footer_scripts')
</body>

</html>
