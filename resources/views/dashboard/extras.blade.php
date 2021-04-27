@extends('layouts.dashboard')
@section('content')
<div class="card">
  <div class="card-header">
    <h3 class="card-title"> Extras</h3>
  </div>

  {{-- <div class="card-body p-0">
    <table class="table table-striped">
      <thead>
        <tr>
          <th>Name</th>
          <th>Price</th>
          <th>Type</th>
        </tr>
      </thead>
      <tbody class="rows">
        <div class="empty"></div>
      </tbody>
    </table>
  </div> --}}
  <div class="form-group">
    <table class="table">
        <thead>
            <tr>
                <th scope="col">Size</th>
                <th scope="col">Price</th>
                <th scope="col">Update item</th>
                <th scope="col">Delete item</th>
            </tr>
        </thead>
        <tbody  id="myTable">
            <tr>
                <td><input type="text" id="addName_ar" name="size" class="form-control" value="small"></td>
                <td><input type="text" id="addName_ar" name="sizePrice" class="form-control" value="20" ></td>
                <td> <button type="submit" id="submitToUpdate" class="btn btn-primary">Update</button></td>
                <td><button type="button" class="btn btn-danger" onclick="myDeleteFunction()">Delete</button></td>
            </tr>
        </tbody>
    </table>
</div>

</div>
<div class="modal" tabindex="-1" role="dialog" id="editextraModal">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Update extra</h5>

                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <form action="" id="updateForm" method="post"
                enctype="multipart/form-data">
                @csrf
                @method('put')

                <div class="modal-body">
                    <div class="form-group">
                        <label>extra name</label>
                        <input type="text" id="editName" name="name" class="form-control" value="">
                    </div>
                    <div class="form-group">
                        <label>extra description</label>
                        <input type="text" id="editDescription" name="description" class="form-control" value="">
                    </div>
                    <div class="form-group">
                        <label>extra Price</label>
                        <input type="number" name="price" class="form-control editPrice" value="">
                    </div>
                    <div class="form-group">
                        <div class="btn btn-info btn-file">
                            <i class="fas fa-paperclip"></i> extra picture
                            <input id="editImg" type="file" name="image" onchange="loadFile(event)">
                            <p><img src="" id="output" width="200" /></p>
                        </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <input type="text" name="id" id="currentid" class="form-control" value="" hidden>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" id="submitToUpdate" class="btn btn-primary">Update</button>
                </div>
        </div>
        </form>
    </div>
</div>

@endsection

@section('scripts')


<script>

        function myCreateFunction() {
            var table = document.getElementById("myTable");
            var row = table.insertRow(0);
            var cell1 = row.insertCell(0);
            var cell2 = row.insertCell(1);
            var cell3 = row.insertCell(2);
            cell1.innerHTML = `<input type="text" id="addName_ar" name="size" class="form-control" value="" required>`;
            cell2.innerHTML = `<input type="number" id="addName_ar" name="sizePrice" class="form-control" value="" required>`;
            cell3.innerHTML = `<button type="button" class="btn btn-danger" onclick="myDeleteFunction()">Delete</button>`;

        }

        function myDeleteFunction() {
            document.getElementById("myTable").deleteRow(0);
        }
</script>

<script>
   $(document).on('click', '.editBtn', function(e) {
            e.preventDefault();

            var extra_id = $(this).attr('extra_id');
            var extra_name = $(this).attr('extra_name');
            var extra_price = $(this).attr('extra_price');
            var extra_description = $(this).attr('extra_description');
            var extra_image = ("image", $("#editImg")[0].files[0]);

            $('#editName').val(extra_name);
            $('#editDescription').val(extra_description);
            $('#currentid').val(extra_id);
            $('.editPrice').val(extra_price);
            $('#editImg').attr("src", extra_image);

</script>

@endsection

