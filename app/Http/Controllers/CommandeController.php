<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\Commande;
use App\Models\LigneCommande;



class CommandeController extends Controller
{
     public function store(Request $request)
     {
     // dd($request);
     $commande = Commande::where('client_id' , Auth::user()->id )->where('etat' , 'en cours')->first();


         if( $commande ){
         $existe = false ;
                foreach($commande->lignecommandes as $lignec ){
                     if($lignec->product_id == $request->product_id){
                       $existe = true ;
                       $lignec->qte += $request->qte;
                       $lignec->update();
                       }
                }

                      if(!$existe){
                      $lc = new LigneCommande();
                      $lc->qte = $request->qte;
                      $lc->product_id = $request->product_id;
                     $lc->commande_id = $commande->id;
                      $lc->save();
                       }
        //echo "produit commandee";
          return redirect()->route('client.cart')->with('success','produit commandee');
         }
        else
         {
            $commande = new Commande();
            $commande->client_id=Auth::user()->id ;
                if( $commande->save()){
                $lc = new LigneCommande();
                $lc->qte = $request->qte;
                $lc->product_id = $request->product_id;
                $lc->commande_id = $commande->id;
                $lc->save();
                //echo "produit commandee";
               return redirect()->route('client.cart')->with('success','produit commandee');

                }
               else{
                return redirect()->back()->with('error','impossible de commander');
                }
         }

        
     
     }
     public function destroy(string $idlc)
     {
 
         $lc = LigneCommande::find($idlc);
    
 
     
   
         $lc->delete();
   
         return redirect()->back()->with('success', 'commande deleted successfully');
     }
}
