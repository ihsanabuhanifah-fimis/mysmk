<script>
    $(document).ready( function () {
        $('#myHalaqohOnline').DataTable();
    } );
    </script>
<table id="myHalaqohOnline" class="table table-bordered mt-4 table-responsive-sm">
    <thead class="bg-success text-center">
        <tr>
            <th>No</th>
            <th>Tanggal</th>
            <th>Batas Waktu</th>
            <th>Tahun Ajaran</th>
            <th>Semester</th>
           
            <th colspan="2">Setoran</th>
            <th>Upload Rekaman</th>
     
        </tr>
    </thead>

    <tbody>
        @forelse($halaqohs as $halaqoh)
        <tr>
            <td>{{$loop->iteration}}</td>
            
            @if($halaqoh->hari == 1)
            <td>Senin, {{$halaqoh->tanggal}}</td>
            @elseif($halaqoh->hari == 2)
            <td>Selasa, {{$halaqoh->tanggal}}</td>
            @elseif($halaqoh->hari == 3)
            <td>Rabu, {{$halaqoh->tanggal}}</td>
            @elseif($halaqoh->hari == 4)
            <td>Kamis, {{$halaqoh->tanggal}}</td>
            @elseif($halaqoh->hari == 5)
            <td>Jumat, {{$halaqoh->tanggal}}</td>
            @elseif($halaqoh->hari == 6)
            <td>Sabtu, {{$halaqoh->tanggal}}</td>
            @elseif($halaqoh->hari == 7)
            <td>Minggu, {{$halaqoh->tanggal}}</td>
           
            @endif
            <td>{{$halaqoh->waktu}}</td>
            <td>{{$halaqoh->nama_ta}}</td>
            <td>Semester {{$halaqoh->semester}}</td>
            <td colspan="2"><div class="text-center setoran{{$halaqoh->id}}"></div></td>
            
         
            <script>
            $(document).ready(function(){
              var id = {{$halaqoh->id}};
              $.ajax({
                      url:"/siswa/halaqoh-hasil/"+id,
                     
                        success:function(data)
                      { 
                         $('.setoran'+id+'').html(data);
                        }
              });
            });
            </script>
            
            
            
            <td><button id="{{$halaqoh->id}}"  class="upload-rekaman btn btn-success">Upload</button></td>
            
        </tr>

        <div class="modal fade" id="exampleModal{{$halaqoh->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
     <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Upload Rekaman</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form class="form-upload-rekaman" action="javascript:void(0)">
      <input type="hidden" name="_token" id="token{{$halaqoh->id}}" value="{{ csrf_token() }}">
      {{method_field('PUT')}}


          <div class="border p-3">
          <div class="form-row">
          <div class="col-6">
          <label for="surat_mulai">Surat Mulai</label>
          <select class="form-control" name="surat_mulai" id="surat_mulai{{$halaqoh->id}}">
          <option value="1">Alfatihah</option>
          </select>
          </div>
          <div class="col-6">
          <label for="ayat_mulai">Ayat Mulai</label>
          <input class="form-control"  type="number" name="ayat_mulai" id="ayat_mulai{{$halaqoh->id}}" required />
          </div>
          </div>
          <div class="form-row">
          <div class="col-6">
          <label for="surat_mulai">Surat Akhir</label>
          <select class="form-control"  name="surat_akhir" id="surat_akhir{{$halaqoh->id}}">
          <option value="1">Alfatihah</option>
          </select>
          </div>
          <div class="col-6 ">
          <label for="ayat_akhir">Ayat Akhir</label>
          <input class="form-control"  type="number" name="ayat_akhir" id="ayat_akhir{{$halaqoh->id}}" required />
          </div>
          </div>
          </div>

          <input type="hidden" class="id{{$halaqoh->id}}" value="{{$halaqoh->id}}">
          <div class="mt-4">
          <input required class="form-control rekaman{{$halaqoh->id}}" type="text" placeholder="Upload link rekaman disini">
          </div>

          <div class="ket-halaqoh-online mt-3"></div>
          
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
        <button  type="submit" class="tombol-upload-rekaman{{$halaqoh->id}} btn btn-primary">Simpan</button>
        </form>
      </div>  
    </div>
    </div>
  </div>
</div>

        @empty
        <td colspan="10" class="alert alert-warning text-center text-bold ">Saat Ini Tidak Ada Jadwal Halaqoh</td>
        @endforelse
    </tbody>
</table>






<script type="text/javascript">
	$(document).ready(function(){
		$(".upload-rekaman").click(function(){
            var id = $(this).attr('id');
           
            
            $('#exampleModal'+id+'').modal();
        
        $('.tombol-upload-rekaman'+id+'').click(function(){
          $(this).text("Sedang menyimpan ....")
          $(".ket-halaqoh-online").removeClass("alert alert-danger");
          $(".ket-halaqoh-online").removeClass("alert alert-success");
          $(".ket-halaqoh-online").empty();
           var no= $('.id'+id+'').val(); 
           var rekaman = $('.rekaman'+id+'').val();
           var token = $('#token'+id+'').val();
           var surat_mulai = $('#surat_mulai'+id+'').val();
           var ayat_mulai = $('#ayat_mulai'+id+'').val();
           var surat_akhir = $('#surat_akhir'+id+'').val();
           var ayat_akhir = $('#ayat_akhir'+id+'').val();
           
           
            $.ajax({
				type: 'PUT',
				url: "{{route('halaqoh.save')}}",
				data: {
                    "_token":token,
                    "id":no,  
                    "rekaman":rekaman, 
                    "surat_mulai":surat_mulai,
                    "surat_akhir":surat_akhir,
                    "ayat_mulai":ayat_mulai,                 
                    "ayat_akhir":ayat_akhir, 
                },
                
				success: function(data) {
         
                   $(".ket-halaqoh-online").addClass("alert alert-success");
                   $(".ket-halaqoh-online").text(data);
                   $('.tombol-upload-rekaman'+no+'').text("Simpan");
                  

                   setTimeout(function(){
                      $(".ket-halaqoh-online").removeClass("alert alert-success");
                      $(".ket-halaqoh-online").empty();
                    },2000);
                   
                  },
                  error: function (jqXHR, exception) {
                      $(".ket-halaqoh-online").addClass("alert alert-danger");
                      $(".ket-halaqoh-online").text("Mohon lengkapi data...");
                      $('.tombol-upload-rekaman'+no+'').text(Simpan);
                   SetTimeout(function(){
                      $(".ket-halaqoh-online").removeClass("alert alert-danger");
                      $(".ket-halaqoh-online").empty();
                    },2000);
                }
			});
    });
			
			});
    });

  
		
		
  </script>