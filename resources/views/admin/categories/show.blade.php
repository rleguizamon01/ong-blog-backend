@extends('admin.layout')

@section('title', $category->name)

@section('content')
   <div class="container">
        
        <div class="row ml-2 mt-4">
            <!-- Back to index button -->
            <a href="{{ route('admin.categories.index') }}" class="btn btn-dark p-1 mb-2"><i class="fa fa-arrow-left"></i></a>
        </div>
        <div class="row ml-2">
           <header><h5 class="mt-3 mb-3"> {{ $category->name }}</h5></header>
        </div>
        <div class="row">
            @forelse($category->posts as $post)
                <div class="card col-xl-6 border-0 mb-5 pr-5 pl-5">
                    <div class="card-body">
                        <!-- Photo -->
                        <a href="{{ route('posts.show', $post->id) }}">
                            <img src="{{ $post->photo }}" class="card-img-top mb-3">
                        </a>
                        <!-- Title -->
                        <a href="{{ route('posts.show', $post->id) }}" class="text-decoration-none">
                            <h5 class="card-title"> {{ $post->title }}</h5>
                        </a>
                        <div class="d-flex justify-content-between mt-2 mb-2">
                            <!-- Date -->
                            <div class="text-uppercase text-muted font-monospace">
                                {{ $post->created_at->format('d M Y') }}
                            </div>
                            <!-- Category -->
                            <div class="text-capitalize text-muted">
                                {{ $post->category->name }}
                            </div>
                        </div>
                        <!-- Author -->
                        <p class="card-text text-muted fw-bold"> {{ $post->user->first_name }} {{ $post->user->last_name }}</p>
                    </div>
                </div>
            @empty
                <div class="ml-4 mt-2 mb-4"> <p class="text-muted">Todavía no hay posts dentro de esta categoria</p></div>
            @endforelse
        </div>
    </div>
@endsection
