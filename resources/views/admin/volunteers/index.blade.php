@extends('admin.layout')

@section('content')
    <div class="m-4">
        <h2>
            Listado de Voluntarios
        </h2>
        <form method='GET' action="{{ route('admin.volunteers.filter') }}">
        <div class="form-row align-items-end">
            <div class="form-group col-md-2">
                <label for="status">Estado:</label>
                <select type="text" name="status" id="status" class="form-control">
                    <option {{ $estado == 'all' ? "selected" : '' }} value='all' >Todos</option>
                    <option {{ $estado == 'pending' ? "selected" : '' }} value='pending' >Pendientes</option>
                    <option {{ $estado == 'accepted' ? "selected" : '' }} value='accepted' >Aceptados</option>
                    <option {{ $estado == 'rejected' ? "selected" : '' }} value='rejected' >Rechazados</option>
                </select>
            </div>
            <div class="form-group col-md-3">
                <label for="filter">Buscar:</label>
                <input type="text" name="filter" id="filter" class="form-control" value='{{ $filter? $filter : '' }}'>
            </div>
            <div class="form-group col-md-2">
                <button type="submit" class="btn btn-primary">Filtrar</button>
            </div>
        </div>
        <div class="table-responsive bg-light">
            <table class="table">
                <thead>
                <tr>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Email</th>
                    <th>Telefono</th>
                    <th>F. Nac.</th>
                    <th>Estado</th>
                    <th>Revision</th>
                    <th>Acep.</th>
                    <th>Rech.</th>
                </tr>
                </thead>
                <tbody>
                @forelse ($volunteers as $volunteer)
                    <tr>
                        <td>
                            <a href="{{route('admin.volunteers.show', ['volunteer' => $volunteer])}}">
                                {{$volunteer->id}}
                            </a>
                        </td>
                        <td>
                            {{$volunteer->first_name}}
                        </td>
                        <td>
                            {{$volunteer->last_name}}
                        </td>
                        <td>
                            {{$volunteer->email}}
                        </td>
                        <td>
                            {{$volunteer->phone_number}}
                        </td>
                        <td>
                            {{$volunteer->birthdate}}
                        </td>
                        <td>
                            {{$volunteer->status}}
                        </td>
                        <td>
                            {{\Carbon\Carbon::now()->toDateString($volunteer->reviewed_at)}}
                        </td>
                        <td>
                            @unless ( $volunteer->status === 'accepted')
                            <a href="{{route('admin.volunteers.approved', ['volunteer' => $volunteer])}}">
                                <i class="btn fas fa-check text-success" aria-hidden="true"></i>
                            </a>
                            @endunless
                        </td>
                        <td>
                            @unless ( $volunteer->status === 'rejected')
                            <a href="{{route('admin.volunteers.rejected', ['volunteer' => $volunteer])}}">
                                <i class="btn fas fa-times text-danger" aria-hidden="true"></i>
                            </a>
                            @endunless
                        </td>
                        <td>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6">No hay voluntarios con esas caracteristicas</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>
        <p>{{$volunteers->links()}}</p>
        </form>
    </div>
@endsection