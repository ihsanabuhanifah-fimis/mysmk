












<div class="container-fluid">
<h2 class="text-center font-weight-bold mb-4 mt-4">{{$materi->submateri}}</h2>
@if($materi->youtube != NULL)
<div class="embed-responsive embed-responsive-16by9"> 
    <iframe width="480" height="315"
        src="https://www.youtube.com/embed/{{$materi->youtube}}?modestbranding=1&rel=0&iv_load_policy=3&enablejsapi=1" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen>
        
    </iframe>

    </div> 

@endif
@if($materi->isi_materi != NULL)

<h4 class="text-center mt-3 font-weight-bold">Penjelasan</h4>
<div class="p-3 table-responsive ">{!!$materi->isi_materi!!}</div>
@endif
</div>
