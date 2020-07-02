@extends('guru.layout.master2')
@section('title','Home')

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
<div class="container ">
<div class="row-fluid mt-3 sticky-top ">
    <div>
    <div class="card">
  <h5 class="card-header bg-primary"></h5>
  <div class="card-body">
  <div class="d-flex justify-content-between">
    <div>
    <h5 class="card-title">{{$banksoals[0]->subject_name}}</h5>
    <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
    </div>
    <div>

    <select class="btn border-secondary" name="" id="tambahsoal">
            <option selected value="0">--    Tambahkan Soal --</option>
            <option  value="1">Soal Praktek</option>
            
        </select>
        
        </div>
    </div>
  </div>
</div>
</div>
</div>

<!-- //bagian tengah -->

<div class="conteiner mt-4">
<!-- <div class="col-md-2">
<div class="upload"></div>

</div> -->
<div class="col-md-12">
<form  id="form-soal" method="post" action="{{route('editsoalpraktek')}}">
<input type="hidden" name="id"  value="{{$banksoals[0]->id}}">
@csrf
{{method_field('PATCH')}}
@forelse($soal_prakteks as $soal_praktek)
<div class="border p-3 mb-4 soal-no-{{$loop->iteration}}">
<div class="mb-4 d-flex justify-content-end ">
  
    <button type="button" id="{{$loop->iteration}}" class="btn btn-outline-danger hapus">Hapus soal</button>

    </div>
<div class="mb-3">
<label for="">Materi</label>
<br>
<input class="form-control" required name="materi[]" type="text" placeholder="materi..." value="{{$soal_praktek->m}}">
</div>

<div class="p-3">
<textarea class="summernote" name="soal[]" id="" cols="30" rows="10">{{$soal_praktek->s}}</textarea>

</div>
</div>
@empty
@endforelse

<div class="soal"></div>
<button type="submit" class="form-control btn btn-success">Simpan</button>
</form>
</div>


</div>

<!-- //bagian tengah -->

    <script src="/js/"></script>
    <script>
        $(document).ready(function() {
        $('.summernote').summernote();
        // $(".upload").load("/file-upload");
        
        });     
    </script>
    <script src="/js/summernote.js"></script>
    


    <script type="text/javascript">
    $(document).ready(function(){
        var i=100;
  $("#tambahsoal").change(function(){
      i++;
     
    var a = $(this).val();
    if(a==1){  
    $(".soal").append('<div class="border p-3 mb-4 soal-no-'+i+'"><div class="mb-4 d-flex justify-content-end "><button type="button" id="'+i+'" class="btn btn-outline-danger hapus">Hapus soal</button></div><div class="mb-3"><label for="">Materi</label><br><input class="form-control" required name="materi[]" type="text" placeholder="materi..."></div><div class="p-3"><textarea class="summernote" name="soal[]" id="" cols="30" rows="10"></textarea></div></div>');
    }
    $(this).val('0');
    });
  
$(document).on('click','.hapus',function(){
    var button_id=$(this).attr("id");
    $(".soal-no-"+button_id+"").remove();
    
        });
       
    });

    </script>

    @endsection 