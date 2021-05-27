@extends('layouts.admin')

@section('page-title')
    Project Detail 
@endsection 

@section('content')
<!-- <div class="container"> -->
    <div class="row">
        <div class="d-flex align-items-center justify-space-between mb-4 px-3">
            <button class="btn btn-primary ml-2" type="button" data-toggle="collapse" data-target="#multiCollapseExample1" aria-expanded="false" aria-controls="multiCollapseExample">Show Project Detail</button>  
        </div>
    </div>

    <div class="row mb-5">
        <div class="col-md-12">
            <div class="collapse multi-collapse" id="multiCollapseExample1">
                <div class="card">
                    <div class="card-body">
                        <div class="mb-3">{!! $project->details !!}</div>
                        <p>Created Date {{ $project->created_at }}</p>
                        <p>Updated Date {{ $project->updated_at }}</p>
                    </div>
                </div>
            </div>
        </div>            
    </div>

    <div class="row">
        <div class="col-md-12">
            <!-- <div class="collapse multi-collapse" id="multiCollapseExample2"> -->
                <div class="card mb-5">
                    <div class="card-header">
                        <h5>Add Project Notice</h5>
                    </div>

                    <div class="card-body">
                        <form action="{{ route('notices.store') }}" method="POST">
                            @csrf 

                            <input type="hidden" name="project_id" value="{{ $project->id }}">
                            <div class="form-group">
                                <label for="details">Notice</label>
                                <textarea name="details" id="details" rows="7" class="form-control" required></textarea>
                            </div>

                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                    
                </div>

                <div class="card mb-5">
                    <div class="card-header">
                        <h5>Project Notice List</h5>
                    </div>

                    <div class="card-body">
                        @forelse ($notices as $item)   
                        <div class="border px-3 py-2 my-2">            
                            <p>Notice - {{ $loop->iteration }}</p>
                            <div>{!! $item->details !!}</div>
                            <p class="font-weight-bold">Added by {{ $item->noticerName}}</p>
                            <div>
                                <a href="{{ route('notices.destroy', ['noticeId' => $item->id]) }}" class="btn btn-danger {{ auth()->user()->id == $item->user_id || auth()->user()->role_id == 1 ? '' : 'd-none'}} ">Delete</a>
                            </div>
                        </div>
                        @empty
                        <div class="border px-3 py-2 ">            
                            <p>No Notice Available</p>                            
                        </div>
                        @endforelse
                    </div>
                    
                </div>
            <!-- </div> -->
        </div>            
    </div>


<!-- </div> -->
@endsection
