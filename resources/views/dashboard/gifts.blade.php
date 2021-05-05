@extends('layouts.dashboard')
@section('content')

    <section class="content">

        <div class="container-fluid">
            <button type="button" class="btn btn-default float-right" data-toggle="modal" data-target="#modal-default">
                Launch Default Modal
            </button>

            <div class="row">
                <div class="col-md-3 mt-5" style="display: -webkit-box; ">
                    <!-- Profile Image -->
                    @foreach ($gifts as $gift)
                        <div class="card card-primary card-outline" style="margin: 0 10px">
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
                                </ul>

                                <form action="{{ route('d.gift.delete', $gift->id) }}" method="post">
                                    @method('delete')
                                    @csrf
                                    <a href="#" class="btn btn-success" style="width: 49%"><b>Updata</b></a>
                                    <button type="submit" class="btn btn-danger" style="width: 49%"><b>Delete</b></button>
                                </form>
                            </div>
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
                    <h4 class="modal-title">Default Modal</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('d.gift.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label>Select Category</label>
                            <select class="form-control select_category">
                                <option disabled selected>--Categories--</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Select Product</label>
                            <select class="form-control select_product" name="product_id">
                                <option disabled selected>--Products--</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Points</label>
                            <input type="number" name="points" class="form-control" id="exampleInputPassword1"
                                placeholder="Points">
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
                    $('.select_product').append(`<option disabled selected>--Products--</option>`);
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
