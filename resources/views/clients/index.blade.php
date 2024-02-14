
@extends('layouts.app')
  
@section('title', 'Home Users')
  
@section('contents')
    <div class="d-flex align-items-center justify-content-between">
        <h1 class="mb-0">List Users</h1>
 
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
                <th>Name</th>
                <th>Email</th>
                <th>Etat</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>+
            @if($clients->count() > 0)
                @foreach($clients as $rs)
                    <tr>
                        <td class="align-middle">{{ $loop->iteration }}</td>
                        <td class="align-middle">{{ $rs->name }}</td>
                        <td class="align-middle">{{ $rs->email }}</td>
                        @if ($rs->is_active)
                        <td class="align-middle">
                      
                            <span class="badge bg-primary " ><p style="color: aliceblue">Active</p></span>
                        
                       
                        </td>

                        <td class="align-middle">
                            <a href="{{ route('clients.block', $rs->id)}}" type="button"  class="btn btn-danger m-0">Block</a>

                        </td>
                        @else
                        <td class="align-middle">
                      
                            <span class="badge bg-secondary" ><p style="color: aliceblue">Blocked</p></span>
                        
                       
                        </td>

                        <td class="align-middle">
                            <a href="{{ route('clients.unblock', $rs->id)}}" type="button"  class="btn btn-danger m-0">UnBlock</a>

                        </td>
                        @endif
                    </tr>
                @endforeach
            @else
                <tr>
                    <td class="text-center" colspan="5">User not found</td>
                </tr>
            @endif
        </tbody>
    </table>
@endsection