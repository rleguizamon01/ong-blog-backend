@extends('admin.layout')
@section('content')
<div class="m-4">
    <h1 >
        Listado de Donaciones
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
                    <a class="btn btn-primary" href="{{route('admin.donations.show', ['donation'=>$donation])}}" role="button">Ver detalle</a>
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <p>{{$donations->links()}}</p>
</div>
@endsection
