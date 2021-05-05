@extends('layouts.dashboard')
@section('content')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    {{-- <h1 class="m-0 text-dark"></h1> --}}
                    <div class="callout callout-info w-25 mt-3">
                        <h3>Users</h3>

                    </div>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Users Information </h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>User ID</th>
                                <th>User name</th>
                                <th>Phone </th>
                                <th>Points</th>
                                <th>Email</th>
                                <th>Send e-mail</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($users as $user)
                                <tr>
                                    <td> {{ $user->id }}</td>
                                    <td> {{ $user->first_name }} {{ $user->last_name }}</td>
                                    <td> {{ $user->phone }}</td>
                                    <td>{{ $user->points }}</td>
                                    <td> {{ $user->email }}</td>
                                    <td>

                                        <button type="button" class="btn btn-default" data-toggle="modal"
                                            data-target="#modal-default">
                                            Send e-mail
                                        </button>
                                    </td>
                                </tr>
                                <div class="modal fade" id="modal-default">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h4 class="modal-title">Send e-mail</h4>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <!-- general form elements -->
                                                <!-- /.card-header -->
                                                <!-- form start -->
                                                <form role="form">
                                                    <div class="card-body">
                                                        <div class="form-group">
                                                            <label for="exampleInputEmail1">Email address</label>
                                                            <input type="email" value="{{ $user->email }}"
                                                                class="form-control to" placeholder="Enter email" required>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="exampleInputSubject">subject</label>
                                                            <input type="text" class="form-control subject"
                                                                placeholder="subject">
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="exampleInputContent">Content</label>
                                                            <textarea type="text" rows="3" class="form-control Content"
                                                                placeholder="Content"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="card-footer">
                                                        <button type="button" onclick="sendmail()"
                                                            class="btn btn-primary">Submit</button>
                                                    </div>
                                                </form>
                                                <div class="modal-footer justify-content-between">
                                                    <button type="button" class="btn btn-default"
                                                        data-dismiss="modal">Close</button>
                                                    {{-- <button type="button" class="btn btn-primary">Save changes</button> --}}
                                                </div>
                                            </div>
                                            <!-- /.modal-content -->
                                        </div>
                                        <!-- /.modal-dialog -->
                                    </div>
                                    <!-- /.modal -->
                            @endforeach
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
        </div>
    </section>



@endsection

@section('scripts')
    <!-- DataTables -->
    <script src="{{ asset('admin/plugins/datatables/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('admin/plugins/datatables-bs4/js/dataTables.bootstrap4.js') }}"></script>
    <script>
        $(function() {
            $("#example1").DataTable();
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": true,
                "ordering": true,
                "info": true,
                "autoWidth": false,
            });
        });

    </script>

    <script>
        function sendmail() {

            var to = $('.to').val();
            var subject = $('.subject').val();
            var content = $('.Content').val();
            window.open("mailto:" + to + "?subject=" + subject + "&body=" + content)
        }

    </script>

@endsection
