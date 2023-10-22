@extends('admin.layout.app')
@section('user','active')
@section('content')
@section('css')
<!-- SELECT2 CSS -->
<link href="{{asset('assets/plugins/select2/select2.min.css')}}" rel="stylesheet" />
@endsection
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="border-0">
                    <div class="tab-content">
                        <div class="tab-pane active show">
                            <div id="profile-log-switch">
                                <div class="card-header">
                                    <h3 class="card-title">Edit Post</h3>
                                </div>
                                <br>
                                <form action="{{route('posts.update',[$post->id])}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    {{ method_field('PUT') }}
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="form-label">Name *</label>
                                                <input type="text" class="form-control" name="name" value="{{ $post->name }}" placeholder="Name" required>
                                            </div>
                                            @if ($errors->has('name'))
                                            <span class="text-danger errbk">{{ $errors->first('name') }}</span>
                                            @endif
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="form-label">Author *</label>
                                                <input type="text" class="form-control" name="author" value="{{$post->author }}" placeholder="author" required>
                                            </div>
                                            @if ($errors->has('author'))
                                            <span class="text-danger errbk">{{ $errors->first('author') }}</span>
                                            @endif
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="form-label">Date *</label>
                                                <input type="date" class="form-control" id="date" name="date" value="{{$post->date }}" placeholder="date" required>
                                            </div>
                                            @if ($errors->has('date'))
                                            <span class="text-danger errbk">{{ $errors->first('date') }}</span>
                                            @endif
                                        </div>
                                        <div class="col-md-8">
                                            <div class="form-group">
                                                <label class="form-label">Content *</label>
                                                <textarea cols="30" rows="5" class="ckeditor form-control" name="content" value="{{$post->content }}">{{ $post->content }}</textarea>
                                            </div>
                                            @if ($errors->has('content'))
                                            <span class="text-danger errbk">{{ $errors->first('content') }}</span>
                                            @endif
                                        </div>
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="form-label">Image *</label>
                                                <input type="file" class="form-control" name="image" value="{{$post->image }}" placeholder="image" required>
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
<script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
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
</script>
@endsection