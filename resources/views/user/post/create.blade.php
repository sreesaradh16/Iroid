<!doctype html>
<html lang="en" dir="ltr">

<head>

    <!-- META DATA -->
    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Volgh –  Bootstrap 4 Responsive Application Admin panel Theme Ui Kit & Premium Dashboard Design Modern Flat HTML Template">
    <meta name="author" content="Spruko Technologies Private Limited">
    <meta name="keywords" content="analytics dashboard, bootstrap 4 web app admin template, bootstrap admin panel, bootstrap admin template, bootstrap dashboard, bootstrap panel, Application dashboard design, dashboard design template, dashboard jquery clean html, dashboard template theme, dashboard responsive ui, html admin backend template ui kit, html flat dashboard template, it admin dashboard ui, premium modern html template">

    <!-- FAVICON -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/images/brand/favicon.ico')}}" />

    <!-- TITLE -->
    <title>User - Dashboard </title>

    <!-- BOOTSTRAP CSS -->
    <link href="{{ asset('assets/plugins/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" />

    <!-- STYLE CSS -->
    <link href="{{ asset('assets/css/style.css')}}" rel="stylesheet" />
    <link href="{{ asset('assets/css/skin-modes.css')}}" rel="stylesheet" />

    <!--HORIZONTAL CSS-->
    <link href="{{ asset('assets/plugins/horizontal-menu/horizontal-menu.css')}}" rel="stylesheet" />

    <!--C3 CHARTS CSS -->
    <link href="{{ asset('assets/plugins/charts-c3/c3-chart.css')}}" rel="stylesheet" />

    <!-- GALLERY CSS -->
    <link href="{{ asset('assets/plugins/gallery/gallery.css')}}" rel="stylesheet">

    <!-- CUSTOM SCROLL BAR CSS-->
    <link href="{{ asset('assets/plugins/scroll-bar/jquery.mCustomScrollbar.css')}}" rel="stylesheet" />

    <!--- FONT-ICONS CSS -->
    <link href="{{ asset('assets/css/icons.css')}}" rel="stylesheet" />

    <!-- SIDEBAR CSS -->
    <link href="{{ asset('assets/plugins/sidebar/sidebar.css')}}" rel="stylesheet">

    <!-- COLOR SKIN CSS -->
    <link id="theme" rel="stylesheet" type="text/css" media="all" href="{{ asset('assets/colors/color1.css')}}" />

    <link href="{{asset('assets/plugins/select2/select2.min.css')}}" rel="stylesheet" />


</head>

<body>

    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="border-0">
                        <div class="tab-content">
                            <div class="tab-pane active show" id="tab-51">
                                <div id="profile-log-switch">
                                    <div class="media-heading">
                                        <h5><strong>Create Post</strong></h5>
                                    </div>
                                    <br>
                                    <form action="{{route('user.posts.store')}}" method="POST" id="user_form" enctype="multipart/form-data">
                                        @csrf
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="form-label">Name *</label>
                                                    <input type="text" class="form-control" name="name" value="{{old('name')}}" placeholder="Name" required>
                                                </div>
                                                @if ($errors->has('name'))
                                                <span class="text-danger errbk">{{ $errors->first('name') }}</span>
                                                @endif
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="form-label">Author *</label>
                                                    <input type="text" class="form-control" name="author" value="{{old('author')}}" placeholder="author" required>
                                                </div>
                                                @if ($errors->has('author'))
                                                <span class="text-danger errbk">{{ $errors->first('author') }}</span>
                                                @endif
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="form-label">Date *</label>
                                                    <input type="date" class="form-control" id="date" name="date" value="{{old('date')}}" placeholder="date" required>
                                                </div>
                                                @if ($errors->has('date'))
                                                <span class="text-danger errbk">{{ $errors->first('date') }}</span>
                                                @endif
                                            </div>
                                            <div class="col-md-8">
                                                <div class="form-group">
                                                    <label class="form-label">Content *</label>
                                                    <textarea cols="30" rows="5" class="ckeditor form-control" name="content" value="{{old('content')}}">{{old('content')}}</textarea>
                                                </div>
                                                @if ($errors->has('content'))
                                                <span class="text-danger errbk">{{ $errors->first('content') }}</span>
                                                @endif
                                            </div>
                                            <div class="col-md-4">
                                                <div class="form-group">
                                                    <label class="form-label">Image *</label>
                                                    <input type="file" class="form-control" name="image" value="{{old('image')}}" placeholder="image" required>
                                                </div>
                                                @if ($errors->has('image'))
                                                <span class="text-danger errbk">{{ $errors->first('image') }}</span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="form-group">
                                                    <center>
                                                        <button type="submit" class="btn btn-raised btn-info">Submit</button>
                                                        <a class="btn btn-danger" href="{{ route('user.dashboard') }}">Cancel</a>
                                                    </center>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- BACK-TO-TOP -->
    <a href="#top" id="back-to-top"><i class="fa fa-angle-up"></i></a>

    <!-- JQUERY JS -->
    <script src="{{ asset('assets/js/jquery-3.4.1.min.js')}}"></script>

    <!-- BOOTSTRAP JS -->
    <script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{ asset('assets/plugins/bootstrap/js/popper.min.js')}}"></script>

    <!-- SPARKLINE JS -->
    <script src="{{ asset('assets/js/jquery.sparkline.min.js')}}"></script>

    <!-- CHART-CIRCLE JS -->
    <script src="{{ asset('assets/js/circle-progress.min.js')}}"></script>



    <!-- RATING STAR JS -->
    <script src="{{ asset('assets/plugins/rating/jquery.rating-stars.js')}}"></script>

    <!-- INPUT MASK JS -->
    <script src="{{ asset('assets/plugins/input-mask/jquery.mask.min.js')}}"></script>

    <!-- SIDE-MENU JS -->
    <script src="{{ asset('assets/plugins/horizontal-menu/horizontal-menu.js')}}"></script>

    <!-- CUSTOM SCROLL BAR JS-->
    <script src="{{ asset('assets/plugins/scroll-bar/jquery.mCustomScrollbar.concat.min.js')}}"></script>

    <!-- SIDEBAR JS -->
    <script src="{{ asset('assets/plugins/sidebar/sidebar.js')}}"></script>

    <!-- STICKY JS -->
    <script src="{{ asset('assets/js/stiky.js')}}"></script>

    <!-- CUSTOM JS-->
    <script src="{{ asset('assets/js/custom.js')}}"></script>

    <script src="{{asset('assets/js/form-elements.js')}}"></script>
    <script src="{{asset('assets/plugins/bootstrap-daterangepicker/daterangepicker.js')}}"></script>
    <script src="{{asset('assets/plugins/select2/select2.full.min.js')}}"></script>
    <script src="{{asset('assets/plugins/time-picker/jquery.timepicker.js')}}"></script>
    <script src="{{asset('assets/plugins/time-picker/toggles.min.js')}}"></script>
    <script src="{{asset('assets/plugins/date-picker/spectrum.js')}}"></script>
    <script src="{{asset('assets/plugins/date-picker/jquery-ui.js')}}"></script>
    <script src="{{asset('assets/plugins/input-mask/jquery.maskedinput.js')}}"></script>
    <script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>


</body>

</html>