@extends('admin.layout')
@section('content')
<div class="m-4">
        <!-- Back to index button -->
        <a href="{{ route('admin.comments.index') }}" class="btn btn-dark p-1 mb-2"><i class="fa fa-arrow-left"></i></a>

        <header>
            <h5 class="mt-3 mb-3">Editar comentario</h5>
        </header>

        <!-- Success message -->
        @if(session('success'))
                <div class="alert alert-success mb-3 small"> {{ session('success') }}</div>
        @endif

        <form method='POST' action="{{ route('admin.comments.update', ['comment' => $comment]) }}" >
            @method('PATCH')
            @csrf

            <!-- Email input -->
            <div class="form-group">
                <label for="name">Email</label>
                <input type="text" class="form-control" id="email" name="email" placeholder="Nombre" value="{{ $comment->email }}">
                
                @error('email')
                    <div class="alert alert-danger mt-3 small p-2"> {{ $errors->first('email') }} </div>
                @enderror
            </div>

            <!-- Body input -->
            <div class="form-group">
                <label for="name">Comentario</label>
                <textarea class="form-control" id="body" name="body"> {{ $comment->body }} </textarea>
                
                @error('body')
                    <div class="alert alert-danger mt-3 small p-2"> {{ $errors->first('body') }} </div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Editar</button>
        </form>
    </div>
@endsection

