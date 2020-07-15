
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
    <button class="simpan-halaqoh-siswa btn btn-success ">Masukan ke halaqoh</button>
</div>
<thead class="bg-success">
    <tr>
        <th>No</th>
       
        <th>Pilih</th>
        <th>rombel</th>
        <th>Kelompok Halaqoh</th>
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
          
            <td class="text-center">
               
                <input class="btn " type="checkbox" value="{{$siswa->nis}}" name="pilih-siswa[]">
                
            </td>
            <td>
            <?php $jml_r = count($students) ; $i = 0; ?>
            @while($i < $jml_r)
            @if($siswa->nis == $students[$i]->nis)
           {{$students[$i]->nama_rombel}}
            @endif

            <?php $i++; ; ?>
            @endwhile
            </td>
            <td>
            <?php $jml_r = count($halaqohs) ; $j = 0; ?>
            @while($j < $jml_r)
            @if($siswa->nis == $halaqohs[$j]->nis)
           {{$halaqohs[$j]->cikgu_name}}
            @endif

            <?php $j++; ; ?>
            @endwhile</td>
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



<script>
$(document).ready(function(){
    $(".simpan-halaqoh-siswa").click(function(){
    
       $('#halaqohModal').modal();
       

    });
  });

</script>
<!-- Modal -->
<div class="modal fade" id="halaqohModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
    
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
        <label for="id_pembimbing">Pengampu</label>
        <select required class="form-control" name="id_pembimbing" id="id_pembimbing">
        <option value="">-</option>
        @forelse($pembimbings as $pembimbing)
        
                <option value="{{$pembimbing->id_pembimbing}}">{{$pembimbing->cikgu_name}} </option>
            @empty
            @endforelse
        </select>
        <label for="id_kelompok">Kelompok</label>
        <select class="form-control" required name="id_kelompok" id="id_kelompok">
        <option value="">-</option>
          <option value="1">Kelompok 1</option>
          <option value="2">Kelompok 2</option>
          <option value="3">Kelompok 3</option>
          <option value="4">Kelompok 4</option>
          <option value="5">Kelompok 5</option>
          <option value="6">Kelompok 6</option>
          <option value="7">Kelompok 7</option>

        </select>
       
      </div>
      <div class="modal-footer">
        <  <div class="modal-footer">
        <button type="submit" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary simpan-data-halaqoh-siswa">Simpan</button>
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

<script type="text/javascript">
	$(document).ready(function(){
		$(".simpan-data-halaqoh-siswa").click(function(){
           
            $.ajaxSetup({
              headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
            });
            $.ajax({
				type: 'POST',
				url: "{{route('save.halaqoh')}}",
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