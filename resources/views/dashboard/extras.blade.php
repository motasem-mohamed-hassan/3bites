@extends('layouts.dashboard')

@section('css')
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('admin/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- DataTables -->
    <link rel="stylesheet" href="{{ asset('admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">

@endsection

@section('content')



    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Extras table</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Type</th>
                        <th>Name</th>
                        <th>Price</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($extras as $extra)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $extra->type }}</td>
                            <td>{{ $extra->name }}</td>
                            <td>{{ $extra->price }}</td>
                            <td>
                                <form action="{{ route('d.extra.delete', $extra->id) }}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button type="button" class="btn btn-primary" data-toggle="modal"
                                        data-target="#CreateModal{{ $extra->id }}">
                                        Update
                                    </button>

                                    <button type="submit" class="btn btn-danger">
                                        Delte
                                    </button>
                                </form>


                            </td>
                        </tr>
                        {{-- Update Modal --}}
                        <div class="modal fade" id="CreateModal{{ $extra->id }}" tabindex="-1" role="dialog"
                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Update Extra</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <form action="{{ route('d.extra.update', $extra->id) }}" method="POST">
                                        @csrf
                                        @method('put')
                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label>Select type</label>
                                                <select class="form-control" name="type">
                                                    <option selected>{{ $extra->type }}</option>
                                                    <option value="Toppings">Toppings</option>
                                                    <option value="Dips">Dips</option>
                                                    <option value="Drinks">Drinks</option>
                                                </select>
                                            </div>

                                            <div class="form-group">
                                                <label>Extra name</label>
                                                <input type="text" id="addName" value="{{ $extra->name }}" name="name"
                                                    class="form-control" value="" required>
                                            </div>
                                            <div class="form-group">
                                                <label>Extra Price</label>
                                                <input type="number" id="addDescription" value="{{ $extra->price }}"
                                                    name="price" class="form-control" value="" required>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Save changes</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        {{-- End Update Modal --}}
                    @endforeach
                </tbody>
            </table>
        </div>
        <!-- /.card-body -->
        <div class="button-group d-flex">
            <button type="button" id='addBtn' class="mr-1 addBtn btn btn-sm btn-primary add-category" data-toggle="modal"
                data-target="#addCategoryModal">
                Add Extra
            </button>
            <div class="container py-3">
                <div class="modal" tabindex="-1" role="dialog" id="addCategoryModal">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Add new category</h5>

                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>

                            <form action="{{ route('d.extra.store') }}" id="updateForm" method="post">
                                @csrf
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label>Select type</label>
                                        <select class="form-control" name="type" required>
                                            <option selected disabled value="">Choose type</option>
                                            <option value="Toppings">Toppings</option>
                                            <option value="Dips">Dips</option>
                                            <option value="Drinks">Drinks</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label>Extra name</label>
                                        <input type="text" id="addName" name="name" class="form-control" value="" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Extra Price</label>
                                        <input type="number" id="addDescription" name="price" class="form-control" value=""
                                            required>
                                    </div>
                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                    <button type="submit" id="submitToUpdate" class="btn btn-primary">Add</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>
@endsection

@section('scripts')
    <!-- DataTables -->
    <script src="{{ asset('admin/plugins/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('admin/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
    <script src="{{ asset('admin/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>

    <script>
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "autoWidth": false,
            });
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });

    </script>
@endsection
