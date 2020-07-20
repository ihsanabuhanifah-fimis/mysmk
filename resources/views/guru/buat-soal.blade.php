@extends('guru.layout.master2')
@section('title','Bank Soal')

@section('content')
<div class="bg-light">
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
<style>
    .navigasi{
        position:fixed;
        z-index:999;
        right:0px;  
        top:300px;
        
    }
    .fonts{
        font-size:11px;
    }
</style>
<div class=" bg-white float-right navigasi border p-3">
<h6 class="text-center mb-4">Navbar</h6>
<div class="mt-3 text-center mb-3 border p-1 rounded"><a class="preview" id="{{$banksoals[0]->id}}">Preview</a></div>
<div class="fonts">

<div class="mb-3">
<div class=" text-center border p-1 rounded"><a class="p-2 hide-pg rounded bg">Soal Pilihan Ganda</a></div>
<br>
<div class="text-center border p-1 rounded"><a class="p-2 hide-isi rounded bg"> Soal Isian Singkat</a></div>
<br>
<div class="text-center border p-1 rounded"><a class="p-2 hide-true-false rounded bg">Soal True False</a></div>


</div>

</div>
</div>
<style>
    a{
        text-decoration:none;
    }
</style>
<div class="container  ">
<div class="navpdf  sticky-top d-flex justify-content-lg-between">
<a href="/guru/banksoal/pdf/{{$banksoals[0]->id}}">Export PDF</a>
<a href="javascript:void(0)" class="kunci-jawaban">Kunci Jawaban</a>
<a href="javascript:void(0)" class="kembali"> Kembali</a>
</div>
<div class="row-fluid create-soal mt-3 sticky-top ">
    <div>
    <div class="card">
  <h5 class="card-header bg-primary"></h5>
  <div class="card-body">
  <div class="d-flex justify-content-between">
    <div>
    <h5 class="card-title">{{$banksoals[0]->subject_name}}</h5>
    <p class="card-text"></p>
    </div>
    <div>
    <h6 class="text-left"> Jumlah soal {{count($soals)}}</h6>
    <select class="btn border-secondary" name="" id="tambahsoal">
            <option selected value="0">--    Tambahkan Soal --</option>
            <option  value="1">Pilihan Ganda</option>
            <option  value="2">Isian Singkat</option>
            <option value="3">True False</option>
            <option value="4">Multiple Choise</option>
        </select>
        </div>
    </div>
  </div>
</div>
    </div>
</div>
<div class="container-fluid preview-soal border btn-group-toggle p-4 mt-4 mb-4 bg-white rounded-lg">
<div class="previews"></div>
<div>
<div class="container create-soal">

    
    
    <!-- javascript:void(0) -->
    <form  id="form-soal" method="post" action="{{route('editsoal')}}">
    @csrf
    {{method_field('PATCH')}}
    <!-- awal soal pilihan ganda -->
    
    
    <input type="hidden" name="id"  value="{{$banksoals[0]->id}}">
    <?php $i=1 ;?>
    @if($soals[0]->s !== "xr")
    @forelse ($soals as $soal)
    <div class="soalpg{{$loop->iteration}} hidepg  border btn-group-toggle p-4 mt-4 mb-4 bg-white rounded-lg">
   <label for="nama_soal"><b>Nama Soal </b></label>
    <input value="{{$soal->ns}}" type="text" name="nama_soal[]" class="form-control mb-2" required>
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
    
    <input type="hidden" name="type" value="1">
    <div class="media mb-3"></div>
    <textarea class="summernote form-control" name="soal[]" >{{$soal->s}}</textarea>
   
    
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
   @empty
   <?php $i++ ; ?>
   @endforelse
   @endif
     
   <!-- //akjir soal pg -->
   <?php $a=1000  ;?>
   @if($soals2[0]->s !== "xr")
   @forelse ($soals2 as $soal2)
   <div class="soal-isian{{$a}} hideisi border btn-group-toggle p-4 mt-4 mb-4 bg-white  rounded-lg">
   <label for="nama_soal"><b>Nama Soal </b></label>
    <input type="text" value="{{$soal2->ns}}" name="nama_soal2[]" class="form-control mb-2" required>
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
    <button type="button" id="{{$a}}" class="btn btn-outline-danger hapus-isian">Hapus soal</button>

    </div>
    <div class="media mb-3"></div>
    <textarea class="summernote form-control" cols="100" rows="1" name="soal2[]">{{$soal2->s}}</textarea>
    
    <div class="mt-3">
    <label for="isi1[]">Kunci Jawaban 1</label>
    <input class="form-control" type="text" value="{{$soal2->a}}" name="isi1[]" id="isi1[]" />
    <label for="isi2[]">Kunci Jawaban 2</label>
    <input class="form-control" type="text" value="{{$soal2->b}}" name="isi2[]" id="isi2[]" />
    <label for="isi3[]">Kunci Jawaban 3</label>
    <input class="form-control" type="text" value="{{$soal2->c}}" name="isi3[]" id="isi3[]" />
</div>
    </div>
    <?php $a++ ;?>
@empty
@endforelse
@endif
   <!-- akhir  soal isian singkat -->

   <!-- soal true false -->
<?php $b=10000 ;?>
@if($soals3[0]->s !== "xr")
@forelse ($soals3 as $soal3)
   <div class="true-false{{$b}} hidetrue-false border btn-group-toggle p-4 mt-4 mb-4 bg-white  rounded-lg">
   <label for="nama_soal"><b>Nama Soal </b></label>
    <input value="{{$soal3->ns}}" type="text" name="nama_soal3[]" class="form-control mb-2" required>
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
    <button type="button" id="{{$b}}" class="btn btn-outline-danger hapus-true-false">Hapus soal</button>

    </div>
    <div class="media mb-3"></div>
    <textarea class="summernote form-control" cols="100" rows="1" name="soal3[]">{{$soal3->s}}</textarea>
   
    <div class="mt-3">
    <label class="font-weight-bold" for="true-false">Pilih Jawaban</label>
    <select class="form-control" id="true-false" name="truefalse[]" id="">
    @if($soal3->k == 1)
        <option selected value="1">True</option>
    @else    
    <option selected value="2">False</option>
    @endif
        <option   option value="1">True</option>
        <option value="2">False</option>
    </select>
    </div>
</div>
<?php $b++ ;?>
@empty
@endforelse
@endif
   <!-- Akhr soal true false -->
   <!-- Soal Multiple chois -->
   <!-- <div class="true-false border btn-group-toggle p-4 mt-4 mb-4 bg-white border-primary rounded-lg">
    
    <div class="mb-4 d-flex justify-content-between ">
    <div>
    <label for="skor" class="font-weight-bold">Berikan skor :</label>
    <select class="btn border-success" name="skor4[]" id="skor">
        <option class="font-weight-bold" selected value=""></option>
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
    <textarea id="summernote form-control" cols="120" rows="8" name="soal4[]"></textarea>
    <div class="mt-3">
        <div>
            
        <label for="pilihan1"></label>
        <button type="button" class="btn btn-primary rounded-circle mb-3 tambah-opsi">+</button>
        <div  class="form-row ops mt-2">
        <div class="col-md-10"><textarea class="form-control" name="mc1[]" id="" cols="100" rows="1"></textarea></div>
        <div class="col-md-1"> <input type="checkbox" id="kc1[]" value="1" class="form-control"></input> </div>
        <div class="col-md-1"><button class="btn btn-remove btn-outline-danger">hapus</button></div>
        </div>
        <div class="opsi"></div>
    </div>
    </div>
</div> -->
    <!-- Soal Multiple chois -->
    <div class="tambahsoal"></div>
    
    
    </div>
    <div class="succest"></div>
    <button type="submit" id="siempan-soal" class="create-soal form-control btn btn-success simpansoal mt-3 ">Simpan</button>
    </form>
   
    <script>
        $(document).ready(function() {
        $('.media').load('/media');
        $('.summernote').summernote();
        $(".upload").load("/file-upload");
        
        });     
    </script>
    <script src="/js/summernote.js"></script>

<script>
    $(document).ready(function(){
        var j=2;
    $(".tambah-opsi").click(function(){
        j++;
  $(".opsi").append('<div  class="form-row ops'+j+' mt-2"><div class="col-md-10"><textarea class="form-control" name="mc'+j+'[]" cols="100" rows="1"></textarea></div><div class="col-md-1"> <input type="checkbox" id="kc'+j+'[]" value="'+j+'" class="form-control"></input> </div><div class="col-md-1"><button type="button" id="'+j+'" class="btn btn-remove btn-outline-danger">hapus</button></div></div>');
 
});
$(document).on('click','.btn-remove',function(){
    var button_id=$(this).attr("id");
    $(".ops"+button_id+"").remove();
    
        });
    });
</script>

    <script type="text/javascript">
    $(document).ready(function(){
        var i=1;
  $("#tambahsoal").change(function(){
      i++;
    var a = $(this).val();
    if(a==1){  
    $(".tambahsoal").append('<div class="soalpg'+i+' hidepg  border btn-group-toggle p-4 mt-4 mb-4 bg-white border-primary rounded-lg">  <label for="nama_soal"><b>Nama Soal </b></label> <input type="text" name="nama_soal" class="form-control mb-2" required><div class="mb-4 d-flex justify-content-between "><div><label for="skor" class="font-weight-bold">Berikan skor :</label><select class="btn ml-2 border-success" name="skor[]" id="skor"><option selected value="1">1 </option><option value="2">2 </option><option value="3">3 </option><option value="4">4 </option><option value="5">5 </option><option value="6">6 </option><option value="7">7 </option><option value="8">8 </option><option value="9">9 </option><option value="10">10 </option></select></div><button type="button" id="'+i+'" class="btn btn-outline-danger hapuspg">Hapus soal</button></div><div class="media mb-3"></div><textarea cols="120" rows="8" id="summernote form-control" name="soal[]" ></textarea><ol type="A"><li id="pg1"><div  class="form-row"><div class="col-md-10"><textarea class="form-control mt-2" name="pg1[]" id="" cols="100" rows="1"></textarea></div><div class="col-md-2"> <button type="button" id="hpg1" class=" btn-outline-danger mt-1 btn removepg1">hapus</button></div></div></li><li id="pg2" ><div class="form-row"><div class="col-md-10"><textarea class="form-control mt-2" name="pg2[]" id="" cols="100" rows="1"></textarea></div><input type="hidden" name="kunci1[]" value="1"><div class="col-md-2"> <button type="button" id="hpg2" class=" btn-outline-danger mt-1 btn removepg1">hapus</button></></div></li><li id="pg3"><div  class="form-row"><div class="col-md-10"><textarea class="form-control mt-2" name="pg3[]" id="" cols="100" rows="1"></textarea></div><div class="col-md-2"> <button type="button" id="hpg3" class=" btn-outline-danger mt-1 btn removepg1">hapus</button></></div></li><li id="pg4"><div  class="form-row"><div class="col-md-10"><textarea class="form-control mt-2" name="pg4[]" id="" cols="100" rows="1"></textarea></div><div class="col-md-2"> <button type="button" id="hpg4" class=" btn-outline-danger mt-1 btn removepg1">hapus</button></div></div></li><li id="pg1"><div  class="form-row"><div class="col-md-10"><textarea class="form-control mt-2" name="pg5[]" id="" cols="100" rows="1"></textarea></div><div class="col-md-2"> <button type="button" id="hpg5" class=" btn-outline-danger    mt-1 btn removepg1">hapus</button></div></div></li></ol><p class="font-weight-bold">Pilih Kunci Jawaban <select class="form-control" name="kuncijawaban[]" id=""><option class="font-weight-bold" selected value="""></option><option value="1">A</option><option value="2">B</option><option value="3">C</option><option value="4">D</option><option value="5">E</option></select></p></div>');
    } else if(a==2){
    $(".tambahsoal").append('<div class="soal-isian'+i+' hideisi border btn-group-toggle p-4 mt-4 mb-4 bg-white border-primary rounded-lg">  <label for="nama_soal"><b>Nama Soal </b></label><input type="text" name="nama_soal2[]" class="form-control mb-2" required><div class="mb-4 d-flex justify-content-between "><div><label for="skor2" class="font-weight-bold">Berikan skor :</label><select class="ml-2 btn border-success" name="skor2[]" id="skor"></option><option selected value="1">1 </option><option value="2">2 </option><option value="3">3 </option><option value="4">4 </option><option value="5">5 </option><option value="6">6 </option><option value="7">7 </option><option value="8">8 </option><option value="9">9 </option><option value="10">10 </option></select></div><button type="button" id="'+i+'" class="btn btn-outline-danger hapus-isian">Hapus soal</button></div><textarea id="summernote form-control" cols="120" rows="8" name="soal2[]"><div class="media mb-3"></div></textarea><div class="mt-3"><label for="isi1[]">Kunci Jawaban 1</label><input class="form-control" type="text" name="isi1[]" id="isi1[]" /><label for="isi2[]">Kunci Jawaban 2</label><input class="form-control" type="text" name="isi2[]" id="isi2[]" /><label for="isi3[]">Kunci Jawaban 3</label><input class="form-control" type="text" name="isi3[]" id="isi3[]" /></div></div>') 
    }else if(a==3){
    $(".tambahsoal").append('<div class="true-false'+i+' hidetrue-false border btn-group-toggle p-4 mt-4 mb-4 bg-white border-primary rounded-lg">  <label for="nama_soal"><b>Nama Soal </b></label><input type="text" name="nama_soal3[]" class="form-control mb-2" required><div class="mb-4 d-flex justify-content-between "><div><label for="skor" class="font-weight-bold">Berikan skor :</label><select class="btn ml-2 border-success" name="skor3[]" id="skor"></option><option selected value="1">1 </option><option value="2">2 </option><option value="3">3 </option><option value="4">4 </option><option value="5">5 </option><option value="6">6 </option><option value="7">7 </option><option value="8">8 </option><option value="9">9 </option><option value="10">10 </option></select></div><button type="button" id="'+i+'" class="btn btn-outline-danger hapus-true-false">Hapus soal</button></div><textarea id="summernote form-control" cols="120" rows="8" name="soal3[]"><div class="media mb-3"></div></textarea><div class="mt-3"><label class="font-weight-bold" for="true-false">Pilih Jawaban</label><select class="form-control" id="true-false" name="truefalse[]" id=""><option value="1">True</option><option value="2">False</option></select></div></div>')
    }else if(a==4){
    $(".tambahsoal").append('<div class="true-false border btn-group-toggle p-4 mt-4 mb-4 bg-white border-primary rounded-lg"><div class="mb-4 d-flex justify-content-between "><div><label for="skor" class="font-weight-bold">Berikan skor :</label><select class="btn border-success" name="skor4[]" id="skor"><option selected value="1">1 </option><option value="2">2 </option><option value="3">3 </option><option value="4">4 </option><option value="5">5 </option><option value="6">6 </option><option value="7">7 </option><option value="8">8 </option><option value="9">9 </option><option value="10">10 </option></select></div><button type="button" id="" class="btn btn-outline-danger hapus-true-false">Hapus soal</button></div> <textarea id="summernote" name="soal4[]"></textarea><div class="mt-3"><div><label for="pilihan1"></label><button type="button" class="btn btn-primary rounded-circle mb-3 tambah-opsi">+</button><div  class="form-row ops mt-2"><div class="col-md-10"><div class="media mb-3"></div><textarea class="form-control" name="mc1[]" id="" cols="100" rows="1"></textarea></div><div class="col-md-1"> <input type="checkbox" id="kc1[]" value="1" class="form-control"></input> </div><div class="col-md-1"><button class="btn btn-remove btn-outline-danger">hapus</button></div></div><div class="opsi"></div></div></div>')
    }
    $(this).val('0');
    });
    $(document).on('click','.hapuspg',function(){
    var button_id=$(this).attr("id");
    $(".soalpg"+button_id+"").remove();
    
        });
    $(document).on('click','.hapus-isian',function(){
    var button_id=$(this).attr("id");
    $(".soal-isian"+button_id+"").remove();
    
        });
    $(document).on('click','.hapus-true-false',function(){
    var button_id=$(this).attr("id");
    $(".true-false"+button_id+"").remove();
    
        });
       
    });

    </script>

<script type="text/javascript" async src="https://cdn.mathjax.org/mathjax/latest/MathJax.js?config=TeX-AMS_HTML"></script>


	<script src="/js/summernote.js"></script>
	<script>
		$(document).ready(function() { 
            $(".navpdf").hide();
            $(".kembali").click(function(){
                $(".create-soal").show();
                $(".previews").hide();
                $(".navpdf").hide();
            });  
            $('.kunci-jawaban').click(function(){
                $(".kunci").toggle();
            });
           
			$('.summernote').summernote({ 
                         });
                
                    }); 
	</script>

<script>
        $(document).ready(function() {
        $('.hide-pg').click(function(){;
         $(".hidepg").toggle();
        });
       
        $('.hide-isi').click(function(){;
         $(".hideisi").toggle();
        });
        
        $('.hide-true-false').click(function(){;
         $(".hidetrue-false").toggle();
        
        });
        
        });     
    </script>

    </div>

 

@endsection