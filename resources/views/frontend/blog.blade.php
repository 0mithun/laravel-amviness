@extends('frontend.master')

@section('frontend_content')
<main class="main">
    <!-- Start of Page Header -->
    <div class="page-header">
        <div class="container">
            <h1 class="page-title mb-0">Articles</h1>
        </div>
    </div>
    <!-- End of Page Header -->

    <!-- Start of Breadcrumb -->
    <nav class="breadcrumb-nav mb-6">
        <div class="container">
            <ul class="breadcrumb">
                <li><a href=" {{ route('frontend.home') }} ">Home</a></li>
                <li><a href=" {{ route('frontend.blog') }} ">Blog</a></li>
                <li>Articles</li>
            </ul>
        </div>
    </nav>
    <!-- End of Breadcrumb -->

    <!-- Start of Page Content -->
    <div class="page-content mb-10 pb-2">
        <div class="container">
            <div class="row gutter-lg">
                <div class="main-content">
                    @foreach ($blogs as $key => $blog)
                        
                    
                    <article class="post post-list post-listing mb-md-10 mb-6 pb-2 overlay-zoom mb-4">
                        <figure class="post-media br-sm">
                            <a href=" {{ route('frontend.singleblog',$blog->id) }} ">
                                <img src=" {{ asset($blog->image) }} " width="930" height="400" alt="blog">
                            </a>
                        </figure>
                        <div class="post-details">
                            <div class="post-cats text-primary">
                                <a href="#"> {{ $blog->category->name }} </a>
                            </div>
                            <h4 class="post-title">
                                <a href="{{ route('frontend.singleblog',$blog->id) }}"> {{ $blog->title }} </a>
                            </h4>
                            <div class="post-content">
                                <p> {{ Str::limit($blog->description, 100) }} </p>
                                <br>
                                <a href="{{ route('frontend.singleblog',$blog->id) }}" class="btn btn-link btn-primary">(read more)</a>
                            </div>
                            <div class="post-meta">
                                by <a href="#" class="post-author"> Admin </a>
                                - <a href="#" class="post-date"> {{ $blog->created_at->format('d-m-Y') }} </a>
                            </div>
                        </div>
                    </article>
                    @endforeach
                    {{ $blogs->links() }}
                </div>
                <!-- End of Main Content -->
                <aside class="sidebar right-sidebar blog-sidebar sidebar-fixed sticky-sidebar-wrapper">
                    <div class="sidebar-overlay">
                        <a href="#" class="sidebar-close">
                            <i class="close-icon"></i>
                        </a>
                    </div>
                    <a href="#" class="sidebar-toggle">
                        <i class="fas fa-chevron-left"></i>
                    </a>
                    <div class="sidebar-content">
                        <div class="pin-wrapper" style="height: 1507.42px;"><div class="sticky-sidebar" style="border-bottom: 0px none rgb(102, 102, 102); width: 280px;">
                            <div class="widget widget-search-form">
                                <div class="widget-body">
                                    <form action="{{ route('frontend.blog') }}" method="GET" class="input-wrapper input-wrapper-inline">
                                        <input type="text" name="search" id="search"
                                         class="form-control" placeholder="Search in Blog" autocomplete="off" required="">
                                        <button class="btn btn-search"><i class="w-icon-search"></i></button>
                                    </form>
                                </div>
                            </div>
                            <!-- End of Widget search form -->
                            <div class="widget widget-categories">
                                <h3 class="widget-title bb-no mb-0">Categories</h3>
                                <ul class="widget-body filter-items search-ul">
                                    @foreach ($categories as $category)
                                        <li><a href="{{ route('frontend.post.category',$category->id) }}"> {{ $category->name }} </a></li>
                                    @endforeach
                                </ul>
                            </div>
                            <!-- End of Widget categories -->
                            <div class="widget widget-posts">
                                <h3 class="widget-title bb-no">Latest Posts</h3>
                                <div class="widget-body">
                                    <div class="swiper">
                                        <div class="swiper-container swiper-theme nav-top swiper-container-initialized swiper-container-horizontal swiper-container-pointer-events" data-swiper-options="{
                                            'spaceBetween': 20,
                                            'slidesPerView': 1
                                        }">
                                            <div class="swiper-wrapper " id="swiper-wrapper-ab9e28b1da107e7e5" aria-live="polite" style="transform: translate3d(0px, 0px, 0px);">
                                                <div class="swiper-slide widget-col swiper-slide-active" role="group" aria-label="1 / 2" style="width: 280px; margin-right: 20px;">
                                                    @foreach ($blogs as $blog)
                                                        @if ($blog->id%2==0)
                                                            <div class="post-widget mb-4">
                                                                <figure class="post-media br-sm">
                                                                    <img src=" {{ asset($blog->image) }} " alt="150" height="150">
                                                                </figure>
                                                                <div class="post-details">
                                                                    <div class="post-meta">
                                                                        <a href=" {{ route('frontend.singleblog',$blog->id) }} " class="post-date"> {{ $blog->created_at->format('M d,Y') }} </a>
                                                                    </div>
                                                                    <h4 class="post-title">
                                                                        <a href="{{ route('frontend.singleblog',$blog->id) }}">{{ $blog->title }}</a>
                                                                    </h4>
                                                                </div>
                                                            </div>
                                                        @endif
                                                    @endforeach
                                                </div>
                                                <div class="swiper-slide widget-col swiper-slide-next" role="group" aria-label="2 / 2" style="width: 280px; margin-right: 20px;">
                                                    @foreach ($blogs as $blog)
                                                        @if ($blog->id%2==1)
                                                            <div class="post-widget mb-4">
                                                                <figure class="post-media br-sm">
                                                                    <img src=" {{ asset($blog->image) }} " alt="150" height="150">
                                                                </figure>
                                                                <div class="post-details">
                                                                    <div class="post-meta">
                                                                        <a href="#" class="post-date"> {{ $blog->created_at->format('M d,Y') }} </a>
                                                                    </div>
                                                                    <h4 class="post-title">
                                                                        <a href="post-single.html">Fashion tells about who you are from external point</a>
                                                                    </h4>
                                                                </div>
                                                            </div>
                                                        @endif
                                                    @endforeach
                                                </div>
                                            </div>
                                            <div class="swiper-button-next" tabindex="0" role="button" aria-label="Next slide" aria-controls="swiper-wrapper-ab9e28b1da107e7e5" aria-disabled="false"></div>
                                            <div class="swiper-button-prev swiper-button-disabled" tabindex="-1" role="button" aria-label="Previous slide" aria-controls="swiper-wrapper-ab9e28b1da107e7e5" aria-disabled="true"></div>
                                        <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span></div>
                                    </div>
                                </div>
                            </div>
                            <!-- End of Widget posts -->
                            <div class="widget widget-custom-block">
                                <h3 class="widget-title bb-no">Custom Block</h3>
                                <div class="widget-body">
                                    <p class="text-default mb-0">Fringilla urna porttitor rhoncus dolor purus.
                                        Luctus veneneratis lectus magna fring.
                                        Suspendisse potenti. Sed egestas, ante et 
                                        vulputate volutpat, uctus metus libero.</p>
                                </div>
                            </div>
                            <!-- End of Widget custom block -->
                            <div class="widget widget-tags">
                                <h3 class="widget-title bb-no">Browse Tags</h3>
                                <div class="widget-body tags">
                                    <a href="#" class="tag">Fashion</a>
                                    <a href="#" class="tag">Style</a>
                                    <a href="#" class="tag">Travel</a>
                                    <a href="#" class="tag">Women</a>
                                    <a href="#" class="tag">Men</a>
                                    <a href="#" class="tag">Hobbies</a>
                                    <a href="#" class="tag">Shopping</a>
                                    <a href="#" class="tag">Photography</a>
                                </div>
                            </div>
                            <div class="widget widget-calendar">
                                <h3 class="widget-title bb-no">Calendar</h3>
                                {{-- <div class="widget-body">
                                    <div class="calendar-container" data-calendar-options="{
                                        'dayExcerpt': 1
                                    }"><div class="calendar"><div class="calendar-header"><a href="#" class="btn-calendar btn-calendar-prev"><i class="la la-angle-left"></i></a><span class="calendar-title">February 2022</span><a href="#" class="btn-calendar btn-calendar-next"><i class="la la-angle-right"></i></a></div><table><thead><th class="holiday">s</th><th>m</th><th>t</th><th>w</th><th>t</th><th>f</th><th>s</th></thead><tbody><tr><td><span class="day disabled" data-date="2022-01-29T18:00:00.000Z">30</span></td><td><span class="day disabled" data-date="2022-01-30T18:00:00.000Z">31</span></td><td><span class="day" data-date="2022-01-31T18:00:00.000Z">1</span></td><td><span class="day" data-date="2022-02-01T18:00:00.000Z">2</span></td><td><span class="day" data-date="2022-02-02T18:00:00.000Z">3</span></td><td><span class="day" data-date="2022-02-03T18:00:00.000Z">4</span></td><td><span class="day" data-date="2022-02-04T18:00:00.000Z">5</span></td></tr><tr><td><span class="day" data-date="2022-02-05T18:00:00.000Z">6</span></td><td><span class="day" data-date="2022-02-06T18:00:00.000Z">7</span></td><td><span class="day" data-date="2022-02-07T18:00:00.000Z">8</span></td><td><span class="day" data-date="2022-02-08T18:00:00.000Z">9</span></td><td><span class="day" data-date="2022-02-09T18:00:00.000Z">10</span></td><td><span class="day" data-date="2022-02-10T18:00:00.000Z">11</span></td><td><span class="day" data-date="2022-02-11T18:00:00.000Z">12</span></td></tr><tr><td><span class="day" data-date="2022-02-12T18:00:00.000Z">13</span></td><td><span class="day" data-date="2022-02-13T18:00:00.000Z">14</span></td><td><span class="day" data-date="2022-02-14T18:00:00.000Z">15</span></td><td><span class="day" data-date="2022-02-15T18:00:00.000Z">16</span></td><td><span class="day" data-date="2022-02-16T18:00:00.000Z">17</span></td><td><span class="day" data-date="2022-02-17T18:00:00.000Z">18</span></td><td><span class="day today" data-date="2022-02-18T18:00:00.000Z">19</span></td></tr><tr><td><span class="day" data-date="2022-02-19T18:00:00.000Z">20</span></td><td><span class="day" data-date="2022-02-20T18:00:00.000Z">21</span></td><td><span class="day" data-date="2022-02-21T18:00:00.000Z">22</span></td><td><span class="day" data-date="2022-02-22T18:00:00.000Z">23</span></td><td><span class="day" data-date="2022-02-23T18:00:00.000Z">24</span></td><td><span class="day" data-date="2022-02-24T18:00:00.000Z">25</span></td><td><span class="day" data-date="2022-02-25T18:00:00.000Z">26</span></td></tr><tr><td><span class="day" data-date="2022-02-26T18:00:00.000Z">27</span></td><td><span class="day" data-date="2022-02-27T18:00:00.000Z">28</span></td><td><span class="day disabled" data-date="2022-02-28T18:00:00.000Z">1</span></td><td><span class="day disabled" data-date="2022-03-01T18:00:00.000Z">2</span></td><td><span class="day disabled" data-date="2022-03-02T18:00:00.000Z">3</span></td><td><span class="day disabled" data-date="2022-03-03T18:00:00.000Z">4</span></td><td><span class="day disabled" data-date="2022-03-04T18:00:00.000Z">5</span></td></tr></tbody></table></div></div>
                                </div> --}}
                            </div>
                        </div></div>
                    </div>
                </aside>
            </div>
        </div>
    </div>
    <!-- End of Page Content -->
</main>
@endsection
