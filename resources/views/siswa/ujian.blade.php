
@extends('siswa.layout.master2')
@section('title','Penilaian')

@section('content')

 <div class="container-fluid bg-white">
        <div class="row">
            <div class="col-md-8 col-sm-12 col-xl-6">
               
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
<!-- javascript:void(0) -->
<form action="javascript:void(0)" id="form-ujian" >
@csrf
{{method_field('PUT')}}

<div class="container-md container-lg container-sm-fluid container-small-fluid ">
<div class="row-fluid mt-2 mb-2   ">
    <div>
    <div class="card ">
    
  <h5 class="card-header bg-success d-none d-md-block d-lg-block d-xl-block" "></h5>
  <div class="card-body d-none d-md-block d-lg-block d-xl-block">
  <div class="d-flex justify-content-between ">
    <div>
    <h5 class="card-title">{{$banksoals[0]->subject_name}}</h5>
    <p class="card-text">Selamat Mengerjakan, sukses dan semangat</p>
    </div>
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
    </>
  </div>
</div>
    </div>
</div>
<style>

</style>
<div class="mt-3 d-flex justify-content-md-between">


<div class="col-md-9 col-sm-12">
<input type="hidden" name="id" value="{{$banksoals[0]->id}}">
<input type="hidden" name="attemp" value="{{$attemp[0]->id}}">
<!-- soal pilihan ganda -->

@if($soals1 !== NULL)
<?php $i=0 ; ?>
@forelse ($soals1 as $soal1)
@if($soal1->s != "xr")

@if($jwb_soal1[$i]->k == "lk")
<div class="alert alert-success p-md-3 p-sm-0 ">

<div>{!!$soal1->s!!}</div>
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
<input type="hidden" name="pg{{$i}}[]" value="0">


</div>
@else
<?php $g=0 ;?>

@while($g<$jmlsoal1)
@if($jwb_soal1[$i]->n == $soals1[$g]->n)
@if($jwb_soal1[$i]->n != NULL)
@if($jwb_soal1[$i]->k == 1)
<div class="alert alert-success p-md-3 p-sm-0 ">

<div>{!!$soal1->s!!}</div>
<input name="pg{{$i}}[]" id="k1" checked="checked" type="radio" value="{{$soal1->k1}}">
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
@elseif($jwb_soal1[$i]->k == 2)
<div class="alert alert-success p-md-3 p-sm-0 ">

<div>{!!$soal1->s!!}</div>
<input name="pg{{$i}}[]" id="k1"  type="radio" value="{{$soal1->k1}}">
<label class="ml-2" for="k1">{{$soal1->a}}</label>
<br>
<input name="pg{{$i}}[]" id="k2" checked="checked" type="radio" value="{{$soal1->k2}}">
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
@elseif($jwb_soal1[$i]->k == 3)
<div class="alert alert-success p-md-3 p-sm-0 ">

<div>{!!$soal1->s!!}</div>
<input name="pg{{$i}}[]" id="k1"  type="radio" value="{{$soal1->k1}}">
<label class="ml-2" for="k1">{{$soal1->a}}</label>
<br>
<input name="pg{{$i}}[]" id="k2" type="radio" value="{{$soal1->k2}}">
<label class="ml-2" for="k2">{{$soal1->b}}</label>
<br>
<input name="pg{{$i}}[]" id="k3" checked="checked" type="radio" value="{{$soal1->k3}}">
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
@elseif($jwb_soal1[$i]->k == 4)
<div class="alert alert-success p-md-3 p-sm-0 ">

<div>{!!$soal1->s!!}</div>
<input name="pg{{$i}}[]" id="k1"  type="radio" value="{{$soal1->k1}}">
<label class="ml-2" for="k1">{{$soal1->a}}</label>
<br>
<input name="pg{{$i}}[]" id="k2" type="radio" value="{{$soal1->k2}}">
<label class="ml-2" for="k2">{{$soal1->b}}</label>
<br>
<input name="pg{{$i}}[]" id="k3" type="radio" value="{{$soal1->k3}}">
<label class="ml-2" for="k1">{{$soal1->c}}</label>
<br>
<input name="pg{{$i}}[]" id="k4" checked="checked" type="radio" value="{{$soal1->k4}}">
<label class="ml-2" for="k1">{{$soal1->d}}</label>
<br>
<input name="pg{{$i}}[]" id="k5" type="radio" value="{{$soal1->k5}}">
<label class="ml-2" for="k1">{{$soal1->e}}</label>
<input type="hidden" name="tipe_soal1[]" value="{{$soal1->t}}">
<input type="hidden" name="nomor_soal1[]" value="{{$soal1->n}}">


</div>
@elseif($jwb_soal1[$i]->k == 5)
<div class="alert alert-success p-md-3 p-sm-0 ">

<div>{!!$soal1->s!!}</div>
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
<input checked="checked" name="pg{{$i}}[]" id="k5" type="radio" value="{{$soal1->k5}}">
<label class="ml-2" for="k1">{{$soal1->e}}</label>
<input type="hidden" name="tipe_soal1[]" value="{{$soal1->t}}">
<input type="hidden" name="nomor_soal1[]" value="{{$soal1->n}}">


</div>
@else

<div class="alert alert-success p-md-3 p-sm-0 ">

<div>{!!$soal1->s!!}</div>
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
<input type="hidden" name="pg{{$i}}[]" value="0">


</div>

@endif

@endif

@endif
<?php $g++ ;?>
@endwhile
@endif
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
@if($jwb_soal2[$j]->k == "lk" || $jwb_soal2[$j]->k == "0")
<div class="alert alert-success p-md-3 p-sm-0 ">

<div>{!!$soal2->s!!}</div>
<label for="isian{{$j}}">Jawaban</label>
<input class="form-control rounded" name="isi{{$j}}[]" id="isian{{$j}}" type="text">
</div>
<input type="hidden" name="tipe_soal2[]" value="{{$soal2->t}}">
<input type="hidden" name="nomor_soal2[]" value="{{$soal2->n}}">
@else

<?php $r=0 ; ?>
@while($r<$jmlsoal2)
@if($jwb_soal2[$j]->n == $soals2[$r]->n)
@if($jwb_soal2[$j]->n != NULL)


<div class="alert alert-success p-md-3 p-sm-0 ">

<div>{!!$soal2->s!!}</div>
<label for="isian{{$j}}">Jawaban</label>
<input class="form-control rounded" name="isi{{$j}}[]" value="{{$jwb_soal2[$j]->k}}" id="isian{{$j}}" type="text">
</div>
<input type="hidden" name="tipe_soal2[]" value="{{$soal2->t}}">
<input type="hidden" name="nomor_soal2[]" value="{{$soal2->n}}">

@endif
@endif


<?php $r++; ?>
@endwhile
@endif
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
@if($jwb_soal3[$k]->k == "lk" || $jwb_soal3[$k]->k == "0")
<div class="alert alert-success p-md-3 p-sm-0 ">

<div>{!!$soal3->s!!}</div>
<select class="form-control" name="truefalse{{$k}}[]" id="truefalse{{$k}}">
<option selected value="0"></option>
<option value="1">True</option>
<option value="2">False</option>
</select>
<input type="hidden" name="tipe_soal3[]" value="{{$soal3->t}}">
<input type="hidden" name="nomor_soal3[]" value="{{$soal3->n}}">
</div>
@else
<?php $h=0 ;?>

@while($h<$jmlsoal3)
@if($jwb_soal3[$k]->n == $soals3[$h]->n)
@if($jwb_soal3[$k]->n != NULL)
@if($jwb_soal3[$k]->k == 1)
<div class="alert alert-success p-md-3 p-sm-0 ">

<div>{!!$soal3->s!!}</div>
<select class="form-control" name="truefalse{{$k}}[]" id="truefalse{{$k}}">
<option selected value="1"> True</option>
<option value="2">False</option>
</select>
<input type="hidden" name="tipe_soal3[]" value="{{$soal3->t}}">
<input type="hidden" name="nomor_soal3[]" value="{{$soal3->n}}">
</div>
@elseif($jwb_soal3[$k]->k == 2)
<div class="alert alert-success p-md-3 p-sm-0 ">

<div>{!!$soal3->s!!}</div>
<select class="form-control" name="truefalse{{$k}}[]" id="truefalse{{$k}}">
<option selected value="2"> False</option>
<option value="1">True</option>
</select>
<input type="hidden" name="tipe_soal3[]" value="{{$soal3->t}}">
<input type="hidden" name="nomor_soal3[]" value="{{$soal3->n}}">
</div>

@endif
@endif
@endif
<?php $h++ ;?>
@endwhile
@endif
<?php $k++; ?>
@endif

@empty
@endforelse
@endif
<!-- true false -->

<button type="submit" class="btn btn-success konfirmasi form-control mt-3">Selesai</button>
</form>  
</div> 
<style>
.timer{
    position:fixed;
    z-index:9999;
}
i{
    font-size:12px;
}
.simpan-ujian{
    font-size:14px;
}
</style>

<div class="col-md-3 col-sm-12  ">
<div class="mt-5 bg-white timer border  rounded text-center p-2">
<h4 class="waktu rounded text-center p-1 "></h4>
<div class="info-ujian"></div>
<a class="simpan-ujian border p-1  rounded mb-5">Save Progress</a>
</div>
</div>
</div>


<!-- Modal -->
<div class="modal fade" id="konfirmasi-ujian" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Konfirmasi</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <h6>Apakah Anda yakin akan mengakhiri ujian ini?</h6>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
        <button type="button" class=" selesai-ujian btn btn-success">Selesai</button>
      </div>
    </div>
  </div>
</div>

    
</script>
<script>
    $(document).ready(function(){
      $('img').addClass('img-thumbnail');
        $.ajaxSetup({
              headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
            });
            $.ajax({
				type: 'PUT',   
				url: "{{route('simpan_ujian')}}",
				data: $('#form-ujian').serialize(),
				success: function(data) {
                $(".info-ujian").html(data);
              
                },
               
			});
		$(".simpan-ujian").click(function(){
            
            $.ajaxSetup({
              headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
            });
            $.ajax({
				type: 'PUT',   
				url: "{{route('simpan_ujian')}}",
				data: $('#form-ujian').serialize(),
				success: function(data) {
                    
          $(".info-ujian").html(data);
              
                },
               
			});
        });
			
			});
        
</script>
<script>
    $(document).ready(function(){
        $(".konfirmasi").click(function(){
            $("#konfirmasi-ujian").modal();
		$(".selesai-ujian").click(function(){
            
            $.ajaxSetup({
              headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
            });
            $.ajax({
				type: 'PUT',   
				url: "{{route('selesai_ujian')}}",
				data: $('#form-ujian').serialize(),
				success: function(data) {
                     
                    window.location.href="/siswa/ujian/nilai/"+data;
                },
               
			});
        });
			
            });
        });
        
</script>



<script>
    $(document).ready(function(){

		setInterval(function() {
            $.ajaxSetup({
              headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
            });
            $.ajax({
				type: 'PUT',   
				url: "{{route('update_ujian')}}",
				data: $('#form-ujian').serialize(),
				success: function(data) {
                     var waktu = data ;        
              
                },
               
			});
        }, 60000);
            
            
        });
			
		
        

    if ( window.history.replaceState ) {
        window.history.replaceState( null, null, window.location.href );
    }
</script>
<script>
    function startTimer(duration, display) {
        var timer = duration, minutes, seconds;
        setInterval(function () {
            
            minutes = parseInt(timer / 60, 10)
            seconds = parseInt(timer % 60, 10);

            minutes = minutes < 10 ? "0" + minutes : minutes;
            seconds = seconds < 10 ? "0" + seconds : seconds;

            display.textContent = minutes + ":" + seconds;

            if (timer-- <= 0) {
               
            $(document).ready(function(){           
            $.ajaxSetup({
              headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
            });
            $.ajax({
				type: 'PUT',   
				url: "{{route('selesai_ujian')}}",
				data: $('#form-ujian').serialize(),
				success: function(data) {
             
                    window.location.href="/siswa/ujian/nilai/"+data;
                },
               
			});
        });
            clearInterval(timer);
            }
        }, 1000);
    }

    window.onload = function () {
        var fiveMinutes = <?= $attemp[0]->sisa_waktu ?> *60 * 1,
            display = document.querySelector('.waktu');
        startTimer(fiveMinutes, display);
    };
</script>

@endsection
