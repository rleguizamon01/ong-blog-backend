
    <form method="POST" action="/posts/{{$post->id}}/comments">
        @csrf
        <label for="email">Email: </label>
        <input type="text" name="email"
               @error('email') class="danger" @enderror
               value="{{ old('email') }}">

        @error('email')
        <p class="error">{{ $errors->first('email') }}</p>
        @enderror

        <br>

        <label for="body">Body:</label>
        <textarea @error('body') class="danger" @enderror name="body" id="body" cols="30" rows="10">
            {{ old('body') }}
            </textarea>
        @error('body')
        <p class="error">{{ $errors->first('body') }}</p>
        @enderror
        <br>

        <button class="button special fit" type="submit">Send</button>
    </form>
