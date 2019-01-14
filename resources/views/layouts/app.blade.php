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
      <li class="nav-item">
        <a class="nav-link "  href="{{ route('category.category_post') }}">Categories</a>
      </li>
      <li class="nav-item">
        <a class="nav-link "  href="{{ route('category.create') }}">Add Category</a>
      </li>
      <li class="nav-item">
        <a class="nav-link "  href="{{ route('post.create') }}">Add Post</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{route('tags.post_tag')}}">Tags</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="{{route('tags.create')}}">Add Tags</a>
      </li>
        <li class="nav-item">
          <a class="nav-link" href="{{route('post.show_all')}}">Posts</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{route('admin.auth.login')}}">Admin Acess</a>
        </li>
      </ul>
      <form class="form-inline mt-2 mt-md-0" action="{{ route('post.search')}}" method="GET">
            <input class="form-control mr-sm-2" type="text" placeholder="Search" aria-label="Search" name="s"  value="{{isset($s) ? $s : '' }}" required>
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
          </form>
           &nbsp; &nbsp;
        <ul class="navbar-nav">
          @guest
          <li class=" mt-2 mt-md-0 nav-item">
            <a class="nav-link " href="{{ route('login') }}"> <i class="fa fa-sign-in" aria-hidden="true"></i> Login</a>
          </li>
          <li class=" mt-2 mt-md-0 nav-item">
            <a class="nav-link " href="{{ route('register') }}"> <i class="fa fa-user-plus" aria-hidden="true"></i> Register</a>
          </li>
          @else
                  <li class="nav-item">
                        <a class="nav-link " href="{{ route('profile') }}">{{ Auth::user()->name }}
                        </a>
                    </li>
                      <li class="nav-item">
                          <a class="nav-link " href="{{ route('logout') }}"
                              onclick="event.preventDefault();
                                       document.getElementById('logout-form').submit();">
                              Logout
                          </a>

                          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                              {{ csrf_field() }}
                          </form>
                      </li>
          @endguest
      </ul>
    </div>
  </nav>
</header>
<br><br><br>
    <div class="container">
        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="{{asset('js/jquery-3.3.1.slim.min.js')}}" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write("<script src='{{asset('js/jquery-slim.min.js')}}'><\/script>")</script>
    <script src="{{asset('js/popper.min.js')}}"></script>
    <script src="{{asset('js/bootstrap.min.js')}}"></script>
</body>
</html>
