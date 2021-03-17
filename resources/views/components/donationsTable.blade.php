<div class="m-4">
    <h1 >
        Listado de Posts
    </h1>  
    <div class="table-responsive bg-light">
        <table class="table">
            <thead>
                <tr>
                    <th>Email</th>
                    <th>Monto</th>
                    <th>Estado</th>
                    <th>Fecha</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($donations as $donation)
            <tr>
                <td>
                    {{$donation->email}}
                </td>
                <td>
                    {{$donation->amount}}
                </td>
                <td>
                    {{$donation->status}}
                </td>
                <td>
                    {{$donation->created_at}}
                </td>
                <td>
                    <form class="d-inline-flex" action="{{route('donations.destroy', ['donation'=>$donation])}}" method="POST">
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
    <p>{{$donations->links()}}</p>
</div>