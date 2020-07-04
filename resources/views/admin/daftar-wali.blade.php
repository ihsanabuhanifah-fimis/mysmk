

<table class="table table-responsive-sm  table-responsive table-bordered table-striped">
<thead class="bg-success">
    <tr>
        <th>No</th>
        <th>Detail</th>
        <th>Nama Wali</th>
        <th>Email</th>
        <th>Tampat, Tanggal Lahir</th>
        <th>Nama Ayah</th>
        <th>Nama Ibu</th>
        <th>Jurusan</th>
        <th>Tahun Masuk</th>
        <th>Sekolah Asal</th>
        
    </tr>
</thead>
    <tbody>
        @forelse($siswas as $siswa)
        <tr>
            <td>{{$loop->iteration}}</td>
            <td><button class="btn btn-success">Detail</button></td>
            <td>{{$siswa->nis}}</td>
            <td>{{$siswa->nama}}</td>
            <td>{{$siswa->email}}</td>
            <td>{{$siswa->tempat}}</td>
            <td>{{$siswa->nama_ayah}}</td>
            <td>{{$siswa->nama_ibu}}</td>
            <td>
                @if($siswa->jurusan == 1)
                <p>Teknik Komputer dan Jaringan</p>
                @else
                <p>Rekayasa Perangkat Lunak</p>
                @endif
            </td>
            <td>{{$siswa->tahun_masuk}}</td>
            <td>{{$siswa->asal_sekolah}}</td>
            
        </tr>
        @empty
        @endforelse
        <tr>

        </tr>
    </tbody>

</table>