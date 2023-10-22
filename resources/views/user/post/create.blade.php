@extends('user.layout.app')
@section('post','active')
@section('content')
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
                                <form action="{{route('user.posts.store')}}" method="POST" id="post_form" enctype="multipart/form-data">
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
                                                <label class="form-label">Email *</label>
                                                <input type="email" class="form-control" name="email" value="{{old('email')}}" placeholder="Email" required>
                                            </div>
                                            @if ($errors->has('email'))
                                            <span class="text-danger errbk">{{ $errors->first('email') }}</span>
                                            @endif
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="form-label">Password *</label>
                                                <input type="password" class="form-control" id="password" name="password" value="{{old('password')}}" placeholder="Password" required>
                                                <i class="fa fa-eye password-eye" id="eye" onclick="togglePassword()"></i>
                                            </div>
                                            @if ($errors->has('password'))
                                            <span class="text-danger errbk">{{ $errors->first('password') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <center>
                                                    <button type="submit" class="btn btn-raised btn-info">Submit</button>
                                                    <a class="btn btn-danger" href="{{ route('user.users.index') }}">Cancel</a>
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
@endsection
@section('js')
<script>
    function togglePassword() {
        const passwordInput = document.querySelector("#password");
        $("#eye").toggleClass("fa-eye-slash");
        const type = passwordInput.getAttribute("type") === "password" ? "text" : "password"
        passwordInput.setAttribute("type", type)
    }

    function getImageName() {
        $("#imageLabel").text($('#image').val().replace(/^.*\\/, "").substring(0, 50) + '...');
    }
</script>
@endsection