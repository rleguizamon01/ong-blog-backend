@extends('layout')
@section('content')
@if (Session::has('deleted'))
     <div class="alert alert-warning" role="alert"> Se ha eliminado a {{session('deleted')}} </div>
   @endif  
<div class="m-4">
    <h2 >
        Listado de Suscriptores
    </h2>
    <form method='GET' action="{{route('admin.subscribers.filter')}}">
        <div class="form-row align-items-end">
            <div class="form-group col-md-2">
                <label for="status">Estado:</label>
                <select type="text" name="status" id="status" class="form-control">
                    <option {{ $status == 'all' ? "selected " : '' }} value='all' >Todos</option>
                    <option {{ $status == 'active' ? "selected " : '' }}value='active' >Activos</option>
                    <option {{ $status == 'delete' ? "selected " : '' }}value='delete' >Eliminados</option>
                </select>
            </div>
            <div class="form-group col-md-3">
                <label for="filter">Buscar:</label>
                <input type="text" name="filter" id="filter" class="form-control" value=''>
            </div>
            <div class="form-group col-md-2">
                <button type="submit" class="btn btn-primary">Filtrar</button>
            </div>
        </div>  
    </form>    
    <div class="table-responsive bg-light">
        <table class="table">
            <thead>
                <tr>
                    <th>Email</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($subscribers as $subscriber)
            <tr>
                <td>
                    {{$subscriber->email}}
                </td>
                <td>
                    {{$subscriber->first_name}}
                </td>
                <td>
                    {{$subscriber->last_name}}
                </td>
                <td>
                    {{$subscriber->status()}}
                </td>
                <td>
                    <a href="#">
                        <i class="btn btn-primary fas fa-edit" aria-hidden="true"></i>
                    </a>
                    @if (!$subscriber->deleted_at)
                        <form class="d-inline-flex" action="{{route('admin.subscribers.destroy', ['subscriber' => $subscriber->id])}}" method="POST">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-danger"><i class="far fa-trash-alt"></i>
                            </button>
                        </form>  
                    @endif
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <p>{{$subscribers->links()}}</p>
</div>
@endsection