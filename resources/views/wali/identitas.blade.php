<div class="container container-fluid-sm mt-4">
    <div class="text-center mt-4">
    <img src="\img\kelas.jpg" class="img-thumbnail rounded-circle" alt="image-siswa">   
    </div>
    <div class="">
        <table class="table-borderless text-center">
            <tr class="p-4">
                <th class="pr-4 text-left">Nama Santri</th>
                <th>:</th>
                <th class="pl-4 text-left">{{$siswa->nama}}</th>
            </tr>
            <tr>
                <th class="pr-4 text-left">NISN</th>
                <th>:</th>
                <th class="pl-4 text-left">{{$siswa->nis}}</th>
            </tr>
            <tr>
                <th class="pr-4 text-left">Tempat, Tanggal Lahir</th>
                <th>:</th>
                @if($siswa->bulan == 1)
       <th class="pl-4 text-left" >{{$siswa->tempat}}, {{$siswa->tanggal}} Januari {{$siswa->tahun}}</th>
        @elseif($siswa->bulan == 2)
        <th class="pl-4 text-left">{{$siswa->tempat}}, {{$siswa->tanggal}} Februari {{$siswa->tahun}}</th>
        @elseif($siswa->bulan == 3)
        <th class="pl-4 text-left">{{$siswa->tempat}}, {{$siswa->tanggal}} Maret {{$siswa->tahun}}</th>
        @elseif($siswa->bulan == 4)
        <th class="pl-4 text-left">{{$siswa->tempat}}, {{$siswa->tanggal}} April {{$siswa->tahun}}</th>
        @elseif($siswa->bulan == 5)
        <th class="pl-4 text-left">{{$siswa->tempat}}, {{$siswa->tanggal}} Mei {{$siswa->tahun}}</th>
        @elseif($siswa->bulan == 6)
        <th class="pl-4 text-left">{{$siswa->tempat}}, {{$siswa->tanggal}} Juni {{$siswa->tahun}}</th>
     
        @elseif($siswa->bulan == 7)
  
        <th class="pl-4 text-left">{{$siswa->tempat}}, {{$siswa->tanggal}} Juli {{$siswa->tahun}}</th>
         @elseif($siswa->bulan == 8)
         <th class="pl-4 text-left">{{$siswa->tempat}}, {{$siswa->tanggal}} Agustus {{$siswa->tahun}}</th>
        @elseif($siswa->bulan == 9)
        <th class="pl-4 text-left">{{$siswa->tempat}}, {{$siswa->tanggal}} September {{$siswa->tahun}}</th>
        @elseif($siswa->bulan == 10)
        <th class="pl-4 text-left">{{$siswa->tempat}}, {{$siswa->tanggal}} Oktober {{$siswa->tahun}}</th>
        @elseif($siswa->bulan == 11)
        <th class="pl-4 text-left">{{$siswa->tempat}}, {{$siswa->tanggal}} November {{$siswa->tahun}}</th>
        @elseif($siswa->bulan == 12)
        
        <th class="pl-4 text-left">{{$siswa->tempat}}, {{$siswa->tanggal}} Desember {{$siswa->tahun}}</th>
        @endif
               
            </tr>
        </table>
    </div>
</div>