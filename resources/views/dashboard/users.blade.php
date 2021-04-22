@extends('layouts.dashboard')
@section('content')
{{--
    <ul>
        @foreach ($users as $user)
            <li>{{ $user->first_name }}</li>
            <li>{{ $user->last_name }}</li>
            <li>{{ $user->email }}</li>
            <li>{{ $user->phone }}</li>
        @endforeach

    </ul> --}}
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
                  <h3 class="card-title" >Users Information </h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <table id="example1" class="table table-bordered table-striped">
                    <thead>
                    <tr>
                      <th> User ID</th>
                      <th>User name</th>
                      <th>Email</th>
                      <th>Phone </th>
                      <th>Address</th>
                    </tr>
                    </thead>
                    <tbody>
                        @foreach ($users as $index => $user)
                        <tr>
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->first_name }}  {{ $user->last_name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->phone }}</td>
                            <td>{{ $user->address }}</td>
                        </tr>
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
    $(function () {
      $("#example1").DataTable();
      $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
      });
    });
</script>

@endsection
