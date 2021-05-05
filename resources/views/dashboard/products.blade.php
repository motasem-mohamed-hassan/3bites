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
                        <div class="px-1 my-1 col-md-2">
                            <div class="card h-100 position-relative">
                                <img src="{{ asset('storage/products/' . $product->image) }}"
                                    class="card-img-top w-100 h-50 rounded" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $product->name }}</h5>
                                    <small class="card-text d-block ">{{ $product->description }}</small>
                                    <small class="card-text d-block">{{ $product->price }}</small>
                                    <small class="card-text">Points: {{ $product->points }}</small>
                                    <div class="button-group d-flex position-absolute" style="bottom: 5px">
                                        <button type="button" style='width:100%;height:30px'
                                            class="mr-1 editBtn btn btn-sm btn-primary edit-product" data-toggle="modal"
                                            data-target="#editproductModal{{ $product->id }}">
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
                        <div class="modal" tabindex="-1" role="dialog" id="editproductModal{{ $product->id }}">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title">Update product</h5>

                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>

                                    <form action="{{ route('d.product.update', $product->id) }}" id="updateForm"
                                        method="post" enctype="multipart/form-data">
                                        @csrf
                                        @method('put')

                                        <div class="modal-body">
                                            <div class="form-group">
                                                <label>Product name</label>
                                                <input type="text" id="editName" name="name" class="form-control"
                                                    value="{{ $product->name }}" required>
                                            </div>
                                            <div class="form-group">
                                                <label>Product description</label>
                                                <input type="text" id="editDescription" name="description" maxlength="75"
                                                    class="form-control" value="{{ $product->description }}" required>
                                                <label class="text-smaller" style="color: gray">maximum 75 character</label>
                                            </div>
                                            <div class="form-group">
                                                <label>Product Price</label>
                                                <input type="number" name="price" class="form-control editPrice"
                                                    value="{{ $product->price }}" required>
                                            </div>
                                            <div class="form-group">
                                                <label>Product Points</label>
                                                <input type="number" name="points" class="form-control editPrice"
                                                    value="{{ $product->points }}" required>
                                            </div>
                                            <div class="form-group">
                                                <button type="button" id="addSize" class="btn btn-primary"
                                                    onclick="myCreateFunction()">Add size</button>
                                            </div>
                                            <div class="form-group">
                                                <label>Product sizes</label>
                                                <table class="table">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col">Size</th>
                                                            <th scope="col">Price</th>
                                                            <th scope="col">Delete item</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="myTable">
                                                        <tr>
                                                            <td><input type="text" id="addName_ar" name="size_names[]"
                                                                    class="form-control editSize" value="small"></td>
                                                            <td><input type="text" id="addName_ar" name="size_prices[]"
                                                                    class="form-control editSizePrice" value="0"></td>
                                                            <td><button type="button" class="btn btn-danger"
                                                                    onclick="myDeleteFunction()">Delete</button></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="form-group">
                                                <label>Product Image</label>
                                                <div class="">
                                                    <input type="file"
                                                        data-default-file="{{ asset('storage/products/' . $product->image) }}"
                                                        class="dropify" name="image" data-height="200" />
                                                </div>
                                            </div>
                                        </div>

                                        <div class="modal-footer">
                                            <input type="text" name="id" id="currentid" class="form-control" value=""
                                                hidden>
                                            <button type="button" class="btn btn-secondary"
                                                data-dismiss="modal">Close</button>
                                            <button type="submit" id="submitToUpdate"
                                                class="btn btn-primary">Update</button>
                                        </div>
                                </div>
                                </form>
                            </div>
                        </div>

                    @endforeach
                </div>
            @endforeach
        </div>
    </div>

    <!-- edit -->

    <div class="container py-3">
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
                                        <select class="form-control" id="exampleFormControlSelect1" name="category_id"
                                            required>
                                            <option selected hidden disabled value="">--Choose Category--</option>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Product name</label>
                                        <input type="text" id="addName" name="name" class="form-control" value="" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Product description</label>
                                        <input type="text" id="addName_ar" name="description" class="form-control" value="" maxlength="75"
                                            required>
                                        <label class="text-smaller" style="color: gray">maximum 75 character</label>
                                    </div>
                                    <div class="form-group">
                                        <label>Product price</label>
                                        <input type="number" id="addName_ar" name="price" class="form-control" value=""
                                            required>
                                    </div>
                                    <div class="form-group">
                                        <label>Product points</label>
                                        <input type="number" id="addName_ar" name="points" class="form-control" value="">
                                    </div>
                                    <div class="form-group">
                                        <label>Product sizes</label>
                                        <div class="form-group">
                                            <button type="button" id="addSize2" class="btn btn-primary"
                                                onclick="myCreateFunction2()">Add size</button>
                                        </div>
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th scope="col">Size</th>
                                                    <th scope="col">Price</th>
                                                    <th scope="col">Delete item</th>
                                                </tr>
                                            </thead>
                                            <tbody id="myTable2">
                                                <tr>
                                                    <td><input type="text" id="addName_ar" name="size_names[]"
                                                            class="form-control" value="small"></td>
                                                    <td><input type="text" id="addName_ar" name="size_prices[]"
                                                            class="form-control" value="0"></td>
                                                    <td><button type="button" class="btn btn-danger"
                                                            onclick="myDeleteFunction2()">Delete</button></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                    {{-- <div class="form-group">
                                        <div class="btn btn-info btn-file">
                                            <i class="fas fa-paperclip"></i> product picture
                                            <input id="editImg" type="file" name="image" onchange="loadFile(event)">
                                            <p><img id="output2" width="200" /></p>
                                        </div>
                                    </div> --}}
                                    <div class="form-group">
                                        <label>Product Image</label>
                                        <div class="">
                                            <input type="file" class="dropify" name="image" data-height="200" />
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
        var i = 0;

        function myCreateFunction() {
            var table = document.getElementById("myTable");
            var row = table.insertRow(i + 1);
            var cell1 = row.insertCell(0);
            var cell2 = row.insertCell(1);
            var cell3 = row.insertCell(2);
            cell1.innerHTML =
                `<input type="text" id="addName_ar" name="size_names[]" class="form-control editSize" value="" required>`;
            cell2.innerHTML =
                `<input type="number" id="addName_ar" name="size_prices[]" class="form-control editSizePrice" value="" required>`;
            cell3.innerHTML = `<button type="button" class="btn btn-danger" onclick="myDeleteFunction()">Delete</button>`;
            i++;
            console.log(i);
        }

        function myDeleteFunction() {
            document.getElementById("myTable").deleteRow(i);
            i--;
            console.log(i);
        }

    </script>

    <script>
        var i2 = 0;

        function myCreateFunction2() {
            var table = document.getElementById("myTable2");
            var row = table.insertRow(i2 + 1);
            var cell1 = row.insertCell(0);
            var cell2 = row.insertCell(1);
            var cell3 = row.insertCell(2);
            cell1.innerHTML =
                `<input type="text" id="addName_ar" name="size_names[]" class="form-control editSize" value="" required>`;
            cell2.innerHTML =
                `<input type="number" id="addName_ar" name="size_prices[]" class="form-control editSizePrice" value="" required>`;
            cell3.innerHTML = `<button type="button" class="btn btn-danger" onclick="myDeleteFunction2()">Delete</button>`;
            i2++;
            console.log(i2);
        }

        function myDeleteFunction2() {
            document.getElementById("myTable2").deleteRow(i2);
            i2--;
            console.log(i2);
        }

    </script>
@endsection
