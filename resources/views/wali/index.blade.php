@extends('guru.layout.master')
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
                    <div class="sb-sidenav-menu mt-5">
                        <div class="nav">
                        <div class="sb-sidenav-menu-heading">MYSMK</div>
                            <a class="nav-link active menu-dashboard"  data-toggle="pill" role="tab" aria-selected="false"
                                ><div class="sb-nav-link-icon"><i class="fa fa-user-circle" aria-hidden="true"></i></div>
                                Profile Santri</a >
                                
                                <a class="nav-link menu-jadwal"  data-toggle="pill" role="tab" aria-selected="false"
                                ><div class="sb-nav-link-icon"><i class="fas fa-book"></i></div>
                                Jadwal Pelajaran</a >
                                <a class="nav-link menu-pengumuman"  data-toggle="pill" role="tab" aria-selected="false"
                                ><div class="sb-nav-link-icon"><i class="fas fa-bullhorn"></i></div>
                                Pengumuman</a >


                                

                                <!-- menu kehadiran -->
                            <div class="sb-sidenav-menu-heading">Menu</div>
                            <a data-toggle="pill" role="tab" aria-selected="false" class="nav-link collapsed menu-mapel" 
                                ><div class="sb-nav-link-icon "><i class="fas fa-book"></i></div>
                                Mata Pelajaran 
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                              </a>
                            <a data-toggle="pill" role="tab" aria-selected="false" class="nav-link collapsed menu-kehadiran" 
                                ><div class="sb-nav-link-icon "><i class="fa fa-users" aria-hidden="true"></i></div>
                                Kehadiran Santri
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                              </a>
                               <!-- menu kehadiran -->

                               <!-- menu-rekap-nilai -->
                               <a data-toggle="pill" role="tab" aria-selected="false" class="nav-link collapsed menu-jadwal-ujian" 
                                ><div class="sb-nav-link-icon "><i class="fas fa-laptop"></i></div>
                                Penilaian dan Hasil
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                              </a>
                                 <!-- menu-rekap-nilai -->

                                   <!-- menu-halaqoh -->
                               <a data-toggle="pill" role="tab" aria-selected="false" class="nav-link collapsed menu-halaqoh-online" 
                                ><div class="sb-nav-link-icon "><i class="fas fa-book"></i></div>
                                Halaqoh Online
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                              </a>
                                 <!-- menu-halaqoh -->

                                  <!-- menu-nilai-sikap -->
                               <a data-toggle="pill" role="tab" aria-selected="false" class="nav-link collapsed menu-nilai-sikap" 
                                ><div class="sb-nav-link-icon "><i class="fas fa-book"></i></div>
                                Nilai Sikap
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                              </a>
                                 <!-- menu-nilai-sikap -->

                                 <!-- menu-catatan-pelanggaran -->
                               <a data-toggle="pill" role="tab" aria-selected="false" class="nav-link collapsed menu-catatan-pelanggaran" 
                                ><div class="sb-nav-link-icon "><i class="fas fa-book"></i></div>
                                Catatan Pelanggaran
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                              </a>
                                 <!-- menu-catatan-pelanggaran -->
                            

                            
                           
                           
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
                      <div class="halaqoh-online pt-5">
                        <h4 class="mt-5 mb-3 text-center">CATATAN HALAQOH <br>ONLINE </h4>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">
                                Menu ini akan digununakan saat pembelajaran dilakukan secara online ( Masa Pendemi Covid-19)    
                            </li>
                        </ol>
                     
                     <div class="catatan-halaqoh-online"></div>
                        
                      
                        <!-- akhir dahsboard -->
                    </div>

                    <div class="pt-5 text-center" id="menu-pengumuman">
                        <h4>Mohon maaf saat ini menu belum tersedia</h4>
                    </div>
                    <div id="menu-jadwal"></div>

                      <!-- akhir menu materi -->
                      <div class="dashboard">
                      <div class="dashboard-show"></div>
                      </div>

                    <div class="kehadiran pt-5">
                        <h4 class="mt-5 mb-5 text-center">ABSENSI KEHADIRAN SANTRI </h4>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">
                                Menu ini bisa digunakan wali santri untuk melihat absensi harian santri saat jam Kegiatan Belajar Mengajar      
                            </li>
                        </ol>
                        <div class="p-4 ">
                        <form method="post" class="form-kehadiran" action="javascript:void(0)">
                        @csrf
                        <div class="form-row">
                            <div class="col-md-4 mb-3 col-sm-10">
                                <label for="nlknj"><b>Silahkan Pilih Tanggal</b></label>
                        <input class="form-control " type="date" name="tanggal" value="<?= date('Y-m-d') ; ?>">
                        </div>
                        <br>    
                        <button  class="cari-kehadiran mt-sm-3 mt-md-4 ml-md-4 form-control col-sm-10 col-md-2 btn btn-success" type="submit"> Bismillah</button>
                        </div>
                        </div>
                        </form>
                        
                        <div class="ket-absen font-weight-bold p-3"></div>
                       <div class="tampilkan-kehadiran"></div>
                      
                        <!-- akhir dahsboard -->
                    </div>


                    <div class="jadwal-ujian pt-5">
                        <h4 class="mt-5 mb-3 text-center">PENILAIAN DAN HASIL</h4>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">
                                Menu ini bisa digunakan wali santri untuk melihat hasil penilaian santri tiap mata pelajaran baik dilakukan secara online maupun offline/berbasis kertas/praktek     
                            </li>
                        </ol>
                        
                       
                  
                     
                        <div class="ket-jadwal"></div>
                       <div class="tampilkan-jadwal-ujian"></div>
                        <!-- akhir dahsboard -->
                  

                    </div>
                     <div id="menu-mapel"></div>

                    
                        
                        <!-- akhir dahsboard -->
                    </div>
                </main>
                <footer class="bg-light py-2">
            <div class="container"><div class="small text-center text-muted">Copyright © 2020 - Ihsanabuhanifah</div></div>
        </footer>
            </div>
        </div>
      
        <script src="{{ asset('js/wali-16072020.js') }}"></script>


@endsection