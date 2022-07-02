<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Beranda | PetsQu</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  </head>
  <body style="background-color: #eee;">
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
          <a class="nav-link active" aria-current="page" href="#">Products</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Keranjang</a>
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

    <!-- Cards Product -->

  <div class="container py-5">
    <div class="row">
      @foreach($product as $item)
      <div class="col-md-12 col-lg-4 mb-4 mb-lg-0">
        <div class="card mb-4">
          <div class="d-flex justify-content-between p-3">
            <p class="lead mb-0">{{$item->thumbnail}}</p>
          </div>
          <img
            src="{{ asset('uploads/img_products/'.$item->img) }}" width="100px" height="400px"
            class="card-img-top"
            alt="{{$item->img}}"
          />
          <div class="card-body">
            <div class="d-flex justify-content-between">
              <p class="small"><a href="#!" class="text-muted">{{$item->category}}</a></p>
            </div>

            <div class="d-flex justify-content-between mb-3">
    
                <h5 class="mb-0">{{$item->name_product}}</h5>
    
              <h5 class="text-dark mb-0">Rp.{{$item->price}}</h5>
            </div>

            <div class="d-flex justify-content-between mb-2">
              <p class="text-muted mb-0">Available: <span class="fw-bold">{{$item->stock}}</span></p>
            </div>
            <div class="d-flex justify-content-between align-items-center pb-2 mb-1">
              <a href="#!" class="text-dark fw-bold">Details</a>
              <button type="button" class="btn btn-success">Buy now</button>
            </div>
          </div>
        </div>
    </div>
  
  @endforeach
      
            
    </div>
  </div>

    <!-- End Cards Product -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    

</body>
</html>