
<div class="container-fluid">
<h3 class="text-center font-weight-bold mb-4">{{$materi->submateri}}</h3>
@if($materi->youtube != NULL)
<iframe width="1080" height="560"
        src="https://www.youtube.com/embed/{{$materi->youtube}}?modestbranding=1&rel=0&iv_load_policy=3&enablejsapi=1" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen>
        
</iframe>
@endif
@if($materi->isi_materi != NULL)

<h4 class="text-center mt-3 font-weight-bold">Penjelasan</h4>
<div class="p-3">{!!$materi->isi_materi!!}</div>
@endif
</div>
