
<h1 class="mt-4">Rekapitulasi Absensi</h1>
 <ol class="breadcrumb mb-4">
    <li class="breadcrumb-item active">Rekapitulasi Kehadiran Persemester</li>
 </ol>
<div class="p-3 border mb-2">
<form method="post" action="javascript:void(0)" class="form-rekap-absen">
@csrf
    <div class="form-row">
        <div class="col-md-3 mb-2">
            <label for="id_rombel">Kelas</label>
            <select class="form-control" name="id_rombel" id="id_rombel">
                @forelse ($rombels as $rombel)
                <option value="{{$rombel->id_rombel}}">{{$rombel->nama_rombel}}</option>
                @empty
                @endforelse
            </select>
        </div>
        <div class="col-md-2 mb-2">
            <label for="id_subject">Mata Pelajaran</label>
            <select class="form-control" name="id_subject" id="id_subject">
                @forelse ($mapels as $mapel)
                <option value="{{$mapel->id_subject}}">{{$mapel->subject_name}}</option>
                @empty
                @endforelse
            </select>
        </div >
        <div class="col-md-2 mb-2">
            <label for="semester">Semester</label>
            <select class="form-control" name="semester" id="semester">
                <option value="1">Semester 1</option>
                <option value="2">Semester 2</option>
                <option value="3">Semester 3</option>
                <option value="4">Semester 4</option>
                <option value="5">Semester 5</option>
                <option value="6">Semester 6</option>
            </select>
        </div>
        <div class="col-md-2">
            <label for="id_ta">Tahun Ajaran</label>
            <select class="form-control" name="id_ta" id="id_ta">
                @forelse ($tas as $ta)
                <option value="{{$ta->id_ta}}">{{$ta->nama_ta}}</option>
                @empty
                @endforelse
            </select>
        </div>
        <div class="col-md-1 mt-md-2 mt-sm-3">
            <br>
            <button type="submit" class="cari-rekap-absen form-control btn-success">Cari</button>
          
        </div>
        <div class="col-md-1 mt-md-2 mt-sm-3">
            <br>
            
            <button type="submit" class="jadwal form-control btn-success">Jadwal</button>
        </div>
    </div>
</form>
</div>
<div class="border p-3">
    <div class="hasil-absensi"></div>
</div>


<script type="text/javascript">
	$(document).ready(function(){
		$(".cari-rekap-absen").click(function(){
          $(this).text("Mencari ...")
            $.ajaxSetup({
              headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
            });
            $.ajax({
				type: 'POST',
				url: "{{route('cari-rekap-absen')}}",
				data: $('.form-rekap-absen').serialize(),
				success: function(data) {
                 
                   $('.hasil-absensi').html(data);
                   $(".cari-rekap-absen").text("Cari");

                   
                   
                },
                error: function (jqXHR, exception) {
                      
                }
			});
			
			
			});
		});
	
  </script>

  <script>
     $(".jadwal").click(function(){
         
                            $(".tampilkan-menu-jadwal").show();
                            $(".tampilkan-jadwal").show();
                            $(".tampilkan-edit-absen").hide();
                            $("#form-edit-absen").hide();
                            $(".tampilkan-rekap-absen").hide();
                        
                         });
  </script>