
<script>
    $(document).ready( function () {
        $('.myTableMapel').DataTable();
    } );
</script>
<div class="container-sm-fluid">

<h1>Mata Pelajaran</h1>
 <ol class="breadcrumb mb-4">
    <li class="breadcrumb-item active">Ini adalah mata pelajaran Ustadz di Tahun Ajaran aktif</li>
 </ol>
 <div class="d-flex justify-content-md-end justify-content-sm-start mb-sm-3 ">
   <button  class="btn btn-success rekapnilai">Rekap Nilai Teori</button>    
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
        $(".rekapnilaipraktek").hide();
        $(".rekapnilaiteori").show();
        $(".rekapnilaiteori").load("guru/rekapnilai"); 
      
    });

    });
    $(document).ready(function(){
        $(".rekapnilaipraktek").click(function(){
            $(".mapel-saya").hide(); 
            $(".rekapnilaiteori").hide();
            $(".rekapnilaipraktek").show();
            $(".rekapnilaipraktek").load("guru/rekapnilaipraktek"); 
   


        });
  });
  
</script>