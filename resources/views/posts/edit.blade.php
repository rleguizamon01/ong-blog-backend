<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog Ong</title>
</head>
<body>
    <form method='POST' action="{{ route('posts.update', ['post' => $post]) }}" enctype="multipart/form-data">
    @method('PATCH')
    @csrf
        <div>
            <label for="category_id">Categoria</label>
            <select type="text" name="category_id" id="category_id" aria-describedby="category_idError"  required>
            <option selected  value=0 > Seleccione una categoria </option>
            @foreach($categories as $category)
                <option {{ old('category_id', $post->category_id ) == $category->id ? "selected" : '' }}
                    value="{{$category->id }}" > {{$category->name }}
                </option>
            @endforeach
            </select>
            @error('category_id')
                <div id="category_idError">{{$message}}</div>
            @enderror
        </div>
        <div>
            <label for="title">Titulo</label>
            <input type="text" name="title" id="title" aria-describedby="titleError" placeholder="Titulo del post" value="{{old('title', $post->title)}}" required>
            @error('title')
                <div id="titleError">{{$message}}</div>
            @enderror
        </div>
        <div>
            <label for="body">Cuerpo del Post</label>
            <textarea aria-describedby="bodyError" name="body" id="body" rows="4">{{old('body', $post->body)}}</textarea>
            @error('body')
                <div id="bodyError">{{$message}}</div>
            @enderror
        </div>
        <div>
            <label for="photo">Imagen</label>
            <input type="file" name="photo" id="photo" aria-describedby="photoError" accept=".jpg,.png,.jpeg,.bmp,.gif">
            @error('photo')
                <div id="photoError">{{$message}}</div>
            @enderror
        </div>

        <button type="submit">Enviar</button>
    </form>

</body>
</html>
