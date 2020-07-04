
<script>
      $(document).ready(function() {
        $('#myTableSiswa').DataTable();
      } );
  </script>
  <h4 class="text-center"> Daftar Santri Aktif <br> SMK MADINATULQURAN</h4>
  <form method="post" id="form-rombel-siswa" action="javascript:void(0)">
    @csrf
<table id="myTableSiswa" class="table table-responsive-sm  table-responsive table-bordered table-striped">
<div class="d-flex justify-content-md-end sticky-top">
    <button class="simpan-rombel-siswa btn btn-success ">Masukan ke kelas</button>
</div>
<thead class="bg-success">
    <tr>
        <th>No</th>
        <th>Detail</th>
        <th>Pilih</th>
        <th>NISN</th>
        <th>Nama</th>
        <th>Email</th>
       
        
        <th>Jurusan</th>
        <th>Tahun Masuk</th>
        <th>Tampat, Tanggal Lahir</th>
        <th>Sekolah Asal</th>
        <th>Nama Ayah</th>
        <th>Nama Ibu</th>
        
    </tr>
</thead>
 
    <tbody>
        @forelse($siswas as $siswa)
        <tr>
            <td>{{$loop->iteration}}</td>
            <td><button class="btn btn-success">Detail</button></td>
            <td class="text-center">
               
                <input class="btn " type="checkbox" value="{{$siswa->nis}}" name="pilih-siswa[]">
                
            </td>
            <td>{{$siswa->nis}}</td>
            <td>{{$siswa->nama}}</td>
            <td>{{$siswa->email}}</td>
           
           
            <td>
                @if($siswa->jurusan == 1)
                <p>Teknik Komputer dan Jaringan</p>
                @else
                <p>Rekayasa Perangkat Lunak</p>
                @endif
            </td>
            <td>{{$siswa->tahun_masuk}}</td>
            <td>{{$siswa->tempat}}</td>
            <td>{{$siswa->asal_sekolah}}</td>
            
            <td>{{$siswa->nama_ayah}}</td>
            <td>{{$siswa->nama_ibu}}</td>
            
        </tr>
        @empty
        @endforelse
      
    </tbody>
  
</table>


<script>
$(document).ready(function(){
    $(".simpan-rombel-siswa").click(function(){
    
       $('#ModalSiswa').modal();
       

    });
  });

</script>
<div class="modal fade" id="ModalSiswa" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <label for="id_rombel">Kelas</label>
        <select class="form-control" name="id_rombel" id="id_rombel">
            @forelse($rombels as $rombel)
                <option value="{{$rombel->id_rombel}}">{{$rombel->nama_rombel}}</option>
            @empty
            @endforelse
        </select>
        <label for="semester">Semester</label>
        <select class="form-control" name="semester" id="semester">
            <option value="1">Semester 1</option>
            <option value="2">Semester 2</option>
            <option value="3">Semester 3</option>
            <option value="4">Semester 4</option>
            <option value="5">Semester 5</option>
            <option value="6">Semester 6</option>
        </select>
        <label for="id_ta">Tahun Ajaran</label>
        <select class="form-control" name="id_ta" id="id_ta">
        @forelse($tas as $ta)
                <option value="{{$ta->id_ta}}">{{$ta->nama_ta}}</option>
            @empty
            @endforelse
        </select>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary simpan-data-rombel-siswa">Simpan</button>
      </div>
    </div>
  </div>
</div>


</form>


<script type="text/javascript">
	$(document).ready(function(){
		$(".simpan-data-rombel-siswa").click(function(){
           
            $.ajaxSetup({
              headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
            });
            $.ajax({
				type: 'POST',
				url: "{{route('save.rombel')}}",
				data: $('#form-rombel-siswa').serialize(),
				success: function(data) {
                    alert(data);
                   
                },
                error: function (jqXHR, exception) {
                },
			});
			
			
            });
        });
	
  </script>