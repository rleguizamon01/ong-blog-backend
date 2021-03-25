@extends('admin.layout')
@section('content')
<div class="container">
    <div class="d-flex justify-content-center my-4 py-4">
        <div class="col-xs-12 col-sm-10 col-md-10 col-lg-8 col-xl-6">
            <form action="{{ route('admin.categories.store') }}" method="POST">
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
        </div>
    </div>
</div>
@endsection
