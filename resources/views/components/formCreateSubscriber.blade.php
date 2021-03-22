<section class="newsletter no-padding-top m-3">    
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h2>Suscribite a nuestra Newsletter</h2>
                <p class="text-big">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
            </div>
            <div class="col-md-12">
                <div class="form-holder">
                    <form method="post" action="{{route('subscribers.store')}}">
                        @csrf
                        <div class="form-row align-items-end">
                            <div class="col-12 col-md-3">
                                <label for="first_name">Nombre</label>
                                <input type="text" class="form-control form-control-sm" id="first_name" name="first_name" placeholder="Ingrese su nombre ..." value="{{ old('first_name') }}">
                                
                                @error('first_name')
                                    <div class="error"> {{ $errors->first('first_name') }} </div>
                                @enderror
                            </div>
                        
                            <div class="col-12 col-md-3">
                                <label for="last_name">Apellido</label>
                                <input type="text" class="form-control form-control-sm" id="last_name" name="last_name" placeholder="Ingrese su apellido" value="{{ old('last_name') }}">
                        
                                @error('last_name')
                                    <div class="error"> {{ $errors->first('last_name') }} </div>
                                @enderror
                            </div>
                        
                            <div class="col-12 col-md-3">
                                <label for="email">Email</label>
                                <input type="email" class="form-control form-control-sm" id="email" name="email" placeholder="Ingrese su email" value="{{ old('email') }}">
                        
                                @error('email')
                                    <div class="error"> {{ $errors->first('email') }} </div>
                                @enderror
                            </div>
                            <div class="col-12 col-md-3">
                                <button type="submit" class="submit mt-4">Suscribirse</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
