@extends('layouts.admin')

@section('page-title')
    Project Edit 
@endsection 

@section('content')
<!-- <div class="container"> -->
    <div class="row">
        <div class="d-flex align-items-center justify-space-between mb-4 px-3">
            <h1 class="h3 mb-0 text-gray-800">Project Edit</h1>
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
                
                    <form action="{{ route('projects.update', [$project->id]) }}" method="POST"> 
                    @csrf 
                    
                    <div class="form-group">
                        <label for="category">Category</label>
                        <input type="text" id="category" name="category" value="{{ $project->category }}" class="form-control" >
                    </div>

                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" id="name" name="name" value="{{ $project->name }}" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="details">Details</label>                   
                        <textarea name="details" id="details" rows="7" class="form-control">{{ $project->details }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="lawyer_id">Assigned Lawyer</label>
                        <select class="custom-select" name="lawyer_id" id="lawyer_id">
                            <option value="">Select</option>
                            @foreach ($lawyers as $item)
                                <option value="{{ $item->id}}" {{ $item->id == $project->lawyer_id ? 'selected' : ''}}>{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="client_id">Assigned Client</label>
                        <select class="custom-select" name="client_id" id="client_id">
                            <option value="">Select</option>
                            @foreach ($clients as $item)
                                <option value="{{ $item->id}}" {{ $item->id == $project->client_id ? 'selected' : ''}}>{{ $item->name }}</option>
                            @endforeach
                        </select>
                    </div> 

                    <div class="form-group">
                        <label for="is_completed">Is Completed</label>
                        <select class="custom-select" name="is_completed" id="is_completed">
                            <option value="0" {{ $project->is_completed ? '' : 'selected' }}>Not Completed</option>
                            <option value="1" {{ $project->is_completed ? 'selected' : ''}}>Completed</option>                           
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
