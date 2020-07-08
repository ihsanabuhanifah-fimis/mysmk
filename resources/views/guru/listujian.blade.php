


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
       <h2 class="mt-4">Jadwal Penilaian</h2>
 <ol class="breadcrumb mb-4">
    <li class="breadcrumb-item active">Ini adalah daftar materi yang telah di buat</li>
 </ol>
 <div class="d-flex justify-content-md-end d-flex justify-content-sm-start mb-3">
    <button  class="btn btn-success " data-toggle="modal" data-target="#exampleModal" >Buat Penilaian</button>
    </div>
 <div class="border p-md-3">
    <table class="table datatable table-bordered myTable table-ujian table-responsive" id="myTableUjian">
   
        <thead class="bg-success" >
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
            <th class="text-center">Jumlah Remidial</th>
            <th class="text-center">Teknis Ujian</th>
            
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
        @if($ujian->tampil_nilai == 2)
<td><p>Penilaian Offline</p></td>
        @else
        <td><a id="{{$ujian->id}}" class="btn btn-primary akses-ujian" >Akses</a></td>
        @endif
        @if($ujian->id_tipe == 2)
        @if($ujian->tampil_nilai == 2)
        <td><p>Penilaian Offline</p></td>
        @else
        <td class="text-center"><a class="btn btn-success" href="{{route('soalujian',['nilai'=>$ujian->id])}}">Soal</a></div>
        @endif
        @else
        <td class="text-center"><a class="btn btn-success" href="{{route('soalujianpraktek',['nilai'=>$ujian->id])}}">Soal</a></div>
        @endif
        <td class="text-center"><a class="btn btn-primary" href="{{route('nilaiujian',['nilai'=>$ujian->id])}}">Nilai</a></td>
        <td class="text-center"><a class="btn btn-danger text-center delete" id="{{$ujian->id}}" >Hapus</a></td>
        <td><a id="{{$ujian->id}}" class="btn btn-success edit-ujian">Edit</a></td>
        <td class="text-center">{{$ujian->remidial}}</td>
        @if($ujian->tampil_nilai == 1)
        <td class="text-center">Online</td>
        @else
        <td class="text-center">Offline / Kertas</td>
        @endif
        </tr>  
        @empty
        <td colspan="100"><h6 class="alert alert-danger text-center">Ustadz saat ini tidak memilki penilaian</h6></td>
        @endforelse   
        </tbody>
    </table>
    </div>
<div class="modal fade" id="myModal" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title " id="staticBackdropLabel">Konfirmasi</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <h6 class="">Apakah Ustadz yakin akan menghapusnya?</h6>

      </div>
      <div class="modal-footer">
        <div class="ket-hapus-ujian"></div>
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
        <button type="button" id="hapusujian" class="btn btn-danger">Hapus</button>
      </div>
    </div>
  </div>
</div>

<!-- modal akses ujian -->
<div class="modal fade" id="myAkses" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
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
      <div class="p-3">
      <div class="ket-akses text-center"></div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
        <button type="submit" class="simpan-akses-ujian btn btn-primary">Simpan</button>
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
<div class="modal-dialog " role="document">
  
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
      <div class="noticeujian mt-3 text-center"></div>  
  </div>
  <div class="modal-footer">
    
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
    <button type="submit" id="edit-ujian-ini" class="btn btn-primary">Perharui</button>
  </div>
  </form>
</div>
<!-- modal edit ujian -->



<!-- modal akses ujian -->


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
        $(this).text("Perbaharui ...");
        $(".ket-akses").removeClass("alert alert-success");
        $(".ket-akses").empty();
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
            $(".ket-akses").addClass("alert alert-success");
            $(".ket-akses").text(data);
            $(".simpan-akses-ujian").text("Simpan");
            setTimeout(function(){
              $(".tampilkanujian").load("tampilkanujian");
              $(".ket-akses").removeClass("alert alert-success");
               $(".ket-akses").empty();

              },4000);
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
          $('#hapus').text("Menghapus ...");
          },
            success:function(data){
            $('#hapus').text("Hapus");
            $(".tampilkanujian").load("guru/tampilkanujian");  
            $("#myModal").modal("toggle");
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
     
      $(this).text("Perbaharui penilaian ...");
      $(".noticeujian").removeClass("alert alert-success");
      $(".noticeujian").removeClass("alert alert-danger");
   
      $(".noticeujian").empty();
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
            $("#edit-ujian-ini").text("Perbaharui");
           $(".noticeujian").addClass("alert alert-success");
           $(".noticeujian").text("Alhamdulilah pengaturan penilaian berhasil diperbaharui");
          
           $("#ModalEditUjian").modal("toggle");
           $(".tampilkanujian").load("guru/tampilkanujian");  
        
           setTimeout(function(){
                    $(".noticeujian").removeClass("alert alert-success");
                    $(".noticeujian").empty();
                  
                    },3000);
                    
                  },

                  error: function (jqXHR, exception) {
                    $("#edit-ujian-ini").text("Perbaharui");
                    $(".noticeujian").addClass("alert alert-danger");
                    $(".noticeujian").text("Mohon maaf pengaturan tidak berhasil diperbaharui");
                setTimeout(function(){
                    $(".noticeujian").removeClass("alert alert-danger");
                    $(".noticeujian").empty();
                    },3000);
                }
                });
    });
  });
  
});
 
</script>