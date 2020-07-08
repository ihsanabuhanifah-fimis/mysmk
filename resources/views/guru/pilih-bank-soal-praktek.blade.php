<style>
.class{
    overflow:auto;
}
.button{
    margin-top:4px;
}
.hide{
    display:none;
}
</style>
<div class="mb-3">
    
@forelse($soals as $soal)
<button type="button" id="{{$loop->iteration}}" class="btn btn-outline-primary button">{{$loop->iteration}}</button>
<script>
$(document).ready(function(){
    $("#{{$loop->iteration}}").click(function(){
      var id = $(this).attr('id');
      alert(id);
    
      $('#nomor_soal'+id+'').removeClass("hide");
    });

    });

</script>

@empty
@endforelse

</div>
<div class="alert alert-success list ">

@forelse($soals as $soal)


<div id="nomor_soal{{$loop->iteration}}" class="hide">
<div class="list-item class" draggable="true">
    <div class="p-4 border text-center"><h6>MATERI UJIAN : {{$soal->m}}</h6></div>
    <input type="hidden" name="materi[]" value=" {{$soal->m}}">
    <textarea name="soal[]" class="summernote" id="" cols="30" rows="10">  {!!$soal->s!!}</textarea>
    
</div>
</div>
@empty
@endforelse
</div>
<script src="/js/drag-drop.js"></script>
<script>
        $(document).ready(function() {
        $('.summernote').summernote();
        
        });     
    </script>