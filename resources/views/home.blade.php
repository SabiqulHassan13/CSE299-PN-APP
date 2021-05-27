@extends('layouts.admin')

@section('page-title')
    Dashboard
@endsection 

@section('content')
<!-- <div class="container"> -->
    <div class="row">
        <div class="d-flex align-items-center justify-space-between mb-4 px-3">
            <h1 class="h3 mb-0 text-gray-800">Account Dashboard</h1>
            <!-- <a href="" class="btn btn-primary ml-5">UPDATE PROFILE</a> -->
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <!-- <div class="card-header">{{ __('Account Details') }}</div> -->

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}

                    <div class="mt-5">
                        <p>Account Name: {{ auth()->user()->name }}</p>
                        <p>Account Email: {{ auth()->user()->email }}</p>
                        <p>Account Role: {{ auth()->user()->role_id == 1 ? 'ADMIN' : (auth()->user()->role_id == 2 ? 'LAWYER' : 'CLIENT')  }}</p>
                        <p>Account Phone: {{ auth()->user()->phone }}</p>
                        <p>Account Address: {{ auth()->user()->address }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
<!-- </div> -->
@endsection
