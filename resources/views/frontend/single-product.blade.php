@extends('frontend.master')
@section('frontend_content')
     <!-- Start of Main -->
     <main class="main mb-10 pb-1">
        <!-- Start of Breadcrumb -->
        <nav class="breadcrumb-nav container">
            <ul class="breadcrumb bb-no">
                <li><a href="demo1.html">Home</a></li>
                <li><a href="product-default.html">Products</a></li>
                <li>Vertical Thumbs</li>
            </ul>
            <ul class="product-nav list-style-none">
                <li class="product-nav-prev">
                    <a href="#">
                        <i class="w-icon-angle-left"></i>
                    </a>
                    <span class="product-nav-popup">
                        <img src="{{ asset('/frontend') }}/assets/images/products/product-nav-prev.jpg" alt="Product" width="110"
                            height="110" />
                        <span class="product-name">Soft Sound Maker</span>
                    </span>
                </li>
                <li class="product-nav-next">
                    <a href="#">
                        <i class="w-icon-angle-right"></i>
                    </a>
                    <span class="product-nav-popup">
                        <img src="{{ asset('/frontend') }}/assets/images/products/product-nav-next.jpg" alt="Product" width="110"
                            height="110" />
                        <span class="product-name">Fabulous Sound Speaker</span>
                    </span>
                </li>
            </ul>
        </nav>
        <!-- End of Breadcrumb -->

        <!-- Start of Page Content -->
        <div class="page-content">
            <div class="container">
                <div class="product product-single row">
                    <div class="col-md-6 mb-6">
                        <div class="product-gallery product-gallery-sticky product-gallery-vertical">
                            <div class="swiper-container product-single-swiper swiper-theme nav-inner" data-swiper-options="{
                                'navigation': {
                                    'nextEl': '.swiper-button-next',
                                    'prevEl': '.swiper-button-prev'
                                }
                            }">
                                <div class="swiper-wrapper row cols-1 gutter-no">
                                    <div class="swiper-slide">
                                        <figure class="product-image">
                                            <img src="{{ asset($product->image) }}"
                                                data-zoom-image="assets/images/products/without/2-800x900.jpg"
                                                alt="Bright Green IPhone" width="488" height="549">
                                        </figure>
                                    </div>
                                    @foreach ($product->galleries as $gallery)
                                        <div class="swiper-slide">
                                            <figure class="product-image">
                                                <img src="{{ asset($gallery->image) }}"
                                                    data-zoom-image="assets/images/products/without/2-800x900.jpg"
                                                    alt="Bright Green IPhone" width="488" height="549">
                                            </figure>
                                        </div>
    
                                    @endforeach



                                </div>
                                <button class="swiper-button-next"></button>
                                <button class="swiper-button-prev"></button>
                                {{-- <a href="#" class="product-gallery-btn product-image-full"><i class="w-icon-zoom"></i></a> --}}
                            </div>
                            <div class="product-thumbs-wrap swiper-container" data-swiper-options="{
                                'navigation': {
                                    'nextEl': '.swiper-button-next',
                                    'prevEl': '.swiper-button-prev'
                                },
                                'breakpoints': {
                                    '992': {
                                        'direction': 'vertical',
                                        'slidesPerView': 'auto'
                                    }
                                }
                            }">
                                <div class="product-thumbs swiper-wrapper row cols-lg-1 cols-4 gutter-sm">
                                    <div class="product-thumb swiper-slide">
                                        <img src="{{ asset($product->image) }}" alt="Product Thumb"
                                            width="800" height="900">
                                    </div>
                                    @foreach ($product->galleries as $gallery)
                                        <div class="product-thumb swiper-slide">
                                                                    
                                            {{-- <td class="sorting_1 text-center" tabindex="0"><img width="5px"
                                                height="5px" src="{{ asset($product->image) }}"
                                                class="rounded" alt="Product Image"></td> --}}


                                            <img src="{{ asset($gallery->image) }}" alt="Product Thumb"
                                                width="800" height="900">
                                                
                                        </div>
                                    @endforeach
                                </div>
                                <button class="swiper-button-prev"></button>
                                <button class="swiper-button-next"></button>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 mb-4 mb-md-6">
                        <div class="product-details">
                            <h1 class="product-title"> {{ $product->title }} </h1>
                            <div class="product-bm-wrapper">
                                <figure class="brand">
                                    <img src="{{ asset($product->category->image) }}" alt="Brand" width="105"
                                        height="48" />
                                </figure>
                                <div class="product-meta">
                                    <div class="product-categories">
                                        Category:
                                        <span class="product-category"><a href="#"> {{ $product->category->name }} </a></span>
                                    </div>
                                    <div class="product-sku">
                                        SKU: <span>{{ $product->sku }}</span>
                                    </div>
                                </div>
                            </div>

                            <hr class="product-divider">

                            <div class="product-price">
                                <ins class="new-price">৳{{ $product->sale_price }}</ins><del class="old-price">৳{{ $product->price }}</del>
                            </div>

                            <div class="ratings-container">
                                <div class="ratings-full">
                                    <span class="ratings" style="width: 80%;"></span>
                                    <span class="tooltiptext tooltip-top"></span>
                                </div>
                                <a href="#" class="rating-reviews">(1 Reviews)</a>
                            </div>

                            <div class="product-short-desc lh-2">
                                <ul class="list-type-check list-style-none">
                                    <li>Ultrices eros in cursus turpis massa cursus mattis.</li>
                                    <li>Volutpat ac tincidunt vitae semper quis lectus.</li>
                                    <li>Aliquam id diam maecenas ultricies mi eget mauris.</li>
                                </ul>
                            </div>

                            <hr class="product-divider">

                            <div class="fix-bottom product-sticky-content sticky-content">
                                <div class="product-form container">
                                    <div class="product-qty-form with-label">
                                        <label>Quantity:</label>
                                        <div class="input-group">
                                            <input class="quantity form-control" type="number" min="1"
                                                max="10000000">
                                            <button class="quantity-plus w-icon-plus"></button>
                                            <button class="quantity-minus w-icon-minus"></button>
                                        </div>
                                    </div>
                                    <button class="btn btn-primary btn-cart">
                                        <i class="w-icon-cart"></i>
                                        <span>Add to Cart</span>
                                    </button>
                                </div>
                            </div>

                            <div class="social-links-wrapper">
                                @php
                                        $exist = checkWishlisted($product->id);
                                @endphp
                                <div class="social-links">
                                    <div class="social-icons social-no-color border-thin">
                                        <a href="{{ socialMediaShareLinks('/frontend/single-product/', $product->id)['facebook'] }}" class="social-icon social-facebook w-icon-facebook"></a>
                                        <a href="{{ socialMediaShareLinks('/frontend/single-product/', $product->id)['twitter'] }}" class="social-icon social-twitter w-icon-twitter"></a>
                                        {{-- <a href="{{ socialMediaShareLinks('/frontend/single-product/', $product->id)['facebook'] }}" class="social-icon social-pinterest fab fa-pinterest-p"></a> --}}
                                        <a href="{{ socialMediaShareLinks('/frontend/single-product/', $product->id)['whatsapp'] }}" class="social-icon social-whatsapp fab fa-whatsapp"></a>
                                        <a href="{{ socialMediaShareLinks('/frontend/single-product/', $product->id)['linkedin'] }}" class="social-icon social-youtube fab fa-linkedin-in"></a>
                                    </div>
                                </div>
                                <span class="divider d-xs-show"></span>
                                <div class="product-link-wrapper d-flex">
                                    <form action="{{ route('frontend.wishlist.customer') }}" method="POST">
                                        @csrf
    
                                        @if (auth('customer')->check())
                                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                                            <input type="hidden" name="user_id" value="{{ auth('customer')->user()->id }}">
                                        @endif
                                        
                                        <button class="cour" type="submit" style="cursor: pointer;">
                                            @if ($exist)
                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path d="M12 20.25L11.8778 20.4681C11.9537 20.5106 12.0463 20.5106 12.1222 20.4681L12 20.25ZM12 20.25C12.1222 20.4681 12.1222 20.4681 12.1224 20.468L12.1228 20.4678L12.1243 20.4669L12.1298 20.4638L12.1509 20.4519C12.1692 20.4414 12.1962 20.4259 12.2311 20.4055C12.3011 20.3647 12.4032 20.3044 12.5328 20.2255C12.792 20.0678 13.1615 19.8358 13.6045 19.5375C14.49 18.9412 15.6718 18.0786 16.8547 17.014C19.2055 14.8983 21.625 11.9276 21.625 8.62501V8.62497C21.6248 7.44044 21.2144 6.29255 20.4635 5.37645C19.7126 4.46034 18.6676 3.83258 17.5061 3.59989C16.3447 3.36719 15.1385 3.54393 14.0926 4.10006C13.2044 4.57239 12.4783 5.29363 12 6.16991C11.5217 5.29363 10.7956 4.57239 9.90736 4.10005C8.8615 3.54393 7.65532 3.36719 6.49388 3.59989C5.33244 3.83258 4.28743 4.46034 3.53654 5.37645C2.78564 6.29255 2.3752 7.44044 2.375 8.62497V8.62501C2.375 11.9276 4.79451 14.8983 7.14526 17.014C8.32819 18.0786 9.50999 18.9412 10.3955 19.5375C10.8385 19.8358 11.208 20.0678 11.4672 20.2255C11.5968 20.3044 11.6989 20.3647 11.7689 20.4055C11.8038 20.4259 11.8308 20.4414 11.8491 20.4519L11.8702 20.4638L11.8757 20.4669L11.8772 20.4678L11.8776 20.468C11.8778 20.4681 11.8778 20.4681 12 20.25Z" fill="#ff1a1a" stroke="#ff1a1a" stroke-width="0.5" stroke-linecap="round" stroke-linejoin="round"/>
                                            </svg>
                                        @else
                                            <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M12 20.25C12 20.25 2.625 15 2.625 8.62501C2.62519 7.49826 3.01561 6.40635 3.72989 5.53493C4.44416 4.66351 5.4382 4.06636 6.54299 3.84501C7.64778 3.62367 8.79514 3.79179 9.78999 4.32079C10.7848 4.84979 11.5658 5.70702 12 6.74673L12 6.74673C12.4342 5.70702 13.2152 4.84979 14.21 4.32079C15.2049 3.79179 16.3522 3.62367 17.457 3.84501C18.5618 4.06636 19.5558 4.66351 20.2701 5.53493C20.9844 6.40635 21.3748 7.49826 21.375 8.62501C21.375 15 12 20.25 12 20.25Z"
                                                    stroke="#ff1a1a"
                                                    stroke-width="1.6"
                                                    stroke-linecap="round"
                                                    stroke-linejoin="round"
                                                />
                                            </svg>
                                        @endif
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab tab-nav-boxed tab-nav-underline product-tabs mt-3">
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a href="#product-tab-description" class="nav-link active">Description</a>
                        </li>
                        <li class="nav-item">
                            <a href="#product-tab-reviews" class="nav-link">Customer Reviews (3)</a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="product-tab-description">
                            <div class="row mb-4">
                                <div class="col-md-6 mb-5">
                                    <h4 class="title tab-pane-title font-weight-bold mb-2">Detail</h4>
                                    <p class="mb-4"> {{ $product->long_description}} </p>
                                </div>
                                <div class="col-md-6 mb-5">
                                    <div class="banner banner-video product-video br-xs">
                                        <figure class="banner-media">
                                            <a href="#">
                                                <img src="{{ asset('/frontend') }}/assets/images/products/video-banner-610x300.jpg"
                                                    alt="banner" width="610" height="300"
                                                    style="background-color: #bebebe;">
                                            </a>
                                            <a class="btn-play-video btn-iframe"
                                                href="assets/video/memory-of-a-woman.mp4"></a>
                                        </figure>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="product-tab-reviews">
                            <div class="row mb-4">
                                <div class="col-xl-4 col-lg-5 mb-4">
                                    <div class="ratings-wrapper">
                                        <div class="avg-rating-container">
                                            <h4 class="avg-mark font-weight-bolder ls-50">3.3</h4>
                                            <div class="avg-rating">
                                                <p class="text-dark mb-1">Average Rating</p>
                                                <div class="ratings-container">
                                                    <div class="ratings-full">
                                                        <span class="ratings" style="width: 60%;"></span>
                                                        <span class="tooltiptext tooltip-top"></span>
                                                    </div>
                                                    <a href="#" class="rating-reviews">(3 Reviews)</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="ratings-value d-flex align-items-center text-dark ls-25">
                                            <span class="text-dark font-weight-bold">66.7%</span>Recommended<span
                                                class="count">(2 of 3)</span>
                                        </div>
                                        <div class="ratings-list">
                                            <div class="ratings-container">
                                                <div class="ratings-full">
                                                    <span class="ratings" style="width: 100%;"></span>
                                                    <span class="tooltiptext tooltip-top"></span>
                                                </div>
                                                <div class="progress-bar progress-bar-sm ">
                                                    <span></span>
                                                </div>
                                                <div class="progress-value">
                                                    <mark>70%</mark>
                                                </div>
                                            </div>
                                            <div class="ratings-container">
                                                <div class="ratings-full">
                                                    <span class="ratings" style="width: 80%;"></span>
                                                    <span class="tooltiptext tooltip-top"></span>
                                                </div>
                                                <div class="progress-bar progress-bar-sm ">
                                                    <span></span>
                                                </div>
                                                <div class="progress-value">
                                                    <mark>30%</mark>
                                                </div>
                                            </div>
                                            <div class="ratings-container">
                                                <div class="ratings-full">
                                                    <span class="ratings" style="width: 60%;"></span>
                                                    <span class="tooltiptext tooltip-top"></span>
                                                </div>
                                                <div class="progress-bar progress-bar-sm ">
                                                    <span></span>
                                                </div>
                                                <div class="progress-value">
                                                    <mark>40%</mark>
                                                </div>
                                            </div>
                                            <div class="ratings-container">
                                                <div class="ratings-full">
                                                    <span class="ratings" style="width: 40%;"></span>
                                                    <span class="tooltiptext tooltip-top"></span>
                                                </div>
                                                <div class="progress-bar progress-bar-sm ">
                                                    <span></span>
                                                </div>
                                                <div class="progress-value">
                                                    <mark>0%</mark>
                                                </div>
                                            </div>
                                            <div class="ratings-container">
                                                <div class="ratings-full">
                                                    <span class="ratings" style="width: 20%;"></span>
                                                    <span class="tooltiptext tooltip-top"></span>
                                                </div>
                                                <div class="progress-bar progress-bar-sm ">
                                                    <span></span>
                                                </div>
                                                <div class="progress-value">
                                                    <mark>0%</mark>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-8 col-lg-7 mb-4">
                                    <div class="review-form-wrapper">
                                        <h3 class="title tab-pane-title font-weight-bold mb-1">Submit Your Review
                                        </h3>
                                        <p class="mb-3">Your email address will not be published. Required fields
                                            are marked *</p>
                                        <form action="#" method="POST" class="review-form">
                                            <div class="rating-form">
                                                <label for="rating">Your Rating Of This Product :</label>
                                                <span class="rating-stars">
                                                    <a class="star-1" href="#">1</a>
                                                    <a class="star-2" href="#">2</a>
                                                    <a class="star-3" href="#">3</a>
                                                    <a class="star-4" href="#">4</a>
                                                    <a class="star-5" href="#">5</a>
                                                </span>
                                                <select name="rating" id="rating" required=""
                                                    style="display: none;">
                                                    <option value="">Rate…</option>
                                                    <option value="5">Perfect</option>
                                                    <option value="4">Good</option>
                                                    <option value="3">Average</option>
                                                    <option value="2">Not that bad</option>
                                                    <option value="1">Very poor</option>
                                                </select>
                                            </div>
                                            <textarea cols="30" rows="6" placeholder="Write Your Review Here..."
                                                class="form-control" id="review"></textarea>
                                            <div class="row gutter-md">
                                                <div class="col-md-6">
                                                    <input type="text" class="form-control" placeholder="Your Name"
                                                        id="author">
                                                </div>
                                                <div class="col-md-6">
                                                    <input type="text" class="form-control" placeholder="Your Email"
                                                        id="email_1">
                                                </div>
                                            </div>
                                            <div class="form-group">
                                                <input type="checkbox" class="custom-checkbox" id="save-checkbox">
                                                <label for="save-checkbox">Save my name, email, and website in this
                                                    browser for the next time I comment.</label>
                                            </div>
                                            <button type="submit" class="btn btn-dark">Submit Review</button>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <div class="tab tab-nav-boxed tab-nav-outline tab-nav-center">
                                <ul class="nav nav-tabs" role="tablist">
                                    <li class="nav-item">
                                        <a href="#show-all" class="nav-link active">Show All</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#helpful-positive" class="nav-link">Most Helpful Positive</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#helpful-negative" class="nav-link">Most Helpful Negative</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#highest-rating" class="nav-link">Highest Rating</a>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#lowest-rating" class="nav-link">Lowest Rating</a>
                                    </li>
                                </ul>
                                <div class="tab-content">
                                    <div class="tab-pane active" id="show-all">
                                        <ul class="comments list-style-none">
                                            <li class="comment">
                                                <div class="comment-body">
                                                    <figure class="comment-avatar">
                                                        <img src="{{ asset('/frontend') }}/assets/images/agents/1-100x100.png"
                                                            alt="Commenter Avatar" width="90" height="90">
                                                    </figure>
                                                    <div class="comment-content">
                                                        <h4 class="comment-author">
                                                            <a href="#">John Doe</a>
                                                            <span class="comment-date">March 22, 2021 at 1:54
                                                                pm</span>
                                                        </h4>
                                                        <div class="ratings-container comment-rating">
                                                            <div class="ratings-full">
                                                                <span class="ratings" style="width: 60%;"></span>
                                                                <span class="tooltiptext tooltip-top"></span>
                                                            </div>
                                                        </div>
                                                        <p>pellentesque habitant morbi tristique senectus et. In
                                                            dictum non consectetur a erat.
                                                            Nunc ultrices eros in cursus turpis massa tincidunt ante
                                                            in nibh mauris cursus mattis.
                                                            Cras ornare arcu dui vivamus arcu felis bibendum ut
                                                            tristique.</p>
                                                        <div class="comment-action">
                                                            <a href="#"
                                                                class="btn btn-secondary btn-link btn-underline sm btn-icon-left font-weight-normal text-capitalize">
                                                                <i class="far fa-thumbs-up"></i>Helpful (1)
                                                            </a>
                                                            <a href="#"
                                                                class="btn btn-dark btn-link btn-underline sm btn-icon-left font-weight-normal text-capitalize">
                                                                <i class="far fa-thumbs-down"></i>Unhelpful (0)
                                                            </a>
                                                            <div class="review-image">
                                                                <a href="#">
                                                                    <figure>
                                                                        <img src="{{ asset('/frontend') }}/assets/images/products/default/review-img-1.jpg"
                                                                            width="60" height="60"
                                                                            alt="Attachment image of John Doe's review on Electronics Black Wrist Watch"
                                                                            data-zoom-image="assets/images/products/default/review-img-1-800x900.jpg" />
                                                                    </figure>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="comment">
                                                <div class="comment-body">
                                                    <figure class="comment-avatar">
                                                        <img src="{{ asset('/frontend') }}/assets/images/agents/2-100x100.png"
                                                            alt="Commenter Avatar" width="90" height="90">
                                                    </figure>
                                                    <div class="comment-content">
                                                        <h4 class="comment-author">
                                                            <a href="#">John Doe</a>
                                                            <span class="comment-date">March 22, 2021 at 1:52
                                                                pm</span>
                                                        </h4>
                                                        <div class="ratings-container comment-rating">
                                                            <div class="ratings-full">
                                                                <span class="ratings" style="width: 80%;"></span>
                                                                <span class="tooltiptext tooltip-top"></span>
                                                            </div>
                                                        </div>
                                                        <p>Nullam a magna porttitor, dictum risus nec, faucibus
                                                            sapien.
                                                            Ultrices eros in cursus turpis massa tincidunt ante in
                                                            nibh mauris cursus mattis.
                                                            Cras ornare arcu dui vivamus arcu felis bibendum ut
                                                            tristique.</p>
                                                        <div class="comment-action">
                                                            <a href="#"
                                                                class="btn btn-secondary btn-link btn-underline sm btn-icon-left font-weight-normal text-capitalize">
                                                                <i class="far fa-thumbs-up"></i>Helpful (1)
                                                            </a>
                                                            <a href="#"
                                                                class="btn btn-dark btn-link btn-underline sm btn-icon-left font-weight-normal text-capitalize">
                                                                <i class="far fa-thumbs-down"></i>Unhelpful (0)
                                                            </a>
                                                            <div class="review-image">
                                                                <a href="#">
                                                                    <figure>
                                                                        <img src="{{ asset('/frontend') }}/assets/images/products/default/review-img-2.jpg"
                                                                            width="60" height="60"
                                                                            alt="Attachment image of John Doe's review on Electronics Black Wrist Watch"
                                                                            data-zoom-image="assets/images/products/default/review-img-2.jpg" />
                                                                    </figure>
                                                                </a>
                                                                <a href="#">
                                                                    <figure>
                                                                        <img src="{{ asset('/frontend') }}/assets/images/products/default/review-img-3.jpg"
                                                                            width="60" height="60"
                                                                            alt="Attachment image of John Doe's review on Electronics Black Wrist Watch"
                                                                            data-zoom-image="assets/images/products/default/review-img-3.jpg" />
                                                                    </figure>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="comment">
                                                <div class="comment-body">
                                                    <figure class="comment-avatar">
                                                        <img src="{{ asset('/frontend') }}/assets/images/agents/3-100x100.png"
                                                            alt="Commenter Avatar" width="90" height="90">
                                                    </figure>
                                                    <div class="comment-content">
                                                        <h4 class="comment-author">
                                                            <a href="#">John Doe</a>
                                                            <span class="comment-date">March 22, 2021 at 1:21
                                                                pm</span>
                                                        </h4>
                                                        <div class="ratings-container comment-rating">
                                                            <div class="ratings-full">
                                                                <span class="ratings" style="width: 60%;"></span>
                                                                <span class="tooltiptext tooltip-top"></span>
                                                            </div>
                                                        </div>
                                                        <p>In fermentum et sollicitudin ac orci phasellus. A
                                                            condimentum vitae
                                                            sapien pellentesque habitant morbi tristique senectus
                                                            et. In dictum
                                                            non consectetur a erat. Nunc scelerisque viverra mauris
                                                            in aliquam sem fringilla.</p>
                                                        <div class="comment-action">
                                                            <a href="#"
                                                                class="btn btn-secondary btn-link btn-underline sm btn-icon-left font-weight-normal text-capitalize">
                                                                <i class="far fa-thumbs-up"></i>Helpful (0)
                                                            </a>
                                                            <a href="#"
                                                                class="btn btn-dark btn-link btn-underline sm btn-icon-left font-weight-normal text-capitalize">
                                                                <i class="far fa-thumbs-down"></i>Unhelpful (1)
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="tab-pane" id="helpful-positive">
                                        <ul class="comments list-style-none">
                                            <li class="comment">
                                                <div class="comment-body">
                                                    <figure class="comment-avatar">
                                                        <img src="{{ asset('/frontend') }}/assets/images/agents/1-100x100.png"
                                                            alt="Commenter Avatar" width="90" height="90">
                                                    </figure>
                                                    <div class="comment-content">
                                                        <h4 class="comment-author">
                                                            <a href="#">John Doe</a>
                                                            <span class="comment-date">March 22, 2021 at 1:54
                                                                pm</span>
                                                        </h4>
                                                        <div class="ratings-container comment-rating">
                                                            <div class="ratings-full">
                                                                <span class="ratings" style="width: 60%;"></span>
                                                                <span class="tooltiptext tooltip-top"></span>
                                                            </div>
                                                        </div>
                                                        <p>pellentesque habitant morbi tristique senectus et. In
                                                            dictum non consectetur a erat.
                                                            Nunc ultrices eros in cursus turpis massa tincidunt ante
                                                            in nibh mauris cursus mattis.
                                                            Cras ornare arcu dui vivamus arcu felis bibendum ut
                                                            tristique.</p>
                                                        <div class="comment-action">
                                                            <a href="#"
                                                                class="btn btn-secondary btn-link btn-underline sm btn-icon-left font-weight-normal text-capitalize">
                                                                <i class="far fa-thumbs-up"></i>Helpful (1)
                                                            </a>
                                                            <a href="#"
                                                                class="btn btn-dark btn-link btn-underline sm btn-icon-left font-weight-normal text-capitalize">
                                                                <i class="far fa-thumbs-down"></i>Unhelpful (0)
                                                            </a>
                                                            <div class="review-image">
                                                                <a href="#">
                                                                    <figure>
                                                                        <img src="{{ asset('/frontend') }}/assets/images/products/default/review-img-1.jpg"
                                                                            width="60" height="60"
                                                                            alt="Attachment image of John Doe's review on Electronics Black Wrist Watch"
                                                                            data-zoom-image="assets/images/products/default/review-img-1.jpg" />
                                                                    </figure>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                            <li class="comment">
                                                <div class="comment-body">
                                                    <figure class="comment-avatar">
                                                        <img src="{{ asset('/frontend') }}/assets/images/agents/2-100x100.png"
                                                            alt="Commenter Avatar" width="90" height="90">
                                                    </figure>
                                                    <div class="comment-content">
                                                        <h4 class="comment-author">
                                                            <a href="#">John Doe</a>
                                                            <span class="comment-date">March 22, 2021 at 1:52
                                                                pm</span>
                                                        </h4>
                                                        <div class="ratings-container comment-rating">
                                                            <div class="ratings-full">
                                                                <span class="ratings" style="width: 80%;"></span>
                                                                <span class="tooltiptext tooltip-top"></span>
                                                            </div>
                                                        </div>
                                                        <p>Nullam a magna porttitor, dictum risus nec, faucibus
                                                            sapien.
                                                            Ultrices eros in cursus turpis massa tincidunt ante in
                                                            nibh mauris cursus mattis.
                                                            Cras ornare arcu dui vivamus arcu felis bibendum ut
                                                            tristique.</p>
                                                        <div class="comment-action">
                                                            <a href="#"
                                                                class="btn btn-secondary btn-link btn-underline sm btn-icon-left font-weight-normal text-capitalize">
                                                                <i class="far fa-thumbs-up"></i>Helpful (1)
                                                            </a>
                                                            <a href="#"
                                                                class="btn btn-dark btn-link btn-underline sm btn-icon-left font-weight-normal text-capitalize">
                                                                <i class="far fa-thumbs-down"></i>Unhelpful (0)
                                                            </a>
                                                            <div class="review-image">
                                                                <a href="#">
                                                                    <figure>
                                                                        <img src="{{ asset('/frontend') }}/assets/images/products/default/review-img-2.jpg"
                                                                            width="60" height="60"
                                                                            alt="Attachment image of John Doe's review on Electronics Black Wrist Watch"
                                                                            data-zoom-image="assets/images/products/default/review-img-2-800x900.jpg" />
                                                                    </figure>
                                                                </a>
                                                                <a href="#">
                                                                    <figure>
                                                                        <img src="{{ asset('/frontend') }}/assets/images/products/default/review-img-3.jpg"
                                                                            width="60" height="60"
                                                                            alt="Attachment image of John Doe's review on Electronics Black Wrist Watch"
                                                                            data-zoom-image="assets/images/products/default/review-img-3-800x900.jpg" />
                                                                    </figure>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="tab-pane" id="helpful-negative">
                                        <ul class="comments list-style-none">
                                            <li class="comment">
                                                <div class="comment-body">
                                                    <figure class="comment-avatar">
                                                        <img src="{{ asset('/frontend') }}/assets/images/agents/3-100x100.png"
                                                            alt="Commenter Avatar" width="90" height="90">
                                                    </figure>
                                                    <div class="comment-content">
                                                        <h4 class="comment-author">
                                                            <a href="#">John Doe</a>
                                                            <span class="comment-date">March 22, 2021 at 1:21
                                                                pm</span>
                                                        </h4>
                                                        <div class="ratings-container comment-rating">
                                                            <div class="ratings-full">
                                                                <span class="ratings" style="width: 60%;"></span>
                                                                <span class="tooltiptext tooltip-top"></span>
                                                            </div>
                                                        </div>
                                                        <p>In fermentum et sollicitudin ac orci phasellus. A
                                                            condimentum vitae
                                                            sapien pellentesque habitant morbi tristique senectus
                                                            et. In dictum
                                                            non consectetur a erat. Nunc scelerisque viverra mauris
                                                            in aliquam sem fringilla.</p>
                                                        <div class="comment-action">
                                                            <a href="#"
                                                                class="btn btn-secondary btn-link btn-underline sm btn-icon-left font-weight-normal text-capitalize">
                                                                <i class="far fa-thumbs-up"></i>Helpful (0)
                                                            </a>
                                                            <a href="#"
                                                                class="btn btn-dark btn-link btn-underline sm btn-icon-left font-weight-normal text-capitalize">
                                                                <i class="far fa-thumbs-down"></i>Unhelpful (1)
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="tab-pane" id="highest-rating">
                                        <ul class="comments list-style-none">
                                            <li class="comment">
                                                <div class="comment-body">
                                                    <figure class="comment-avatar">
                                                        <img src="{{ asset('/frontend') }}/assets/images/agents/2-100x100.png"
                                                            alt="Commenter Avatar" width="90" height="90">
                                                    </figure>
                                                    <div class="comment-content">
                                                        <h4 class="comment-author">
                                                            <a href="#">John Doe</a>
                                                            <span class="comment-date">March 22, 2021 at 1:52
                                                                pm</span>
                                                        </h4>
                                                        <div class="ratings-container comment-rating">
                                                            <div class="ratings-full">
                                                                <span class="ratings" style="width: 80%;"></span>
                                                                <span class="tooltiptext tooltip-top"></span>
                                                            </div>
                                                        </div>
                                                        <p>Nullam a magna porttitor, dictum risus nec, faucibus
                                                            sapien.
                                                            Ultrices eros in cursus turpis massa tincidunt ante in
                                                            nibh mauris cursus mattis.
                                                            Cras ornare arcu dui vivamus arcu felis bibendum ut
                                                            tristique.</p>
                                                        <div class="comment-action">
                                                            <a href="#"
                                                                class="btn btn-secondary btn-link btn-underline sm btn-icon-left font-weight-normal text-capitalize">
                                                                <i class="far fa-thumbs-up"></i>Helpful (1)
                                                            </a>
                                                            <a href="#"
                                                                class="btn btn-dark btn-link btn-underline sm btn-icon-left font-weight-normal text-capitalize">
                                                                <i class="far fa-thumbs-down"></i>Unhelpful (0)
                                                            </a>
                                                            <div class="review-image">
                                                                <a href="#">
                                                                    <figure>
                                                                        <img src="{{ asset('/frontend') }}/assets/images/products/default/review-img-2.jpg"
                                                                            width="60" height="60"
                                                                            alt="Attachment image of John Doe's review on Electronics Black Wrist Watch"
                                                                            data-zoom-image="assets/images/products/default/review-img-2-800x900.jpg" />
                                                                    </figure>
                                                                </a>
                                                                <a href="#">
                                                                    <figure>
                                                                        <img src="{{ asset('/frontend') }}/assets/images/products/default/review-img-3.jpg"
                                                                            width="60" height="60"
                                                                            alt="Attachment image of John Doe's review on Electronics Black Wrist Watch"
                                                                            data-zoom-image="assets/images/products/default/review-img-3-800x900.jpg" />
                                                                    </figure>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                    <div class="tab-pane" id="lowest-rating">
                                        <ul class="comments list-style-none">
                                            <li class="comment">
                                                <div class="comment-body">
                                                    <figure class="comment-avatar">
                                                        <img src="{{ asset('/frontend') }}/assets/images/agents/1-100x100.png"
                                                            alt="Commenter Avatar" width="90" height="90">
                                                    </figure>
                                                    <div class="comment-content">
                                                        <h4 class="comment-author">
                                                            <a href="#">John Doe</a>
                                                            <span class="comment-date">March 22, 2021 at 1:54
                                                                pm</span>
                                                        </h4>
                                                        <div class="ratings-container comment-rating">
                                                            <div class="ratings-full">
                                                                <span class="ratings" style="width: 60%;"></span>
                                                                <span class="tooltiptext tooltip-top"></span>
                                                            </div>
                                                        </div>
                                                        <p>pellentesque habitant morbi tristique senectus et. In
                                                            dictum non consectetur a erat.
                                                            Nunc ultrices eros in cursus turpis massa tincidunt ante
                                                            in nibh mauris cursus mattis.
                                                            Cras ornare arcu dui vivamus arcu felis bibendum ut
                                                            tristique.</p>
                                                        <div class="comment-action">
                                                            <a href="#"
                                                                class="btn btn-secondary btn-link btn-underline sm btn-icon-left font-weight-normal text-capitalize">
                                                                <i class="far fa-thumbs-up"></i>Helpful (1)
                                                            </a>
                                                            <a href="#"
                                                                class="btn btn-dark btn-link btn-underline sm btn-icon-left font-weight-normal text-capitalize">
                                                                <i class="far fa-thumbs-down"></i>Unhelpful (0)
                                                            </a>
                                                            <div class="review-image">
                                                                <a href="#">
                                                                    <figure>
                                                                        <img src="{{ asset('/frontend') }}/assets/images/products/default/review-img-3.jpg"
                                                                            width="60" height="60"
                                                                            alt="Attachment image of John Doe's review on Electronics Black Wrist Watch"
                                                                            data-zoom-image="assets/images/products/default/review-img-3-800x900.jpg" />
                                                                    </figure>
                                                                </a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <section class="related-product-section">
                    <div class="title-link-wrapper mb-4">
                        <h4 class="title">Related Products</h4>
                        <a href="#" class="btn btn-dark btn-link btn-slide-right btn-icon-right">More
                            Products<i class="w-icon-long-arrow-right"></i></a>
                    </div>
                    <div class="swiper-container swiper-theme" data-swiper-options="{
                        'spaceBetween': 20,
                        'slidesPerView': 2,
                        'breakpoints': {
                            '576': {
                                'slidesPerView': 3
                            },
                            '768': {
                                'slidesPerView': 4
                            },
                            '992': {
                                'slidesPerView': 4
                            }
                        }
                    }">
                        <div class="swiper-wrapper row cols-lg-3 cols-md-4 cols-sm-3 cols-2">
                            @foreach ($rellateds as $product)
                                <div class="swiper-slide product">
                                    <figure class="product-media">
                                        <a href="{{ route('frontend.singleproduct',$product->id) }}">
                                            <img src="{{ asset($product->image) }}" alt="Product"
                                                width="300" height="338" />
                                        </a>
                                        <div class="product-action-vertical">
                                            <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                                                title="Add to cart"></a>
                                            <a href="#" class="btn-product-icon btn-wishlist w-icon-heart"
                                                title="Add to wishlist"></a>
                                        </div>
                                        <div class="product-action">
                                            <a href="#" class="btn-product btn-quickview" title="Quick View">Quick
                                                View</a>
                                        </div>
                                    </figure>
                                    <div class="product-details">
                                        <h4 class="product-name"><a href="{{ route('frontend.singleproduct',$product->id) }}"> {{ $product->title }} </a></h4>
                                        <div class="ratings-container">
                                            <div class="ratings-full">
                                                <span class="ratings" style="width: 100%;"></span>
                                                <span class="tooltiptext tooltip-top"></span>
                                            </div>
                                            <a href="product-default.html" class="rating-reviews">(3 reviews)</a>
                                        </div>
                                        <div class="product-price">
                                            <ins class="new-price">৳{{ $product->sale_price }}</ins><del class="old-price">৳{{ $product->price }}</del>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </section>
            </div>
        </div>
        <!-- End of Page Content -->
    </main>
    <!-- End of Main -->
@endsection
