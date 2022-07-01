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
            <h1 class="h3 mb-2 text-gray-800"><i class="fas fa-fw fa-tachometer-alt"></i> Data Table Products</h1>
            <p class="mb-4">Data Table Product, Contain Name Product, Thumbnail, Category, Weight, Price, Stock, Desc, etc.</p>
        </div>
</div>
    
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data Product</h6>
        <br>
        <a href="{{ route('create_product') }}" class="btn btn-primary float-end" >Add Product</a>
        
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Thumbnail</th>
                        <th>Category</th>
                        <th>Weight</th>
                        <th>Price</th>
                        <th>Stock</th>
                        <th>Description</th>
                        <th>Image</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Product</th>
                        <th>Thumbnail</th>
                        <th>Category</th>
                        <th>Weight</th>
                        <th>Price</th>
                        <th>Stock</th>
                        <th>Description</th>
                        <th>Image</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach($product as $item)
                    <tr>
                        <td>{{$item->name_product}}</td>
                        <td>{{$item->thumbnail}}</td>
                        <td>{{$item->category}}</td>
                        <td>{{$item->weight}}</td>
                        <td>{{$item->price}}</td>
                        <td>{{$item->stock}}</td>
                        <td>{{$item->description}}</td>
                        <td>
                            <img src="{{ asset('uploads/img_products/'.$item->img) }}" width="70px" height="70px" alt="Image">
                        </td>
                        <td>
                            <a href="{{ route('edit_product',$item->product_id) }}" class="btn btn-warning btn-sm">Edit</a>
                        
                        <form action = "{{route('delete_product',$item->product_id)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
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
