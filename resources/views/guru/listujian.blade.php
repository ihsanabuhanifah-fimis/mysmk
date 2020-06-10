

   
    <script>
    $(document).ready( function () {
        $('#myTableUjian').DataTable();
    } );
    </script>
    
    <style>
    .table-ujian,.btn{
      font-size:12px;
    }
    </style>
    <table class="table datatable table-bordered myTable table-ujian table-responsive" id="myTableUjian">

    <h2 class="mt-4">Jadwal Penilaian</h2>
 <ol class="breadcrumb mb-4">
    <li class="breadcrumb-item active">Ini adalah daftar materi yang telah di buat</li>
 </ol>
        <thead class="bg-info" >
            <th>No</th>
            <th>Mata Pelajaran</th>
            <th>Tahun Ajaran</th>
            <th>Semester</th>
            <th>Kelas</th>
            <th>Materi</th>
            <th class="text-center">KKM</th>
            <th>Jenis Ujian</th>
            <th>Tipe Ujian</th>
            <th class="text-center">Durasi</th>
            <th>Tanggal Mulai</th>
            <th>Tanggal Selesai</th>
            <th class="text-center">Batas Waktu</th>
            <th>Izin Akses</th>
            <th class="text-center">Soal</th>
            <th class="text-center">Nilai</th>
            <th colspan="2" class="text-center">Action</th>
            <th class="text-center">Attempt</th>
            <th class="text-center">Tampilkan <br> Nilai</th>
            
        </thead>
        <tbody>
        @forelse ($ujians as $ujian)
        <tr>
        <td>{{$loop->iteration}}</td>
        <td>{{$ujian->subject_name}}</td>
        <td>{{$ujian->nama_ta}}</td>
        <td>{{$ujian->semester}}</td>
        <td>{{$ujian->nama_rombel}}</td>
        <td>{{$ujian->materi}}</td>
        <td class="text-center">{{$ujian->kkm}}</td>
        <td>{{$ujian->nama_ujian}}</td>
        @if($ujian->id_tipe == 1)  
        <td>Praktek</td>
        @else
        <td>Teori</td>
        @endif
     
        <td class="text-center">{{$ujian->durasi}} Menit</td>
        <td>{{$ujian->tanggal_mulai}} {{$ujian->waktu_mulai}}</td>
        <td>{{$ujian->tanggal_selesai}} {{$ujian->waktu_selesai}}</td>
        @if($ujian->disable_waktu == '1')
        <td class="text-center">Tidak</td>
        @else
        <td class="text-center">Ya</td>
        @endif
        <td><a id="{{$ujian->id}}" class="btn btn-outline-primary akses-ujian" >Akses</a></>
        @if($ujian->id_tipe == 2)
        <td class="text-center"><a class="btn btn-outline-success" href="{{route('soalujian',['nilai'=>$ujian->id])}}">Soal</a></div>
        @else
        <td class="text-center"><a class="btn btn-outline-success" href="{{route('soalujianpraktek',['nilai'=>$ujian->id])}}">Soal</a></div>
        @endif
        <td class="text-center"><a class="btn btn-outline-primary" href="{{route('nilaiujian',['nilai'=>$ujian->id])}}">Nilai</a></td>
        <td class="text-center"><a class="btn btn-outline-danger text-center delete" id="{{$ujian->id}}" >Hapus</a></td>
        <td><a id="{{$ujian->id}}" class="btn btn-outline-success edit-ujian">Edit</a></td>
        <td class="text-center">{{$ujian->remidial}}</td>
        @if($ujian->tampil_nilai == 1)
        <td class="text-center">Ya</td>
        @else
        <td class="text-center">Tidak</td>
        @endif
        </tr>  
        @empty
        <td colspan="13"><h6 class="alert alert-danger text-center">Ustadz saat ini tidak memilki penilaian</h6></td>
        @endforelse   
        </tbody>
    </table>

<div class="modal fade" id="myModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-danger" id="staticBackdropLabel">Konfirmasi</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <h6 class="text-danger">Apakah Ustadz yakin akan menghapusnya?</h6>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
        <button type="button" id="hapusujian" class="btn btn-danger">Bismillah</button>
      </div>
    </div>
  </div>
</div>

<!-- modal akses ujian -->
<div class="modal fade" id="myAkses" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Berikan Akses kepada</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form class="form-akses-ujian" action="javascript:void(0)" >
        @csrf
      {{method_field('PUT')}}
        <div class="akses-siswa"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="simpan-akses-ujian btn btn-primary">Save changes</button>
      </div>
    </div>
    </form>
  </div>
</div>
<!-- modal akses ujian -->

<script src="/js/popper.min.js"></script>
<script src="/js/bootstrap.min.js"></script>

<!-- modal edit js -->
<!-- modal edit ujian -->

<div class="modal fade" id="ModalEditUjian" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog" role="document">
  
    <div class="modal-content">
      <div class=" modal-header bg-primary">
        <h5 class="modal-title bg-pr" id="exampleModalLabel">Edit Ujian Ujian</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
    <form action="javascript:void(0)" class="form-edit-ujian-ini">
    @csrf
    {{method_field('PUT')}}
      <div class="form-edit-ujian"></div>
      <div class="noticeujian text-center"></div>  
  </div>
  <div class="modal-footer">
    
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
    <button type="submit" id="edit-ujian-ini" class="btn btn-primary">edit</button>
  </div>
  </form>
</div>
<!-- modal edit ujian -->



<!-- modal akses ujian -->
<script src="/js/popper.min.js"></script>
<script src="/js/bootstrap.min.js"></script>

<script>
$(document).ready(function(){
    var id
  $(".akses-ujian").on('click',function(){

    id = $(this).attr('id');
    $.ajax({
          url:"/guru/akses/ujian/"+id,
          success:function(data){
            $(".akses-siswa").html(data);
            $("#myAkses").modal();
          }
    });
    $(".simpan-akses-ujian").on('click',function(){
        $(this).text("Perbaharui data");
        $.ajaxSetup({
                      headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            }
                    });
        $.ajax({
          type: 'PUT',
          url: "/guru/ujian/akses/",
          data: $('.form-akses-ujian').serialize(),
          success: function(data) {
            $(".simpan-akses-ujian").text("Simpan");
                  }
              });
         });    
     });
  
});
 
</script>

<!-- //modla akses -->

<script>
$(document).ready(function(){
    var id
  $(".delete").on('click',function(){
    
    id = $(this).attr('id');
    $("#myModal").modal();
  });
  $('#hapusujian').click(function(){
      $.ajax({
          url:"/guru/hapusujian/"+id,
          beforeSend:function(){
          $('#hapus').text("deleting...");
          },
            success:function(data)
           
          {
            
            setTimeout(function(){
              $(".tampilkanujian").load("tampilkanujian");
                

              },2000);
              
              
            }
         });
    });

 
});
</script>

<!-- modal js edit -->
<script>
$(document).ready(function(){
    var id
  $(".edit-ujian").on('click',function(){

    id = $(this).attr('id');
    $.ajax({
          url:"/guru/edit/ujian/"+id,
          success:function(data){
          $(".form-edit-ujian").html(data);      
           }
    });
    
    $("#ModalEditUjian").modal();
    $("#edit-ujian-ini").click(function(){
     
      $(this).text("Perbaharui data");
        $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
         });              
        $.ajax({
          type: 'PUT',
          url: "/guru/edit/ujian/",
          data: $('.form-edit-ujian-ini').serialize(),
          success: function(data) {
            // $(".tampilkanujian").load("tampilkanujian");
            alert(data);
            // $(".edit-ujian-ini").text("Simpan");
                  }
                });
    });
  });
  
});
 
</script>