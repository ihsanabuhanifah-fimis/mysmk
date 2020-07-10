

<script>
    $(document).ready( function () {
        $('#myTableMateri').DataTable();
    } );
</script>

 
<div class="container-sm-fluid">
<h3 class="mt-4">List Materi</h3>

 <ol class="breadcrumb mb-4">
    <li class="breadcrumb-item active">Ini adalah daftar materi yang telah di buat</li>
 </ol>
 <div class="d-flex justify-content-md-end justify-content-sm-start mb-sm-3 ">
   <button  class="btn btn-success " onclick="window.location.href='{{route('materi')}}'">Tambah Materi</button>
   <button  class="btn btn-success bab-saya ml-2 ">My BAB</button>        
   </div>
   <div class="mt-3 p-md-3 p-sm-0 border border ">
   <table id="myTableMateri" class="table table-bordered table-responsive-sm" >
     
   <thead class="bg-success text-center" >
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
        <td class="text-center"><a id="{{$materi->id}}" class="btn text-white btn-danger text-center class delete-materi" >Hapus</a></td>
        </form>
        <td >{{$materi->waktu}}</td>
        </tr>
            
        @empty
        <td colspan="100"><h6 class="alert alert-danger text-center">Ustadz saat ini tidak memiliki materi yang dibuat</h6></td>
        @endforelse   
        </tbody>
    </table>
    </div>
    <div class="modal fade" id="myModal3" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Konfirmasi</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <h6 ">Apakah Ustadz yakin akan menghapusnya?</h6>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
        <button type="button" id="hapus-materi" class="btn btn-danger">Hapus</button>
      </div>
    </div>
  </div>
</div>
</div>
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
          $('#hapus-materi').text("Menghapus ...");
          },
            success:function(data)
          {
            $('#hapus-materi').text("Hapus");
            $("#myModal3").modal('toggle');
            $(".tampilkanmateri").load("guru/tampilkanmateri"); 
          }
         });
    });

  });

  $(document).ready(function(){
   
   
    $(".bab-saya").click(function(){
      $(".tampilkanmateri").hide();
        $(".tampilkanbab").load("guru/tampilkanbab"); 
       
        $(".tampilkanbab").show(); 
    });
  });
</script>