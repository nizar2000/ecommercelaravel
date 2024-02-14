
@extends('layouts.app')
  
@section('title', 'Home categorie')
  
@section('contents')
    <div class="d-flex align-items-center justify-content-between">
        <h1 class="mb-0">List categorie</h1>
        <a href="{{ route('categorie.create') }}" class="btn btn-primary">Add categorie</a>
    </div>
    <hr />
    @if(Session::has('success'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('success') }}
        </div>
    @endif
    <div  class="mb-3">
        <form action="{{ route('categorie.search') }}" method="POST" class="d-none d-sm-inline-block form-inline mr-auto mb-4 ml-md-3 my-2 my-md-0 mw-100 navbar-search ">
            @csrf
            <div class="input-group">
              <input type="text" name="keywords" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
              <div class="input-group-append">
                <button class="btn btn-primary" type="submit">
                  <i class="fas fa-search fa-sm"></i>
                </button>
              </div>
            </div>
          </form>
        </div>
    <table class="table table-hover">
        <thead class="table-primary">
            <tr>
                <th>#</th>
                <th>name</th>
                <th>image</th>

                <th>Action</th>
            </tr>
        </thead>
        <tbody>+
            @if($categorie->count() > 0)
                @foreach($categorie as $rs)
                    <tr>
                        <td class="align-middle">{{ $loop->iteration }}</td>
                        <td class="align-middle">{{ $rs->name }}</td>
                        <td class="align-middle"><img src="{{ asset("path/{$rs->image}") }}"width="150"></td>

                        <td class="align-middle">
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <a href="{{ route('categorie.edit', $rs->id)}}" type="button" class="btn btn-warning">Edit</a>
                                <form action="{{ route('categorie.destroy', $rs->id) }}" method="POST" type="button" class="btn btn-danger p-0" onsubmit="return confirm('Delete?')">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger m-0">Delete</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td class="text-center" colspan="5">Categorie not found</td>
                </tr>
            @endif
        </tbody>
    </table>
@endsection