<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Blog Ong</title>
</head>
<body>
    <form method='POST' action="{{ route('categories.update', ['category' => $category]) }}" enctype="multipart/form-data">
    @method('PATCH')
    @csrf
        <div class="form-group m-4">
            <label for="name">Nombre Categoria</label>
            <input type="text" name="name" id="name" class="form-control @error('name') border-danger @enderror" aria-describedby="nameError" minlength="1" maxlength="50" placeholder="Nombre de la categoria" value="{{old('name') ? old('name') : $category->name }}" required>
            @error('name')
                <small id="nameError" class="form-text text-danger">{{$message}}</small>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Enviar</button>
    </form>

</body>
</html>