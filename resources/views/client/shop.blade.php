@include('layouts.header')



      <div class="bg-light py-3">
        <div class="container">
          <div class="row">
            <div class="col-md-12 mb-0"><a href="{{ route('client.index') }}">Home</a> <span class="mx-2 mb-0">/</span> <strong class="text-black">Shop</strong></div>
          </div>
        </div>
      </div>
  
      <div class="site-section">
        <div class="container">
  
        
            <div class="col-md-3 order-1 mb-5 mb-md-0">
              <div class="border p-4 rounded mb-4">
                <h3 class="mb-3 h6 text-uppercase text-black d-block">Categories</h3>
                @foreach($categorie as $rs)

                <ul class="list-unstyled mb-0">
                  <li class="mb-1">
                    <a href="{{ route('category.products', $rs->id) }}" class="d-flex">
                      <span>{{ $rs->name }}</span>
              >
                    </a>
                  </li>
                                  </ul>
                @endforeach
              </div>
  
            </div>
            <div class="row mb-5">
              <div class="col-md-9 order-2">
    
                <div class="row">
                  <div class="col-md-12 mb-5">
                    <div class="float-md-left mb-4"><h2 class="text-black h5">Shop All</h2></div>
                    
                  </div>
                </div>
                <div class="row mb-5">
                  @foreach($products as $rs)
  
                  <div class="col-sm-6 col-lg-4 mb-4" data-aos="fade-up">
                    <div class="block-4 text-center border">
                      <figure class="block-4-image">
                        <a href="shop-single.html"><img src="{{ asset("uploads/{$rs->image}") }}"  alt="Image placeholder" class="img-fluid"></a>
                      </figure>
                      <div class="block-4-text p-4">
                        <h3><a href="shop-single.html">{{ $rs->title }}</a></h3>
                        <p class="mb-0">Finding perfect t-shirt</p>
                        <p class="text-primary font-weight-bold">{{ $rs->price }} TND</p>
                          <a href="{{ route('client.show', $rs->id) }}" type="button" class="btn btn-secondary">Detail</a>
  
                      </div>
                    </div>
                  </div>
  
                     @endforeach
    
                </div>
               
              </div>
            </div>
    
          </div>
  
          <div class="row">
            <div class="col-md-12">
              <div class="site-section site-blocks-2">
                  <div class="row justify-content-center text-center mb-5">
                    <div class="col-md-7 site-section-heading pt-4">
                      <h2>Categories</h2>
                    </div>
                  </div>
                  <div class="row">
                    @foreach($categorie as $rs)

                    <div class="col-sm-6 col-md-6 col-lg-4 mb-5 mb-lg-0" data-aos="fade" data-aos-delay="200">
                      <a class="block-2-item"  href="{{ route('category.products', $rs->id) }}">
                        <figure class="image">
                          <img  src="{{ asset("path/{$rs->image}") }}"   alt="" class="img-fluid">
                        </figure>
                        <div class="text">
                          <span class="text-uppercase">Collections</span>
                          <h3>{{ $rs->name }}</h3>
                        </div>
                      </a>
                    </div>
                    @endforeach
                  </div>
                
              </div>
            </div>
          </div>
          
        </div>
     


      @include('layouts.bottom')


    </body>
    </html>