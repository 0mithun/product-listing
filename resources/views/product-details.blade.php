@extends('layouts.app')

@section('content')
    <div class="container" style="padding-top:0px; padding-bottom:0px;">
        <div class="row">
            <div class="col-md-12">
                <p id="breadcrumbs">
                    {!! nestedPathPrintWithLink($category->name_path) !!}
                </p>
            </div>
            @if (session('success'))
                <div class="col-md-12">
                    <div class="alert alert-success">{{ session('success') }}</div>
                </div>
            @endif
            @if ($errors->any())
                <div class="col-md-12">
                    <div class="alert alert-danger">Please complete all fields. </div>
                </div>
            @endif
        </div>
    </div>
    <section class="single-product">
        <div class="container">
            <div class="row">
                <section id="main" class="single-product">
                    <div id="product-455" class="row">
                        <div class="col-sm-6 col-xs-12 text-center">
                            <input type="hidden" id="yith_wczm_traffic_light" value="free">
                            <div class="images">

                                <div class="woocommerce-product-gallery__image ">
                                    <a
                                        href="{{ $product->getFirstMediaUrl('gallery') }}"
                                        itemprop="image" class="yith_magnifier_zoom woocommerce-main-image"
                                        title="{{ $product->title  }}">
                                        {{-- <img width="600" height="573" alt=""
                                            class="attachment-shop_single size-shop_single wp-post-image lazyload"
                                            src="https://hummingbird-ad.com/wp-content/uploads/2021/06/Vignoli3a-1.jpg" /> --}}

                                        {{ $product->getFirstMedia('gallery')->img('',  ['class'=>'attachment-shop_single size-shop_single wp-post-image lazyloa', 'alt'=>$product->metadata, 'title'=>$product->title ])  }}
                                    </a>
                                </div>
                                <div class="expand-button-hidden" style="display: none;">
                                    <svg width="19px" height="19px" viewBox="0 0 19 19" version="1.1"
                                        xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                        <defs>
                                            <rect id="path-1" x="0" y="0" width="30" height="30"></rect>
                                        </defs>
                                        <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <g id="Product-page---example-1"
                                                transform="translate(-940.000000, -1014.000000)">
                                                <g id="arrow-/-expand" transform="translate(934.500000, 1008.500000)">
                                                    <mask id="mask-2" fill="white">
                                                        <use xlink:href="#path-1"></use>
                                                    </mask>
                                                    <g id="arrow-/-expand-(Background/Mask)"></g>
                                                    <path
                                                        d="M21.25,8.75 L15,8.75 L15,6.25 L23.75,6.25 L23.740468,15.0000006 L21.25,15.0000006 L21.25,8.75 Z M8.75,21.25 L15,21.25 L15,23.75 L6.25,23.75 L6.25953334,14.9999988 L8.75,14.9999988 L8.75,21.25 Z"
                                                        fill="#000000" mask="url(#mask-2)"></path>
                                                </g>
                                            </g>
                                        </g>
                                    </svg>
                                </div>

                                <div class="zoom-button-hidden" style="display: none;">
                                    <svg width="22px" height="22px" viewBox="0 0 22 22" version="1.1"
                                        xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink">
                                        <defs>
                                            <rect id="path-1" x="0" y="0" width="30" height="30"></rect>
                                        </defs>
                                        <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                            <g id="Product-page---example-1"
                                                transform="translate(-990.000000, -1013.000000)">
                                                <g id="edit-/-search" transform="translate(986.000000, 1010.000000)">
                                                    <mask id="mask-2" fill="white">
                                                        <use xlink:href="#path-1"></use>
                                                    </mask>
                                                    <g id="edit-/-search-(Background/Mask)"></g>
                                                    <path
                                                        d="M17.9704714,15.5960917 C20.0578816,12.6670864 19.7876957,8.57448101 17.1599138,5.94669908 C14.2309815,3.01776677 9.4822444,3.01776707 6.55331239,5.94669908 C3.62438008,8.87563139 3.62438008,13.6243683 6.55331239,16.5533006 C9.18109432,19.1810825 13.2736993,19.4512688 16.2027049,17.3638582 L23.3470976,24.5082521 L25.1148653,22.7404845 L17.9704714,15.5960917 C19.3620782,13.6434215 19.3620782,13.6434215 17.9704714,15.5960917 Z M15.3921473,7.71446586 C17.3447686,9.6670872 17.3447686,12.8329128 15.3921473,14.7855341 C13.4395258,16.7381556 10.273701,16.7381555 8.32107961,14.7855341 C6.36845812,12.8329127 6.36845812,9.66708735 8.32107961,7.71446586 C10.273701,5.76184452 13.4395258,5.76184437 15.3921473,7.71446586 C16.6938949,9.01621342 16.6938949,9.01621342 15.3921473,7.71446586 Z"
                                                        fill="#000000" mask="url(#mask-2)"></path>
                                                </g>
                                            </g>
                                        </g>
                                    </svg>

                                </div>
                                <x-image-gallery :product="$product" />
                            </div>
                        </div>
                        <div class="col-md-5 col-sm-6 col-xs-12 product-desc ">

                            <h2>{{ $product->title }}</h2>
                            {!! $product->description  !!}
                            <ul class="details"><small>
                                    <li><strong>Dimensions - </strong>{{ $product->dimension }}</li>
                                    <li><strong>Origin -</strong> {{ $product->origin }}</li>
                                    <li><strong>Price -</strong> {{ $product->price ? '$'.$product->price : 'Please contact for pricing.' }}</li>
                                </small>
                            </ul>
                            <button id="inq" type="button" data-bs-toggle="modal" data-bs-target="#pi">Contact Us</button>
                            <input type="hidden" id="inqp" name="inqp"
                                value="{{ $product->getFirstMediaUrl('gallery')  }}">
                            <x-add-to-any :product="$product" />
                        </div>
                    </div>
                    <div class="modal" tabindex="-1" role="dialog" id="pi">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header text-right">
                                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <h2>Contact</h2>
                                    <form method="POST" action="{{ route('product.send.email', $product->slug) }}">
                                        @csrf
                                        <div class="form-row">
                                          <div class="form-group col-md-12">
                                            <label for="name">Name</label>
                                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Name" id="name">
                                            @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                          </div>
                                          <br>
                                          <div class="form-group col-md-12">
                                            <label for="email">Email</label>
                                            <input type="text" class="form-control @error('email') is-invalid @enderror" name="email" placeholder="Email" id="email">
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        </div>
                                        <br>
                                        <div class="form-group">
                                          <label for="message">Address</label>
                                          <textarea rows="5" class="form-control @error('message') is-invalid @enderror" id="message" placeholder="Message" name="message" style="max-height: initial"></textarea>
                                            @error('message')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <br>
                                        <button type="submit" class="btn btn-primary">SUBMIT</button>
                                    </form>
                                </div>

                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
        <div class="pswp" tabindex="-1" role="dialog" aria-hidden="true">
            <div class="pswp__bg"></div>
            <div class="pswp__scroll-wrap">
                <div class="pswp__container">
                    <div class="pswp__item"></div>
                    <div class="pswp__item"></div>
                    <div class="pswp__item"></div>
                </div>
                <div class="pswp__ui pswp__ui--hidden">
                    <div class="pswp__top-bar">
                        <div class="pswp__counter"></div>
                        <button class="pswp__button pswp__button--close" aria-label="Close (Esc)"></button>
                        <button class="pswp__button pswp__button--share" aria-label="Share"></button>
                        <button class="pswp__button pswp__button--fs" aria-label="Toggle fullscreen"></button>
                        <button class="pswp__button pswp__button--zoom" aria-label="Zoom in/out"></button>
                        <div class="pswp__preloader">
                            <div class="pswp__preloader__icn">
                                <div class="pswp__preloader__cut">
                                    <div class="pswp__preloader__donut"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap">
                        <div class="pswp__share-tooltip"></div>
                    </div>
                    <button class="pswp__button pswp__button--arrow--left" aria-label="Previous (arrow left)"></button>
                    <button class="pswp__button pswp__button--arrow--right" aria-label="Next (arrow right)"></button>
                    <div class="pswp__caption">
                        <div class="pswp__caption__center"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script type='text/javascript'
        src='{{ asset('plugins') }}/flexslider/jquery.flexslider.min.js'
        id='flexslider-js'></script>
    <script type='text/javascript'
        src='{{ asset('plugins') }}/photoswipe/photoswipe.min.js'
        id='photoswipe-js'></script>
    <script type='text/javascript'
        src='{{ asset('plugins') }}/photoswipe/photoswipe-ui-default.min.js'
        id='photoswipe-ui-default-js'></script>
    <script type='text/javascript' id='wc-single-product-js-extra'>
        /* <![CDATA[ */
        var wc_single_product_params = {
            "i18n_required_rating_text": "Please select a rating",
            "review_rating_required": "yes",
            "flexslider": {
                "rtl": false,
                "animation": "slide",
                "smoothHeight": true,
                "directionNav": false,
                "controlNav": "thumbnails",
                "slideshow": false,
                "animationSpeed": 500,
                "animationLoop": false,
                "allowOneSlide": false
            },
            "zoom_enabled": "",
            "zoom_options": [],
            "photoswipe_enabled": "1",
            "photoswipe_options": {
                "shareEl": false,
                "closeOnScroll": false,
                "history": false,
                "hideAnimationDuration": 0,
                "showAnimationDuration": 0
            },
            "flexslider_enabled": "1"
        };
        /* ]]> */
    </script>
    <script type='text/javascript'
        src='{{ asset('js') }}/single-product.min.js?ver=6.3.1'
        id='wc-single-product-js'></script>

    <script type='text/javascript'
        src='{{ asset('plugins') }}/prettyphoto/jquery.prettyPhoto.min.js'
        id='prettyPhoto-js'></script>
    <script type='text/javascript' id='ywzm-magnifier-js-extra'>
        /* <![CDATA[ */
        var yith_wc_zoom_magnifier_storage_object = {
            "ajax_url": "https:\/\/hummingbird-ad.com\/wp-admin\/admin-ajax.php",
            "mouse_trap_width": "100%",
            "mouse_trap_height": "100%",
            "stop_immediate_propagation": "1"
        };
        /* ]]> */
    </script>
    <script type='text/javascript'
        src='{{ asset('plugins') }}/zoom-magnifier/yith_magnifier.min.js'
        id='ywzm-magnifier-js'></script>

    <script type='text/javascript'
        src='{{ asset('plugins') }}/zoom-magnifier/ywzm_frontend.min.js'
        id='ywzm_frontend-js'></script>
    <script type='text/javascript'
        src='{{ asset('plugins') }}/prettyphoto/init.prettyPhoto.js'
        id='yith-ywzm-prettyPhoto-init-js'></script>
    <script type='text/javascript'
        src='{{ asset('plugins/') }}/lazyload//smush-lazy-load.min.js'
        id='smush-lazy-load-js'></script>
@endsection

@section('meta')

    <meta name="description" content="{{ $product->metadata }}" />
    <link rel="canonical" href="{{ route('product.details', $product->slug) }}" />
    <meta property="og:locale" content="en_US" />
    <meta property="og:type" content="website" />
    <meta property="og:title" content="{{ $product->title }}" />
    <meta property="og:description" content="{{ $product->metadata }}" />
    <meta property="og:url" content="{{ route('product.details', $product->slug) }}" />
    <meta property="og:site_name" content="{{ $setting->name }}" />
    <meta property="og:image" content="{{ $product->getFirstMediaUrl('gallery') }}" />
    <meta property="og:image:width" content="2560" />
    <meta property="og:image:height" content="1707" />
    <meta property="og:image:type" content="image/jpeg" />
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:label1" content="Est. reading time" />
    <meta name="twitter:data1" content="1 minute" />
@endsection



@push('header_scripts')
    <script type='text/javascript' src='{{ asset('js') }}/jquery.min.js'
        id='jquery-core-js'></script>
    <script type="text/javascript" charset="utf-8">
        var yith_magnifier_options = {
            enableSlider: false,
            showTitle: false,
            zoomWidth: 'auto',
            zoomHeight: 'auto',
            position: 'right',
            softFocus: false,
            adjustY: 0,
            disableRightClick: false,
            phoneBehavior: 'right',
            zoom_wrap_additional_css: '',
            lensOpacity: '0',
            loadingLabel: 'Loading...',
        };
    </script>
@endpush

@push('footer_scripts')
@endpush

@push('styles')

    <link rel='stylesheet' id='photoswipe-css'
        href='{{ asset('plugins') }}/photoswipe/photoswipe.min.css'
        type='text/css' media='all' />
    <link rel='stylesheet' id='photoswipe-default-skin-css'
        href='{{ asset('plugins') }}/photoswipe/default-skin.min.css'
        type='text/css' media='all' />


    <link rel='stylesheet' id='ywzm-prettyPhoto-css'
        href='{{ asset('plugins') }}/prettyphoto/prettyPhoto.css' type='text/css'
        media='all' />

    <link rel='stylesheet' id='ywzm-magnifier-css'
        href='{{ asset('plugins') }}/zoom-magnifier/yith_magnifier.css?ver=2.1.1'
        type='text/css' media='all' />
    <link rel='stylesheet' id='ywzm_frontend-css'
        href='{{ asset('plugins') }}/zoom-magnifier/frontend.css?ver=2.1.1'
        type='text/css' media='all' />

    <link rel='stylesheet' id='addtoany-css'
        href='{{ asset('css')  }}/addtoany.min.css?ver=1.16' type='text/css'
        media='all' />
    <link rel='stylesheet' id='dashicons-css' href='{{ asset('css')  }}/dashicons.min.css?ver=5.9.2'
        type='text/css' media='all' />


    <style>
            div.pp_woocommerce a.pp_contract,div.pp_woocommerce a.pp_expand{content:unset!important;background-color:#fff;width:25px;height:25px;margin-top:5px;margin-left:5px}div.pp_woocommerce a.pp_contract,div.pp_woocommerce a.pp_expand:hover{background-color:#fff}div.pp_woocommerce a.pp_contract,div.pp_woocommerce a.pp_contract:hover{background-color:#fff}a.pp_contract:before,a.pp_expand:before{content:unset!important}a.pp_contract .expand-button-hidden svg,a.pp_expand .expand-button-hidden svg{width:25px;height:25px;padding:5px}.expand-button-hidden path{fill:black}#slider-next,#slider-prev{background-color:#fff;border:2px solid #000;width:25px!important;height:25px!important}.yith_slider_arrow span{width:25px!important;height:25px!important}#slider-next:hover,#slider-prev:hover{background-color:#fff;border:2px solid #000}.thumbnails.slider path:hover{fill:#000000}.thumbnails.slider path{fill:#000000;width:25px!important;height:25px!important}.thumbnails.slider svg{width:22px;height:22px}div.pp_woocommerce a.yith_expand{background-color:#fff;width:25px;height:25px;top:10px;bottom:initial;left:initial;right:10px;border-radius:0}.expand-button-hidden svg{width:25px;height:25px}.expand-button-hidden path{fill:black}[data-font=Dashicons]:before{font-family:Dashicons!important;content:attr(data-icon)!important;speak:none!important;font-weight:400!important;font-variant:normal!important;text-transform:none!important;line-height:1!important;font-style:normal!important;-webkit-font-smoothing:antialiased!important;-moz-osx-font-smoothing:grayscale!important}.no-js img.lazyload{display:none}figure.wp-block-image img.lazyloading{min-width:150px}.lazyload,.lazyloading{opacity:0}.lazyloaded{opacity:1;transition:opacity .4s;transition-delay:0s}.modal-body>h2{margin-left:4px!important}.product:hover>a>h3{text-decoration:underline}.a2a_button_print{display:none!important}#uds:hover{text-decoration:underline}.flex-active{padding:3px;border:solid 1px #000}.flex-control-thumbs>li>img{padding:3px}#breadcrumbs{font-size:12px;color:#000}.yith_magnifier_zoom{text-align:center!important}.attachment-shop_single{display:inline-block!important}.expand-button-hidden,.yith_expand,.yith_slider_arrow{display:none!important}.yith_magnifier_thumbnail{width:auto!important}ul>li>.active-thumbnail{padding:1px;border:Solid 1px #000}.yith_magnifier_zoom_magnifier{width:280px!important;height:280px!important;top:70px!important;left:50px;border:solid 5px #000!important}.wp-post-image{width:80%!important;max-height:auto !important!important;min-height:auto!important;height:auto!important}.yith_magnifier_mousetrap{cursor:url("{{ asset('img/magnifier.png') }}"),auto!important}footer>div>div>div>ul>li:nth-child(5){display:none!important}footer>div>div>div>ul>li>a{font-size:.9rem!important}footer>div>div>div>div>ul>li>a{font-size:.9rem!important}.page-numbers>li>span{font-weight:700}.a2a_label{display:none}span.a2a_label{display:none!important}
    </style>
     <link rel="stylesheet" href="{{ asset('ninjaform.css') }}">
     <style>
         .container.ntp {
             text-align: center;
         }

         .nf-error-wrap.nf-error {
         text-align: left;
         color: red;
         margin-top: 5px;
     }


     .submit-btn {
        background: #333;
        border: 0;
        color: #f7f7f7;
        transition: all .5s;

        /* background: #f7f7f7; */
        /* border: 1px solid #c4c4c4; */
        border-radius: 0;
        box-shadow: none;
        color: #787878;
        transition: all .5s;
     }
     </style>
@endpush
