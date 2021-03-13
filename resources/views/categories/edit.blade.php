<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog Ong</title>
</head>
<body>
    <form method='POST' action="{{ route('categories.update', ['category' => $category]) }}" >
    @method('PATCH')
    @csrf
        <div >
            <label for="name">Nombre Categoria</label>
            <input type="text" name="name" id="name" aria-describedby="nameError" minlength="1" maxlength="50" placeholder="Nombre de la categoria" value="{{old('name', $category->name)}}" required>
            @error('name')
                <div id="nameError">{{$message}}</div>
            @enderror
        </div>

        <button type="submit" >Enviar</button>
    </form>

</body>
</html>
