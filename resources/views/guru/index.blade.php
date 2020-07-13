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
  label{
    font-weight:bold;
  }
</style>
<div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav nav-pills" role="tablist"">
                            <div class="sb-sidenav-menu-heading">MYSMK</div>
                            <a class="nav-link active menu-dashboard"  data-toggle="pill" role="tab" aria-selected="false"
                                ><div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Dashboard</a >

                                <a class="nav-link collapsed menu-daftar-kelas" data-toggle="pill" role="tab" aria-selected="false"
                                ><div class="sb-nav-link-icon "><i class="fas fa-columns"></i></div>
                               Daftar Kelas
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                                </a>
                              <a class="nav-link collapsed menu-jadwal-siswa" data-toggle="pill" role="tab" aria-selected="false"
                                ><div class="sb-nav-link-icon "><i class="fas fa-columns"></i></div>
                               Jadwal Kelas
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                              </a



                                <!-- menu materi -->
                            <div class="sb-sidenav-menu-heading">Menu</div>
                            
                            <!-- Pengumuman -->
                            <a class="nav-link collapsed menu-pengumuman"  data-toggle="pill" role="tab" aria-selected="false"
                                ><div class="sb-nav-link-icon "><i class="fas fa-columns"></i></div>
                               Pengumuman
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div
                            ></a>
                            <!-- Pengumuman -->
                            <!-- jurnal -->
                            <a class="nav-link collapsed menu-jurnal-guru"  data-toggle="pill" role="tab" aria-selected="false"
                                ><div class="sb-nav-link-icon "><i class="fas fa-columns"></i></div>
                               Jurnal Guru
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div
                            ></a>
                            <!-- jurnal -->
                                <!-- mata pelajaran -->
                                <a class="nav-link collapsed menu-mapel"  data-toggle="pill" role="tab" aria-selected="false"
                                ><div class="sb-nav-link-icon "><i class="fas fa-columns"></i></div>
                                Mata Pelajaran
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div
                            ></a>
                                <!-- mata pelajaran -->
                            <a class="nav-link collapsed menu-materi" data-toggle="pill" role="tab" aria-selected="false"
                                ><div class="sb-nav-link-icon "><i class="fas fa-columns"></i></div>
                                Materi
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div
                            ></a>
                           

                            <!-- menu materi -->
                            <!-- menu jadwal -->
              
                            <a class="nav-link collapsed menu-jadwal"  data-toggle="pill" role="tab" aria-selected="false"
                                ><div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Jadwal Hari Ini
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div
                            ></a>
                            
                            <!-- menu jadwal -->


                            <!-- menu penilaian -->
                        
                            <a class="nav-link collapsed menu-penilaian"  data-toggle="pill" role="tab" aria-selected="false"
                                ><div class="sb-nav-link-icon "><i class="fas fa-columns"></i></div>
                                Daftar Penilaian
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div
                            ></a>
                            
                            
                            <!-- menu penilaian -->

                             <!-- menu BankSoal -->
                        
                             <a class="nav-link collapsed menu-bank-soal" data-toggle="pill" role="tab" aria-selected="false"
                                ><div class="sb-nav-link-icon "><i class="fas fa-columns"></i></div>
                                Bank Soal
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div
                            ></a>
                            
                            <!-- menu BankSoal -->
                           
                            <a class="nav-link collapsed menu-halaqoh" data-toggle="pill" role="tab" aria-selected="false"
                                ><div class="sb-nav-link-icon "><i class=" fas fa-book-open"></i></div>
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
                  
                    <div class="tampilkan-menu-jurnal-guru"></div>
                      <!-- awal dashboard -->
                      <div class="tampilkan-menu-materi">
                      <div class="tampilkanmateri"></div>
                      <div class="tampilkanbab"></div>
                      </div>

                      <!-- menu-jadwal -->
                      <div class="tampilkan-rekap-absen"></div>
                    <div class="tampilkan-edit-absen">
                   
                    <h1 class="mt-4">Edit Absensi</h1>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">Edit absensi di sini</li>
                        </ol>
                      
                        <!-- guru/edit-absen   -->
                        <div class="p-3 border">
                    <form class="form-row" action="javascript:void(0)" id="form-edit-absen" method="POST">
                        <div class="col-md-2 ml-2">
                            <label for="tanggal">Tanggal</label>
                            <input type="date" class="form-control" name="tanggal">
                        </div>
                        <div class="col-md-3 ml-2">
                        <label for="id_subject">Mata Pelajaran</label>
                          <select name="id_subject" class="form-control">
                          @forelse ($subjects as $subject)
                                <option value="{{$subject->id_subject}}">{{$subject->subject_name}}</option>
                            @empty
                            @endforelse
                          </select>
                        </div>
                      
                        <div class=" col-md-4 ml-2">
                            <label for="id_rombel">Kelas</label>
                          <select required name="id_rombel" class="form-control">
                          <option value="">-</option>
                          @forelse ($rombels as $rombel)
                                <option value="{{$rombel->id_rombel}}">{{$rombel->nama_rombel}}</option>
                            @empty
                            @endforelse
                          </select>
                        </div>
                      <div class="col-md-1 ml-2 font-weight-bold form-group ">
                         <br>
                      <button type="submit"  id="tombol-edit-absen" class=" mt-1  form-control mx-auto btn-success border">Cari</button> 
                      </div>
                      <div class="col-md-1 ml-2 font-weight-bold form-group ">
                         <br>
                      <button class=" mt-1  form-control mx-auto btn-success border jadwal" >Jadwal</button> 
                      </div>
                      @csrf
                    </form>
                    </div>
                   <div class="p-3 mt-3 border border-black">
                   <div class="keterangan-absensi "></div>
                   <div class="tampilkan-hasil-absen"></div>
                   </div>
                   
                    </div>
                      <div class="tampilkan-menu-jadwal">
                      
  
                      <h3 class="mt-4">Jadwal Hari Ini</h3>
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
                      <button type="submit" name="cari" id="tombol-jadwal-saya-hari-ini" class="form-control-inline mx-auto btn btn-success border">submit</button> 
                      <button class="form-control-inline mx-auto btn btn-success edit-absensi">Edit Absensi</button>
                      <button class="form-control-inline mx-auto btn btn-success rekap-absensi">Rekap Absensi</button>
                      </div>
                      @csrf
                    </form>

                    
              <div class="tampilkan-jadwal"></div>
                      </div>

                      <!-- tampilkan penilaian -->
                      <div class="tampilkan-menu-penilaian">
                          <div class="tampilkanujian"></div>
                          
                      </div>
                       <!-- tampilkan penilaian -->

                        <!-- tampilkan Bank Soal -->
                      <div class="tampilkan-menu-bank-soal">
                          <div class="bank-soal-saya"></div>
                          <div class="bank-soal-lain"></div>
                         
                      </div>
                       <!-- tampilkan Bank Soal -->
<div id="menu-pengumuman"></div>
                      <!-- akhir menu jadwal -->

                      <!-- daftar kelas -->
                      <div id="menu-kelas">               
                       <div class="tampilkan-daftar-kelas"></div>
                    
                     
                    </div>
                    <!-- daftar kelas -->
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
                        <div id="menu-jadwal-siswa">
                          <div class="tampilkan-jadwal-siswa"></div>
                          
                        </div>

                        <!-- menu-halaqoh-online -->
                        <div class="tampilkan-menu-halaqoh"></div>
                        <!-- menu-halaqoh-online -->
                        <!-- menu-halaqoh-online -->
                        <div class="tampilkan-menu-mapel">
                          <div class="mapel-saya"></div>
                          <div class="rekapnilaiteori"></div>
                          <div class="rekapnilaipraktek2"></div>
                        
                        </div>
                        <!-- menu-halaqoh-online -->
                    </div>
                </main>
                <footer class="bg-light py-2">
            <div class="container"><div class="small text-center text-muted">Copyright © 2020 - Ihsanabuhanifah</div></div>
        </footer>
            </div>
        </div>

        <script src="/js/sintax.js"></script>
        <script src="{{ asset('js/menu-guru-13072020.js') }}"></script>
  


        <!-- modal buat penilaian -->
<!-- modals_rekapitukasi -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
<form class="form-control" id="form-ujian" method="post"  action="javascript:void(0)">  
@csrf
<div class="modal-dialog" role="document">
  
    <div class="modal-content">
      <div class=" modal-header bg-primary">
        <h5 class="modal-title bg-pr" id="exampleModalLabel">Tambahkan Ujian</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <label class="text-bold" for="id_ta"> Tahun Ajaran</label>
      <select class="form-control" name="id_ta" id="id_ta">
        <option value="1">2020/2021</option>
      </select>

      <label for="semester"> Semester </label>
      <select required class="form-control" name="semester" id="semester">
      <option value="">-</option>
        <option value="1">Semester 1</option>
        <option value="2">Semester 2</option>
        <option value="3">Semester 3</option>
        <option value="4">Semester 4</option>
        <option value="5">Semester 5</option>
        <option value="6">Semester 6</option>
      </select>
    
       <label for="tnilai">Ujian dilakukan dengan </label>
        <br>
        <select required class="form-control" name="tampilkan_nilai" id="tnilai">
        <option value="">-</option>
        <option value="1">Online</option>
        <option value="2">Offline / Kertas</option>
        </select>
      <label for="status">Aktifkan Waktu Penilaian</label>
        <select class="form-control waktu_nilai" name="status" id="status">
        <option value="">-</option>
          <option value="2">Ya</option>
          <option value="1">Tidak</option>
        </select>
        <style>
          .hide{
            display:none;
          }
        </style>
        <div class="tanggal hide">
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
        </div>
        <label for="durasi"> Durasi Ujian</label>
        <input class="form-control" type="number" name="durasi" id="durasi" placeholder="Waktu dalam menit" required />
        <br>
        <label for="id_subject">Mata Pelajaran</label>
        <select required class="form-control" name="id_subject" id="id_subject">
        <option value="">-</option>
       @forelse ($subjects as $subject)
        <option value="{{$subject->id_subject}}">{{$subject->subject_name}}</option>
       @empty
       @endforelse

          </select>
        <br>
        <label for="id_rombel">Kelas</label>
       
        <select required class="form-control" name="id_rombel" id="id_rombel">
        <option value="">-</option>
        @forelse ($rombels as $rombel)
                                <option value="{{$rombel->id_rombel}}">{{$rombel->nama_rombel}}</option>
                            @empty
                            @endforelse
        </select>
        <br>
        <label for="kkm">KKM</label>
        <input class="form-control" type="number" name="kkm" id="kkm" required  />
        
        <label for="materi">Materi</label>
        <input class="form-control" type="text" name="materi" id="materi" required />
        <br>
        <label for="nama_ujian">Jenis Ujian</label>
        <select class="form-control" name="id_ujian" id="id_ujian">
        <option value="">-</option>
       @forelse ($ujians as $ujian)
          <option value="{{$ujian->id_ujian}}">{{$ujian->nama_ujian}} - {{$ujian->singkatan_ujian}}</option>
       @empty
       @endforelse

        </select>
        <br>
        <label for="tipe_ujian">Tipe Ujian</label>
        <select class="form-control" name="id_tipe" id="tipe_ujian">
        <option value="">-</option>
           @forelse ($tipes as $tipe)
          <option value="{{$tipe->id_tipe}}">{{$tipe->nama_tipe}}</option>
          @empty
          @endforelse
        
        </select>
        <label for="remidial">Jumlah Remidial</label>
        <select class="form-control" name="remidial" id="remidial">
          <option value="1">-</option>
          <option value="2">1</option>
          <option value="3">2</option>
          <option value="4">3</option>
          <option value="5">4</option>
          <option value="6">5</option>
          <option value="7">6</option>
          <option value="8">7</option>
          <option value="9">8</option>
          <option value="10">9</option>

        </select>
    <br>
    
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
<script>
  $(document).ready(function(){

$(".waktu_nilai").change(function(){
  var a = $(this).val();
  if(a==2){
  $(".tanggal").removeClass("hide");
  }else{
  $(".tanggal").addClass("hide");
  }
});
});
</script>



@endsection