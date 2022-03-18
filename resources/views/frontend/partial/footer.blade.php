<!-- Start of Footer -->
<footer class="footer appear-animate" data-animation-options="{
    'name': 'fadeIn'
    }">
    <div class="footer-newsletter bg-primary">
        <div class="container">
            <div class="row justify-content-center align-items-center">
                <div class="col-xl-5 col-lg-6">
                    <div class="icon-box icon-box-side text-white">
                        <div class="icon-box-icon d-inline-flex">
                            <i class="w-icon-envelop3"></i>
                        </div>
                        <div class="icon-box-content">
                            <h4 class="icon-box-title text-white text-uppercase font-weight-bold">Subscribe To
                                Our Newsletter</h4>
                            <p class="text-white">Get all the latest information on Events, Sales and Offers.
                            </p>
                        </div>
                    </div>
                </div>
                <div class="col-xl-7 col-lg-6 col-md-9 mt-4 mt-lg-0 ">
                    <form action="{{ route('module.newsletter.store') }}" method="get" class="input-wrapper input-wrapper-inline input-wrapper-rounded">
                        @csrf
                        <input type="email" class="form-control mr-2 bg-white" name="email" id="email" placeholder="Your E-mail Address" />
                        <button class="btn btn-dark btn-rounded" type="submit">Subscribe<i class="w-icon-long-arrow-right"></i></button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="footer-top">
            <div class="row">
                <div class="col-lg-4 col-sm-6">
                    <div class="widget widget-about">
                        <a href="{{ route('home') }}" class="logo-footer">
                            <img src="{{ asset( $setting->logo_image_url)}}" alt="logo-footer" width="144" height="45" />
                        </a>
                        <div class="widget-body">
                            <p class="widget-about-title">{{ $setting->title }}</p>
                            <a href="tel:18005707777" class="widget-about-call">{{ $setting->phone }}</a>
                            <p class="widget-about-desc"> {{ $setting->address }}
                            </p>
                            <div class="social-icons social-icons-colored">
                                <a href="{{ $setting->facebook }}" class="social-icon social-facebook w-icon-facebook"></a>
                                <a href="{{ $setting->twitter }}" class="social-icon social-twitter w-icon-twitter"></a>
                                <a href="#" class="social-icon social-instagram w-icon-instagram"></a>
                                <a href="#" class="social-icon social-youtube w-icon-youtube"></a>
                                <a href="#" class="social-icon social-pinterest w-icon-pinterest"></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="widget">
                        <h3 class="widget-title">Company</h3>
                        <ul class="widget-body">
                            <li><a href="{{ route('frontend.about') }}">About Us</a></li>
                            <li><a href="#">Team Member</a></li>
                            <li><a href="#">Career</a></li>
                            <li><a href="{{ route('frontend.conatct') }}">Contact Us</a></li>
                            <li><a href="#">Affilate</a></li>
                            <li><a href="#">Order History</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3 col-sm-6">

                    @auth
                        <div class="widget">
                            <h4 class="#">My Account</h4>
                            <ul class="widget-body">
                                <li><a href="#">Track My Order</a></li>
                                <li><a href="cart.html">View Cart</a></li>
                                <li><a href="{{ route('login') }}">Sign In</a></li>
                                <li><a href="#">Help</a></li>
                                <li><a href="{{ route('frontend.wishlist') }}">My Wishlist</a></li>
                                <li><a href="#">Privacy Policy</a></li>
                            </ul>
                        </div>
                    @endauth

                    @guest
                    <div class="widget">
                        <ul class="widget-body">
                            <li><a href="{{ route('login') }}">Sign In</a></li>
                            <li><a href="#">Help</a></li>
                            <li><a href="#">Privacy Policy</a></li>
                        </ul>
                    </div>
                    @endguest
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="widget">
                        <h4 class="widget-title">Customer Service</h4>
                        <ul class="widget-body">
                            <li><a href="#">Payment Methods</a></li>
                            <li><a href="#">Money-back guarantee!</a></li>
                            <li><a href="#">Product Returns</a></li>
                            <li><a href="#">Support Center</a></li>
                            <li><a href="#">Shipping</a></li>
                            <li><a href="#">Term and Conditions</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <div class="footer-left">
                <p class="copyright">Copyright &copy; 2008-<?php echo date("Y"); ?> Anvibess Store. All Rights Reserved.</p>
            </div>
            <div class="footer-right">
                <span class="payment-label mr-lg-8">We're using safe payment for</span>
                <figure class="payment">
                    <img src="{{ asset('frontend')}}/assets/images/payment.png" alt="payment" width="159" height="25" />
                </figure>
            </div>
        </div>
    </div>
</footer>
<!-- End of Footer -->
