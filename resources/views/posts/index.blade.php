@extends('layout')

@section('title', 'Posts')

@section('content')

    <div class="container">
        <div class="row">
            @forelse($posts as $post)
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
                <p class="m-4 p-4">Lamentablemente, todavia no hay posts dentro de esta categoria</p>
            @endforelse
        </div>
    </div>

    <div class="d-flex justify-content-center">
            {{ $posts->links('pagination::bootstrap-4') }}
    </div>

@endsection
