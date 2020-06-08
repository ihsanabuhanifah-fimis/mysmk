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
         aria-selected="true">Pengumuman </a>
       </li>
       <li class="ml-2 mr-2 mb-2  nav-bab nav-item">
         <a class=" nav-link " id="tugas" data-toggle="pill" 
         href="#pills-materi" role="tab" aria-controls="pills-materi" 
         aria-selected="true">Pelajaran</a>
       </li>
       <li class="ml-2 mr-2 mb-2 nav-bab nav-item">
         <a class=" nav-link active" id="pills-jadwal-tab" data-toggle="pill" 
         href="#pills-jadwal" role="tab" aria-controls="pills-jadwal" 
         aria-selected="false">Jadwal Ujian</a>
       </li>
       <li class="ml-2 mr-2 mb-2 nav-bab nav-item">
         <a class=" nav-link" id="pills-contact-tab" data-toggle="pill" 
         href="#pills-contact" role="tab" aria-controls="pills-contact" 
         aria-selected="false">Nilai</a>
       </li>
       <li class=" ml-2 mr-2 mb-2 nav-bab nav-item">
         <a class=" nav-link" id="pills-nilai-tab" data-toggle="pill" 
         href="#pills-nilai" role="tab" aria-controls="pills-contact" 
         aria-selected="false">Halaqoh</a>
       </li>
       <li class=" ml-2 mr-2 mb-2 nav-bab nav-item">
         <a class=" nav-link" id="pills-nilai-tab" data-toggle="pill" 
         href="#pills-ujian" role="tab" aria-controls="pills-contact" 
         aria-selected="false">Pelanggaran</a>
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
            
            </select>
            <label class="mt-2" for="id_bab">Bab</label>
            <select required class="form-control" name="id_bab" id="">
            
            </select>
           <label  class="mt-2" for="materi">Materi</label>
           <input required class="form-control" type="text" name="materi" id="materi" />
           <label for="status">Status</label>
           <select class="form-control" name="status" id="">
            <option value="1">Lock</option>
            <option value="2">Unlock</option>
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
    </div>
      <div class="tampilkanmateri"></div>
     </div>
      <!-- Halaman Materi hari ini -->
      
      <div class="col-sm-12 col-md-12 m-md-2 tab-pane fade " id="pills-materi" role="tabpanel" 
      aria-labelledby="pills-materi-tab">    
         <div class="row border-bottom mb-2">
        
         <h5 class="text-center">MATA PELAJARAN</h5>        
         </div>       
        <div class="materi"></div>  
      </div>
      
      
      <!-- //JAdwal hari ini -->
      
     
      <div class=" tab-pane fade show active" id="pills-jadwal" role="tabpanel" 
      aria-labelledby="pills-jadwal-tab">
      <div class="d-flex justify-content-end">
      <a class="btn btn-outline-primary mr-3 ujian-praktek">Ujian Praktek</a>
      <a class="btn btn-outline-primary mr-3 ujian-teori" ="">Ujian Teori</a>
      </div>
      <div class="jadwal-ujian-teori"></div>
      <div class="jadwal-ujian-praktek"></div>
      
     
      <div class="table-responsive col-md-12">
        
       </div>
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
          <button type="button" class="btn border mb-2" data-toggle="modal" data-target="#exampleModal">
            Buat Penilaian
          </button> 
          <button type="button" class="btn border mb-2 active" id="penilaian">
            Penilaian
          </button>
          <button type="button" class="btn btn-outline-success mb-2" id="rekapnilai">
            Rekapitulasi Teori
          </button>
          <button type="button" class="btn border mb-2" id="rekapnilaipraktek">
            Rekapitulasi Praktek
          </button>
    </div>
<!-- modals_rekapitukasi -->

<!-- modals_rekapitukasi -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">

</div>
</div>
</div>
        
    </div> 
      
    </div>
    </div>    
    <div class="tab-content" id="pills-tabContent">
  
               
</div>
</div> 
@endsection