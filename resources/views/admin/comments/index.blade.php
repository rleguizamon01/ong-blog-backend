@extends('admin.layout')

@section('content')
    <div class="m-4">
        <h2>
            Listado de Comentarios
        </h2>

        <!-- Success message -->
        @if(session('success'))
            <div class="alert alert-success mb-3 small"> {{ session('success') }}</div>
        @endif

        <div class="table-responsive bg-light">
            <table class="table">
                <thead>
                <tr>
                    <th>Email</th>
                    <th>Comentario</th>
                    <th>Post Id</th>
                    <th>Acciones</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($comments as $comment)
                    <tr>
                        <td>
                            {{$comment->email}}
                        </td>
                        <td>
                            {{$comment->body}}
                        </td>
                        <td>
                            <a href="{{route('admin.posts.show',['post' => $comment->post_id])}}">
                                {{$comment->post_id}}
                            </a>
                        </td>
                        <td>
                            <a href="{{route('admin.comments.edit', $comment) }}">
                                <i class="btn btn-primary fas fa-edit" aria-hidden="true"></i>
                            </a>
                            <form class="d-inline-flex" action="{{route('admin.comments.destroy', ['post'=>$comment->post_id, 'comment'=>$comment])}}" method="POST">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger"><i class="far fa-trash-alt"></i>
                                </button>
                            </form>
                        </td>
                        <td>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <p>{{$comments->links()}}</p>
    </div>
@endsection
