@extends('guru.layout.master')
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

<!-- //bagian tengah -->

<div class="conteiner mt-4">
<!-- <div class="col-md-2">
<div class="upload"></div>

</div> -->
<div class="col-md-12">
<form  id="form-soal" method="post" action="{{route('editsoalpraktek')}}">
@csrf
{{method_field('PATCH')}}
<input type="hidden" name="id"  value="{{$banksoals[0]->id}}">
<textarea class="summernote" name="soal_praktek" id="" cols="30" rows="10">{{$banksoals[0]->soal_praktek}}</textarea>

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
    @endsection 