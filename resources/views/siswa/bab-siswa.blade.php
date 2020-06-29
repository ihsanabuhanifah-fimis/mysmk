@extends('siswa.layout.master')
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

<div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">  <h5>BAB : {{$bab->nama_bab}}</h5></div>
                            @forelse ($materis as $materi)
                            <a id="{{$materi->id}}" class="nav-link menu-dashboard" >
                            {{$materi->submateri}}
                              </a >
                                                                
                                <script>
                                $(document).ready(function(){
                                    var id
                                  $("#{{$materi->id}}").on('click',function(){

                                    id = $(this).attr('id');
                                  
                                    $.ajax({
                                          url:"/siswa/materi/akses/"+id,
                                          success:function(data){
                                          $(".akses-materi").html(data);
                                          
                                          }
                                    });
                                  
                                });
                                });

                                $(document).ready(function(){
                                   

                                    id = {{$materis[0]->id}};
                                  
                                    $.ajax({
                                          url:"/siswa/materi/akses/"+id,
                                          success:function(data){
                                          $(".akses-materi").html(data);
                                          
                                          }
                                    });
                                  
                                });
                                
                                
                                
                                </script>

                                  @empty
                                  @endforelse

                                <!-- menu pelajaran -->
                          
                </nav>
            </div>

            <!-- konten -->
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                      <!-- awal dashboard -->

                      <!-- awal pelajaran -->
                     



                      <!-- akhir menu materi -->
                      <div class="akses-materi"></div>
                        <!-- akhir dahsboard -->
                    </div>
                </main>
                <footer class="bg-light py-2">
            <div class="container"><div class="small text-center text-muted">Copyright © 2020 - Ihsanabuhanifah</div></div>
        </footer>
            </div>
        </div>
<script src="/js/siswa.js"></script>
<script src="/js/menu-siswa.js"></script>
@endsection