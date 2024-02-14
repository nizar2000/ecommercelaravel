@include('layouts.header')
<div class="bg-light py-3">
    <div class="container">
      <div class="row">
        <div class="col-md-12 mb-0"><a href="index.html">Home</a> <span class="mx-2 mb-0">/</span> <a href="cart.html">Cart</a> <span class="mx-2 mb-0">/</span> <strong class="text-black">Checkout</strong></div>
      </div>
    </div>
  </div>

  <div class="site-section">
    <div class="container">
    
      <div class="row mb-5">
        <form class="col-md-12" method="post">
          <div class="site-blocks-table">
            <table class="table table-bordered">
              <thead>
                <tr>
               
                  <th class="product-name">Commande</th>
                  <th class="product-price">Total</th>
                  <th class="product-quantity">Etat</th>
                  <th class="product-total">Date</th>
           
                </tr>
              </thead>
              <tbody>
                @foreach(auth()->user()->commande as $index =>$commande)
                <tr>
                  
                  <td >
                    <h2 class="h5 text-black">Commande n°{{ $index+1 }}</h2>
                  </td>
                  <td>
                    {{ $commande->getTotal() }} TND

                  </td>
                  <td>
                    @if(  $commande->etat == "en cours" )
                   <span  class="badge badge-warning">En Cours</span>
                   @elseif($commande->etat == "payee")
                    <span  class="badge badge-success">Payée</span>
                   @endif
                  </td>
              
                  <td>
                    {{ $commande->created_at }}
                  </td>
              
                </tr>
@endforeach
                
              </tbody>
            </table>
          </div>
        </form>
      </div>
      <!-- </form> -->
    </div>
  </div>




@include('layouts.bottom')
</body>
</html>