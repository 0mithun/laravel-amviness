@extends('frontend.master')

@section('frontend_content')
    <!-- Start of Main -->
    <main class="main">
        <!-- Start of Page Header -->
        <div class="page-header">
            <div class="container">
                <h1 class="page-title mb-0">Contact Us  </h1>
            </div>
        </div>
        <!-- End of Page Header -->

        <!-- Start of Breadcrumb -->
        <nav class="breadcrumb-nav mb-10 pb-1">
            <div class="container">
                <ul class="breadcrumb">
                    <li><a href="{{ route('frontend.home') }}">Home</a></li>
                    <li>Contact Us</li>
                </ul>
            </div>
        </nav>
        <!-- End of Breadcrumb -->

        <!-- Start of PageContent -->
        <div class="page-content contact-us">
            <div class="container">
                <section class="content-title-section mb-10">
                    <h3 class="title title-center mb-3">Contact
                        Information
                    </h3>
                    <p class="text-center">Lorem ipsum dolor sit amet,
                        consectetur 
                        adipiscing elit, sed do eiusmod tempor incididunt ut</p>
                </section>
                <!-- End of Contact Title Section -->

                <section class="contact-information-section mb-10">
                    <div class=" swiper-container swiper-theme " data-swiper-options="{
                        'spaceBetween': 20,
                        'slidesPerView': 1,
                        'breakpoints': {
                            '480': {
                                'slidesPerView': 2
                            },
                            '768': {
                                'slidesPerView': 3
                            },
                            '992': {
                                'slidesPerView': 4
                            }
                        }
                    }">
                        <div class="swiper-wrapper row cols-xl-4 cols-md-3 cols-sm-2 cols-1">
                            <div class="swiper-slide icon-box text-center icon-box-primary">
                                <span class="icon-box-icon icon-email">
                                    <i class="w-icon-envelop-closed"></i>
                                </span>
                                <div class="icon-box-content">
                                    <h4 class="icon-box-title">E-mail Address</h4>
                                    <p>{{ settingman()->email }}</p>
                                </div>
                            </div>
                            <div class="swiper-slide icon-box text-center icon-box-primary">
                                <span class="icon-box-icon icon-headphone">
                                    <i class="w-icon-headphone"></i>
                                </span>
                                <div class="icon-box-content">
                                    <h4 class="icon-box-title">Phone Number</h4>
                                    <p>{{ settingman()->phone }}</p>
                                </div>
                            </div>
                            <div class="swiper-slide icon-box text-center icon-box-primary">
                                <span class="icon-box-icon icon-map-marker">
                                    <i class="w-icon-map-marker"></i>
                                </span>
                                <div class="icon-box-content">
                                    <h4 class="icon-box-title">Address</h4>
                                    <p>{{ settingman()->address }}</p>
                                </div>
                            </div>
                            <div class="swiper-slide icon-box text-center icon-box-primary">
                                <span class="icon-box-icon icon-fax">
                                    <i class="w-icon-fax"></i>
                                </span>
                                <div class="icon-box-content">
                                    <h4 class="icon-box-title">Fax</h4>
                                    <p> {{ settingman()->fax }} </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- End of Contact Information section -->

                <hr class="divider mb-10 pb-1">

                <section class="contact-section">
                    <div class="row gutter-lg pb-3">
                        <div class="col-lg-6 mb-8">
                            <h4 class="title mb-3">People usually ask these</h4>
                            <div class="accordion accordion-bg accordion-gutter-md accordion-border">
                                @foreach ($contacts as $contact)
                                    <div class="card">
                                        <div class="card-header">
                                            <a href="#collapse5" class="expand">{{ $contact->subject }}</a>
                                        </div>
                                        <div id="collapse5" class="card-body collapsed">
                                            <p class="mb-0">
                                                {{ $contact->message }}
                                            </p>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                        <div class="col-lg-6 mb-8">
                            <h4 class="title mb-3">Send Us a Message</h4>
                            <form class="form contact-us-form" action="{{ route('frontend.conatctpage') }}" method="post">
                                @csrf
                                <div class="form-group">
                                    <label for="name">Your Name</label>
                                    <input type="text" id="name" name="name"
                                    style="@error('name') border: 1px solid red; is-invalid @enderror"
                                    class="form-control"
                                    placeholder="Enter Name">
                                    @error('name') <span class="invalid-feedback"
                                        role="alert"><strong style="color: red;" >{{ $message }}</strong></span> @enderror
                                </div>
                                <div class="form-group">
                                    <label for="email_1">Your Email</label>
                                    <input type="email" id="email" name="email" placeholder="Enter e-mail"
                                    style="@error('email') border: 1px solid red; is-invalid @enderror"
                                        class="form-control">
                                        @error('email') <span class="invalid-feedback"
                                        role="alert"><strong style="color: red" >{{ $message }}</strong></span> @enderror
                                </div>
                                <div class="form-group">
                                    <label for="message">Subject</label>
                                    <input type="text" id="subject" placeholder="Subject" placeholder="Enter subject"
                                    name="subject" style="@error('subject') border: 1px solid red; is-invalid @enderror" class="form-control">
                                    @error('subject') <span class="invalid-feedback"
                                        role="alert"><strong style="color: red" >{{ $message }}</strong></span> @enderror
                                </div>
                                <div class="form-group">
                                    <label for="message">Your Message</label>
                                    <textarea id="message" name="message" cols="30" rows="5"
                                        class="form-control"></textarea>
                                        @error('message') <span class="invalid-feedback"
                                        role="alert"><strong style="color: red" >{{ $message }}</strong></span> @enderror
                                </div>
                                <button type="submit" class="btn btn-dark btn-rounded">Send Now</button>
                            </form>
                        </div>
                    </div>
                </section>
                <!-- End of Contact Section -->
            </div>

            <!-- Google Maps - Go to the bottom of the page to change settings and map location. -->
            <div class="google-map contact-google-map" id="googlemaps"></div>
            <!-- End Map Section -->
        </div>
        <!-- End of PageContent -->
    </main>
    <!-- End of Main -->
@endsection
