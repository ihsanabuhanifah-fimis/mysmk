
<script>
    $(document).ready( function () {
        $('#myTableJurnal-Guru').DataTable();
    } );
</script>

<table id="myTableJurnal-Guru" class="table table-responsive-sm table-border table-condensed ">
    <thead class="border bg-success ">
      <tr>
            <th class="text-center">No</th>
            <th>Hari</th>
            <th class="text-center">Tanggal</th>
            <th class="text-center">Jam Mulai</th>
            <th class="text-center">Jam Selesai</th>
            <th>Kegiatan</th>
            <th class="text-center">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($jurnals as $jurnal)
            <tr>
                <td class="text-center">{{$loop->iteration}}</td>
                <td>
                    @if($jurnal->hari == 1)
                    <p>Senin</p>
                    @elseif($jurnal->hari ==2)
                    <p>Selasa</p>
                    @elseif($jurnal->hari ==3)
                    <p>Rabu</p>
                    @elseif($jurnal->hari ==4)
                    <p>Kamis</p>
                    @elseif($jurnal->hari ==5)
                    <p>Jumat</p>
                    @elseif($jurnal->hari ==6)
                    <p>Sabtu</p>
                    @elseif($jurnal->hari =7)
                    <p>Minggu</p>
                    @endif
                </td>
                <td class="text-center">{{$jurnal->tanggal}}</td>
                <td class="text-center">{{$jurnal->waktu_mulai}}</td>
                <td class="text-center">{{$jurnal->waktu_selesai}}</td>
                <td>{{$jurnal->kegiatan}}</td>
                <td>
               
                <button id="{{$jurnal->id}}" class="btn btn-success text-center edit-jurnal-guru">Edit/Hapus</button>
                </td>
               
            </tr>

            @empty
            @endforelse
        </tbody>
</table>

<!-- Modal -->
<div class="modal fade" id="Edit_jurnal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h5 class="modal-title " id="exampleModalLabel">Jurnal Harian Guru</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" class="form-edit-jurnal" action="javascript:void(0)">
        @csrf
        {{method_field('PUT')}}
       <div class="edit-jurnal-guru-"></div>
      </div>
      <div class="p-4">
      <div class="ket-jurnal-guru"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
        <button type="button" class="btn btn-primary edit-jurnal-guru-ini">Edit</button>
      </div>
    </div>
  </div>
  
</div>
<script>
  
$(document).ready(function(){
  $(".edit-jurnal-guru").click(function(){
    var id = $(this).attr("id");
    $("#Edit_jurnal").modal();
    $.ajax({
          url:"/guru/jurnal-guru/cari/"+id,
          beforeSend:function(){
        //   $('#hapus-materi').text("Menghapus ...");
          },
            success:function(data)
          {
            
            $(".edit-jurnal-guru-").html(data);
            // $('#hapus-materi').text("Hapus");
            // $("#myModal3").modal('toggle');
            // $(".tampilkanmateri").load("guru/tampilkanmateri"); 
          }
         });
 
  });
  
});
</script>

