@extends('layouts.dashboard')
@section('content')

    <div class="row px-2">
        <div class="col-md-12 ">
            <button type="button" id='addBtn' class="mr-1 addBtn btn btn-sm btn-primary add-category" data-toggle="modal"
                data-target="#modal-default">
                Add gift
            </button>

            <div class="row d-flex ">
                {{-- <div class="col-md-3 mt-5" style=" "> --}}
                <!-- Profile Image -->
                @foreach ($gifts as $gift)
                    <div class="px-1 my-1 col-md-2" style="display: -webkit-box;">
                        <div class="card h-100 position-relative">
                            <div class="card-body box-profile">
                                <div class="text-center">
                                    <img class="card-img-top w-100"
                                        src="{{ asset('storage/products/' . $gift->product->image) }}"
                                        alt="User profile picture" style="height: 150px;">
                                </div>
                                <ul class="list-group list-group-unbordered mb-3">
                                    <li class="list-group-item">
                                        <b>Name</b> <a class="float-right">{{ $gift->product->name }}</a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Price</b> <a class="float-right">{{ $gift->product->price }}</a>
                                    </li>
                                    <li class="list-group-item">
                                        <b>Points</b> <a class="float-right">{{ $gift->points }}</a>
                                    </li>
                                    <li class="list-group-item">
                                        <small>Order Count</small> <a class="float-right text-small">{{ $gift->order_count }}</a>
                                    </li>
                                </ul>

                                <div class="button-group d-flex position-absolute" style="bottom: 5px">
                                    <button type="button" style='width:100%'
                                        class="mr-1 editBtn btn btn-primary edit-category" data-toggle="modal"
                                        data-target="#editGiftModal{{ $gift->id }}">
                                        Update
                                    </button>
                                    <form action="{{ route('d.gift.delete', $gift->id) }}" method="post">
                                        @method('delete')
                                        @csrf
                                        {{-- <a href="#" class="btn btn-info" style="width: 49%"><b>Update</b></a> --}}
                                        <button type="submit" class="btn btn-danger"
                                            style="width: 100%"><b>Delete</b></button>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- update --}}
                    <div class="modal fade" id="editGiftModal{{ $gift->id }}">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title">Update gift</h4>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('d.gift.store') }}" method="POST">
                                        @csrf
                                        <div class="form-group">
                                            <label>Select Category</label>
                                            <select class="form-control select_category" required>
                                                <option disabled selected value="{{ $gift->product->category_id }}">
                                                    {{ $gift->product->category->name }}</option>
                                                @foreach ($categories as $category)
                                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Select Product</label>
                                            <select class="form-control select_product" name="product_id" required>
                                                <option disabled selected value="{{ $gift->product->id }}">
                                                    {{ $gift->product->name }}</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputPassword1">Points</label>
                                            <input type="number" name="points" value="{{ $gift->points }}"
                                                class="form-control" id="exampleInputPassword1" placeholder="Points"
                                                required>
                                        </div>
                                </div>
                                <div class="modal-footer justify-content-between">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                </div>
                                </form>

                            </div>
                            <!-- /.modal-content -->
                        </div>
                        <!-- /.modal-dialog -->
                    </div>


                @endforeach
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </div><!-- /.container-fluid -->
    </section>

    {{-- Model for Create --}}
    <div class="modal fade" id="modal-default">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title">Add gift</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('d.gift.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label>Select Category</label>
                            <select class="form-control select_category" required>
                                <option disabled selected value="">--Categories--</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Select Product</label>
                            <select class="form-control select_product" name="product_id" required>
                                <option disabled selected value="">--Products--</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Points</label>
                            <input type="number" name="points" class="form-control" id="exampleInputPassword1"
                                placeholder="Points" required>
                        </div>
                </div>
                <div class="modal-footer justify-content-between">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
                </form>

            </div>
            <!-- /.modal-content -->
        </div>
        <!-- /.modal-dialog -->
    </div>
    {{-- Model for Create --}}


@endsection

@section('scripts')
    <script>
        $('.select_category').change(function(e) {
            e.preventDefault();
            var category_id = $(this).val();

            $.ajax({
                type: "get",
                url: "{{ route('d.gift.getProduct') }}",
                data: {
                    'id': category_id
                },
                dataType: "json",
                success: function(response) {
                    $('.select_product').empty();
                    $('.select_product').append(
                        `<option disabled value="" selected>--Products--</option>`);
                    $.each(response.products, function(indexInArray, product) {
                        $('.select_product').append(`
                           <option value="${product.id}">${product.name}</option>
                             `);

                    });
                }
            });

        });

    </script>
@endsection
