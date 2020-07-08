@extends('guru.layout.master2')
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

</div>
</div> 


<!-- isi -->
<div class="container">
<div class="kotak">
		<h3 class="text-center mt-3">
			Tambah/Edit Materi
		</h3>	
        <div class="conteiner">
        <div class="row">
        <div class="col-md-9"></div>
        <div class="col-md-2">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
            Tambah_bab
        </button>
        </div>
        <div class="col-md-1"></div>
        </div>
        <form method="post" id="contact_us" action="javascript:void(0)">
        @csrf
        @if($materi->submateri == NULL)
    <p></p>
        @else
        {{method_field('PUT')}}
        <input type="hidden" name="id" value="{{$materi->id}}">
        @endif
       
    <div class="modal-body ">
    <label for="index">Urutan Materi</label>
    <br>
    <input  class="form-control" type="number" value="{{old('index') ?? $materi->urut }}" name="index" id="index" required />
    <br>
          <label for="id_subjects">Mata Pelajaran</label>
       

          <select  class="form-control" name="id_subject" id="id_subjects">
          @if($materi->submateri != NULL)
            <option value="{{$materi->id_subject}}">{{$materi->subject_name}}</option>
          @else
            <option selected value="">--Pilih Materi--</option>
          @endif
          @forelse ($mapels as $mapel)

            <option value="{{$mapel->id_subject}}">{{$mapel->subject_name}}</option>

          @empty

          @endforelse
         
                
          </select>
          <br>
    
          <label for="id_bab">Bab</label>
          <div class="bab"></div>
          <select  class="form-control remove-select" name="id_bab" id="id_bab">
            @if($materi->submateri != NULL)
                <option class="font-weight-bold" value="{{$materi->id_bab}}">{{$materi->nama_bab}}</option>
            @endif
             
          
          </select>
         
          <br>
          <label for="mapel">Kelas</label>
          
          <select  class="form-control" name=id_rombel id="kelas">
       
          @if($materi->submateri != NULL)
         
            <option class="font-weight-bold" value="{{$materi->id_rombel}}">{{$materi->nama_rombel}}</option>
          @endif
          <option value="">-</option>
         @forelse ($rombels as $rombel)
           <option value="{{$rombel->id_rombel}}">{{$rombel->nama_rombel}}</option>
         @empty
         @endforelse
         
          </select>
          <p class="alert alert-danger"><i>(kosongkan jika materi untuk 2 kelas dalam 1 tingkat)</i></p>         
          <label for="mapel">Tingkat</label>
          
          <select  class="form-control" name="angkatan" id="angkatan">
          @if($materi->id_angkatan != NULL)

          <option class="font-weight-bold" value="{{$materi->id_angkatan}}">{{$materi->id_angkatan}}</option>
          @endif
          <option  class="font-weight-bold" value="">-</option>
          <option   value="1">1</option>
          <option   value="2">2</option>
          <option   value="3">3</option>
         
         
          </select>
          <p class="alert alert-danger"><i>(wajib diisi jika materi untuk 2 kelas dan 1 angkatan)</i></p>
          
          <label for="submateri">Submateri</label>
          
          <input required class="form-control" value="{{$materi->submateri}}" type="text" name="submateri" id="submateri" required />
          <br>
          <label for="youtube">Youtube</label>
          
          <input class="form-control" value="{{$materi->youtube }}" type="text" name="youtube" id="youtube" />  
            <br>
         
</div>


		<textarea class="summernote" name="isi_materi">{{$materi->isi_materi}}</textarea>
        <br/>
        <div class="notice text-center"></div>
    @if($materi->submateri == NULL)
    <button id="send_form" class="form-control btn btn-primary" type="submit" name="tambah">Simpan Materi</button>
    @else
        <button id="edit_form" class="form-control btn btn-primary" type="submit" name="Edit">Edit Materi</button>
    @endif
    </div>
    </form>
    </div>
    </div>
    </div> 
 
    <script type="text/javascript">
	$(document).ready(function(){
		$("#send_form").click(function(){
            $('#send_form').html('Bismillah sedang menyimpan data..');
            $('.notice').empty();
            $(".notice").removeClass("alert alert-success text-center")
            $.ajaxSetup({
              headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
            });
            $.ajax({
				type: 'POST',
				url: "{{route('savemateri')}}",
				data: $('#contact_us').serialize(),
				success: function(data) {
                    $('#send_form').html('Simpan Materi');
                    $(".notice").addClass("alert alert-success text-center")
                    $('.notice').text(data)
                    document.getElementById("contact_us").reset(); 
                    setTimeout(function(){
                    $('#res_message').hide();
                    $('#msg_div').hide();
                    },10000);
                },
                error: function(jqXHR, exception){
                    var msg ="Silahkan Periksa ";
                    $('#send_form').html('Simpan Materi');
                   
                }
			});
			
			
			});
		});
	
  </script>
   <script>
        $(document).ready(function() {
        $('.summernote').summernote();
        
        });     
    </script>


<script type="text/javascript">
	$(document).ready(function(){
		$("#edit_form").click(function(){
            $('#edit_form').html('Bismillah sedang menyimpan data..');
            $('.notice').empty();
            $(".notice").removeClass("alert alert-success text-center")
            $.ajaxSetup({
              headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
            });
            $.ajax({
				type: 'PUT',
				url: "{{route('updatemateri')}}",
				data: $('#contact_us').serialize(),
				success: function(data) {
                    $('#edit_form').html('Edit Materi');
                    $(".notice").addClass("alert alert-success text-center")
                    $('.notice').text(data)
                    document.getElementById("contact_us").reset(); 
                    setTimeout(function(){
                    $('#res_message').hide();
                    $('#msg_div').hide();
                    },10000);
                },
                error: function(jqXHR, exception){
                    var msg ="Silahkan Periksa ";
                    $('#edit_form').html('Edit Materi');
                   
                }
			});
			
			
			});
		});
	
  </script>
  

  <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Bab</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

      <form method="post" class="form_tambah_bab"  action="javascript:void(0)">
      @csrf
      <div class="notice-bab text-center"></div>
        <label for="id_subject">Mata Pelajaran</label>
        <select class="form-control" name="id_subject" id="id_subject">
            @forelse ($mapels as $mapel)

            <option  value="{{$mapel->id_subject}}">{{$mapel->subject_name}}</option>
            @empty
            @endforelse
        </select>
        <label for="id_bab">Nama Bab</label>
        <input class="form-control" required type="text" name="id_bab" id="id_bab" /> 
     
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="tambah_bab btn btn-primary">Tambah</button>
      </div>
      </form>
    </div>
  </div>
</div>


<script type="text/javascript">
	$(document).ready(function(){
		$(".tambah_bab").click(function(){
            $(this).text("Menambahkan Bab ...");
            $("notice-bab").removeClass("alert alert-success");
            $("notice-bab").removeClass("alert alert-danger");
            $("notice-bab").empty();
            $.ajaxSetup({
              headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
            });
            $.ajax({
				type: 'post',
				url: "{{route('tambah_bab')}}",
				data: $('.form_tambah_bab').serialize(),
				success: function(data) {
                 
                    $(".notice-bab").addClass("alert alert-success");
                    $(".notice-bab").text(data);
                    $(".tambah_bab").text("Tambah");
                    document.getElementById(".id_bab").reset(); 
                    setTimeout(function(){
                        $(".notice-bab").removeClass("alert alert-success");
                         $(".notice-bab").empty();
                    },10000);
                },
                error: function(jqXHR, exception){
                        $(".notice-bab").addClass("alert alert-danger");
                        $(".notice-bab").text("Bab tidak berhasil ditambahkan");
                        $(".tambah_bab").text("Tambah");
                    setTimeout(function(){
                        $(".notice-bab").removeClass("alert alert-danger");
                        $(".notice-bab").empty();
                        
                    },5000);

                    
                   
                }
			});
			
			
			});
		});
        $("#id_subjects").change(function(){
            var a = $(this).val();
 
            $.ajax({
				type: 'get',
				url: "/guru/dapatkan_bab/"+a,
				
				success: function(data) {
                   $(".bab").html(data);
                   $(".remove-select").hide();
                }
            });
        });
  </script>

@endsection