@extends('admin.layout.app')
@section('css')
<!-- DATA TABLE CSS -->
<link href="{{asset('assets/plugins/datatable/dataTables.bootstrap4.min.css')}}" rel="stylesheet" />
@endsection
@section('content')
<div class="">
    <div class="row justify-content-center">
        <div class="col-md-12 col-lg-12">
            <div class="card">
                <div class="row">
                    <div class="col-12">
                        <div class="col-lg-12">
                            <div class="card-header">
                                <h3 class="mb-0 card-title">List Users</h3>
                            </div>
                            <div class="card-body">
                                <hr>
                                <a href="{{route('users.create')}}" class="btn btn-block btn-info">
                                    <i class="fa fa-plus"></i> Create User </a>
                                </br>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table id="example" class="table table-striped table-bordered text-nowrap w-100">
                                            <thead>
                                                <tr>
                                                    <th>Sl.No</th>
                                                    <th>Name</th>
                                                    <th>Email</th>
                                                    <th>Image</th>
                                                    <th class="no-sort">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($users as $key=>$user)
                                                <tr>
                                                    <td>{{ $key+1 }}</td>
                                                    <td>{{ $user->name}}</td>
                                                    <td>{{ $user->email}}</td>
                                                    @if($user->image)
                                                    <td><img src="{{ $user->image_url }}" height="50px"></td>
                                                    @else
                                                    <td><img src="{{asset('assets/images/avatar.png')}}" height="50px"></td>
                                                    @endif
                                                    <td>
                                                        <a class="btn btn-sm btn-cyan" href="{{route('users.edit',[$user->id])}}"><i class="fa fa-edit"></i> Edit</a>
                                                        <a class="btn btn-sm btn-red btn-action frmsubmit" href="{{route('users.destroy',[$user->id])}}" method="DELETE"><i class="fa fa-trash"></i> Delete</a>
                                                    </td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection