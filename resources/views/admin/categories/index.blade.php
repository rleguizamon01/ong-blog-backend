@extends('layout')

@section('title', 'Categorías')

@section('content')
    <div class="container">
        <div class="d-flex justify-content-center my-4">
            <div class="col-xs-12 col-sm-11 col-md-11 col-lg-10 col-xl-10">
                <header>
                    <h5 class="mt-3 mb-3">Categorías</h5>
                </header>

                <!-- Success message -->
                @if(session('success'))
                        <div class="alert alert-success mb-3 small"> {{ session('success') }}</div>
                @endif

                <!-- Create category button -->
                <a class="btn btn-secondary btn-lg btn-block p-1" href="{{ route('categories.create') }}" role="button">Crear categoría</a>
                
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Nombre</th>
                            <th scope="col">Cantidad de posts</th>
                            <th scope="col">Editar</th>
                            <th scope="col">Borrar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Rows -->
                        @foreach($categories as $category)
                            <tr>
                                <!-- Name -->
                                <th scope="row">
                                    <a href="{{ route('categories.posts.index', $category->id) }}">
                                        {{ $category->name }}
                                    </a>
                                </th>

                                <!-- Posts count -->
                                <td>
                                    {{ $category->posts_count }}
                                </td>

                                <!-- Edit button -->
                                <td>
                                <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-warning"><i class="fa fa-edit"></i></a>
                                </td>

                                <!-- Delete button -->
                                <td>
                                    <form method="POST" action="{{ route('categories.destroy', $category->id) }}">                    
                                        @METHOD('delete')
                                        @csrf
                                        <button type="submit" class="btn btn-danger" 
                                            @if($category->posts_count == 0)
                                                onclick="return confirm('Esta acción borrará la categoría {{ $category->name }}, ¿está seguro?')"
                                            @else
                                                onclick="return confirm('ALERTA: esta acción borrará la categoría {{ $category->name }} y los {{ $category-> posts_count}} posts que están relacionados, ¿está seguro?')"
                                            @endif
                                        >
                                            <i class="fa fa-trash"></i> 
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <!-- Pagination buttons -->
                <div class="d-flex justify-content-center mb-4">
                        {{ $categories->links('pagination::bootstrap-4') }}
                </div>
            </div>
        </div>
    </div>
@endsection
