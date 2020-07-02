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
                <a class="navbar-brand js-scroll-trigger" href="#page-top">Start MySMK </a><button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto my-2 my-lg-0">
                    @if (Route::has('login'))
                    @auth
                    <li class="nav-item"><a class="nav-link js-scroll-trigger" href="{{ url('/Dashboard') }}" >Dashboard</a></li>
                        @else
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="{{ url('/Dashboard') }}" >Dashboard</a></li>
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

                <h4 class="text-md-center mb-4">Lengkapi Data Diri</h4>
                    <form method="POST" id="form-data-diri" action="javascript:void(0)">
                                  
                        @csrf
                 
                        
                        @if($data->secret_number == "KMX787762XJ#$")
                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nama') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{$data->name}}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Email') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="text" class="form-control @error('name') is-invalid @enderror" name="email" value="{{$data->email}}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="nama_santri" class="col-md-4 col-form-label text-md-right">{{ __('Nama Santri') }}</label>

                            <div class="col-md-6">
                                <input id="nama_santri" type="text" class="form-control @error('nama_santri') is-invalid @enderror" name="nama_santri" value="{{$data->nama_santri}}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            </div>
                            <div class="form-group row">
                            <label for="nisn" class="col-md-4 col-form-label text-md-right">{{ __('NISN') }}</label>

                            <div class="col-md-6">
                                <input id="nisn" type="text" class="form-control @error('nisn') is-invalid @enderror" name="nisn" value="{{$data->nisn}}" required autocomplete="name" autofocus>

                                @error('nisn')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                             </div>
                             <div class="form-group row">
                            <label for="hubungan" class="col-md-4 col-form-label text-md-right">{{ __('hubungan') }}</label>

                            <div class="col-md-6">
                               
                        <select name="hubungan"  class="form-control @error('hubungan') is-invalid @enderror" id="hubungan">
                            <option value="1">Ayah</option>
                            <option value="2">Ibu</option>
                            <option value="3">Wali</option>
                        </select>
                                @error('hubungan')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                             </div>
                        </div>

                        <!-- //data guru -->
                       @elseif($data->secret_number == "KMX78665@J#$")
                       <div class="form-group row">
                            <label for=cikgu_name class="col-md-4 col-form-label text-md-right">{{ __('Nama') }}</label>

                            <div class="col-md-6">
                                <input id="cikgu_name" type="text" class="form-control @error('cikgu_name') is-invalid @enderror" name="cikgu_name" value="{{$data->name}}" required autocomplete="name" autofocus>

                                @error('cikgu_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Email') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{$data->email}}" required autocomplete="name" autofocus>

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
                                <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{$data->username}}" required autocomplete="name" autofocus>

                                @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            </div>
                                <div class="form-group row">
                                <label for="tempat" class="col-md-4 col-form-label text-md-right">{{ __('Tempat Lahir') }}</label>

                                <div class="col-md-6">
                                    <input id="tempat" type="text" class="form-control @error('tempat') is-invalid @enderror" name="tempat" value="{{ $data->tempat}}" required autocomplete="tempat" autofocus>

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
                                <input id="tanggal" type="number" class="form-control  d-inline col-md-3 @error('tanggal') is-invalid @enderror" name="tanggal" value="{{$data->tanggal}}" required autocomplete="tanggal" placeholder="Tanggal" autofocus>
                                
                                <select id="bulan" type="number" class="form-control  d-inline col-md-5 @error('bulan') is-invalid @enderror" name="bulan"  required autocomplete="bulan" autofocus>
                                    
                                    @if($data->bulan == 1)
                                    <option selected value="1">Januari</option>
                                    @elseif($data->bulan == 2)
                                    <option selected value="2">Februari</option>
                                    @elseif($data->bulan == 3)
                                    <option  selected value="3">Maret</option>                                    
                                    @elseif($data->bulan == 4)
                                    <option  selected value="4">April</option>
                                    @elseif($data->bulan == 5)
                                    <option selected value="5">Mei</option>
                                   
                                    @elseif($data->bulan == 6)
                                    <option selected value="6">Juni</option>
                                  
                                    @elseif($data->bulan == 7)
                                    <option selected value="7">Juli</option>
                                    
                                    @elseif($data->bulan == 8)
                                    <option selected value="8">Agustus</option>
                                   
                                    @elseif($data->bulan == 9)
                                    <option selected value="9">September</option>
                                   
                                    @elseif($data->bulan == 10)
                                    <option selected value="10">Oktober</option>
                                    
                                    @elseif($data->bulan == 11)
                                    <option selected value="11">November</option>
                                   
                                    @elseif($data->bulan == 12)
                                    <option selected value="12">Desember</option>
                                    @endif
                                  
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
                                <input id="tahun" type="number" class="form-control  d-inline col-md-3 @error('tahun') is-invalid @enderror" placeholder="Tahun" name="tahun" value="{{ $data->tahun}}" required autocomplete="tahun" autofocus>

                                @error('tahun')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                             <div class="form-group row">
                            <label for="status" class="col-md-4 col-form-label text-md-right">{{ __('Status') }}</label>

                            <div class="col-md-6">
                               
                        <select name="status"  class="form-control @error('status') is-invalid @enderror" id="status">
                            <option value="1">Menikah</option>
                            <option value="2">Belum Menikah</option>
                            <option value="3">Janda</option>
                            <option value="3">Duda</option>
                        </select>
                        </select>
                                @error('status')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                             </div>



                             <div class="form-group row">
                            
                            <label for="tanggal" class="col-md-4 col-form-label text-md-right">{{ __('Tahun Masuk') }}</label>
                            
                            <div class="col-md-6">
                               
                                <select id="bulan2" type="number" class="form-control  d-inline col-md-5 @error('bulan2') is-invalid @enderror" name="bulan2"  required autocomplete="bulan2" autofocus>
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
                                <input id="tahun2" type="number" class="form-control  d-inline col-md-3 @error('tahun2') is-invalid @enderror" placeholder="Tahun" name="tahun2" value="{{ old('tahun') }}" required autocomplete="tahun2" autofocus>

                                @error('tahun2')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        </div>
                        
                        @else
                       <!-- daftar siswa -->
                       <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nama') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{$data->name}}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Email') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="text" class="form-control @error('name') is-invalid @enderror" name="email" value="{{$data->email}}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="tempat" class="col-md-4 col-form-label text-md-right">{{ __('Tempat Lahir') }}</label>

                            <div class="col-md-6">
                                <input id="tempat" type="text" class="form-control @error('tempat') is-invalid @enderror" name="tempat" value="{{ $data->tempat}}" required autocomplete="tempat" autofocus>

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
                                <input id="tanggal" type="number" class="form-control  d-inline col-md-3 @error('tanggal') is-invalid @enderror" name="tanggal" value="{{$data->tanggal}}" required autocomplete="tanggal" placeholder="Tanggal" autofocus>
                                
                                <select id="bulan" type="number" class="form-control  d-inline col-md-5 @error('bulan') is-invalid @enderror" name="bulan"  required autocomplete="bulan" autofocus>
                                    
                                    @if($data->bulan == 1)
                                    <option selected value="1">Januari</option>
                                    @elseif($data->bulan == 2)
                                    <option selected value="2">Februari</option>
                                    @elseif($data->bulan == 3)
                                    <option  selected value="3">Maret</option>                                    
                                    @elseif($data->bulan == 4)
                                    <option  selected value="4">April</option>
                                    @elseif($data->bulan == 5)
                                    <option selected value="5">Mei</option>
                                   
                                    @elseif($data->bulan == 6)
                                    <option selected value="6">Juni</option>
                                  
                                    @elseif($data->bulan == 7)
                                    <option selected value="7">Juli</option>
                                    
                                    @elseif($data->bulan == 8)
                                    <option selected value="8">Agustus</option>
                                   
                                    @elseif($data->bulan == 9)
                                    <option selected value="9">September</option>
                                   
                                    @elseif($data->bulan == 10)
                                    <option selected value="10">Oktober</option>
                                    
                                    @elseif($data->bulan == 11)
                                    <option selected value="11">November</option>
                                   
                                    @elseif($data->bulan == 12)
                                    <option selected value="12">Desember</option>
                                    @endif
                                  
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
                                <input id="tahun" type="number" class="form-control  d-inline col-md-3 @error('tahun') is-invalid @enderror" placeholder="Tahun" name="tahun" value="{{ $data->tahun}}" required autocomplete="tahun" autofocus>

                                @error('tahun')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                            <div class="form-group row">
                            <label for="nisn" class="col-md-4 col-form-label text-md-right">{{ __('NISN') }}</label>

                            <div class="col-md-6">
                                <input id="nisn" type="text" class="form-control @error('nisn') is-invalid @enderror" name="nisn" value="{{$data->nisn}}" required autocomplete="name" autofocus>

                                @error('nisn')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                             </div>

                             
                             <div class="form-group row">
                            <label for="tahun_masuk" class="col-md-4 col-form-label text-md-right">{{ __('Tahun Masuk') }}</label>

                            <div class="col-md-6">
                               
                        <select name="tahun_masuk"  class="form-control @error('tahun_masuk') is-invalid @enderror" id="tahun_masuk">
                            <option value="2016">2016</option>
                            <option value="2017">2017</option>
                            <option value="2018">2018</option>
                            <option value="2019">2019</option>
                            <option value="2020">2020</option>
                            <option value="2021">2021</option>
                            <option value="2022">2022</option>

                        </select>
                                @error('tahun_masuk')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                             </div>
                             <div class="form-group row">
                            <label for="asal_sekolah" class="col-md-4 col-form-label text-md-right">{{ __('Sekolah Asal') }}</label>

                            <div class="col-md-6">
                                <input id="asal_sekolah" type="text" class="form-control @error('asal_sekolah') is-invalid @enderror" name="asal_sekolah" value="" required autocomplete="name" autofocus placeholder="Nama Sekolah saat SMP/MTs">

                                @error('asal_sekolah')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="jurusan" class="col-md-4 col-form-label text-md-right">{{ __('Jurusan Yang Dipilih') }}</label>

                            <div class="col-md-6">
                            <select name="jurusan"  class="form-control @error('jurusan') is-invalid @enderror" id="jurusan">
                            <option value="1">Teknik Komputer dan Jaringan</option>
                            <option value="2">Rekayasa Perangkat Lunak</option>
                        </select>

                                @error('nama_ibu')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="nama_ayah" class="col-md-4 col-form-label text-md-right">{{ __('Nama Ayah') }}</label>

                            <div class="col-md-6">
                                <input id="nama_ayah" type="text" class="form-control @error('nama_ayah') is-invalid @enderror" name="nama_ayah" value="" required autocomplete="name" autofocus >

                                @error('nama_ayah')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="nama_ibu" class="col-md-4 col-form-label text-md-right">{{ __('Nama Ibu') }}</label>

                            <div class="col-md-6">
                                <input id="nama_ibu" type="text" class="form-control @error('nama_ibu') is-invalid @enderror" name="nama_ibu" value="" required autocomplete="name" autofocus>

                                @error('nama_ibu')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                       <!-- daftar siswa -->
                        @endif
                        

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                            <div class="data-diri"></div>
                                <button type="submit" class="tombol-data-diri form-control btn btn-primary">
                                    {{ __('Simpan') }}
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
        $(".tombol-data-diri").click(function(){
            $(this).text("Menyimpan Data ...")
        
            $.ajaxSetup({
              headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
            });
            $.ajax({
				type: 'POST',
				url: "{{route('data')}}",
				data: $('#form-data-diri').serialize(),
				success: function(data) {
                    $(".tombol-data-diri").text("Simpan");
                $(".data-diri").addClass("alert alert-success");
                $(".data-diri").text(data);
                    setTimeout(function(){
                    
                    },10000);
                },
                error: function(jqXHR, exception){
                    $(".tombol-data-diri").text("Simpan");
                   
                }
			});
			
			
			});
		});
    </script>
  
    </body>
</html>
