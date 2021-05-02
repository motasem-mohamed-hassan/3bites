@extends('layouts.dashboard')
@section('content')




    <section class="content col-md-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">waiting </h3>
            </div>
            <div class="card-body p-0">
                <table class="table table-striped projects">
                    <thead>
                        <tr>
                            <th style="width: 5%">
                                #
                            </th>
                            <th style="width: 15%">
                                Name
                            </th>
                            <th style="width: 15%">
                                Phone
                            </th>
                            <th style="width: 15%">
                                Email
                            </th>
                            <th style="width: 15%">
                                Total
                            </th>
                            <th style="width: 15%">
                                Created at
                            </th>
                            <th style="width: 20%">
                                <form action="{{ route('d.order.deleteAll') }}" method="post">
                                    @csrf
                                    <button type="submit" class="btn btn-outline-danger">Delete All</button>
                                </form>
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $order)
                            <div>
                                <tr>
                                    <td>
                                        {{ $loop->iteration }}
                                    </td>
                                    <td>
                                        {{ $order->user_name }}
                                    </td>
                                    <td>
                                        {{ $order->user_phone }}
                                    </td>
                                    <td>
                                        {{ $order->user_email }}
                                    </td>
                                    <td>
                                        {{ $order->total }}
                                    </td>
                                    <td>
                                        {{ $order->created_at }}
                                    </td>
                                    <td class="project-actions text-right">
                                        <form action="{{ route('d.order.delete', $order->id) }}" method="post">
                                            @csrf
                                            @method('delete')
                                            <button type="button" class="btn btn-primary" data-toggle="modal"
                                                data-target=".bd-example-modal-lg{{ $order->id }}">Order Details</button>
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </td>
                                </tr>

                                <div class="modal fade bd-example-modal-lg{{ $order->id }}" tabindex="-1" role="dialog"
                                    aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">{{ $order->user_name }}
                                                    Order
                                                </h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="container col-md-12">
                                                    <div class="row">
                                                        <div class="col-md-1">
                                                            Qty
                                                        </div>

                                                        <div class="col-md-6">
                                                            item
                                                        </div>

                                                        <div class="col-md-2">
                                                            price
                                                        </div>
                                                    </div>
                                                </div>
                                                <hr>
                                                @foreach ($order->oproducts as $product)

                                                    <div class="container col-md-12">
                                                        <div class="row">
                                                            <div class="col-md-1">
                                                                {{ $product->quantity }}X
                                                            </div>

                                                            <div class="col-md-6">
                                                                <strong>{{ $product->name }}</strong><br>
                                                                <small>{{ $product->size_name }}</small>
                                                                <small>(+{{ $product->size_price }})</small><br>
                                                                @foreach ($product->oextras as $extra)
                                                                    <small>{{ $extra->type }}: </small>
                                                                    <small>{{ $extra->extra_name }}</small>
                                                                    <small>(+{{ $extra->price }})</small><br>
                                                                @endforeach
                                                                <small>note: {{ $product->note }}</small><br>
                                                            </div>

                                                            <div class="col-md-2">
                                                                {{ $product->price }}
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <hr>
                                                @endforeach
                                                <div class="container col-md-12">
                                                    <div class="row">
                                                        <div class="col-md-1">

                                                        </div>

                                                        <div class="col-md-6">
                                                            HST:
                                                        </div>
                                                        <div class="col-md-2">
                                                            {{ $order->hst }}
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="container col-md-12">
                                                    <div class="row">
                                                        <div class="col-md-1">

                                                        </div>
                                                        <div class="col-md-6">
                                                            total:
                                                        </div>
                                                        <div class="col-md-2">
                                                            {{ $order->total }}
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->
    </section>


@endsection

@section('scripts')

    <script>
        $(document).on('click', '.detailsbtn', function(e) {
            e.preventDefault();

            var order_id = $(this).attr('order_id');
            var order_aria = $(this).attr('order_aria');
            var order_address = $(this).attr('order_address');
            var order_products = $(this).attr('order_products');
            var order_deleviry_cost = $(this).attr('order_deleviry_cost');
            var order_total = $(this).attr('order_total');

            $('#myTable').empty();
            $.each(JSON.parse(order_products), function(indexInArray, product) {
                $(myTable).append(`
                                                                <tr>
                                                                    <th>
                                                                        product.name_ar
                                                                    </th>
                                                                    <th>
                                                                        product.pivot.quantity
                                                                    </th>
                                                                    <th>
                                                                        product.price
                                                                    </th>
                                                                </tr>
                                                            `);
            });

            $('#foot').empty();
            $('#foot').append(`
                                                            <tr>
                                                                <th>
                                                                    خدمة التوصيل
                                                                </th>
                                                                <th>
                                                                </th>
                                                                <th>
                                                                    ${order_deleviry_cost}
                                                                </th>
                                                            </tr>
                                                            <tr>
                                                                <th>
                                                                    الاجمالي
                                                                </th>
                                                                <th>
                                                                </th>
                                                                <th>
                                                                    ${order_total}
                                                                </th>
                                                            </tr>

                                                        `);

            $('.order_aria').html(order_aria);
            $('.order_address').html(order_address);
            $('.currentid').val(order_id);
        });

    </script>

@endsection
