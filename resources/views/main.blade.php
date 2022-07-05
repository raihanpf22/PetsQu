
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Beranda | PetsQu</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    
  </head>
  <body style="background-color: #eee;">
    @include('sweetalert::alert')
    
    <!-- Navbar -->
    <nav class="navbar fixed-top navbar-expand-lg navbar-dark bg-dark">
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

    <!-- Cards Product -->
  <div class="container py-5">
    <br>
    <br>
    <h1>Products</h1>
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
              
              <form action="{{ route('add_cart', $item->product_id )}}" method = "POST">
                @csrf

                <input type="number" min="1" max="{{ $item->stock }}" name="quantity" id="quantity" required>
              </div>
              <div class="d-flex justify-content-between align-items-center pb-2 mb-1">
                <a href="#!" class="text-dark fw-bold">Details</a>
            
                  <button type="submit" class="btn btn-success">Add To Cart</button>
                
              </div>

              </form>
              
             
             
          </div>
        </div>
    </div>
  
  @endforeach
      
            
    </div>
  </div>

  
  
</body>
<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320">
  <path fill="#273036" fill-opacity="1" d="M0,32L48,69.3C96,107,192,181,288,197.3C384,213,480,171,576,165.3C672,160,768,192,864,213.3C960,235,1056,245,1152,224C1248,203,1344,149,1392,122.7L1440,96L1440,320L1392,320C1344,320,1248,320,1152,320C1056,320,960,320,864,320C768,320,672,320,576,320C480,320,384,320,288,320C192,320,96,320,48,320L0,320Z">

  </path>
</svg>
<footer>
        <p>Portofolio Raihan pambagyo Fadhila © 2022</p>
    </footer>
    <style>
      footer {
    padding: 10px;
    color: white;
    background-color: #273036;
    text-align: center;
  }
    </style>

  <!-- End Cards Product -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>

  </html>