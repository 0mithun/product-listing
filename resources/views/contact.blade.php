@extends('layouts.app')

@section('content')
    <section class="page">
        <div class="container ntp">
            <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d53656.50856443947!2d-96.814766!3d32.804672!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x864e9eb56e4b90dd%3A0x381b048d3f6c2628!2sDallas%2C%20TX%2075219!5e0!3m2!1sen!2sus!4v1649520380601!5m2!1sen!2sus" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            <div class="wp-container-1 wp-block-group">
                <div class="wp-block-group__inner-container">
                    <div style="height:30px" aria-hidden="true" class="wp-block-spacer"></div>
                    <p class="has-text-align-center"><strong>Hummingbird Art <small>&amp;</small> Design is locatedin:</strong></p>
                    <p class="has-text-align-center">Dallas, Texas 75219 – USA<br><span
                        style="font-size: inherit;">214.739.3939</span><br><a href="mailto:info@hummingbird-ad.com"
                        target="_blank" rel="noreferrer noopener">info@hummingbird-ad.com</a></p>
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
                                <form>
                                    <div>
                                        <div class="nf-form-content ">
                                            <div class="nf-field-container textbox-container label-hidden one-half first ">
                                                <div class="nf-field">
                                                    <div class="field-wrap textbox-wrap">
                                                        <div class="nf-field-label">
                                                            <label for="nf-field-12" class="">Name <span class="ninja-forms-req-symbol">*</span></label>
                                                        </div>
                                                        <div class="nf-field-element">
                                                            <input type="text" value="" class="ninja-forms-field nf-element"
                                                                placeholder="Name" id="nf-field-12" name="nf-field-12"
                                                                aria-invalid="false" aria-describedby="nf-error-12"
                                                                aria-labelledby="nf-label-field-12" required="">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="nf-field-container email-container label-hidden one-half ">
                                                <div class="nf-field">
                                                    <div class="field-wrap email-wrap">
                                                        <div class="nf-field-label">
                                                            <label for="nf-field-13" class="">Email <span class="ninja-forms-req-symbol">*</span></label>
                                                        </div>
                                                        <div class="nf-field-element">
                                                            <input type="email" value=""
                                                                class="ninja-forms-field nf-element" id="nf-field-13"
                                                                name="email" autocomplete="email" placeholder="Email"
                                                                aria-invalid="false" aria-describedby="nf-error-13"
                                                                aria-labelledby="nf-label-field-13" required="">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="nf-field-container textarea-container label-hidden ">
                                                <div class="nf-field">
                                                    <div class="field-wrap textarea-wrap">
                                                        <div class="nf-field-label">
                                                            <label for="nf-field-14" class="">Message <span class="ninja-forms-req-symbol">*</span></label>
                                                        </div>
                                                        <div class="nf-field-element">
                                                            <textarea id="nf-field-14" name="nf-field-14" aria-invalid="false" aria-describedby="nf-error-14"
                                                                class="ninja-forms-field nf-element"
                                                                placeholder="How can we help you?"
                                                                aria-labelledby="nf-label-field-14"
                                                                required=""></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="nf-after-field">
                                                    <div id="nf-error-14" class="nf-error-wrap nf-error" role="alert">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="nf-field-container submit-container label-hidden  textbox-container">
                                                <div class="nf-field">
                                                    <div id="nf-field-15-wrap" class="field-wrap submit-wrap textbox-wrap">
                                                        <div class="nf-field-element">
                                                            <input class="ninja-forms-field nf-element" type="button" value="Submit">
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

    </style>
@endpush
