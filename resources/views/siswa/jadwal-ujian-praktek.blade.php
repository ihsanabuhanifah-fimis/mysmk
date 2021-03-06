<h4 class="mt-5 mb-3 text-center"> DAFTAR PENILAIAN PRAKTEK</h4>
                       <ol class="breadcrumb mb-4">
                           <li class="breadcrumb-item active">
                             <div class="text-center"> </div>
                           List penilaian Praktek yang ada di kelas ini
                           </li>
                       </ol>
</h4>
    
    <form method="post" class="form-jadwal-ujian-praktek"  action="javascript:void(0)">
    <div class="form-row">
    @csrf
    <div class="col-sm-4">
    <label for="id_rombel"> Kelas   </label>
    <select class="form-control" name="id_rombel" id="id_rombel">
        @forelse ($rombels as $rombel)
        <option selected value="{{$semester[0]->id_rombel}}">{{$semester[0]->nama_rombel}}</option>
        <option value="{{$rombel->id_rombel}}">{{$rombel->nama_rombel}}</option>
        @empty
        @endforelse
    </select>
    </div>
    <div class="col-sm-2">
    <label for="id_ta"> Tahun Ajaran </label>
    <select class="form-control" name="id_ta" id="id_ta">
         @forelse ($tas as $ta)
        <option value="{{$ta->id_ta}}">{{$ta->nama_ta}}</option>
        @empty
        @endforelse
    </select>
    </div>
    <div class="col-sm-2">
  <label for="semester"> Semester</label>
 
    <select class="form-control" name="semester" id="semester">
    <option selected value="{{$semester[0]->semester}}">Semester {{$semester[0]->semester}}</option>
   <option value="1">Semester 1</option>
   <option value="2">Semester 2</option>
   <option value="3">Semester 3</option>
   <option value="4">Semester 4</option>
   <option value="5">Semester 5</option>
   <option value="6">Semester 6</option>
  </select>
  </div>
  <div class="col">
  
  <br>
    <button class="btn mt-lg-2 mt-md-2 btn-success temukan-jadwal-ujian-praktek"  type="submit">submit</button>
    </div>
    </div>
    
    </form>
    <div class="tampilkan-jadwal-ujian-praktek"></div>
    
    <script>
    $(document).ready(function(){
      $.ajaxSetup({
              headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
            });
            $.ajax({
				type: 'POST',
				url: "/siswa/jadwal-ujian-praktek2",
				data: $('.form-jadwal-ujian-praktek').serialize(),
				success: function(data) {
                    
                    $(".tampilkan-jadwal-ujian-praktek").html(data);
                   
                },
               
			});
		$(".temukan-jadwal-ujian-praktek").click(function(){
           
            $.ajaxSetup({
              headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
            });
            $.ajax({
				type: 'POST',
				url: "/siswa/jadwal-ujian-praktek2",
				data: $('.form-jadwal-ujian-praktek').serialize(),
				success: function(data) {
                    
                    $(".tampilkan-jadwal-ujian-praktek").html(data);
                   
                },
               
			});
			
			
			});
        });
    </script>
