<div class="text-center p-md-5 p-sm-0 pt-3 bg-gradient-success">
    <h4>DAFTAR MATA PELAJARAN
     <br>{{$mapels[0]->nama_rombel}}
     <br> Semester {{$mapels[0]->semester}}
     <br>Tahun Ajaran {{$mapels[0]->nama_ta}}
    </h4>
</div>
<div class="row row-cols-1 row-cols-md-3 ">

  @forelse($mapels as $mapel)
  <div class="col mb-4">
    <div class="card p-4">
      <img src="\img\kelas.jpg" class="card-img-top" alt="...">
      <div class="card-body">
        <table class="table table-borderless">
            <tr>
                <th>Mata Pelajaran</th>
                <th>:</th>
                <th>{{$mapel->subject_name}}</th>
            </tr>
            <tr>
                <th>Pengampu</th>
                <th>:</th>
                <th>{{$mapel->cikgu_name}}</th>
            </tr>
        </table>
        <div class="text-center form-control btn btn-success">Detail</div>
      </div>
    </div>
  </div>
  @empty
  @endforelse
 
</div>