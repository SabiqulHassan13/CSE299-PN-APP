@extends('layouts.admin')

@section('page-title')
    Project Create 
@endsection 

@section('content')
<!-- <div class="container"> -->
    <div class="row">
        <div class="d-flex align-items-center justify-space-between mb-4 px-3">
            <h1 class="h3 mb-0 text-gray-800">Project Create</h1>
        </div>
    </div>

    <div class="row justify-content-center0">
        <div class="col-md-6">           
            <div class="card mb-4">                
                <div class="card-body">
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                
                    <form action="{{ route('projects.store') }}" method="POST"> 
                    @csrf 
                    
                    <div class="form-group">
                        <label for="category">Category</label>
                        <input type="text" id="category" name="category" class="form-control" >
                    </div>

                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" id="name" name="name" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="details">Details</label>                   
                        <textarea name="details" id="details" rows="7" class="form-control"></textarea>
                    </div>

                    <div class="form-group">
                        <label for="lawyer_id">Assigned Lawyer</label>
                        <select class="custom-select" name="lawyer_id" id="lawyer_id">
                            <option value="">Select</option>
                            @foreach ($lawyers as $item)
                                <option value="{{ $item->id}}" >{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="client_id">Assigned Client</label>
                        <select class="custom-select" name="client_id" id="client_id">
                            <option value="">Select</option>
                            @foreach ($clients as $item)
                                <option value="{{ $item->id}}" >{{ $item->name }}</option>
                            @endforeach
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
