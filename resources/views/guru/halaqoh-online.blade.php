

<form method="put" action="">
@csrf
{{method_field('PUT')}}
<?php $jml_siswa = count($rekaman) ; ?>

<table  class="table table-responsive-sm table-bordered">
<thead>
    <tr>
        <th>No</th>
        <th>Nama</th>
        <th class="text-center">Setoran Hafalan</th>
        <th>Setoran</th>
        <th>Komentar</th>
        <th>Action</th>
    </tr>
</thead>
@forelse ($siswas as $siswa)
<tr>
<td>{{$loop->iteration}}</td>
<td>{{$siswa->nama}}</td>

<?php $i=0; ;?>

@if($jml_siswa == 0)

<td>Santri Belum Upload</td>
<td>Santri Belum Upload</td>
@else
@while($i < $jml_siswa)

@if($siswa->nis == $rekaman[$i][0]->nis)

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
<td>
  
<textarea name="komentar" id="komentar" cols="40" rows="1">{{$rekaman[$i][0]->komentar}}</textarea>

</td>
<input type="hidden" name="_token" id="token{{$rekaman[$i][0]->id}}" value="{{ csrf_token() }}">
<input type="hidden" name="id{{$rekaman[$i][0]->id}}" value="{{$rekaman[$i][0]->id}}">
@break
@endif
<?php $i++; ?>  
@endwhile

@endif


<td><button  id="" class="btn btn-danger koreksi">Belum dikoreksi</button></td>
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
@empty
@endforelse
</table>
</form>


 