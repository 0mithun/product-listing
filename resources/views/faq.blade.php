@extends('layouts.app')

@section('content')
<section class="page">
	<div class="container ntp">

<div class="wp-container-6249df644363f wp-block-group faq"><div class="wp-block-group__inner-container">
<h2 class="has-text-align-center">Frequently Asked Questions</h2>



<h2>Payments</h2>



<h4 href="collapse1" data-toggle="collapse">Which payment methods do you accept?</h4>



<p class="collapse collapse1">We accept Visa, Mastercard, PayPal, Bank Wire and Bank Check.</p>



<h4 href="collapse2" data-toggle="collapse">How is sales tax calculated on purchases?</h4>



<p class="collapse collapse2">We are required to charge sales tax based on the shipping address of an order.</p>



<h2>Shipping</h2>



<h4 href="collapse3" data-toggle="collapse">What shipping methods are available?</h4>



<p class="collapse collapse3">We ship via FedEx, UPS, DHL and USPS, as per confirmation with customer.</p>



<h4 href="collapse4" data-toggle="collapse">Do you ship internationally?</h4>



<p class="collapse collapse4">No, we do not ship internationally.</p>



<h4 href="collapse5" data-toggle="collapse">What are your shipping charges?</h4>



<p class="collapse collapse5">Shipping charges are additional and are determined on a per purchase basis, based on item and destination.</p>



<h4 href="collapse6" data-toggle="collapse">Do you insure your shipments?</h4>



<p class="collapse collapse6">We always insure our shipments. Insurance is included in the shipping charges. </p>



<h2>Returns, Exchanges and Order Cancellations</h2>



<h4 href="collapse7" data-toggle="collapse">Do you accept returns, exchanges and/or order cancellations?</h4>



<p class="collapse collapse7">We do not accept returns or exchanges.&nbsp; Orders must be cancelled within 24 hours of placement of order. Please contact us immediately for order cancellation.</p>



<h2>Customer Care</h2>



<h4 href="collapse8" data-toggle="collapse">What if an item is noted as out of stock on the website?</h4>



<p class="collapse collapse8">Orders will be filled as soon as possible and as per the item.</p>



<h4 href="collapse9" data-toggle="collapse">What if I have further question?</h4>



<p class="collapse collapse9">If there is anything else you would like help with, please contact us at:&nbsp; <a href="about:blank">info@hummingbird-ad.com</a>, or, call us at:&nbsp;214.649.6316.</p>
</div></div>



<pre class="wp-block-code"><code></code></pre>
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
        //alert();
        var count = 1;


        $(".faq h4").each(function() {
            //alert();

            //  $(this).next("p").toggleClass("collapse");

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
