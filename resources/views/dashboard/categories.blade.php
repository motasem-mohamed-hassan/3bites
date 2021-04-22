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
<<<<<<< HEAD
                                {{-- <form action="#" method="POST">
=======

                                <form action="#" method="POST">
>>>>>>> 5d4f7693ce9c46b3070a5969540d9f8de6dc01d6
                                    @csrf
                                    <div class="button-group d-flex">
                                        <button type="button" category_name="{{ $category->name }}"
                                            category_description="{{ $category->description }}"
                                            category_id="{{ $category->id }}" style='width:45%;height:30px'
                                            class="editBtn btn btn-sm btn-primary mr-1 edit-category" data-toggle="modal"
                                            data-target="#editCategoryModal">
                                            Update
                                        </button>
                                        @if ($category->id == 1)
                                        @else
                                            <button style='width:100%;height:30px' type="submit"
                                <div class="button-group d-flex">
                                    <button type="button"
                                        category_name="{{ $category->name }}"
                                        category_description="{{ $category->description }}"
                                        category_id="{{ $category->id }}"
                                        category_image="{{ $category->image }}"
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
                                            <button style='width:45%;height:30px' type="submit"
                                                category_id="{{ $category->id }}"
                                                class="ml-1 delete_btn btn btn-sm btn-danger">
                                                Delete
                                            </button>
<<<<<<< HEAD
                                        @endif
                                    </div>
                                </form> --}}
                                <div class="button-group d-flex">
                                    <button type="button"
                                    category_name="{{ $category->name }}"
                                    category_id="{{ $category->id }}"
                                    category_image="{{ $category->image }}"
                                    category_description="{{ $category->description }}"
                                    style='width:45%;height:30px'
                                    class="mr-1 editBtn btn btn-sm btn-primary edit-category" data-toggle="modal"
                                    data-target="#editcategoryModal">
                                    Update
                                </button>
                            <form action="{{ route('d.category.delete', $category->id) }}" method="POST">
                                        @csrf
                                        @method('delete')
                                        <button style='width:100%;height:30px' type="submit"
                                            category_id="{{ $category->id }}"
                                            class="ml-1 delete_btn btn btn-sm btn-danger">
                                            Delete
                                        </button>
                                    </form>
=======
                                        </form>
                                    @endif
>>>>>>> 5d4f7693ce9c46b3070a5969540d9f8de6dc01d6
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
        <div class="modal" tabindex="-1" role="dialog" id="editcategoryModal">
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
                                    <input type="file" id="editImg" name="image" >
                                </div>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <input type="text" name="id" id="currentid" class="form-control" value="" hidden>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" id="submitToUpdate" class="btn btn-primary"
                            >Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- create -->
        <div class="button-group d-flex">
<<<<<<< HEAD
            <button type="button" id='addBtn'
                class="addBtn btn btn-sm btn-primary mr-1 add-category" data-toggle="modal" data-target="#addCategoryModal">
=======
            <button type="button" id='addBtn' class="mr-1 addBtn btn btn-sm btn-primary add-category" data-toggle="modal"
                data-target="#addCategoryModal">
>>>>>>> 5d4f7693ce9c46b3070a5969540d9f8de6dc01d6
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
                                        <input type="text" id="addName" name="name" class="form-control" value="">
                                    </div>
                                    <div class="form-group">
                                        <label>Category description</label>
                                        <input type="text" id="addDescription" name="description" class="form-control" value="">
                                    </div>
                                    <div class="form-group">
                                        <div class="btn btn-info btn-file">
                                            <i class="fas fa-paperclip"></i> Category picture
                                            <input type="file" name="image" required="required"
                                                oninvalid="this.setCustomValidity('pick a photo ')"
                                                onchange="this.setCustomValidity('')">
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
        $(document).on('click', '.editBtn', function(e) {
            e.preventDefault();

            var category_id = $(this).attr('category_id');
            var category_name = $(this).attr('category_name');
            var category_description = $(this).attr('category_description');
            var category_image = ("image", $("#editImg")[0].files[0]);

            console.log(category_id);
            console.log(category_name);
            console.log(category_description);
            console.log(category_image);


            // var category_image = $(this).
            // var category_image = $('input[type=file]')[0].files[0];

            $('#editName').val(category_name);
            $('#editDescription').val(category_description);
            $('#currentid').val(category_id);
            $('#editImg').attr(category_image);

            @section('scripts')
                <script>
                    $(document).on('click', '.editBtn', function(e) {
                        e.preventDefault();

                        var category_id = $(this).attr('category_id');
                        var category_name = $(this).attr('category_name');
                        var category_description = $(this).attr('category_description');
                        var category_image = ("image", $("#editImg")[0].files[0]);


                        // var category_image = $(this).
                        // var category_image = $('input[type=file]')[0].files[0];

                        $('#editName').val(category_name);
                        $('#editDescription').val(category_description);
                        $('#currentid').val(category_id);
                        $('#editImg').attr(category_image);

                    });

                </script>
            @endsection
        });
    </script>
@endsection
