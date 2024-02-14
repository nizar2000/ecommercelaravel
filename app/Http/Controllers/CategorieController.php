<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\categorie;


class CategorieController extends Controller
{
   
        /**
         * Display a listing of the resource.
         */
        public function index()
        {
            $categorie = categorie::orderBy('created_at', 'DESC')->get();
      
            return view('categorie.index', compact('categorie'));
        }
      
        /**
         * Show the form for creating a new resource.
         */
        public function create()
        {
            return view('categorie.create');
        }
      
        /**
         * Store a newly created resource in storage.
         */
        public function store(Request $request)
        {
            // Validate the form inputs, including the uploaded file
            $request->validate([
                'name' => 'required|string',
                'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',

              
            ]);
           // Generate a unique name for the image
           $newname = uniqid();
        
           // Get the original file extension
           $extension = $request->file('image')->getClientOriginalExtension();
           
           // Concatenate the unique name and extension
           $newname = $newname . '.' . $extension;
        
           $destination_Path='path';
       
           // Move the uploaded image to the 'uploads' folder
           $image= $request->file('image');
           $image->move($destination_Path, $newname);
       
            // Generate a unique name for the image
          
            // Save the product with the generated image path
            categorie::create([
                'name' => $request->input('name'),
                'image' =>  $newname,

             
            ]);
        
            return redirect()->route('categorie')->with('success', 'categorie added successfully');
        }
        
      
        /**
         * Display the specified resource.
         */

      
        /**
         * Show the form for editing the specified resource.
         */
        public function edit(string $id)
        {
            $categorie = categorie::findOrFail($id);
      
            return view('categorie.edit', compact('categorie'));
        }
      
        /**
         * Update the specified resource in storage.
         */
        public function update(Request $request, string $id)
        {
            $categorie = categorie::find($id);
          
            // Update the product attributes
            $categorie->name = $request->name;





        // Check if a new image is uploaded
        if ($request->hasFile('image')) {
            // Delete the old image if it exists
            if ($categorie->image) {
                // Ensure proper path to delete the old image
                $imagePath = 'path/'.$categorie->image;
                if (file_exists($imagePath)) {
                    unlink($imagePath);
                }
            }
    
            // Generate a unique name for the new image
            $newname = uniqid() . '.' . $request->file('image')->getClientOriginalExtension();
            
            // Move the uploaded image to the 'uploads' folder
            $request->file('image')->move(public_path('path'), $newname);
            
            // Update the product's image attribute with the new filename
            $categorie->image = $newname;
        }
        $request->validate([
            'name' => 'required|string',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',

          
        ]);
        // Save the updated product
        $categorie->save();
      
            return redirect()->route('categorie')->with('success', 'categorie updated successfully');
        }
      
        /**
         * Remove the specified resource from storage.
         */
        public function destroy(string $id)
        {
    
            $categorie = categorie::find($id);
            $imagePath ='path/'.$categorie->image;
            
           unlink($imagePath);
    
        
      
            $categorie->delete();
      
            return redirect()->route('categorie')->with('success', 'categorie deleted successfully');
        }
        public function search(Request $request)
        {
           //dd($request);
           $categorie= categorie::where('name','LIKE','%'. $request->keywords.'%')->get();
           
           return view('categorie.index')->with('categorie',$categorie);
    
        }
    }
