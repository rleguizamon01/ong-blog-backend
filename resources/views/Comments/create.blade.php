
    <form method="POST" action="/posts/{{$post->id}}/comments">
        @csrf
        <label for="email">Email: </label>
        <input type="text" name="email"
               value="{{ old('email') }}">

        <p>{{ $errors->first('email') }}</p>

        <br>

        <label for="body">Body:</label>
        <textarea name="body" id="body" cols="30" rows="10">
            {{ old('body') }}
            </textarea>

        <p>{{ $errors->first('body') }}</p>

        <br>

        <button type="submit">Send</button>
    </form>
