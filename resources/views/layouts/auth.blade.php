<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <!-- CSRF Token -->
  <meta name="csrf-token" content="{{ csrf_token() }}">

  <link href="{{ asset('admin') }}/img/logo/logo.png" rel="icon">
  <title>PN APP | @yield('page-title') </title>
  <link href="{{ asset('admin') }}/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
  <link href="{{ asset('admin') }}/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
  <link href="{{ asset('admin') }}/css/ruang-admin.min.css" rel="stylesheet">
</head>

<body class="bg-gradient-login">

    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="{{ url('/') }}">PN APP</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-auto">

                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    <!-- Authentication Links -->
                    @guest
                        @if (Route::has('login'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                        @endif

                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                            </li>
                        @endif
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                {{ Auth::user()->name }}
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                                    document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>

    <!-- Login Content -->
    <div class="container-login">
        <div class="row justify-content-center mt-5">
        <!-- <div class="col-xl-6 col-lg-12 col-md-9">
            <div class="card shadow-sm my-5">
            <div class="card-body p-0">
                <div class="row">
                <div class="col-lg-12">
                    <div class="login-form">
                    <div class="text-center">
                        <h1 class="h4 text-gray-900 mb-4">Login</h1>
                    </div>
                    <form class="user">
                        <div class="form-group">
                        <input type="email" class="form-control" id="exampleInputEmail" aria-describedby="emailHelp"
                            placeholder="Enter Email Address">
                        </div>
                        <div class="form-group">
                        <input type="password" class="form-control" id="exampleInputPassword" placeholder="Password">
                        </div>
                        <div class="form-group">
                        <div class="custom-control custom-checkbox small" style="line-height: 1.5rem;">
                            <input type="checkbox" class="custom-control-input" id="customCheck">
                            <label class="custom-control-label" for="customCheck">Remember
                            Me</label>
                        </div>
                        </div>
                        <div class="form-group">
                        <a href="index.html" class="btn btn-primary btn-block">Login</a>
                        </div>
                        <hr>
                        <a href="index.html" class="btn btn-google btn-block">
                        <i class="fab fa-google fa-fw"></i> Login with Google
                        </a>
                        <a href="index.html" class="btn btn-facebook btn-block">
                        <i class="fab fa-facebook-f fa-fw"></i> Login with Facebook
                        </a>
                    </form>
                    <hr>
                    <div class="text-center">
                        <a class="font-weight-bold small" href="register.html">Create an Account!</a>
                    </div>
                    <div class="text-center">
                    </div>
                    </div>
                </div>
                </div>
            </div>
            </div>
        </div> -->
        <div class="col-md-12">
            @yield('content')
        </div>
        </div>
    </div>
    <!-- Login Content -->

    <script src="{{ asset('admin') }}/vendor/jquery/jquery.min.js"></script>
    <script src="{{ asset('admin') }}/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('admin') }}/vendor/jquery-easing/jquery.easing.min.js"></script>
    <script src="{{ asset('admin') }}/js/ruang-admin.min.js"></script>
</body>

</html>