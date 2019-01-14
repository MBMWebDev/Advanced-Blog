<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
</head>
<body>
      <header>
      <nav class="navbar navbar-expand-md navbar-light fixed-top bg-light">
          <a class="navbar-brand" href="{{asset('/')}}">{{config('app.name')}}</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item ">
              <a class="nav-link" href="{{route('home_page')}}" >Home <span class="sr-only">(current)</span></a>
            </li>
             @guest('admin')
             @else
            <li class="nav-item">
              <a class="nav-link "  href="{{route('admin.dashboard')}}">Dashboard</a>
            </li>
          <li class="nav-item">
            <a class="nav-link "  href="{{route('admin.categories')}}">Categories</a>
          </li>
          <li class="nav-item">
            <a class="nav-link "  href="{{route('admin.tags')}}">Tags</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('admin.posts')}}">Posts</a>
          </li>
          @endguest
          </ul>
          <!-- Right Side Of Navbar -->

            <ul class="navbar-nav">
             @guest('admin')
              <li class=" mt-2 mt-md-0 nav-item">
                <a class="nav-link " href="{{ route('admin.auth.login') }}"> <i class="fa fa-sign-in" aria-hidden="true"></i> Login</a>
              </li>
              <li class=" mt-2 mt-md-0 nav-item">
                <a class="nav-link " href="{{ route('admin.register') }}"> <i class="fa fa-user-plus" aria-hidden="true"></i> Register</a>
              </li>
              @else
                      <li class="nav-item">
                            <a class="nav-link " href="{{ route('admin.dashboard') }}">{{ Auth::user()->name }}
                            </a>
                        </li>
                          <li class="nav-item">
                              <a class="nav-link " href="{{ route('admin.auth.logout') }}"
                                  onclick="event.preventDefault();
                                           document.getElementById('logout-form').submit();">
                                  Logout
                              </a>

                              <form id="logout-form" action="{{ route('admin.auth.logout') }}" method="POST" style="display: none;">
                                  {{ csrf_field() }}
                              </form>
                          </li>
              @endguest
          </ul>
        </div>
      </nav>
    </header>
     <div class="container">
       <br><br><br>
        @yield('content')
      </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
