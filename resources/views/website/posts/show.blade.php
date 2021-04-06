@extends('website.layout')
@section('title') {{$post->title}}@endsection
@section('content')
    <main class="post blog-post col-lg-10">
        <div class="container">
            <div class="post-single">
                <div class="post-thumbnail"><img src="{{ $post->photo }}" class="img-fluid"></div>
                <div class="post-details">
                    <div class="post-meta d-flex justify-content-between">
                        <div class="title">Categoria: {{$post->category->name}}</div>
                    </div>
                </div>
                <!--Usuario-->
                <div class="post-footer d-flex align-items-center flex-column flex-sm-row"><div class="author d-flex align-items-center flex-wrap">
                        <div class="title"><i class="fas fa-user"></i><span>{{ $post->user->first_name }} {{ $post->user->last_name }}</span></div></div>
                    <div class="d-flex align-items-center flex-wrap">
                        <div class="date"><i class="fas fa-table"></i>{{ $post->created_at->format('d M Y') }}</div>
                        <div class="comments meta-last"><i class="fas fa-comments"></i>{{ count($post->comments) }}</div>
                    </div>
                </div>
                    <h1>{{$post->title}}</h1>

                    <div class="post-body">
                        <p>{{$post->body}}</p>
                    </div>

                    <div class="post-comments">
                        <header>
                            <h3 class="h6">Comentarios del post<span class="no-of-comments">{{ count($post->comments) }}</span></h3>
                        </header>
                        <!--comments-->
                        @foreach($post->comments as $comment)
                        <div class="comment">
                            <div class="comment-header d-flex justify-content-between">
                                <div class="user d-flex align-items-center">
                                    <div class="title"><strong>{{$comment->email}}</strong></div>
                                </div>
                            </div>
                            <div class="comment-body">
                                <p>{{$comment->body}}</p>
                            </div>
                        </div>
                        @endforeach

                    <div class="add-comment">
                        @include('website.comments.create', ['post' => $post])
                    </div>

                </div>
            </div>
        </div>
    </main>
@endsection
