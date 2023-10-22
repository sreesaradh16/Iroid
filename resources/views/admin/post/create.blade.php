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
                                <div class="media-heading">
                                    <h5><strong>Create Post</strong></h5>
                                </div>
                                <br>
                                <form action="{{route('posts.store')}}" method="POST" id="user_form" enctype="multipart/form-data">
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
<!-- ck editor cdn -->
<script src="//cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
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