
<link rel="stylesheet" href="/css/stylex.css">
<table class="table1 table table-responsive-sm">
        <thead class="bg-success thread1">
            <tr class="tr1">
                <th class="th1" scope="col">Jam ke-</th>
                <th class="th1" scope="col">Mata Pelajaran</th>
                <th class="th1" scope="col">Pengampu</th>
                <th class="th1" scope="col">Status Kehadiran Siswa</th>
                <th class="th1" scope="col">Keterangan</th>
                <th class="th1" scope="col">Materi</th>
               
            </tr>
        </thead>
        <tbody class="tbody1">
       @forelse($kbms as $kbm)
            <tr class="tr1">
              <td class="td2 td1 bg-primary td4">JAM PELAJARAN KE-{{$kbm->jam_ke}}</td>
                <td class="td1 td3">{{$kbm->jam_ke}}</td>
                <td class="td1 td2">MATA PELAJARAN</td>
                <td data-header="Mata-Pelajaran :">{{$kbm->id_subject}}</td>
                <td class="td1 td2">PENGAMPU</td>
                <td data-header="Mata-Pelajaran :">{{$kbm->id_cikgu}}</td>
                <td class="td1 td2">STATUS KEHADIRAN SISWA</td>
                @if($kbm->kehadiran == 1)
                <td class="td1" data-header="Mata-Pelajaran :">Hadir</td>
                @elseif($kbm->kehadiran == 2)
                <td class="td1" data-header="Mata-Pelajaran :">Sakit</td>
                @elseif($kbm->kehadiran == 3)
                <td class="td1" data-header="Mata-Pelajaran :">Izin</td>
                @elseif($kbm->kehadiran == 4)
                  <td class="td1" data-header="Mata-Pelajaran :">Tanpa Keterangan</td>
                @elseif($kbm->kehadiran == 5)
                  <td class="td1" data-header="Mata-Pelajaran :">Tidak Mengerjakan Tugas</td>
                @endif
              
                <td class="td1" data-header="Mata-Pelajaran :">{{$kbm->kehadiran2}}</td>
              
            
                <td class="td1 td2">MATERI</td>
                <td class="td1 td6" data-header="Mata-Pelajaran :">{{$kbm->materi}}</td>
                <!-- <td data-header="Pengampu :">Ihsan</td>
                <td data-header="Status Kehadiran siswa :">izin</td>
                <td data-header="Keterangan :">pulang ke rumah</td> -->
              
            </tr>
          @empty
          @endforelse
        </tbody>
       
    </table>