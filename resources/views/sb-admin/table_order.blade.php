@extends('sb-admin.master')

@section('content')

<!-- Begin Page Content -->
<div class="container-fluid">
    <br>
    <br>
    @if (session('status'))
    <div class="alert alert-success">
    {{ session('status') }}
    </div>
    @endif

<div class="card mb-4 py-3 border-left-primary">
        <div class="card-body">
           <!-- Page Heading -->
            <h1 class="h3 mb-2 text-gray-800"><i class="fas fa-fw fa-tachometer-alt"></i> Data Table Orders</h1>
            <p class="mb-4">Data Table Orders, Contain Details of Order by User, order status make filter if order done to checkout or just in cart.</p>
        </div>
</div>
    
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data Orders</h6>
        <br>
        
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Order Id</th>
                        <th>User Id</th>
                        <th>Product_id</th>
                        <th>Product Name</th>
                        <th>Product Image</th>
                        <th>Quantity</th>
                        <th>Ammount</th>
                        <th>Order Address</th>
                        <th>Order Email</th>
                        <th>Order Status</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Order Id</th>
                        <th>User Id</th>
                        <th>Product_id</th>
                        <th>Product Name</th>
                        <th>Product Image</th>
                        <th>Quantity</th>
                        <th>Ammount</th>
                        <th>Order Address</th>
                        <th>Order Email</th>
                        <th>Order Status</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach($order as $item)
                    <tr>
                        <td>{{$item->order_id}}</td>
                        <td>{{$item->order_user_id}}</td>
                        <td>{{$item->order_product_id}}</td>
                        <td>{{$item->order_name_product}}</td>
                        <td>
                            <img src="{{ asset('uploads/img_products/'.$item->order_img) }}" width="70px" height="70px" alt="Image">
                        </td>
                        <td>{{$item->quantity}}</td>
                        <td>{{$item->ammount}}</td>
                        <td>{{ $item->order_address }}</td>
                        <td>{{ $item->order_email }}</td>
                        <td>
                            @if($item->order_status == "Keranjang")
                                <div class="alert alert-warning">
                                {{ $item->order_status }}
                                </div>
                            @elseif($item->order_status == "Checkout")
                                <div class="alert alert-success">
                                {{ $item->order_status }}
                                </div>
                            @else
                                <div class="alert alert-danger">
                                {{ $item->order_status }}
                                </div>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                    
                </tbody>
            </table>
        </div>
    </div>
</div>

</div>
<!-- /.container-fluid -->

</div>
<!-- End of Main Content -->


@endsection