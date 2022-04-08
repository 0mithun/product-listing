<div class="thumbnails noslider">
    <ul class="yith_magnifier_gallery" data-columns="3" data-circular="yes"
        data-slider_infinite="yes" data-auto_carousel="no">
        @foreach ($product->getMedia('gallery') as $image)
            <li class="yith_magnifier_thumbnail first active-thumbnail"
                style="width: 30%;margin-left: 1.6666666666667%;margin-right: 1.6666666666667%">
                <a href="{{ $image->getFullUrl() }}"
                    class="yith_magnifier_thumbnail first active-thumbnail" title="Vignoli3a"
                    data-small="{{ $image->getFullUrl() }}">
                    <img
                        width="100" height="100" alt=""
                        class="attachment-shop_thumbnail size-shop_thumbnail lazyload"
                        src="{{ $image->getFullUrl('thumb') }}" />

                </a>
            </li>
        @endforeach
    </ul>

    <input id="yith_wc_zm_carousel_controler" type="hidden" value="1">
</div>
