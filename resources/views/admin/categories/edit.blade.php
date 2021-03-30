@extends('admin.layout')

@section('title', 'Editar categoría')

@section('content')
    <div class="container">
        <div class="d-flex justify-content-center my-4">
            <div class="col-xs-12 col-sm-10 col-md-10 col-lg-8 col-xl-6">

                <!-- Back to index button -->
                <a href="{{ route('admin.categories.index') }}" class="btn btn-dark p-1 mb-2"><i class="fa fa-arrow-left"></i></a>

                <header>
                    <h5 class="mt-3 mb-3">Editar categoría</h5>
                </header>
    
                <!-- Success message -->
                @if(session('success'))
                        <div class="alert alert-success mb-3 small"> {{ session('success') }}</div>
                @endif
        
                <form method='POST' action="{{ route('admin.categories.update', ['category' => $category]) }}" >
                    @method('PATCH')
                    @csrf

                    <!-- Name input -->
                    <div class="form-group">
                        <label for="name">Nombre de categoría</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Nombre" value="{{ $category->name }}">
                        
                        @error('name')
                            <div class="alert alert-danger mt-3 small p-2"> {{ $errors->first('name') }} </div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary">Editar</button>
                </form>
            </div>
        </div>
    </div>
@endsection
