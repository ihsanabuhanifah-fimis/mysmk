<!-- <form method="post" action="">
    @csrf
    <div class="form-row">
        <div class="col-md-4">

        </div>
    </div>
</form> -->
<div class="mt-5">



<!-- Button trigger modal -->
<div class="d-flex justify-content-sm-between justify-content-md-end">
<button type="button" class="btn btn-success mr-2" data-toggle="modal" data-target="#halaqohModal">
Tambahkan Halaqoh Harian
</button>
<button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal2">
 Daftar Santri
</button>

</div>

<!-- Modal -->
<div class="modal fade" id="halaqohModal" tabindex="-1" role="dialog" aria-labelledby="examplModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambahkan Halaqoh</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="post" class="form-tambah-halaqoh" action="javascript:void(0)">
            @csrf
            <label for="hari">Hari</label>
            <select class="form-control" name="hari" id="hari">
            <option class="font-weight-bold " selected value="<?= date('l') ;?>"><?= date('l') ;?>
                <option value="Monday">Monday</option>
                <option value="Tuesday">Tuesday</option>
                <option value="Wednesday">Wednesday</option>
                <option value="Thursday">Thursday</option>
                <option value="Friday">Friday</option>
                <option value="Saturday">Saturday</option>
                <option value="Sunday">Sunday</option>
            </select>

            <div class="border p-3 mt-2 mb-2 rounded">
                <h6 class="text-center">Batas Akhir Pengumpulan Rekaman</h6>
            <label for="tanggal">Tanggal</label>
            <input class="form-control" type="date" name="tanggal" value="<?= date('Y-m-d') ; ?>" required>

            <label for="tanggal">Waktu</label>
            <input class="form-control" type="time" name="waktu" value="16:30" required>

            </div>


            <div class="border p-3 mt-2 mb-2 rounded">
            <label for="id_ta"> Tahun Ajaran</label>
                <select class="form-control" name="id_ta" id="id_ta">
                    <option value="1">2020/2021</option>
                </select>

                <label for="semester"> Semester </label>
                <select class="form-control" name="semester" id="semester">
                    <option value="1">Semester 1</option>
                    <option value="2">Semester 2</option>
                    <option value="3">Semester 3</option>
                    <option value="4">Semester 4</option>
                    <option value="5">Semester 5</option>
                    <option value="6">Semester 6</option>
                </select>
            </div>


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" id="tambah-halaqoh" class="btn btn-primary">Tambah</button>
      </div>

      </form>
    </div>
  </div>
</div>

<!-- modal -->
<div class="border p-md-4 mt-4">
<div class="list-halaqoh"></div>
</div>

</div>





<script type="text/javascript">
	$(document).ready(function(){
		$("#tambah-halaqoh").click(function(){
          $(this).text("Sedang menambahkan ...")
         
            $.ajaxSetup({
              headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
            });
            $.ajax({
				type: 'POST',
				url: "{{route('halaqoh.add')}}",
				data: $('.form-tambah-halaqoh').serialize(),
				success: function(data) {
           alert(data);
                    $("#tambah-halaqoh").text("Tambah")
                   
                    $(".list-halaqoh").load("guru/halaqoh/daftar")
                    // document.getElementById(".form-tambah-halaqoh").reset(); 
                    setTimeout(function(){
                   
                    },10000);
                },
                error: function(jqXHR, exception){
                   
                   
                }
			});
			
			
			});
		});
    
        

        $(document).ready(function(){
            $(".list-halaqoh").load("guru/halaqoh/daftar")
        });
  </script>

  <!-- Modal -->
<div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">DAFTAR SANTRI HALAQOH</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <table class="table table-striped table-responsive-sm">
      <thead>
      <tr>
        <th>No</th>
        <th>Nama</th>
        <th>Kelas</th>
      </tr>
      </thead>
      @forelse($rombels as $rombel)
      <tbody>
      <tr>
        <td>{{$loop->iteration}}</td>
        <td>{{$rombel->nama}}</td>
        <td>
        <?php $jml_s = count($rombelini) ; $p=0; ?>
        @while($p < $jml_s)

@if($rombel->id_rombel == $rombelini[$p]->id_rombel)

{{$rombelini[$p]->nama_rombel}}
@endif

        <?php $p++ ; ?>
        @endwhile

        </td>
      </tr>
      </tbody>
      @empty
      @endforelse
      </table>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Keluar</button>
      
      </div>
    </div>
  </div>
</div>