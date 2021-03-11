<form action="{{ route('categories.store') }}" method="POST">
    @csrf

    <div class="form-group">
        <label for="name">Nombre de categoría</label>
        <input type="text" class="form-control" id="name" name="name" placeholder="Nombre" value="{{ old('name') }}">
        
        @error('name')
            <div class="error"> {{ $errors->first('name') }} </div>
        @enderror
    </div>
     <button type="submit" class="btn btn-primary">Ingresar</button>
</form>
