@extends('website.layout')

@section('title', 'Voluntarios')

@section('content')

    <div class="container">
        <div class="row mt-4 row-cols-1 row-cols-md-2">
            @foreach($volunteers as $volunteer)
                <div class="col">
                    <div class="card border-primary mb-5 pr-5 pl-5">
                        <div class="card-body">
                            <!-- Names -->
                            <a href="{{ route('volunteers.show', $volunteer->id) }}" class="text-decoration-none">
                                <h5 class="card-title"> {{ $volunteer->first_name }} {{$volunteer->last_name}} </h5>
                            </a>
                            <div class="d-flex justify-content-between mt-2 mb-2">
                                <!-- Date -->
                                <div class="text-uppercase text-muted font-monospace">
                                    {{ $volunteer->created_at->format('d M Y') }}
                                </div>
                            </div>
                            <!-- Volunteer details -->
                            <a href="{{ route('volunteers.show', $volunteer->id) }}" class="btn btn-primary">Detalles</a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <div class="d-flex justify-content-center mb-4">
            {{ $volunteers->links('pagination::bootstrap-4') }}
    </div>

@endsection
