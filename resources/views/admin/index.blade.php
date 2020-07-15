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
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">MySMK</div>
                            <a class="nav-link menu-dashboard" 
                                ><div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard</a >

                                <!-- menu kehadiran -->
                            <div class="sb-sidenav-menu-heading">Menu</div>
                            <a class="nav-link collapsed menu-daftar-user" 
                                ><div class="sb-nav-link-icon "><i class="fas fa-columns"></i></div>
                               Daftar User
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                              </a>
                              <a class="nav-link collapsed menu-daftar-kelas" 
                                ><div class="sb-nav-link-icon "><i class="fas fa-columns"></i></div>
                               Daftar Kelas
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                              </a>
                              <a class="nav-link collapsed menu-jadwal" 
                                ><div class="sb-nav-link-icon "><i class="fas fa-columns"></i></div>
                               Jadwal
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
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

                    
                        <!-- akhir dahsboard -->
               

                      <!-- akhir menu materi -->
                      <div class="dashboard">
                        <h1 class="mt-4">Dashboard</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                       
                        <!-- akhir dahsboard -->
                    </div>

           


                    <div id="menu-daftar-user">
                      
                       
                        
                        <div class="ket-menu-daftar-user"></div>
                       <div class="tampilkan-daftar-user"></div>
                      
                        <!-- akhir dahsboard -->
                    </div>

                    <div id="menu-kelas">               
                       <div class="tampilkan-daftar-kelas"></div>
                    
                        <!-- akhir dahsboard -->
                    </div>

                    <!-- jadwal -->
                    <div id="menu-jadwal">               
                       <div class="tampilkan-jadwal"></div>
                    
                        <!-- akhir dahsboard -->
                    </div>
                    <!-- Jadwal -->

                    
                        
                        <!-- akhir dahsboard -->
                    </div>
                </main>
                <footer class="bg-light py-2">
            <div class="container"><div class="small text-center text-muted">Copyright © 2020 - Ihsanabuhanifah</div></div>
        </footer>
            </div>
        </div>
        <script src="{{ asset('js/admin-15072020.js') }}"></script>
       

@endsection