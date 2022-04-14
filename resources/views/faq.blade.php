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
                        <p class="collapse ">{!! $faq->answer !!}</p>
                    @endforeach
                @endforeach
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
<meta property="og:title" content="Faqs" />
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
