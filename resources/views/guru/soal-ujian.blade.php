@extends('guru.layout.master2')
@section('title','Soal Penilaian Teori')

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

@if($soals1[0]->s != "xr")
@forelse($soals1 as $soal)
<div class="mb-1 border form-control list-item alert-primary"  draggable="true">
    <div class="d-flex justify-content-lg-between">
    <h6>{{$soal->ns}}</h6>
    <a>Lihat</a>
    </div>
    <input value="{{$soal->ns}}" type="hidden" name="nama_soal[]" class="form-control mb-2" required>
    <!-- awal -->
    <div class=" hide soalpg{{$loop->iteration}}  border btn-group-toggle p-4 mt-4 mb-4 bg-white rounded-lg">
    
    <div class="mb-4 d-flex justify-content-between">
    <div>
    <label for="skor" class="font-weight-bold">Berikan skor :</label>
    <select class="btn border-success" name="skor[]" id="skor">
        <option class="font-weight-bold" selected value="{{$soal->v}}">{{$soal->v}}</option>
        <option value="1">1 </option>
        <option value="2">2 </option>
        <option value="3">3 </option>
        <option value="4">4 </option>
        <option value="5">5 </option>
        <option value="6">6 </option>
        <option value="7">7 </option>
        <option value="8">8 </option>
        <option value="9">9 </option>
        <option value="10">10 </option>
        
    </select>
    </div>
    <button type="button" id="{{$loop->iteration}}" class="btn btn-outline-danger hapuspg">Hapus soal</button>

    </div>
    
    <input type="hidden" name="nomor_soal[]" value="{{($soal->n)*9432}}">
    <textarea class="summernote" name="soal[]" >{{$soal->s}}</textarea>
    
    <ol class="mt-3" type="A">
    <li id="pg1">
    <div  class="form-row">
    <div class="col-md-10"><textarea class="form-control mt-2" name="pg1[]" id="" cols="100" rows="1">{{$soal->a}}</textarea></div>
    <div class="col-md-2"> <button type="button" id="hpg1" class=" btn-outline-danger mt-1 btn removepg1">hapus</button></div>
    </div>
     </li>
     <li id="pg2" >
    <div class="form-row">
    <div class="col-md-10"><textarea class="form-control mt-2" name="pg2[]" id="" cols="100" rows="1">{{$soal->b}}</textarea></div>
    <input type="hidden" name="kunci1[]" value="1">
    <div class="col-md-2"> <button type="button" id="hpg2" class=" btn-outline-danger mt-1 btn removepg1">hapus</button></>
    </div>
     </li>
     <li id="pg3">
    <div  class="form-row">
    <div class="col-md-10"><textarea class="form-control mt-2" name="pg3[]" id="" cols="100" rows="1">{{$soal->c}}</textarea></div>
    <div class="col-md-2"> <button type="button" id="hpg3" class=" btn-outline-danger mt-1 btn removepg1">hapus</button></>
    </div>
     </li>
     <li id="pg4">
    <div  class="form-row">
    <div class="col-md-10"><textarea class="form-control mt-2" name="pg4[]" id="" cols="100" rows="1">{{$soal->d}}</textarea></div>
    <div class="col-md-2"> <button type="button" id="hpg4" class=" btn-outline-danger mt-1 btn removepg1">hapus</button></div>
    </div>
     </li>
     <li id="pg1">
    <div  class="form-row">
    <div class="col-md-10"><textarea class="form-control mt-2" name="pg5[]" id="" cols="100" rows="1">{{$soal->e}}</textarea></div>
    <div class="col-md-2"> <button type="button" id="hpg5" class=" btn-outline-danger    mt-1 btn removepg1">hapus</button></div>
    </div>
     </li>
    </ol>
    <p class="font-weight-bold">Pilih Kunci Jawaban <select class="form-control" name="kuncijawaban[]" id="">
    
    



    
    @if($soal->k == 1)
    <option class="font-weight-bold" selected value="1">A</option>
    @elseif($soal->k == 2)
    <option class="font-weight-bold" selected value="2">B</option>
    @elseif($soal->k == 3)
    <option class="font-weight-bold" selected value="3">C</option>
    @elseif($soal->k == 4)
    <option class="font-weight-bold" selected value="4">D</option>
    @elseif($soal->k == 5)
    <option class="font-weight-bold" selected value="5">E</option>
  
    @endif
    <option value="1">A</option>
    <option value="2">B</option>
    <option value="3">C</option>
    <option value="4">D</option>
    <option value="5">E</option>
    </select></p>
  
    </div>
    <!-- akhir  -->
        
    </div>
@empty
@endforelse
@endif
<!-- //soal pilihan ganda -->

@if($soals2[0]->s != "xr")
<!-- soal isian singkat -->
@forelse($soals2 as $soal2)
<div class="mb-1 border form-control list-item alert-warning"  draggable="true">
<div class="d-flex justify-content-lg-between">
    <h6>{{$soal2->ns}}</h6>
    <a>Lihat</a>
    </div>
    <input value="{{$soal2->ns}}" type="hidden" name="nama_soal2[]" class="form-control mb-2" required>
    <!-- awal -->
    <div class="soal-isian border btn-group-toggle p-4 mt-4 mb-4 bg-white hide rounded-lg">
    
    <div class="mb-4 d-flex justify-content-between ">
    <div>
    <label for="skor" class="font-weight-bold">Berikan skor :</label>
    <select class="btn border-success" name="skor2[]" id="skor">
        <option class="font-weight-bold" selected value="{{$soal2->v}}">{{$soal2->v}}</option>
        <option value="1">1 </option>
        <option value="2">2 </option>
        <option value="3">3 </option>
        <option value="4">4 </option>
        <option value="5">5 </option>
        <option value="6">6 </option>
        <option value="7">7 </option>
        <option value="8">8 </option>
        <option value="9">9 </option>
        <option value="10">10 </option>
        
    </select>
    </div>
    <button type="button" id="" class="btn btn-outline-danger hapus-isian">Hapus soal</button>

    </div>
    <textarea class="summernote" name="soal2[]">{{$soal2->s}}</textarea>
    <input type="hidden" name="nomor_soal2[]" value="{{($soal2->n)*8887}}">
    
    <div class="mt-3">
    <label for="isi1[]">Kunci Jawaban 1</label>
    <input class="form-control" type="text" value="{{$soal2->a}}" name="isi1[]" id="isi1[]" />
    <label for="isi2[]">Kunci Jawaban 2</label>
    <input class="form-control" type="text" value="{{$soal2->b}}" name="isi2[]" id="isi2[]" />
    <label for="isi3[]">Kunci Jawaban 3</label>
    <input class="form-control" type="text" value="{{$soal2->c}}" name="isi3[]" id="isi3[]" />
    </div>
    </div>
</div>

@empty
@endforelse
@endif
<!-- soal isian singkat -->
@if($soals3[0]->s != "xr")
<!-- soal true false -->
@forelse($soals3 as $soal3)
<div class="border form-control list-item alert-danger"  draggable="true">
<div class="d-flex justify-content-lg-between">
    <h6>{{$soal3->ns}}</h6>
    <a>Lihat</a>
    </div>
    <input value="{{$soal3->ns}}" type="hidden" name="nama_soal3[]" class="form-control mb-2" required>
    <!-- awal -->
    <div class="true-false border btn-group-toggle p-4 mt-4 mb-4 bg-white hide  rounded-lg">
    
    <div class="mb-4 d-flex justify-content-between ">
    <div>
    <label for="skor" class="font-weight-bold">Berikan skor :</label>
    <select class="btn border-success" name="skor3[]" id="skor">
        <option class="font-weight-bold" selected value="{{$soal3->v}}">{{$soal3->v}}</option>
        <option value="1">1 </option>
        <option value="2">2 </option>
        <option value="3">3 </option>
        <option value="4">4 </option>
        <option value="5">5 </option>
        <option value="6">6 </option>
        <option value="7">7 </option>
        <option value="8">8 </option>
        <option value="9">9 </option>
        <option value="10">10 </option>
        
    </select>
    </div>
    <button type="button" id="" class="btn btn-outline-danger hapus-true-false">Hapus soal</button>

    </div>
    <textarea class="summernote" name="soal3[]">{{$soal3->s}}</textarea>
    <input type="hidden" name="nomor_soal3[]" value="{{($soal3->n)*6778}}">
    <div class="mt-3">
    <label class="font-weight-bold" for="true-false">Pilih Jawaban</label>
    <select class="form-control" id="true-false" name="truefalse[]" id="">
        <option selected value="{{$soal3->k}}"></option>   
        <option value="1">True</option>
        <option value="2">False</option>
    </select>
    </div>
</div>
</div>

@empty
@endforelse

<!-- soal true false -->
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

    <div class="hide daftar-bank-soal"></div>
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
				url: "{{route('carisoal')}}",
				data: $('#form-cari').serialize(),
				success: function(data) {
                $(".daftar-bank-soal").html(data);
                
                }
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
				url: "{{route('simpansoalujian')}}",
				data: $('#form-soal-ujian').serialize(),
				success: function(data) {
                    $(".notice-simpan-soal").addClass("alert alert-success");
                        $(".notice-simpan-soal").text(data);
                        $(".simpan-soal-ujian").text("Simpan")
                    setTimeout(function(){
                        $(".notice-simpan-soal").removeClass("alert alert-success");
                        $(".notice-simpan-soal").empty();
                        
                    }, 5000);
               
                    
                    
                
                }
            });
    });
});
</script>

<!-- //buat javascript -->

@endsection