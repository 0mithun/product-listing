<footer>
    <div class="container" style="">
        <div class="row menu">
            <div class="col-md-3 col-xs-12">
                <h5>Company</h5>
                <div class="menu-about-container">
                    <ul id="menu-about" class="menu" itemscope
                        itemtype="http://www.schema.org/SiteNavigationElement">
                        <li id="menu-item-525"
                            class="menu-item menu-item-type-post_type menu-item-object-page menu-item-home current-menu-item page_item page-item-45 current_page_item menu-item-525">
                            <a href="{{ route('index') }}" aria-current="page">Home</a></li>
                        <li id="menu-item-524"
                            class="menu-item menu-item-type-post_type menu-item-object-page menu-item-524"><a
                                href="{{ route('about') }}">About</a></li>
                        <li id="menu-item-855"
                            class="menu-item menu-item-type-post_type menu-item-object-page menu-item-855"><a
                                href="{{ route('faq') }}">FAQs</a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-3 col-xs-12">
                <h5>Gallery</h5>
                <ul>
                    <li><a href="{{ route('gallery') }}">View All</a></li>
                </ul>
            </div>
            <div class="col-md-3 col-xs-12">
                <h5>Collections</h5>
                <ul>
                    @foreach ($category_list as $cat)
                    <li><a href="{{ route('category.product', $cat->slug) }}">{{ $cat->name }}</a></li>
                    @endforeach
                </ul>
            </div>
            <div class="col-md-3 col-xs-12">
                <h5><a href="{{ route('contact') }}">Contact</a></h5>
                <div class="icons">
                    @if (!is_null($setting->facebook))
                    <a target="_blank" href="{{ $setting->facebook }}"><img src="{{ asset('img/facebook.png') }}"></a>
                    @endif
                    @if (!is_null($setting->twitter))
                    <a target="_blank" href="{{ $setting->twitter }}"><img src="{{ asset('img/twitter.png') }}"></a>
                    @endif
                    @if (!is_null($setting->instagram))
                    <a target="_blank" href="{{ $setting->instagram }}"><img src="{{ asset('img/instagram.png') }}"></a>
                    @endif
                    @if (!is_null($setting->pinterest))
                    <a target="_blank" href="{{ $setting->pinterest }}"><img src="{{ asset('img/pinterest.png')  }}"></a>
                    @endif
                </div>
            </div>
        </div>
        <div class="row copy">
            <div class=" col-xs-12"><small style="font-size:11px;">{!! $setting->copyright_text !!}</small>
            </div>
        </div>
    </div>
</footer>
