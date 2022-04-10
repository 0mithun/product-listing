@extends('layouts.app')

@section('content')
    <section class="page">
        <div class="container ntp">
            {{ $setting->map_text  }}
            <div class="wp-container-1 wp-block-group">
                <div class="wp-block-group__inner-container">
                    <div style="height:30px" aria-hidden="true" class="wp-block-spacer"></div>
                    <p class="has-text-align-center"><strong>{{ $setting->name }} is locatedin:</strong></p>
                    <p class="has-text-align-center">{{ $setting->full_address }}<br><span
                        style="font-size: inherit;">{{ $setting->phone }}</span><br><a href="{{ $setting->email }}"
                        target="_blank" rel="noreferrer noopener">{{ $setting->email }}</a></p>
                    <p class="has-text-align-center">HOURS<br>Monday – Saturday from 10:00am – 5:00pm, and by appointment.</p>
                </div>
            </div>
            <div id="inquiry" class="wp-container-2 wp-block-group">
                <div class="wp-block-group__inner-container">
                    <h2 class="has-text-align-center" id="h-need-to-contact-us-we-would-love-to-hear-from-you">Need to contact us? We would love to hear from you.</h2>
                    <div class="nf-form-cont" aria-live="polite" aria-labelledby="nf-form-title-3"
                        aria-describedby="nf-form-errors-3" role="form">
                        <div class="nf-form-wrap ninja-forms-form-wrap">
                            <div class="nf-form-layout">
                                <form method="post" action="{{ route('module.contact.store') }}">
                                    @csrf
                                    <div>
                                        <div class="nf-form-content ">
                                            <div class="nf-field-container textbox-container label-hidden one-half first ">
                                                <div class="nf-field">
                                                    <div class="field-wrap textbox-wrap">
                                                        <div class="nf-field-label">
                                                            <label for="name" class="">Name <span class="ninja-forms-req-symbol">*</span></label>
                                                        </div>
                                                        <div class="nf-field-element">
                                                            <input type="text" value="" class="ninja-forms-field nf-element"
                                                                placeholder="Name" id="name" name="name"
                                                                aria-invalid="false" aria-describedby="nf-error-12"
                                                                aria-labelledby="nf-label-field-12" >
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="nf-after-field">
                                                    @error('name')
                                                        <div class="nf-error-wrap nf-error" role="alert">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="nf-field-container email-container label-hidden one-half ">
                                                <div class="nf-field">
                                                    <div class="field-wrap email-wrap">
                                                        <div class="nf-field-label">
                                                            <label for="email" class="">Email <span class="ninja-forms-req-symbol">*</span></label>
                                                        </div>
                                                        <div class="nf-field-element">
                                                            <input type="email" value=""
                                                                class="ninja-forms-field nf-element" id="email"
                                                                name="email" autocomplete="email" placeholder="Email"
                                                                aria-invalid="false" aria-describedby="nf-error-13"
                                                                aria-labelledby="nf-label-field-13" >
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="nf-after-field">
                                                    @error('email')
                                                        <div class="nf-error-wrap nf-error" role="alert">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="nf-field-container textarea-container label-hidden ">
                                                <div class="nf-field">
                                                    <div class="field-wrap textarea-wrap">
                                                        <div class="nf-field-label">
                                                            <label for="message" class="">Message <span class="ninja-forms-req-symbol">*</span></label>
                                                        </div>
                                                        <div class="nf-field-element">
                                                            <textarea id="message" name="message" aria-invalid="false" aria-describedby="message"
                                                                class="ninja-forms-field nf-element"
                                                                placeholder="How can we help you?"
                                                                aria-labelledby="nf-label-field-14"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="nf-after-field">
                                                    @error('message')
                                                        <div class="nf-error-wrap nf-error" role="alert">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="nf-field-container submit-container label-hidden  textbox-container">
                                                <div class="nf-field">
                                                    <div id="nf-field-15-wrap" class="field-wrap submit-wrap textbox-wrap">
                                                        <div class="nf-field-element">
                                                            <button class="ninja-forms-field nf-element">Submit</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>
@endsection

@section('meta')
    <!-- This site is optimized with the Yoast SEO Premium plugin v17.7 (Yoast SEO v18.4.1) - https://yoast.com/wordpress/plugins/seo/ -->
    <meta name="description"
        content="Hummingbird Art and Design offers for sale a curated collection of beautiful art objects by highly skilled artists and artisans from around the world." />
    <link rel="canonical" href="https://hummingbird-ad.com/about/" />
    <meta property="og:locale" content="en_US" />
    <meta property="og:type" content="article" />
    <meta property="og:title" content="Hummingbird Art &amp; Design" />
    <meta property="og:description"
        content="Hummingbird Art and Design offers for sale a curated collection of beautiful art objects by highly skilled artists and artisans from around the world." />
    <meta property="og:url" content="https://hummingbird-ad.com/about/" />
    <meta property="og:site_name" content="Hummingbird Art &amp; Design" />
    <meta property="article:publisher" content="https://www.facebook.com/HummingbirdArtandDesign" />
    <meta property="article:modified_time" content="2022-01-19T05:19:26+00:00" />
    <meta property="og:image"
        content="https://hummingbird-ad.com/wp-content/uploads/2021/11/Hummingbird-logo-7.1.21-scaled.jpg" />
    <meta property="og:image:width" content="2560" />
    <meta property="og:image:height" content="1707" />
    <meta property="og:image:type" content="image/jpeg" />
    <meta name="twitter:card" content="summary_large_image" />
    <meta name="twitter:title" content="About" />
    <meta name="twitter:label1" content="Est. reading time" />
    <meta name="twitter:data1" content="2 minutes" />
@endsection

@push('styles')
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

    </style>
@endpush
