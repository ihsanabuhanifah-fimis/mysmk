@extends('guru.layout.master3')
@section('title','Jawaban ')

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

<style>
    .nilai{
        min-width:80px;
    }
</style>
<div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">
                              <h6>MATERI : {{$penilaian[0]->materi}}</h6>
                              </div>
                            
                            <form action="javascript:void(0)">
                            @csrf
                          
                            <table class="table ">
                           
                            @forelse ($hasils as $hasil)
                            <tbody>
                         <tr>
                             <td>{{$loop->iteration}}</td>
                            <td>
                                <a id="{{$hasil->nama}}" class="lihat{{$loop->iteration}}" data-toggle="pill" role="tab" aria-selected="false" >
                                        {{$hasil->nama}}
                                        </a>
                                        <input type="hidden"  id="token{{$loop->iteration}}" value="{{ csrf_token() }}">
                                        <input type="hidden" id="id{{$loop->iteration}}" value="{{$penilaian[0]->id}}">
                                        <input type="hidden"  value="{{$hasil->nis}}" id="nis{{$loop->iteration}}">
                          
                             </td>
                             <td class="nilai">  <input  class="form-control" type="number" value="{{$hasil->nilai}}"></td>
                             <td>
                            <div> 
                            
                            </div>
                            </td>       
                         </tr>
                         <tr>
                             
                         </tr>
                         <script type="text/javascript">
	$(document).ready(function(){
       
        var token;
        var id; 
        var nis;
        $('.lihat{{$loop->iteration}}').click(function(){
          
        
           token = $('#token{{$loop->iteration}}').val();  
           id = $('#id{{$loop->iteration}}').val();  
           nis = $("#nis{{$loop->iteration}}").val();  
           
            $.ajax({
				type: 'POST',
				url: "{{route('jawaban.praktek')}}",
				data: {
                    "_token":token,
                    "id":id,
                    "nis":nis, 
                },
                
				success: function(data) {
                
                 $('.akses-jawaban').html(data);
                },
                error: function (jqXHR, exception) {
                 
                }
			});
			
			
			});
		});
	
  </script>
                         </tbody> 
                                                         
                                
                                  @empty
                                  @endforelse
                                  
                                  </form>
                                  
                                  </table>
                                <!-- menu pelajaran -->
                          
                </nav>
                
            </div>

            <!-- konten -->
            <div id="layoutSidenav_content">
                <main>
                  
                      <!-- awal dashboard -->

                      <!-- awal pelajaran -->
                     



                      <!-- akhir menu materi -->
                      <div class="akses-jawaban p-md-5 p-lg-5 p-xl-5 p-sm-0"></div>
                      
    
                </main>
                <footer class="bg-light py-2">
            <div class="container"><div class="small text-center text-muted">Copyright © 2020 - Ihsanabuhanifah</div></div>
        </footer>
            </div>
        </div>
        <script>
$(document).ready(function(){
    $(".simpan-nilai-ujian").click(function(){
        $(this).text("Sedang Menyimpan Nilai...");
        $(".notice-simpan-nilai").removeClass("alert alert-success");
        $(".notice-simpan-nilai").empty();
        $.ajaxSetup({
              headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
            });
            $.ajax({
				type: 'PUT',
				url: "{{route('simpannilai')}}",
				data: $('.form-nilai-ujian').serialize(),
				success: function(data){
                $(".notice-simpan-nilai").addClass("alert alert-success");
                $(".notice-simpan-nilai").text(data);
                $(".simpan-nilai-ujian").text("Simpan");
                
                setTimeout(function(){
                    $(".notice-simpan-nilai").removeClass("alert alert-success");
                    $(".notice-simpan-nilai").empty();
                }, 5000);
               
                }
            });
    });
});

</script>
@endsection