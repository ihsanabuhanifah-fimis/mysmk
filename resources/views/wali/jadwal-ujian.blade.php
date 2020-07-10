<style>
.font{
    font-size:12px;
}
</style>

<script>
    $(document).ready( function () {
        $('#myJadwalUjian').DataTable();
    } );
    </script>


<div class="p-md-4 p-sm-0 border ">
<table style="width:100%" id="myJadwalUjian" class="hover table table-bordered table-striped mt-2 table-responsive-sm table-responsive-md">
<p class="d-flex justify-content-end font"><i>*Nilai akhir adalah nilai yang diberikan oleh Guru Pengampu</i></p>
    <thead class="bg-success">
        <tr>
            <th>No</th>
            <th class="text-center">Riwayat <br> Ujian</th>
            <th>Mata Pelajaran</th>
            <th>Materi</th>
            <th>Pengampu</th>
            <th data-toggle="tooltip" data-placement="top" title="PH - Penilaian Harian, PTS = Penilaian Tengah Semester, PAS = Penilaian Akhir Semester">Jenis Ujian</th>
            <th>Tipe Ujian</th>
            <th class="text-center">Tanggal Mulai</th>
            <th class="text-center">Tanggal Selesai</th>

            <th class="text-center">Nilai Akhir</th>
            <th class="text-center">Status</th>
           

            
        </tr>
    </thead>
    <tbody class="text-center">
    <?php $k=0 ;?>
        @forelse ($ujians as $ujian)
        <tr>
            <td>{{$loop->iteration}}</td>
            <td class="text-center">
            <button type="button" class="btn btn-success" 
            data-toggle="modal" data-target="#exampleModal{{$loop->iteration}}">
           Lihat
            </button>
            </td>
            <td>{{$ujian->subject_name}}</td>
            <td>{{$ujian->materi}}</td>
            <td>{{$ujian->cikgu_name}}</td>
            <td>{{$ujian->nama_ujian}}</td>
            <td>{{$ujian->nama_tipe}}</td>
            @if($ujian->tanggal_mulai == NULL)
            <td class="text-center">-</td>
            @else
            <td class="text-center">{{$ujian->tanggal_mulai}} <br> {{$ujian->waktu_mulai}}</td>
            @endif
            @if($ujian->tanggal_selesai == NULL)
            <td class="text-center">-</td>
            @else
            <td class="text-center">{{$ujian->tanggal_selesai}} <br> {{$ujian->waktu_selesai}}</td>
          @endif
            <td class="text-center">{{$nilai_akhir[$k]}}</td>

            @if($nilai_akhir[$k] >= $ujian->kkm)
            <td>Lulus</td>
            @elseif($nilai_akhir[$k] == NULL)
            <td>Nilai Belum Masuk</td>
            @else
            <td>Tidak Lulus</td>
            @endif
            
            <!-- Button trigger modal -->
           
            
            <!-- Modal -->
<div class="modal fade" id="exampleModal{{$loop->iteration}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
       
       
      </div>
      <div class="modal-body">
     <H4 class="text-center font-weight-bold mb-4">RIWAYAT UJIAN </H4>
    

      @forelse ($nilais as $nilai)
            @if($nilai->id_penilaian == $ujian->id)
            

            <div class="alert alert-primary" role="alert">
                NILAI HASIL UJIAN: <p class="font-weight-bolder">{{$nilai->nilai}}</p> 
            </div>
           
            @endif
           
            @empty
            <div class="alert alert-primary" role="alert">
                BELUM ADA RIWAYAT UJIAN 
            </div>
            @endforelse
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
       
      </div>
    </div>
  </div>
</div>
           
        </tr>

        <?php $k++ ; ?>
        @empty
        <tr>
            <td colspan="20" class="alert alert-warning font-weight-bold text-center">Saat ini belum ada Jadwal Penilaian baik Teori/Praktek, baik Online maupu Offlie/Berbasis kertas </td>
        </tr>
        @endforelse
    </tbody>

</table>
</div>
<script>
