
<script>
    $(document).ready( function () {
        $('#myTableAbsen').DataTable();
    } );
</script>

 

<table id="myTableAbsen" class="table table-bordered table-responsive-sm ">
    <thead class="bg-success">
        <tr>
            <th>No</th>
            <th>Tanggal</th>
            <th>Mata Pelajaran</th>
            <th>Kelas</th>
            <th>Nama Siswa</th>
            <th>Status</th>
            <th>Keterangan</th>
            <th>Semester</th>
            <th>Tahun Ajaran</th>
        </tr>
    </thead>
    <tbody>
    @forelse($rekaps as $rekap)
        <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$rekap->tanggal}}</td>
            <td>{{$rekap->subject_name}}</td>
            <td>{{$rekap->nama_rombel}}</td>
            <td>{{$rekap->nama}}</td>
            <td>
            @if($rekap->status == 1)
            <p>Hadir</p>
            @elseif($rekap->status == 2)
            <p>Sakit</p>
            @elseif($rekap->status == 3)
            <p>Izin</p>
            @elseif($rekap->status == 4)
            <p>Tanpa Keterangan</p>
            @endif
            <td>
            @if($rekap->keterangan == NULL)
            <p>-</p>
            @else
            <p>{{$rekap->keterangan}}</p>
            @endif
            </td>
            <td>Semester {{$rekap->semester}}</td>
            <td>{{$rekap->nama_ta}}</td>
            
            </>

        </tr>
        @empty
        @endforelse
    </tbody>
</table>