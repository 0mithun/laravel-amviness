@extends('frontend.master')

@section('frontend_css')
    
@endsection

@section('frontend_content')

<main class="main">
    <!-- Start of Breadcrumb -->
    <nav class="breadcrumb-nav">
        <div class="container">
            <ul class="breadcrumb bb-no">
                <li><a href=" {{ route('frontend.home') }} ">Home</a></li>
                <li><a href=" {{ route('frontend.shop') }} ">Shop</a></li>
                <li>8 Columns</li>
            </ul>
        </div>
    </nav>
    <!-- End of Breadcrumb -->

    <!-- Start of Page Content -->
    <div class="page-content mb-10">
        <div class="shop-default-banner shop-boxed-banner banner d-flex align-items-center mb-6" style="background-image: url(assets/images/shop/banner2.jpg); background-color: #FFC74E;">
            <div class="container banner-content">
                <h4 class="banner-subtitle font-weight-bold">Accessories Collection</h4>
                <h3 class="banner-title text-white text-uppercase font-weight-bolder ls-10">Smart Watches</h3>
                <a href="shop-banner-sidebar.html" class="btn btn-dark btn-rounded btn-icon-right">Discover
                    Now<i class="w-icon-long-arrow-right"></i></a>
            </div>
        </div>
        <!-- End of Shop Banner -->
        <div class="container-fluid">
    <!-- Start of Shop Content -->
    <div class="shop-content">
        <!-- Start of Shop Main Content -->
        <div class="main-content">
            <nav class="toolbox sticky-toolbox sticky-content fix-top">
                <div class="toolbox-left">
                    <a href="#" class="btn btn-primary btn-outline btn-rounded left-sidebar-toggle 
                        btn-icon-left"><i class="w-icon-category"></i><span>Filters</span></a>
                    <div class="toolbox-item toolbox-sort select-box text-dark">
                        <label>Sort By :</label>
                        <select name="orderby" class="form-control">
                            <option value="default" selected="selected">Default sorting</option>
                            <option value="popularity">Sort by popularity</option>
                            <option value="rating">Sort by average rating</option>
                            <option value="date">Sort by latest</option>
                            <option value="price-low">Sort by pric: low to high</option>
                            <option value="price-high">Sort by price: high to low</option>
                        </select>
                    </div>
                </div>
                <div class="toolbox-right">
                    <div class="toolbox-item toolbox-show select-box">
                        <select name="count" class="form-control">
                            <option value="9">Show 9</option>
                            <option value="12" selected="selected">Show 12</option>
                            <option value="24">Show 24</option>
                            <option value="36">Show 36</option>
                        </select>
                    </div>
                    <div class="toolbox-item toolbox-layout">
                        <a href=" {{ route('frontend.shop') }} " class="icon-mode-grid btn-layout">
                            <i class="w-icon-grid"></i>
                        </a>
                        <a href=" {{ route('frontend.shop.grid') }} " class="icon-mode-list btn-layout active">
                            <i class="w-icon-list"></i>
                        </a>
                    </div>
                </div>
            </nav>
            <div class="product-wrapper row cols-xl-8 cols-lg-6 cols-md-4 cols-sm-3 cols-2">
                @foreach ($products as $product)
                <div class="product-wrap">
                    @php
                        $exist = checkWishlisted($product->id);
                    @endphp
                    <div class="product text-center">
                        <figure class="product-media">
                            <a href="{{ route('frontend.singleproduct',$product->id) }}">
                                <img src="{{ asset($product->image) }}" alt="Product" width="300" height="338">
                            </a>
                            <div class="product-action-horizontal">
                                <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                                    title="Add to cart"></a>
                                <form action="{{ route('frontend.wishlist.customer') }}" method="POST">
                                    @csrf

                                    @if (auth('customer')->check())
                                        <input type="hidden" name="product_id" value="{{ $product->id }}">
                                        <input type="hidden" name="user_id" value="{{ auth('customer')->user()->id }}">
                                    @endif
                                    <button class="btn--fav" type="submit">
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
                                <a href="#" class="btn-product-icon btn-quickview w-icon-search"
                                    title="Quick View"></a>
                            </div>
                        </figure>
                        <div class="product-details">
                            <div class="product-cat">
                                <a href="shop-banner-sidebar.html"> {{ $product->category->name }} </a>
                            </div>
                            <h3 class="product-name">
                                <a href="{{ route('frontend.singleproduct',$product->id) }}">{{ $product->title }}</a>
                            </h3>
                            <div class="ratings-container">
                                <div class="ratings-full">
                                    <span class="ratings" style="width: 100%;"></span>
                                    <span class="tooltiptext tooltip-top"></span>
                                </div>
                                <a href="#" class="rating-reviews">(3 reviews)</a>
                            </div>
                            <div class="product-pa-wrapper">
                                <div class="product-price">
                                    <ins class="new-price">৳{{ $product->sale_price }}</ins><del class="old-price">৳{{ $product->price }}</del>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="row mt-5">
                <div class="col-5"></div>
                <div class="col-4"> {{ $products->links() }} </div>
                <div class="col-3"></div>
            </div>

            {{-- <div class="toolbox toolbox-pagination justify-content-between">
                <p class="showing-info mb-2 mb-sm-0">
                    Showing<span>1-16 of 60</span>Products
                </p>
                <ul class="pagination">
                    <li class="prev disabled">
                        <a href="#" aria-label="Previous" tabindex="-1" aria-disabled="true">
                            <i class="w-icon-long-arrow-left"></i>Prev
                        </a>
                    </li>
                    <li class="page-item active">
                        <a class="page-link" href="#">1</a>
                    </li>
                    <li class="page-item">
                        <a class="page-link" href="#">2</a>
                    </li>
                    <li class="next">
                        <a href="#" aria-label="Next">
                            Next<i class="w-icon-long-arrow-right"></i>
                        </a>
                    </li>
                </ul>
            </div> --}}
        </div>
        <!-- End of Shop Main Content -->

        <!-- Start of Sidebar, Shop Sidebar -->
        <aside class="sidebar shop-sidebar left-sidebar sticky-sidebar-wrapper">
            <!-- Start of Sidebar Overlay -->
            <div class="sidebar-overlay"></div>
            <a class="sidebar-close" href="#"><i class="close-icon"></i></a>


            <!-- Start of Sidebar Content -->
            <div class="sidebar-content scrollable">
                <div class="filter-actions">
                    <label>Filter :</label>
                    <a href="#" class="btn btn-dark btn-link filter-clean">Clean All</a>
                </div>
                <!-- Start of Collapsible widget -->
                <div class="widget widget-collapsible">
                    <h3 class="widget-title"><span>All Categories</span><span class="toggle-btn"></span></h3>
                    <ul class="widget-body filter-items search-ul">
                        <li><a href="#">Accessories</a></li>
                        <li><a href="#">Babies</a></li>
                        <li><a href="#">Beauty</a></li>
                        <li><a href="#">Decoration</a></li>
                        <li><a href="#">Electronics</a></li>
                        <li><a href="#">Fashion</a></li>
                        <li><a href="#">Food</a></li>
                        <li><a href="#">Furniture</a></li>
                        <li><a href="#">Kitchen</a></li>
                        <li><a href="#">Medical</a></li>
                        <li><a href="#">Sports</a></li>
                        <li><a href="#">Watches</a></li>
                    </ul>
                </div>
                <!-- End of Collapsible Widget -->

                <!-- Start of Collapsible Widget -->
                <div class="widget widget-collapsible">
                    <h3 class="widget-title"><span>Price</span><span class="toggle-btn"></span></h3>
                    <div class="widget-body">
                        <ul class="filter-items search-ul">
                            <li><a href="#">$0.00 - $100.00</a></li>
                            <li><a href="#">$100.00 - $200.00</a></li>
                            <li><a href="#">$200.00 - $300.00</a></li>
                            <li><a href="#">$300.00 - $500.00</a></li>
                            <li><a href="#">$500.00+</a></li>
                        </ul>
                        <form class="price-range">
                            <input type="number" name="min_price" class="min_price text-center" placeholder="$min"><span class="delimiter">-</span><input type="number" name="max_price" class="max_price text-center" placeholder="$max"><a href="#" class="btn btn-primary btn-rounded">Go</a>
                        </form>
                    </div>
                </div>
                <!-- End of Collapsible Widget -->

                <!-- Start of Collapsible Widget -->
                <div class="widget widget-collapsible">
                    <h3 class="widget-title"><span>Size</span><span class="toggle-btn"></span></h3>
                    <ul class="widget-body filter-items item-check mt-1">
                        <li><a href="#">Extra Large</a></li>
                        <li><a href="#">Large</a></li>
                        <li><a href="#">Medium</a></li>
                        <li><a href="#">Small</a></li>
                    </ul>
                </div>
                <!-- End of Collapsible Widget -->

                <!-- Start of Collapsible Widget -->
                <div class="widget widget-collapsible">
                    <h3 class="widget-title"><span>Brand</span><span class="toggle-btn"></span></h3>
                    <ul class="widget-body filter-items item-check mt-1">
                        <li><a href="#">Elegant Auto Group</a></li>
                        <li><a href="#">Green Grass</a></li>
                        <li><a href="#">Node Js</a></li>
                        <li><a href="#">NS8</a></li>
                        <li><a href="#">Red</a></li>
                        <li><a href="#">Skysuite Tech</a></li>
                        <li><a href="#">Sterling</a></li>
                    </ul>
                </div>
                <!-- End of Collapsible Widget -->

                <!-- Start of Collapsible Widget -->
                <div class="widget widget-collapsible">
                    <h3 class="widget-title"><span>Color</span><span class="toggle-btn"></span></h3>
                    <ul class="widget-body filter-items item-check">
                        <li><a href="#">Black</a></li>
                        <li><a href="#">Blue</a></li>
                        <li><a href="#">Brown</a></li>
                        <li><a href="#">Green</a></li>
                        <li><a href="#">Grey</a></li>
                        <li><a href="#">Orange</a></li>
                        <li><a href="#">Yellow</a></li>
                    </ul>
                </div>
                <!-- End of Collapsible Widget -->
            </div>
            <!-- End of Sidebar Content -->
        </aside>
        <!-- End of Shop Sidebar -->
    </div>
    <!-- End of Shop Content -->
</div>
    </div>
    <!-- End of Page Content -->
</main>

@endsection



@section('frontend_js')
    
@endsection
