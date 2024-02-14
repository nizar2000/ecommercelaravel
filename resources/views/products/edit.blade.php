@extends('layouts.app')
  
@section('title', 'Edit Product')
  
@section('contents')
  
    <hr />
    <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col mb-3">
                <label class="form-label">Title</label>
                <input type="text" name="title" class="form-control" placeholder="Title" value="{{ $product->title }}" >
            </div>
            <div class="form-group">
                <label>Category</label>
            
                    
                    <select name="categorie" class="form-control">
                        @foreach($categorie as $rs)
                        <option value="{{ $rs->id }}">{{ $rs->name }}</option>
                        @endforeach
                      </select>
                </select>
            </div>
            <div class="col mb-3">
                <label class="form-label">Price</label>
                <input type="text" name="price" class="form-control" placeholder="Price" value="{{ $product->price }}" >
            </div>
         
        </div>
        <div class="row">
            <div class="col mb-3">
                <label class="form-label">Product Code</label>
                <input type="text" name="product_code" class="form-control" placeholder="Product Code" value="{{ $product->product_code }}" >
            </div>
            <div class="col mb-3">
                <label class="form-label">Description</label>
                <textarea class="form-control" name="description" placeholder="Descriptoin" >{{ $product->description }}</textarea>
            </div>
        </div>
        <div class="col mb-3">
            <label class="form-label">Image</label>
            <img src="{{ asset("uploads/{$product->image}") }}" width="150">
            <input type="file" name="image" class="form-control"  >
        </div>
        <div class="row">
            <div class="d-grid">
                <button class="btn btn-warning">Update</button>
            </div>
        </div>
    </form>
@endsection