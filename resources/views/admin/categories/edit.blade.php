@extends('admin.layout')
@section('content')
<div class="container">
    <div class="d-flex justify-content-center my-4 py-4">
        <div class="col-xs-12 col-sm-10 col-md-10 col-lg-8 col-xl-6">
            <form method='POST' action="{{ route('admin.categories.update', ['category' => $category]) }}" >
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
        </div>
    </div>
</div>
@endsection
