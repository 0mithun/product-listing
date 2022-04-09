@extends('layouts.app')

@section('content')
<section class="page">
	<div class="container ntp">
        <div class="wp-container-6249df644363f wp-block-group faq">
            <div class="wp-block-group__inner-container">
                <h2 class="has-text-align-center">Frequently Asked Questions</h2>
                @foreach ($faq_categories as $faq_category)
                    <h2>{{ $faq_category->name }}</h2>
                    @foreach ($faq_category->faqs as $faq)
                        <h4 href="" data-toggle="collapse">{{ $faq->question }}</h4>
                        <p class="collapse ">{{ $faq->answer }}</p>
                    @endforeach
                @endforeach
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

@endpush

@push('footer_scripts')

<script>
    $(document).ready(function() {
        var count = 1;
        $(".faq h4").each(function() {
            if ($(this).next("p").length > 0) {
                $(this).attr("href", "collapse" + count);
                $(this).attr("data-toggle", "collapse");
                $(this).next("p").addClass("collapse collapse" + count);
                count++;
            };
        });

        $(".faq h4").click(function() {
            $(this).next("p").toggleClass("collapse");
            $(this).toggleClass("open");
        });
    });
</script>
@endpush

@push('styles')

@endpush
