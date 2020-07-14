<div class="col-md-4">
            <label class="font-weight-bold" for="hari">Hari</label>
            <select required class="form-control" name="hari" id="hari">
            <option class="font-weight-bold " selected value="{{$jurnal->hari}}">{{$jurnal->hari}}
                 <option value="Monday">Monday</option>
                <option value="Tuesday">Tuesday</option>
                <option value="Wednesday">Wednesday</option>
                <option value="Thursday">Thursday</option>
                <option value="Friday">Friday</option>
                <option value="Saturday">Saturday</option>
                <option value="Sunday">Sunday</option>
            </select>
        </div>
        <input type="hidden" name="id" value="{{$jurnal->id}}">
        <div class="col-md-4">
            <label for="tanggal">Tanggal</label>
            <input required class="form-control" type="date" name="tanggal" value="{{$jurnal->tanggal}}">
        </div>
        @forelse($kegiatans as $kegiatan)
     <div class="form-row mt-3 ml-1 hapus{{$loop->iteration}}">
       <div class="col-md-2 mb-2">
            <label class="font-weight-bold" for="waktu_mulai">Waktu Mulai</label>
            <input required type="time" value="{{$kegiatan->m}}" class="form-control waktu_mulai" name="waktu_mulai[]">
        </div>
        <div class="col-md-2 mb-2">
        <label class="font-weight-bold" for="waktu_selesai">Waktu Selesai</label>
            <input required type="time" value="{{$kegiatan->s}}" class="form-control" name="waktu_selesai[]">
        </div>
        <div class="col-md-6 mb-1">
        <label class="font-weight-bold" for="keterangan">Keterangan</label>
            <textarea required class="form-control" name="kegiatan[]" id="" cols="30" rows="1">{{$kegiatan->k}}</textarea>
         </div>  
         <div class="col-md-2 mt-1">
            <button type="button" id="{{$loop->iteration}}"  class="btn mt-4 btn-danger hapus"> Hapus</button>
            <button type="button" class="btn btn-success mt-4 tambah-kegiatan"> Tambah</button>
         </div> 
     </div>   
     @empty
     @endforelse  
     
     <div class="tambah-kegiatan-guru"></div>


     <script>
         $(document).ready(function(){
        var j=100;
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

     
<script type="text/javascript">
	$(document).ready(function(){
		$(".edit-jurnal-guru-ini").click(function(){
            $(this).text("Perbaharui ...")
          
            $.ajaxSetup({
              headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
            });
            $.ajax({
				type: 'PUT',
				url: "{{route('edit-jurnal-guru')}}",
				data: $('.form-edit-jurnal').serialize(),
				success: function(data) {
                    $(".edit-jurnal-guru-ini").text("Edit");
                    $("#Edit_jurnal").modal("toggle");
                  
                  setTimeout(function() {
                    $(".rekap-jurnal").load("/guru/rekap-jurnal-guru");
                  }, 1500);

                    
                  
                   
                   
                },
                error: function (jqXHR, exception) {
                         
                }
			});
			
			
			});
		});
	
  </script>
