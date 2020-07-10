<h3 class="mt-4">Jurnal Harian Guru</h3>
 <ol class="breadcrumb mb-4">
    <li class="breadcrumb-item active">Jurnal Kegiatan Guru / Tendik</li>
 </ol>
<div class="d-flex justify-content-md-end justify-content-sm-start mt-3">
    <button class="btn btn-success tambah-jurnal">Tambah Kegiatan</button>
</div>
<div class="border p-4 mt-3">
    <div class="rekap-jurnal"></div>
</div>
<!-- Modal -->
<div class="modal fade" id="Tambah_Jurnal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h5 class="modal-title " id="exampleModalLabel">Jurnal Harian Guru</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" class="form-simpan-jurnal" action="javascript:void(0)">
        @csrf
       
        <div class="col-md-4">
            <label class="font-weight-bold" for="hari">Hari</label>
            <select required class="form-control" name="hari" id="hari">
            <option class="font-weight-bold " selected value="<?= date('l') ;?>"><?= date('l') ;?>
                 <option value="Monday">Monday</option>
                <option value="Tuesday">Tuesday</option>
                <option value="Wednesday">Wednesday</option>
                <option value="Thursday">Thursday</option>
                <option value="Friday">Friday</option>
                <option value="Saturday">Saturday</option>
                <option value="Sunday">Sunday</option>
            </select>
        </div>
        <div class="col-md-4">
            <label for="tanggal">Tanggal</label>
            <input required class="form-control" type="date" name="tanggal" value="<?= date('Y-m-d') ; ?>">
        </div>
     <div class="form-row mt-3 ml-1">
       <div class="col-md-2 mb-2">
            <input required type="time" class="form-control" name="waktu_mulai[]">
        </div>
        <div class="col-md-2 mb-2">
            <input required type="time" class="form-control" name="waktu_selesai[]">
        </div>
        <div class="col-md-6 mb-1">
            <textarea required class="form-control" name="kegiatan[]" id="" cols="30" rows="1"></textarea>
         </div>  
         <div class="col-md-2 mt-1">
            <button type="button"  class="btn btn-danger"> Hapus</button>
            <button type="button" class="btn btn-success tambah-kegiatan"> Tambah</button>
         </div> 
     </div>     
     
     <div class="tambah-kegiatan-guru"></div>
              


        
      </div>
      <div class="p-4">
      <div class="ket-jurnal-guru"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
        <button type="button" class="btn btn-primary simpan-jurnal">Simpan</button>
      </div>
    </div>
  </div>
  
</div>




<script>
$(document).ready(function(){
    $(".rekap-jurnal").load("/guru/rekap-jurnal-guru");
  $(".tambah-jurnal").click(function(){
    $("#Tambah_Jurnal").modal();
    $(".simpan-jurnal").click(function(){
        $(this).text("Menyimpan ...");
        $(".ket-jurnal-guru").removeClass("alert alert-success");
        $(".ket-jurnal-guru").removeClass("alert alert-danger");
        $(".ket-jurnal-guru").empty();
        $.ajaxSetup({
              headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
            });
            $.ajax({
				type: 'POST',
				url: "{{route('simpan-jurnal-guru')}}",
				data: $('.form-simpan-jurnal').serialize(),
				success: function(data) {
                   $(".ket-jurnal-guru").addClass("alert alert-success");
                   $(".ket-jurnal-guru").text(data);
                   $(".simpan-jurnal").text("Simpan");
                   $(".rekap-jurnal").load("/guru/rekap-jurnal-guru");
                   setTimeout(function(){
                    $(".ket-jurnal-guru").removeClass("alert alert-success");
                    $(".ket-jurnal-guru").empty();
                   }, 3000);

                   
                   
                },
                error: function (jqXHR, exception) {
                    $(".ket-jurnal-guru").addClass("alert alert-danger");
                   $(".ket-jurnal-guru").text("Mohon maaf gagal menyimpan jurnal");
                   $(".simpan-jurnal").text("Simpan");   
                   setTimeout(function(){
                    $(".ket-jurnal-guru").removeClass("alert alert-danger");
                    $(".ket-jurnal-guru").empty();
                   }, 3000);
                }
			});
			
			
			});

    });
  });
 
    $(document).ready(function(){
        var j=0;
    $(".tambah-kegiatan").click(function(){
        j++;
  $(".tambah-kegiatan-guru").append('<div class="form-row mt-3 ml-1 hapus'+j+'"><div class="col-md-2 mb-2"><input required type="time" class="form-control" name="waktu_mulai[]"></div><div required class="col-md-2 mb-2"><input required type="time" class="form-control" name="waktu_selesai[]"></div><div required class="col-md-6 mb-1"><textarea required class="form-control" name="kegiatan[]" id="" cols="30" rows="1"></textarea> </div>  <div class="col-md-2 mt-1"><button type="button" id="'+j+'" class="btn btn-danger hapus"> Hapus</button><button type="button" class="btn btn-success ml-1 tambah-kegiatan"> Tambah</button></div> </div>');
 
});
$(document).on('click','.hapus',function(){
    var button_id=$(this).attr("id");
    $(".hapus"+button_id+"").remove();
    
        });
    });
</script>

