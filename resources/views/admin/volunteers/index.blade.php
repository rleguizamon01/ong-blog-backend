@extends('admin.layout')

@section('content')
    <div class="m-4">
        <h2>
            Listado de Voluntarios
        </h2>
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
                @foreach ($volunteers as $volunteer)
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
                            <a href="{{route('admin.volunteers.approved', ['volunteer' => $volunteer])}}">
                                <i class="btn fas fa-check text-success" aria-hidden="true"></i>
                            </a>
                            @endunless
                            @unless ( $volunteer->status === 'rejected')
                            <a href="{{route('admin.volunteers.rejected', ['volunteer' => $volunteer])}}">
                                <i class="btn fas fa-times text-danger" aria-hidden="true"></i>
                            </a>
                            @endunless
                        </td>
                        <td>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        <p>{{$volunteers->links()}}</p>
    </div>
@endsection