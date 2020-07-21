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
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>  
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/additional-methods.min.js"></script>
        <link href="https://fonts.googleapis.com/css?family=Merriweather+Sans:400,700" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic" rel="stylesheet" type="text/css" />
        <script src="{{ asset('js/app.js') }}" defer></script>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet"><link rel="stylesheet" href="/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <!-- Third party plugin CSS-->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="/css/welcome.css" rel="stylesheet" />
        <style>
            header{

            }

            img{
                display:block;
            }
            .hide{
                display:none;
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
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Masthead-->
        <header class="masthead text-white">
            <div class="container h-100">
           

                <div class="card-body mt-2">
                <h4 class="text-md-center mb-4">Silahkan Lakukan Pendaftaran Disini</h4>
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nama') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="username" class="col-md-4 col-form-label text-md-right">{{ __('Username') }}</label>

                            <div class="col-md-6">
                                <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{ old('username') }}" required autocomplete="username" autofocus>

                                @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" placeholder="Password Minimal 8 Karakter" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" placeholder="Password Minimal 8 Karakter" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="nisn" class="col-md-4 col-form-label text-md-right">{{ __('NISN Santri') }}</label>

                            <div class="col-md-6">
                                <input id="nisn" type="number" class="form-control @error('nisn') is-invalid @enderror" name="nisn" value="{{ old('nisn') }}" required autocomplete="nisn" autofocus>
                                <br>
                                <style>
                                .font{
                                    font-size:10px;
                                }
                                </style>
                                <p class="font">Cek NISN <a  target="_blank" href="https://referensi.data.kemdikbud.go.id/nisn/">disini</a></p>
                                @error('nisn')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
 <div class="form-group row">
                            <label for="daftar-sebagai" class="col-md-4 col-form-label text-md-right">{{ __('Daftar Sebagai') }}</label>

                            <div class="col-md-6">
                                <select class="form-control wali" name="daftar-sebagai" id="daftar-sebagai">
                                  <option selected value="">-</option>
                                   <option value="1">Kepala Sekolah</option>
                                    <option value="2">Guru</option>
                                    <option value="3">Musyrif</option>
                                    <option value="4">Staf TU</option>
                                    <option value="5">Wali Santri</option>
                                    <option value="6">Santri</option>
                                </select>

                                @error('daftar-sebagai')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="tempat" class="col-md-4 col-form-label text-md-right">{{ __('Tempat Lahir') }}</label>

                            <div class="col-md-6">
                                <input id="tempat" type="text" class="form-control @error('tempat') is-invalid @enderror" name="tempat" value="{{ old('tempat') }}" required autocomplete="tempat" autofocus>

                                @error('tempat')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        
                        

                        <div class="form-group row">
                            
                            <label for="tanggal" class="col-md-4 col-form-label text-md-right">{{ __('Tanggal Lahir') }}</label>
                            
                            <div class="col-md-6">
                                <input id="tanggal" type="number" class="form-control  d-inline col-md-3 @error('tanggal') is-invalid @enderror" name="tanggal" value="{{ old('tanggal') }}" required autocomplete="tanggal" placeholder="Tanggal" autofocus>
                                <select id="bulan" type="number" class="form-control  d-inline col-md-5 @error('bulan') is-invalid @enderror" name="bulan"  required autocomplete="bulan" autofocus>
                                    <option value="1">Januari</option>
                                    <option value="2">Februari</option>
                                    <option value="3">Maret</option>
                                    <option value="4">April</option>
                                    <option value="5">Mei</option>
                                    <option value="6">Juni</option>
                                    <option value="7">Juli</option>
                                    <option value="8">Agustus</option>
                                    <option value="9">September</option>
                                    <option value="10">Oktober</option>
                                    <option value="11">November</option>
                                    <option value="12">Desember</option>
                                </select>
                                <input id="tahun" type="number" class="form-control  d-inline col-md-3 @error('tahun') is-invalid @enderror" placeholder="Tahun" name="tahun" value="{{ old('tahun') }}" required autocomplete="tahun" autofocus>

                                @error('tahun')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="np-hp" class="col-md-4 col-form-label text-md-right">{{ __('No. Handphone') }}</label>

                            <div class="col-md-6">
                                <input id="no-hp" type="number" class="form-control @error('no-hp') is-invalid @enderror" name="no-hp" value="{{ old('no-hp') }}" required autocomplete="no-hp" autofocus>

                                @error('no-hp')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                       

                        <div class="form-group row nama_santri hide">
                            <label for="nama_santri" class="col-md-4 col-form-label text-md-right">{{ __('Nama Santri') }}</label>

                            <div class="col-md-6">
                                <input id="nama_santri" type="text" class="form-control @error('nama_santri') is-invalid @enderror" name="nama_santri" value="{{ old('nama_santri') }}"  autocomplete="nama_santri">

                                @error('nama_santri')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>  
                        

                        <div class="form-group row secret-number hide">
                            <label for="secret-number" class="col-md-4 col-form-label text-md-right">{{ __('Secret Number') }}</label>

                            <div class="col-md-6">
                                <input id="secret-number" required type="password"  class="form-control @error('secret-number') is-invalid @enderror" name="secret-number" value="{{ old('secret-number') }}"  autocomplete="secret-number">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>  
                        
                        

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class=" form-control btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    
                </div>
            </div>
            </div>
            </form>
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
        </script>
<script>
    $(document).ready(function(){

  $(".wali").change(function(){
    var a = $(this).val();
    if(a==5){
    $(".nama_santri").removeClass("hide");
    }else{
    $(".nama_santri").addClass("hide");
    }
  });
  
  $("#daftar-sebagai").change(function(){
    var a = $(this).val();
    if(a==5){
    $(".secret-number").removeClass("hide");
    $("#secret-number").attr('required');
     $("#secret-number").attr('placeholder','Secret Number diumumkan via WA Grup Wali Santri');
    
    }else if(a!=6){
        $(".secret-number").removeClass("hide");
        $("#secret-number").attr('required');
     $("#secret-number").attr('placeholder','Secret Number diumumkan via WA Grup Guru ');
    }
    else{
    $(".secret-number").addClass("hide");
    $("#secret-number").removeAttr('required');
    }
  });
});
    </script>
  
    </body>
</html>
