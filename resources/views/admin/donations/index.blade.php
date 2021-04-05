@extends('admin.layout')
@section('title', 'Donaciones')
@section('content')
    <div class="my-4">
        <h5>Donaciones</h5>

        <form method='GET' action="{{ route('donations.index') }}">
            <div class="row">
                <!-- From date input -->
                <div class="col-sm form-group">
                    <label for="from_date" class="small">Desde</label>
                    <input type="date" class="form-control" id="from_date" name="from_date"
                           value="{{ app('request')->input('from_date') }}">

                    @error('from_date')
                    <div class="alert alert-danger small mt-2 mb-0"> {{ $errors->first('from_date') }} </div>
                    @enderror
                </div>

                <!-- To date input -->
                <div class="col-sm form-group">
                    <label for="to_date" class="small">Hasta</label>
                    <input type="date" class="form-control" id="to_date" name="to_date"
                           value="{{ app('request')->input('to_date') }}">

                    @error('to_date')
                    <div class="alert alert-danger small mt-2 mb-0"> {{ $errors->first('to_date') }} </div>
                    @enderror
                </div>
            </div>

            <div class="row">
                <!-- Radio buttons -->
                <div class="col-sm form-group mb-1">
                    <fieldset id="order">
                        <label>
                            <input type="radio" name="order" value="asc"
                                {{ app('request')->input('order') == 'asc' ? 'checked' : '' }}>
                            Ascendente
                        </label>
                        <label>
                            <input type="radio" name="order" value="desc"
                                {{ app('request')->input('order') == 'desc' ? 'checked' : '' }}>
                            Descendente
                        </label>
                    </fieldset>
                </div>
            </div>

            <div class="row">
                <!-- Submit button -->
                <div class="col-sm">
                    <button type="submit" class="btn btn-primary">Filtrar</button>
                </div>
            </div>

        </form>
    </div>

    <!-- Donors table -->
    <div class="table-responsive bg-light mt-2">
        <table class="table">
            <thead>
            <tr>
                <th scope="col">Email</th>
                <th scope="col">Monto</th>
                <th scope="col">Estado</th>
                <th scope="col">Fecha</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($donations as $donation)
                <tr>
                    <th>
                        <a href="{{ route('donations.show', $donation->id) }}">
                            {{$donation->email}}
                        </a>
                    </th>
                    <td>
                        {{ $donation->amount }}
                    </td>
                    <td>
                        {{ $donation->status }}
                    </td>
                    <td>
                        {{ $donation->created_at }}
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>

    <!-- Pagination buttons -->
    <p>{{ $donations->links() }}</p>
@endsection
