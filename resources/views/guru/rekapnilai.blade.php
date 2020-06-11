<script src="{{ asset('js/app.js') }}"></script>
<div>
<h1 class="mt-4">Rekapitulasi Nilai Teori</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Hasil Ujian Teori</li>
   </ol>

</div>
    <form method="post" class="form-rekap-nilai-teori"  action="javascript:void(0)">
    <div class="form-row">
    @csrf
    <div class="col-lg-2 col-md-2 col-sm-12 mb-2">
    <label for="id_subject">Mata Pelajaran</label>
    <select class="form-control" name="id_subject" id="id_subject">
        @forelse ($subjects as $subject)
        <option value="{{$subject->id_subject}}">{{$subject->subject_name}}</option>
        @empty
        @endforelse
       
    </select>
    </div>

    <div class="col-lg-4 col-md-4 col-sm-12 mb-2">
    <label for="id_rombel"> Kelas   </label>
    <select class="form-control" name="id_rombel" id="id_rombel">
        @forelse ($rombels as $rombel)
        <option value="{{$rombel->id_rombel}}">{{$rombel->nama_rombel}}</option>
        @empty
        @endforelse
    </select>
    </div>
    <div class="col-lg-2 col-md-2 col-sm-12 mb-2">
    <label for="id_ta"> Tahun Ajaran </label>
    <select class="form-control" name="id_ta" id="id_ta">
         @forelse ($tas as $ta)
        <option value="{{$ta->id_ta}}">{{$ta->nama_ta}}</option>
        @empty
        @endforelse
    </select>
    </div>
    <div class="col-lg-2 col-md-2 col-sm-12 mb-3">
  <label for="semester"> Semester</label>
 
    <select class="form-control" name="semester" id="semester">
   <option value="1">Semester 1</option>
   <option value="2">Semester 2</option>
   <option value="3">Semester 3</option>
   <option value="4">Semester 4</option>
   <option value="5">Semester 5</option>
   <option value="6">Semester 6</option>
  </select>
  </div>
  <div class="col-lg-1 col-md-1 col-sm-12 mt-sm-4 mt-lg-2 mt-md-2 ">

    <button class="btn mt-lg-4 mt-md-4 btn-success temukan-nilai-teori"  type="submit">submit</button>
    </div>
    </div>
    
    </form>
    

    <script>
    $(document).ready(function(){
		$(".temukan-nilai-teori").click(function(){
      $(this).text("Mencari ...")
      $(".keterangan").removeClass("alert alert-success");
      $(".keterangan").removeClass("alert alert-danger");
      $(".keterangan").empty();
           
            $.ajaxSetup({
              headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
            });
            $.ajax({
				type: 'POST',
				url: "/guru/rekapnilai",
				data: $('.form-rekap-nilai-teori').serialize(),
				success: function(data) {
          
                   $(".rekap-nilai-teori").html(data);
                    $(".temukan-nilai-teori").text("submit");
                    $(".keterangan").addClass("alert alert-success");
                    $(".keterangan").text("Rekap Nilai Ditemukan");
                  
                  
                  
            
                    setTimeout(function(){
                      $(".keterangan").removeClass("alert alert-success");
                    $(".keterangan").empty();
                        },3000);
                                  
                   
                },
                error: function (jqXHR, exception) {
                  $(".rekap-nilai-teori").empty();
                  $(".temukan-nilai-teori").text("submit");
                  $(".keterangan").addClass("alert alert-danger");
                  $(".keterangan").text("Rekap Nilai Teori Tidak ditemukan");

                setTimeout(function(){
                  $(".keterangan").removeClass("alert alert-danger");
                  $(".keterangan").empty();

                   
                    },3000);
                }
			});
			
			
			});
        });
    </script>
    <div class="keterangan"></div>
    <div class=" mt-3 rekap-nilai-teori"></div>