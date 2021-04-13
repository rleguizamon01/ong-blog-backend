@extends('website.layout')

@section('title', 'Donaciones')

@section('content')
    <div class="container alturaMinima">
        <div class="m-4">
            <div class="mb-3">
                <h3>Realizar donación</h3>
            </div>
            <!-- Success message -->
            @if(session('success'))
                    <div class="alert alert-success mb-3 small"> {{ session('success') }}</div>
            @endif

            <form action="{{ route('donations.store') }}" method="POST">
                @csrf

                <!-- Email -->
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" name="email" placeholder="Email" value="{{ old('email') }}">

                    @error('email')
                        <div class="alert alert-danger mt-3 small p-2"> {{ $errors->first('email') }} </div>
                    @enderror
                </div>

                <!-- Amount -->
                <div class="form-group">
                    <label for="amount">Monto</label>
                    <input type="number" step="any" class="form-control" id="amount" name="amount" placeholder="Monto" value="{{ old('amount') }}">

                    @error('amount')
                        <div class="alert alert-danger mt-3 small p-2"> {{ $errors->first('amount') }} </div>
                    @enderror
                </div>

                <button type="submit" class="btn btn-primary">Donar</button>
            </form>
        </div>
    </div>
@endsection
