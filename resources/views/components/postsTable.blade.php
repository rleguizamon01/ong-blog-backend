<div class="m-4">
    <h1 >
        Listado de Posts
    </h1>  
    <div class="table-responsive bg-light">
        <table class="table">
            <thead>
                <tr>
                    <th>Título</th>
                    <th>Categoria</th>
                    <th>Autor</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($posts as $post)
            <tr>
                <td>
                    <a href="{{route('posts.show', ['post'=>$post])}}">
                        {{$post->title}}
                    </a>
                </td>
                <td>
                    {{$post->category->name}}
                </td>
                <td>
                    {{$post->user->first_name}} {{$post->user->last_name}}
                </td>
                <td>
                    {{$post->status}}
                </td>
                <td>
                    <a href="{{route('posts.edit', ['post'=>$post])}}">
                        <i class="fa fa-pencil m-2" aria-hidden="true"></i>
                    </a>
                    <form class="d-inline-flex" action="{{route('posts.destroy', ['post'=>$post])}}" method="POST">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-danger fa fa-trash btn-eliminar">
                        </button>
                    </form>
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <p>{{$posts->links()}}</p>
</div>