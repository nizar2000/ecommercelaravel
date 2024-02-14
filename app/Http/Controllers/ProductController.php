<?php
  
namespace App\Http\Controllers;
  
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\categorie;

 
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $product = Product::orderBy('created_at', 'DESC')->get();
        
        $categorie = categorie::orderBy('created_at', 'DESC')->get();

        return view('products.index', compact('product','categorie'));
    }
  
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $product = Product::all();

        $categorie = categorie::all();
        return view('products.create', compact('product', 'categorie'));
    }
  
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validate the form inputs, including the uploaded file
        $request->validate([
            'title' => 'required|string',
            'price' => 'required|numeric',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'product_code' => 'required|string',
            'description' => 'required|string',
        ]);
    
        // Generate a unique name for the image
        $newname = uniqid();
        
        // Get the original file extension
        $extension = $request->file('image')->getClientOriginalExtension();
        
        // Concatenate the unique name and extension
        $newname = $newname . '.' . $extension;
     
        $destination_Path='uploads';
    
        // Move the uploaded image to the 'uploads' folder
        $image= $request->file('image');
        $image->move($destination_Path, $newname);
    
    
        // Save the product with the generated image path
        Product::create([
            'title' => $request->input('title'),
            'price' => $request->input('price'),
            'image' =>  $newname,
            'product_code' => $request->input('product_code'),
            'description' => $request->input('description'),
            'category_id' => $request->categorie      ]);
    
        return redirect()->route('products')->with('success', 'Product added successfully');
    
    }
    
  
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = Product::findOrFail($id);
  
        return view('products.show', compact('product'));
    }
  
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product = Product::findOrFail($id);
        $categorie = categorie::all();
        return view('products.edit', compact('product', 'categorie'));
    }
  
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Find the product by ID
        $product = Product::find($id);
    
        // Update the product attributes
        $product->title = $request->title;
        $product->price = $request->price;
        $product->description = $request->description;
        $product->product_code = $request->product_code;
        $product->category_id = $request->categorie;

    
        // Check if a new image is uploaded
        if ($request->hasFile('image')) {
            // Delete the old image if it exists
            if ($product->image) {
                // Ensure proper path to delete the old image
                $imagePath = 'uploads/'.$product->image;
                if (file_exists($imagePath)) {
                    unlink($imagePath);
                }
            }
    
            // Generate a unique name for the new image
            $newname = uniqid() . '.' . $request->file('image')->getClientOriginalExtension();
            
            // Move the uploaded image to the 'uploads' folder
            $request->file('image')->move(public_path('uploads'), $newname);
            
            // Update the product's image attribute with the new filename
            $product->image = $newname;
        }
    
        // Save the updated product
        $product->save();
    
        // Redirect back with success message
        return redirect()->route('products')->with('success', 'Product updated successfully');
    }
    
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::find($id);
        $imagePath ='uploads/'.$product->image;
        
       unlink($imagePath);

    
  
        $product->delete();
  
        return redirect()->route('products')->with('success', 'product deleted successfully');
    }
    public function search(Request $request)
    {
       //dd($request);
       $product= Product::where('title','LIKE','%'. $request->keywords.'%')->get();
       
       return view('products.index')->with('product',$product);

    }
}