
<h1>Listado de Posts</h1>
<div class="table-responsive bg-light">
    <table class="table">
        <thead>
        <tr>
            <th>Título</th>
            <th>Categoria</th>
            <th>Autor</th>
            <th>Estado</th>
            <th class="">Acciones</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($posts as $post)
        <tr>
            <td>
                <a href="#">
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
            <td class="">
                <a href="#">
                    <i class="fa fa-pencil m-2" aria-hidden="true"></i>
                </a>
                <form class="form-eliminar d-inline-flex" action="#" method="POST">
                    @csrf
                    @method('delete')
                    <input type="hidden" name="id" value="{{$post->id}}">
                        <button type="submit" class="btn btn-danger fa fa-trash btn-eliminar">
                        </button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
    </table>
    <p>{{$posts->links()}}</p>
</div>
