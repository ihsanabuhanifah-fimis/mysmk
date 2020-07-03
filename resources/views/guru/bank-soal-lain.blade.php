
<style>
.table-bank,.btn{
      font-size:12px;
    }

</style>
<h2 class="mt-4">Daftar Bank Soal Lain</h2>
 <ol class="breadcrumb mb-4">
    <li class="breadcrumb-item active">Ini adalah daftar bank milik Ustadz lain yang dapat di salin, apabila telah mendapatkan izin</li>
 </ol>
 <div class="d-flex justify-content-md-end d-flex justify-content-sm-start mb-3 ">

 <button class="btn btn-success ml-2 bank-soal-saya" > My Bank Soal</button>
 </div>
 <div class="p-md-4 border">
    <table class="table datatable table-bordered table-bank table-responsive-sm">
        <thead class="bg-success">
           <tr>
               <th class="text-center">No</th>
               <th>Mata Pelajaran</th>
               <th>Bab</th>
               <th>Materi</th>
               <th class="text-center">Action</th>
               <th class="text-center">Status</th>
           </tr>
        </thead>
        <tbody>
        
        @forelse($banksoals2 as $banksoal2)
        <tr>
            <td class="text-center">{{$loop->iteration}}</td>
            <td>{{$banksoal2->subject_name}}</td>
            <td>{{$banksoal2->nama_bab}}</td>
            <td>{{$banksoal2->materi}}</td>
            <td class="text-center"><a data-toggle="modal" data-target="#ModalSalin" class="btn text-white btn-warning">Salin</a></td>
            @if($banksoal2->status == 1)
            <td class="text-center"><p class="btn-success btn">Lock</p></td>
            @else
            <td class="text-center"><p class="btn-danger btn">Unlock</p></td>
            @endif
            
        </tr>
        @empty
        <td colspan="100"><h6 class="alert alert-danger text-center">Tidak Ada BANK soal yang dapat di salin</h6></td>
        @endforelse
        </tbody>
    </table>
    </div>

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


<script>
  $(document).ready(function(){
    $(".bank-soal-saya").click(function(){
      $(".bank-soal-lain").hide();  
      $(".bank-soal-saya").load("guru/banksoal");
        $(".banksoal-soal-saya").show();
       
    });
  });
</script>