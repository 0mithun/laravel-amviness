@extends('frontend.master')
@section('frontend_content')
<main class="main login-page">
    <!-- Start of Page Header -->
    <div class="page-header">
        <div class="container">
            <h1 class="page-title mb-0">My Account</h1>
        </div>
    </div>
    <!-- End of Page Header -->

    <!-- Start of Breadcrumb -->
    <nav class="breadcrumb-nav">
        <div class="container">
            <ul class="breadcrumb">
                <li><a href="demo1.html">Home</a></li>
                <li>My account</li>
            </ul>
        </div>
    </nav>
    <!-- End of Breadcrumb -->
    <div class="page-content">
        <div class="container">
            <div class="login-popup">
                <div class="tab tab-nav-boxed tab-nav-center tab-nav-underline">
                    <ul class="nav nav-tabs text-uppercase" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active">Register Customer</a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <form class="tab-pane active" method="POST" action="{{ route('customer.register') }}">
                            @csrf
                                <div class="form-group mb-5">
                                    <label>Enter Name <span style="color: rgb(194, 7, 7)">*</span></label>
                                    <input type="text" class="form-control" name="name" id="name" required>
                                </div>
                                <div class="form-group">
                                    <label>Your Phone <span style="color: rgb(194, 7, 7)">*</span></label>
                                    <input type="number" class="form-control" name="phone" id="phone" required>
                                </div>
                                <div class="form-group mb-5">
                                    <label>Password <span style="color: rgb(194, 7, 7)">*</span></label>
                                    <input type="password" class="form-control" name="password" id="password_1" required>
                                </div>
                                <div class="form-group mb-5">
                                    <label>Confirm Password <span style="color: rgb(194, 7, 7)">*</span></label>
                                    <input type="password" class="form-control" name="password" id="password_1" required>
                                </div>
                                <button class="btn btn-primary">Sign Un</button>
                        </form>
                    </div>
                    <p class="text-center">Sign in with social account</p>
                    <div class="social-icons social-icon-border-color d-flex justify-content-center">
                        <a href="#" class="social-icon social-facebook w-icon-facebook"></a>
                        <a href="#" class="social-icon social-twitter w-icon-twitter"></a>
                        <a href="#" class="social-icon social-google fab fa-google"></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
