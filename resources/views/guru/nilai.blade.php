@extends('guru.layout.master2')
@section('title','nilai')

@section('content')
<style>
p{
    font-size:10px;
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
</style>
<div class="container">
<table class="table table-bordered">
<input type="hidden" name="id" value="{{$penilaians->id}}">
    <thead>
        <tr>
            <th rowspan="2" class="no text-center">No</th>
            <th rowspan="2" class="no2 text-center">NISN</th>
            <th rowspan="2" class="no3">Nama</th>
            <th rowspan="2" class="no text-center">Nilai</th>
            <th class="text-center" colspan="{{$penilaians->remidial}}">Nilai Ujian</th>
        </tr>
        </tr>
        <tr>
        <?php $a=1 ?>
        @while($a <= $penilaians->remidial)
        <th class="text-center" >Attemp {{$a}}</th>
        <?php $a++ ; ?>
        @endwhile
        <tr></tr>
    </thead>
    <tbody>
        <?php $i=0; $j=0 ;?>
        <?php $jml=count($hasils) ; ?>
        <?php $jml_nilai = count($nilai);?>
        @while($i<$jml)
        <tr>
            <td class="no text-center"><input class="form-control text-center" type="number" value="{{$i}}"></td>
            <td class="no2"><input class="form-control" type="text" name="nis[]" value="{{$hasils[$i]->s}}"></td>
           
            <td class="no3"><input class="form-control" type="text" value="ihsan">
         
            <td class="no text-center"><input class="form-control text-center" value="{{$hasils[$i]->n}}" name="nilai[]" type="text"></td>
           @forelse ($nilai as $nila)
           @if($nila->nis == $hasils[$i]->s)
            <td class="text-center">
            {{$nila->nilai}}
            <br>
            @if($nila->status == 2)
            <p> santri sedang mengerjakan, tersisa {{$nila->sisa_waktu}} menit</ptersisa>
            @endif
            </td>
            
            @endif

           @empty
           @endforelse
        </tr>
        <?php $i++; ?>
        @endwhile
    </tbody>
</table>
<div class="notice-simpan-nilai text-center"></div>
<button type="submit" class="btn btn-primary form-control simpan-nilai-ujian" name="simpan-ujian">Simpan</button>
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
@endsection