<script>
    $(document).ready( function () {
        $('#myTableBankSoal').DataTable();
    } );
    </script>
<style>
.table-bank,.btn{
      font-size:12px;
    }

</style>

<h2 class="mt-4">Daftar Bank Soal</h2>
 <ol class="breadcrumb mb-4">
    <li class="breadcrumb-item active">Ini adalah daftar bank soal yang telah dibuat</li>
 </ol>

 <div class="d-flex justify-content-md-end d-flex justify-content-sm-start mb-3 ">
 <button class="btn btn-success" data-toggle="modal" data-target="#banksoal" >Buat Bank Soal</button>
 <button class="btn btn-success ml-2 bank-soal-lain" > Bank Soal Lain</button>
 </div>
 <div class="p-md-4 border">
 
    <table id="myTableBankSoal" class="table datatable table-bordered table-bank table-responsive-sm ">
        <thead class="bg-success" >
           <tr>
               <th class="text-center">No</th>
               <th>Mata Pelajaran</th>
               <th>Bab</th>
               <th>Materi</th>
               <th class="text-center">Tipe Ujian</th>
               <th class="text-center">Soal</th>
               <th class="text-center" >Action</th>
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
            <td class="text-center"><button class="btn btn-success" href="{{route('buatsoalpraktek',['id'=>$banksoal->id])}}">Buat Soal</button></td>
            @else
            <td class="text-center"><button class="btn btn-success" href="{{route('buatsoal',['id'=>$banksoal->id])}}">Buat Soal</button></td>
            @endif
            <td class="text-center"><button class="btn btn-danger deletebank" id="{{$banksoal->id}}" >Hapus</button></td>
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
    </div>

    <div class="modal fade" id="myModal2" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title " id="staticBackdropLabel">Konfirmasi</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <h6 >Apakah Ustadz yakin akan menghapusnya?</h6>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
        <button type="button" id="hapus" class="btn btn-danger">Hapus</button>
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
          url:"/guru/hapusbanksoal/"+id,
          beforeSend:function(){
          $('#hapus').text("Manghapus ...");
          },
            success:function(data)
          {
            $("#myModal2").modal('toggle');
            
            $(".bank-soal-saya").load("guru/banksoal");
          
      
            
             
             
              
            }
         });
    });

 
});
$(document).ready(function(){
    $(".bank-soal-lain").click(function(){
      $(".bank-soal-saya").hide(); 
        $(".bank-soal-lain").load("guru/banksoallain");
    
        $(".bank-soal-lain").show();   
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