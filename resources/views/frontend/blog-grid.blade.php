@extends('frontend.master')

@section('frontend_content')
<main class="main">
    <!-- Start of Page Header -->
    <div class="page-header">
        <div class="container">
            <h1 class="page-title mb-0">Blog Grid</h1>
        </div>
    </div>
    <!-- End of Page Header -->

    <!-- Start of Breadcrumb -->
    <nav class="breadcrumb-nav mb-6">
        <div class="container">
            <ul class="breadcrumb">
                <li><a href="{{ route('home') }}">Home</a></li>
                <li><a href="{{ route('frontend.blog') }}">Blog</a></li>
                <li>Blog Grid</li>
            </ul>
        </div>
    </nav>
    <!-- End of Breadcrumb -->

    <!-- Start of Page Content -->
    <div class="page-content">
        <div class="container">
            <ul class="nav-filters filter-underline blog-filters mb-4">
                @foreach ($categories as $category)
                    <li><a href="{{ route('frontend.post.category',$category->id) }}" class="nav-filter"> {{ $category->name }}</a></li>
                @endforeach
            </ul>

            <div class="row">
                @foreach ($blogs as $blog)


                <div class="col-4">

                    <article class="post post-grid-type grid-item overlay-zoom fashion" style="">
                        <figure class="post-media br-sm">
                            <a href="post-single.html">
                                <img src="{{ asset($blog->image) }}" width="600" height="420" alt="blog">
                            </a>
                        </figure>
                        <div class="post-details">
                            <div class="post-cats text-primary">
                                <a href="#">{{ $blog->category->name }}</a>
                            </div>
                            <h4 class="post-title">
                                <a href="{{ route('frontend.singleblog',$blog->id) }}">{{ $blog->title }}</a>
                            </h4>
                            <div class="post-content">
                                <p>
                                    {{ Str::limit($blog->description, 200) }}
                                     …</p> <a href="{{ route('frontend.singleblog',$blog->id) }}" class="btn btn-link btn-primary">(read more)</a>
                            </div>
                            <div class="post-meta">
                                by <a href="#" class="post-author">Admin</a>
                                - <a href="{{ route('frontend.singleblog',$blog->id) }}" class="post-date"> {{ $blog->created_at->format('d.m.Y') }} </a>
                            </div>
                        </div>
                    </article>



                </div>
                @endforeach
            </div>

            <ul class="pagination justify-content-center mb-10 pb-2 pt-2">
                {{ $blogs->links() }}
            </ul>
        </div>
    </div>
    <!-- End of Page Content -->
</main>
@endsection
