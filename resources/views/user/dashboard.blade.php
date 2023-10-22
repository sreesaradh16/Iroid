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

    <div id="global-loader">
        <img src="{{ asset('assets/images/loader.svg ')}}" class="loader-img" alt="Loader">
    </div>

    <div class="page">
        <div class="page-main">
            <div class="app-content" style="padding: 20px;">
                <div class="">

                    <div class="page-header">
                        <div>
                            <h1 class="page-title">Dashboard</h1>
                        </div>

                        <div class="ml-auto pageheader-btn">
                            <a href="#" class="btn btn-success btn-icon text-white mr-2">
                                <span>
                                    <i class="fe fe-plus"></i>
                                </span> Add Post
                            </a>

                            <a href="#" class="btn btn-danger btn-icon text-white" data-toggle="modal" data-target="#addCategoriesToPost">
                                <span>
                                    <i class="fe fe-plus"></i>
                                </span> Add Category to Post
                            </a>
                        </div>
                        <div class="dropdown profile-1">
                            <a href="#" data-toggle="dropdown" class="nav-link pr-2 leading-none d-flex">
                                <span>
                                    <img src="{{asset('assets/images/avatar.png')}}" alt="profile-user" class="avatar  profile-user brround cover-image">
                                </span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                <div class="drop-heading">
                                    <div class="text-center">
                                        <h5 class="text-dark mb-0"></h5>
                                        <small class="text-muted"></small>
                                    </div>
                                </div>
                                <div class="dropdown-divider m-0"></div>
                                <a class="dropdown-item" href="">
                                    <i class="dropdown-icon mdi mdi-account-outline"></i> Profile
                                </a>
                                <a class="dropdown-item" href="">
                                    <i class="dropdown-icon mdi  mdi-logout-variant"></i> Sign Out
                                </a>
                            </div>
                        </div>
                        <!-- <div class="ml-auto pageheader-btn">
                            <a href="{{ route('user.register') }}" class="btn btn-success btn-icon text-white mr-2">
                                <span>
                                </span> Register
                            </a>
                            <a href="{{ route('user.login') }}" class="btn btn-danger btn-icon text-white">
                                <span>
                                </span> Login
                            </a>
                        </div> -->
                    </div>
                    <hr>

                    <input type="text" class="form-control" placeholder="Search" id="search">
                    <hr>

                    <!-- filter starts -->
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-label">Post Name</label>
                                <input type="text" class="form-control" name="post" id="post" placeholder="Post Name" value="{{ request()->post }}">
                                <div class="post">
                                    @if ($errors->has('post'))
                                    <span class="text-danger errbk">{{ $errors->first('post') }}</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-label">Author Name</label>
                                <input type="text" class="form-control" name="author" id="author" placeholder="Author Name" value="{{ request()->author }}">
                                <div class="author">
                                    @if ($errors->has('author'))
                                    <span class="text-danger errbk">{{ $errors->first('author') }}</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-label">Date</label>
                                <input type="date" class="form-control" name="date" id="date" placeholder="Date" value="{{ request()->date }}">
                                <div class="date">
                                    @if ($errors->has('date'))
                                    <span class="text-danger errbk">{{ $errors->first('date') }}</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="pt-5">
                        <center>
                            <button type="button" onclick="filter()" class="btn btn-raised btn-primary">Filter</button>
                            <a href="{{route('user.dashboard')}}" class="btn btn-info">Cancel</a>
                        </center>
                    </div>
                    <!-- filter ends -->

                    <hr>

                    <div class="row row-cards row-deck" id="display">
                        @foreach($posts as $post)
                        @php
                        foreach($post->categories as $category)
                        {
                        $cats[] = $category->name;
                        }
                        @endphp
                        <div class="col-md-4">
                            <div class="card">
                                <img class="card-img-topbr-tr-0 br-tl-0" src="{{ $post->image_url }}" height="300px" alt="Card image cap">
                                <div class="card-header">
                                    <h6 class="card-dsc">Categories - {{ implode (",", $cats) }}</h6>
                                </div>
                                <div class="card-body">
                                    <p class="card-text">{!! $post->content !!}</p>
                                    <a href="#" class="float-right">{{ Carbon\Carbon::parse($post->date)->format('d M Y ')  }}</a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- modal open -->
    <div id="addCategoriesToPost" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Add Categories to Post</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label class="form-label">Post *</label>
                        <select class="form-control" name="post_id" id="post_id" required>
                            <option value="">Choose Post</option>
                            @foreach($all_posts as $post)
                            <option value="{{$post->id}}">{{$post->name}}</option>
                            @endforeach
                        </select>
                        <div class="name">
                            @if ($errors->has('post_id'))
                            <span class="text-danger errbk">{{ $errors->first('post_id') }}</span>
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="form-label">Category *</label>
                        <select class="form-control select2-show-search" style="width:100%" name="category_ids[]" id="category_ids" multiple required>
                            <option value="">Choose Category</option>
                            @foreach($all_categories as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach
                        </select>
                        <div class="name">
                            @if ($errors->has('category_id'))
                            <span class="text-danger errbk">{{ $errors->first('category_id') }}</span>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-success btn-sm" id="btn_save">Save</button>
                    <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
    <!-- modal ends -->

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

</body>
<script>
    $('#search').on('keyup', function() {
        search();
    });
    search();

    function search() {
        var keyword = $('#search').val();

        $.post('{{ route("user.search.post") }}', {
                "_token": "{{ csrf_token() }}",
                keyword: keyword
            },
            function(data) {
                table_post_row(data);
            });
    }

    // table row with ajax
    function table_post_row(res) {
        let htmlView = '';
        if (res.posts.length <= 0) {
            htmlView += `
            <tr>
            <td colspan="4">No data.</td>
            </tr>`;
        }

        for (let i = 0; i < res.posts.length; i++) {
            htmlView += `
                <div class="col-md-4">
                    <div class="card">
                        <img class="card-img-topbr-tr-0 br-tl-0" src="` + res.posts[i]['image_url'] + `" height="300px" alt="Card image cap">
                        <div class="card-header">
                            <h5 class="card-title">` + res.posts[i]['name'] + ` - ` + res.posts[i]['author'] + `</h5>
                        </div>
                        <div class="card-body">
                            <p class="card-text">` + res.posts[i]['content'] + `</p>
                            <a href="#" class="float-right">{{ Carbon\Carbon::parse($post->date)->format('d M Y ')  }}</a>
                        </div>
                    </div>
                </div>`;
        }

        $('#display').html(htmlView);
    }

    function filter() {
        var url = "{{ route('user.dashboard') }}";
        var post = $('#post').val();
        var author = $('#author').val();
        var date = $('#date').val();

        location.href = url + '?post=' + post + '&author=' + author + '&date=' + date;
    }

    // Save user 
    $('#btn_save').click(function() {

        var post_id = $('#post_id').val();
        var category_ids = $('#category_ids').val();

        if (post_id != '' && category_ids != '') {

            var url = "{{ route('user.add.category.post') }}";

            // AJAX request
            $.ajax({
                url: url,
                type: 'post',
                data: {
                    "_token": "{{ csrf_token() }}",
                    post_id: post_id,
                    category_ids: category_ids
                },
                dataType: 'json',
                success: function(response) {
                    location.reload(true)
                }
            });

        } else {
            alert('Please fill all fields.');
        }
    });
</script>

</html>