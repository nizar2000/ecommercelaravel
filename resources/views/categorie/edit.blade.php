@extends('layouts.app')
  
@section('title', 'Edit categorie')
  
@section('contents')
    <h1 class="mb-0">Edit categorie</h1>
    <hr />
    <form action="{{ route('categorie.update', $categorie->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col mb-3">
                <label class="form-label">name</label>
                <input type="text" name="name" class="form-control" placeholder="name" value="{{ $categorie->name }}" >
            </div>
            <div class="col mb-3">
                <label class="form-label">Image</label>
                <img src="{{ asset("path/{$categorie->image}") }}" width="150">
                <input type="file" name="image" class="form-control"  >
            </div>
        </div>
        <div class="row">
            <div class="d-grid">
                <button class="btn btn-warning">Update</button>
            </div>
        </div>
    </form>
@endsection