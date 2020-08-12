












<div class="container-fluid">
<h4 class="text-center font-weight-bold mb-5 mt-5">{{$materi->submateri}}</h4>
@if($materi->youtube != NULL)
<div class="col-sm-12 col-md-8 col-lg-8 mx-auto">
<div class="embed-responsive embed-responsive-16by9"> 
    <iframe width="480" height="315"
        src="https://www.youtube.com/embed/{{$materi->youtube}}?modestbranding=1&rel=0&iv_load_policy=3&enablejsapi=1" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen>
        
    </iframe>

    </div> 
<div>
@endif
@if($materi->isi_materi != NULL)

<h4 class="text-center mt-3 font-weight-bold">Penjelasan</h4>
<div class="p-3 table-responsive ">{!!$materi->isi_materi!!}</div>
@endif
</div>

<script>
$(document).ready(function(){
 
    $("img").addClass("img-thumbnail");
 
});
</script>
