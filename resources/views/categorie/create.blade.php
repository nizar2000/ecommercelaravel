@extends('layouts.app')
  
@section('title', 'Create categorie')
  
@section('contents')
    <h1 class="mb-0">Add categorie</h1>
    <hr />
    <form action="{{ route('categorie.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row mb-3">
            <div class="col">
                <input type="text" name="name" class="form-control" placeholder="name">
            </div>
            <div class="col">
                <input type="file" name="image" class="form-control" >
            </div>
      
        </div>
        <div class="row">
            <div class="d-grid">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
    </form>
@endsection
