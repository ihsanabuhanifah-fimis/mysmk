<script>
      $(document).ready(function() {
        $('#myTableJadwal').DataTable();
      } );
  </script>
  <div class="text-center mt-5">
<h5>Jadwal KBM SMK MADINATULQURAN <br> Tahun Pelajaran {{$jadwals[0]->nama_ta}}</h5>
</div>
<table id="myTableJadwal" class="table   table-responsive-sm table-bordered table-striped">
    <thead class="btn-success ">
        <tr>
            <th class="text-center">No</th>
            <th>Hari</th>
            <th>Kelas</th>
            <th class="text-center">Jam Masuk</th>
            <th>Mata Pelajaran</th>
            <th>Nama Guru</th>
            <th class="text-center">Jam-ke</th>
            <th class="text-center">Durasi</th>
            <th class="text-center">Semester</th>
            <th class="text-center">Tahun Ajaran</th>
            <th class="text-center">Edit</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($jadwals as $jadwal)
        <tr>
            <td class="text-center">{{$loop->iteration}}</td>
            <td>{{$jadwal->days}}</td>
            <td>{{$jadwal->nama_rombel}}</td>
            <td class="text-center">{{$jadwal->waktu}}</td>
            <td>{{$jadwal->subject_name}}</td>
            <td>{{$jadwal->cikgu_name}}</td>
            <td class="text-center">{{$jadwal->jam_ke}}</td>
            <td class="text-center">{{$jadwal->duration}} x 45 Menit</td>
            <td class="text-center"> Semester {{$jadwal->semester}}</td>
            <td class="text-center">{{$jadwal->nama_ta}}</td>
            <td><button class="btn btn-success">Edit</button></td>
        </tr>
        @empty
        @endforelse
    </tbody>
</table>