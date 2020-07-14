
  
@extends('guru.layout.master2')
@section('title','Absensi Harian')

@section('content')
<style>
.absen{
    min-width:100px;
}
.keterangan{
    min-width:250px;

}
</style>
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
          <h3 class="text-center mx-auto mt-5">Absensi Harian</h3>
    </div>
    <form class="form-row-border-primary absen_form" method="post" action="javascript:void(0)" id="contact_us">
    @csrf
    {{method_field('PUT')}}
    <div class="row">
    <div class="col-md-6 col-lg-6">
                  <label class="font-weight-bolder" for="tAjaran">Tahun Ajaran</label>
                  <input class="form-control" type="text" name="tAjaran" id="tAjaran" value="{{$jadwal->nama_ta}}" />

                  <label class="font-weight-bolder" for="mapel">Mata Pelajaran</label>
                  <input class="form-control" type="text" name="id_subject" id="mapel" value="{{$jadwal->subject_name}}" /> 
                 
                
                  <input type="hidden" name="id_rombel" id="id_rombel" ?>
                  <label class="font-weight-bolder" for="semester">Semester</label>
                  
                  <input class="form-control" type="text" disabl= name="semester" id="semester" value="{{$jadwal->semester}}" />
      </div>
      <div class="col-md-6  col-lg-6">
                  <label class="font-weight-bolder" for="hari">Hari</label>
                  <input class="form-control" type="text" name="hari" id="hari" value="{{$jadwal->days}}" />

                  <label class="font-weight-bolder" for="tanggal">Tanggal</label>
                  <input class="form-control" type="date" required name="tanggal" id="tanggal" value=date('Y-m-d') />
                 
                
                  
                  <label class="font-weight-bolder" for="kelas">Kelas</label>
                  <input class="form-control" type="text" name="id_rombel" value="{{$jadwal->nama_rombel}}" />
                  <input type="hidden" id="no" name="no" value="{{$jadwal->no}}">
</div>
</div>
             <div class="row">
           
                            
            @for ($i=0 ; $i< $jadwal->duration  ; $i++)
           
            <div class="col-md-10">
            <div class="keterangan{{$i+1}} mt-2"></div>
            <input type="hidden" name="_token" id="token{{$i+1}}" value="{{ csrf_token() }}">
            <label  class="font-weight-bold" for="materi">Materi Jam ke- {{$jadwal->jam_ke+$i}}</label>
            <textarea class="form-control " id="materi{{$i+1}}" ></textarea>
            <input type="hidden" id="jam{{$i+1}}" name="jam{{$i+1}}" value="{{$jadwal->jam_ke+$i}}">
            </div>
            <input type="hidden" class="total" value="{{$jadwal->duration}}">
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
        var total;
        $('#tombol_materi{{$i+1}}').click(function(){
            $(this).text("Menyimpan materi ...");
            $('.keterangan{{$i+1}}').removeClass('alert alert-success');
                    $('.keterangan{{$i+1}}').empty();
           materi= $('#materi{{$i+1}}').val();  
           tanggal= $('#tanggal').val();
           jam = $('#jam{{$i+1}}').val();
           token = $('#token{{$i+1}}').val();  
           no = $('#no').val();  
           total = $(".total").val();  
              
            $.ajax({
				type: 'PUT',
				url: "{{route('savejurnal')}}",
				data: {
                    "_token":token,
                    "materi":materi,
                    "jam":jam,
                    "tanggal":tanggal,
                    "no":no,
                    "total":total,
                    
                   
                },
                
				success: function(data) {
                    $('#tombol_materi{{$i+1}}').text("Simpan")
                    $('.keterangan{{$i+1}}').addClass('alert alert-success');
                    $('.keterangan{{$i+1}}').text(data);
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
          <table class="table mx-md-5 mx-sm-2 border table-responsive-sm">
            <thead>
                <tr class="tr">
                    <th class="no">No</th>
                    <th class="tr">Nama Siswa</th>
                    <th class="absen">Absensi</th>
                    <th class=" keterangan">Keterangan</th>
                </tr>
            </thead>>
            <tbody>
            <div class="p-3">
            @forelse($absensi as $absen)
                <tr class="tr">
                    <td class="no">{{$loop->iteration}}</td>
                        <input class="form-control nis" value="{{$absen->nis}}"  type="hidden" name="nis[]" id="nis" />
                    <td class="tr">
                        {{$absen->nama}}
                        <input class="form-control nama" value="{{$absen->nama}}"  type="hidden" name="nama[]" id="nama" />
                    </td>
                    <td class="absen">
                        <select class="form-control status" name="status[]" id="status"> 
                        <option value=1>Hadir</option>
                        <option value=2>Sakit</option>
                        <option value=3>Izin</option>
                        <option value=4>Tanpa Keterangan</option>  
                        </select>
                    </td>
                    <td class=" keterangan">  
                        <input class="form-control ket" type="text" name="ket[]" id="ket" value="" />
                    </td>
                </tr>
                @empty
                @endforelse
                </div>
                </tbody>     
          </table>
           
    </div>
    <div class="text-center notif-absen"></div>
          <button type="submit" id="send_form" class="absensi form-control justify-content-md-end btn btn-success" name="absen" >Simpan</button> 
</form>
</div>

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
				url: "{{route('savekbm')}}",
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
@endsection
