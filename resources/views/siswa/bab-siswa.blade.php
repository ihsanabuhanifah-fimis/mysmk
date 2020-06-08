@extends('siswa.layout.master')
@section('title','Materi')

@section('content')

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
<!-- awal web -->

<div class="container-fluid">
<div class="row">
 <div class="col-md-3">

 <ul class="nav flex-column">
<li class="nav-item">
<h4 class="nav-link">{{$bab->nama_bab}}</h4>
</li >
 @forelse ($materis as $materi)
  <li class="nav-item">
    <a id="{{$materi->id}}" class="nav-link active" >{{$materi->submateri}}</a>
   
<script>
$(document).ready(function(){
    var id
  $("#{{$materi->id}}").on('click',function(){

    id = $(this).attr('id');
   
    $.ajax({
          url:"/siswa/materi/akses/"+id,
          success:function(data){
           $(".akses-materi").html(data);
           
          }
    });
   
});
});
 
</script>
  </li>
  @empty
  @endforelse
  <!-- <li class="nav-item">
    <a class="nav-link" href="#">Link</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="#">Link</a>
  </li>
  <li class="nav-item">
    <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
  </li> -->
</ul></div>
 <div class="col-md-9">
 <div class="akses-materi"></div>
 </div>
</div>
</div>

@endsection