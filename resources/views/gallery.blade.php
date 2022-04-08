@extends('layouts.app')

@section('content')
    <div class="container" style="padding-top:0px; padding-bottom:0px;">
        <div class="row">
            <div class="col-md-12">
                <p id="breadcrumbs">
                    {!! nestedPathPrintWithLink($category->name_path) !!}
                    {{-- <span><span><a href="{{ route('index') }}">Home</a> › <strong class="breadcrumb_last" aria-current="page">Gallery</strong></span></span> --}}
                </p>
            </div>
        </div>
    </div>
    <section id="main" class="single-product">
        <section class="products">
            <div class="container">

                <ul class="products columns-4">
                    <div class="row">

                        @foreach ($products as $product)
                            <article class="col-md-3 col-6 product text-center">
                                <a href="{{ route('product.details', $product->slug) }}"
                                    title="{{ $product->title }}">

                                    <img width="300" height="300" alt=""
                                        class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail lazyloaded"
                                        src="{{ $product->getFirstMediaUrl('gallery', 'thumb') }}"

                                    >

                                    <h3>{{ $product->title }}</h3>
                                </a>
                            </article>
                        @endforeach
                    </div>
                </ul>
                <div class=" d-flex justify-content-center">
                    {{ $products->links() }}

                </div>
                {{-- <nav class="woocommerce-pagination">
                    <ul class="page-numbers">
                        <li><span aria-current="page" class="page-numbers current">1</span></li>
                        <li><a class="page-numbers" href="https://hummingbird-ad.com/gallery/page/2/">2</a></li>
                        <li><a class="page-numbers" href="https://hummingbird-ad.com/gallery/page/3/">3</a></li>
                        <li><a class="next page-numbers" href="https://hummingbird-ad.com/gallery/page/2/">→</a></li>
                    </ul>
                </nav> --}}

            </div>
        </section>
    </section>
@endsection

@section('meta')
    <meta name="description"
        content="Hummingbird Art and Design offers for sale a curated collection of art objects by highly skilled artists and artisans from around the world." />
    <link rel="canonical" href="https://hummingbird-ad.com/" />
    <meta property="og:locale" content="en_US" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="Home" />
    <meta property="og:description"
        content="Hummingbird Art and Design offers for sale a curated collection of art objects by highly skilled artists and artisans from around the world." />
    <meta property="og:url" content="https://hummingbird-ad.com/" />
    <meta property="og:site_name" content="Hummingbird Art &amp; Design" />
    <meta property="article:publisher" content="https://www.facebook.com/HummingbirdArtandDesign" />
    <meta property="article:modified_time" content="2022-03-02T21:16:58+00:00" />
    <meta property="og:image"
        content="https://hummingbird-ad.com/wp-content/uploads/2021/11/Hummingbird-logo-7.1.21-scaled.jpg" />
    <meta property="og:image:width" content="2560" />
    <meta property="og:image:height" content="1707" />
    <meta property="og:image:type" content="image/jpeg" />
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:label1" content="Est. reading time" />
    <meta name="twitter:data1" content="1 minute" />
@endsection



@push('header_scripts')
@endpush

@push('footer_scripts')
@endpush

@push('styles')
@endpush
