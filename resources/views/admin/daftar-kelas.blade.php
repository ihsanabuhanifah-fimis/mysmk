<div class="row row-cols-1 row-cols-md-3 mt-2 p-md-5 p-sm-0">

@forelse($rombels as $rombel)
  <div class="col mb-4">
    <div class="card">
    <div class="p-4">
      <img src="/img/kelas.jpg" class="card-img-bottom"  alt="...">
      </div>
      <div class="card-body">
        <div class="card-title text-center">
            <h6>{{$rombel->nama_rombel}}</h6>
           
            <br>
            <a class="btn btn-success text-white pilih-kelas" id="{{$rombel->id_rombel}}" >Lihat Kelas</a>
        </div>
        <!-- <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p> -->
      </div>
    </div>
  </div>
@empty
@endforelse
</div>

<script>
	$(document).ready(function(){
	  	$(".pilih-kelas").click(function(){
          var id= $(this).attr("id");
           
          $('#ModalKelas').modal();
          $.ajax({
            url:"/admin/daftar-siswa-rombel/"+id,
             beforeSend:function(){
             
          },
            success:function(data)
          {
            
            $('.data-siswa').html(data);
          }
         });
    });
    });
  
</script>
<style>
.modal-xl{
  width:90%;
}
</style>

<!-- Modal -->
<div class="modal fade" id="ModalKelas" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title text-center" id="exampleModalLabel">Daftar Santri</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="data-siswa"></div>
      </div>
      <div class="modal-footer">
      
        <button type="button" class="btn btn-primary">Keluar</button>
      </div>
    </div>
  </div>
</div>
