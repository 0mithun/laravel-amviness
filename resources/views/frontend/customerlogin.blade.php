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
                            <a class="nav-link active">Sign In</a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <form class="tab-pane active" method="POST" action="{{ route('frontend.login.submit') }}" id="sign-in">
                            @csrf
                            <div class="form-group">
                                <label>E-mail <span style="color: rgb(194, 7, 7)">*</span> </label>
                                <input type="email" class="form-control" name="email" id="email" required>
                            </div>
                            <div class="form-group mb-0">
                                <label>Password <span style="color: rgb(194, 7, 7)">*</span></label>
                                <input type="password" class="form-control" name="password" id="password" required>
                            </div>
                            <div class="form-checkbox d-flex align-items-center justify-content-between">
                                {{-- <input type="checkbox" class="custom-checkbox" id="remember1" name="remember1" required="">
                                <label for="remember1">Remember me</label> --}}
                                <a href="#">Last your password?</a>
                            </div>
                            <button class="btn btn-primary">Sign In</button>
                        </form>
                    </div
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
