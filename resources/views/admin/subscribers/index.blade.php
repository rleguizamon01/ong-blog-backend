@extends('admin.layout')

@section('title', 'Suscriptores')

@section('content')

    <div class="container">
        <div class="row mt-4 row-cols-1 row-cols-md-2">
            @foreach($subscribers as $subscriber)
                <div class="col">
                    <div class="card mb-5 pr-5 pl-5">
                        <div class="card-body">
                            <!-- Names -->
                            <a href="{{ route('subscribers.show', $subscriber->id) }}" class="text-decoration-none">
                                <h5 class="card-title"> {{ $subscriber->first_name }} {{$subscriber->last_name}} </h5>
                            </a>
                            <h6 class="card-subtitle mb-2 mt-2 text-muted"> {{ $subscriber->email }}</h6>
                            <div class="d-flex justify-content-between mt-2 mb-2">
                                <!-- Date -->
                                <div class="text-uppercase text-muted font-monospace">
                                    {{ $subscriber->created_at->format('d M Y') }}
                                </div>
                            </div>
                            <!-- Subscriber details, edit and delete -->
                            <form method="POST" action="{{ route('subscribers.destroy', $subscriber->id) }}">
                                @METHOD('delete')
                                @csrf
                                <a href="{{ route('subscribers.show', $subscriber->id) }}" class="btn btn-primary">Detalles</a>
                                <a href="{{ route('subscribers.edit', $subscriber->id) }}" class="btn btn-warning"><i class="fa fa-edit"></i></a>
                                <button type="submit" class="btn btn-danger"> <i class="fa fa-trash"></i> </button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <div class="d-flex justify-content-center mb-4">
            {{ $subscribers->links('pagination::bootstrap-4') }}
    </div>

@endsection
