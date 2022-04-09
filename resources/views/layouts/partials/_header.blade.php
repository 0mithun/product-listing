<header class="header">
    <div class="container no-pad">
        <div class="row align-top">
            <div class="col">
                <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#top-menu"
                    aria-controls="top-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon">&#9776;</span>
                </button>
                <nav class="navbar links">
                    <ul class="navbar-nav right">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggler" href="/collections" id="navbarDropdown" role="button"> Collections </a>
                            <ul class="dropdown-menu">
                                @foreach ($category_list as $category)
                                <li class="dropdown2">
                                    <a class="dropdown-item" href="{{ route('category.product', $category->slug) }}">{{ $category->name }}</a>
                                    <x-dropdown-submenu :child_categories="$category->children" />
                                </li>
                                @endforeach
                            </ul>
                        </li>
                    </ul>
                </nav>
            </div>
            <div class="col-md-4 col-6 text-center ">
                <a href="{{ route('index') }}" class="site-title navbar-brand">
                    <img alt="Hummingbird Art & Design" src="{{ asset('img/logo.jpg') }}">
                </a>
            </div>
            <div class="col">
                <nav class="navbar links">
                    <ul class="navbar-nav">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="{{ route('gallery') }}" id="navbarDropdown1" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">
                                Gallery
                            </a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
        <nav class="navbar navbar-expand-lg" id="main-menu">
            <div class="collapse navbar-collapse justify-content-md-center " id="top-menu">
                <ul id="menu-main" class="navbar-nav " itemscope
                    itemtype="http://www.schema.org/SiteNavigationElement">
                    <li id="menu-item-526"
                        class="menu-item menu-item-type-post_type menu-item-object-page menu-item-526 nav-item">
                        <a
                           href="{{ route('about') }}" class="nav-link"><span>About</span>
                        </a>
                    </li>

                    <li id="menu-item-856"
                        class="menu-item menu-item-type-post_type menu-item-object-page menu-item-856 nav-item"><a
                           href="https://hummingbird-ad.com/gallery/" class="nav-link"><span
                                itemprop="name">Gallery</span></a></li>
                    <li id="menu-item-853"
                        class="menu-item menu-item-type-post_type menu-item-object-page menu-item-853 nav-item"><a
                           href="https://hummingbird-ad.com/collections/"
                            class="nav-link"><span itemprop="name">Collections</span></a></li>
                    <li id="menu-item-851"
                        class="menu-item menu-item-type-post_type menu-item-object-page menu-item-851 nav-item"><a
                           href="https://hummingbird-ad.com/contact/" class="nav-link"><span
                                itemprop="name">Contact</span></a></li>
                </ul>
            </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
    </nav>

</header>
