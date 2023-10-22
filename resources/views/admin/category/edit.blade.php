@extends('admin.layout.app')
@section('category','active')
@section('content')
<div class="row">
    <div class="col-lg-12">
        <div class="card">
            <div class="card-body">
                <div class="border-0">
                    <div class="tab-content">
                        <div class="tab-pane active show">
                            <div id="profile-log-switch">
                                <div class="card-header">
                                    <h3 class="card-title">Edit Category</h3>
                                </div>
                                <br>
                                <form action="{{route('categories.update',[$category->id])}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    {{ method_field('PUT') }}
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="form-group">
                                                <label class="form-label">Name *</label>
                                                <input type="text" class="form-control" name="name" value="{{ $category->name }}" placeholder="Name" required>
                                            </div>
                                            @if ($errors->has('name'))
                                            <span class="text-danger errbk">{{ $errors->first('name') }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <center>
                                                    <button type="submit" class="btn btn-raised btn-info">Update</button>
                                                    <a class="btn btn-danger" href="{{ route('categories.index') }}">Cancel</a>
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