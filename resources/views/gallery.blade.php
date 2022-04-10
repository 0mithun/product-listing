@extends('layouts.app')

@section('content')
    <div class="container" style="padding-top:0px; padding-bottom:0px;">
        <div class="row">
            <div class="col-md-12">
                <p id="breadcrumbs">
                    @php
                        // dd($category)
                    @endphp
                    {!! nestedPathPrintWithLink($category->name_path) !!}
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

                                    <img width="300" height="300" alt="{{ $product->metadata  }}"
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
<meta name="description" content="{{ $setting->meta_description }}" />
<link rel="canonical" href="{{ url('/') }}" />
<meta property="og:locale" content="en_US" />
<meta property="og:type" content="website" />
<meta property="og:title" content="Gallery" />
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



@push('header_scripts')
@endpush

@push('footer_scripts')
@endpush

@push('styles')
@endpush
