@extends('website.layout')

@section('title', 'Donaciones')

@section('content')
    <div class="container">
        <!-- Success message -->
        @if(session('success'))
            <div class="row justify-content-center mt-3">
                <div class="alert alert-success mb-0"> {{ session('success') }}</div>
            </div>
        @endif

        <div class="row col-12 justify-content-center mt-4 ml-2 mr-2 mb-5">
            <form class="col-xs-12 col-sm-10 col-md-8 col-lg-6 mt-4 " action="{{ route('donations.store') }}" method="POST">
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
