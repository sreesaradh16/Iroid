<!doctype html>
<html lang="en" dir="ltr">

<head>

    <!-- META DATA -->
    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="ZimpleQ">
    <meta name="author" content="ZimpleQ">
    <meta name="keywords" content="ZimpleQ">

    <!-- FAVICON -->
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('assets/images/brand/favicon.png')}}" />

    <!-- TITLE -->
    <title>ZimpleQ – Change Password</title>

    <!-- BOOTSTRAP CSS -->
    <link href="{{asset('assets/plugins/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" />

    <!-- STYLE CSS -->
    <link href="{{asset('assets/css/style.css')}}" rel="stylesheet" />
    <link href="{{asset('assets/css/skin-modes.css')}}" rel="stylesheet" />

    <!-- SIDE-MENU CSS -->
    <link href="{{asset('assets/plugins/sidemenu/closed-sidemenu.css')}}" rel="stylesheet">

    <!--C3 CHARTS CSS -->
    <link href="{{asset('assets/plugins/charts-c3/c3-chart.css')}}" rel="stylesheet" />

    <!-- SINGLE-PAGE CSS -->
    <link href="{{asset('assets/plugins/single-page/css/main.css')}}" rel="stylesheet" type="text/css">

    <!-- CUSTOM SCROLL BAR CSS-->
    <link href="{{asset('assets/plugins/scroll-bar/jquery.mCustomScrollbar.css')}}" rel="stylesheet" />

    <!--- FONT-ICONS CSS -->
    <link href="{{asset('assets/css/icons.css')}}" rel="stylesheet" />

    <!-- COLOR SKIN CSS -->
    <link id="theme" rel="stylesheet" type="text/css" media="all" href="{{asset('assets/colors/color1.css')}}" />
    <link href="{{asset('assets/css/style.css')}}" rel="stylesheet" />

</head>

<body>

    <!-- BACKGROUND-IMAGE -->
    <div class="login-img">

        <!-- GLOABAL LOADER -->
        <div id="global-loader">
            <img src="{{asset('assets/images/loader.svg')}}" class="loader-img" alt="Loader">
        </div>
        <!-- End GLOABAL LOADER -->

        <!-- PAGE -->
        <div class="page">
            <div class="">
                <div class="col col-login mx-auto">
                    <div class="text-center">
                        <img src="{{asset('assets/images/zimpleq-logo.png')}}" class="header-brand-img" alt="">
                    </div>
                </div>
                <!-- CONTAINER OPEN -->
                <div class="container-login100">
                    <div class="row">
                        <div class="col col-login mx-auto">
                            <form class="card shadow-none" method="post" action="{{route('password.update')}}">
                                {{ csrf_field() }}
                                <input type="hidden" name="token" value="{{$token}}">
                                <input type="hidden" name="email" value="{{$email}}">
                                <div class="card-body p-6">
                                    <div class="text-center mb-10">
                                        <h2 class="text-dark mb-3">Setup New Password</h2>
                                        <div class="text-gray-400 fw-bold fs-4">Already have reset your password ?
                                            <a href="{{route('login')}}" class="link-primary fw-bolder">Sign in here</a>
                                        </div>
                                    </div>
                                    <div class="mb-10 fv-row" data-kt-password-meter="true">
                                        <div class="mb-1">
                                            <label class="form-label fw-bolder text-dark fs-6">Password</label>
                                            <div class="position-relative mb-3">
                                                <input class="form-control form-control-lg form-control-solid" type="password" placeholder="" name="password" value="{{old('password')}}" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" />
                                            </div>
                                            @if ($errors->has('password'))
                                            <span class="text-danger errbk">{{ $errors->first('password') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="fv-row mb-10">
                                        <label class="form-label fw-bolder text-dark fs-6">Confirm Password</label>
                                        <input class="form-control form-control-lg form-control-solid" type="password" name="password_confirmation" value="{{old('password_confirmation')}}" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" />
                                        @if ($errors->has('password_confirmation'))
                                        <span class="text-danger errbk">{{ $errors->first('password_confirmation') }}</span>
                                        @endif
                                    </div>
                                    <div class="form-footer">
                                        <button type="submit" class="btn btn-primary btn-block">Submit</button>
                                    </div>
                                    <div class="text-center text-muted mt-3 ">
                                        Forget it, <a href="login.html">send me back</a> to the sign in screen.
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <!-- CONTAINER CLOSED -->
            </div>
        </div>
        <!--END PAGE -->

    </div>
    <!-- BACKGROUND-IMAGE CLOSED -->

    <!-- JQUERY JS -->
    <script src="{{asset('assets/js/jquery-3.4.1.min.js')}}"></script>

    <!-- BOOTSTRAP JS -->
    <script src="{{asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{asset('assets/plugins/bootstrap/js/popper.min.js')}}"></script>

    <!-- SPARKLINE JS-->
    <script src="{{asset('assets/js/jquery.sparkline.min.js')}}"></script>

    <!-- CHART-CIRCLE JS-->
    <script src="{{asset('assets/js/circle-progress.min.js')}}"></script>

    <!-- RATING STAR -->
    <script src="{{asset('assets/plugins/rating/jquery.rating-stars.js')}}"></script>

    <!-- INPUT MASK JS-->
    <script src="{{asset('assets/plugins/input-mask/jquery.mask.min.js')}}"></script>

    <!-- CUSTOM SCROLL BAR JS-->
    <script src="{{asset('assets/plugins/scroll-bar/jquery.mCustomScrollbar.concat.min.js')}}"></script>

    <!-- CUSTOM JS-->
    <script src="{{asset('assets/js/custom.js')}}"></script>

</body>

</html>