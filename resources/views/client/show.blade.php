
@include('layouts.header')

  

    <div class="bg-light py-3">
      <div class="container">
        <div class="row">
          <div class="col-md-12 mb-0"><a href="index.html">Home</a> <span class="mx-2 mb-0">/</span> <strong class="text-black">Tank Top T-Shirt</strong></div>
        </div>
      </div>
    </div>  

    <div class="site-section">
      <div class="container">
        <div class="row">
          <div class="col-md-6">
            <img src="{{ asset("uploads/{$product->image}") }}"  alt="Image" class="img-fluid">
          </div>
          <div class="col-md-6">
            <h2 class="text-black">{{ $product->title }}</h2>
            <p>{{ $product->description }}</p>
            <p><strong class="text-primary h4">{{ $product->price }} TND</strong></p>
      <form action="{{ route('order.store') }}" method="POST">
        @csrf
     
        <input type="hidden" value="{{ $product->id }}" name="product_id">
            <div class="mb-5">
              <div class="input-group mb-3" style="max-width: 120px;">
              <div class="input-group-prepend">
                <button class="btn btn-outline-primary js-btn-minus" type="button">&minus;</button>
              </div>
              <input type="text" class="form-control text-center" value="1" name="qte" aria-label="Example text with button addon" aria-describedby="button-addon1">
              <div class="input-group-append">
                <button class="btn btn-outline-primary js-btn-plus" type="button">&plus;</button>
              </div>
            </div>
            <p><button class="btn btn-outline-primary" type="submit">Add to Cart</button>
            </p>

            </div>
      </form>
          </div>
        </div>
      </div>
    </div>

    <div class="site-section block-3 site-blocks-2 bg-light">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-7 site-section-heading text-center pt-4">
            <h2>Featured Products</h2>
          </div>
        </div>
        <div class="row">
          <div class="col-md-12">
            <div class="nonloop-block-3 owl-carousel">
         

                @foreach($relatedProducts as $relatedProduct)

              <div class="item">
                <div class="block-4 text-center">
                  <figure class="block-4-image">
                    <img src="{{ asset("uploads/{$relatedProduct->image}") }}"   alt="Image placeholder" class="img-fluid">
                  </figure>
                  <div class="block-4-text p-4">
                    <h3><a href="#">{{ $relatedProduct->title }}</a></h3>
                    <p class="mb-0">Finding perfect t-shirt</p>
                    <p class="text-primary font-weight-bold">{{ $relatedProduct->price }} TND</p>
                    <a href="{{ route('client.show', $relatedProduct->id) }}" type="button" class="btn btn-secondary">Detail</a>

                  </div>
                </div>
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