@extends('layouts.dashboard')
@section('content')
    <div class="px-2 row">
        <div class="col-md-12 ">
            <div class="mt-3 callout callout-info w-25">
                <h3>Categories</h3>

            </div>
            {{-- <h2 style="text-align: center;margin-y:5rem">Categories</h2>
            <div style="width: 15%;height:2px;background-color:black;margin:auto"></div> --}}
            <div class="row d-flex ">
                @foreach ($categories as $category)
                    <div class="px-1 my-1 col-md-2">
                        <div class="card h-100">
                            <img src="{{ asset('storage/categories/' . $category->image) }}"
                                class="card-img-top w-100 h-50" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">{{ $category->name }}</h5>
                                <p class="card-text " style="over-flow:auto;max-height:80px">{{ $category->description }}
                                </p>
                                <div class="button-group d-flex">
                                    <button type="button" category_name="{{ $category->name }}"
                                        category_description="{{ $category->description }}"
                                        category_id="{{ $category->id }}" category_image="{{ $category->image }}"
                                        style='width:45%;height:30px'
                                        class="mr-1 editBtn btn btn-sm btn-primary edit-category" data-toggle="modal"
                                        data-target="#editCategoryModal">
                                        Update
                                    </button>
                                    @if ($category->id == 1)
                                    @else
                                        <form action="{{ route('d.category.delete', $category->id) }}" method="POST">
                                            @csrf
                                            @method('delete')
                                            <button style='width:100%;height:30px' type="submit"
                                                category_id="{{ $category->id }}"
                                                class="ml-1 delete_btn btn btn-sm btn-danger">
                                                Delete
                                            </button>
                                        </form>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
    <!-- edit -->

    <div class="container py-3">
        <div class="modal" tabindex="-1" role="dialog" id="editCategoryModal">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Update category</h5>

                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>


                    <form action="{{ route('d.category.update') }}" id="updateForm" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        @method('put')

                        <div class="modal-body">
                            <div class="form-group">
                                <label>Category name</label>
                                <input type="text" id="editName" name="name" class="form-control" value="">
                            </div>
                            <div class="form-group">
                                <label>Category description</label>
                                <input type="text" id="editDescription" name="description" class="form-control" value="">
                            </div>

                            <div class="form-group">
                                <div class="btn btn-info btn-file">
                                    <i class="fas fa-paperclip"></i> Category picture
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
                    </form>
                </div>
            </div>
        </div>
        <!-- create -->
        <div class="button-group d-flex">
            <button type="button" id='addBtn' class="mr-1 addBtn btn btn-sm btn-primary add-category" data-toggle="modal"
                data-target="#addCategoryModal">
                Add category
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

                            <form action="{{ route('d.category.store') }}" id="updateForm" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label>Category name</label>
                                        <input type="text" id="addName" name="name" class="form-control" value="" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Category description</label>
                                        <input type="text" id="addDescription" name="description" class="form-control"
                                            value="" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="exampleFormControlSelect1">Select extra types</label>
                                        <select class="custom-select" id="basic" multiple="multiple">
                                            <option value="cheese">Cheese</option>
                                            <option value="tomatoes">Tomatoes</option>
                                            <option value="mozarella">Mozzarella</option>
                                            <option value="mushrooms">Mushrooms</option>
                                            <option value="pepperoni">Pepperoni</option>
                                            <option value="onions">Onions</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <div class="btn btn-info btn-file">
                                            <i class="fas fa-paperclip"></i> Category picture
                                            <input id="editImg" type="file" name="image" onchange="loadFile(event)">
                                            <p><img src="" id="output2" width="200" /></p>
                                        </div>
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
            </div>
        </div>
    </div>


@endsection

@section('scripts')
    <script>
       $('#basic').multiselect({
    templates: {
        li: '<li><a href="javascript:void(0);"><label class="pl-2"></label></a></li>'
    }
});

    </script>
    <script>
        $(document).on('click', '.editBtn', function(e) {
            e.preventDefault();

            var category_id = $(this).attr('category_id');
            var category_name = $(this).attr('category_name');
            // var category_price = $(this).attr('category_price');
            var category_description = $(this).attr('category_description');
            var category_image = ("image", $("#editImg")[0].files[0]);



            // var category_image = $(this).
            // var category_image = $('input[type=file]')[0].files[0];

            $('#editName').val(category_name);
            $('#editDescription').val(category_description);
            $('#currentid').val(category_id);
            // $('.editPrice').val(category_price);
            $('#editImg').attr("src", category_image);
            // $('#output').attr("src",category_image);
            // $('#output').attr("src",category_image);
            // $('#updated').attr(category_image);
            //  document.getElementById('updated').src = URL.createObjectURL(event.target.files[0]);

        });

    </script>
    <script>
        var loadFile = function(event) {
            var image = document.getElementById('output');
            var image2 = document.getElementById('output2');
            image.src = URL.createObjectURL(event.target.files[0]);
            image2.src = URL.createObjectURL(event.target.files[0]);
        };

    </script>
@endsection
