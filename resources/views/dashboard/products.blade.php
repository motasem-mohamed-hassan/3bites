@extends('layouts.dashboard')
@section('content')
    <div class="px-4 row">
        <div class="col-md-12">
            @foreach ($categories as $category)
                <div class="my-3 callout callout-info w-25">
                    <h3>{{ $category->name }}</h3>

                </div>
                {{-- <h2 style="text-align: center;">{{ $category->name }}</h2>
                <div style="width: 15%;height:2px;background-color:black;margin:auto"></div> --}}
                <div class="px-1 row d-flex">
                    @foreach ($category->products as $product)
                        <div class="px-1 col-md-2">
                            <div class="py-1 card">
                                <img src="{{ asset('storage/products/' . $product->image) }}"
                                    class="card-img-top w-100 h-50" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $product->name }}</h5>
                                    <p class="card-text">{{ $product->description }}</p>
                                    <p class="card-text">{{ $product->price }}</p>
                                    <div class="button-group d-flex">
<<<<<<< HEAD
                                        <button type="button"
                                            product_name="{{ $product->name }}"
                                            category_id="{{ $product->category_id }}" product_id="{{ $product->id }}"
=======
                                        <button type="button" category_id="{{ $product->category_id }}"
                                            product_id="{{ $product->id }}" product_name="{{ $product->name }}"
>>>>>>> 5d4f7693ce9c46b3070a5969540d9f8de6dc01d6
                                            product_price="{{ $product->price }}" product_image="{{ $product->image }}"
                                            product_description="{{ $product->description }}"
                                            style='width:45%;height:30px'
                                            class="mr-1 editBtn btn btn-sm btn-primary edit-product" data-toggle="modal"
                                            data-target="#editproductModal">
                                            Update
                                        </button>
                                        <form action="{{ route('d.product.delete', $product->id) }}" method="POST">
                                            @csrf
                                            @method('delete')
                                            <button style='width:100%;height:30px' type="submit"
                                                product_id="{{ $product->id }}"
                                                class="ml-1 delete_btn btn btn-sm btn-danger">
                                                Delete
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endforeach
        </div>
    </div>

    <!-- edit -->

    <div class="container py-3">
        <div class="modal" tabindex="-1" role="dialog" id="editproductModal">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Update product</h5>

                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>

                    <form action="{{ route('d.product.update') }}" id="updateForm" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        @method('put')

                        <div class="modal-body">
                            <div class="form-group">
                                <label>Product name</label>
                                <input type="text" id="editName" name="name" class="form-control" value="">
                            </div>
                            <div class="form-group">
                                <label>Product description</label>
                                <input type="text" id="editDescription" name="description" class="form-control" value="">
                            </div>
                            <div class="form-group">
                                <label>Product Price</label>
                                <input type="text" name="price" class="form-control editPrice" value="">
                            </div>
                            <div class="form-group">
                                <div class="btn btn-info btn-file">
                                    <i class="fas fa-paperclip"></i> product picture
                                    <input id="editImg" type="file" name="image">
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
        <!-- create -->
        <div class="button-group d-flex">
            <button type="button" id='addBtn' {{-- product_name_en="{{ $product->name_en }}"
              product_name_ar="{{ $product->name_ar }}"
              product_id="{{ $product->id }}" --}} class="mr-1 addBtn btn btn-sm btn-primary add-product"
                data-toggle="modal" data-target="#addproductModal">
                Add product
            </button>
            <div class="container py-3">
                <div class="modal" tabindex="-1" role="dialog" id="addproductModal">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title">Add new product</h5>

                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>

                            <form action="{{ route('d.product.store') }}" id="updateForm" method="post"
                                enctype="multipart/form-data">
                                @csrf
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label for="exampleFormControlSelect1">Select category</label>
                                        <select class="form-control" id="exampleFormControlSelect1" name="category_id">
                                                <option desable selected>--Choce Category--</option>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Product name</label>
                                        <input type="text" id="addName" name="name" class="form-control" value="">
                                    </div>
                                    <div class="form-group">
                                        <label>Product description</label>
                                        <input type="text" id="addName_ar" name="description" class="form-control" value="">
                                    </div>
                                    <div class="form-group">
                                        <label>Product price</label>
                                        <input type="text" id="addName_ar" name="price" class="form-control" value="">
                                    </div>
                                    <div class="form-group">
                                        <div class="btn btn-info btn-file">
                                            <i class="fas fa-paperclip"></i> product picture
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

            var product_id = $(this).attr('product_id');
            var product_name = $(this).attr('product_name');
            var product_price = $(this).attr('product_price');
            var product_description = $(this).attr('product_description');
            var product_image = ("image", $("#editImg")[0].files[0]);


            // var product_image = $(this).
            // var product_image = $('input[type=file]')[0].files[0];

            $('#editName').val(product_name);
            $('#editDescription').val(product_description);
            $('#currentid').val(product_id);
            $('.editPrice').val(product_price);
            $('#editImg').attr(product_image);

        });

    </script>
@endsection
