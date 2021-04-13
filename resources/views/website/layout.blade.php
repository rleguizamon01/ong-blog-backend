<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title> @yield('title') - ONG Team</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="all,follow">
    <!-- Bootstrap CSS-->
    <link rel="stylesheet" href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }} ">
    <!-- Font Awesome CSS-->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.2/css/all.css"
          integrity="sha384-vSIIfh2YWi9wW0r9iZe7RJPrKwp6bG+s9QZMoITbCckVJqGCCRhc+ccxNcdpHuYu" crossorigin="anonymous">
    <!-- Custom icon font-->
    <link rel="stylesheet" href="{{ asset('css/fontastic.css') }}">
    <!-- Google fonts - Open Sans-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700">
    <!-- theme stylesheet-->
    <link rel="stylesheet" href="{{ asset('css/style.default.css') }}" id="theme-stylesheet">
    <!-- Custom stylesheet - for your changes-->
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
    <script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('vendor/bootstrap/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <link rel="stylesheet" href="/css/custom.css">
@stack('dropzone-css')
<!--Script-->
    <script src="/vendor/jquery/jquery.min.js"></script>
    <script src="/vendor/bootstrap/js/bootstrap.min.js"></script>
</head>
<body>
<header class="header">
    <!-- Main Navbar-->
    <nav class="navbar navbar-expand-lg">
        <div class="container">
            <!-- Navbar Brand -->
            <div class="navbar-header d-flex align-items-center justify-content-between">
                <!-- Navbar Brand --><a href="/" class="navbar-brand">ONG Team</a>
                <!-- Toggle Button-->
                <button type="button" data-toggle="collapse" data-target="#navbarcollapse"
                        aria-controls="navbarcollapse" aria-expanded="false" aria-label="Toggle navigation"
                        class="navbar-toggler"><span></span><span></span><span></span></button>
            </div>
            <!-- Navbar Menu -->
            <div id="navbarcollapse" class="collapse navbar-collapse">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item"><a href="{{ route('welcome') }}"
                                            class="nav-link {{ Route::is('welcome') ? 'active' : '' }}">Inicio</a></li>
                    <li class="nav-item"><a href="{{ route('posts.index') }}"
                                            class="nav-link {{ Route::is('posts.index') ? 'active' : '' }}">Posts</a>
                    </li>
                    <li class="nav-item"><a href="{{ route('volunteers.create') }}"
                                            class="nav-link {{ Route::is('volunteers.create') ? 'active' : '' }}">Voluntariado</a>
                    </li>
                    <li class="nav-item"><a href="{{ route('donations.create') }}"
                                            class="nav-link {{ Route::is('donations.create') ? 'active' : '' }}">Donar</a>
                    </li>
                    <!-- Authentication Links -->
                    @guest
                        @if (Route::has('login'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Ingresar') }}</a>
                            </li>
                        @endif

                        @if (Route::has('register'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('register') }}">{{ __('Registrarse') }}</a>
                            </li>
                        @endif
                    @else
                        @if (Auth::user()->isAdmin())
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                                   data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Admin
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item {{ Route::is('admin.posts.index') ? 'active' : '' }}"
                                       href=" {{ route('admin.posts.index') }}">Posts</a>
                                    <a class="dropdown-item {{ Route::is('admin.volunteers.index') ? 'active' : '' }}"
                                       href=" {{ route('admin.volunteers.index') }}">Voluntarios</a>
                                    <a class="dropdown-item {{ Route::is('admin.comments.index') ? 'active' : '' }}"
                                       href=" {{ route('admin.comments.index') }}">Comentarios</a>
                                    <a class="dropdown-item {{ Route::is('admin.categories.index') ? 'active' : '' }}"
                                       href=" {{ route('admin.categories.index') }}">Categorías</a>
                                    <a class="dropdown-item {{ Route::is('admin.subscribers.index') ? 'active' : '' }}"
                                       href=" {{ route('admin.subscribers.index') }}">Suscriptores</a>
                                    <a class="dropdown-item {{ Route::is('admin.donations.index') ? 'active' : '' }}"
                                       href=" {{ route('admin.donations.index') }}">Donaciones</a>
                                </div>
                            </li>
                        @endif
                        <li class="nav-item">
                            <a href="{{ route('logout') }}"
                               class="nav-link"
                               onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                                {{ __('Cerrar sesión') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>
</header>

@yield('content')

<!-- Page Footer-->
<footer class="main-footer">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="logo">
                    <h6 class="text-white">ONG TEAM</h6>
                </div>
                <div class="contact-details">
                    <p>53 Broadway, Broklyn, NY 11249</p>
                    <p>Phone: (020) 123 456 789</p>
                    <p>Email: Info@Company.com</p>
                    <ul class="social-menu">
                        <li class="list-inline-item"><a href="#"><i class="fab fa-facebook"></i></a></li>
                        <li class="list-inline-item"><a href="#"><i class="fab fa-twitter"></i></a></li>
                        <li class="list-inline-item"><a href="#"><i class="fab fa-instagram"></i></a></li>
                        <li class="list-inline-item"><a href="#"><i class="fab fa-behance"></i></a></li>
                        <li class="list-inline-item"><a href="#"><i class="fab fa-pinterest"></i></a></li>
                    </ul>
                </div>
            </div>
            <div class="col-md-4">
                <div class="menus d-flex">
                    <ul class="list-unstyled">
                        <li><a href="#">Blog</a></li>
                        <li><a href="#">Volunteers</a></li>
                        <li><a href="#">Subscribers</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="copyrights">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <p>&copy; 2017. All rights reserved. Your great site.</p>
                </div>
                <div class="col-md-6 text-right">
                    <p>Template By <a href="https://bootstrapious.com/p/bootstrap-carousel" class="text-white">Bootstrapious</a>
                        <!-- Please do not remove the backlink to Bootstrap Temple unless you purchase an attribution-free license @ Bootstrap Temple or support us at http://bootstrapious.com/donate. It is part of the license conditions. Thanks for understanding :)                         -->
                    </p>
                </div>
            </div>
        </div>
    </div>
</footer>
@stack('scripts')
@stack('dropzone-js')
</body>
</html>
