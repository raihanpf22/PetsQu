@extends('sb-admin.master')

@section('content')
@include('sweetalert::alert')

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
            <h1 class="h3 mb-2 text-gray-800"><i class="fas fa-fw fa-tachometer-alt"></i> Data Table Admins</h1>
            <p class="mb-4">Data Table Admin, Contain Name admin etc.</p>
        </div>
</div>
    
<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Data Product</h6>
        <br>
        <a href="{{ route('create_admin') }}" class="btn btn-primary float-end" >Add Admin</a>
        
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Admin Name</th>
                        <th>Email</th>
                        <th>Telp</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>Id</th>
                        <th>Admin Name</th>
                        <th>Email</th>
                        <th>Telp</th>
                        <th>Action</th>
                    </tr>
                </tfoot>
                <tbody>
                    @foreach($admins as $item)
                    <tr>
                        <td>{{$item->admin_id}}</td>
                        <td>{{$item->admin_name}}</td>
                        <td>{{$item->email}}</td>
                        <td>{{$item->telp}}</td>
                        <td>
                            <a href="{{ route('edit_admin',$item->admin_id) }}" class="btn btn-warning btn-sm">Edit</a>
                        
                        <form action = "{{route('delete_admin',$item->admin_id)}}" method="POST">
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
