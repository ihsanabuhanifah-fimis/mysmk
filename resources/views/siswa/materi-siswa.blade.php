<h4 class="mt-5 mb-3 text-center"> DAFTAR MATERI </h4>
                       <ol class="breadcrumb mb-4">
                           <li class="breadcrumb-item active">
                             <div class="text-center">Daftar Materi Pelajaran di kelas</div>
                           
                           </li>
                       </ol>
</h4>                   
<div class="row row-cols-1 row-cols-md-4 ">
<?php $i=0; ?>
@forelse ($mapels as $mapel)
<div class="col mb-4">
<div class="card p-3">
    <img src="https://tse2.mm.bing.net/th?id=OIP.eqvRJ7gL6_Xa07DJ4HwKlwHaGa&pid=Api&P=0&w=190&h=166" class="card-img-top" alt="...">
    <div class="card-body">
      <h5 class="card-title font-weight-bold text-center">{{$mapel->subject_name}}</h5>
      <p class="card-text">
      <a class="btn border form-control" data-toggle="collapse" href="#mapel{{$i}}" role="button" aria-expanded="false" aria-controls="collapseExample">
        Daftar Bab
    </a>
    </p> 



 
    <div class="collapse" id="mapel{{$i}}">
        <div class="card card-body">
        <?php $jml= count($materis[$i]) ;?>
        <?php $j=0 ; ?>
        @while ($j < $jml)
        <a href="{{route('bab.siswa',['id'=>$materis[$i][$j]->id_bab])}}" class="btn btn-success mb-2">{{$materis[$i][$j]->nama_bab}}</a>

        <?php $j++ ; ?>
        @endwhile
        </div>
    </div>

      <p class="text-center"><i>Pengajar : {{$mapel->cikgu_name}}</i></p>
    </div>
  </div>
  </div>
<?php $i++ ; ?>
@empty

@endforelse
 <?php $jml_mapel =count($mapels) ?>

</div>

@if($jml_mapel== NULL)
<div class="card p-5 text-center alert-warning"><b>SAAT INI BELUM ADA MATERI YANG DIBUAT UNTUK</b></div>
@endif