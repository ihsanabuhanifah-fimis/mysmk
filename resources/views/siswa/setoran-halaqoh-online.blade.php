<?php $jml= count($halaqoh) ;?>

<style>

.font-kecil{
    font-size:12px;
}


</style>
@if($jml == NULL)
<td>Belum Setoran Hafalan</td>

@else
<div class="div-inline">
<p class="font-kecil">


<b> Surat  {{$halaqoh[0]->surat_mulai}} ayat {{$halaqoh[0]->ayat_mulai}}  </b> 
 sampai

<b> Surat {{$halaqoh[1]->surat_akhir}} ayat {{$halaqoh[1]->ayat_akhir}} </>

</p>
</div>   
@if($halaqoh[0]->check == 2)
<div class="div-inline">
<button data-toggle="modal" data-target="#staticBackdrop{{$halaqoh[0]->id}}" class="btn btn-success komentar-ustadz">Lihat Komentar</button></td>
@else

</div>
@endif
@endif



<div class="modal fade" id="staticBackdrop{{$halaqoh[0]->id}}" data-backdrop="static" data-keyboard="false" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Komentar Pembimbing Halaqoh</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body text-justify ">
      <div class="p-2"> {{$halaqoh[0]->komentar}}</div>
       
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
        
      </div>
    </div>
  </div>
</div>