
@extends('layouts.app')
  
@section('title', 'Home Contact')
  
@section('contents')
    <div class="d-flex align-items-center justify-content-between">
        <h1 class="mb-0">List Messages</h1>
      
    </div>
    <hr />
    @if(Session::has('success'))
        <div class="alert alert-success" role="alert">
            {{ Session::get('success') }}
        </div>
    @endif
    <table class="table table-hover">
        <thead class="table-primary">
            <tr>
                <th>#</th>
                <th>first_name</th>
                <th>last_name</th>
                <th>email</th>
                <th>subject </th>
                <th>message</th>
                
                <th>Action</th>
            </tr>
        </thead>
        <tbody>+
            @if($ContactMessage->count() > 0)
                @foreach($ContactMessage as $rs)
                    <tr>
                        <td class="align-middle">{{ $loop->iteration }}</td>
                        <td class="align-middle">{{ $rs->first_name }}</td>
                        <td class="align-middle">{{ $rs->last_name }}</td>
                        <td class="align-middle">{{ $rs->email }}</td>
                        <td class="align-middle">{{ $rs->subject }}</td>
                        <td class="align-middle">{{ $rs->message }}</td>  
                        <td class="align-middle">
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <form action="{{ route('contact.destroy', $rs->id) }}" method="POST" type="button" class="btn btn-danger p-0" onsubmit="return confirm('Delete?')">
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
                    <td class="text-center" colspan="5">Contact not found</td>
                </tr>
            @endif
        </tbody>
    </table>
@endsection