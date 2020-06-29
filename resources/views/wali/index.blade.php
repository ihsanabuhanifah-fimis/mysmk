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

<div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">MySMK</div>
                            <a class="nav-link menu-dashboard" 
                                ><div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard</a >

                                <!-- menu kehadiran -->
                            <div class="sb-sidenav-menu-heading">Menu</div>
                            <a class="nav-link collapsed menu-kehadiran" 
                                ><div class="sb-nav-link-icon "><i class="fas fa-columns"></i></div>
                                Kehadiran Santri
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                              </a>
                               <!-- menu kehadiran -->

                               <!-- menu-rekap-nilai -->
                               <a class="nav-link collapsed menu-jadwal-ujian" 
                                ><div class="sb-nav-link-icon "><i class="fas fa-columns"></i></div>
                                Jadwal Ujian dan Hasil
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                              </a>
                                 <!-- menu-rekap-nilai -->

                                   <!-- menu-halaqoh -->
                               <a class="nav-link collapsed menu-halaqoh-online" 
                                ><div class="sb-nav-link-icon "><i class="fas fa-columns"></i></div>
                                Halaqoh Online
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                              </a>
                                 <!-- menu-halaqoh -->

                                  <!-- menu-nilai-sikap -->
                               <a class="nav-link collapsed menu-nilai-sikap" 
                                ><div class="sb-nav-link-icon "><i class="fas fa-columns"></i></div>
                                Nilai Sikap
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                              </a>
                                 <!-- menu-nilai-sikap -->

                                 <!-- menu-catatan-pelanggaran -->
                               <a class="nav-link collapsed menu-catatan-pelanggaran" 
                                ><div class="sb-nav-link-icon "><i class="fas fa-columns"></i></div>
                                Catatan Pelanggaran
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                              </a>
                                 <!-- menu-catatan-pelanggaran -->
                            

                            
                           
                           
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        Wali Santri
                    </div>
                </nav>
            </div>

            <!-- konten -->
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                      <!-- awal dashboard -->

                      <!-- awal pelajaran -->
                      <div class="halaqoh-online">
                        <h2 class="mt-4 mb-3 text-center">Catatan Halaqoh Online Santri</h2>
                      
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt delectus quis cum fuga quidem optio a magni eligendi tempora. Similique autem ipsam saepe nostrum.</li>
                        </ol>
                     <div class="catatan-halaqoh-online"></div>
                        
                      
                        <!-- akhir dahsboard -->
                    </div>



                      <!-- akhir menu materi -->
                      <div class="dashboard">
                        <h1 class="mt-4">Dashboard</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                       
                        <!-- akhir dahsboard -->
                    </div>

                    <div class="kehadiran">
                        <h2 class="mt-4 mb-3 text-center">Kehadiran Santri</h2>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">kehadiran</li>
                        </ol>
                        <div class="p-4">
                        <form method="post" class="form-kehadiran" action="javascript:void(0)">
                        @csrf
                        <div class="form-row">
                        <input class="form-control col-md-4 mb-3 col-sm-10" type="date" name="tanggal" value="<?= date('Y-m-d') ; ?>">
                        <button  class="cari-kehadiran mt-sm-3 mt-md-0 ml-md-4 form-control col-sm-10 col-md-2 btn btn-success" type="submit"> Cari</button>
                        </div>
                        </div>
                        </form>
                        <div class="border p-4">
                        <div class="ket-absen"></div>
                       <div class="tampilkan-kehadiran"></div>
                       </div>
                        <!-- akhir dahsboard -->
                    </div>


                    <div class="jadwal-ujian">
                        <h2 class="mt-4 mb-3 text-center">Jadwal Penilaian dan Hasil</h2>
                      
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt delectus quis cum fuga quidem optio a magni eligendi tempora. Similique autem ipsam saepe nostrum.</li>
                        </ol>
                        <div class="p-4">
                        
                        <div class="ket-jadwal"></div>
                       <div class="tampilkan-jadwal-ujian"></div>
                        <!-- akhir dahsboard -->
                    </div>

                    
                        
                        <!-- akhir dahsboard -->
                    </div>
                </main>
                <footer class="bg-light py-2">
            <div class="container"><div class="small text-center text-muted">Copyright © 2020 - Ihsanabuhanifah</div></div>
        </footer>
            </div>
        </div>
<script src="/js/wali.js"></script>

@endsection