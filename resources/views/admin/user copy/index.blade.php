@extends('admin.layout.app')
@section('css')
<!-- DATA TABLE CSS -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.datatables.net/1.11.4/css/dataTables.bootstrap5.min.css" rel="stylesheet">
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
                                        <table id="user_table" class="table table-bordered data-table">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Name</th>
                                                    <th>Email</th>
                                                    <th width="100px">Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
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
<!-- modal open -->
<div id="updateModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Edit</h4>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" placeholder="Name" required>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" placeholder="Email">
                </div>
            </div>
            <div class="modal-footer">
                <input type="hidden" id="user_id" value="0">
                <button type="button" class="btn btn-success btn-sm" id="btn_save">Save</button>
                <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!-- modal ends -->
@endsection
@section('js')
<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>
<script src="https://cdn.datatables.net/1.11.4/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.11.4/js/dataTables.bootstrap5.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {

        // list user details
        var user_table = $('#user_table').DataTable({
            processing: true,
            serverSide: true,
            ajax: "{{ route('users.index') }}",
            columns: [{
                    data: 'id',
                    name: 'id'
                },
                {
                    data: 'name',
                    name: 'name'
                },
                {
                    data: 'email',
                    name: 'email'
                },
                {
                    data: 'action',
                    name: 'action',
                    orderable: false,
                    searchable: false
                },
            ]
        });

        // update user details
        $('#user_table').on('click', '.updateUser', function() {
            var id = $(this).data('id');

            $('#user_id').val(id);
            var url = "{{ route('users.edit',['id']) }}";
            url = url.replace('id', id)

            // AJAX request
            $.ajax({
                url: url,
                type: 'get',
                data: {
                    "_token": "{{ csrf_token() }}",
                },
                dataType: 'json',
                success: function(response) {

                    if (response.success == 1) {
                        $('#name').val(response.name);
                        $('#email').val(response.email);
                        user_table.ajax.reload();
                    } else {
                        alert("Invalid ID.");
                    }
                }
            });

        });

        // Save user 
        $('#btn_save').click(function() {
            var id = $('#user_id').val();

            var name = $('#name').val().trim();
            var email = $('#email').val().trim();

            if (name != '' && email != '') {

                var url = "{{ route('users.update',['id']) }}";
                url = url.replace('id', id)

                // AJAX request
                $.ajax({
                    url: url,
                    type: 'patch',
                    data: {
                        "_token": "{{ csrf_token() }}",
                        name: name,
                        email: email
                    },
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    dataType: 'json',
                    success: function(response) {
                        if (response.success == 1) {
                            // Empty and reset the values
                            $('#name', '#email').val('');
                            $('#user_id').val(0);

                            // Reload DataTable
                            user_table.ajax.reload();

                            // Close modal
                            $('#updateModal').modal('toggle');
                        } else {
                            alert(response.msg);
                        }
                    }
                });

            } else {
                alert('Please fill all fields.');
            }
        });

        // Delete record
        $('#user_table').on('click', '.deleteUser', function() {
            var id = $(this).data('id');

            var deleteConfirm = confirm("Are you sure?");
            if (deleteConfirm == true) {

                var url = "{{ route('users.destroy',['id']) }}";
                url = url.replace('id', id)

                // AJAX request
                $.ajax({
                    url: url,
                    type: 'delete',
                    data: {
                        "_token": "{{ csrf_token() }}",
                        id: id
                    },
                    success: function(response) {
                        if (response.success == 1) {
                            // Reload DataTable
                            user_table.ajax.reload();
                        } else {
                            alert("Invalid ID.");
                        }
                    }
                });
            }

        });

    });
</script>
@endsection