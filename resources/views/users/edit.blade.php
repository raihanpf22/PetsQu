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
                    <h4>Edit User Account
                        <br>
                        <br>
                        <a href="{{ route('table_user') }}" class="btn btn-danger float-end">BACK</a>
                    </h4>
                </div>
                <div class="card-body">

                    <form action="{{ url('update_user/'.$user->user_id)  }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        
                        <div class="form-group mb-3">
                            <label for="">Id User</label>
                            <input type=”text” id=”user_id” name=user_id” value="{{$user->user_id}}" class="form-control" disabled>
                            
                        </div>
                        <div class="form-group mb-3">
                            <label for="">Name</label>
                            <input type="text" name="name" value="{{$user->name}}" class="form-control" required>
                            
                        </div>
                        <div class="form-group mb-3">
                            <label for="">Email</label>
                            <input type="text" name="email" value="{{$user->email}}" class="form-control" required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="">Address</label>
                            <input type="text" name="address" value="{{$user->address}}" class="form-control"required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="">Postal Code</label>
                            <input type="number" name="postal_code" value="{{$user->postal_code}}" class="form-control"required>
                        </div>
                        <div class="form-group mb-3">
                            <label for=""> Telp</label>
                            <input type="number" name="telp"  value="{{$user->telp}}" class="form-control"required>
                        </div>
                        <div class="form-group mb-3">
                            <label for="">New Password</label>
                            <input type="password" name="password" class="form-control"required>
                        </div>
                        <div class="form-group mb-3">
                            <button type="submit" class="btn btn-success">Update User</button>
                        </div>

                    </form>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection