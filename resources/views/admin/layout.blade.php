<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>{{ config('app.name', 'ONG Team') }}</title>
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Bootstrap CSS-->
     <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <!-- Template CSS-->
     <link href="{{ asset('css/style.default.css') }}" rel="stylesheet">
    <!-- Custome CSS-->
     <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
    <!-- Font Awesome CSS-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.2/css/all.css"
          integrity="sha384-vSIIfh2YWi9wW0r9iZe7RJPrKwp6bG+s9QZMoITbCckVJqGCCRhc+ccxNcdpHuYu" crossorigin="anonymous">
    <!-- Custom icon font-->
    <link rel="stylesheet" href="{{ asset('css/fontastic.css') }}">
    <!-- Google fonts - Open Sans-->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700">
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

  </head>
  <body>
    <header class="header">
      <!-- Main Navbar-->
      <nav class="navbar navbar-expand-lg">

        <div class="container">
          <!-- Navbar Brand -->
          <div class="navbar-header d-flex align-items-center justify-content-between">
            <!-- Navbar Brand --><a href="{{ url('/') }}" class="navbar-brand">{{ config('app.name', 'Laravel') }}</a>
            <!-- Toggle Button-->
            <button type="button" data-toggle="collapse" data-target="#navbarcollapse" aria-controls="navbarcollapse" aria-expanded="false" aria-label="Toggle navigation" class="navbar-toggler"><span></span><span></span><span></span></button>
          </div>
          <!-- Navbar Menu -->
          <div id="navbarcollapse" class="collapse navbar-collapse">
            <ul class="navbar-nav ml-auto">
              <li class="nav-item"><a href="/" class="nav-link {{(Request::path()==='/') ? 'active' : ''}}">Inicio</a>
              </li>
              <li class="nav-item"><a href="{{ route('admin.posts.index') }}" class="nav-link {{(Request::path()==='admin/posts') ? 'active' : ''}}">Posts</a>
              </li>
              <li class="nav-item"><a href="{{ route('admin.categories.index') }}" class="nav-link {{(Request::path()==='admin/categories') ? 'active' : ''}}">Categorias</a>
              </li>
              <li class="nav-item"><a href="{{ route('admin.comments.index') }}" class="nav-link {{(Request::path()==='admin/comments') ? 'active' : ''}}">Comentarios</a>
              </li>
              <li class="nav-item"><a href="{{ route('admin.volunteers.index') }}" class="nav-link {{(Request::path()==='admin/volunteers') ? 'active' : ''}}">Voluntarios</a>
              </li>
              <li class="nav-item"><a href="{{ route('admin.donations.index') }}" class="nav-link {{(Request::path()==='admin/donations') ? 'active' : ''}}">Donaciones</a>
              </li>
              <li class="nav-item"><a href="{{ route('admin.subscribers.index') }}" class="nav-link {{(Request::path()==='admin/subscribers') ? 'active' : ''}}">Suscriptores</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
    </header>

    <!-- Board Section-->
    <section class="board">
      <div class="container">
            @yield('content')
      </div>
    </section>

  </body>
</html>
