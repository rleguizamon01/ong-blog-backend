@extends('layout')
@section('title') {{$post->title}}@endsection
@section('content')
    <main class="post blog-post col-lg-10">
        <div class="container">
            <div class="post-single">
                <div class="post-thumbnail"><img src="{{ $post->photo }}" class="img-fluid"></div>
                <div class="post-details">
                    <div class="post-meta d-flex justify-content-between">
                        <div class="category"><a href="#">Categoria: {{$post->category->name}}</a></div>
                    </div>
                </div>
                <!--Usuario-->
                <div class="post-footer d-flex align-items-center flex-column flex-sm-row"><a href="#" class="author d-flex align-items-center flex-wrap">
                        <div class="title"><i class="fas fa-user"></i><span>{{ $post->user->first_name }} {{ $post->user->last_name }}</span></div></a>
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
                        <!--Comments-->
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
                        <header>
                            <h3 class="h6">Deja tu comentario</h3>
                        </header>
                        <form method="POST" action="{{route('comments.store',$post->id)}}" class="commenting-form">
                            @csrf
                            <div class="row">
                                <div class="form-group col-md-12">
                                    <input type="email" name="email" id="email" placeholder="Direccion de email" class="form-control">
                                    @error('email')
                                    <p>{{ $errors->first('email') }}</p>
                                    @enderror
                                </div>
                                <div class="form-group col-md-12">
                                    <textarea name="body" id="body" placeholder="Tu comentario" class="form-control"></textarea>
                                    @error('body')
                                    <p>{{ $errors->first('body') }}</p>
                                    @enderror
                                </div>
                                <div class="form-group col-md-12">
                                    <button type="submit" class="btn btn-secondary">Enviar comentario</button>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </main>
@endsection
