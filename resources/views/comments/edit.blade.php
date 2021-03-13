

<form method="POST" action="{{route('comments.update',[$post->id,$comment->id])}}">
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
