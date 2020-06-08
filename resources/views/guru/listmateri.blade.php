
<h4 class="text-center">List Materi</h4>

   <table class="table datatable myTable table-bordered" >
        <thead >
            <th class="text-center">No</th>
            <th>Mata Pelajaran</>
            <th>Bab</th>
            <th>Materi</th>
            <th class="text-center">Youtube</th>
            <th class="text-center" colspan="2">Action</th>
            <th class="text-center">Update</th>
            
        </thead>
        <tbody>
        @forelse ($materis as $materi)
        <tr>
        <td class="text-center">{{$loop->iteration}}</td>
        <td>{{$materi->subject_name}}</td>
        <td>{{$materi->nama_bab}}</td>
        <td>{{$materi->submateri}}</td>
        <td class="text-center">{{$materi->youtube}}</td>
        <td class="text-center"><a class="btn btn-success text-center" href="{{route('editmateri',['materi'=>$materi->id])}}">Edit</a></td>
        <form action="">
        <td class="text-center"><a id={{$materi->id}} class="btn btn-danger text-center class delete-materi" >Hapus</a></td>
        </form>
        <td >{{$materi->waktu}}</td>
        </tr>
            
        @empty
        @endforelse   
        </tbody>
    </table>

    <div class="modal fade" id="myModal3" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-danger" id="staticBackdropLabel">Konfirmasi</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <h6 class="text-danger">Apakah Ustadz yakin akan menghapusnya?</h6>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
        <button type="button" id="hapus-materi" class="btn btn-danger">Bismillah</button>
      </div>
    </div>
  </div>
</div>

<script src="/js/popper.min.js"></script>
<script src="/js/bootstrap.min.js"></script>
<script>
$(document).ready(function(){
    var id
  $(".delete-materi").on('click',function(){
    
    id = $(this).attr('id');
    $("#myModal3").modal();
  });
  $('#hapus-materi').click(function(){
      $.ajax({
          url:"/guru/hapus-materi/"+id,
          beforeSend:function(){
          $('#hapus-materi').text("deleting...");
          },
            success:function(data)
          {
            
            setTimeout(function(){
                $("#myModal3").modal();
                

              },1000);
              $('#hapus-materi').text("Alhamdulah terhapus");
            //   $(".tampilkanmateri").load("tampilkanmateri");
              
            }
         });
    });

 
});
</script>