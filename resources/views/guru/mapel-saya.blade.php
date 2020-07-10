
<script>
    $(document).ready( function () {
        $('.myTableMapel').DataTable();
    } );
</script>
<div class="container-sm-fluid mt-4">

<h3>Mata Pelajaran</h3>
 <ol class="breadcrumb mb-4">
    <li class="breadcrumb-item active">Ini adalah mata pelajaran Ustadz di Tahun Ajaran aktif</li>
 </ol>
 <div class="d-flex justify-content-md-end justify-content-sm-start mb-sm-3 ">
   <button class="btn btn-success presentasi">Buat Presentasi Nilai</button>
   <button  class="btn btn-success rekapnilai ml-3">Rekap Nilai Teori</button>    
   <button  class="btn btn-success rekapnilaipraktek ml-3">Rekap Nilai Praktek</button>    
   </div>
 <div class="p-sm-0 p-md-3 border">
<table id="" class="table table-bordered table-responsive-sm" >
    <thead class="bg-success"> 
        <tr class="">
            <th rowspan="2">No</th>
            <th rowspan="2">Mata Pelajaran</th>
            <th rowspan="2">Kelas</th>
            <th rowspan="2">Semester</th>
            
            <th rowspan="2">Tahun Ajaran</th>
            <th rowspan="2">Jenis Ujian</th>
            <th class="text-center" colspan="5">Bobot Persentase</th>
            <th  class="text-center" rowspan="2">Edit</th>
           
        </tr>
        <tr class="text-center">
            <th>PH</th>
            <th>PTS</th>
            <th>PAS/PAT</th>
            <th>Kuis</th>
            <th>Tugas</th>
            
        </tr>
    </thead>
    <tbody>
        @forelse($mapels as $mapel)
        <tr>
            <td>{{$loop->iteration}}</td>
            <td>{{$mapel->subject_name}}</td>
            <td>{{$mapel->nama_rombel}}</td>
            <td>Semester {{$mapel->semester}}</td>
            <td>{{$mapel->nama_ta}}</td>
            <td>{{$mapel->nama_tipe}}</td>
            <td class="text-center" >{{$mapel->PH}}%</td>
            <td  class="text-center" >{{$mapel->PTS}}%</td>
            <td  class="text-center">{{$mapel->PAS}}%</td>
            <td  class="text-center">{{$mapel->Kuis}}%</td>
            <td  class="text-center">{{$mapel->Tugas}}%</td>
            <td><button class="btn btn-success edit-mapel" id="{{$mapel->id}}">Edit</button></td>
        </tr>





        
        @empty
        @endforelse
    </tbody>
</table>
</div>
</div>


<script>
$(document).ready(function(){
    var id
  $(".edit-mapel").on('click',function(){

    id = $(this).attr('id');
   
    $.ajax({
          url:"/guru/edit/mapel/"+id,
          success:function(data){
            $(".edit-mapel-saya").html(data);
            $("#myMapel").modal();
          }
    });
    $(".simpan-mapel-saya").on('click',function(){
        $(this).text("Perbaharui ..");
        $(".ket-mapel-saya").removeClass("alert alert-success");
        $(".ket-mapel-saya").empty();
        
        $.ajaxSetup({
                      headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            }
                    });
        $.ajax({
          type: 'PUT',
          url: "/guru/simpan-mapel/",
          data: $('.form-mapel-saya').serialize(),
          success: function(data) {
            $(".ket-mapel-saya").addClass("alert alert-success");
            $(".ket-mapel-saya").text(data);
            $(".simpan-mapel-saya").text("Simpan");
            
            setTimeout(function(){
                $(".ket-mapel-saya").removeClass("alert alert-success");
                 $(".ket-mapel-saya").empty();
                $(".simpan-mapel-saya").text("Simpan");
                $("#myMapel").modal("toggle");
                 $(".mapel-saya").load("/guru/mapel"); 
               

              },1000);
                  }
              });
         });    
     });
  
});
 
</script>

<!-- modal akses ujian -->
<div class="modal fade" id="myMapel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Presense Penilaian</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="form-mapel-saya" action="javascript:void(0)" >
        @csrf
      {{method_field('PUT')}}
        <div class="edit-mapel-saya"></div>
        <div class="ket-mapel-saya mt-3"></div>
      </div>
      <div class="p-3">
      <div class="ket-akses text-center"></div>
      </div>
      
     
      <div class="modal-footer">
       
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
        <button type="submit" class="simpan-mapel-saya btn btn-primary">Simpan</button>
      </div>
     
    </div>
    </form>
  </div>
</div>
<!-- modal akses ujian -->

<script>
     $(document).ready(function(){
    $(".rekapnilai").click(function(){
       $(".mapel-saya").hide(); 
        $(".rekapnilaipraktek2").hide();
        $(".rekapnilaiteori").show();
        $(".rekapnilaiteori").load("guru/rekapnilai"); 
      
    });

    });
    $(document).ready(function(){
        $(".rekapnilaipraktek").click(function(){
            $(".mapel-saya").hide(); 
            $(".rekapnilaiteori").hide();
            $(".rekapnilaipraktek2").show();
            $(".rekapnilaipraktek2").load("guru/rekapnilaipraktek"); 
   


        });
  });
  
</script>

<script type="text/javascript">
	$(document).ready(function(){
		$(".presentasi").click(function(){
      $('#ModalPres').modal();
        });
  });
</script>
<!-- Modal -->
<div class="modal fade" id="ModalPres" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">FORM PENILAIAN MATA PELAJARAN AKTIF</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="form-mapel-aktif" action="javascript:void(0)">
          @csrf
        <label for="status">status</label>
        <select required class="form-control" name="status" id="status">
          <option value="1">Aktif</option>
          <option value="2">Non Aktif</option>
        </select>
      <label for="id_subject">Mata Pelajaran</label>
      <select required class="form-control" name="id_subject" id="id_subject">
      <option value="">-</option>
       @forelse ($subjects as $subject)
        <option value="{{$subject->id_subject}}">{{$subject->subject_name}}</option>
       @empty
       @endforelse

          </select>
        <br>
        <label for="id_rombel">Kelas</label>
       
        <select required class="form-control" name="id_rombel" id="id_rombel">
        <option value="">-</option>
        @forelse ($rombels as $rombel)
                                <option value="{{$rombel->id_rombel}}">{{$rombel->nama_rombel}}</option>
                            @empty
                            @endforelse
        </select>
      <label for="semester"> Semester </label>
      <select required class="form-control" name="semester" id="semester">
      <option value="">-</option>
        <option value="1">Semester 1</option>
        <option value="2">Semester 2</option>
        <option value="3">Semester 3</option>
        <option value="4">Semester 4</option>
        <option value="5">Semester 5</option>
        <option value="6">Semester 6</option>
      </select>
      <label for="id_ta">Tahun Ajaran</label>
      <select class="form-control" name="id_ta" id="id_ta">
      <option value="">-</option>
      @forelse ($tas as $ta)
                                <option required value="{{$ta->id_ta}}">{{$ta->nama_ta}}</option>
                            @empty
                            @endforelse
      </select>
      <label for="id_rombel">Tipe Ujian</label>
      
        <select required class="form-control" name="id_tipe" id="id_tipe">
        <option value="">-</option>
        @forelse ($tipes as $tipe)
                                <option value="{{$tipe->id_tipe}}">{{$tipe->nama_tipe}}</option>
                            @empty
                            @endforelse
        </select>
        <div>
    <label for="ph">Penilaian Harian (dalam %)</label>
    <input required class="form-control" type="number" name="ph" id="ph" value="0"" />
</div>
<br>
<div>
    <label for="pts">Penilaian Tengah Semester (dalam %)</label>
    <input required class="form-control" type="number" name="pts" id="pts" value="0""/>
</div>
<br>
<div>
    <label for="ph">Penilaian Akhir Semester (dalam %</label>
    <input required class="form-control" type="number" name="pas" id="pas" value="0"" />
</div>
<br>
<div>
    <label for="tugas">Tugas (dalam %)</label>
    <input required class="form-control" type="number" name="tugas" id="tugas" value="0"" />
</div>
<br>
<div>
    <label for="kuis">Kuis (dalam %)</label>
    <input required class="form-control" type="number" name="kuis" id="kuis" value="0"" />
</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
        <button type="button" class="btn btn-primary simpan-mapel-aktif">Save changes</button>
      </div>
    </div>
    </form>
  </div>
</div>


<script type="text/javascript">
	$(document).ready(function(){
		$(".simpan-mapel-aktif").click(function(){
           
            $.ajaxSetup({
              headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
            });
            $.ajax({
				type: 'POST',
				url: "{{route('save-mapel-aktif')}}",
				data: $('#form-mapel-aktif').serialize(),
				success: function(data) {
                   
          $("#ModalPres").modal("toggle");
                 $(".mapel-saya").load("/guru/mapel"); 
                   
                },
                error: function (jqXHR, exception) {
                   
                }
			});
			
			
			});
		});
	
  </script>