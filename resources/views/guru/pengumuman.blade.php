<h3 class="mt-4">Pengumuman</h3>
 <ol class="breadcrumb mb-4">
    <li class="breadcrumb-item active">Ini adalah mata pelajaran Ustadz di Tahun Ajaran aktif</li>
 </ol>
 <!-- Button trigger modal -->
<div class="d-flex justify-content-end mt-3">
<button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal">
  Buat Tugas/Pengumuman
</button>
</div>

<div>
    <div class="pengumuman-saya"></div>
</div>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Buat Pengumuman</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
     <form method="post" class="form-pengumuman" action="javascript:void(0)">
         @csrf
         <div>
             <label for="tanggal">Tanggal</label>
             <input type="date" name="tanggal" class="form-control">
         </div>
         <div>
             <label for="id_subject">Mata Pelajaran</label>
         
             <select class="form-control" name="id_subject" id="id_subject">
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
                 @forelse($rombels as $rombel)

                <option value="{{$rombel->id_rombel}}">{{$rombel->nama_rombel}}</option>
                 @empty
                 @endforelse
                 <option value="W">Wali Santri</option>
             </select>
         </div>
         <div class="mt-3">
             <textarea name="umum" class="summernote"></textarea>
         </div>
    
      </div>
      <div class="ket-peng mt-2 ml-2"></div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
        <button type="button" class="btn btn-success simpan-pengumuman">Simpan</button>
         </form>
      </div>
    </div>
  </div>
</div>

<script>
        $(document).ready(function() {
        $('.summernote').summernote();
        
        });     
    </script>

<script type="text/javascript">

	$(document).ready(function(){
        $('.pengumuman-saya').load('/daftar/pengumuman');
		$(".simpan-pengumuman").click(function(){
           $(this).text("Menyimpan ...");
           $('.ket-peng').removeClass('alert alert-success');
                         $('.ket-peng').empty();
            $.ajaxSetup({
              headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
            });
            $.ajax({
				type: 'POST',
				url: "{{route('savepengumuman')}}",
				data: $('.form-pengumuman').serialize(),
				success: function(data) {
                    $(".simpan-pengumuman").text("Simpan");
                   $('.ket-peng').addClass('alert alert-success');
                   $('.ket-peng').text(data);
                   $('.pengumuman-saya').load('/daftar/pengumuman');
                    document.getElementById(".form-pengumuman").reset(); 
                    setTimeout(function(){
                        $('.ket-peng').removeClass('alert alert-success');
                         $('.ket-peng').empty();
                        },3000);
                },
                error: function(jqXHR, exception){
                   
                   
                }
			});
			
			
			});
		});
	
  </script>