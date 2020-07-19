<style>
.font{
    font-size:12px;
}
</style>


<script>
    $(document).ready( function () {
        $('#myTeori').DataTable();
    } );
    </script>

<div class="mt-3 p-md-4 p-sm-0 border">
<table id="myTeori" class="table table-bordered table-striped mt-2 table-responsive-sm">
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
      
            <th class="text-center">Masuk</th>
            <th class="text-center">History</th>
            
            


            
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
            @if($ujian->tanggal_mulai == 0)

            <td>-</td>
            @else
            <td>{{$ujian->tanggal_mulai}} <br> {{$ujian->waktu_mulai}}</td>
            @endif
            @if($ujian->tanggal_selesai == 0)
            <td>-</td>
            @else
            <td>{{$ujian->tanggal_selesai}} <br> {{$ujian->waktu_selesai}}</td>
            @endif
            <td class="text-center"><a href="{{route('masuk_ujian',['id'=>$ujian->id])}}" class="btn btn-primary kerjakan-soal">Masuk</a></td>
           <td class="text-center"><button id="{{$ujian->id}}" class="btn btn-success history ">History</button></td>
            
        </tr>

        <?php $k++ ; ?>
        @empty
        <td colspan="10" class="alert alert-warning text-center font-weight-bold">Saat ini tidak terdapat ujian untuk kelas ini</td>
        @endforelse
    </tbody>

</table>
</div>

<script>
$(document).ready(function(){
    var id
  $(".history").on('click',function(){
    
    id = $(this).attr('id');
  
    $("#ModalHistory").modal();
  

      $.ajax({
          url:"/siswa/history/"+id,
            success:function(data)
          {
         $(".history-ujian").html(data);
          }
         });
    });

  });

  
</script>

<!-- Modal -->
<div class="modal fade" id="ModalHistory" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
      <div class="text-center">
        <h5 class="modal-title" id="exampleModalLabel">History Penilaian</h5>
        </div>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <div class="history-ujian"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Keluar</button>
     
      </div>
    </div>
  </div>
</div>