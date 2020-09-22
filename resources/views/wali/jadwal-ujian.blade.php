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
    <thead class="bg-success text-center">
        <tr>
            <th>No</th>
           <!-- <th>History</th> -->
            <th>Mata Pelajaran</th>
            <th>Materi</th>
            <th>Pengampu</th>
            <th data-toggle="tooltip" data-placement="top" title="PH - Penilaian Harian, PTS = Penilaian Tengah Semester, PAS = Penilaian Akhir Semester">Jenis Ujian</th>
            <th>Tipe Ujian</th>
            <th class="text-center">Tanggal Mulai</th>
            <th class="text-center">Tanggal Selesai</th>
            <th class="text-center">Nilai Akhir</th>
          
       
           

            
        </tr>
    </thead>
    <tbody class="text-center">
    <?php $k=0 ;?>
        @forelse ($ujians as $ujian)
        <tr>
       
            <td>{{$loop->iteration}}</td>
            <!-- <td class="text-center">
           <button class="btn btn-success history" id="{{$ujian->id}}">Lihat</button>
            </td> -->
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



<div class="modal fade" id="myExam" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Input Nilai Akhir Santri</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <div class="nilai-exam-siswa"></div>
      </div>
    </div>
   
  </div>
</div>
