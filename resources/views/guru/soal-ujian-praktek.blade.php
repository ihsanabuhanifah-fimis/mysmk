@extends('guru.layout.master2')
@section('title','Soal Penilaian Praktek')

@section('content')

<style>
.hide{
    display:none;
}

.cari{
    min-width:300px;
}
.bank-soal-empty{
    width:350px;
    height:400px;
    font-size:8px;

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

<style>
.dropsoal{
    min-height:500px;
}
</style>
<!-- isi -->
<div class="container-fluid card-text">
<div class="row mt-4">
<!-- bagian kiri -->
<div class="col-md-8 dropsoal">
<h5 class="text-center">Pilih Soal</h5>
<button class="btn kosongkan border d-flex justify-content-end">kosongkan</button>
<form action="javascript:void(0)" id="form-soal-ujian">
<input type="hidden" value="{{$penilaian->id}}" name="id">
@csrf
{{method_field('PUT')}}

    <div class="mt-3 mb-3 p-3 list border alert-success kosong dropsoal">
<!-- //soal pilihan ganda -->
@if($soals != NULL)

@forelse($soals as $soal)

<div class="list-item class" draggable="true">
    <div class="p-4 border text-center"><h6>MATERI UJIAN : {{$soal->m}}</h6></div>
    <input type="hidden" name="materi[]" value=" {{$soal->m}}">
    <textarea name="soal[]" class="summernote" id="" cols="30" rows="10">  {!!$soal->s!!}</textarea>
    
</div>
@empty
@endforelse

@endif



    </div>

<div class="notice-simpan-soal text-center"></div>
<button type="submit" class="btn btn-success form-control simpan-soal-ujian">simpan</button>

</form>
    
</div>
<!-- bagian tengah -->

<!-- //bagian kanan -->

<div  class="col-md-4 ">
    <form id="form-cari" action="javascript:void(0)">
        @csrf
        <div>
        <label for="">Pilih Bank Soal</label>
        <br>
        <select class="btn btn-outline-primary cari" name="cari-soal" id="">
            @forelse ($babs as $bab)
            <option value="{{$bab->id_bab}}">{{$bab->nama_bab}}</option>
            @empty
            @endforelse
        </select>
        <button class="btn btn-primary cari-soal">Cari</button>
        </div>
    </form>

    <div class="hide daftar-bank-soal mt-3"></div>
    <div class="bank-soal-empty list alert alert-warning mt-4"></div>
</div>
</div>
</div>
<script>
$(document).ready(function(){
    $(".kosongkan").click(function(){
        $(".kosong").empty();
    });
    $(".cari-soal").click(function(){
        $(".daftar-bank-soal").removeClass("hide")
        $(".bank-soal-empty").addClass("hide")
        $.ajaxSetup({
              headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
            });
            $.ajax({
				type: 'POST',
				url: "{{route('carisoal.praktek')}}",
				data: $('#form-cari').serialize(),
				success: function(data) {

                   
                $(".daftar-bank-soal").html(data);
                
                },
            });
    });
});


$(document).ready(function(){
    $(".simpan-soal-ujian").click(function(){
        $(this).text("Sedang Menyimpan ...");
        $(".notice-simpan-soal").removeClass("alert alert-success");
        $(".notice-simpan-soal").removeClass("alert alert-danger");
        $(".notice-simpan-soal").empty();
        $.ajaxSetup({
              headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
            });
            $.ajax({
				type: 'PUT',
				url: "{{route('simpansoalujianpraktek')}}",
				data: $('#form-soal-ujian').serialize(),
				success: function(data) {
                    $(".notice-simpan-soal").addClass("alert alert-success");
                        $(".notice-simpan-soal").text(data);
                        $(".simpan-soal-ujian").text("Simpan")
                    setTimeout(function(){
                        $(".notice-simpan-soal").removeClass("alert alert-success");
                        $(".notice-simpan-soal").empty();
                        
                    }, 5000);
                },
                error: function (jqXHR, exception) {
                    $('.notice-simpan-soal').addClass('alert alert-danger');
                    $('.notice-simpan-soal').text('Penyimpanan tidak berhasil');
                    $('#send_form').html('Simpan');       
                }
            });
    });
});

</script>
<script>
        $(document).ready(function() {
        $('.summernote').summernote();
        
        });     
    </script>

<!-- //buat javascript -->

@endsection

