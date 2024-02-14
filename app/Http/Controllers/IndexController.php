<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\categorie;
use App\Models\Product;
use App\Models\User;

use App\Models\Commande;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\ValidationException;



class IndexController extends Controller
{
    public function index()
    {
        
        $categorie = categorie::all();
        $product = Product::all();
        $latestProduct = Product::latest()->first();

        return view('client.index',compact('product','categorie','latestProduct'));
    }  

     public function show(string $id)

    {
        $product = Product::findOrFail($id);
        $relatedProducts = Product::where('id', '!=', $product->id)->take(4)->get();
     
      
        return view('client.show', compact('product','relatedProducts'));
    }

    public function about()
    {
        return view('client.about');
    }

    public function shop()
    {
        
        $categorie = categorie::all();
        $products = Product::all();

        return view('client.shop',compact('products','categorie' ));
    }

    public function contact()
    {
        return view('client.contact');
    }
    
    public function search(Request $request)
    {
       //dd($request);
       $product= Product::where('title','LIKE','%'. $request->keywords.'%')->get();
       $categorie = categorie::all();
       return view('client.shop')->with('categorie',$categorie)->with('product',$product);

    }


    public function profile()
    {
        return view('client.profile');
    }
    public function updateProfile(Request $request)
    {
        // Validate incoming request data
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,'.Auth::id(),
            'password' => 'required',
        ]);

        // Retrieve the currently authenticated user
        $user = Auth::user();

        // Update the user's profile with the validated data
        $user->update($validatedData);

        // Redirect the user back to their profile page with a success message
        return redirect()->route('client.profile')->with('success', 'Profile updated successfully.');
   
    }
    public function productsByCategory($categoryId)
     {
    $category= categorie::findOrFail($categoryId);
    $products = $category->products; // Access products using the plural relationship
    $categorie = categorie::all();

    return view('client.shop', compact('products', 'category', 'categorie'));
}
  public function cart(){
    $commande = Commande::where('client_id' , Auth::user()->id )->where('etat' , 'en cours')->first();

    return view('client.cart',compact('commande')) ;
  }
  public function checkout(Request $request)
  {
  //dd($request);
  $commande = Commande::find($request->commande);
  $commande->etat = "payee";
  $commande->update();
  return redirect()->route('client.index')->with('success', 'Commande payee successfully.');

  }
  public function mescommandes()
   {
   return view('client.commandes');
  }

}
