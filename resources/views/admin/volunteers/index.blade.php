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
                @foreach ($volunteers as $volunteer)
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
                @endforeach
                </tbody>
            </table>
        </div>
        <p>{{$volunteers->links()}}</p>
    </div>
@endsection