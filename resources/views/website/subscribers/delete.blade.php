<form method="delete" action="{{route('subscribers.destroy', ['hash' => $subscriber->hash])}}">
    @csrf
    <div class="form-group">
        <label for="email">Email</label>
        <input type="email" class="form-control" id="email" name="email" placeholder="Ingrese su email" value="{{ old('email') }}">
        
        @error('email')
            <div class="error"> {{ $errors->first('email') }} </div>
        @enderror
    </div>
    <button type="submit" class="btn btn-primary">Desuscribirse</button>
</form>