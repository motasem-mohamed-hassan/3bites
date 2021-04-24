@extends('layouts.dashboard')
@section('content')

    {{-- <ul>
        @foreach ($admins as $admin)
            <li>{{ $admin->name }}</li>
            <li>{{ $admin->email }}</li>
            <li>{{ $admin->is_super == true ? "superAdmin" : "Admin" }}</li>
            <li>
                <form action="{{ route('d.change.permession', $admin->id) }}" method="post">
                    @csrf
                    @method('put')
                    <button>Change</button>
                </form>
            </li>
        @endforeach

    </ul>

    <form action="{{ route('d.admin.store') }}" method="POST">
        @csrf
        <input type="text" name="name">
        <input type="text" name="email">
        <input type="text" name="password">
        <button type="submit">Create</button>
    </form> --}}

     <!-- Content Header (Page header) -->
     <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0 text-dark">Admins</h1>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <section class="content">
        <div class="container-fluid">
            <table class="table table-bordered table-striped">
                <tr class="bg-info">
                    <th>Admin ID</th>
                    <th>Name</th>
                    <th>Email</th>
                    {{-- <th>رقم الهاتف</th> --}}
                    <th>Status</th>
                    <th>change status</th>
                </tr>
                @foreach ($admins as $admin)
                        <tr>
                            <td>{{ $admin->id }}</td>
                            <td>{{ $admin->name }}</td>
                            <td>{{ $admin->email }}</td>
                            <td>{{ $admin->is_super == true ? "superAdmin" : "Admin" }}</td>
                            <td>
                                <form action="{{ route('d.change.permession', $admin->id) }}" method="post">
                                    @csrf
                                    @method('put')
                                    <button>Change</button>
                                </form>
                            </td>
                        </tr>
                @endforeach
            </table>
        </div>
    </section>
    <div class="button-group d-flex">
        <button type="button" id='addBtn' {{-- product_name_en="{{ $product->name_en }}"
          product_name_ar="{{ $product->name_ar }}"
          product_id="{{ $product->id }}" --}} class="mr-1 addBtn btn btn-sm btn-primary add-product"
            data-toggle="modal" data-target="#addproductModal">
            Add admin
        </button>
        <div class="container py-3">
            <div class="modal" tabindex="-1" role="dialog" id="addproductModal">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Add admin</h5>

                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>

                        <form action="{{ route('d.admin.store') }}" id="updateForm" method="post"
                            enctype="multipart/form-data">
                            @csrf

                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="exampleFormControlSelect1">Select role</label>
                                    <select class="form-control" id="exampleFormControlSelect1" name="is_super">
                                        <option selected disabled>---chose permession---</option>
                                        <option value="0">admin</option>
                                        <option value="1">super admin</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Admin Name</label>
                                    <input type="text" id="addName" name="name" class="form-control" value="">
                                </div>
                                <div class="form-group">
                                    <label>Admin Email</label>
                                    <input type="email" id="addEmail" name="email" class="form-control" value="">
                                </div>
                                <div class="form-group">
                                    <label>Admin Password</label>
                                    <input type="Password" id="addStatus" name="password" class="form-control" value="">
                                </div>
                            </div>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                <button type="submit" id="submitToUpdate" class="btn btn-primary">Add</button>
                            </div>
                    </div>
                    </form>
                </div>
            </div>


@endsection
