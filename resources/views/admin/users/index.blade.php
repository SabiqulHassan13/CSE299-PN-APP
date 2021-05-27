@extends('layouts.admin')

@section('page-title')
    User List
@endsection 

@section('content')
<!-- <div class="container"> -->
    <div class="row">
        <div class="d-flex align-items-center justify-space-between mb-4 px-3">
            <h1 class="h3 mb-0 text-gray-800">User List</h1>
        </div>
    </div>

    @if (session('status'))
        <div class="alert alert-success" role="alert">
            {{ session('status') }}
        </div>
    @endif

    <div class="row justify-content-center">
        <div class="col-md-12">      

            <div class="card">
                <div class="table-responsive">
                  <table class="table align-items-center table-flush">
                    <thead class="thead-light">
                      <tr>
                        <th>User ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>Phone</th>
                        <th>Address</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>

                    @forelse ($users as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->email }}</td>
                        <td><span class="badge badge-success">{{ $item->role_id == 1 ? 'ADMIN' : ($item->role_id == 2 ? 'LAWYER' : 'CLIENT')  }}</span></td>
                        <td>{{ $item->phone }}</td>
                        <td>{{ $item->address }}</td>
                        <td>
                            <a href="{{ route('users.edit', [$item->id]) }}" class="btn btn-sm btn-primary {{ auth()->user()->id == $item->id ? 'd-none' : ''}}">Edit</a>
                            <a href="{{ route('users.destroy', [$item->id]) }}" class="btn btn-sm btn-danger {{ auth()->user()->id == $item->id ? 'd-none' : ''}}">Delete</a>
                        </td>
                    </tr>
                    @empty
                        <p>No users</p>
                    @endforelse
                      
                      
                    </tbody>
                  </table>
                </div>
                <div class="card-footer"></div>
            </div>

        </div>
    </div>
<!-- </div> -->
@endsection
