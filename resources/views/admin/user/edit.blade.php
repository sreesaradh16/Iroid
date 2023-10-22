@extends('admin.layout.app')
@section('user','active')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="border-0">
                    <div class="tab-content">
                        <div class="tab-pane active show" id="tab-51">
                            <div id="profile-log-switch">
                                <div class="card-header">
                                    <h3 class="card-title">Edit User</h3>
                                </div>
                                <br>
                                <form action="{{route('users.update',[$user->id])}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    {{ method_field('PUT') }}
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="form-label">Name *</label>
                                                <input type="text" class="form-control" name="name" value="{{ $user->name }}" required placeholder="Name">
                                            </div>
                                            @if ($errors->has('name'))
                                            <span class="text-danger errbk">{{ $errors->first('name') }}</span>
                                            @endif
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="form-label">Email *</label>
                                                <input type="text" class="form-control" name="email" value="{{ $user->email }}" required placeholder="Email">
                                            </div>
                                            @if ($errors->has('email'))
                                            <span class="text-danger errbk">{{ $errors->first('email') }}</span>
                                            @endif
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="form-group">
                                                <div class="form-label">Image (Supported Format : png, jpg, jpeg)</div>
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" onchange="getImageName()" accept=".png, .jpg, .jpeg" id="image" name="image">
                                                    <label class="custom-file-label" id="imageLabel">Choose File</label>
                                                </div>
                                            </div>
                                            @if ($errors->has('image'))
                                            <span class="text-danger errbk">{{ $errors->first('image') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="form-label">Password</label>
                                                <input type="password" class="form-control" id="password" name="password" placeholder="Password">
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
                                                    <button type="submit" class="btn btn-raised btn-info">Update</button>
                                                    <a class="btn btn-danger" href="{{ route('users.index') }}">Cancel</a>
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
<script src="{{asset('assets/js/form-elements.js')}}"></script>
<script src="{{asset('assets/plugins/bootstrap-daterangepicker/daterangepicker.js')}}"></script>
<script src="{{asset('assets/plugins/select2/select2.full.min.js')}}"></script>
<script src="{{asset('assets/plugins/time-picker/jquery.timepicker.js')}}"></script>
<script src="{{asset('assets/plugins/time-picker/toggles.min.js')}}"></script>
<script src="{{asset('assets/plugins/date-picker/spectrum.js')}}"></script>
<script src="{{asset('assets/plugins/date-picker/jquery-ui.js')}}"></script>
<script src="{{asset('assets/plugins/input-mask/jquery.maskedinput.js')}}"></script>
<script>
    function togglePassword() {
        const passwordInput = document.querySelector("#password");
        $("#eye").toggleClass("fa-eye-slash");
        const type = passwordInput.getAttribute("type") === "password" ? "text" : "password"
        passwordInput.setAttribute("type", type)
    }

    function togglePasswordConfirmation() {
        const passwordInput = document.querySelector("#password_confirmation")
        $("#eye2").toggleClass("fa-eye-slash");
        const type = passwordInput.getAttribute("type") === "password" ? "text" : "password"
        passwordInput.setAttribute("type", type)
    }

    function changeStatus() {
        if ($('#is_active').is(':checked')) {
            $("#statusText").text('Active');
        } else {
            $("#statusText").text('Inactive');
        }
    }
</script>
@endsection