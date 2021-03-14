
    <form method="POST" action="/posts/{{$post->id}}/comments">
        @csrf
        <label for="email">Email: </label>
        <input type="text" name="email"
               value="{{ old('email') }}">
        @error('body')
        <p>{{ $errors->first('email') }}</p>
        @enderror

        <label for="body">Body:</label>
        <textarea name="body" id="body" cols="30" rows="10">
            {{ old('body') }}
            </textarea>
        @error('body')
        <p>{{ $errors->first('body') }}</p>
        @enderror

        <button type="submit">Send</button>
    </form>
