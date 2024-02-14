<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ContactMessage;
use App\Models\User;
use App\Models\Commande;



class AdminController extends Controller
{
    public function Dashboard() {
        return view('dashboard');
    }
    public function contact(Request $request)
    {
        $ContactMessage = ContactMessage::all();
  
        return view('contact', compact('ContactMessage'));
    }
    public function destroy(string $id)
    {
        $ContactMessage =  ContactMessage::find($id);
      
        
 

    
  
        $ContactMessage->delete();
  
        return redirect()->route('contact')->with('success', 'message deleted successfully');
    }
 
    public function index()
    {
        $clients= User::where('role' , 'user')->get();;
  
        return view('clients.index', compact('clients'));
    }
    public function Block($idUser)
    {
        $client = User::find($idUser);
        $client->is_active = false ;
        $client->update();
        return redirect()->back()->with('success','User blocked');

    }
    public function UnBlock($idUser)
    {
        $client = User::find($idUser);
        $client->is_active = true ;
        $client->save();
        return redirect()->back()->with('success','User Unblocked');

    }
    public function commandes()
    {
        $commande = Commande::all();
        return view('commandes.index',compact('commande'));
    }
  
}
