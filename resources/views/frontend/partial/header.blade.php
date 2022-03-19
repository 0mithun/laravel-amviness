<!-- Start of Header -->
<header class="header header-border">
    <div class="header-top">
        <div class="container">
            <div class="header-left">
                <p class="welcome-msg"> {{  $setting->title }} </p>
            </div>
            <div class="header-right">
                <!-- End of Dropdown Menu -->
                <span class="divider d-lg-show"></span>
                <a href=" {{ route('frontend.blog') }} " class="d-lg-show">Blog</a>
                <a href="{{ route('frontend.conatct') }}" class="d-lg-show">Contact Us</a>
                @auth
                    <a href="{{ route('frontend.myaccount') }}" class="d-lg-show">My Account</a>
                @endauth
                @guest
                    <a href="{{ route('login') }}" class="d-lg-show">Sign In</a>
                    <span class="delimiter d-lg-show">|</span>
                    <a href="{{ route('register') }}" class="d-lg-show">Register</a>
                @endguest
            </div>
        </div>
    </div>
    <!-- End of Header Top -->

    <div class="header-middle">
        <div class="container">
            <div class="header-left mr-md-4">
                <a href="#" class="mobile-menu-toggle  w-icon-hamburger" aria-label="menu-toggle">
                </a>
                <a href="{{ route('home') }}" class="logo ml-lg-0">
                    <img src="{{ asset( $setting->logo_image_path)}}" alt="logo" width="144" height="45" />
                </a>
                <form method="get" action="#" class="header-search hs-expanded hs-round d-none d-md-flex input-wrapper">
                    <div class="select-box">
                        <select id="category" name="category">
                            <option value="">All Categories</option>
                            <option value="4">Fashion</option>
                            <option value="5">Furniture</option>
                            <option value="6">Shoes</option>
                            <option value="7">Sports</option>
                            <option value="8">Games</option>
                            <option value="9">Computers</option>
                            <option value="10">Electronics</option>
                            <option value="11">Kitchen</option>
                            <option value="12">Clothing</option>
                        </select>
                    </div>
                    <input type="text" class="form-control" name="search" id="search"
                        placeholder="Search in..." required />
                    <button class="btn btn-search" type="submit"><i class="w-icon-search"></i>
                    </button>
                </form>
            </div>
            <div class="header-right ml-4">
                <div class="header-call d-xs-show d-lg-flex align-items-center">
                    <a href="tel:#" class="w-icon-call"></a>
                    <div class="call-info d-lg-show">
                        <h4 class="chat font-weight-normal font-size-md text-normal ls-normal text-light mb-0">
                            <a href="mailto:#" class="text-capitalize">Live Chat</a> or :</h4>
                        <a href="tel:#" class="phone-number font-weight-bolder ls-50">0(800)123-456</a>
                    </div>
                </div>
                <a class="wishlist label-down link d-xs-show" href="{{ route('frontend.wishlist') }}">
                    <i class="w-icon-heart"></i>
                    <span class="wishlist-label d-lg-show">Wishlist</span>
                </a>
                <div class="dropdown cart-dropdown cart-offcanvas mr-0 mr-lg-2">
                    <div class="cart-overlay"></div>
                    <a href="{{ route('frontend.cart') }}" class="label-down link">
                        <i class="w-icon-cart">
                            <span class="cart-count">2</span>
                        </i>
                        <span class="cart-label">Cart</span>
                    </a>
                    <div class="dropdown-box">
                        <div class="cart-header">
                            <span>Shopping Cart</span>
                            <a href="#" class="btn-close">Close<i class="w-icon-long-arrow-right"></i></a>
                        </div>

                        <div class="products">
                            <div class="product product-cart">
                                <div class="product-detail">
                                    <a href="product-default.html" class="product-name">Beige knitted
                                        elas<br>tic
                                        runner shoes</a>
                                    <div class="price-box">
                                        <span class="product-quantity">1</span>
                                        <span class="product-price">$25.68</span>
                                    </div>
                                </div>
                                <figure class="product-media">
                                    <a href="product-default.html">
                                        <img src="{{ asset('frontend')}}/assets/images/cart/product-1.jpg" alt="product" height="84"
                                            width="94" />
                                    </a>
                                </figure>
                                <button class="btn btn-link btn-close" aria-label="button">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>

                            <div class="product product-cart">
                                <div class="product-detail">
                                    <a href="product-default.html" class="product-name">Blue utility
                                        pina<br>fore
                                        denim dress</a>
                                    <div class="price-box">
                                        <span class="product-quantity">1</span>
                                        <span class="product-price">$32.99</span>
                                    </div>
                                </div>
                                <figure class="product-media">
                                    <a href="product-default.html">
                                        <img src="{{ asset('frontend')}}/assets/images/cart/product-2.jpg" alt="product" width="84"
                                            height="94" />
                                    </a>
                                </figure>
                                <button class="btn btn-link btn-close" aria-label="button">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        </div>

                        <div class="cart-total">
                            <label>Subtotal:</label>
                            <span class="price">$58.67</span>
                        </div>

                        <div class="cart-action">
                            <a href="cart.html" class="btn btn-dark btn-outline btn-rounded">View Cart</a>
                            <a href="checkout.html" class="btn btn-primary  btn-rounded">Checkout</a>
                        </div>
                    </div>
                    <!-- End of Dropdown Box -->
                </div>
            </div>
        </div>
    </div>
    <!-- End of Header Middle -->

    <div class="header-bottom sticky-content fix-top sticky-header">
        <div class="container">
            <div class="inner-wrap">
                <div class="header-left">
                    <div class="dropdown category-dropdown has-border" data-visible="true">
                        <a href="#" class="category-toggle" role="button" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="true" data-display="static"
                            title="Browse Categories">
                            <i class="w-icon-category"></i>
                            <span>Browse Categories</span>
                        </a>

                        <div class="dropdown-box">
                            <ul class="menu vertical-menu category-menu">
                                @foreach ($categories as $category)
                                    <li>
                                        <a href="{{ route('frontend.product.category',$category->slug) }}">
                                            <i class="{{ $category->icon }}"></i> {{ $category->name }}
                                        </a>
                                        <ul class="megamenu">
                                            <li>
                                                <h4 class="menu-title">Sub Category</h4>
                                                <hr class="divider">
                                                <ul>
                                                    @foreach ($category->subcategories as $subcategory)
                                                        <li><a href="{{ route('frontend.product.subcategory',$subcategory->id) }}"> {{ $subcategory->name }} </a>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                            </li>
                                        </ul>
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <nav class="main-nav">
                        <ul class="menu active-underline">
                            <li>
                                <a href=" {{ route('home') }} ">Home</a>
                            </li>
                            <li class="active">
                                <a href=" {{ route('frontend.shop') }} ">Shop</a>
                            </li>
                            <li>
                                <a href="{{ route('frontend.blog') }}">Blog</a>
                                <ul>

                                    <li><a href=" {{ route('frontend.blog.grid') }} ">Blog Grid</a></li>
                                    <li><a href=" {{ route('frontend.about') }} ">Blog List</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="#">Pages</a>
                                <ul>

                                    <li><a href=" {{ route('frontend.about') }} ">About Us</a></li>
                                    <li><a href="{{ route('frontend.faqs') }}">FAQs</a></li>
                                    <li><a href="{{ route('frontend.wishlist') }}">Wishlist</a></li>
                                    <li><a href="{{ route('frontend.cart') }}">Cart</a></li>
                                    <li><a href="{{ route('frontend.checkout') }}">Checkout</a></li>
                                    <li><a href="{{ route('frontend.myaccount') }}">My Account</a></li>
                                </ul>
                            </li>
                            <li><a href="{{ route('frontend.conatct') }}">Contact Us</a></li>
                        </ul>
                    </nav>
                </div>
                <div class="header-right">
                    <a href="#" class="d-xl-show"><i class="w-icon-map-marker mr-1"></i>Track Order</a>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- End of Header -->
