
  
@extends('guru.layout.master2')
@section('title','Soal Praktek')

@section('content')
<div id="layoutSidenav">
            

            <!-- konten -->
            <div id="layoutSidenav_content mt-4 ">
                <main>
                    
                <div class="container-fluid mt-4 mb-3">
                    <div class="row">
                        <div class="col-md-5 col-lg-6 col-sm-12">
                            @forelse ($soals as $soal)
            
                            <div class="border p-4 card">
                                <div class="border-bottom border-black  pb-3  ">
                               
                            <table class="table table-borderless">
                                  <tr>
                                      <th>Pengampu</th>
                                      <th>:</th>
                                      <th>{{$penilaians[0]->cikgu_name}}</th>
                                  </tr>
                                  <tr>
                                      <th>Mata Pelajaran</th>
                                      <th>:</th>
                                      <th>{{$penilaians[0]->subject_name}}</th>
                                  </tr>
                                  <tr>
                                      <th>Materi Penilaian</th>
                                      <th>:</th>
                                      <th>{{$soal->m}}</th>
                                  </tr>
                            </table>
                            </div>
                            <div class="mt-2 p-2">{!!$soal->s!!}</div>
                        </div>
                        </div>
                    <div class="col-md-6 col-lg-6 col-sm-12 mt-5">
                        <div class="border border-black p-3 mb-4 card">
                        <h6><i>Bismillahirahmanirahim</i></h6>
                        <p>Perhatikan ketentuan berikut</p>
                        <ol>
                            <li>Guankan simpan progress saat ingin save jawaban ketika pengerjaan</li>
                            <li>Setiap jawaban yang sudah dikumpulkan, tidak bisa di rubah jawabannya, apapun alasannya</li>
                        </ol>
                    </div>
                 
                    <div class="d-flex justify-content-end">
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#uploadHalaqoh">
  Bagaimana Cara Mengerjakan Tugas?
</button>
</div>
                        <form id="form-simpan-jawaban" method="post" action="javascript:void(0)">
                        @csrf
                        <div class="put">
                        {{method_field('PUT')}}
                        </div>
                        <input type="hidden" name="id" value="{{$penilaians[0]->id}}">
                        <div class="media"></div>
                        <textarea class="summernote form-control" name="jawaban">{{$jawaban}}</textarea>
                        <div class="ket-prog"></div>
                        <button class="form-control btn-success simpan-progress  mt-3"> Simpan Progress </button>
                        <button class="form-control btn-success simpan-jawaban mt-3">Kumpulkan Tugas </button>
                        </form>
                    </div>
                </div>
            </div>     
            @empty
            @endforelse
      
                       
                </main>
                <footer class="bg-light py-2">
            <div class="container"><div class="small text-center text-muted">Copyright © 2020 - Ihsanabuhanifah</div></div>
        </footer>
            </div>
        </div>
        
        <script>
        $(document).ready(function() {
            $('.media').load('/media'); 
            $(".summernote").summernote();
        });     
    </script>
    <script src="{{ asset('js/summernote.js') }}"></script>
<!-- Modal -->
<div class="modal fade" id="Konfirmasi" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Konfirmasi</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <b>Apakah anda Yakin akan mengumpulkan tugas ini?
      <div class="ket-simpan font-weight-bold"></div>
     </b>
      
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
        <button type="button" class="btn btn-success kirim-jawaban">Bismillah</button>
      </div>
    </div>
  </div>
</div>
    <script type="text/javascript">
	$(document).ready(function(){
		$(".simpan-jawaban").click(function(){
            $('#Konfirmasi').modal();
        });
        	$(".kirim-jawaban").click(function(){
         $(this).text('Menyimpan Jawaban ...');
         $('.put').remove();
         $('.ket-simpan').removeClass('alert alert-danger');
         $('.ket-simpan').removeClass('alert alert-success');
        $('.ket-simpan').empty();
                 
            $.ajaxSetup({
              headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
            });
            $.ajax({
				type: 'POST',
				url: "{{route('simpan.jawaban.praktek')}}",
				data: $('#form-simpan-jawaban').serialize(),
				success: function(data) {
                    $(".kirim-jawaban").text('Bismillah')
                  $('.ket-simpan').addClass('alert alert-success');
                  $('.ket-simpan').text(data);
                  setTimeout(function(){
                    $('.ket-simpan').removeClass('alert alert-danger');
                        $('.ket-simpan').removeClass('alert alert-success');
                        $('.ket-simpan').empty();
                  }, 3000);

                   
                   
                },
                error: function (jqXHR, exception) {
                    $(".kirim-jawaban").text('Bismillah')
                  $('.ket-simpan').addClass('alert alert-danger');
                  $('.ket-simpan').text('Jawaban belum tersimpan, mohon periksa koneksi internet');
                  setTimeout(function(){
                     $('.ket-simpan').removeClass('alert alert-danger');
                    $('.ket-simpan').removeClass('alert alert-success');
                    $('.ket-simpan').empty();
                  }, 3000);

                },   
			});
			
			
			});
		});
	
  </script>
 <script type="text/javascript">
	$(document).ready(function(){
		$(".simpan-progress").click(function(){
         
        
         $(this).text('Menyimpan Progress Jawaban...');
         $('.ket-simpan').removeClass('alert alert-danger');
         $('.ket-simpan').removeClass('alert alert-success');
        $('.ket-simpan').empty();
                 
            $.ajaxSetup({
              headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
            });
            $.ajax({
				type: 'PUT',
				url: "{{route('simpan.jawaban.progress')}}",
				data: $('#form-simpan-jawaban').serialize(),
				success: function(data) {
                    $(".simpan-progress").text('Simpan Progress');
                  $('.ket-prog').addClass('alert alert-success');
                  $('.ket-prog').text(data);
                  setTimeout(function(){
                    $(".simpan-progress").text('Simpan Progress');
                        $('.ket-prog').removeClass('alert alert-success');
                        $('.ket-prog').empty();
                  }, 3000);

                   
                   
                },
                error: function (jqXHR, exception) {
                    $(".kirim-jawaban").text('Simpan Progress')
                  $('.ket-simpan').addClass('alert alert-danger');
                  $('.ket-simpan').text('Jawaban belum tersimpan, mohon periksa koneksi internet');
                  setTimeout(function(){
                     $('.ket-simpan').removeClass('alert alert-danger');
                    $('.ket-simpan').removeClass('alert alert-success');
                    $('.ket-simpan').empty();
                  }, 3000);

                },   
			});
			
        });
			});
	
	
  </script>
  <script>
$(document).ready(function(){
 
    $("img").addClass("img-thumbnail");
 
});
</script>
!-- Modal -->
<div class="modal fade" id="uploadHalaqoh" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
      <div class="modal-header">
        
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <div class="d-flex justify-content-center mb-3">
      <h3>Penjelasan Cara Mengumpulkan Tugas</h3>
      </div>
      <div class="col-sm-12 col-md-8 col-lg-8 mx-auto pb-4 mb-5">
          <div div class="embed-responsive embed-responsive-16by9"> 
            <iframe width="480" height="315"
                src="https://www.youtube.com/embed/-pI9xO9beW0?modestbranding=1&rel=0&iv_load_policy=3&enablejsapi=1" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen>
        
          </iframe>
        
          </div> 
          <div>
          
          
          </div>
          
      </div>
      
  </div>
</div>
@endsection

