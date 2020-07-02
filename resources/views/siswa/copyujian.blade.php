
@extends('siswa.layout.master2')
@section('title','Penilaian')

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
<!-- awal web -->
<form method="post" action="{{route('simpan_ujian')}}">
@csrf
<input type="hidden" name="attemp" value="{{$attemp}}">
<div class="container ">
<div class="row-fluid mt-2 mb-2 sticky-top ">
    <div>
    <div class="card">
    
  <h5 class="card-header bg-primary"></h5>
  <div class="card-body">
  <div class="d-flex justify-content-between">
    <div>
    <h5 class="card-title">{{$banksoals[0]->subject_name}}</h5>
    <p class="card-text">Selamat Mengerjakan, sukses dan semangat</p>
    </div>
    <div>
    
    @if($soals1[0]->s != "xr")
    <?php $jmlsoal1 = count($soals1); ?>
    @else
    <?php $jmlsoal1 = 0 ?>
    @endif

    @if($soals2[0]->s != "xr")
    <?php $jmlsoal2 = count($soals2); ?>
    @else
    <?php $jmlsoal2 = 0 ?>
    @endif
    @if($soals3[0]->s != "xr")
    <?php $jmlsoal3 = count($soals3); ?>
    @else
    <?php $jmlsoal3 = 0 ?>
    @endif
    <h6 class="text-left"> Jumlah soal {{($jmlsoal1 + $jmlsoal2 + $jmlsoal3 )}}</h6>
    <p id="demo"></p>
    
        </div>
    </div>
  </div>
</div>
    </div>
</div>
<div class="container">
<input type="hidden" name="id" value="{{$banksoals[0]->id}}">
<!-- soal pilihan ganda -->

@if($soals1 !== NULL)
<?php $i=0 ; ?>
@forelse ($soals1 as $soal1)
@if($soal1->s != "xr")

<div class="alert alert-success p-3 ">
<div class="d-flex justify-content-end"><p>Pilihan Ganda</p></div>
<div>{{$soal1->s}}</div>
<input name="pg{{$i}}[]" id="k1" type="radio" value="{{$soal1->k1}}">
<label class="ml-2" for="k1">{{$soal1->a}}</label>
<br>
<input name="pg{{$i}}[]" id="k2" type="radio" value="{{$soal1->k2}}">
<label class="ml-2" for="k2">{{$soal1->b}}</label>
<br>
<input name="pg{{$i}}[]" id="k3" type="radio" value="{{$soal1->k3}}">
<label class="ml-2" for="k1">{{$soal1->c}}</label>
<br>
<input name="pg{{$i}}[]" id="k4" type="radio" value="{{$soal1->k4}}">
<label class="ml-2" for="k1">{{$soal1->d}}</label>
<br>
<input name="pg{{$i}}[]" id="k5" type="radio" value="{{$soal1->k5}}">
<label class="ml-2" for="k1">{{$soal1->e}}</label>
<input type="hidden" name="tipe_soal1[]" value="{{$soal1->t}}">
<input type="hidden" name="nomor_soal1[]" value="{{$soal1->n}}">


</div>
<?php $i++ ;?>
@endif

@empty

@endforelse
@endif

<!-- soal pilihan ganda -->

<!-- soal isian singkat -->
@if($soals2 != NULL)
<?php $j=0 ;?>
@forelse($soals2 as $soal2)
@if($soal2->s != "xr" )
<div class="alert alert-success p-3 ">
<div class="d-flex justify-content-end"><p>Isian Singkat</p></div>
<div>{{$soal2->s}}</div>
<label for="isian{{$j}}">Jawaban</label>
<input class="form-control rounded" name="isi{{$j}}[]" id="isian{{$j}}" type="text">
</div>
<input type="hidden" name="tipe_soal2[]" value="{{$soal2->t}}">
<input type="hidden" name="nomor_soal2[]" value="{{$soal2->n}}">
<?php $j++ ;?>
@endif

@empty
@endforelse
@endif
<!-- soal isian singkat -->

<!-- true false -->
@if($soals3 != NULL)
<?php $k=0 ;?>
@forelse ($soals3 as $soal3)
@if($soal3->s != "xr")
<div class="alert alert-success p-3 ">
<div class="d-flex justify-content-end"><p>True False</p></div>
<div>{{$soal3->s}}</div>
<select class="form-control" name="truefalse{{$k}}[]" id="truefalse{{$k}}">
<option selected value="0"></option>
<option value="1">True</option>
<option value="2">False</option>
</select>
<input type="hidden" name="tipe_soal3[]" value="{{$soal3->t}}">
<input type="hidden" name="nomor_soal3[]" value="{{$soal3->n}}">
</div>

<?php $k++; ?>
@endif

@empty
@endforelse
@endif
<!-- true false -->

<button type="submit" class="btn btn-success form-control mt-3">Selesai</button>
</form>  
</div> 

    
</script> -->
@endsection
