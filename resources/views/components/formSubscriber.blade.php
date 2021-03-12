<form method="post">
    @csrf
    <div class="form-group">
            <label for="first_name">Nombre</label>
            <input type="text" class="form-control" id="first_name" name="first_name" placeholder="Ingrese su nombre ..." value="{{ old('first_name') }}">
            
            @error('first_name')
                <div class="error"> {{ $errors->first('first_name') }} </div>
            @enderror
        </div>
    
        <div class="form-group">
            <label for="last_name">Apellido</label>
            <input type="text" class="form-control" id="last_name" name="last_name" placeholder="Ingrese su apellido" value="{{ old('last_name') }}">
    
            @error('last_name')
                <div class="error"> {{ $errors->first('last_name') }} </div>
            @enderror
        </div>
    
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Ingrese su email" value="{{ old('email') }}">
    
            @error('email')
                <div class="error"> {{ $errors->first('email') }} </div>
            @enderror
        </div>
     {{$slot}}
</form>