

<!-- isi -->


<form action="javascript:void(0)" class="form-nilai-ujian">
@csrf
{{method_field('PUT')}}
<style>
    .no{
        max-width:40px;
    }
    .no2{
        max-width:80px;
    }
    .input{
        width:80px;
      
    }
</style>
<div class="container">
<?php $jml=count($historys) ?>
<table class="table table-bordered table-responsive-sm">
<input type="hidden" name="id" value="{{$penilaian->id}}">
    <thead class="bg-success">
        <tr>
            <th rowspan="2" class="text-center">No</th>
            <th rowspan="2" class="text-center">NISN</th>
            <th rowspan="2" class="">Nama</th>
            <th rowspan="2" class="text-center input">Nilai</th>
            <th class="text-center" colspan="{{$jml}}">History</th>
        </tr>
        <tr>
        @forelse($historys as $history)
             <th>Nilai ke- {{$loop->iteration}}</th>
        @empty
        @endforelse
        </tr>
      
    </thead>
    <tbody>
     
      @forelse($hasils as $hasil)
        <tr>
        <td class="text-center">{{$loop->iteration}}</td>
        <td class="text-center">
        {{$hasil->nis}}
        <input class="form-control" type="hidden" name="nis[]" id="nis" value="{{$hasil->nis}}" />
        </td>
        <td >
        {{$hasil->nama}}
            <input class="form-control" type="hidden" name="nama[]" id="nama" value="{{$hasil->nama}}" />
        </td>
        <td>
         
            <input class="form-control font-weight-bold input" type="text" name="nilai[]" id="nilai" value="{{$hasil->nilai}}" />
        </td>
        @if($jml == NULL)
            <td class="text-center"><b>-</b></td>
     
        @endif
      
        @forelse ($historys as $history)
        @if($hasil->nis == $history->nis)
        <td class="text-center"><b>{{$history->nilai}}</b></td>
      
        @endif
        
     
        @empty
      
        @endforelse
        </td>
      
        
        </tr>

      @empty
      @endforelse
       
  
    </tbody>
</table>
<div class="notice-simpan-nilai text-center"></div>
<button type="submit" class="btn btn-success form-control simpan-nilai-ujian" name="simpan-ujian">Simpan</button>
</form>
</div>

<script>
$(document).ready(function(){
    $(".simpan-nilai-ujian").click(function(){
        $(this).text("Sedang Menyimpan Nilai...");
        $(".notice-simpan-nilai").removeClass("alert alert-success");
        $(".notice-simpan-nilai").empty();
        $.ajaxSetup({
              headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
            });
            $.ajax({
				type: 'PUT',
				url: "{{route('simpannilai')}}",
				data: $('.form-nilai-ujian').serialize(),
				success: function(data){
                $(".notice-simpan-nilai").addClass("alert alert-success");
                $(".notice-simpan-nilai").text(data);
                $(".simpan-nilai-ujian").text("Simpan");
                
                setTimeout(function(){
                    $(".notice-simpan-nilai").removeClass("alert alert-success");
                    $(".notice-simpan-nilai").empty();
                }, 5000);
               
                }
            });
    });
});

</script>
