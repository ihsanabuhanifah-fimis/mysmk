@extends('guru.layout.master')
@section('title','Absensi Harian')

@section('content')

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
                  <input type="hidden" name="no" value="{{$jadwal->no}}">
</div>
</div>
             <div class="row">
           
                            
            @for ($i=1 ; $i<= $jadwal->duration  ; $i++)

            <div class="col-md-10">
            <label  class="font-weight-bold" for="materi">Materi Jam ke- {{$i}}</label>
            <textarea class="form-control materi{{$i}}" id="" ></textarea>
            <input type="hidden" name="jam{{$i}}" value="{{$jadwal->jam_ke+$i}}">
            </div>
            <div class="col-md-2">
              <br>
            <button class=" mt-4 btn btn-success" type="submit" id="materi{{$i}}">submit</button>
            </div>
            
<script type="text/javascript">
	$(document).ready(function(){
        var a;
		$("#materi{{$i}}").click(function(){
            a = $(".materi{{$i}}").val();
            $.ajaxSetup({
              headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
            });
            $.ajax({
				type: 'POST',
				url: "{{route('savejurnal')}}",
				data: {materi:"kkkkk"},
				success: function(data) {
                    // $('.notif-absen').addClass('alert alert-success');
                    // $('.notif-absen').text(data);
                    // $('#send_form').html('Simpan');
                   alert(data);
                   
                },
                error: function (jqXHR, exception) {
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
          <table class="table mx-5 border">
            <thead>
                <tr class="tr">
                    <th class="no">No</th>
                    <th class="tr">Nama Siswa</th>
                    <th class="tr">Absensi</th>
                    <th class="tr">Keterangan</th>
                </tr>
            </thead>>
            <tbody>
            @forelse($absensi as $absen)
                <tr class="tr">
                    <td class="no">{{$loop->iteration}}</td>
                        <input class="form-control nis" value="{{$absen->nis}}"  type="hidden" name="nis[]" id="nis" />
                    <td class="tr">
                        <input class="form-control nama" value="{{$absen->nama}}"  type="text" name="nama[]" id="nama" />
                    </td>
                    <td class="no2">
                        <select class="form-control status" name="status[]" id="status"> 
                        <option value=1>Hadir</option>
                        <option value=2>Sakit</option>
                        <option value=3>Izin</option>
                        <option value=4>Tanpa Keterangan</option>  
                        </select>
                    </td>
                    <td class="tr">  
                        <input class="form-control ket" type="text" name="ket[]" id="ket" value="" />
                    </td>
                </tr>
                @empty
                @endforelse
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



</script> 
@endsection