
  
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
                        <p>Silahkan baca instruksi yang diberikan oleh Ustadz pengampu dengan benar.</p>
                        <p>Silahkan Tuliskan jawaban di kolom yang sudah di sedikan</p>
                        <p>Berikut langkah-langkah untuk meembuat jawaban di soal praktek, Silahkan tontong <a href="#">disini</a></p>  
                    </div>
                    <div class="ket-simpan font-weight-bold"></div>
                      
                        <form id="form-simpan-jawaban" method="post" action="javascript:void(0)">
                        @csrf
                        <input type="hidden" name="id" value="{{$penilaians[0]->id}}">
                        <textarea class="summernote form-control" name="jawaban"></textarea>
                        <button class="form-control btn-success simpan-jawaban mt-3">Bismillah </button>
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
        $('.summernote').summernote();
        });     
    </script>
    <script src="{{ asset('js/summernote.js') }}"></script>

    <script type="text/javascript">
	$(document).ready(function(){
		$(".simpan-jawaban").click(function(){

         $(this).text('Menyimpan Jawaban ...');
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
                    $(".simpan-jawaban").text('Bismillah')
                  $('.ket-simpan').addClass('alert alert-success');
                  $('.ket-simpan').text(data);
                  setTimeout(function(){
                    $('.ket-simpan').removeClass('alert alert-danger');
                        $('.ket-simpan').removeClass('alert alert-success');
                        $('.ket-simpan').empty();
                  }, 3000);

                   
                   
                },
                error: function (jqXHR, exception) {
                    $(".simpan-jawaban").text('Bismillah')
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


@endsection

