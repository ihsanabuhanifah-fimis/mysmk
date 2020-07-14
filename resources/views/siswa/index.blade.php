@extends('siswa.layout.master')
@section('title','Home')

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

   

<div id="layoutSidenav" >
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav p">
                            <div class="sb-sidenav-menu-heading">MySMK</div>
                            <a data-toggle="pill" role="tab" aria-selected="false" class="nav-link active  menu-dashboard " 
                                ><div class="sb-nav-link-icon"><i class="fa fa-lg fa-user-circle mr-2"></i></div>
                                Profil Santri</a >
                                <a class="nav-link menu-jadwal"  data-toggle="pill" role="tab" aria-selected="false"
                                ><div class="sb-nav-link-icon"><i class="fa fa-lg fa-calendar mr-2" aria-hidden="true"></i></div>
                                Jadwal Pelajaran</a >
                                <a data-toggle="pill" role="tab" aria-selected="false" class="nav-link collapsed menu-mapel" 
                                ><div class="sb-nav-link-icon "><i class="fas fa-lg  fa-book mr-2"></i></div>
                                Mata Pelajaran 
                               
                              </a>
                              <a data-toggle="pill" role="tab" aria-selected="false" class="nav-link collapsed menu-tugas" 
                                ><div class="sb-nav-link-icon "><i class="fa fa-lg mr-2 fa-bullhorn" aria-hidden="true"></i></div>
                                Tugas
                               
                              </a>
                                <!-- menu pelajaran -->
                            <div class="sb-sidenav-menu-heading">Menu</div>
                            <a data-toggle="pill" role="tab" aria-selected="false" class="nav-link collapsed menu-pelajaran" 
                                ><div class="sb-nav-link-icon "><i class="fa fa-lg mr-2 fa-laptop" aria-hidden="true" ></i></div>Materi Pelajaran
                            
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                
                            </div>

                            <!-- menu materi -->
                                <!-- menu materi -->
                         
                            <a data-toggle="pill" role="tab" aria-selected="false" class="nav-link collapsed menu-jadwal-ujian-teori" aria-expanded="false" aria-controls="collapseLayouts"
                                ><div class="sb-nav-link-icon "><i class="fa fa-lg mr-2 fa-edit" aria-hidden="true"></i></div>
                                Penilaian Teori
                                
                            </a>
                            <a data-toggle="pill" role="tab" aria-selected="false" class="nav-link collapsed menu-jadwal-ujian-praktek" aria-expanded="false" aria-controls="collapseLayouts"
                                ><div class="sb-nav-link-icon "><i class="fa fa-lg mr-2 fa-edit" aria-hidden="true"></i></div>
                                Penilaian Praktek
                               
                            </a>
                            <a data-toggle="pill" role="tab" aria-selected="false" class="nav-link collapsed menu-harian" aria-expanded="false" aria-controls="collapseLayouts"
                                ><div class="sb-nav-link-icon "><i class="fa fa-list-ul fa-lg mr-2" aria-hidden="true"></i></div>
                                Kegiatan Harian
                               
                            </a>

                            <!-- menu materi -->
                           
                            <a data-toggle="pill" role="tab" aria-selected="false"  class="nav-link collapsed menu-halaqoh-online" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages"
                                ><div class="sb-nav-link-icon"><i class="fa fa-book fa-lg mr-2" aria-hidden="true"></i></div>
                                Halaqoh Online
                               
                            </a>
                            
                           
                        </div>
                    </div>
                   
                </nav>
            </div>
         
            <!-- konten -->
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                      <!-- awal dashboard -->

                      <!-- awal pelajaran -->
                      <div class="tampilkan-menu-pelajaran">
                        <div class="tampilkanpelajaran"></div>
                      </div>
                       <!-- awal pelajaran -->
                      <!-- awal materi -->
                      <div class="tampilkan-menu-jadwal-ujian-teori">
                      
                  
                      <div class="tampilkan-ujian-teori"></div>
                      </div>

                      <div class="tampilkan-menu-jadwal-ujian-praktek">
                      
                      <div class="tampilkan-ujian-praktek"></div>
                   
                      </div>

                      <div class="tampilkan-halaqoh-online"></div>

                      <div id="menu-jadwal"></div>
                      <div id="menu-mapel"></div>
                      <div id="menu-harian"></div>

                      <!-- akhir menu materi -->
                      <div class="dashboard"></div>
                </main>
                <footer class="bg-light py-2">
            <div class="container"><div class="small text-center text-muted">Copyright © 2020 - Ihsanabuhanifah</div></div>
        </footer>
            </div>
        </div>
<script src="{{ asset('js/menu-siswa-14072020.js') }}"></script>

@endsection