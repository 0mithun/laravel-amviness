@extends('frontend.master')
@section('frontend_content')
     <!-- Start of Main -->
     <main class="main">
        <!-- Start of Page Header -->
        <div class="page-header" style="height: 180px;">
            <div class="container">
                <h1 class="page-title mb-0">FAQs</h1>
            </div>
        </div>
        <!-- End of Page Header -->

        <!-- Start of Breadcrumb -->
        <nav class="breadcrumb-nav mb-10 pb-1">
            <div class="container">
                <ul class="breadcrumb">
                    <li><a href="{{ route('frontend.home') }}">Home</a></li>
                    <li>FAQs</li>
                </ul>
            </div>
        </nav>
        <!-- End of Breadcrumb -->

        <!-- Start of PageContent -->
        <div class="page-content faq">
            <div class="container">
                <section class="content-title-section">
                    <h3 class="title title-simple justify-content-center bb-no pb-0">
                        Frequent Asked Questions
                    </h3>
                    <p class="description text-center">You can show the faqs with <b>Wolmart Elements</b> easily.</p>
                </section>

                <section class="mb-6">
                    <h4 class="title title-center mb-5">Shipping Information</h4>
                    <div class="row">
                        <div class="col-md-6 mb-8">
                            <div class="accordion accordion-bg accordion-gutter-md accordion-border">
                                @foreach ($faqs as $faq)
                                    @if ($faq->id%2 !== 0)
                                        <div class="card">
                                            <div class="card-header">
                                                <a href="#collapse1-2" class="expand">{{ $faq->name }}</a>
                                            </div>
                                            <div id="collapse1-2" class="card-body collapsed">
                                                <p class="mb-0">
                                                    {{ $faq->description }}
                                                </p>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                        <div class="col-md-6 mb-8">
                            <div class="accordion accordion-bg accordion-gutter-md accordion-border">
                                @foreach ($faqs as $faq)
                                    @if ($faq->id%2 === 0)
                                        <div class="card">
                                            <div class="card-header">
                                                <a href="#collapse1-2" class="expand">{{ $faq->name }}</a>
                                            </div>
                                            <div id="collapse1-2" class="card-body collapsed">
                                                <p class="mb-0">
                                                    {{ $faq->description }}
                                                </p>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                            </div>
                        </div>
                    </div>
                    
                </section>
            </div>
        </div>
        <!-- End of PageContent -->
    </main>
    <!-- End of Main -->
@endsection
