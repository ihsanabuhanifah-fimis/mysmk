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
<style>
  .box{
    min-height:700px;
  }
</style>
<div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <div class="sb-sidenav-menu-heading">Core</div>
                            <a class="nav-link menu-dashboard" 
                                ><div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard</a >
                                <!-- menu materi -->
                            <div class="sb-sidenav-menu-heading">Menu</div>
                            <a class="nav-link collapsed menu-materi" data-toggle="collapse" data-target="#collapseLayouts" aria-expanded="false" aria-controls="collapseLayouts"
                                ><div class="sb-nav-link-icon "><i class="fas fa-columns"></i></div>
                                Materi
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div
                            ></a>
                            <div class="collapse" id="collapseLayouts" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                <a  class="nav-link" onclick="window.location.href='{{route('materi')}}'">Tambah Materi</a>
                                <a  class="nav-link materi-saya" data-toggle="pill" 
                                 role="tab" aria-controls="pills-tugas" 
                                aria-selected="true" >My Materi</a>
                                <a class="nav-link bab-saya" data-toggle="pill" 
                                 role="tab" aria-controls="pills-tugas" 
                                aria-selected="true"  >My Bab</a>
                              </nav>
                            </div>

                            <!-- menu materi -->
                            <!-- menu jadwal -->
              
                            <a class="nav-link collapsed menu-jadwal"  aria-expanded="false" aria-controls="collapseLayouts"
                                ><div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Jadwal
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div
                            ></a>
                            
                            <!-- menu jadwal -->


                            <!-- menu penilaian -->
                        
                            <a class="nav-link collapsed menu-penilaian" data-toggle="collapse" data-target="#collapsePenilaian" aria-expanded="false" aria-controls="collapseLayouts"
                                ><div class="sb-nav-link-icon "><i class="fas fa-columns"></i></div>
                                Penilaian
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div
                            ></a>
                            <div class="collapse" id="collapsePenilaian" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                <a  class="nav-link" data-toggle="modal" data-target="#exampleModal" >Buat Penilaian</a>
                                <a  class="nav-link rekap-nilai-teori2" data-toggle="pill" 
                                 role="tab" aria-controls="pills-tugas" 
                                aria-selected="true" >Rekap Nilai teori</a>
                                <a data-toggle="pill" 
                                 role="tab" aria-controls="pills-tugas" 
                                aria-selected="true" class="nav-link rekap-nilai-praktek2" >Rekap Nilai Praktek</a>
                              </nav>
                            </div>
                            <!-- menu penilaian -->

                             <!-- menu BankSoal -->
                        
                             <a class="nav-link collapsed menu-bank-soal" data-toggle="collapse" data-target="#collapseBankSoal" aria-expanded="false" aria-controls="collapseLayouts"
                                ><div class="sb-nav-link-icon "><i class="fas fa-columns"></i></div>
                                Bank Soal
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div
                            ></a>
                            <div class="collapse" id="collapseBankSoal" aria-labelledby="headingOne" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                <a  class="nav-link" data-toggle="modal" data-target="#banksoal" >Buat Bank Soal</a>
                                <a  class="nav-link bank-soal-saya2"  >Bank Soal Saya</a>
                                <a class="nav-link bank-soal-lain2" >Bank Soal Lain</a>
                              </nav>
                            </div>
                            <!-- menu BankSoal -->

                            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages" aria-expanded="false" aria-controls="collapsePages"
                                ><div class="sb-nav-link-icon"><i class="fas fa-book-open"></i></div>
                                Pages
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div
                            ></a>
                            <div class="collapse" id="collapsePages" aria-labelledby="headingTwo" data-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav accordion" id="sidenavAccordionPages">
                                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#pagesCollapseAuth" aria-expanded="false" aria-controls="pagesCollapseAuth"
                                        >Authentication
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div
                                    ></a>
                                    <div class="collapse" id="pagesCollapseAuth" aria-labelledby="headingOne" data-parent="#sidenavAccordionPages">
                                        <nav class="sb-sidenav-menu-nested nav"><a class="nav-link" href="login.html">Login</a><a class="nav-link" href="register.html">Register</a><a class="nav-link" href="password.html">Forgot Password</a></nav>
                                    </div>
                                    <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#pagesCollapseError" aria-expanded="false" aria-controls="pagesCollapseError"
                                        >Error
                                        <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div
                                    ></a>
                                    <div class="collapse" id="pagesCollapseError" aria-labelledby="headingOne" data-parent="#sidenavAccordionPages">
                                        <nav class="sb-sidenav-menu-nested nav"><a class="nav-link" href="401.html">401 Page</a><a class="nav-link" href="404.html">404 Page</a><a class="nav-link" href="500.html">500 Page</a></nav>
                                    </div>
                                </nav>
                            </div>
                            <div class="sb-sidenav-menu-heading">Addons</div>
                            <a class="nav-link" href="charts.html"
                                ><div class="sb-nav-link-icon"><i class="fas fa-chart-area"></i></div>
                                Charts</a
                            ><a class="nav-link" href="tables.html"
                                ><div class="sb-nav-link-icon"><i class="fas fa-table"></i></div>
                                Tables</a
                            >
                        </div>
                    </div>
                    <div class="sb-sidenav-footer">
                        <div class="small">Logged in as:</div>
                        Start Bootstrap
                    </div>
                </nav>
            </div>

            <!-- konten -->
            <div id="layoutSidenav_content">
                <main>
                    <div class="container-fluid">
                      <!-- awal dashboard -->
                      <div class="tampilkan-menu-materi">
                      <div class="tampilkanmateri"></div>
                      <div class="tampilkanbab"></div>
                      </div>

                      <!-- menu-jadwal -->
                      <div class="tampilkan-menu-jadwal">
  
                      <h1 class="mt-4">Jadwal Hari Ini</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Ini adalah daftar materi yang telah di buat</li>
                        </ol>

                      <form class="form-row" action="javascript:void(0)" id="form-jadwal-hari-ini" method="POST">
                        <div class=" font-weight-bold FontColor1 form-group  mt-2 mb-2 ml-2 mr-4">
                          <select class="ml-2 form-control"  name="hari" id="">
                              <option class="font-weight-bold " selected value="<?= date('l') ;?>"><?= date('l') ;?>
                               </option>
                              <option value="Monday">Monday</option>
                              <option value="Tuesday">Tuesday</option>
                              <option value="Wednesday">Wednesday</option>
                              <option value="Thursday">Thursday</option>
                              <option value="Friday">Friday</option>
                              <option value="Saturday">Saturday</option>
                              <option value="Sunday">Sunday</option>
                        
                      </select>
                      </div>
                      <div class="font-weight-bold form-group mb-2  mt-2">
                      <button type="submit" name="cari" id="tombol-jadwal-saya-hari-ini" class="form-control mx-auto btn btn-success border">submit</button> 
                      </div>
                      @csrf
                    </form>
              <div class="tampilkan-jadwal"></div>
                      </div>

                      <!-- tampilkan penilaian -->
                      <div class="tampilkan-menu-penilaian">
                          <div class="tampilkanujian"></div>
                          <div class="rekapnilaiteori"></div>
                          <div class="rekapnilaipraktek"></div>
                      </div>
                       <!-- tampilkan penilaian -->

                        <!-- tampilkan Bank Soal -->
                      <div class="tampilkan-menu-bank-soal">
                          <div class="bank-soal-saya"></div>
                          <div class="bank-soal-lain"></div>
                         
                      </div>
                       <!-- tampilkan Bank Soal -->

                      <!-- akhir menu jadwal -->
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

        <script src="/js/sintax.js"></script>
        <script src="/js/menu-index-guru.js"></script>


        <!-- modal buat penilaian -->
<!-- modals_rekapitukasi -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<form class="form-control" id="form-ujian" method="post"  action="javascript:void(0)">  
@csrf
<div class="modal-dialog" role="document">
  
    <div class="modal-content">
      <div class=" modal-header bg-primary">
        <h5 class="modal-title bg-pr" id="exampleModalLabel">Tambahkan Ujian Baru</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <label for="id_ta"> Tahun Ajaran</label>
      <select class="form-control" name="id_ta" id="id_ta">
        <option value="1">1</option>
      </select>

      <label for="semester"> Semester </label>
      <select class="form-control" name="semester" id="semester">
        <option value="1">Semester 1</option>
        <option value="2">Semester 2</option>
        <option value="3">Semester 3</option>
        <option value="4">Semester 4</option>
        <option value="5">Semester 5</option>
        <option value="6">Semester 6</option>
      </select>
    
      <label for="remidial">Terikat Waktu</label>
        <select class="form-control" name="status" id="status">
          <option value="2">Ya</option>
          <option value="1">Tidak</option>
        </select>
        <label for="tanggal">Tanggal Mulai</label>
        <br>
        <div class="d-flex justify-content-lg-between">
        <input class="form-control" value="" type="date" value="00:00:0000" name="tanggal_mulai" id="tanggal" />
        <input class=" ml-2 btn border" type="time" value="00:00" name="waktu_mulai">
        </div>
        <br>
        <label for="tanggal">Tanggal Selesai</label>
        <br>
        <div class="d-flex justify-content-lg-between">
        <input class="form-control" value="" type="date" name="tanggal_selesai" value="00:00:0000" id="tanggal" />
        <input class=" ml-2 btn border" type="time" value="00:00" name="waktu_selesai">
        </div>
        <label for="durasi">Durasi Ujian</label>
        <input class="form-control" type="number" name="durasi" id="durasi" placeholder="Waktu dalam menit" required />
        <br>
        <label for="id_subject">Mata Pelajaran</label>
        <select  class="form-control" name="id_subject" id="id_subject">
       @forelse ($subjects as $subject)
        <option value="{{$subject->id_subject}}">{{$subject->subject_name}}</option>
       @empty
       @endforelse

          </select>
        <br>
        <label for="id_rombel">Kelas</label>
        <select class="form-control" name="id_rombel" id="id_rombel">
            <option value="1">X Teknik Komputer dan Jaringan</option>
            <option value="2">X Rekayasa Perangakat Lunak</option>
            <option value="3">XI Teknik Komputer dan Jaringan</option>
            <option value="4">XI Rekayasa Perangakat Lunak</option>
            <option value="5">XII Teknik Komputer dan Jaringan</option>
            <option value="6">XII Rekayasa Perangakat Lunak</option>

        </select>
        <br>
        <label for="kkm">KKM</label>
        <input class="form-control" type="number" name="kkm" id="kkm" required  />
        
        <label for="materi">Materi</label>
        <input class="form-control" type="text" name="materi" id="materi" required />
        <br>
        <label for="nama_ujian">Nama Ujian</label>
        <select class="form-control" name="id_ujian" id="id_ujian">
       @forelse ($ujians as $ujian)
          <option value="{{$ujian->id_ujian}}">{{$ujian->nama_ujian}}</option>
       @empty
       @endforelse

        </select>
        <br>
        <label for="tipe_ujian">Tipe Ujian</label>
        <select class="form-control" name="id_tipe" id="tipe_ujian">
           @forelse ($tipes as $tipe)
          <option value="{{$tipe->id_tipe}}">{{$tipe->nama_tipe}}</option>
          @empty
          @endforelse
        
        </select>
        <label for="remidial">Attemp</label>
        <select class="form-control" name="remidial" id="remidial">
          <option value="1">1</option>
          <option value="2">2</option>
          <option value="3">3</option>
          <option value="4">4</option>
          <option value="5">5</option>
          <option value="6">6</option>
          <option value="7">7</option>
          <option value="8">8</option>
          <option value="9">9</option>
          <option value="10">10</option>

        </select>
    <br>
    
        <label for="tnilai">Tampilkan Nilai</label>
        <br>
        <select class="form-control" name="tampilkan_nilai" id="tnilai">
        <option value="1">Ya</option>
        <option value="2">Tidak</option>
        </select>
    <div class="noticeujian text-center"></div>  

  </div>
  <div class="modal-footer">
    
    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
    <button type="submit" id="tambah-ujian" class="btn btn-primary">Simpan</button>
  </div>
  </form>
</div>
</div>
</div>
        <!-- modal buat penilaian -->


        <!-- Modal buat bank soal -->
        <div class="modal fade" id="banksoal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Buat Ujian</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
            <form class="text-secondary" method="post" action="javascript:void(0)" id=form-soal>
            @csrf
            <div class="notice-bank text-center"></div>
            <label for="">Mata Pelajaran</label>
            <select required class="form-control" name="id_subject" id="">
            @forelse ($subjects as $subject)
              <option value="{{$subject->id_subject}}">{{$subject->subject_name}}</option>
            @empty
            @endforelse
            </select>
            <label class="mt-2" for="id_bab">Bab</label>
            <select required class="form-control" name="id_bab" id="">
             @forelse($babs as $bab)
              <option value="{{$bab->id_bab}}">{{$bab->nama_bab}}</option>
            @empty
            @endforelse
            </select>
           <label  class="mt-2" for="materi">Materi</label>
           <input required class="form-control" type="text" name="materi" id="materi" />
           <label for="status">Status</label>
           <select class="form-control" name="status" id="">
            <option value="1">Lock</option>
            <option value="2">Unlock</option>
           </select>
            <label for="id_tipe">Jenis Soal</label>
            <select class="form-control" name="id_tipe" id="id_tipe">
            @forelse($tipes as $tipe)
            <option value="{{$tipe->id_tipe}}">{{$tipe->nama_tipe}}</option>
            @empty
            @endforelse
            </select>
           
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
              <button type="submit" id="tambah-bank-soal" class="btn btn-primary">Simpan</button>
            </div>
            </form>
          </div>
          <div></div>
        </div>
        <!-- Modal-buat-bank-soal -->


@endsection