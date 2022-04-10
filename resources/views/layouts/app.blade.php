<!DOCTYPE html>
<html>

<head>
    @if ($setting->facebook_pixel)
        @include('facebook-pixel::head')
    @endif
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name='robots' content='index, follow, max-image-preview:large, max-snippet:-1, max-video-preview:-1' />
    @yield('meta')


    <title>{{ $setting->name }} {{ isset($page_name) ?  ' | '. $page_name : '' }}</title>

    @include('layouts.partials.styles')
    @stack('styles')
    @stack('header_scripts')

    @if ($setting->google_analytics)
        @php
            $google_analytics_id = config('services.google.analytics_id');
        @endphp
        <!-- Global site tag (gtag.js) - Google Analytics -->
        <script async src="https://www.googletagmanager.com/gtag/js?id={{ $google_analytics_id }}"></script>
        <script>
            window.dataLayer = window.dataLayer || [];
            function gtag(){dataLayer.push(arguments);}
            gtag('js', new Date());
            gtag('config', "{{ $google_analytics_id }}");
        </script>
    @endif
</head>


<body>
    @if ($setting->facebook_pixel)
        @include('facebook-pixel::body')
    @endif
    @include('layouts.partials._header')

    @yield('content')

    @include('layouts.partials._footer')
    @include('layouts.partials.scripts')

    @stack('footer_scripts')
</body>

</html>
