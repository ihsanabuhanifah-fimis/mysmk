<div class="text-center p-md-5 p-sm-0 pt-3 bg-gradient-success">

    <h4 class="mt-5 mb-3 text-center">DAFTAR MATA PELAJARAN </h4>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">
                                Daftar Mata Pelajaran di {{$mapels[0]->nama_rombel}}  Semester {{$mapels[0]->semester}}   Tahun Ajaran {{$mapels[0]->nama_ta}} 
                            </li>
                        </ol>
</div>
<div class="row row-cols-1 row-cols-md-3 ">

  @forelse($mapels as $mapel)
  <div class="col mb-4">
    <div class="card p-md-5 p-sm-3">
      <img src="\img\kelas.jpg" class="card-img-top" alt="jadwal">
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
        <div class="text-center form-control  detail{{$loop->iteration}} btn btn-success">Detail</div>
        
<script>
$(document).ready(function(){
  $(".detail{{$loop->iteration}}").click(function(){
    alert("saat ini belum tersedia");
  });
});
</script>
      </div>
    </div>
  </div>
  @empty
  @endforelse
 
</div>



