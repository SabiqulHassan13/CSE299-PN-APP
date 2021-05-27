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
                <div class="table-responsive">
                  <table class="table align-items-center table-flush">
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

                    @forelse ($projects as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        
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
