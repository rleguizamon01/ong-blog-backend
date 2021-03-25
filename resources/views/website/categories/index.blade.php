@extends('website.layout')

@section('title', 'Categorias')

@section('content')

<div class="widget categories">
    <header>
        <h3 class="h6">Categorias</h3>
    </header>
    @foreach($categories as $category)
        <div class="item d-flex justify-content-between"><a href="{{ route('categories.posts.index', $category->id) }}">{{$category->name}}</a><span>{{$category->posts_count}}</span></div>
    @endforeach
</div>

@endsection
