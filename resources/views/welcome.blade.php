@extends('layout')

@section('title')
    Inicio
@endsection

@section('content')
    <!-- Hero Section-->
    <section style="background: url(https://images.unsplash.com/photo-1557089041-7fa93ffc2e08?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=749&q=80); background-size: cover; background-position: center center" class="hero">
        <div class="container">
            <div class="row">
                <div class="col-lg-7">
                    <h1>ONG Team - A free template by Bootstrap Temple</h1><a href="/posts" class="hero-link">Ver posts</a>
                </div>
            </div>
        </div>
    </section>
    <!-- Intro Section-->
    <section class="intro">
        <div class="container">
            <div class="row">
                <div class="col-lg-8">
                    <h2 class="h3">Some great intro here</h2>
                    <p class="text-big">Place a nice <strong>introduction</strong> here <strong>to catch reader's attention</strong>. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderi.</p>
                </div>
            </div>
        </div>
    </section>
    <!-- Divider Section-->
    <section style="background: url(https://images.unsplash.com/photo-1543196614-e046c7d3d82e?ixlib=rb-1.2.1&ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&auto=format&fit=crop&w=898&q=80); background-size: cover; background-position: center bottom" class="divider">
        <div class="container">
            <div class="row">
                <div class="col-md-7">
                    <h2>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua</h2><a href="/volunteers" class="hero-link">Voluntariado</a>
                </div>
            </div>
        </div>
    </section>
    <br>
    <!-- Newsletter Section-->
   @component('components.formCreateSubscriber')
   @endcomponent
    <br>
@endsection
