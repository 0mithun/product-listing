@extends('layouts.app')



@section('content')
<section class="products">
    <div class="container">
        <ul class="products columns-4">
            @forelse ($categories as $category)
                <div class="row mt-2 mb-3">
                    <h3>{{ $category->name }}</h3>
                    @forelse ($category->products as $product)
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
                    @empty
                    <h3>No Products Found.</h3>
                    @endforelse
                @empty
                    <h3>No Category Found.</h3>
                </div>
            @endforelse
        </ul>
        <div class=" d-flex justify-content-center">
            {{ $categories->links() }}
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
