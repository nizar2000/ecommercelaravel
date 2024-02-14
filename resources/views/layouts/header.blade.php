
<!DOCTYPE html>
<html lang="en">
  <head>
    <title>Shoppers &mdash; Colorlib e-Commerce Template</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <link rel="stylesheet" href="{{ asset('client_assets/fonts/icomoon/style.css') }}">

    <link rel="stylesheet" href="{{ asset('client_assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('client_assets/css/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('client_assets/css/jquery-ui.css') }}">
    <link rel="stylesheet" href="{{ asset('client_assets/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('client_assets/css/owl.theme.default.min.css') }}">

    <link rel="stylesheet" href="{{ asset('client_assets/css/aos.css') }}">

    <link rel="stylesheet" href="{{ asset('client_assets/css/style.css') }}">
    
  </head>
  <body>
  
    <div class="site-wrap">
      <header class="site-navbar" role="banner">
        <div class="site-navbar-top">
          <div class="container">
            <div class="row align-items-center">
  
              <div class="col-6 col-md-4 order-2 order-md-1 site-search-icon text-left">
                <form action="{{ route('client.search') }}" method="POST" class="site-block-top-search">
                  @csrf
                  <span class="icon icon-search2"></span>
                  <input type="text" class="form-control border-0" name="keywords" placeholder="Search">
                </form>
              </div>
  
              <div class="col-12 mb-3 mb-md-0 col-md-4 order-1 order-md-2 text-center">
                <div class="site-logo">
                  <a href="{{ route('client.index') }}" class="js-logo-clone">Shoppers</a>
                </div>
              </div>
  
              <div class="col-6 col-md-4 order-3 order-md-3 text-right">
                <div class="site-top-icons">
                  <ul>
                    <li class="nav-item dropdown">
                      <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                          <span class="icon icon-person"></span>
                      </a>
                      <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                          <a class="dropdown-item" href="/client/profile">Profile</a>
                          <a class="dropdown-item" href="/client/commandes">Mes commandes</a>

                     <form action="{{ route('logout') }}" method="POST">
                     @csrf <!-- CSRF protection -->
                      <button type="submit" class="dropdown-item">Logout</button>
                      </form>

                      </div>
                  </li>
                    <li>
                      <form action="{{ route('client.cart') }}" method="GET">
                        @csrf <!-- Include CSRF token if using Laravel -->
                        <button type="submit" class="site-cart">
                            <span class="icon icon-shopping_cart"></span>
                      
                        </button>
                    </form>
                    </li> 
                 
                  </ul>
                </div> 
              </div>
  
            </div>
          </div>
        </div> 
        <nav class="site-navigation text-right text-md-center" role="navigation">
          <div class="container">
            <ul class="site-menu js-clone-nav d-none d-md-block">
              <li class="has-children active">
                <a href="{{ route('client.index') }}">Home</a>
          
              </li>
              <li class="has-children">
                <a href="{{ route('client.about') }}">About</a>
              
              </li>
              <li><a href="{{ route('client.shop') }}">Shop</a></li>
              
            
              <li><a href="{{ route('client.contact') }}">Contact</a></li>
            </ul>
          </div>
        </nav>
        @if(Session::has('success'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('success') }}
        </div>
        @endif
      </header>
  