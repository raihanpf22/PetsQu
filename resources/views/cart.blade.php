<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cart | PetsQu</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
</head>
<body>
    @include('sweetalert::alert')
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">PetsQu</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav ms-auto">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="{{ route('main') }}">Products</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{ route('cart') }}">Carts</a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                  Halo, {{auth()->user()->name}}
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                  <li><a class="dropdown-item" href="#">Edit Account</a></li>
                  <li><a class="dropdown-item" href="{{ route('userLogout') }}">Logout</a></li>
                  
                </ul>
              </li>
            </ul>
          </div>
        </div>
      </nav>
          <!-- End-Navbar -->
      
          <div class="container h-100">
            <div class="row d-flex justify-content-center align-items-center h-100">
              <div class="col">
                <p><span class="h2">Shopping Cart </span><span class="h4">({{ $total_item }} item in your cart)</span></p>
                
                @foreach ($orders as $item)
                    
                <div class="card mb-4">
                  <div class="card-body p-4">
        
                    <div class="row align-items-center">
                      <div class="col-md-2">
                        <img src="{{ asset('uploads/img_products/'.$item->order_img) }}"
                          class="img-fluid" alt="Generic placeholder image">
                      </div>
                      <div class="col-md-2 d-flex justify-content-center">
                        <div>
                          <p class="small text-muted mb-4 pb-2">Name</p>
                          <p class="lead fw-normal mb-0">{{ $item->order_name_product}}</p>
                        </div>
                      </div>
                      <div class="col-md-2 d-flex justify-content-center">
                        <div>
                            <p class="small text-muted mb-4 pb-2">Quantity</p>
                          <p class="lead fw-normal mb-0">{{ $item->quantity}}</p>
                         
                        </div>
                      </div>
                      <div class="col-md-2 d-flex justify-content-center">
                        <div>
                            <p class="small text-muted mb-4 pb-2">Price</p>
                            <p class="lead fw-normal mb-0">Rp.{{ $item->ammount}}</p>
                        </div>
                      </div>
                      <div class="col-md-2 d-flex justify-content-center">
                        <div>
                         
                        </div>
                      </div>
                      <div class="col-md-2 d-flex justify-content-center">
                        <div>
                            <p class="small text-muted mb-4 pb-2">Action</p>
                            <div>
                              <form action="{{ route('delete_cart', $item->order_id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger">Hapus</button>
                              </form>

                            </div>
                        </div>
                      </div>
                    </div>
        
                  </div>
                </div>
                @endforeach
        
                <div class="card mb-5">
                  <div class="card-body p-4">
        
                    <div class="float-end">
                      <p class="mb-0 me-5 d-flex align-items-center">
                        <span class="small text-muted me-2">Order total:</span> <span
                          class="lead fw-normal">Rp.{{ $total_price}}</span>
                      </p>
                    </div>
        
                  </div>
                </div>
        
                <div class="d-flex justify-content-end">
                  <a href={{ route('main') }} class="btn btn-light btn-lg me-2">Continue shopping</a>

                    <button type="button" class="btn btn-primary btn-lg">CheckOut</button>
                  
                </div>
        
              </div>
            </div>
          </div>
           
                
            
            
           
    
          <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>
</html>