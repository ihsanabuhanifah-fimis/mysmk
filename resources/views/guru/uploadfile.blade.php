
<div class="container">
 
  <form action="{{ url('upload') }}" enctype="multipart/form-data" method="POST">
    <div class="alert alert-danger print-error-msg" style="display:none">
      <ul></ul>
    </div>

   

    <input type="hidden" name="_token" value="{{ csrf_token() }}">
    

      <div class="form-group">
      <label>Gambar:</label>
      <input type="file" name="gambar" class="form-control ">
    </div>
    <div class="link text-center"></div>
    <p><i>Silahkan copy paste link di atas</i></p>
    <div class="form-group ">
      <button class="btn btn-success upload-image" type="submit">Kirim</button>
    </div>
  </form>

  <hr>
  

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script src="http://malsup.github.com/jquery.form.js"></script>
<script type="text/javascript">
  $("body").on("click",".upload-image",function(e){
    $(this).parents("form").ajaxForm(options);
  });

  var options = { 
    complete: function(response) 
    {
        if($.isEmptyObject(response.responseJSON.error)){
            $("input[name='judul']").val('');
        $(".tampil").css('display','block');
            $('.link').addClass('alert alert-success');
            $('.link').text('/gambar/'+response.responseJSON.gambar);
        }else{
            printErrorMsg(response.responseJSON.error);
        }
    }
  };

  function printErrorMsg (msg) {
    $(".print-error-msg").find("ul").html('');
    $(".print-error-msg").css('display','block');
    $.each( msg, function( key, value ) {
        $(".print-error-msg").find("ul").append('<li>'+value+'</li>');
    });
  }
</script>