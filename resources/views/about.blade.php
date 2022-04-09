@extends('layouts.app')

@section('content')
    <section class="page">
        <div class="container ntp">
            {{ $setting->about  }}
        </div>
    </section>
@endsection

@section('meta')
   	<!-- This site is optimized with the Yoast SEO Premium plugin v17.7 (Yoast SEO v18.4.1) - https://yoast.com/wordpress/plugins/seo/ -->
	<meta name="description" content="Hummingbird Art and Design offers for sale a curated collection of beautiful art objects by highly skilled artists and artisans from around the world." />
	<link rel="canonical" href="https://hummingbird-ad.com/about/" />
	<meta property="og:locale" content="en_US" />
	<meta property="og:type" content="article" />
	<meta property="og:title" content="Hummingbird Art &amp; Design" />
	<meta property="og:description" content="Hummingbird Art and Design offers for sale a curated collection of beautiful art objects by highly skilled artists and artisans from around the world." />
	<meta property="og:url" content="https://hummingbird-ad.com/about/" />
	<meta property="og:site_name" content="Hummingbird Art &amp; Design" />
	<meta property="article:publisher" content="https://www.facebook.com/HummingbirdArtandDesign" />
	<meta property="article:modified_time" content="2022-01-19T05:19:26+00:00" />
	<meta property="og:image" content="https://hummingbird-ad.com/wp-content/uploads/2021/11/Hummingbird-logo-7.1.21-scaled.jpg" />
	<meta property="og:image:width" content="2560" />
	<meta property="og:image:height" content="1707" />
	<meta property="og:image:type" content="image/jpeg" />
	<meta name="twitter:card" content="summary_large_image" />
	<meta name="twitter:title" content="About" />
	<meta name="twitter:label1" content="Est. reading time" />
	<meta name="twitter:data1" content="2 minutes" />
@endsection

