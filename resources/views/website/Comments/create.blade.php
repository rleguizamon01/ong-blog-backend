<header>
    <h3 class="h6">Deja tu comentario</h3>
</header>
<form method="POST" action="{{route('comments.store',$post->id)}}" class="commenting-form">
    @csrf
    <div class="row">
        <div class="form-group col-md-12">
            <input type="email" name="email" id="email" placeholder="Direccion de email" class="form-control">
            @error('email')
            <p>{{ $errors->first('email') }}</p>
            @enderror
        </div>
        <div class="form-group col-md-12">
            <textarea name="body" id="body" placeholder="Tu comentario" class="form-control"></textarea>
            @error('body')
            <p>{{ $errors->first('body') }}</p>
            @enderror
        </div>
        <div class="form-group col-md-12">
            <button type="submit" class="btn btn-secondary">Enviar comentario</button>
        </div>
    </div>
</form>
