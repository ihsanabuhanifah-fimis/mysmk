

<div class="border p-md-4">
<table class="table myTable table-responsive-sm table-bordered ">
    <thead class="bg-success" >
        <tr>
        
                <th class="text-center">No</th>
                <th>Jam Mulai</th>
                <th class="text-center">Jam Ke-</th>
                <th>Mata Pelajaran</th>
                <th>Kelas</th>
               
                <th class="text-center">Durasi</th>
                <th class="text-center">Semester</th>
                <th class="text-center">Tahun Pelajaran</th>
                <th class="text-center">Masuk</th>
        
        </tr>
    </thead>
    <tbody>
        @forelse ($jadwals as $jadwal)
        <tr>
            <td class="text-center">{{$loop->iteration}}</td>
            <td>{{$jadwal->waktu}}</td>
            <td class="text-center">{{$jadwal->jam_ke}}</td>
            <td>{{$jadwal->subject_name}}</td>
            <td>{{$jadwal->nama_rombel}}</td>
          
            <td class="text-center">{{$jadwal->duration}}</td>
            <td class="text-center">Semester {{$jadwal->semester}}</td>
            <td class="text-center">{{$jadwal->nama_ta}}</td>
            <td class="text-center"><a class="btn btn-success" href="{{route('absensi',['id'=>$jadwal->no])}}">Masuk</a></td>
        </tr>

        @empty
         <td class="text-center alert alert-warning mt-2" colspan="10">Alhamdulilah ustadz hari ini tidak memiliki jadwal mengajar</td>
        @endforelse
    </tbody>

</table>
</div>


            

          