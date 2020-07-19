
<script>
    $(document).ready( function () {
        $('#myHalaqohOnline').DataTable();
    } );
    </script>
<table id="myHalaqohOnline" class="table table-bordered table-responsive-sm ">
    <thead class="bg-success text-center">
        <tr>
            <th>No</th>
           
            <th>Tahun Ajaran</th>
            <th>Semester</th>
            <th>Tanggal</th>
            <th>Batas</th>
            <th>Daftar Santri</th>
            <th>Edit</th>
            <th>Hapus</th>
        </tr>
    </thead>
    <tbody class="text-center">
        @forelse($daftars as $daftar)
        <tr>
            <td>{{$loop->iteration}}</td>
          
            <td>{{$daftar->nama_ta}}</td>
            <td>{{$daftar->semester}}</td>
            @if($daftar->hari == 1)
            <td>Senin, {{$daftar->tanggal}}</td>
            @elseif($daftar->hari == 2)
            <td>Selasa, {{$daftar->tanggal}}</td>
            @elseif($daftar->hari == 3)
            <td>Rabu, {{$daftar->tanggal}}</td>
            @elseif($daftar->hari == 4)
            <td>Kamis, {{$daftar->tanggal}}</td>
            @elseif($daftar->hari == 5)
            <td>Jumat, {{$daftar->tanggal}}</td>
            @elseif($daftar->hari == 6)
            <td>Sabtu, {{$daftar->tanggal}}</td>
            @elseif($daftar->hari == 7)
            <td>Minggu, {{$daftar->tanggal}}</td>
           
            @endif
            <td>{{$daftar->waktu}}</td>
            <td><button id="{{$daftar->id}}" class="btn btn-primary daftar-siswa">Masuk</button></td>
            <td><button class="btn btn-success">Edit</button></td>
            <td><button class="btn btn-danger">Hapus</button></td>
        </tr>

        @empty
        <td colspan="10">
            <h6 class="alert alert-warning">Saat ini belum terdapat daftar Halaqoh Online</h6>
        </td>
        @endforelse
    </tbody>
</table>




<div class="modal fade bd-example-modal-xl" id="ModalSiswa" tabindex="1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <style>
  .modal-xxl{
    max-width : 95%;
  }
  </style>
  <div class="modal-dialog modal-xxl" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-center" id="exampleModalLabel">Daftar Setoran Hafalan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
       <div class="setoran_siswa"></div>
      </div>
      <div class="modal-footer">
        
      </div>
    </div>
  </div>
</div>



<script>
$(document).ready(function(){
    var id
  $(".daftar-siswa").on('click',function(){
    id = $(this).attr('id');
  
    $.ajax({
          url:"/guru/halaqoh/siswa/"+id,
          success:function(data){
           
            $("#ModalSiswa").modal();
            $(".setoran_siswa").html(data);
          }
    });
     
     });
  
});
</script>