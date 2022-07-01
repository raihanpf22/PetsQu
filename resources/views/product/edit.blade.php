@extends('sb-admin.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">

            @if (session('status'))
                <h6 class="alert alert-success">{{ session('status') }}</h6>
            @endif

            <div class="card">
                <div class="card-header">
                    <h4>Edit Product
                        <br>
                        <br>
                        <a href="{{ route('table_product') }}" class="btn btn-danger float-end">BACK</a>
                    </h4>
                </div>
                <div class="card-body">

                    <form action="{{ url('update_product/'.$product->product_id)  }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        
                        <div class="form-group mb-3">
                            <label for="">Id Product</label>
                            <input type=”text” id=”product_id” name=”product_id” value="{{$product->product_id}}" class="form-control" disabled>
                            
                        </div>
                        <div class="form-group mb-3">
                            <label for="">Name Product</label>
                            <input type="text" name="name_product" value="{{$product->name_product}}" class="form-control" required>
                            
                        </div>
                        <div class="form-group mb-3">
                            <label for="">Thumbnail</label>
                            <input type="text" name="thumbnail" value="{{$product->thumbnail}}" class="form-control" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="">Category</label>
                            <input type="text" name="category" value="{{$product->category}}" class="form-control"required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="">Weight (Gram)</label>
                            <input type="number" name="weight" value="{{$product->weight}}" class="form-control"required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="">Price (Rp.)</label>
                            <input type="number" name="price"  value="{{$product->price}}" class="form-control"required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="">Stock</label>
                            <input type="number" name="stock" value="{{$product->stock}}" class="form-control"required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="">Description</label>
                            <textarea name="description" class="form-control" rows="4" cols="50">{{$product->description}}</textarea>
                        </div>
                        <div class="form-group mb-3">
                            <label for="">Image Product</label>
                            <input type="file" name="img" accept="image/png, image/jpeg, image/jpg" value="{{ $product->img }}" class="form-control" required>
                           
                            <img src="{{ asset('uploads/img_products/'.$product->img) }}" width="70px" height="70px" alt="image">
                        </div>
                        <div class="form-group mb-3">
                            <button type="submit" class="btn btn-success">Update Product</button>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection