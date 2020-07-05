<style>
    .font{
        font-size:13px;
    }
</style>
<div class="border p-md-4 p-sm-0">
<table class="table-responsive table table-borderless">
    <tr>
        <th>Kelas</th>
      
        <th>:</th>
      
        <th>{{$siswas[0]->nama_rombel}}</th>
    </tr>
    <tr>
        <th>Jumlah Santri</th>
       
        <th>:</th>
        
        <th>{{$jml_siswa}}</th>
    </tr>
    <tr>
        <th>Wali Kelas</th>
       
        <th>:</th>
        
        <th>{{$siswas[0]->wali_kelas}}</th>
    </tr>
</table>
</div>
<div class="row row-cols-1 mt-4 row-cols-md-5">

  @forelse($siswas as $siswa)

  <div class="col mb-4">
  
    <div class="card">
    <div class="p-4">
      <img src="/img/avatar.jpeg" class="card-img-top rounded-circle" alt="..." >
      </div>
      <div class="card-body">
        <h6 class="card-title font-weight-bolder text-center font">{{$siswa->nama}}</h6>
        <div class="card-text">
       <p class="text-center font">
        @if($siswa->bulan == 1)
       <a>{{$siswa->tempat}}, {{$siswa->tanggal}} Januari {{$siswa->tahun}}</a>
        @elseif($siswa->bulan == 2)
        <a>{{$siswa->tempat}}, {{$siswa->tanggal}} Februari {{$siswa->tahun}}</a>
        @elseif($siswa->bulan == 3)
        <a>{{$siswa->tempat}}, {{$siswa->tanggal}} Maret {{$siswa->tahun}}</a>
        @elseif($siswa->bulan == 4)
        <a>{{$siswa->tempat}}, {{$siswa->tanggal}} April {{$siswa->tahun}}</a>
        @elseif($siswa->bulan == 5)
        <a>{{$siswa->tempat}}, {{$siswa->tanggal}} Mei {{$siswa->tahun}}</a>
        @elseif($siswa->bulan == 6)
        <a>{{$siswa->tempat}}, {{$siswa->tanggal}} Juni {{$siswa->tahun}}</a>
     
        @elseif($siswa->bulan == 7)
  
        <a>{{$siswa->tempat}}, {{$siswa->tanggal}} Juli {{$siswa->tahun}}</a>
         @elseif($siswa->bulan == 8)
         <a>{{$siswa->tempat}}, {{$siswa->tanggal}} Agustus {{$siswa->tahun}}</a>
        @elseif($siswa->bulan == 9)
        <a>{{$siswa->tempat}}, {{$siswa->tanggal}} September {{$siswa->tahun}}</a>
        @elseif($siswa->bulan == 10)
        <a>{{$siswa->tempat}}, {{$siswa->tanggal}} Oktober {{$siswa->tahun}}</a>
        @elseif($siswa->bulan == 11)
        <a>{{$siswa->tempat}}, {{$siswa->tanggal}} November {{$siswa->tahun}}</a>
        @elseif($siswa->bulan == 12)
        
        <a>{{$siswa->tempat}}, {{$siswa->tanggal}} Desember {{$siswa->tahun}}</a>
        @endif
        <br>{{$siswa->nama_rombel}} <br> {{$siswa->email}}</p>
        
        <div class="text-center">
            <butto class="text-center btn btn-success" >Detail</butto>
        </div>
        </div>
      </div>
    </div>
  </div>

  @empty
   <div class="alert alert-warning text-center">Saat ini tidak ada siswa yang terdaftar di kelas ini</div>
    @endforelse
</div>