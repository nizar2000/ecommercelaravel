@include('layouts.header')

<div class="bg-light py-3">
    <div class="container">
      <div class="row">
        <div class="col-md-12 mb-0"><a href="{{ route('client.index') }}">Home</a> <span class="mx-2 mb-0">/</span> <strong class="text-black">Cart</strong></div>
      </div>
    </div>
  </div>

  <div class="site-section">
    <div class="container">
      <div class="row mb-5">
        <form class="col-md-12" method="POST">
            @csrf
          <div class="site-blocks-table">
            <table class="table table-bordered">
              <thead>
                <tr>
                 
                  <th class="product-name">Product</th>
                  <th class="product-price">Price</th>
                  <th class="product-quantity">Quantity</th>
                  <th class="product-total">Total</th>
                  <th class="product-remove">Remove</th>
                </tr>
              </thead>
              <tbody>
                @if ($commande)
                @if ($commande->lignecommandes)

                @foreach( $commande->lignecommandes as $lc)
                <tr>
                 
                  <td class="product-name">
                    <h2 class="h5 text-black">{{ $lc->product->title }}</h2>
                  </td>
                  <td>{{ $lc->product->price }} TND</td>
                  <td>
                    <div class="input-group mb-3" style="max-width: 120px;">
                  
                        {{ $lc->qte }}                     
                    </div>

                  </td>
                  <td>{{  $lc->product->price * $lc->qte }} TND</td>
                  <td><a href="{{ route('lc.destroy', $lc->id) }}" class="btn btn-primary btn-sm">X</a></td>
                </tr>

             @endforeach
             @else
             <p>No lignecommandes found for this command.</p>
         @endif
     @else
         <p>No commande found.</p>
     @endif
              </tbody>
            </table>
          </div>
        </form>
      </div>

      <div class="row">
        <div class="col-md-6 pl-5">
            <form action="{{ route('client.checkout') }}" method="POST">
                @csrf
                @if ($commande)
                    <input type="hidden" name="commande" value="{{ $commande->id }}">
                    <div class="row justify-content-end">
                        <div class="col-md-7">
                            <div class="row">
                                <div class="col-md-12 text-right border-bottom mb-5">
                                    <h3 class="text-black h4 text-uppercase">Cart Totals</h3>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <span class="text-black">Subtotal</span>
                                </div>
                                <div class="col-md-6 text-right">
                                    <strong class="text-black">{{ $commande->getTotal() }} TND</strong>
                                </div>
                            </div>
                            <div class="row mb-5">
                                <div class="col-md-6">
                                    <span class="text-black">Total</span>
                                </div>
                                <div class="col-md-6 text-right">
                                    <strong class="text-black">{{ $commande->getTotal() + 10 }} TND</strong>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-12">
                                    <button class="btn btn-primary btn-lg py-3 btn-block" type="submit">Proceed To Checkout</button>
                                </div>
                            </div>
                        </div>
                    </div>
                @else
                    <p>No command found.</p>
                @endif
            </form>
        </div>
    </div>
    
    </div>
  </div>
  @include('layouts.bottom')

</body>
</html>