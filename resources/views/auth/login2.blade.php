
@extends('layouts.app')

@section('content')
<div class="container">
<div class="col-sm-6 col-md-4 col-md-offset-4  p-3 my-3 bg-primary text-white rounded border-success">
            <img class="rounded-circle mx-auto mt-4 mb-4" src="img/avatar.jpeg" alt="avatar.jpg" width="100px" height="100px ">
            <form class="form-row-border-primary" method="POST" action="{{ route('login') }}">
            @csrf
                <div>
                <label class="text-center" for="username">{{ __('E-Mail Address') }}</label>
                <br>
                <input class="form-control form-control-sm input_pass mt-10" id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                  <br>
                  @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                </div>
                <div>
                <label class="text-center">{{ __('Password') }}</label>
                <br>
                <input class="form-control" id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                </div>
                <div >
                            
                                <div class="form-check mt-3">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="text-center" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                            
                            <div class="mt-3">
                                <button type="submit" class="btn btn-success form-control">
                                    {{ __('Login') }}
                                </button>

                                @if (Route::has('password.request'))
                                    <a class="btn text-white mb-3 nav-link w3-hover-text-indigo" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                       
                    </form>
                    </div>
                        
</div>
@endsection
