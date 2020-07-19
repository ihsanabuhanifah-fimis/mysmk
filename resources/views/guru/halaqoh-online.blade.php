

<form method="put" action="">
@csrf
{{method_field('PUT')}}
<?php $jml_siswa = count($rekaman) ; ?>

<table  class="table table-responsive-sm table-bordered">
<thead class="bg-success">
    <tr>
        <th>No</th>
        <th>Nama</th>
        <th class="text-center">Setoran Hafalan</th>
        <th>Setoran</th>
        <th>Komentar</th>
      
    </tr>
</thead>
<?php $k=0 ?>
@forelse ($siswas as $siswa)
<tr>
<td>{{$loop->iteration}}</td>
<td>{{$siswa->nama}}</td>

<?php $i=0; ;?>

@if($jml_siswa == 0)

<td>Santri Belum Upload</td>
<td>Santri Belum Upload</td>
<td><textarea name="komentar" id="komentar" cols="40" rows="1"></textarea></td>

@else
@while($i < $jml_siswa)

@if($siswa->nis == $rekaman[$i][0]->nis)
<div>
<td class="text-center"><b>Surat {{$rekaman[$i][0]->surat_mulai}} Ayat {{$rekaman[$i][0]->ayat_mulai}}</b>
<br>
Sampai 
<br>
<b>Surat {{$rekaman[$i][1]->surat_akhir}}
{{$rekaman[$i][1]->ayat_akhir}} </b> </td>
<td>
<iframe class="embed-responsive-item"
            background-color="white"
            frameborder="0"
            width="400"
            height="60"
            
            src="{{$rekaman[$i][0]->rekaman}}">
            </iframe>

</td>

<input type="hidden" name="_token" id="token{{$rekaman[$i][0]->id}}" value="{{ csrf_token() }}">
<input type="hidden" name="id{{$rekaman[$i][0]->id}}" value="{{$rekaman[$i][0]->id}}">
</div>
@break
@else


@endif

<?php $i++; ?>  
@endwhile

@endif

<td>


    {{method_field('PUT')}}
<textarea name="komentar" id="komentar{{$k}}" cols="40" rows="1">{{$rekaman[$k][0]->komentar}}</textarea>
<div class="ket-komen{{$k}} mt-2 text-center"></div>
<br><button  type="button" id="koreksi{{$k}}" class="btn btn-success simpan-komentar">Kirim</button>
<input type="hidden" name="_token" id="token{{$k}}" value="{{ csrf_token() }}">
<input type="hidden" id="id{{$k}}" value="{{$rekaman[$k][0]->id}}">
<script type="text/javascript">
	$(document).ready(function(){
        var komentar;
        var token;

        var id;
       
       
        $('#koreksi{{$k}}').click(function(){
            $(this).text("Menyimpan materi ...");
            $('.ket-komen{{$k}}').removeClass('alert alert-success');
            $('.ket-komen{{$k}}').removeClass('alert alert-danger   ');
            $('.ket-komen{{$k}}').empty();
          
           
           token = $('#token{{$k}}').val();  
           id = $('#id{{$k}}').val(); 
           komentar = $('#komentar{{$k}}').val();  
            
            $.ajax({
				type: 'PUT',
				url: "{{route('simpan.komentar')}}",
				data: {
                    "_token":token,
                    "komentar":komentar,  
                    "id":id,                 
                },
                
				success: function(data) {
                   $('.ket-komen{{$k}}').addClass('alert alert-success');
                   $('.ket-komen{{$k}}').text(data);
                    $('#koreksi{{$k}}').text('Simpan');
                    setTimeout(function(){
                    $('.ket-komen{{$k}}').removeClass('alert alert-success');
                   $('.ket-komen{{$k}}').empty();
                    }, 1000);
                   
                },
                error: function (jqXHR, exception) {
                    $('.ket-komen{{$k}}').addClass('alert alert-danger');
                   $('.ket-komen{{$k}}').text("Komentar tidak tersimpan, Periksa Koneksi Internet");
                    $('#koreksi{{$k}}').text('Simpan');
                    setTimeout(function(){
                        $('.ket-komen{{$k}}').removeClass('alert alert-danger');
                   $('.ket-komen{{$k}}').empty();
                    }, 2000);
                }
			});
			
			
			});
		});
	
  </script>
</td>


</tr>


           
<script type="text/javascript">
	$(document).ready(function(){
       
        $('.koreksi').click(function(){
          var id = $(this).attr("id");
          alert(id);
                   
            $.ajax({
				type: 'PUT',
				url: "{{route('savejurnal')}}",
				data: {
                    "_token":token,
                    "materi":materi,
                    "jam":jam,
                    "tanggal":tanggal,
                    "no":no,
                    
                   
                },
                
				success: function(data) {
                    
                   
                },
                error: function (jqXHR, exception) {
                          
                }
			});
			
			
			});
		});
	
  </script>
  <?php $k++; ?>
@empty
@endforelse
</table>
</form>


 