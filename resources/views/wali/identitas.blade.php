<div class="container container-fluid-sm mt-5 pb-4 border bg-white"    >
    <div class="text-center font-weight-bold mt-5">
        <h4 >IDENTITAS DIRI SANTRI</h4>
        @if($siswa == NULL)
                <th class="pl-4 text-left">Santi belum  melakukan pendaftaran</th>
                @else
              
              
    <div class="text-center mt-4">
    <img src="/img/avatar.jpeg" height="200" width="200"  class="img-thumbnail rounded-circle " alt="image-siswa">   
    </div>
    <div class="d-flex justify-content-center  mt-4">
        <div class="col-md-1"></div>
        <div class="col-md-8">
        <table class="table text-left table-borderless table-responsive-sm">
            <thead>
            <tr class="p-4 border-bottom">
                <th class="pr-4 text-left">Nama Santri</th>
                <th>:</th>
                <th class="pl-4 text-left">{{$siswa->nama}}</th>
            </tr>
            <tr class="border-bottom">
                <th class="pr-4 text-left">NISN</th>
                <th>:</th>
                <th class="pl-4 text-left">{{$siswa->nis}}</th>
            </tr>
            <tr class="border-bottom">
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
            <tr class="border-bottom">
                <th class="pr-4 text-left">Email</th>
                <th>:</th>
                <th class="pl-4 text-left">{{$siswa->email}}</th>
            </tr>
           

            <tr class="border-bottom">
                <th class="pr-4 text-left">Kelas</th>
                <th>:</th>
                <?php $jml_rombel =count($rombels) ?>
                @if($jml_rombel == NULL)
                <th class="pl-4 text-left">Siswa Belum dimasukan ke dalam Rombel</th>
                @else
                <th class="pl-4 text-left">{{$rombels[0]->nama_rombel}}</th>
                @endif
            </tr>
            
            <tr class="border-bottom">
                <th class="pr-4 text-left">Tahun Masuk</th>
                <th>:</th>
                <th class="pl-4 text-left">{{$siswa->tahun_masuk}}</th>
            </tr>
            <tr class="border-bottom">
                <th class="pr-4 text-left">Nama Ayah</th>
                <th>:</th>
                <th class="pl-4 text-left">{{$siswa->nama_ayah}}</th>
            </tr>
            <tr class="border-bottom">
                <th class="pr-4 text-left">Nama Ibu</th>
                <th>:</th>
                <th class="pl-4 text-left">{{$siswa->nama_ibu}}</th>
            </tr>
            </thead>
           <tbody class="mt-3">
            <tr class="border-bottom">
                <th class="pr-4 text-left">Nama Sekolah</th>
                <th>:</th>
                <th class="pl-4 text-left">SMK MADINATULQURAN</th>
            </tr>
            <tr class="border-bottom">
                <th class="pr-4 text-left">Alamat Sekolah</th>
                <th>:</th>
                <th class="pl-4 text-left">Kp. Kebon Kelapa RT. 002/011 Desa Singasari Kecamatan <br> Jonggol Kabupaten Bogor - Jawa Barat 16830</th>
            </tr>
            <tr class="border-bottom">
                <th class="pr-4 text-left">Kepala Sekolah</th>
                <th>:</th>
                <th class="pl-4 text-left">Andri Kusmayadi, S.T, M.Pd</th>
            </tr>
            <tr class="border-bottom">
                <th class="pr-4 text-left">Wali Kelas</th>
                <th>:</th>
                @if($jml_rombel == NULL)
                <th class="pl-4 text-left">Siswa Belum dimasukan ke dalam Rombel</th>
                @else
                <th class="pl-4 text-left">{{$rombels[0]->wali_kelas}}</th>
                @endif
              
            </tr>
            </tbody>
        </table>
        </div>
    
        <div>
            
        </div>
        @endif
    </div>
</div>