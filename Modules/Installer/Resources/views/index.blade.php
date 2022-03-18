@extends('installer::layouts.master')

@section('content')
    <!-- MultiStep Form -->
    <div class="container-fluid" id="grad1">
        <div class="row justify-content-center mt-0">
            <div class="col-11 col-sm-9 col-md-7 col-lg-6 text-center p-0 mt-3 mb-2">
                <div class="card px-0 pt-4 pb-0 mt-3 mb-3">
                    <h2><strong>Laravel Installer</strong></h2>
                    <div class="row">
                        <div class="col-md-12 mx-0">
                            <form action="{{ route('app.install') }}" method="POST" id="msform">
                                @csrf
                                <!-- progressbar -->
                                <ul id="progressbar">
                                    <li id="account"><strong>Environment</strong></li>
                                    <li id="personal"><strong>Database</strong></li>
                                    <li id="confirm"><strong>Applidation</strong></li>
                                </ul> <!-- fieldsets -->

                                <fieldset>
                                    <div class="form-card">
                                        <h2 class="fs-title">Environment Setup</h2>
                                        <div class="form-group">
                                            <label class="label-control">App Name</label>
                                            <input name="app_name" type="text" class="form-control"
                                                value="{{ env('APP_NAME') }}">
                                        </div>
                                        <div class="form-group">
                                            <label>App Environment</label>
                                            <input name="app_env" type="text" class="form-control"
                                                value="{{ env('APP_ENV') }}">
                                        </div>
                                        <div class="form-group">
                                            <label>App Debug</label>
                                            <div class="custom-control custom-radio">
                                                <input type="radio" id="app_debug" name="app_debug"
                                                    class="custom-control-input"
                                                    {{ env('APP_DEBUG') == true ? 'checked' : '' }} value="true">
                                                <label class="custom-control-label" for="app_debug">True</label>
                                            </div>
                                            <div class="custom-control custom-radio">
                                                <input type="radio" id="app_debug2" name="app_debug"
                                                    class="custom-control-input"
                                                    {{ env('APP_DEBUG') == false ? 'checked' : '' }} value="false">
                                                <label class="custom-control-label" for="app_debug2">False</label>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>App URL</label>
                                            <input name="app_url" type="text" class="form-control"
                                                value="{{ env('APP_URL') }}">
                                        </div>
                                    </div>
                                    <input type="button" name="next" class="next action-button" value="Next Step" />
                                </fieldset>
                                <fieldset>
                                    <div class="form-card">
                                        <h2 class="fs-title">Database Information</h2>
                                        <div class="form-group">
                                            <label>Database Connection</label>
                                            <input name="db_connection" type="text" class="form-control"
                                                value="{{ env('DB_CONNECTION') }}">
                                        </div>
                                        <div class="form-group">
                                            <label>Database Host</label>
                                            <input name="db_host" type="text" class="form-control"
                                                value="{{ env('DB_HOST') }}">
                                        </div>
                                        <div class="form-group">
                                            <label>Database Port</label>
                                            <input name="db_port" type="text" class="form-control"
                                                value="{{ env('DB_PORT') }}">
                                        </div>
                                        <div class="form-group">
                                            <label>Database Name</label>
                                            <input name="db_name" type="text" class="form-control"
                                                value="{{ env('DB_DATABASE') }}">
                                        </div>
                                        <div class="form-group">
                                            <label>Database User Name</label>
                                            <input name="db_username" type="text" class="form-control"
                                                value="{{ env('DB_USERNAME') }}">
                                        </div>
                                        <div class="form-group">
                                            <label>Database Password</label>
                                            <input name="db_password" type="password" class="form-control"
                                                value="{{ env('DB_PASSWORD') }}">
                                        </div>
                                    </div>

                                    <input type="button" name="previous" class="previous action-button-previous"
                                        value="Previous" />
                                    <input type="button" name="next" class="next action-button" value="Next Step" />
                                </fieldset>
                                <fieldset>
                                    <div class="form-card">
                                        <h2 class="fs-title">Application</h2>
                                        <div class="row">
                                            <div class="col-5">
                                                <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist"
                                                    aria-orientation="vertical">
                                                    <a class="nav-link active" id="brodcasting-tab" data-toggle="pill"
                                                        href="#brodcasting" role="tab" aria-controls="brodcasting"
                                                        aria-selected="true">Brodcasting, Cache, Queue & Session</a>
                                                    <a class="nav-link" id="redis-tab" data-toggle="pill" href="#redis"
                                                        role="tab" aria-controls="redis" aria-selected="false">Redis
                                                        Driver</a>
                                                    <a class="nav-link" id="mail-tab" data-toggle="pill" href="#mail"
                                                        role="tab" aria-controls="mail" aria-selected="false">Mail</a>
                                                    <a class="nav-link" id="pusher-tab" data-toggle="pill" href="#pusher"
                                                        role="tab" aria-controls="pusher" aria-selected="false">Pusher</a>
                                                    <a class="nav-link" id="payment-tab" data-toggle="pill" href="#payment"
                                                        role="tab" aria-controls="payment" aria-selected="false">Payment</a>
                                                </div>
                                            </div>
                                            <div class="col-7">
                                                <div class="tab-content" id="v-pills-tabContent">
                                                    <div class="tab-pane fade show active" id="brodcasting" role="tabpanel"
                                                        aria-labelledby="brodcasting-tab">
                                                        <div class="form-group">
                                                            <label>Brodcast Driver</label>
                                                            <input name="brodcast_driver" type="text" class="form-control"
                                                                value="{{ env('BROADCAST_DRIVER') }}">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Cache Driver</label>
                                                            <input name="cache_driver" type="text" class="form-control"
                                                                value="{{ env('CACHE_DRIVER') }}">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Queue Connection</label>
                                                            <input name="queue_connection" type="text" class="form-control"
                                                                value="{{ env('QUEUE_CONNECTION') }}">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Session Driver</label>
                                                            <input name="session_driver" type="text" class="form-control"
                                                                value="{{ env('SESSION_DRIVER') }}">
                                                        </div>
                                                    </div>
                                                    <div class="tab-pane fade" id="redis" role="tabpanel"
                                                        aria-labelledby="redis-tab">
                                                        <div class="form-group">
                                                            <label>Redis Host</label>
                                                            <input name="redis_host" type="text" class="form-control"
                                                                value="{{ env('REDIS_HOST') }}">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Redis Passoword</label>
                                                            <input name="redis_password" type="text" class="form-control"
                                                                value="{{ env('REDIS_PASSWORD') }}">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Redis Port</label>
                                                            <input name="redis_port" type="text" class="form-control"
                                                                value="{{ env('REDIS_PORT') }}">
                                                        </div>
                                                    </div>
                                                    <div class="tab-pane fade" id="mail" role="tabpanel"
                                                        aria-labelledby="mail-tab">
                                                        <div class="form-group">
                                                            <label>Mail Type</label>
                                                            <input name="mail_type" type="text" class="form-control"
                                                                value="{{ env('MAIL_MAILER') }}">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Mail Host</label>
                                                            <input name="mail_host" type="text" class="form-control"
                                                                value="{{ env('MAIL_HOST') }}">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Mail Port</label>
                                                            <input name="mail_port" type="text" class="form-control"
                                                                value="{{ env('MAIL_PORT') }}">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Mail Username</label>
                                                            <input name="mail_username" type="text" class="form-control"
                                                                value="{{ env('MAIL_USERNAME') }}">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Mail Password</label>
                                                            <input name="mail_password" type="text" class="form-control"
                                                                value="{{ env('MAIL_PASSWORD') }}">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Mail Encryption</label>
                                                            <input name="mail_encrypt" type="text" class="form-control"
                                                                value="{{ env('MAIL_ENCRYPTION') }}">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Mail From Address</label>
                                                            <input name="mail_from" type="text" class="form-control"
                                                                value="{{ env('MAIL_FROM_ADDRESS') }}">
                                                        </div>
                                                    </div>
                                                    <div class="tab-pane fade" id="pusher" role="tabpanel"
                                                        aria-labelledby="pusher-tab">
                                                        <div class="form-group">
                                                            <label>Pusher App Id</label>
                                                            <input name="pusher_id" type="text" class="form-control"
                                                                value="{{ env('PUSHER_APP_ID') }}">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Pusher App Key</label>
                                                            <input name="pusher_key" type="text" class="form-control"
                                                                value="{{ env('PUSHER_APP_KEY') }}">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Pusher App Secret</label>
                                                            <input name="pusher_secret" type="text" class="form-control"
                                                                value="{{ env('PUSHER_APP_SECRET') }}">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Pusher App Cluster</label>
                                                            <input name="pusher_cluster" type="text" class="form-control"
                                                                value="{{ env('PUSHER_APP_CLUSTER') }}">
                                                        </div>
                                                    </div>
                                                    <div class="tab-pane fade" id="payment" role="tabpanel"
                                                        aria-labelledby="payment-tab">
                                                        <div class="form-group">
                                                            <label>Stripe Key</label>
                                                            <input name="stripe_key" type="text" class="form-control"
                                                                value="{{ env('STRIPE_KEY') }}">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Stripe Secret</label>
                                                            <input name="stripe_secret" type="text" class="form-control"
                                                                value="{{ env('STRIPE_SECRET') }}">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Razorpay Key</label>
                                                            <input name="razor_key" type="text" class="form-control"
                                                                value="{{ env('RAZORPAY_KEY') }}">
                                                        </div>
                                                        <div class="form-group">
                                                            <label>Razorpay Secret</label>
                                                            <input name="razor_secret" type="text" class="form-control"
                                                                value="{{ env('RAZORPAY_SECRET') }}">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <input type="submit" class="next action-button" value="Save and Install" />
                                    {{-- <button type="submit" class="next action-button">Save and Install</button> --}}

                                </fieldset>


                                {{-- <fieldset>
                                    <div class="form-card">
                                        <h2 class="fs-title text-center">Success !</h2> <br><br>
                                        <div class="row justify-content-center">
                                            <div class="col-3"> <img src="https://img.icons8.com/color/96/000000/ok--v2.png"
                                                    class="fit-image"> </div>
                                        </div> <br><br>
                                        <div class="row justify-content-center">
                                            <div class="col-7 text-center">
                                                <h5>You Have Successfully Signed Up</h5>
                                            </div>
                                        </div>
                                    </div>
                                </fieldset> --}}
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- <div class="container">
        <div class="row justify-content-center">
            <div class="col-12">
                <form action="{{ route('app.install') }}" method="POST">
                    @csrf
                    <div class="row mt-5">
                        <div class="col-4">
                            <div class="card">
                                <div class="card-header">
                                    Environment
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>App Name</label>
                                        <input name="app_name" type="text" class="form-control"
                                            value="{{ env('APP_NAME') }}">
                                    </div>
                                    <div class="form-group">
                                        <label>App Environment</label>
                                        <input name="app_env" type="text" class="form-control"
                                            value="{{ env('APP_ENV') }}">
                                    </div>
                                    <div class="form-group">
                                        <label>App Debug</label>
                                        <div class="custom-control custom-radio">
                                            <input type="radio" id="app_debug" name="app_debug" class="custom-control-input"
                                                {{ env('APP_DEBUG') == true ? 'checked' : '' }} value="true">
                                            <label class="custom-control-label" for="app_debug">True</label>
                                        </div>
                                        <div class="custom-control custom-radio">
                                            <input type="radio" id="app_debug2" name="app_debug"
                                                class="custom-control-input"
                                                {{ env('APP_DEBUG') == false ? 'checked' : '' }} value="false">
                                            <label class="custom-control-label" for="app_debug2">False</label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label>App URL</label>
                                        <input name="app_url" type="text" class="form-control"
                                            value="{{ env('APP_URL') }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="card">
                                <div class="card-header">
                                    Database Connection
                                </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <label>Database Connection</label>
                                        <input name="db_connection" type="text" class="form-control"
                                            value="{{ env('DB_CONNECTION') }}">
                                    </div>
                                    <div class="form-group">
                                        <label>Database Host</label>
                                        <input name="db_host" type="text" class="form-control"
                                            value="{{ env('DB_HOST') }}">
                                    </div>
                                    <div class="form-group">
                                        <label>Database Port</label>
                                        <input name="db_port" type="text" class="form-control"
                                            value="{{ env('DB_PORT') }}">
                                    </div>
                                    <div class="form-group">
                                        <label>Database Name</label>
                                        <input name="db_name" type="text" class="form-control"
                                            value="{{ env('DB_DATABASE') }}">
                                    </div>
                                    <div class="form-group">
                                        <label>Database User Name</label>
                                        <input name="db_username" type="text" class="form-control"
                                            value="{{ env('DB_USERNAME') }}">
                                    </div>
                                    <div class="form-group">
                                        <label>Database Password</label>
                                        <input name="db_password" type="password" class="form-control"
                                            value="{{ env('DB_PASSWORD') }}">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div> --}}
@endsection

@section('script')
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
    <script>
        $(document).ready(function() {
            var current_fs, next_fs, previous_fs; //fieldsets
            var opacity;

            $(".next").click(function() {

                current_fs = $(this).parent();
                next_fs = $(this).parent().next();

                //Add Class Active
                $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");

                //show the next fieldset
                next_fs.show();
                //hide the current fieldset with style
                current_fs.animate({
                    opacity: 0
                }, {
                    step: function(now) {
                        // for making fielset appear animation
                        opacity = 1 - now;

                        current_fs.css({
                            'display': 'none',
                            'position': 'relative'
                        });
                        next_fs.css({
                            'opacity': opacity
                        });
                    },
                    duration: 600
                });
            });

            $(".previous").click(function() {

                current_fs = $(this).parent();
                previous_fs = $(this).parent().prev();

                //Remove class active
                $("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");

                //show the previous fieldset
                previous_fs.show();

                //hide the current fieldset with style
                current_fs.animate({
                    opacity: 0
                }, {
                    step: function(now) {
                        // for making fielset appear animation
                        opacity = 1 - now;

                        current_fs.css({
                            'display': 'none',
                            'position': 'relative'
                        });
                        previous_fs.css({
                            'opacity': opacity
                        });
                    },
                    duration: 600
                });
            });

            $('.radio-group .radio').click(function() {
                $(this).parent().find('.radio').removeClass('selected');
                $(this).addClass('selected');
            });

            $(".submit").click(function() {
                return false;
            })

        });
    </script>
@endsection

@section('style')
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.3/css/font-awesome.css">
    <style>
        * {
            margin: 0;
            padding: 0
        }

        html {
            height: 100%
        }

        #grad1 {
            background-color: : #9C27B0;
            background-image: linear-gradient(120deg, #FF4081, #81D4FA)
        }

        #msform {
            text-align: center;
            position: relative;
            margin-top: 20px
        }

        #msform fieldset .form-card {
            background: white;
            border: 0 none;
            border-radius: 0px;
            box-shadow: 0 2px 2px 2px rgba(0, 0, 0, 0.2);
            padding: 20px 40px 30px 40px;
            box-sizing: border-box;
            width: 94%;
            margin: 0 3% 20px 3%;
            position: relative
        }

        #msform fieldset {
            background: white;
            border: 0 none;
            border-radius: 0.5rem;
            box-sizing: border-box;
            width: 100%;
            margin: 0;
            padding-bottom: 20px;
            position: relative
        }

        #msform fieldset:not(:first-of-type) {
            display: none
        }

        #msform fieldset .form-card {
            text-align: left;
            color: #9E9E9E
        }

        #msform input,
        #msform textarea {
            padding: 0px 8px 4px 8px;
            border: none;
            border-bottom: 1px solid #ccc;
            border-radius: 0px;
            margin-bottom: 25px;
            margin-top: 2px;
            width: 100%;
            box-sizing: border-box;
            font-family: montserrat;
            color: #2C3E50;
            font-size: 16px;
            letter-spacing: 1px
        }

        #msform input:focus,
        #msform textarea:focus {
            -moz-box-shadow: none !important;
            -webkit-box-shadow: none !important;
            box-shadow: none !important;
            border: none;
            font-weight: bold;
            border-bottom: 2px solid skyblue;
            outline-width: 0
        }

        #msform .action-button {
            width: 100px;
            background: skyblue;
            font-weight: bold;
            color: white;
            border: 0 none;
            border-radius: 0px;
            cursor: pointer;
            padding: 10px 5px;
            margin: 10px 5px
        }

        #msform .action-button:hover,
        #msform .action-button:focus {
            box-shadow: 0 0 0 2px white, 0 0 0 3px skyblue
        }

        #msform .action-button-previous {
            width: 100px;
            background: #616161;
            font-weight: bold;
            color: white;
            border: 0 none;
            border-radius: 0px;
            cursor: pointer;
            padding: 10px 5px;
            margin: 10px 5px
        }

        #msform .action-button-previous:hover,
        #msform .action-button-previous:focus {
            box-shadow: 0 0 0 2px white, 0 0 0 3px #616161
        }

        select.list-dt {
            border: none;
            outline: 0;
            border-bottom: 1px solid #ccc;
            padding: 2px 5px 3px 5px;
            margin: 2px
        }

        select.list-dt:focus {
            border-bottom: 2px solid skyblue
        }

        .card {
            z-index: 0;
            border: none;
            border-radius: 0.5rem;
            position: relative
        }

        .fs-title {
            font-size: 25px;
            color: #2C3E50;
            margin-bottom: 10px;
            font-weight: bold;
            text-align: left
        }

        #progressbar {
            margin-bottom: 30px;
            overflow: hidden;
            color: lightgrey
        }

        #progressbar .active {
            color: #000000
        }

        #progressbar li {
            list-style-type: none;
            font-size: 12px;
            width: 25%;
            float: left;
            position: relative
        }

        #progressbar #account:before {
            font-family: FontAwesome;
            content: "\f023"
        }

        #progressbar #personal:before {
            font-family: FontAwesome;
            content: "\f007"
        }

        #progressbar #payment:before {
            font-family: FontAwesome;
            content: "\f09d"
        }

        #progressbar #confirm:before {
            font-family: FontAwesome;
            content: "\f00c"
        }

        #progressbar li:before {
            width: 50px;
            height: 50px;
            line-height: 45px;
            display: block;
            font-size: 18px;
            color: #ffffff;
            background: lightgray;
            border-radius: 50%;
            margin: 0 auto 10px auto;
            padding: 2px
        }

        #progressbar li:after {
            content: '';
            width: 100%;
            height: 2px;
            background: lightgray;
            position: absolute;
            left: 0;
            top: 25px;
            z-index: -1
        }

        #progressbar li.active:before,
        #progressbar li.active:after {
            background: skyblue
        }

        .radio-group {
            position: relative;
            margin-bottom: 25px
        }

        .radio {
            display: inline-block;
            width: 204;
            height: 104;
            border-radius: 0;
            background: lightblue;
            box-shadow: 0 2px 2px 2px rgba(0, 0, 0, 0.2);
            box-sizing: border-box;
            cursor: pointer;
            margin: 8px 2px
        }

        .radio:hover {
            box-shadow: 2px 2px 2px 2px rgba(0, 0, 0, 0.3)
        }

        .radio.selected {
            box-shadow: 1px 1px 2px 2px rgba(0, 0, 0, 0.1)
        }

        .fit-image {
            width: 100%;
            object-fit: cover
        }

    </style>
@endsection
