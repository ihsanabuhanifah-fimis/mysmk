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
<div class="conteiner">
<div class="row mb-2 bg-light tmx-auto">

  <div class="col-md-2 col-sm-12 bg-white  ">  
  <div>
  <div class="dekstop navnav mx-auto mt-3 text-primary box">
     
     <ul class=" dekstop mt-3 ml-2 mr-2 nav nav-pills mb-3 flex-column" id="tab" role="tablist">
     <li class=" font-weight-bold border-bottom ml-2 mr-2 mb-2 nav-bab nav-item">
         <a class=" nav-link " id="materi" data-toggle="pill" 
          role="tab" aria-controls="pills-tugas" 
         aria-selected="true">MENU ADMINISTRASI</a>
       </li>
       <li class=" ml-2 mr-2 mb-2 nav-bab nav-item">
         <a class=" nav-link " id="" data-toggle="pill" 
         href="#" role="tab" aria-controls="pills-tugas" 
         aria-selected="true">Dashboard </a>
       </li>
     <li class=" ml-2 mr-2 mb-2 nav-bab nav-item">
         <a class=" nav-link " id="materi" data-toggle="pill" 
         href="#pills-tugas" role="tab" aria-controls="pills-tugas" 
         aria-selected="true">My Materi </a>
       </li>
       <li class="ml-2 mr-2 mb-2  nav-bab nav-item">
         <a class=" nav-link " id="tugas" data-toggle="pill" 
         href="#pills-materi" role="tab" aria-controls="pills-materi" 
         aria-selected="true">Tugas Siswa</a>
       </li>
       <li class="ml-2 mr-2 mb-2 nav-bab nav-item">
         <a class=" nav-link active" id="pills-jadwal-tab" data-toggle="pill" 
         href="#pills-jadwal" role="tab" aria-controls="pills-jadwal" 
         aria-selected="false">Jadwal Hari ini</a>
       </li>
       <li class="ml-2 mr-2 mb-2 nav-bab nav-item">
         <a class=" nav-link" id="pills-contact-tab" data-toggle="pill" 
         href="#pills-contact" role="tab" aria-controls="pills-contact" 
         aria-selected="false">Lihat Absensi</a>
       </li>
       <li class=" ml-2 mr-2 mb-2 nav-bab nav-item">
         <a class=" nav-link" id="pills-nilai-tab" data-toggle="pill" 
         href="#pills-nilai" role="tab" aria-controls="pills-contact" 
         aria-selected="false">Penilaian</a>
       </li>
       <li class=" ml-2 mr-2 mb-2 nav-bab nav-item">
         <a class=" nav-link" id="pills-nilai-tab" data-toggle="pill" 
         href="#pills-ujian" role="tab" aria-controls="pills-contact" 
         aria-selected="false">Bank Soal</a>
       </li>
     </ul>
   </div> 
  </div>
    
  </div>
  <!-- //profile Guru -->
   <!-- halaman navigasi Mobile -->
   <!-- <div class="ph border bg-danger"> -->
     
   <!-- </div> -->
  <!-- Halaman Konten -->
  <div class="col-md-10 mt-3 col-sm-12">
     <!-- halaman navigasi Dekstop -->
   
<!-- Halaman isi -->
    <div class="mx-auto mt-3">
    <div class="tab-content" id="pills-tabContent">
    <!-- Halaman bank soal -->
    <div class="tab-pane m-md-2 fade" id="pills-ujian" role="tabpanel" 
    aria-labelledby="pills-profile-tab">
    <div class="border-bottom mb-2">
    <button type="button" class="btn btn-success mb-2" data-toggle="modal" data-target="#buatujian">
      Buat Bank Soal
    </button>
    <button type="button" id="list-ujian" class="btn btn-success bank-soal-saya mb-2" data-toggle="modal" >
      Bank Soal
    </button>
    <button type="button" id="list-ujian" class="btn btn-success bank-soal-lain mb-2" data-toggle="modal" >
      Bank Soal Lain
    </button>
        <!-- Modal -->
        
          
     </div>
     <div class="modal fade" id="buatujian" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
      </div>
      <div class="banksoal"></div>
      <div class="banksoallain"></div>
    </div>
       <!-- Halaman buat Tugas -->
    <div class="tab-pane m-md-2 fade" id="pills-tugas" role="tabpanel" 
    aria-labelledby="pills-profile-tab">
    <div class="border-bottom mb-2">
    <button style="min-width:150px;" class="btn border btn-success mb-2 "
               onclick="window.location.href='{{route('materi')}}'" > Buat Materi Baru</button>
               <button style="min-width:150px;" class="btn border btn-success mb-2 materi-saya "> Materi</button>
               <button style="min-width:150px;" class="btn border btn-success mb-2 bab-saya "> Bab</button>
              
    </div>
      <div class="tampilkanmateri"></div>
      <div class="tampilkanbab"></div>
     </div>
      <!-- Halaman Materi hari ini -->
      
      <div class="col-sm-12 col-md-12 m-md-2 tab-pane fade " id="pills-materi" role="tabpanel" 
      aria-labelledby="pills-materi-tab">    
         <div class="row border-bottom mb-2">
        
         <button style="min-width:150px; float:right;"" class="btn border mb-2 btn-success"
           onclick="window.location.href='buat-tugas.php'" > Buat Tugas </a>
         </div>
         <div class="container">
         
  
<!-- script table -->
            <div class="tugas"></div>
         </div>
      </div>
      
      
      <!-- //JAdwal hari ini -->
      
     
      <div class=" tab-pane fade show active" id="pills-jadwal" role="tabpanel" 
      aria-labelledby="pills-jadwal-tab">
      <form class="form-row" action="javascript:void(0)" id="form-jadwal" method="post">
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
      <button type="submit" name="cari" class=" butt cari-jadwal form-control mx-auto btn btn-success border">submit</button> 
      </div>
      @csrf
      </form>
      
      <!-- //Jadwal Mengajar// -->
      <div class="tampilkan-jadwal"></div>
       
       </div>
      
      <!-- //Jadwal Mengajar// -->
       

      
      <!-- Absensi -->
      <div class="col-sm-12 col-md-12 m-md-2 tab-pane fade " id="pills-contact" role="tabpanel" aria-labelledby="pills-contact-tab">
      <!-- //form-absensi -->
      
      <form class="form-row abs" action="" method="post">
           
       <div class="font-weight-bold form-group mb-2 mr-2">
       <select class="form-control mb-2" name="id_rombel" id="id_rombel" required>
       <option value=""></option>    
                <option class="font-weight-light text-center" selected value="">Pilih Kelas</option>    
                <option value="1">X Teknik Komputer dan Jaringan</option>
                <option value="2">X Rekayasa Perangakat Lunak</option>
                <option value="3">XI Teknik Komputer dan Jaringan</option>
                <option value="4">XI Rekayasa Perangakat Lunak</option>
                <option value="5">XII Teknik Komputer dan Jaringan</option>
                <option value="6">XII Rekayasa Perangakat Lunak</option>
                
            </select>
      </div>
      <div class="font-weight-bold form-group mb-2 mr-4">
      <button type="button" name="cari" class="absx butt form-control mx-auto btn border">Lihat</button>
     
      </div>
      </form>
      
    </div>

      <!-- Penilain Kelas -->
      <div class=" col-sm-12 col-md-12 m-md-2 tab-pane fade" id="pills-nilai" role="tabpanel" aria-labelledby="pills-nilai-tab">
    <!-- Button trigger modal -->
    <div class="border-bottom mb-2 navnilai">
          <button type="button" class="btn btn-success mb-2" data-toggle="modal" data-target="#exampleModal">
            Buat Penilaian
          </button> 
          <button type="button" class="btn btn-success  mb-2" id="penilaian">
            Penilaian
          </button>
          <button type="button" class="btn btn-success mb-2" id="rekapnilai">
            Rekapitulasi Teori
          </button>
          <button type="button" class="btn btn-success mb-2" id="rekapnilaipraktek">
            Rekapitulasi Praktek
          </button>
    </div>
<!-- modals_rekapitukasi -->

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
          <div class="tampilkanujian "></div>
          <div class="rekapnilaiteori"></div>
          <div class="rekapnilaipraktek"></div>
    </div> 
      
    </div>
    </div>    
    <div class="tab-content" id="pills-tabContent">
  
               
</div>
</div> 


  <!-- Modal -->
  <div class="modal fade" id="ModalBab" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Bab</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

      <form method="post" class="form_tambah_bab"  action="javascript:void(0)">
      @csrf
      <div class="notice-bab text-center"></div>
        <label for="id_subject">Mata Pelajaran</label>
        <select class="form-control" name="id_subject" id="id_subject">
            @forelse ($subjects as $mapel)

            <option  value="{{$mapel->id_subject}}">{{$mapel->subject_name}}</option>
            @empty
            @endforelse
        </select>
        <label for="id_bab">Nama Bab</label>
        <input class="form-control" required type="text" name="id_bab" id="id_bab" /> 
     
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="tambah_bab btn btn-primary">Tambah</button>
      </div>
      </form>
    </div>
  </div>
</div>
@endsection