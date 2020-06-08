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
    <div class="cantainer">
        <div class="flex-center position-ref  ">
            @if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a class="btn btn-info bg-success px-4 py-2" href="{{ url('/Dashboard') }}">Home</a>
                    @else
                        <a  class="btn btn-info bg-success px-4 py-2" href="{{ route('login') }}">Login</a>

                        @if (Route::has('register'))
                            <a class="btn btn-success px-4 py-2" href="{{ route('register') }}">Register</a>
                        @endif
                    @endauth
                </div>
            @endif

            </div>  
        <div class="row">
        <div class="container p-3 my-3  text-white">
    <h2>Selamat Dat</h2>
     
    <div class="row mt-5 mb-5 mx-auto">
        <div class="col"></div>
        
        <div class="col-sm-6 col-md-4 col-md-offset-4  p-3 my-3 bg-primary text-white rounded border-success">
            <img class="rounded-circle mx-auto mt-4 mb-4" src="img/avatar.jpeg" alt="avatar.jpg" width="100px" height="100px ">

            <form class="form-row-border-primary" method="post" action="">
                <h5 class='text-center'>Silahkan Login</h5>
                
                <label class="text-center" for="username">Username :</label>
                <br>
                <input class="form-control form-control-sm input_pass mt-10" type="text" name="username" id="username" />
                <br>
                <label for="password">password :</label>
                <br>
                <input class="form-control"x type="password" name="password" id="password" />
                <br>
                <input type="checkbox" class="name="remember" id="remember" />
                <label class="satu" for="remember">Remember Me</label>
                
                <button class="btn btn-info bg-success form-control mt-2 mb-3" type="submit" name="login">Login</button>
                <p>Belum punya akun? Silahkan Registrasi <a href="registrasi.php">Disini</a></p>  
        </div>
        <div class="col"></div>
    </div>
        </div>
        </div>
    </body>
</html>
