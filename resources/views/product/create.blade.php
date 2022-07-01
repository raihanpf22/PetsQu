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
                    <h4>Add Product
                        <br>
                        <br>
                        <a href="{{ route('table_product') }}" class="btn btn-danger float-end">BACK</a>
                    </h4>
                </div>
                <div class="card-body">

                    <form action="{{ route('create_product')  }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group mb-3">
                            <label for="">Name Product</label>
                            <input type="text" name="name_product" class="form-control" required autofocus>
                        </div>
                        <div class="form-group mb-3">
                            <label for="">Thumbnail</label>
                            <input type="text" name="thumbnail" class="form-control" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="">Category</label>
                            <input type="text" name="category" class="form-control"required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="">Weight (Gram)</label>
                            <input type="number" name="weight" class="form-control"required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="">Price (Rp.)</label>
                            <input type="number" name="price" class="form-control"required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="">Stock</label>
                            <input type="number" name="stock" class="form-control"required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="">Description</label>
                            <textarea name="description" class="form-control" rows="4" cols="50"></textarea>
                        </div>
                        <div class="form-group mb-3">
                            <label for="">Image Product</label>
                            <input type="file" name="img" accept="image/png, image/jpeg, image/jpg" class="form-control" required>
                        </div>
                        <div class="form-group mb-3">
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection