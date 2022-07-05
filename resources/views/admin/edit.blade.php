@extends('sb-admin.master')

@section('content')
@include('sweetalert::alert')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-6">

            <div class="card">
                <div class="card-header">
                    <h4>Edit Account Admin
                        <br>
                        <br>
                        <a href="{{ route('table_admin') }}" class="btn btn-danger float-end">BACK</a>
                    </h4>
                </div>
                <div class="card-body">

                    <form action="{{ url('update_admin/'.$admin->admin_id)  }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        
                        <div class="form-group mb-3">
                            <label for="">Admin Id</label>
                            <input type=”text” id=”admin_id” name=”admin_id” value="{{$admin->admin_id}}" class="form-control" disabled>
                            
                        </div>
                        <div class="form-group mb-3">
                            <label for="">Name</label>
                            <input type="text" name="admin_name" value="{{$admin->admin_name}}" class="form-control" required>
                            
                        </div>
                        <div class="form-group mb-3">
                            <label for="">Email</label>
                            <input type="email" name="email" value="{{$admin->email}}" class="form-control" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="">Telp</label>
                            <input type="number" name="telp" value="{{$admin->telp}}" class="form-control"required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="">New Password</label>
                            <input type="password" name="password" class="form-control"required>
                        </div>
                        
                        <div class="form-group mb-3">
                            <button type="submit" class="btn btn-success">Update Data</button>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection