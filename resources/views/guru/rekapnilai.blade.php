<div>
<h4 class="text-center mt-2">Rekapitulasi Nilai Teori</h4>

</div>
    <form method="post" class="form-rekap-nilai-teori"  action="javascript:void(0)">
    <div class="form-row">
    @csrf
    <div class="col">
    <label for="id_subject">Mata Pelajaran</label>
    <select class="form-control" name="id_subject" id="id_subject">
        @forelse ($subjects as $subject)
        <option value="{{$subject->id_subject}}">{{$subject->subject_name}}</option>
        @empty
        @endforelse
       
    </select>
    </div>

    <div class="col">
    <label for="id_rombel"> Kelas   </label>
    <select class="form-control" name="id_rombel" id="id_rombel">
        @forelse ($rombels as $rombel)
        <option value="{{$rombel->id_rombel}}">{{$rombel->nama_rombel}}</option>
        @empty
        @endforelse
    </select>
    </div>
    <div class="col">
    <label for="id_ta"> Tahun Ajaran </label>
    <select class="form-control" name="id_ta" id="id_ta">
         @forelse ($tas as $ta)
        <option value="{{$ta->id_ta}}">{{$ta->nama_ta}}</option>
        @empty
        @endforelse
    </select>
    </div>
    <div class="col">
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
  <div class="col">
  <label for="">dddd</label>
  <br>
    <button class="btn btn-success temukan-nilai-teori"  type="submit">submit</button>
    </div>
    </div>
    
    </form>
    

    <script>
    $(document).ready(function(){
		$(".temukan-nilai-teori").click(function(){
           
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
                    // $(".noticeujian").text(data);
                    // $("#tambah-ujian").text("Save");
                    // $(".tampilkanujian").load("guru/tampilkanujian");   
                    // setTimeout(function(){
                    //     $(".noticeujian").removeClass("alert alert-success");
                    //     $(".noticeujian").empty();
                    //     },5000);
                    //     document.getElementById("form-ujian").reset();               
                   
                },
                // error: function (jqXHR, exception) {
                // $(".noticeujian").text("Penilaian tidak berhasil ditambahkan");
                // $(".noticeujian").addClass("alert alert-danger");
                // $("#tambah-ujian").text("Simpan");
                // setTimeout(function(){
                //     $(".noticeujian").removeClass("alert alert-danger");
                //     $(".noticeujian").empty();
                //     },3000);
                // }
			});
			
			
			});
        });
    </script>
    
    <div class=" mt-3 rekap-nilai-teori"></div>