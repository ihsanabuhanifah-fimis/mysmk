


<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>MySMK - Elearning SMK MADINATULQURAN</title>
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/img/favicon.ico" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v5.13.0/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Merriweather+Sans:400,700" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic" rel="stylesheet" type="text/css" />
        <!-- Third party plugin CSS-->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="/css/welcome.css" rel="stylesheet" />
        <style>

            img{
                display:block;
            }
            .masthead{
                height:90%;
            }
        </style>
    </head>
    <body id="page-top">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-light fixed-top py-3" id="mainNav">
            <div class="container">
                <a class="navbar-brand js-scroll-trigger" href="#page-top">MySMK </a><button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto my-2 my-lg-0">
                    @if (Route::has('login'))
                    @auth
                    
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="{{ url('/Home') }}" >Dashboard</a></li>
                        @else
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="{{ url('/Home') }}" >Dashboard</a></li>
                        @if (Route::has('register'))
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="{{ route('register') }}" >Registrasi</a></li>
                        @endif
                    @endauth
                    @endif
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" >Contact</a></li>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" >About</a></li>
                        <li class="nav-item">
                       
                                    <a class="nav-link js-scroll-trigger" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>
                                    </div>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                        </li>
                    </ul>
                </div>
            </div>
            
        </nav>
        <!-- Masthead-->
        <header class="masthead">
  
            <div class="container h-100 mt-5">
                <div class="row">
                    <div class="col-md-12 mt-4">
                <div class="row h-100 align-items-center justify-content-center text-center">
                    <div class="col-lg-10 align-self-end">
                        <h6 class="text-uppercase text-white font-weight-bold"><i>{{ __('Verify Your Email Address') }}</i></h6>
                        <hr class="divider my-4" />
                    </div>
                    <div class="col-lg-8 align-self-baseline">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                        <p>Email sudah dikirimkan di email anda, Silahkan verifikasi email</p>
                            <!-- {{ __('A fresh verification link has been sent to your email address.') }} -->
                        </div>
                    @endif
                    <!-- {{ __('Before proceeding, please check your email for a verification link.') }} -->
                    <p>Terimakasih telah melakukan pendaftaran, Silahkan cek email untuk verifikasi akun</p>
                    <!-- {{ __('If you did not receive the email') }}, -->
                    <p>Jika belum menerima email, Silahkan klik</p>
                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link p-0 m-0 align-baseline">
                        <!-- {{ __('click here to request another') }} -->
                        Kirim Email kembali
                        </button>.
                    </form>
                    </div>
                </div>
                </div>
                @if (Route::has('login'))
                    @auth
                    @else
                     <div class="col-md-4">
                    <div class="border p-3">
                <img class="rounded-circle mx-auto mt-4 mb-4" src="img/avatar.jpeg" alt="avatar.jpg" width="100px" height="100px ">
            <form class="form-row-border-primary" method="POST" action="{{ route('login') }}">
            @csrf
                <div>
                <label class="text-center text-white" for="username">{{ __('E-Mail Address') }}</label>
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
                <label class="text-center text-white">{{ __('Password') }}</label>
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

                                    <label class="text-center text-white" for="remember">
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
               
                @endauth
                    @endif
            </div>
            </div>
        </header>
 
        <footer class="bg-light py-2">
            <div class="container"><div class="small text-center text-muted">Copyright © 2020 - Ihsanabuhanifah</div></div>
        </footer>
        <!-- Bootstrap core JS-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.bundle.min.js"></script>
        <!-- Third party plugin JS-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/welcome.js"></script>
    </body>
</html>


