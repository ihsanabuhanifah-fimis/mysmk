<div class="mt-4">
    <div class="d-flex justify-content-md-end">
        <button class="btn btn-success jadwal">Tambahkan Jadwal</button>
    </div>
    <div class="p-md-4 border mt-3">
<div class="tampilkan-jadwal-siswa"></div>
    </div>

</div>

<script>
    $(document).ready(function(){
    $('.tampilkan-jadwal-siswa').load('/admin/tampilkan/jadwal');
    $(".jadwal").click(function(){
    
       $('#jadwal').modal();
       

    });
  });
</script>






<!-- Modal -->
<div class="modal fade" id="jadwal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
      <div class="modal-header bg-success">
        <h5 class="modal-title" id="exampleModalLabel">Form Input Jadwal</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="javascript:void(0)" id="form-jadwal-kelas" method="post">
            @csrf
            <div>
              
        <div class="border p-2 bg-light">
        <label for="days"><b>Hari</b></label>
             <select class="form-control" name="days" id="days">
                 <option selected value="">-</option>
             <option value="Monday">Monday</option>
                              <option value="Tuesday">Tuesday</option>
                              <option value="Wednesday">Wednesday</option>
                              <option value="Thursday">Thursday</option>
                              <option value="Friday">Friday</option>
                              <option value="Saturday">Saturday</option>
                              <option value="Sunday">Sunday</option>
             </select>
             <label for="id_rombel"><b>Kelas</b></label>
             <select class="form-control" name="id_rombel" id="id_rombel">
             <option selected value="">-</option>
                 @forelse($rombels as $rombel)
                 <option value="{{$rombel->id_rombel}}">{{$rombel->nama_rombel}}</option>
                 @empty
                 @endforelse
             </select>
             
                     <label for="semester"><b>Semester</b></label>
                     <br>
                     <select class="form-control" name="semester" id="semester">
                     <option selected value="">-</option>
                        <option  value="1">Semester 1</option>
                        <option value="2">Semester 2</option>
                        <option value="3">Semester 3</option>
                        <option value="4">Semester 4</option>
                        <option value="5">Semester 5</option>
                        <option value="6">Semester 6</option>
                     </select>
                     
                     <label for="id_ta"><b>Tahun Ajaran</b></label>
                     <br>
                     <select class="form-control" name="id_ta" id="id_ta">
                         @forelse($tas as $ta)
                            <option value="{{$ta->id_ta}}">{{$ta->nama_ta}}</option>
                         @empty
                         @endforelse
                     </select>
                 
                
             </div>
             </div>
             <div class="mb-2">
             <div class="form-row mt-3 hapus-input-jadwal">
                
                 
                 <div class="col-md-3">
                       <label for="id_subject"><b>Mata Pelajaran</b></label>
                     <select class="form-control" name="id_subject[]" id="id_subject">
                     <option selected value="">-</option>
                         @forelse($subjects as $subject)
                            <option value="{{$subject->id_subject}}">{{$subject->subject_name}}</option>
                         @empty
                         @endforelse
                     </select>
                 </div>
                
                 <div class="col-md-3">
                     <label for="id_cikgu"><b>Nama Guru</b></label>
                     <br>
                     <select class="form-control" name="id_cikgu[]" id="id_cikgu">
                     <option selected value="">-</option>
                         @forelse($cikgus as $cikgu)
                            <option value="{{$cikgu->id_cikgu}}">{{$cikgu->cikgu_name}}</option>
                         @empty
                         @endforelse
                     </select>
                 </div>
                 <div class="col-md-2">
                     <label for="waktu"><b>Jam Masuk</b></label>
                     <input class="form-control" type="time" name="waktu[]">
                 </div>
                
                 <div class="col-md-1">
                     <label for="jam_ke"><b>Jam Ke</b></label>
                     <br>
                     <select class="form-control" name="jam_ke[]" id="jam_ke">
                        <option selected value="">-</option>
                        <option  value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option  value="4">4</option>
                        <option  value="5">5</option>
                        <option  value="6">6</option>
                        <option  value="7">7</option>
                     </select>
                 </div>
                 <div class="col-md-1">
                     <label for="durasi"><b>Durasi</b></label>
                     <br>
                     <select class="form-control" name="durasi[]" id="durasi">
                        <option selected value="">-</option>
                        <option  value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option  value="4">4</option>
                        <option  value="5">5</option>
                        <option  value="6">6</option>
                        <option  value="7">7</option>
                     </select>
                 </div>
                 <div class="col-md-1">
                     <label for="mulai"><b>Mulai</b></label>
                     <br>
                     <select class="form-control" name="mulai[]" id="mulai">
                     <option selected value="">-</option>
                        <option  value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option  value="4">4</option>
                        <option  value="5">5</option>
                        <option  value="6">6</option>
                        <option  value="7">7</option>
                     </select>
                 </div>
                 <div class="col-md-1 mt-1 ">
                        <br>  
                     <button type="button" class="btn btn-danger hapus-input">Hapus</button>
                 </div>

             </div>
             <div class="input-jadwal"></div>
      
      </div>
      </div>
      <div class="ket-simpan-jadwal text-center p-3"></div>
      <div class="modal-footer ">
        <button type="button" class="btn btn-success tambah-input-jadwal">Tambah</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
        <button type="button" class="simpan-jadwal-kelas btn btn-primary">Simpan</button>
      </div>
      </form>
    </div>
  </div>
</div>

<script>
     $(document).ready(function(){
        var j=0;
    $(".tambah-input-jadwal").click(function(){
      
        j++;
  $(".input-jadwal").append('<div class="form-row mt-3 hapus-input-jadwal'+j+'"><div class="col-md-3"><label for="id_subject"><b>Mata Pelajaran</b></label><select class="form-control" name="id_subject[]" id="id_subject"> <option selected value="">-</option> @forelse($subjects as $subject)<option value="{{$subject->id_subject}}">{{$subject->subject_name}}</option> @empty @endforelse </select></div><div class="col-md-3"> <label for="id_cikgu"><b>Nama Guru</b></label><br><select class="form-control" name="id_cikgu[]" id="id_cikgu"> <option selected value="">-</option> @forelse($cikgus as $cikgu)<option value="{{$cikgu->id_cikgu}}">{{$cikgu->cikgu_name}}</option> @empty @endforelse</select></div><div class="col-md-2"><label for="waktu"><b>Jam Masuk</b></label><input class="form-control" type="time" name="waktu[]"></div><div class="col-md-1"><label for="jam_ke"><b>Jam Ke</b></label><br><select class="form-control" name="jam_ke[]" id="jam_ke"><option selected value="">-</option><option  value="1">1</option><option value="2">2</option><option value="3">3</option><option  value="4">4</option><option  value="5">5</option><option  value="6">6</option><option  value="7">7</option></select></div><div class="col-md-1"><label for="durasi"><b>Durasi</b></label><br> <select class="form-control" name="durasi[]" id="durasi"><option selected value="">-</option><option  value="1">1</option><option value="2">2</option><option value="3">3</option> <option  value="4">4</option><option  value="5">5</option><option  value="6">6</option><option  value="7">7</option></select></div><div class="col-md-1"><label for="mulai"><b>Mulai</b></label><br><select class="form-control" name="mulai[]" id="mulai"><option selected value="">-</option><option  value="1">1</option><option value="2">2</option><option value="3">3</option><option  value="4">4</option><option  value="5">5</option><option  value="6">6</option><option  value="7">7</option></select></div><div class="col-md-1 mt-1 "><br>  <button type="button" id="'+j+'" class="btn btn-danger hapus-input">Hapus</button> </div></div>');
$(document).on('click','.hapus-input',function(){
    var button_id=$(this).attr("id");
    $(".hapus-input-jadwal"+button_id+"").remove();
    
        });
    });
});
</script>

<script type="text/javascript">
	$(document).ready(function(){
       
		$(".simpan-jadwal-kelas").click(function(){
            $(this).text('Menyimpan jadwal ...');
            $('.ket-simpan-jadwal').removeClass('alert alert-success');
            $('.ket-simpan-jadwal').removeClass('alert alert-danger');
            $('.ket-simpan-jadwal').empty();

            
            $.ajaxSetup({
              headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
            });
            $.ajax({
				type: 'POST',
				url: "{{route('simpan.jadwal.kelas')}}",
				data: $('#form-jadwal-kelas').serialize(),
				success: function(data) {
                    $(".simpan-jadwal-kelas").text('Simpan');
                   $('.ket-simpan-jadwal').addClass('alert alert-success');
                   $('.ket-simpan-jadwal').text(data);
                   document.getElementById("form-jadwal-kelas").reset(); 

                  
                   setTimeout(function(){
                    $('.tampilkan-jadwal-siswa').load('/admin/tampilkan/jadwal');
                    $('.ket-simpan-jadwal').removeClass('alert alert-success');
                    $('.ket-simpan-jadwal').removeClass('alert alert-danger');
                    $('.ket-simpan-jadwal').empty();
                   }, 1000);
                   
                },
                error: function (jqXHR, exception) {
                    $(".simpan-jadwal-kelas").text('Simpan');
                   $('.ket-simpan-jadwal').addClass('alert alert-danger');
                   $('.ket-simpan-jadwal').text('jadwal tidak tersimpan');  
                   setTimeout(function(){
                    $('.ket-simpan-jadwal').removeClass('alert alert-success');
                    $('.ket-simpan-jadwal').removeClass('alert alert-danger');
                    $('.ket-simpan-jadwal').empty();
                   }, 1000);
                }
			});
			
			
			});
		});
	
  </script>



</script> 