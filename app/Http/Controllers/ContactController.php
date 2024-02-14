<?php

namespace App\Http\Controllers;

use App\Models\ContactMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ContactController extends Controller
{
    public function store(Request $request)
    {
   // Validate the form inputs, including the uploaded file
   $request->validate([
    'first_name' => 'required|string|max:255',
    'last_name' => 'required|string|max:255',
    'email' => 'required|email|max:255',
    'subject' => 'nullable|string|max:255',
    'message' => 'required|string',
  
]);
ContactMessage::create([
    'first_name' => $request->input('first_name'),
    'last_name' => $request->input('last_name'),

    'email' => $request->input('email'),

    'subject' => $request->input('subject'),

    'message' => $request->input('message'),



 
]);

return redirect()->route('client.contact')->with('success', ' Message sent successfully.');
}


}

