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


<div class="p-4 border ">
<table id="myJadwalUjian" class="table table-bordered table-striped mt-2 table-responsive-sm">
<p class="d-flex justify-content-end font"><i>*Nilai akhir adalah nilai yang diberikan oleh Guru Pengampu</i></p>
    <thead class="bg-success">
        <tr>
            <th>No</th>
            <th>Mata Pelajaran</th>
            <th>Materi</th>
            <th>Pengampu</th>
            <th>Jenis Ujian</th>
            <th>Tipe Ujian</th>
            <th>Tanggal Mulai</th>
            <th>Tanggal Selesai</th>

            <th>Nilai Akhir</th>
            <th>Status</th>
            <th class="text-center">Riwayat <br> Ujian</th>

            
        </tr>
    </thead>
    <tbody>
    <?php $k=0 ;?>
        @forelse ($ujians as $ujian)
        <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$ujian->subject_name}}</td>
            <td>{{$ujian->materi}}</td>
            <td>{{$ujian->cikgu_name}}</td>
            <td>{{$ujian->nama_ujian}}</td>
            <td>{{$ujian->nama_tipe}}</td>
            <td>{{$ujian->tanggal_mulai}} <br> {{$ujian->waktu_mulai}}</td>
            <td>{{$ujian->tanggal_selesai}} <br> {{$ujian->waktu_selesai}}</td>
          
            <td>{{$nilai_akhir[$k]}}</td>

            @if($nilai_akhir[$k] >= $ujian->kkm)
            <td>Lulus</td>
            @elseif($nilai_akhir[$k] == NULL)
            <td>Nilai Belum Masuk</td>
            @else
            <td>Tidak Lulus</td>
            @endif
            <td>
            <button type="button" class="btn btn-success" 
            data-toggle="modal" data-target="#exampleModal{{$loop->iteration}}">
           Lihat
            </button>
            </td>
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
        @endforelse
    </tbody>

</table>
</div>
<script>
