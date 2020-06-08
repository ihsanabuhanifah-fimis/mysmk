@extends('siswa.layout.master')
@section('title','Hasil')

@section('content')

 <div class="container-fluid bg-white">
        <div class="row">
            <div class="col-md-8 col-xl-6">
               
                @if($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                    </ul>
                </div>
                @endif
                
            </div>
        </div>
    </div>
    <style>
    .nilai{
        margin-top:10%;
        
    }
    </style>
<!-- awal web -->
<div class="container d-flex justify-content-md-center align-content-center nilai ">

<div class="" >
  <!-- <img src="..." class="card-img-top" alt="..."> -->
  <div class="card-body text-center">
      
    @if($nilai > $kkm)
    <h1 class="card-text">Alhamdulilah Selamat anda lulus pada ujian ini !</h1>
    <h1>Nilai : {{$nilai}}</h1>
    @else
    <h1 class="card-text">Mohon maaf nilai anda di bawah kkm</h1>
    <h1>Nilai : {{$nilai}}</h1>
    @endif

  </div>
</div>
@endsection