@extends('layouts.dashboard')
@section('content')
    <!-- Main content -->
    {{-- <div class="row">
            <div class="modal" tabindex="-1" role="dialog" id="editProductModal">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">تعديل المنتج</h5>

                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                      </button>
                    </div>

                    <form action="" id="updateForm" method="" enctype="multipart/form-data" >
                      @csrf
                      <div class="modal-body">
                            <div class="form-group">
                            <input type="text" id="editName_en" name="name_en" class="form-control" value="">
                            </div>
                            <div class="form-group">
                            <input type="text" id="editName_ar" name="name_ar" class="form-control" value="" >
                            </div>
                            <div class="form-group">
                                <textarea name="description_en" id="editDescription_en" cols="50" rows="5"></textarea>
                            </div>
                            <div class="form-group">
                                <textarea name="description_ar" id="editDescription_ar" cols="50" rows="5"></textarea>
                            </div>
                            <div class="form-group">
                                <input type="text" id="editPrice" name="price" class="form-control" value="" >
                            </div>
                            <div class="form-group">
                                <div class="btn btn-info btn-file">
                                <i class="fas fa-paperclip"></i> صورة المنتج
                                <input type="file" name="image">
                                </div>
                            </div>

                      </div>

                      <div class="modal-footer">
                          <input type="text" name="id" id="currentid" class="form-control" value="" hidden>
                          <button type="button" class="btn btn-secondary" data-dismiss="modal">اغلاق</button>
                          <button type="submit" id="submitToUpdate" class="btn btn-primary" data-dismiss="modal">تعديل</button>
                      </div>
                    </div>
                    </form>
                </div>
            </div>

            <section class="content col-md-8">
                <div class="card">
                  <div class="card-header">
                    <h3 class="card-title">المنتجات</h3>
                  </div>
                  <div class="p-0 card-body">
                    <table class="table table-striped projects">
                        <thead>
                            <tr>
                                <th style="width: 5%">
                                    #
                                </th>
                                <th style="width: 15%">
                                    القسم
                                </th>
                                <th style="width: 15%">
                                    الاسم عربي
                                </th>
                                <th style="width: 15%">
                                    الاسم انجليزي
                                </th>
                                <th style="width: 15%">
                                    السعر
                                </th>
                                <th style="width: 10%" class="text-center">
                                    الصورة
                                </th>
                                <th style="width: 25%">
                                </th>
                            </tr>
                        </thead>
                        <tbody id="myTable">
                            @foreach ($products as $product)
                                <tr>
                                    <td>
                                        {{ $loop->iteration }}
                                    </td>
                                    <td>
                                        {{ $product->product->name_ar }}
                                    </td>
                                    <td>
                                        {{ $product->name_ar }}
                                    </td>
                                    <td>
                                        {{ $product->name_en }}
                                    </td>
                                    <td>
                                        {{ $product->price }}
                                    </td>

                                    <td class="project-state">
                                        <img src="{{ asset('storage/products/'.$product->image) }}" style="width: 100%">
                                    </td>
                                    <td class="text-right project-actions">
                                        <form action="{{ route('dashboard.products.delete', $product->id) }}" method="POST">
                                            @csrf
                                            @method('delete')
                                            <button class="float-right ml-2 btn btn-danger btn-sm" type="submit">
                                                <i class="fas fa-trash">
                                                </i>
                                                مسح
                                            </button>
                                        </form>
                                        <button
                                            product_name_en="{{ $product->name_en }}"
                                            product_name_ar="{{ $product->name_ar }}"
                                            product_description_en="{{ $product->description_en }}"
                                            product_description_ar="{{ $product->description_ar }}"
                                            product_price="{{ $product->price }}"
                                            product_id="{{ $product->id }}"
                                            type="button" class="float-right editBtn btn btn-sm btn-primary edit-category"
                                            data-toggle="modal" data-target="#editProductModal">تعديل
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                  </div>
                  <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </section>
              <!-- /.content -->
            <div class="col-md-4">
                <div class="card">
                  <div class="card-header">
                    <h3>اضافة منتج</h3>
                  </div>

                  <div class="card-body">

                    <form action="{{ route('dashboard.products.store') }}" method="post" enctype="multipart/form-data" id="createForm">
                      @csrf
                        <div class="form-group">
                            <label>القسم التابع له هذا المنتج</label>
                            <select class="custom-select" name="category_id" required="required" oninvalid="this.setCustomValidity('يجب اختيار القسم')" onchange="this.setCustomValidity('')">
                                    <option value="" selected disabled></option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name_ar }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <input type="text" name="name_en" class="form-control" value="{{ old('name_en') }}" placeholder="اسم المنتج باللغة الانجليزية"
                            required="required" oninvalid="this.setCustomValidity('هذا الحقل مطلوب')" onchange="this.setCustomValidity('')">
                        </div>
                        <div class="form-group">
                            <input type="text" name="name_ar" class="form-control" value="{{ old('name_ar') }}" placeholder="اسم المنتج باللغة العربية"
                            required="required" oninvalid="this.setCustomValidity('هذا الحقل مطلوب')" onchange="this.setCustomValidity('')">
                        </div>
                        <div class="form-group">
                            <textarea name="description_en" value="{{ old('description_en') }}" placeholder="الوصف باللغة الانجليزية" cols="50" rows="5"
                            required="required" oninvalid="this.setCustomValidity('هذا الحقل مطلوب')" onchange="this.setCustomValidity('')"></textarea>
                        </div>
                        <div class="form-group">
                            <textarea name="description_ar" value="{{ old('description_ar') }}" placeholder="الوصف باللغة العربية" cols="50" rows="5"
                            required="required" oninvalid="this.setCustomValidity('هذا الحقل مطلوب')" onchange="this.setCustomValidity('')"></textarea>
                        </div>
                        <div class="form-group">
                            <input type="number" step="any" name="price" class="form-control" value="{{ old('position_en') }}" placeholder="السعر"
                            required="required" oninvalid="this.setCustomValidity('هذا الحقل مطلوب')" onchange="this.setCustomValidity('')">
                        </div>
                        <div class="form-group">
                            <div class="btn btn-info btn-file">
                            <i class="fas fa-paperclip"></i> صورة المنتج
                            <input type="file" name="image"
                            required="required" oninvalid="this.setCustomValidity('يجب اختيار صورة للمنتج')" onchange="this.setCustomValidity('')">
                            </div>
                        </div>
                        <input class="brn btn-primary" type="submit" id="submitToCreate" value="انشاء">
                    </form>
                  </div>
                </div>
            </div>
        </div> --}}

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
                                        <button type="button" product_name="{{ $product->name }}"
                                            category_id="{{ $product->category_id }}" product_id="{{ $product->id }}"
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
                                            <button style='width:45%;height:30px' type="submit"
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
                                <label>Product price</label>
                                <input type="text" id="editPrice" name="price" class="form-control" value="">
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
                        $('#editPrice').val(product_price);
                        $('#currentid').val(product_id);
                        $('#editImg').attr(product_image);

                    });

                </script>
            @endsection
