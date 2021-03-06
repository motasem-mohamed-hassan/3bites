@extends('layouts.dashboard')
@section('css')

@endsection
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
                        <div class="card  position-relative" style="height:420px">
                            <img src="{{ asset('storage/categories/' . $category->image) }}"
                                class="card-img-top w-100 h-50 rounded" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">{{ $category->name }}</h5>
                                <p class="card-text py-1" >{{ $category->description }}
                                </p>
                                <div class="button-group d-flex position-absolute" style="bottom: 5px">
                                    <button type="button" style='width:100%;'
                                        class="mr-2 editBtn btn  btn-primary edit-category" data-toggle="modal"
                                        data-target="#editCategoryModal{{ $category->id }}">
                                        Update
                                    </button>
                                    @if ($category->id == 1)
                                    @else
                                        <form action="{{ route('d.category.delete', $category->id) }}" method="POST">
                                            @csrf
                                            @method('delete')
                                            <button style='width:100%;' type="submit"
                                                category_id="{{ $category->id }}"
                                                class="ml-2 delete_btn btn  btn-danger">
                                                Delete
                                            </button>
                                        </form>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    {{-- Update Modal --}}
                    <div class="modal" tabindex="-1" role="dialog" id="editCategoryModal{{ $category->id }}">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Update category</h5>

                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>


                                <form action="{{ route('d.category.update', $category->id) }}" id="updateForm"
                                    method="post" enctype="multipart/form-data">
                                    @csrf
                                    @method('put')

                                    <div class="modal-body">
                                        <div class="form-group">
                                            <label>Category name</label>
                                            <input type="text" id="editName" name="name" class="form-control"
                                                value="{{ $category->name }}" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Category description</label>
                                            <input type="text" id="editDescription" name="description" class="form-control" maxlength="100"
                                                value="{{ $category->description }}" required>
                                            <label class="text-smaller" style="color: gray">maximum 100 character</label>
                                        </div>
                                        <div class="form-group">
                                            <label>Select extras</label>
                                            <select class="select2bs4" pla multiple="multiple" name="extras[]"
                                                style="width: 100%;" required>
                                                @foreach ($extras as $extra)
                                                    <option value="{{ $extra->type }}">{{ $extra->type }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Category Image</label>
                                            <div class="">
                                                <input type="file" class="dropify" name="image"
                                                    data-default-file="{{ asset('storage/categories/' . $category->image) }}"
                                                    data-height="200" />
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
                @endforeach
                {{-- End Update Modal --}}
                <!-- create -->
                <div class="button-group d-flex">
                    <button type="button" id='addBtn' class="mr-1 addBtn btn btn-sm btn-primary add-category"
                        data-toggle="modal" data-target="#addCategoryModal">
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
                                                <input type="text" id="addName" name="name" class="form-control" value=""
                                                    required>
                                            </div>
                                            <div class="form-group">
                                                <label>Category description</label>
                                                <input type="text" id="addDescription" name="description" maxlength="100"
                                                    class="form-control" value="" required placeholder="maximum 100 character">
                                                <label class="text-smaller" style="color: gray">maximum 100 character</label>
                                            </div>
                                            {{-- <div class="form-group">
                                        <div class="container">
                                            <h2>Select extras</h2>
                                            <div class="row">
                                                <div class="col-md-12">
                                                    <select type="text" name="extras[]" class="multiselect"
                                                        multiple="multiple" role="multiselect">
                                                        <option value="1">extra1</option>
                                                        <option value="2">extra2</option>
                                                        <option value="3">extra3</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                    </div> --}}
                                            <div class="form-group">
                                                <label>Select extras</label>
                                                <select class="select2bs4" pla multiple="multiple" name="extras[]"
                                                    data-placeholder="Select a State" style="width: 100%;">
                                                        <option disabled selected value="">Chose extra type</option>
                                                    @foreach ($extras as $extra)
                                                        <option value="{{ $extra->type }}">{{ $extra->type }}</option>
                                                    @endforeach
                                                </select>
                                            </div>

                                            {{-- <div class="form-group">
                                                <div class="btn btn-info btn-file">
                                                    <i class="fas fa-paperclip"></i> Category picture
                                                    <input id="editImg" type="file" name="image" onchange="loadFile(event)">
                                                    <p><img src="" id="output2" width="200" /></p>
                                                </div>
                                            </div> --}}
                                            <div class="form-group">
                                                <label>Category Image</label>
                                                <div class="">
                                                    <input type="file" class="dropify" name="image" data-height="200" required />
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
        </div>
    </div>
    </div>


@endsection

@section('scripts')
    <script>
        $(function() {
            $('.select2').select2()

            $('.select2bs4').select2({
                theme: 'bootstrap4'
            })
        })

    </script>
@endsection
