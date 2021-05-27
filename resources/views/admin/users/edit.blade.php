@extends('layouts.admin')

@section('page-title')
    User Edit
@endsection 

@section('content')
<!-- <div class="container"> -->
    <div class="row">
        <div class="d-flex align-items-center justify-space-between mb-4 px-3">
            <h1 class="h3 mb-0 text-gray-800">User Edit</h1>
        </div>
    </div>

    <div class="row justify-content-center0">
        <div class="col-md-6">
           
            <div class="card mb-4">
                
                <div class="card-body">
                  <form action="{{ route('users.update', [$user->id]) }}" method="POST"> 
                    @csrf 
                    
                    <div class="form-group">
                      <label for="email">Email</label>
                      <input type="email" id="email" name="email" value="{{ $user->email }}" class="form-control" disabled>
                    </div>

                    <div class="form-group">
                      <label for="phone">Phone</label>
                      <input type="text" id="phone" name="phone" value="{{ $user->phone }}" class="form-control">
                    </div>

                    <div class="form-group">
                      <label for="address">Address</label>
                      <input type="text" id="address" name="address" value="{{ $user->address }}" class="form-control">
                    </div>

                    <div class="form-group {{ auth()->user()->id == $user->id ? 'd-none' : ''}}">
                        <label for="role_id">Role</label>
                        <select class="custom-select" name="role_id" id="role_id">
                            <option value="2" {{ $user->role_id == 2 ? "selected" : "" }}>LAWYER</option>
                            <option value="3" {{ $user->role_id == 3 ? "selected" : "" }}>CLIENT</option>
                        </select>
                    </div> 
                    
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </form>
                </div>
              </div>
        </div>
    </div>
<!-- </div> -->
@endsection
