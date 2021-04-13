@extends('admin.layout')

@section('title', 'Categorías')

@section('content')
    <div class="m-4">
        <h2 class="mt-3 mb-3">Listado de Categorías</h2>

        <!-- Success message -->
        @if(session('success'))
                <div class="alert alert-success mb-3 small"> {{ session('success') }}</div>
        @endif

        <!-- Create category button -->
        <a class="btn btn-secondary btn-lg btn-block p-1" href="{{ route('admin.categories.create') }}" role="button">Crear categoría</a>
        
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
                            <a href="{{ route('admin.categories.show', $category->id) }}">
                                {{ $category->name }}
                            </a>
                        </th>

                        <!-- Posts count -->
                        <td>
                            <a href="{{ route('admin.categories.show', $category->id) }}">
                                {{ $category->posts_count }}
                            </a>
                        </td>

                        <!-- Edit button -->
                        <td>
                        <a href="{{ route('admin.categories.edit', $category->id) }}"><i class="btn btn-primary fas fa-edit" aria-hidden="true"></i></a>
                        </td>

                        <!-- Delete button -->
                        <td>
                            <form method="POST" action="{{ route('admin.categories.destroy', $category->id) }}">                    
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
        <div class="d-flex mb-4">
                {{ $categories->links('pagination::bootstrap-4') }}
        </div>
    </div>
@endsection
