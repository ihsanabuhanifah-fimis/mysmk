<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Mysmk</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

        <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">

        <!-- Styles -->
        <style>
        img{
            display:block;
        }
            html, body {
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 50px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
            a{
                font-size:20px;
            }
        </style>
    </head>
    <body>
    <div class="container">
    <div class="row mt-4">
       
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a class="btn btn-info bg-primary px-4 py-1" href="{{ url('/Dashboard') }}">Home</a>
                    @else
                        <a  class="btn btn-info bg-success px-4 py-1" href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a class="btn btn-success px-4 py-1" href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
            
            </div>  
        <div class="row">
        <div class="container p-3 my-3  text-white">
        <div class="row">
        <div class="col-md-8 text-">
    <h2>Selamat Datang</h2>
    </div>
 
 
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
                        
        <div class="col"></div>
          </div>
        </div>
        </div>
        </div>
        
    </body>
</html>
