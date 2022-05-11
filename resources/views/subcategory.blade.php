@extends('layouts.app')



@section('content')
<section class="products">
    <div class="container">
        <ul class="products columns-4">
            <div class="row">
                @forelse ($categories as $category)
                    <h3>{{ $category->name }}</h3>
                    @foreach ($category->products as $product)
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
                @empty
                    <h3>No Products Found.</h3>
                @endforelse
            </div>
        </ul>
        <div class=" d-flex justify-content-center">
            {{-- {{ $products->links() }} --}}
        </div>
    </div>
</section>

<section class="page">
    <div class="container ntp">
        <div class="wp-block-nextend-smartslider3 container no-pad">
            <div class="n2_clear">
                <ss3-force-full-width data-overflow-x="body" data-horizontal-selector="body">
                    <div class="n2-section-smartslider fitvidsignore  n2_clear" data-ssid="2" tabindex="0"
                        role="region" aria-label="Slider">
                        <div id="n2-ss-2-align" class="n2-ss-align">
                            <div class="n2-padding">
                                <div id="n2-ss-2" data-creator="Smart Slider 3" data-responsive="fullwidth"
                                    class="n2-ss-slider n2-ow n2-has-hover n2notransition  ">
                                    <div class="n2-ss-slider-1 n2_ss__touch_element n2-ow" style="">
                                        <div class="n2-ss-slider-2 n2-ow">
                                            <div class="n2-ss-slider-3 n2-ow" style="">

                                                <div class="n2-ss-slide-backgrounds n2-ow-all">
                                                    @foreach ($products as $product)
                                                        <div class="n2-ss-slide-background" data-public-id="{{ $loop->iteration }}"
                                                            data-mode="fill">
                                                            <div class="n2-ss-slide-background-image" data-blur="0"
                                                                data-opacity="100" data-x="50" data-y="50" data-alt=""
                                                                data-title="">


                                                                @if (is_null($product->getFirstMedia('gallery')))
                                                                    <picture class="skip-lazy" data-skip-lazy="1"><img
                                                                        src="{{ $product->getFirstMediaUrl('gallery') }}"
                                                                        alt="{{ $product->metadata }}" title="{{ $product->metadata }}" loading="lazy"
                                                                        class="skip-lazy" data-skip-lazy="1">
                                                                </picture>
                                                                @else
                                                                    {{ $product->getFirstMedia('gallery')->img('',  ['class'=>'skip-lazy', 'data-skip-lazy'=> 1, 'alt'=>$product->metadata, 'title'=>$product->metadata ])  }}
                                                                @endif
                                                            </div>
                                                            <div data-color="RGBA(255,255,255,0)"
                                                                style="background-color: RGBA(255,255,255,0);"
                                                                class="n2-ss-slide-background-color"></div>
                                                        </div>
                                                    @endforeach
                                                </div>

                                                <div class="n2-ss-slider-4 n2-ow">
                                                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1600 600"
                                                        data-related-device="desktopPortrait"
                                                        class="n2-ow n2-ss-preserve-size n2-ss-preserve-size--slider n2-ss-slide-limiter"></svg>

                                                    @foreach ($products as $product)
                                                        <div data-first="1" data-slide-duration="0" data-id="{{ $product->id }}"
                                                            data-slide-public-id="{{ $loop->iteration }}" data-title="photo (411)"
                                                            class="n2-ss-slide n2-ow  n2-ss-slide-{{ $product->id }}">
                                                            <div role="note" class="n2-ss-slide--focus" tabindex="-1">
                                                                photo (411)</div>
                                                            <div
                                                                class="n2-ss-layers-container n2-ss-slide-limiter n2-ow">
                                                                <div class="n2-ss-layer n2-ow n-uc-jybtiwGlCjlI"
                                                                    data-sstype="slide" data-pm="default"></div>
                                                            </div>
                                                        </div>
                                                    @endforeach
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <ss3-loader></ss3-loader>
                            </div>
                        </div>
                        <div class="n2_clear"></div>
                    </div>
                </ss3-force-full-width>
            </div>
        </div>
    </div>
</section>

@endsection

@section('meta')
    <meta name="description" content="{{ $setting->meta_description }}" />
    <link rel="canonical" href="{{ url('/') }}" />
    <meta property="og:locale" content="en_US" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="Home" />
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
<script
    src="{{ asset('plugins') }}/smart-slider/js/n2.min.js?ver=4180a0be"
    defer async></script>
<script
    src="{{ asset('plugins') }}/smart-slider/js/smartslider-frontend.min.js?ver=4180a0be"
    defer async></script>
<script
    src="{{ asset('plugins') }}/smart-slider/js/ss-simple.min.js?ver=4180a0be"
    defer async></script>


<script>
    (function() {
        this._N2 = this._N2 || {
            _r: [],
            _d: [],
            r: function() {
                this._r.push(arguments)
            },
            d: function() {
                this._d.push(arguments)
            }
        }
    }).call(window);
    ! function(a) {
        a.indexOf("Safari") > 0 && -1 === a.indexOf("Chrome") && document.documentElement.style.setProperty(
            "--ss-safari-fix-225962", "1px")
    }(navigator.userAgent);
</script>


<script>
    _N2.r('documentReady', function() {
        _N2.r(["documentReady", "smartslider-frontend", "ss-simple"], function() {
            new _N2.SmartSliderSimple('n2-ss-2', {
                "admin": false,
                "callbacks": "",
                "background.video.mobile": 1,
                "loadingTime": 2000,
                "alias": {
                    "id": 0,
                    "smoothScroll": 0,
                    "slideSwitch": 0,
                    "scroll": 1
                },
                "align": "normal",
                "isDelayed": 0,
                "responsive": {
                    "mediaQueries": {
                        "all": false,
                        "desktopportrait": ["(min-width: 1200px)"],
                        "tabletportrait": [
                            "(orientation: landscape) and (max-width: 1199px) and (min-width: 901px)",
                            "(orientation: portrait) and (max-width: 1199px) and (min-width: 701px)"
                        ],
                        "mobileportrait": ["(orientation: landscape) and (max-width: 900px)",
                            "(orientation: portrait) and (max-width: 700px)"
                        ]
                    },
                    "base": {
                        "slideOuterWidth": 1600,
                        "slideOuterHeight": 600,
                        "sliderWidth": 1600,
                        "sliderHeight": 600,
                        "slideWidth": 1600,
                        "slideHeight": 600
                    },
                    "hideOn": {
                        "desktopLandscape": false,
                        "desktopPortrait": false,
                        "tabletLandscape": false,
                        "tabletPortrait": false,
                        "mobileLandscape": false,
                        "mobilePortrait": false
                    },
                    "onResizeEnabled": true,
                    "type": "fullwidth",
                    "sliderHeightBasedOn": "real",
                    "focusUser": 1,
                    "focusEdge": "auto",
                    "breakpoints": [{
                        "device": "tabletPortrait",
                        "type": "max-screen-width",
                        "portraitWidth": 1199,
                        "landscapeWidth": 1199
                    }, {
                        "device": "mobilePortrait",
                        "type": "max-screen-width",
                        "portraitWidth": 700,
                        "landscapeWidth": 900
                    }],
                    "enabledDevices": {
                        "desktopLandscape": 0,
                        "desktopPortrait": 1,
                        "tabletLandscape": 0,
                        "tabletPortrait": 1,
                        "mobileLandscape": 0,
                        "mobilePortrait": 1
                    },
                    "sizes": {
                        "desktopPortrait": {
                            "width": 1600,
                            "height": 600,
                            "max": 3000,
                            "min": 1200
                        },
                        "tabletPortrait": {
                            "width": 701,
                            "height": 262,
                            "customHeight": false,
                            "max": 1199,
                            "min": 701
                        },
                        "mobilePortrait": {
                            "width": 320,
                            "height": 120,
                            "customHeight": false,
                            "max": 900,
                            "min": 320
                        }
                    },
                    "overflowHiddenPage": 0,
                    "focus": {
                        "offsetTop": "#wpadminbar",
                        "offsetBottom": ""
                    }
                },
                "controls": {
                    "mousewheel": 0,
                    "touch": "horizontal",
                    "keyboard": 1,
                    "blockCarouselInteraction": 1
                },
                "playWhenVisible": 1,
                "playWhenVisibleAt": 0.5,
                "lazyLoad": 0,
                "lazyLoadNeighbor": 0,
                "blockrightclick": 0,
                "maintainSession": 0,
                "autoplay": {
                    "enabled": 1,
                    "start": 1,
                    "duration": 3000,
                    "autoplayLoop": 1,
                    "allowReStart": 0,
                    "pause": {
                        "click": 1,
                        "mouse": "0",
                        "mediaStarted": 1
                    },
                    "resume": {
                        "click": 0,
                        "mouse": "0",
                        "mediaEnded": 1,
                        "slidechanged": 0
                    },
                    "interval": 1,
                    "intervalModifier": "loop",
                    "intervalSlide": "current"
                },
                "perspective": 1500,
                "layerMode": {
                    "playOnce": 0,
                    "playFirstLayer": 1,
                    "mode": "skippable",
                    "inAnimation": "mainInEnd"
                },
                "bgAnimations": 0,
                "mainanimation": {
                    "type": "crossfade",
                    "duration": 1500,
                    "delay": 0,
                    "ease": "easeOutQuad",
                    "shiftedBackgroundAnimation": 0
                },
                "carousel": 1,
                "initCallbacks": function() {}
            })
        })
    });
</script>
@endpush

@push('styles')
    <link rel="stylesheet" type="text/css"
        href="{{ asset('plugins') }}/smart-slider/css/smartslider.min.css?ver=4180a0be"
        media="all">

        <style>
                    .n2-ss-slider .n2-ss-slide-background-image img {
                width: 100%!important;
                height: 100%!important;
                object-fit: contain;
                color: RGBA(0,0,0,0);
}
        </style>
@endpush
