@extends('layouts.app')



@section('content')
{{-- {{ $products[0]->getFirstMedia('gallery')->img('',  ['class'=>'red', 'id'=>'ok'])  }} --}}

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
                                                        @php
                                                            // echo ($product->getFirstMedia('products'))
                                                        @endphp
                                                        <div class="n2-ss-slide-background" data-public-id="{{ $loop->iteration }}"
                                                            data-mode="fill">
                                                            <div class="n2-ss-slide-background-image" data-blur="0"
                                                                data-opacity="100" data-x="50" data-y="50" data-alt=""
                                                                data-title="">
                                                                {{-- <picture class="skip-lazy" data-skip-lazy="1"><img
                                                                        src="{{ $product->getMedia('gallery')[0]->getFullUrl() }}"
                                                                        alt="" title="" loading="lazy"
                                                                        class="skip-lazy" data-skip-lazy="1">
                                                                </picture> --}}
                                                                {{ $product->getFirstMedia('gallery')->img('',  ['class'=>'skip-lazy', 'data-skip-lazy'=> 1])  }}
                                                            </div>
                                                            <div data-color="RGBA(255,255,255,0)"
                                                                style="background-color: RGBA(255,255,255,0);"
                                                                class="n2-ss-slide-background-color"></div>
                                                        </div>
                                                    @endforeach

                                                    {{-- <div class="n2-ss-slide-background" data-public-id="1"
                                                        data-mode="fill">
                                                        <div class="n2-ss-slide-background-image" data-blur="0"
                                                            data-opacity="100" data-x="50" data-y="50" data-alt=""
                                                            data-title="">
                                                            <picture class="skip-lazy" data-skip-lazy="1"><img
                                                                    src="//hummingbird-ad.com/wp-content/uploads/2022/01/photo-411.jpg"
                                                                    alt="" title="" loading="lazy"
                                                                    class="skip-lazy" data-skip-lazy="1">
                                                            </picture>
                                                        </div>
                                                        <div data-color="RGBA(255,255,255,0)"
                                                            style="background-color: RGBA(255,255,255,0);"
                                                            class="n2-ss-slide-background-color"></div>
                                                    </div> --}}
                                                    {{-- <div class="n2-ss-slide-background" data-public-id="2"
                                                        data-mode="fill">
                                                        <div class="n2-ss-slide-background-image" data-blur="0"
                                                            data-opacity="100" data-x="50" data-y="50" data-alt=""
                                                            data-title="">
                                                            <picture class="skip-lazy" data-skip-lazy="1"><img
                                                                    src="//hummingbird-ad.com/wp-content/uploads/2022/01/photo-374.jpg"
                                                                    alt="" title="" loading="lazy"
                                                                    class="skip-lazy" data-skip-lazy="1">
                                                            </picture>
                                                        </div>
                                                        <div data-color="RGBA(255,255,255,0)"
                                                            style="background-color: RGBA(255,255,255,0);"
                                                            class="n2-ss-slide-background-color"></div>
                                                    </div>
                                                    <div class="n2-ss-slide-background" data-public-id="3"
                                                        data-mode="fill">
                                                        <div class="n2-ss-slide-background-image" data-blur="0"
                                                            data-opacity="100" data-x="31" data-y="68" data-alt=""
                                                            data-title="" style="--ss-o-pos-x:31%;--ss-o-pos-y:68%">
                                                            <picture class="skip-lazy" data-skip-lazy="1"><img
                                                                    src="//hummingbird-ad.com/wp-content/uploads/2022/03/photo-3.jpg"
                                                                    alt="" title="" loading="lazy"
                                                                    class="skip-lazy" data-skip-lazy="1">
                                                            </picture>
                                                        </div>
                                                        <div data-color="RGBA(255,255,255,0)"
                                                            style="background-color: RGBA(255,255,255,0);"
                                                            class="n2-ss-slide-background-color"></div>
                                                    </div> --}}
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
                                                    {{-- <div data-first="1" data-slide-duration="0" data-id="26"
                                                        data-slide-public-id="1" data-title="photo (411)"
                                                        class="n2-ss-slide n2-ow  n2-ss-slide-26">
                                                        <div role="note" class="n2-ss-slide--focus" tabindex="-1">
                                                            photo (411)</div>
                                                        <div
                                                            class="n2-ss-layers-container n2-ss-slide-limiter n2-ow">
                                                            <div class="n2-ss-layer n2-ow n-uc-jybtiwGlCjlI"
                                                                data-sstype="slide" data-pm="default"></div>
                                                        </div>
                                                    </div> --}}
                                                    {{-- <div data-slide-duration="0" data-id="37"
                                                        data-slide-public-id="2" data-title="photo (374)"
                                                        class="n2-ss-slide n2-ow  n2-ss-slide-37">
                                                        <div role="note" class="n2-ss-slide--focus" tabindex="-1">
                                                            photo (374)</div>
                                                        <div
                                                            class="n2-ss-layers-container n2-ss-slide-limiter n2-ow">
                                                            <div class="n2-ss-layer n2-ow n-uc-nfqKrr7E2MVw"
                                                                data-sstype="slide" data-pm="default"></div>
                                                        </div>
                                                    </div>
                                                    <div data-slide-duration="0" data-id="38"
                                                        data-slide-public-id="3" data-title="photo-3"
                                                        class="n2-ss-slide n2-ow  n2-ss-slide-38">
                                                        <div role="note" class="n2-ss-slide--focus" tabindex="-1">
                                                            photo-3</div>
                                                        <div
                                                            class="n2-ss-layers-container n2-ss-slide-limiter n2-ow">
                                                            <div class="n2-ss-layer n2-ow n-uc-XK5t9de1C4Q0"
                                                                data-sstype="slide" data-pm="default"></div>
                                                        </div>
                                                    </div> --}}
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

@push('footer_scripts')

@endpush

@push('styles')
    <link rel="stylesheet" type="text/css"
        href="{{ asset('plugins') }}/smart-slider/css/smartslider.min.css?ver=4180a0be"
        media="all">
@endpush
