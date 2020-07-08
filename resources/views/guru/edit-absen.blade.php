


 <div class="container-fluid bg-white">
        <div class="row">
            <div class="col-md-8 col-xl-6">
               
                @if($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                    </ul>
                </div>
                @endif
                
            </div>
        </div>
    </div>

</div>
</div> 

<!-- isi -->
<div class="container">

<div class="row">
          <h3 class="text-center mx-auto mt-5">Edit Absensi</h3>
    </div>
    
    <form class="form-row-border-primary absen_form" method="post" action="javascript:void(0)" id="contact_us">
    @csrf
    {{method_field('PUT')}}
    <div class="row">
    <div class="col-md-6 col-lg-6">
                  <label class="font-weight-bolder" for="tAjaran">Tahun Ajaran</label>
                  <input class="form-control" type="text" name="tAjaran" id="tAjaran" value="{{$kbms[0]->nama_ta}}" />

                  <label class="font-weight-bolder" for="mapel">Mata Pelajaran</label>
                  <input class="form-control" type="text" name="id_subject" id="mapel" value="{{$kbms[0]->subject_name}}" /> 
                 
                
                  <input type="hidden" name="id_rombel" id="id_rombel" />
                  <label class="font-weight-bolder" for="semester">Semester</label>
                  
                  <input class="form-control" type="text" disabl= name="semester" id="semester" value="{{$kbms[0]->semester}}" />
      </div>
      <div class="col-md-6  col-lg-6">
                

                  <label class="font-weight-bolder" for="tanggal">Tanggal</label>
                  <input class="form-control" type="date" required name="tanggal" id="tanggal" value="{{$kbms[0]->tanggal}}" />
                  <input class="form-control" type="hidden" required name="id" value="{{$kbms[0]->id}}" />
                
                  
                  <label class="font-weight-bolder" for="kelas">Kelas</label>
                  <input class="form-control" type="text" name="id_rombel" value="{{$kbms[0]->nama_rombel}}" />

</div>
</div>
             <div class="row">
            <table class="table mx-5 border table-responsive-sm">
            <thead>
                <tr class="tr">
                    <th class="no">No</th>
                    <th class="tr">Nama Siswa</th>
                    <th class="tr">Absensi</th>
                    <th class="tr">Keterangan</th>
                </tr>
            </thead>
            <tbody>
              
            @forelse($absensi as $absen)
                <tr class="tr">
                    <td class="no">{{$loop->iteration}}</td>
                        <input class="form-control nis" value="{{$absen->n}}"  type="hidden" name="nis[]" id="nis" />
                    <td class="tr">
                        <input class="form-control nama" value="{{$absen->i}}"  type="text" name="nama[]" id="nama" />
                    </td>
                    <td class="no2">
                        <select class="form-control status" name="status[]" id="status"> 
                        @if($absen->k == 1)
                        <option selected value="{{$absen->k}}">Hadir</option>
                        @elseif($absen->k == 2)
                        <option selected value="{{$absen->k}}">Sakit</option>
                        @elseif($absen->k == 3)
                        <option selected value="{{$absen->k}}">Izin</option>
                        @elseif($absen->k == 4)
                        <option selected value="{{$absen->k}}">Tanpa Keterangan</option>
                        @endif

                        <option value=1>Hadir</option>
                        <option value=2>Sakit</option>
                        <option value=3>Izin</option>
                        <option value=4>Tanpa Keterangan</option>  
                        </select>
                    </td>
                    <td class="tr">  
                        <input class="form-control ket" type="text" name="ket[]" id="ket" value="{{$absen->s}}" />
                    </td>
                </tr>
                @empty
                @endforelse
                </tbody>     
          </table>
           
                            
            @for ($i=0 ; $i< $jml_jurnal  ; $i++)
           
            <div class="col-md-10">
            <div class="keterangan{{$i+1}} mt-2"></div>
            <input type="hidden" name="_token" id="token{{$i+1}}" value="{{ csrf_token() }}">
            <label  class="font-weight-bold" for="materi">Materi Jam ke- {{$i+1}}</label>
            @if(!isset($jurnal[$i]->materi))
            <textarea class="form-control " id="materi{{$i+1}}" ></textarea>
            <input type="text" id="jam{{$i+1}}" name="jam{{$i+1}} value="">
            <input type="text" id="id{{$i+1}}"  value="id{{$i+1}}">
            @else
            <textarea class="form-control " id="materi{{$i+1}}" >{{$jurnal[$i]->materi}}</textarea>
            <input type="hidden" id="jam{{$i+1}}" name="jam{{$i+1}}" value="{{$jurnal[$i]->jam_ke}}">
            <input type="hidden" id="id{{$i+1}}" name="id{{$i+1}}" value="{{$jurnal[$i]->no}}">
            @endif
       
            </div>
            <div class="col-md-2 mb-2">
              <br>
            <button class="btn btn-success mt-lg-4 mt-md-3 mt-sm-0" type="submit" id="tombol_materi{{$i+1}}">Simpan</button>
            </div>
            
<script type="text/javascript">
	$(document).ready(function(){
        var materi;
        var jam;
        var tanggal;
        var token;
        var no; 
        var id;
        $('#tombol_materi{{$i+1}}').click(function(){
            $(this).text("Menyimpan materi ...");
            $('.keterangan{{$i+1}}').removeClass('alert alert-success');
            $('.keterangan{{$i+1}}').empty();
           materi= $('#materi{{$i+1}}').val();  
           tanggal= $('#tanggal').val();
           jam = $('#jam{{$i+1}}').val();
           token = $('#token{{$i+1}}').val();  
           no = $('#no').val(); 
           id = $('#id{{$i+1}}').val(); 
                 
            $.ajax({
				type: 'PUT',
				url: "{{route('editjurnal')}}",
				data: {
                    "_token":token,
                    "materi":materi,
                    "jam":jam,
                    "tanggal":tanggal,
                    "no":no,
                    "id":id,
                    
                   
                },
                
				success: function(data) {
                    alert(data);
                    $('#tombol_materi{{$i+1}}').text("Simpan")
                    // $('.keterangan{{$i+1}}').addClass('alert alert-success');
                    // $('.keterangan{{$i+1}}').text(data);
                    // $('.notif-absen').text(data);
                    // $('#send_form').html('Simpan');
                   
                },
                error: function (jqXHR, exception) {
                    $('#tombol_materi{{$i+1}}').text("Simpan")
                    // $('.notif-absen').addClass('alert alert-danger');
                    // $('.notif-absen').text("Absensi tidak berhasil tersimpan, Mohon untuk mengecek tanggal");
                    // $('#send_form').html('Simpan');       
                }
			});
			
			
			});
		});
	
  </script>
           @endfor
            </div>
            <br>
            </table>     
      </div>
    <div class="row ">
     
         
    </div>
 
    <div class="text-center notif-absen"></div>
          <button type="submit" id="send_form" class="absensi form-control justify-content-md-end btn btn-success" name="absen" >Simpan</button> 
</form>
</div>

</script> 
<script type="text/javascript">
	$(document).ready(function(){
		$("#send_form").click(function(){
            $('.notif-absen').removeClass('alert alert-success');
            $('.notif-absen').removeClass('alert alert-danger');
            $('.notif-absen').empty(    );
            $('#send_form').html('Bismillah sedang menyimpan absensi..');
            $.ajaxSetup({
              headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
            });
            $.ajax({
				type: 'POST',
				url: "{{route('editkbm')}}",
				data: $('#contact_us').serialize(),
				success: function(data) {
                    $('.notif-absen').addClass('alert alert-success');
                    $('.notif-absen').text(data);
                    $('#send_form').html('Simpan');
                   
                   
                },
                error: function (jqXHR, exception) {
                    $('.notif-absen').addClass('alert alert-danger');
                    $('.notif-absen').text("Absensi tidak berhasil tersimpan, Mohon untuk mengecek tanggal");
                    $('#send_form').html('Simpan');       
                }
			});
			
			
			});
		});
	
  </script>
