
    <form method="POST" action="/posts/{{$post->id}}/comments">
        @csrf
        <label for="email">Email: </label>
        <input type="text" name="email"
               @error('email') class="danger" @enderror
               value="{{ old('email') }}">

        @error('email')
        <p>{{ $errors->first('email') }}</p>
        @enderror

        <br>

        <label for="body">Body:</label>
        <textarea @error('body') @enderror name="body" id="body" cols="30" rows="10">
            {{ old('body') }}
            </textarea>
        @error('body')
        <p>{{ $errors->first('body') }}</p>
        @enderror
        <br>

        <button type="submit">Send</button>
    </form>
