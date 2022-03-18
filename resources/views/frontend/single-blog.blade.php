@extends('frontend.master')


@section('frontend_content')

<main class="main">
    <!-- Start of Page Header -->
    <div class="page-header">
        <div class="container">
            <h1 class="page-title mb-0">Blog Single</h1>
        </div>
    </div>
    <!-- End of Page Header -->

    <!-- Start of Breadcrumb -->
    <nav class="breadcrumb-nav">
        <div class="container">
            <ul class="breadcrumb bb-no">
                <li><a href=" {{ route('home') }} ">Home</a></li>
                <li><a href=" {{ route('frontend.blog') }} ">Blog</a></li>
                <li>Blog Single</li>
            </ul>
        </div>
    </nav>
    <!-- End of Breadcrumb -->

    <!-- Start of Page Content -->
    <div class="page-content mb-8">
        <div class="container">
            <div class="row gutter-lg">
                <div class="main-content post-single-content">
                    <div class="post post-grid post-single">
                        <figure class="post-media br-sm">
                            <img src="{{ asset($post->image) }}" alt="Blog" width="930" height="500">
                        </figure>
                        <div class="post-details">
                            <div class="post-meta">
                                by <a href="#" class="post-author">AdminAutomatic Route Discovery in Laravel
                                </a>
                                - <a href="#" class="post-date">03.01.2021</a>
                                <a href="#" class="post-comment"><i class="w-icon-comments"></i><span>0</span>Comments</a>
                            </div>
                            <h2 class="post-title"><a href="#">Fashion tells about who you are from external point</a></h2>
                            <div class="post-content">
                                <p>{{ $post->description }} </p>
                            </div>
                        </div>
                    </div>
                    <!-- End Post -->
                    <blockquote class="text-center mb-8">
                        <i class="fas fa-quote-left"></i>
                        <p class="font-weight-bold text-dark mt-1 mb-2"> {{ $post->short_description }} </p>
                    </blockquote>
                    <div class="tags">
                        <label class="text-dark mr-2">Tags:</label>
                        <a href="#" class="tag">Fashion</a>
                        <a href="#" class="tag">Style</a>
                        <a href="#" class="tag">Travel</a>
                        <a href="#" class="tag">Women</a>
                    </div>
                    <!-- End Tag -->
                    <div class="social-links mb-10">
                        <div class="social-icons social-no-color border-thin">
                            <a href="{{ socialMediaShareLinks('/frontend/single-blog/', $post->id)['facebook'] }}" class="social-icon social-facebook w-icon-facebook"></a>
                            <a href="{{ socialMediaShareLinks('/frontend/single-blog/', $post->id)['twitter'] }}" class="social-icon social-twitter w-icon-twitter"></a>
                            <a href="#" class="social-icon social-pinterest w-icon-pinterest"></a>
                            <a href="#" class="social-icon social-instagram w-icon-instagram"></a>
                            <a href="#" class="social-icon social-youtube w-icon-youtube"></a>
                        </div>
                    </div>
                    <!-- End Post Author Detail -->
                    {{-- <div class="post-navigation">
                        <div class="nav nav-prev">
                            <a href="#" class="align-items-start text-left">
                                <span><i class="w-icon-long-arrow-left"></i>previous post</span>
                                <span class="nav-content mb-0 text-normal">Vivamus vestibulum ntulla nec ante</span>
                            </a>
                        </div>
                        <div class="nav nav-next">
                            <a href="#" class="align-items-end text-right">
                                <span>next post<i class="w-icon-long-arrow-right"></i></span>
                                <span class="nav-content mb-0 text-normal">Fusce lacinia arcuet nulla</span>
                            </a>
                        </div>
                    </div> --}}
                    <!-- End Post Navigation -->
                    <h4 class="title title-lg font-weight-bold mt-10 pt-1 mb-5">Related Posts</h4>
                    <div class="swiper">
                        <div class="post-slider swiper-container swiper-theme nav-top pb-2 swiper-container-initialized swiper-container-horizontal swiper-container-pointer-events" data-swiper-options="{
                            'spaceBetween': 20,
                            'slidesPerView': 1,
                            'breakpoints': {
                                '576': {
                                    'slidesPerView': 2
                                },
                                '768': {
                                    'slidesPerView': 3
                                },
                                '992': {
                                    'slidesPerView': 2
                                },
                                '1200': {
                                    'slidesPerView': 3
                                }
                            }
                        }">
                            <div class="swiper-wrapper " id="swiper-wrapper-57f773d93862b834" aria-live="polite" style="transform: translate3d(0px, 0px, 0px);">
                                @foreach ($rellateds as $list)
                                    <div class="swiper-slide post post-grid" role="group" aria-label="4 / 4" style="width: 296.667px; margin-right: 20px;">
                                        <figure class="post-media br-sm">
                                            <a href=" {{ route('frontend.singleblog',$list->id) }} ">
                                                <img src="{{ asset($list->image) }}" alt="Post" width="296" height="190" style="background-color: #AFAFAF;">
                                            </a>
                                        </figure>
                                        <div class="post-details text-center">
                                            <div class="post-meta">
                                                by <a href="#" class="post-author">Admin</a>
                                                - <a href="#" class="post-date"> {{ $list->created_at->format('d-M-Y') }}  </a>
                                            </div>
                                            <h4 class="post-title mb-3"><a href="post-single.html"> {{ $list->title }} </a></h4>
                                            <a href="post-single.html" class="btn btn-link btn-dark btn-underline font-weight-normal">Read More<i class="w-icon-long-arrow-right"></i></a>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <button class="swiper-button-next" tabindex="0" aria-label="Next slide" aria-controls="swiper-wrapper-57f773d93862b834" aria-disabled="false"></button>
                            <button class="swiper-button-prev swiper-button-disabled" disabled="" tabindex="-1" aria-label="Previous slide" aria-controls="swiper-wrapper-57f773d93862b834" aria-disabled="true"></button>
                        <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span></div>
                    </div>
                    <!-- End Related Posts -->

                    <h4 class="title title-lg font-weight-bold pt-1 mt-10">3 Comments</h4>
                    <ul class="comments list-style-none pl-0">
                        <li class="comment">
                            <div class="comment-body">
                                <figure class="comment-avatar">
                                    <img src="{{ asset('frontend') }}/assets/images/blog/single/1.png" alt="Avatar" width="90" height="90">
                                </figure>
                                <div class="comment-content">
                                    <h4 class="comment-author font-weight-bold">
                                        <a href="#">John Doe</a>
                                        <span class="comment-date">Aug 23, 2021 at 10:46 am</span>
                                    </h4>
                                    <p>Vestibulum volutpat, lacus a ultrices sagittis, mi neque euismod dui, eu pulvinar nunc sapien ornare nisl.arcu fer
                                        ment umet, dapibus sed, urna.</p>
                                </div>
                            </div>
                        </li>
                    </ul>
                    <!-- End Comments -->
                    <form class="reply-section pb-4">
                        <h4 class="title title-md font-weight-bold pt-1 mt-10 mb-0">Leave a Reply</h4>
                        <p>Your email address will not be published. Required fields are marked</p>
                        <div class="row">
                            <div class="col-sm-6 mb-4">
                                <input type="text" class="form-control" placeholder="Enter Your Name" id="name">
                            </div>
                            <div class="col-sm-6 mb-4">
                                <input type="text" class="form-control" placeholder="Enter Your Email" id="email_1">
                            </div>
                        </div>
                        <textarea cols="30" rows="6" placeholder="Write a Comment" class="form-control mb-4" id="comment"></textarea>
                        <button class="btn btn-dark btn-rounded btn-icon-right btn-comment">Post Comment<i class="w-icon-long-arrow-right"></i></button>
                    </form>
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
                                    <form action="#" method="GET" class="input-wrapper input-wrapper-inline">
                                        <input type="text" class="form-control" placeholder="Search in Blog" autocomplete="off" required="">
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
                                                                <a href="{{ route('frontend.singleblog',$blog->id) }}"><img src=" {{ asset($blog->image) }} " alt="150" height="150"></a>
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
                                                            <a href="{{ route('frontend.singleblog',$blog->id) }}">
                                                                <figure class="post-media br-sm">
                                                                    <img src=" {{ asset($blog->image) }} " alt="150" height="150">
                                                                </figure>
                                                            </a>
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
                                            <button class="swiper-button-next" tabindex="0" aria-label="Next slide" aria-controls="swiper-wrapper-c82b0bfdec15ea18" aria-disabled="false"></button>
                                            <button class="swiper-button-prev swiper-button-disabled" disabled="" tabindex="-1" aria-label="Previous slide" aria-controls="swiper-wrapper-c82b0bfdec15ea18" aria-disabled="true"></button>
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
                                <div class="widget-body">
                                    <div class="calendar-container" data-calendar-options="{
                                        'dayExcerpt': 1
                                    }"><div class="calendar"><div class="calendar-header"><a href="#" class="btn-calendar btn-calendar-prev"><i class="la la-angle-left"></i></a><span class="calendar-title">February 2022</span><a href="#" class="btn-calendar btn-calendar-next"><i class="la la-angle-right"></i></a></div><table><thead><th class="holiday">s</th><th>m</th><th>t</th><th>w</th><th>t</th><th>f</th><th>s</th></thead><tbody><tr><td><span class="day disabled" data-date="2022-01-29T18:00:00.000Z">30</span></td><td><span class="day disabled" data-date="2022-01-30T18:00:00.000Z">31</span></td><td><span class="day" data-date="2022-01-31T18:00:00.000Z">1</span></td><td><span class="day" data-date="2022-02-01T18:00:00.000Z">2</span></td><td><span class="day" data-date="2022-02-02T18:00:00.000Z">3</span></td><td><span class="day" data-date="2022-02-03T18:00:00.000Z">4</span></td><td><span class="day" data-date="2022-02-04T18:00:00.000Z">5</span></td></tr><tr><td><span class="day" data-date="2022-02-05T18:00:00.000Z">6</span></td><td><span class="day" data-date="2022-02-06T18:00:00.000Z">7</span></td><td><span class="day" data-date="2022-02-07T18:00:00.000Z">8</span></td><td><span class="day" data-date="2022-02-08T18:00:00.000Z">9</span></td><td><span class="day" data-date="2022-02-09T18:00:00.000Z">10</span></td><td><span class="day" data-date="2022-02-10T18:00:00.000Z">11</span></td><td><span class="day" data-date="2022-02-11T18:00:00.000Z">12</span></td></tr><tr><td><span class="day" data-date="2022-02-12T18:00:00.000Z">13</span></td><td><span class="day" data-date="2022-02-13T18:00:00.000Z">14</span></td><td><span class="day" data-date="2022-02-14T18:00:00.000Z">15</span></td><td><span class="day" data-date="2022-02-15T18:00:00.000Z">16</span></td><td><span class="day" data-date="2022-02-16T18:00:00.000Z">17</span></td><td><span class="day" data-date="2022-02-17T18:00:00.000Z">18</span></td><td><span class="day today" data-date="2022-02-18T18:00:00.000Z">19</span></td></tr><tr><td><span class="day" data-date="2022-02-19T18:00:00.000Z">20</span></td><td><span class="day" data-date="2022-02-20T18:00:00.000Z">21</span></td><td><span class="day" data-date="2022-02-21T18:00:00.000Z">22</span></td><td><span class="day" data-date="2022-02-22T18:00:00.000Z">23</span></td><td><span class="day" data-date="2022-02-23T18:00:00.000Z">24</span></td><td><span class="day" data-date="2022-02-24T18:00:00.000Z">25</span></td><td><span class="day" data-date="2022-02-25T18:00:00.000Z">26</span></td></tr><tr><td><span class="day" data-date="2022-02-26T18:00:00.000Z">27</span></td><td><span class="day" data-date="2022-02-27T18:00:00.000Z">28</span></td><td><span class="day disabled" data-date="2022-02-28T18:00:00.000Z">1</span></td><td><span class="day disabled" data-date="2022-03-01T18:00:00.000Z">2</span></td><td><span class="day disabled" data-date="2022-03-02T18:00:00.000Z">3</span></td><td><span class="day disabled" data-date="2022-03-03T18:00:00.000Z">4</span></td><td><span class="day disabled" data-date="2022-03-04T18:00:00.000Z">5</span></td></tr></tbody></table></div></div>
                                </div>
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

