
<form action="javascript:void(0)" method="POST" class="FormData" enctype="multipart/form-data">
					{{ csrf_field() }}
 
					<div class="form-group">
						<b>File Gambar</b><br/>
						<input type="file" name="file">
					</div>
 
					
 
					<input type="submit" value="Upload" class="btn btn-primary upload-img">
				</form>

</div>



<script type="text/javascript">
	$(document).ready(function(){
		$(".upload-img").click(function(){
			var formData = new FormData(this);
            $.ajaxSetup({
              headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
            });
            $.ajax({
			
				type: 'post',
				url: "{{route('prosesfileupload')}}",
				data: formData,
				contentType: false,
                processData: false,
				success: function(data) {
                  alert(data);
                },
                // error: function(jqXHR, exception){
                //     var msg ="Silahkan Periksa ";
                //     $('#edit_form').html('Edit Materi');
                   
                // }
			});
			
			
			});
		});
	
  </script>