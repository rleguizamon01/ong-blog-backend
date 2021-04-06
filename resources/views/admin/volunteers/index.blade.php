@extends('admin.layout')

@section('content')
    <div class="m-4">
        <h2>
            Listado de Voluntarios
        </h2>
        <form method='GET' action="{{ route('admin.volunteers.index') }}">
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
        </form>
        <div class="table-responsive bg-light">
            <table class="table">
                <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Apellido</th>
                    <th>Email</th>
                    <th>Telefono</th>
                    <th>Estado</th>
                    <th>Revision</th>
                    <th class="d-flex justify-content-center">Accion</th>
                </tr>
                </thead>
                <tbody>
                @forelse ($volunteers as $volunteer)
                    <tr>
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
                        @switch($volunteer->status)
                            @case('accepted')
                                <i class="btn fas fa-check text-success" aria-hidden="true"></i>
                                @break

                            @case('rejected')
                                <i class="btn fas fa-times text-danger" aria-hidden="true"></i>
                                @break

                            @default
                            <i class="btn fas fa-question text-warning" aria-hidden="true"></i>
                        @endswitch
                        </td>
                        <td>
                            {{\Carbon\Carbon::now()->toDateString($volunteer->reviewed_at)}}
                        </td>
                        <td class="d-flex justify-content-center">
                            @unless ( $volunteer->status === 'accepted')
                            <form method='POST' action="{{ route('admin.volunteers.approve', ['volunteer' => $volunteer]) }}">
                                @csrf
                                @method('patch')
                                <button class="btn btn-link">
                                    <i class="btn fas fa-check text-success" aria-hidden="true"></i>
                                </button>
                            </form>
                            @endunless
                            @unless ( $volunteer->status === 'rejected')
                            <form method='POST' action="{{ route('admin.volunteers.reject', ['volunteer' => $volunteer]) }}">
                                @csrf
                                @method('patch')
                                <button class="btn btn-link">
                                    <i class="btn fas fa-times text-danger" aria-hidden="true"></i>
                                </button>
                            </form>
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
    </div>
@endsection
