@extends('layout')

@section('title', 'Donación')

@section('content')
    <div class="container my-4">
        <!-- Back to index button -->
        <a href="{{ url()->previous() }}" class="btn btn-dark p-1 mb-4">
            <i class="fa fa-arrow-left"></i>
        </a>
        <div class="card">
        <div class="card-header">
            Donación #{{ $donation->id }}
        </div>
        <div class="card-body">
            <h5 class="card-title"> {{ $donation->email }} </h5>
            <p class="card-text"> ${{ $donation->amount }}</p>
            <p class="card-text"> {{ $donation->created_at->format('d M Y H:m:s') }}</p>
            <p class="card-text alert {{ ($donation->status == 'accepted') ? 'alert-success' : (($donation->status == 'failed') ? 'alert-danger' : 'alert-secondary') }} "> 
                {{ $donation->status }}
            </p>
        </div>
        </div>
    </div>
@endsection