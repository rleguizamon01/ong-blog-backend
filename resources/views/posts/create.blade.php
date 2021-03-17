@extends('layout')

@section('content')
<div class="container">
    <div class="d-flex justify-content-center my-2">
        <div class="col-xs-12 col-sm-10 col-md-10 col-lg-8 col-xl-8">
            <form method='POST' action="{{ route('posts.store') }}" enctype="multipart/form-data">
            @csrf
                <div class="form-group m-4">
                    <label for="category_id">Categoria</label>
                    <select type="text" name="category_id" id="category_id" class="form-control  @error('category_id') border-danger @enderror" aria-describedby="category_idError"  required>
                    <option selected  value=0 > Seleccione una categoria </option>
                    @foreach($categories as $category)
                        <option {{ old('category_id') == $category->id ? "selected" : '' }}
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
                    <input type="text" name="title" id="title" class="form-control @error('title') border-danger @enderror" aria-describedby="titleError" placeholder="Titulo del post" value="{{old('title')}}" required>
                    @error('title')
                        <small id="titleError" class="form-text text-danger">{{$message}}</small>
                    @enderror
                </div>
                <div class="form-group m-4">
                    <label for="body">Cuerpo del Post</label>
                    <textarea class="form-control @error('body') border-danger @enderror" aria-describedby="bodyError" name="body" id="body" rows="6">{{old('body')}}</textarea>
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
        </div>
    </div>
</div>
@endsection
