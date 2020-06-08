<script src="/js/jquery-3.3.1.slim.min.js"></script> 
<div class="container p-5">
<div class="header">
<table class="">
<tr>
<th><h6>Nama</h6></th>
<th><h6>:</h6></th>
<th><h6>{{$banksoals->cikgu_name}}</h6></th>
</tr>
<tr>
<th><h6>Mata Pelajaran</h6></th>
<th><h6>:</h6></th>
<th><h6>{{$banksoals->subject_name}}</h6></th>
</tr>
<tr>

</tr>
</table>
</div>
</div>
<div class="container p-5">
@if($soals1 !== NULL)
<?php $i=1 ; ?>
@forelse ($soals1 as $soal1)
@if($soal1->s != "xr")

<div class="">
<div class="mb-1">{{$i}}.   {!!$soal1->s!!}</div>
<ol type="A">
<li>{{$soal1->a}}</li>
<li>{{$soal1->b}}</li>
<li>{{$soal1->c}}</li>
<li>{{$soal1->d}}</li>
<li>{{$soal1->e}}</li>
</ol>
@if($soal1->k == 1)
<p class="kunci">Kunci Jawaban : A</p>
@elseif($soal1->k == 2)
<p class="kunci">Kunci Jawaban : B</p>
@elseif($soal1->k == 3)
<p class="kunci">Kunci Jawaban : C</p>
@elseif($soal1->k == 4)
<p class="kunci">Kunci Jawaban : D</p>
@elseif($soal1->k == 5)
<p class="kunci">Kunci Jawaban : E</p>
@endif
</div>
@endif
<?php $i++; ;?>
@empty
@endforelse
@endif

@if($soals2 != NULL)
<?php $j=count($soals1)+1 ;?>
@forelse($soals2 as $soal2)
@if($soal2->s != "xr" )
<div class="">
<div class="mb-1">{{$j}}.   {{$soal2->s}}</div>
<p>Jawaban : .....................</p>
@if($soal2->a != "xrty")
<p class="kunci">Kunci Jawaban 1 : {{$soal2->a}}</p>
@else
<p class="kunci">Kunci jawaban 1 : </p>
@endif
@if($soal2->b != "xrty")
<p class="kunci">Kunci Jawaban 2 : {{$soal2->b}}</p>
@else
<p class="kunci">Kunci Jawaban 2 : </p>
@endif
@if($soal2->c != "xrty")
<p class="kunci">Kunci Jawaban 3 : {{$soal2->c}}</p>
@else
<p class="kunci">Kunci Jawaban 3 : </p>
@endif

</div>

@endif
<?php $j++;?>
@empty
@endforelse
@endif



@if($soals3 != NULL)
<?php $k=0 ;?>
@forelse ($soals3 as $soal3)
@if($soal3->s != "xr")
<div class="">
<div class="mb-1">{{$k}}.   {{$soal3->s}}</div>
<p>Jawaban : .....................</p>
@if($soal3->k == 1)
<p class="kunci"> Kunci Jawaban : True</p>
@elseif($soal3->k == 2)
<p class="kunci"> Kunci Jawaban : False</p>
@else
<p class="kunci"> Belum Memiliki Kunci Jawaban </p>
@endif
</div>

@endif
<?php $h=0 ;?>
@empty
@endforelse
@endif
</div>
<script>

