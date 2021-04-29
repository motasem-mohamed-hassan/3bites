@extends('layouts.dashboard')
@section('content')

<div class="modal" tabindex="-1" role="dialog" id="OrderDetailsModal">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">تفاصيل الأوردر</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
            <div id="print">
                <div class="modal-body">
                    <h5>Aria</h5>
                    <p class="order_aria"></p>
                    <hr>
                    <h5>Address</h5>
                    <p class="order_address"></p>
                </div>
                <div class="card">
                    <div class="card-header">
                    <h3 class="card-title">Products</h3>
                    </div>
                    <div class="card-body p-0">
                        <table class="table projects">
                            <thead>
                                <tr>
                                    <th style="width: 15%">
                                        Item
                                    </th>
                                    <th style="width: 15%">
                                        Number
                                    </th>
                                    <th style="width: 15%">
                                        Price
                                    </th>
                                </tr>
                            </thead>
                            <tbody id="myTable">

                            </tbody>
                            <tfoot id="foot" class="thead-light">

                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <button type="submit" class="btn btn-primary" data-dismiss="modal">اغلاق</button>

            </div>
        </div>
    </div>
</div>


<section class="content col-md-12">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title" > Confirmed orders</h3>
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
                        Aria
                    </th>
                    <th style="width: 15%">
                        Phone number
                    </th>
                    <th style="width: 10%">
                        Price
                    </th>
                    <th style="width: 10%" >
                        delivery fees
                    </th>
                    <th style="width: 10%">
                        Total
                    </th>
                    <th style="width: 15%">
                        Delivery time
                    </th>
                    <th style="width: 25%">
                    </th>
                </tr>
            </thead>
            <tbody>
                {{-- @foreach($orders as $order)
                    <tr>
                        <td>
                            {{ $loop->iteration }}
                        </td>
                        <td>
                            {{ $order->name }}
                        </td>
                        <td>
                            {{ $order->aria->name_ar }}
                        </td>
                        <td>
                            {{ $order->phone }}
                        </td>
                        <td>
                            {{ $order->price }}
                        </td>
                        <td>
                            {{ $order->delivery_cost }}
                        </td>
                        <td>
                            {{ $order->total }}
                        </td>
                        <td>
                            {{ $order->updated_at }}
                        </td>
                        <td class="project-actions ">
                            <button
                                order_aria="{{ $order->aria->name_ar }}"
                                order_address="{{ $order->address }}"
                                order_products="{{ $order->products }}"
                                order_price="{{ $order->price }}"
                                order_deleviry_cost="{{ $order->delivery_cost }}"
                                order_total="{{ $order->total }}"
                                type="button" class="detailsbtn btn btn-sm btn-primary  edit-category"
                                data-toggle="modal" data-target="#OrderDetailsModal">تفاصيل الأوردر
                            </button>
                        </td>
                    </tr>
                @endforeach
            </tbody> --}}
        </table>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
</section>
@endsection

@section('scripts')
<script>
    $(document).on('click', '.detailsbtn', function(e){
    e.preventDefault();

        var order_aria = $(this).attr('order_aria');
        var order_address = $(this).attr('order_address');
        var order_products = $(this).attr('order_products');
        var order_deleviry_cost = $(this).attr('order_deleviry_cost');
        var order_total = $(this).attr('order_total');

        $('#myTable').empty();
        $.each(JSON.parse(order_products), function (indexInArray, product) {
            $(myTable).append(`
                <tr>
                    <th>
                        product.name
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
                    order_deleviry_cost
                </th>
            </tr>
            <tr>
                <th>
                    الاجمالي
                </th>
                <th>
                </th>
                <th>
                    order_total
                </th>
            </tr>

        `);

        $('.order_aria').html(order_aria);
        $('.order_address').html(order_address);
    });
</script>

@endsection
