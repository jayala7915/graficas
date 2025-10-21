@extends('layouts.app2')

@section('content')
<section class="vh-100" style="background-color: #ffffff;">
  <div class="container py-5 h-100">
    <div class="row d-flex align-items-center justify-content-center h-100">
      <div class="col-md-8 col-lg-7 col-xl-6 d-none d-lg-block">
        <img src="{{ asset('storage/Logo_Original.jpg') }}"
          class="img-fluid" alt="Login illustration">

           <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQOsor_64-iS0ji5GlIg0Ygk4pAjPcFF-61kw&s"
          class="img-fluid" alt="Login illustration">
      </div>
      <div class="col-md-8 col-lg-5 col-xl-5 offset-xl-1">
        <div class="card shadow-sm" style="border-radius: 1rem; border: none;">
          <div class="card-body p-4 p-lg-5">
            <form method="POST" action="{{ route('login') }}">
              @csrf
              <div class="text-center mb-4">
                <h2 class="fw-bold mb-3">Graficas Liz</h2>
              </div>

              <!-- Email input -->
              <div class="form-outline mb-4">
                <input type="email" id="email" class="form-control form-control-lg @error('email') is-invalid @enderror" 
                       name="email" value="{{ old('email') }}" required autocomplete="email" autofocus />
                <label class="form-label" for="email" style="background-color: transparent !important; color: rgb(73, 87, 73);">{{ __('Email Address') }}</label>
                @error('email')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>

              <!-- Password input -->
              <div class="form-outline mb-4">
                <input type="password" id="password" class="form-control form-control-lg @error('password') is-invalid @enderror" 
                       name="password" required autocomplete="current-password" />
                <label class="form-label" for="password" style="background-color: transparent !important; color:rgb(73, 87, 73);">{{ __('Password') }}</label>
                @error('password')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>

              <div class="d-flex justify-content-between align-items-center mb-4">
                <!-- Checkbox -->
                <div class="form-check">
                  <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }} />
                  <label class="form-check-label" for="remember">{{ __('Remember Me') }}</label>
                </div>
                
                @if (Route::has('password.request'))
                  <a href="{{ route('password.request') }}" class="text-decoration-none">
                    {{ __('Forgot Your Password?') }}
                  </a>
                @endif
              </div>

              <!-- Submit button -->
              <button type="submit" class="btn btn-primary btn-lg btn-block w-100 mb-4">
                {{ __('Login') }}
              </button>

             

              
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Agregar estilos adicionales -->
<style>
  .form-outline {
    position: relative;
  }
  
  .form-outline input {
    padding-top: 1.625rem;
  }
  
  .form-outline label {
    position: absolute;
    top: 0;
    left: 0;
    height: 100%;
    padding: 1rem .75rem;
    pointer-events: none;
    border: 1px solid transparent;
    transform-origin: 0 0;
    transition: all .2s ease-in-out;
  }
  
  .form-outline input:focus ~ label,
  .form-outline input:not(:placeholder-shown) ~ label {
    transform: translateY(-.5rem) translateX(.5rem) scale(.8);
    background-color: #fff;
    padding: 0 .5rem;
  }
  
  .divider:after,
  .divider:before {
    content: "";
    flex: 1;
    height: 1px;
    background: #eee;
  }
  
  .btn-floating {
    width: 40px;
    height: 40px;
    border-radius: 50%;
    display: inline-flex;
    align-items: center;
    justify-content: center;
  }
</style>
@endsection