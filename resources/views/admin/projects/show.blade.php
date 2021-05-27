@extends('layouts.admin')

@section('page-title')
    Project Detail 
@endsection 

@section('content')
<!-- <div class="container"> -->
    <div class="row">
        <div class="d-flex align-items-center justify-space-between mb-4 px-3">
            <h1 class="h3 mb-0 text-gray-800">Project Detail</h1>

            <button class="btn btn-primary ml-2" type="button" data-toggle="collapse" data-target="#multiCollapseExample1" aria-expanded="false" aria-controls="multiCollapseExample">Show Detail</button>  
        </div>
    </div>

    <div class="row mb-5">
        <div class="col-md-12">
            <div class="collapse multi-collapse" id="multiCollapseExample1">
            <div class="card card-body">
                project details
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
                        <form action="" method="">
                            @csrf 

                            <div class="form-group">
                                <label for="">Notice</label>
                                <textarea name="" id="" rows="7" class="form-control"></textarea>
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
                        <div class="border px-3 py-2 ">
                            <p>Notice - 1</p>
                            <div>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quos consequatur neque quisquam temporibus expedita vitae assumenda reprehenderit? Soluta, reiciendis ad!</div>
                            <p class="font-weight-bold">Added by John, <span class="font-italic">Laywer</span></p>
                            <div>
                                <a href="" class="btn btn-danger">Delete</a>
                            </div>
                        </div>
                    </div>
                    
                </div>
            <!-- </div> -->
        </div>            
    </div>


<!-- </div> -->
@endsection
