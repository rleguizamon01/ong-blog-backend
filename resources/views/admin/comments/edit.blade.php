@extends('admin.layout')
@section('content')
<div class="container">
    <div class="d-flex justify-content-center my-4 py-4">
        <div class="col-xs-12 col-sm-10 col-md-10 col-lg-8 col-xl-6">
            <form method="POST" action="{{route('admin.comments.update',[$post->id,$comment->id])}}">
                @csrf
                @method('PATCH')

                <label for="email">Email: </label>
                <input type="text" name="email"
                    value="{{ $comment->email }}">

                @error('email')
                <p>{{ $errors->first('email') }}</p>
                @enderror

                <label for="body">Body:</label>
                <textarea name="body" id="body" cols="30" rows="10">
                    {{ $comment->body }}
                </textarea>

                @error('body')
                <p>{{ $errors->first('body') }}</p>
                @enderror

                <button type="submit">Send</button>
            </form>
        </div>
    </div>
</div>
@endsection

