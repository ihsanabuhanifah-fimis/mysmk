
<div class="container">
 
  <form id="imageUploadForm" action="javascript:void(0)" enctype="multipart/form-data" method="POST">
    <div class="alert alert-danger print-error-msg" style="display:none">
      <ul></ul>
    </div>

   

    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    

      <div class="form-group">
      <label><b>Upload Images</b></label>
      <input type="file" name="gambar" class="form-control ">
    </div>
    <img class="img-thumbnail img" src="" alt="">
    <div class="link text-center"></div>
    <div class="d-flex justify-content-end laer">
        <i style="font-size:10px;">Gambar tidak melebihi 100KB</i>
    </div>
    <p><i style="font-size:12px;">Silahkan copy paste link di atas</i></p>
    <div class="form-group ">
      <button class="form-control btn-success upload-image" type="submit">Simpan</button>
    </div>
  </form>

  <hr>
  

<script src="http://malsup.github.com/jquery.form.js"></script>
<script>
 
$(document).ready(function (e) {
 
$('#imageUploadForm').on('submit',(function(e) {
    $('.link').removeClass('alert alert-success');
    $('.link').removeClass('alert alert-danger');
      $('.link').empty();
      $('.upload-image').text('Menyimpan ...');
 
$.ajaxSetup({
 
headers: {
 
  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
 
}
 
});
 
e.preventDefault();
 
var formData = new FormData(this);
 
 
 
$.ajax({
 
   type:'POST',
 
   url: "{{ url('upload')}}",
 
   data:formData,
 
   cache:false,
 
   contentType: false,
 
   processData: false,
 
   success:function(data){
      $('.link').addClass('alert alert-success');
      $('.link').text(data);
      $('.img').attr('src',data);
      $('.upload-image').text('Simpan');
      document.getElementById("imageUploadForm").reset();     
 
       
 
   },
 
   error: function(data){
    $('.upload-image').text('Simpan');
    $('.link').addClass('alert alert-danger');
      $('.link').text('Upload gagal, Pastikan Koneksi Internet lancar');
      
 
   }
 
});
 
}));
 
});
 
</script> 