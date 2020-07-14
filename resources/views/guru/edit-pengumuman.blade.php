<form method="post" id="form-pengumuman" action="javascript:void(0)">
         @csrf
         {{method_field('PUT')}}
         <div>
             <label for="tanggal">Tanggal</label>
             <input type="date" value="{{$daftars[0]->tanggal}}" name="tanggal" class="form-control">
         </div>
         <div>
             <label for="id_subject">Mata Pelajaran</label>
         
             <select class="form-control" name="id_subject" id="id_subject">
             <option selected value="{{$daftars[0]->id_subject}}">{{$daftars[0]->subject_name}}</option>   
             @forelse($subjects as $subject)

                <option value="{{$subject->id_subject}}">{{$subject->subject_name}}</option>
                 @empty
                 @endforelse
                 <option value="W">Wali Santri</option>
             </select>
             </div>
             <div>
             <label for="id_rombel">Kelas</label>
             
             <select class="form-control" name="id_rombel" id="id_rombel">
             <option selected value="{{$daftars[0]->id_rombel}}">{{$daftars[0]->nama_rombel}}</option>   
                 @forelse($rombels as $rombel)

                <option value="{{$rombel->id_rombel}}">{{$rombel->nama_rombel}}</option>
                 @empty
                 @endforelse
                 <option value="W">Wali Santri</option>
             </select>
         </div>
         <input type="hidden" name="id" value="{{$daftars[0]->id}}">
         <div class="mt-3">
             <textarea name="umum" class="summernote">{{$daftars[0]->pengumuman}}</textarea>
         </div> 
    
      </div>
      <div class="mt-5 bg-light p-4">
              <label for="hapus">Apakah Ustadz ingin menghapusnya (Pilih Ya jika ingin menghapus)</label>
              <select class="form-control" name="hapus" id="hapus">
                  <option value="">-</option>
                  <option value="1">Ya</option>
                  <option value="2">Batal</option>
              </select>

          </div>
          </form>
<div class="ket-pengumuman text-center"></div>
      <div class="modal-footer">
        
        <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
        <button type="button" class="btn btn-success simpan-pengumuman">Edit</button>
        

         
<script>
        $(document).ready(function() {
        $('.summernote').summernote();
        
        });     
    </script>

    
<script type="text/javascript">
	$(document).ready(function(){
		$(".simpan-pengumuman").click(function(){
        $(this).text("Memperbaharui ...");
        $(".ket-pengumuman").removeClass('alert alert-danger');
        $(".ket-pengumuman").removeClass('alert alert-success');
        $(".ket-pengumuman").empty();
            $.ajaxSetup({
              headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
            });
            $.ajax({
				type: 'PUT',
				url: "{{route('editpengumumansaya')}}",
				data: $('#form-pengumuman').serialize(),
				success: function(data) {
                    
                    $(".simpan-pengumuman").text('Simpan');
                        $(".ket-pengumuman").addClass('alert alert-success');
                        $(".ket-pengumuman").text(data);
                        $("#MyPeng").modal('toggle');

                    setTimeout(function(){
                        $(".ket-pengumuman").removeClass('alert alert-success');
                         $(".ket-pengumuman").empty();
                         $("#menu-pengumuman").load("/pengumuman");  
                    },1000);
                },
                error: function(jqXHR, exception){
                    $(".simpan-pengumuman").text('Simpan');
                        $(".ket-pengumuman").addClass('alert alert-danger');
                        $(".ket-pengumuman").text("Pengumuman tidak berhasil diperharui, Silahkan cek koneksi Internet");
                    setTimeout(function(){
                        $(".ket-pengumuman").removeClass('alert alert-danger');
                         $(".ket-pengumuman").empty();
                    },3000);
                   
                }
			});
			
			
			});
		});
        $(document).ready(function(){
        var i=1;
  $("#hapus").change(function(){
    
    var a = $(this).val();
    if(a==1){
        $('.simpan-pengumuman').removeClass('btn-success');
        $('.simpan-pengumuman').addClass('btn-danger');
        $('.simpan-pengumuman').text("Hapus");


    }else{
        $('.simpan-pengumuman').removeClass('btn-danger');
        $('.simpan-pengumuman').addClass('btn-success');
        $('.simpan-pengumuman').text("Edit");
    }
    });
});
  </script>
  