@extends('layouts.app')

@section('content')
    <section class="page">
        <div class="container ntp">
            {{ $setting->about  }}
        </div>
    </section>
@endsection

@section('meta')
	<meta name="twitter:card" content="summary_large_image" />
	<meta name="twitter:title" content="About" />
	<meta name="twitter:label1" content="Est. reading time" />
	<meta name="twitter:data1" content="2 minutes" />


    <meta name="description" content="{{ $setting->meta_description }}" />
    <link rel="canonical" href="{{ url('/') }}" />
    <meta property="og:locale" content="en_US" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="About" />
    <meta property="og:description" content="{{ $setting->meta_description }}" />
    <meta property="og:url" content="{{ url('/') }}" />
    <meta property="og:site_name" content="{{ $setting->name }}" />
    <meta property="og:image" content="{{ $setting->og_image_url }}" />
    <meta property="og:image:width" content="2560" />
    <meta property="og:image:height" content="1707" />
    <meta property="og:image:type" content="image/jpeg" />
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:label1" content="Est. reading time" />
    <meta name="twitter:data1" content="1 minute" />
@endsection

