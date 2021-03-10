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
    <form method='POST' action="{{ route('posts.update', ['post' => $post]) }}" enctype="multipart/form-data">
    @method('PATCH')
    @csrf
        <div class="form-group m-4">
            <label for="category_id">Categoria</label>
            <select type="text" name="category_id" id="category_id" class="form-control  @error('category_id') border-danger @enderror" aria-describedby="category_idError"  required>
            <option selected  value=0 > Seleccione una categoria </option>    
            @foreach($categories as $category)
                <option {{ ( old('category_id') ?  old('category_id') : $post->category_id ) == $category->id ? "selected" : '' }} 
                    value="{{$category->id }}" > {{$category->name }}
                </option>    
            @endforeach
            </select>
            @error('category_id')
                <small id="category_idError" class="form-text text-danger">{{$message}}</small>
            @enderror
        </div>
        <div class="form-group m-4">
            <label for="title">Titulo</label>
            <input type="text" name="title" id="title" class="form-control @error('title') border-danger @enderror" aria-describedby="titleError" placeholder="Titulo del post" value="{{old('title') ? old('title') : $post->title }}" required>
            @error('title')
                <small id="titleError" class="form-text text-danger">{{$message}}</small>
            @enderror
        </div>
        <div class="form-group m-4">
            <label for="body">Cuerpo del Post</label>
            <textarea class="form-control @error('body') border-danger @enderror" aria-describedby="bodyError" name="body" id="body" rows="4">{{old('body') ? old('body') : $post->body }}</textarea>       
            @error('body')
                <small id="bodyError" class="form-text text-danger">{{$message}}</small>
            @enderror
        </div>
        <div class="form-group m-4">
            <label for="photo">Imagen</label>
            <input type="file" name="photo" id="photo" class="form-control @error('photo') border-danger @enderror" aria-describedby="photoError" accept=".jpg,.png,.jpeg,.bmp,.gif">
            @error('photo')
                <small id="photoError" class="form-text text-danger">{{$message}}</small>
            @enderror
        </div>

        <button type="submit" class="btn btn-primary">Enviar</button>
    </form>

</body>
</html>