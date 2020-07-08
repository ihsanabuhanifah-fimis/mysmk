   
<div>
<h1 class="mt-4">Rekapitulasi Nilai Praktek</h1>
    <ol class="breadcrumb mb-4">
        <li class="breadcrumb-item active">Hasil Ujian Praktek</li>
   </ol>

</div>
<div class="d-flex justify-content-md-end d-flex justify-content-sm-start mb-3">
    <button  class="btn btn-success persen " >Bobot Penilaian</button>
    <button  class="btn btn-success rekapnilai ml-2 " >Rekap Nilai Teori</button>
    </div>
    </div>
    <div class="border p-2 pl-4">
    <form method="post" class="form-rekap-nilai-praktek"  action="javascript:void(0)">
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

    <button class="btn mt-lg-4 mt-md-4 btn-success temukan-nilai-praktek"  type="submit">submit</button>
    
    </div>
    </div>
    
    </form>
  </div>
    <div class="keterangan2 mt-3"></div>
    <div class=" mt-3 rekap-nilai-praktek"></div>

    <script>
    $(document).ready(function(){
		$(".temukan-nilai-praktek").click(function(){
            $(this).text("Mencari ...")
            $(".keterangan2").removeClass("alert alert-success");
            $(".keterangan2").removeClass("alert alert-danger");
            $(".keterangan2").empty();
           
            $.ajaxSetup({
              headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
            });
            $.ajax({
				type: 'POST',
				url: "/guru/rekapnilaipraktek",
				data: $('.form-rekap-nilai-praktek').serialize(),
                success: function(data) {
          
           $(".rekap-nilai-praktek").html(data);
           $(".temukan-nilai-praktek").text("submit");
           $(".keterangan2").addClass("alert alert-success");
           $(".keterangan2").text("Rekap Nilai Ditemukan");
         
         
         
   
           setTimeout(function(){
             $(".keterangan2").removeClass("alert alert-success");
           $(".keterangan2").empty();
               },3000);
                         
          
       },
       error: function (jqXHR, exception) {
        $(".rekap-nilai-praktek").empty();
         $(".temukan-nilai-praktek").text("submit");
         $(".keterangan2").addClass("alert alert-danger");
         $(".keterangan2").text("Rekap Nilai Teori Tidak ditemukan");

       setTimeout(function(){
        $(".keterangan2").removeClass("alert alert-danger");
         $(".keterangan2").empty();

           },3000);
       }
   });
			
			
			});
        });
    </script>
    <script>
$(document).ready(function(){
    $(".persen").click(function(){
      $(".rekapnilaipraktek2").hide();
       $(".mapel-saya").show(); 
       $(".mapel-saya").load("/guru/mapel");  
      
        
      
    });

    });

    $(document).ready(function(){
    $(".rekapnilai").click(function(){
       $(".mapel-saya").hide(); 
        $(".rekapnilaipraktek2").hide();
        $(".rekapnilaiteori").show();
        $(".rekapnilaiteori").load("guru/rekapnilai"); 
      
    });

    });
    </script>