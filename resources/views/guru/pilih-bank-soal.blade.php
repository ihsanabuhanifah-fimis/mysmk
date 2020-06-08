
<style>
img{
    display:none;
}
.hide{
    display:none;
}
</style>

@forelse ($datas as $data1) 
<!-- //Pengulangan judul -->
<h6 class="mt-3">Materi : {{$data1[0]}}</h6>

<?php $i=0 ;?>
<div class="alert alert-success list ">
  @forelse($data1 as $soal2)
  

    @if($i!=0)
  <?php $a=$key ;$b=$key ; $c=$key; ?>
    @forelse ($soal2 as $soal)
   
    @if($soal->t == "pg")
    @if($soal->s !== "xr")
    <div class="mb-1 border form-control list-item alert-primary"  draggable="true">
    <div>{!!$soal->s!!}</div>
    <!-- awal -->
    
    <div class=" soalpg{{$loop->iteration}} hide border btn-group-toggle p-4 mt-4 mb-4 bg-white rounded-lg">
    
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
    
    <input type="hidden" name="nomor_soal[]" value="{{$a}}">
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
    <!-- //akhir dari pilihan ganda -->
      <?php $a++; ?>
    @endif
    @elseif($soal-> t== "isi")
    @if($soal->s !== "xr")
    <div class="mb-1 border form-control list-item alert-warning"  draggable="true">
    <h6>{{$soal->s}}</h6>
    <!-- awal -->
    <div class="soal-isian border btn-group-toggle p-4 mt-4 mb-4 bg-white hide rounded-lg">
    
    <div class="mb-4 d-flex justify-content-between ">
    <div>
    <label for="skor" class="font-weight-bold">Berikan skor :</label>
    <select class="btn border-success" name="skor2[]" id="skor">
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
    <button type="button" id="" class="btn btn-outline-danger hapus-isian">Hapus soal</button>

    </div>
    <textarea class="summernote" name="soal2[]">{{$soal->s}}</textarea>
    <input type="hidden" name="nomor_soal2[]" value="{{$b}}">
    <div class="mt-3">
    <label for="isi1[]">Kunci Jawaban 1</label>
    <input class="form-control" type="text" value="{{$soal->a}}" name="isi1[]" id="isi1[]" />
    <label for="isi2[]">Kunci Jawaban 2</label>
    <input class="form-control" type="text" value="{{$soal->b}}" name="isi2[]" id="isi2[]" />
    <label for="isi3[]">Kunci Jawaban 3</label>
    <input class="form-control" type="text" value="{{$soal->c}}" name="isi3[]" id="isi3[]" />
    </div>
    </div>
    <!-- akhir -->
    </div>
    <?php $b++ ;?>
    @endif
    @elseif($soal->t == "tf")
    @if($soal->s !== "xr")
    <div class="border form-control list-item alert-danger"  draggable="true">
    <h6>{{$soal->s}}</h6>
    <!-- awal -->
    <div class="true-false border btn-group-toggle p-4 mt-4 mb-4 bg-white hide  rounded-lg">
    <input type="hidden" name="nomor_soal3[]" value="{{$c}}">
    <div class="mb-4 d-flex justify-content-between ">
    <div>
    <label for="skor" class="font-weight-bold">Berikan skor :</label>
    <select class="btn border-success" name="skor3[]" id="skor">
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
    <button type="button" id="" class="btn btn-outline-danger hapus-true-false">Hapus soal</button>

    </div>
    <textarea class="summernote" name="soal3[]">{{$soal->s}}</textarea>

    <div class="mt-3">
    <label class="font-weight-bold" for="true-false">Pilih Jawaban</label>
    <select class="form-control" id="true-false" name="truefalse[]" id="">
        <option selected value="{{$soal->k}}"></option>   
        <option value="1">True</option>
        <option value="2">False</option>
    </select>
    </div>
</div>
    <!-- akhir -->
    </div>
  
<?php $c++ ; ;?>
    @endif
    @endif
       
    @empty
   
    @endforelse
  
    @endif
  

   
    <?php $i++ ;?>
    @empty
    @endforelse
    </div>

@empty
@endforelse


<!-- //JavaScript -->

<script src="/js/drag-drop.js"></script>
<script>
        $(document).ready(function() {
        $('.summernote').summernote();
        
        });     
    </script>