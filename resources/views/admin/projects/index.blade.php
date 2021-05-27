@extends('layouts.admin')

@section('page-title')
    Project List
@endsection 

@section('content')
<!-- <div class="container"> -->
    <div class="row">
        <div class="d-flex align-items-center justify-space-between mb-4 px-3">
            <h1 class="h3 mb-0 text-gray-800">Project List</h1>
            <a href="{{ route('projects.create') }}" class="btn btn-primary ml-5">CREATE PROJECT</a>

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
                <div class="table-responsive p-3">
                  <table class="table align-items-center table-flush table-hover" id="dataTable">
                    <thead class="thead-light">
                      <tr>
                        <th>Project ID</th>
                        <th>Category</th>
                        <th>Name</th>
                        <th>Status</th>
                        <th>Lawyer</th>
                        <th>Client</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody>
               
                    @forelse ($loadedProjects as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->category }}</td>
                        <td>{{ $item->name }}</td>
                        <td><span class="badge badge-{{ $item->is_completed == 1 ? 'success' : 'danger'  }}">{{ $item->is_completed == 1 ? 'Completed' : 'Not Completed'  }}</span></td>
                        <td>{{ $item->lawyerName }}</td>
                        <td>{{ $item->clientName }}</td> 
                        <td>
                            <a href="{{ route('projects.show', [$item->id]) }}" class="btn btn-sm btn-info">View</a>
                            <a href="{{ route('projects.edit', [$item->id]) }}" class="btn btn-sm btn-primary">Edit</a>
                            <a href="{{ route('projects.destroy', [$item->id]) }}" class="btn btn-sm btn-danger">Delete</a>
                        </td>                       
                    </tr>
                    @empty
                        <td colspan="7">No Projects</td>
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
