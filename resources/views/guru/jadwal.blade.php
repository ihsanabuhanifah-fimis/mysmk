

<div class="border p-md-4">
<table class="table myTable table-responsive-sm table-bordered ">
    <thead class="bg-success" >
        <tr>
        
                <th class="text-center">No</th>
                <th>Mata Pelajaran</th>
                <th>Kelas</th>
                <th class="text-center">Jam Ke-</th>
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
            <td>{{$jadwal->subject_name}}</td>
            <td>{{$jadwal->nama_rombel}}</td>
            <td class="text-center">{{$jadwal->jam_ke}}</td>
            <td class="text-center">{{$jadwal->duration}}</td>
            <td class="text-center">{{$jadwal->semester}}</td>
            <td class="text-center">{{$jadwal->nama_ta}}</td>
            <td class="text-center"><a class="btn btn-success" href="{{route('absensi',['id'=>$jadwal->no])}}">Masuk</a></td>
        </tr>

        @empty
         <td class="text-center alert alert-warning mt-2" colspan="8">Alhamdulilah ustadz hari ini tidak memiliki jadwal mengajar</td>
        @endforelse
    </tbody>

</table>
</div>


            <?php
                $nilai_Tugas = (((array_sum($nilai_Tugas))*$persen_Tugas)/100)/$jml_Tugas;
                $nilai_Kuis = (((array_sum($nilai_Kuis))*$persen_Kuis)/100)/$jml_Kuis;
              $nilai_PAS = (((array_sum($nilai_PAS))*$persen_PAS)/100)/$jml_PAS;
              $nilai_PTS = (((array_sum($nilai_PTS))*$persen_PTS)/100)/$jml_PTS;
              $nilai_PH = (((array_sum($nilai_PH))*$persen_PH)/100)/$jml_PH;
           
           
            ;?>

            <?php $jumlahnilai= $nilai_PH + $nilai_PTS + $nilai_PAS + $nilai_Kuis +$nilai_Tugas ;?>
            <?= number_format(($jumlahnilai)) ;?>