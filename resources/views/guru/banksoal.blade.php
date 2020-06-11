<script src="/js/jquery-3.3.1.min.js"></script> 
<style>
.table-bank,.btn{
      font-size:12px;
    }

</style>
<h6 class="text-center text-black-50">Bank Soal</h6>
    <table class="table datatable table-bordered table-bank table-responsive-sm ">
        <thead class="bg-info" >
           <tr>
               <th class="text-center">No</th>
               <th>Mata Pelajaran</th>
               <th>Bab</th>
               <th>Materi</th>
               <th class="text-center">Tipe Ujian</th>
               <th class="text-center">Soal</th>
               <th class="text-center" colspan="2">Action</th>
               <th class="text-center">Status</th>
           </tr>
        </thead>
        <tbody>
        @forelse($banksoals as $banksoal)
        <tr>
            <td class="text-center">{{$loop->iteration}}</td>
            <td>{{$banksoal->subject_name}}</td>
            <td>{{$banksoal->nama_bab}}</td>
            <td>{{$banksoal->materi}}</td>
            <td class="text-center">{{$banksoal->nama_tipe}}</td>
            @if($banksoal->id_tipe == 1)
            <td class="text-center"><a class="btn btn-outline-success" href="{{route('buatsoalpraktek',['id'=>$banksoal->id])}}">Buat Soal</a></td>
            @else
            <td class="text-center"><a class="btn btn-outline-success" href="{{route('buatsoal',['id'=>$banksoal->id])}}">Buat Soal</a></td>
            @endif
            <td class="text-center"><a class="btn btn-outline-danger deletebank" id="{{$banksoal->id}}" >Hapus</a></td>
            <td class="text-center"><a class="btn btn-outline-warning">Salin</a></td>
            @if($banksoal->status == 1)
            <td class="text-center"><p class="btn-success btn">Lock</p></td>
            @else
            <td class="text-center"><p class="btn-danger btn">Unlock</p></td>
            @endif
            
        </tr>
        @empty
        <td colspan="100"><h6 class="alert alert-danger text-center">Ustadz saat ini tidak memiliki BANK soal</h6></td>
        @endforelse
        
        </tbody>
    </table>


    <div class="modal fade" id="myModal2" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
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
        <button type="button" id="hapus" class="btn btn-danger">Bismillah</button>
      </div>
    </div>
  </div>
</div>


<script src="/js/popper.min.js"></script>
<script src="/js/bootstrap.min.js"></script>
<script>
$(document).ready(function(){
    var id
  $(".deletebank").on('click',function(){
    
    id = $(this).attr('id');
    $("#myModal2").modal();
  });
  $('#hapus').click(function(){
      $.ajax({
          url:"/hapusbanksoal/"+id,
          beforeSend:function(){
          $('#hapus').text("delete");
          },
            success:function(data)
          {
            
            setTimeout(function(){
                 $(".banksoal").load("banksoal");
                

              },3000);
             
             
              
            }
         });
    });

 
});
</script>






<!-- Modal -->
<div class="modal fade" id="ModalSalin" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="salin-soal"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>