<script>
    $(document).ready( function () {
        $('#myPengumuman').DataTable();
    } );
</script>
<div class="p-4  mt-3 border">
    <table id="myPengumuman" class="table table-borderless table-striped">
        <thead class="bg-success text-center">
            <tr>
                <th>No</th>
                <th>Tanggal</th>
                <th>Mata Pelajaran</th>
                <th>Preview</th>
            </tr>
        </thead>
        <tbody class="text-center">
            @forelse($daftars as $daftar)
            <tr>
                <td>{{$loop->iteration}}</td>
                <td>{{$daftar->tanggal}}</td>
                <td>{{$daftar->subject_name}}</td>
                <td><button id="{{$daftar->id}}" class="edit-pengumuman btn btn-success">Edit</button></td>
            </tr>

            @empty
            @endforelse
        </tbody>
    </table>
</div>
<div class="modal fade" id="MyPeng" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit/Hapus Pengumuman</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <div class="edit-pengumuman-ini"></div>
      </div>
    
    </div>
  </div>
</div>
<script>
$(document).ready(function(){
    var id
  $(".edit-pengumuman").on('click',function(){
    id = $(this).attr('id');
   
 
    $.ajax({
          url:"/edit/pengumuman/"+id,
          success:function(data){
            $(".edit-pengumuman-ini").html(data);
            $("#MyPeng").modal();
          }
    });
  });
});

</script>
<!-- Modal -->
