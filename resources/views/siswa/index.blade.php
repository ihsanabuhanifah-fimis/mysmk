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

   

<div id="layoutSidenav" >
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav p">
                            <div class="sb-sidenav-menu-heading">MySMK</div>
                            <a class="nav-link menu-dashboard" 
                                ><div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Santri</a >

                                <!-- menu pelajaran -->
                            <div class="sb-sidenav-menu-heading">Menu</div>
                            <a class="nav-link collapsed menu-pelajaran" 
                                ><div class="sb-nav-link-icon "><i class="fas fa-columns"></i></div>
                                Pelajaran
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div></a>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                
                            </div>

                            <!-- menu materi -->
                                <!-- menu materi -->
                         
                            <a class="nav-link collapsed menu-jadwal-ujian-teori" aria-expanded="false" aria-controls="collapseLayouts"
                                ><div class="sb-nav-link-icon "><i class="fas fa-columns"></i></div>
                                Penilaian Teori
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div
                            ></a>
                            <a class="nav-link collapsed menu-jadwal-ujian-praktek" aria-expanded="false" aria-controls="collapseLayouts"
                                ><div class="sb-nav-link-icon "><i class="fas fa-columns"></i></div>
                                Penilaian Praktek
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div
                            ></a>
                           

                            <!-- menu materi -->
                           
                            <a class="nav-link collapsed menu-halaqoh-online" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages"
                                ><div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                                Halaqoh Online
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div
                            ></a>
                            
                           
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
                      <h1 class="mt-4">Jadwal Penilaian Teori</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Jadwal Penilaian Teori X Teknik Komputer dan Jaringan</li>
                        </ol>
                  
                      <div class="tampilkan-ujian-teori"></div>
                      </div>

                      <div class="tampilkan-menu-jadwal-ujian-praktek">
                      <h1 class="mt-4">Jadwal Penilaian Praktek</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Jadwal Penilaian Teori X Teknik Komputer dan Jaringan</li>
                        </ol>
                      <div class="tampilkan-ujian-praktek"></div>
                   
                      </div>

                      <div class="tampilkan-halaqoh-online"></div>



                      <!-- akhir menu materi -->
                      <div class="dashboard">
                        <h1 class="mt-4">Dashboard</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                        <div class="row">
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-primary text-white mb-4">
                                    <div class="card-body">Primary Card</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="#">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-warning text-white mb-4">
                                    <div class="card-body">Warning Card</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="#">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-success text-white mb-4">
                                    <div class="card-body">Success Card</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="#">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-md-6">
                                <div class="card bg-danger text-white mb-4">
                                    <div class="card-body">Danger Card</div>
                                    <div class="card-footer d-flex align-items-center justify-content-between">
                                        <a class="small text-white stretched-link" href="#">View Details</a>
                                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-xl-6">
                                <div class="card mb-4">
                                    <div class="card-header"><i class="fas fa-chart-area mr-1"></i>Area Chart Example</div>
                                    <div class="card-body"><canvas id="myAreaChart" width="100%" height="40"></canvas></div>
                                </div>
                            </div>
                            <div class="col-xl-6">
                                <div class="card mb-4">
                                    <div class="card-header"><i class="fas fa-chart-bar mr-1"></i>Bar Chart Example</div>
                                    <div class="card-body"><canvas id="myBarChart" width="100%" height="40"></canvas></div>
                                </div>
                            </div>
                        </div>
                        <div class="card mb-4">
                            <div class="card-header"><i class="fas fa-table mr-1"></i>DataTable Example</div>
                            <div class="card-body">
                            </div> 
                            </div>
                        </div>
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