@extends('layouts.dashboard')
@section('content')
    <div class="row px-2">
        <div class="col-md-12 ">
            <div class="callout callout-info w-25 mt-3">
                <h3>Categories</h3>

            </div>
            {{-- <h2 style="text-align: center;margin-y:5rem">Categories</h2>
            <div style="width: 15%;height:2px;background-color:black;margin:auto"></div> --}}
            <div class="row d-flex ">
                @foreach ($categories as $category)
                    <div class="col-md-2 px-1 my-1">
                        <div class="card h-100">
                            <img src="{{ asset('storage/categories/' . $category->image) }}" class="card-img-top w-100 h-50"
                                alt="...">
                            <div class="card-body">
                                <h5 class="card-title">{{ $category->name }}</h5>
                                <p class="card-text " style="over-flow:auto;max-height:80px">{{ $category->description }}
                                </p>
                                <form action="#" method="POST">
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
                                            <button style='width:45%;height:30px' type="submit"
                                                category_id="{{ $category->id }}"
                                                class="delete_btn btn btn-sm ml-1 btn-danger">
                                                Delete
                                            </button>
                                        @endif
                                    </div>
                                </form>
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

                    <form action="" id="updateForm" method="" enctype="multipart/form-data">
                        @csrf

                        <div class="modal-body">
                            <div class="form-group">
                                <label>Category name</label>
                                <input type="text" id="editName_en" name="name_en" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Category description</label>
                                <input type="text" id="editName_ar" name="name_ar" class="form-control">
                            </div>
                            <div class="form-group">
                                <div class="btn btn-info btn-file">
                                    <i class="fas fa-paperclip"></i> Category picture
                                    <input type="file" name="image" required>
                                </div>
                            </div>
                        </div>

                        <div class="modal-footer">
                            <input type="text" name="id" id="currentid" class="form-control" value="" hidden>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" id="submitToUpdate" class="btn btn-primary"
                                data-dismiss="modal">Update</button>
                        </div>
                </div>
                </form>
            </div>
        </div>
        <!-- create -->
        <div class="button-group d-flex">
            <button type="button" id='addBtn' category_name_en="{{ $category->name_en }}"
                category_name_ar="{{ $category->name_ar }}" category_id="{{ $category->id }}"
                class="addBtn btn btn-sm btn-primary mr-1 add-category" data-toggle="modal" data-target="#addCategoryModal">
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
                                        <input type="text" id="addName_en" name="name" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label>Category description</label>
                                        <input type="text" id="addName_ar" name="description" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <div class="btn btn-info btn-file">
                                            <i class="fas fa-paperclip"></i> Category picture
                                            <input type="file" name="image" required>
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


            @endsection

            @section('scripts')
            @endsection
