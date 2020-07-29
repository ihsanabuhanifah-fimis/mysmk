<div class="text-center p-md-5 p-sm-0 pt-3 bg-gradient-success">
   
    <h4 class="mt-5 mb-3 text-center">JADWAL KEGIATAN BELAJAR MENGEJAR </h4>
                        <ol class="breadcrumb mb-4">
                            <li class="breadcrumb-item active">
                            Jadwal Kegiatan Belajar Mengajar di {{$jadwals[0]->nama_rombel}} pada Semester {{$jadwals[0]->semester}} Tahun Pelajaran {{$jadwals[0]->nama_ta}}
                            </li>
                        </ol>
</h4>
</div>
<div class="d-flex justify-content-end">

<a class="btn btn-success mb-3" href="{{ asset('file/jadwal.pdf')}}" target="_blank" rel="noopener noreferrer"> <i class="fa fa-file-pdf mr-2" aria-hidden="true""></i>Download</a>
</div>
<div class="card-deck">
  <div class="card">
   
    <div class="card-body text-center">
      <h5 class="card-title">SENIN</h5>
      <table class="table table-responsive-sm table-bordered">
          <thead class="bg-success text-center">
      <tr>
              <th>Jam Masuk</th>
              <th>Durasi</th>
              <th>Mata Pelajaran</th>
              <th>Pengampu</th>
             
          </tr>
          </thead>
          <tbody class="text-center">
          @forelse( $senins as $senin)
        
          <tr>
              <td>{{$senin->waktu}}</td>
              <td>{{$senin->duration}} x {{$senin->perjam}} Menit</td>
              <td>{{$senin->subject_name}}</td>
              <td>{{$senin->cikgu_name}}</td>
              
          </tr>
          @empty
          @endforelse
          </tbody>
      </table>
   
    </div>
  </div>
  <div class="card">
   
   <div class="card-body text-center">
     <h5 class="card-title">SELASA</h5>
     <table class="table table-responsive-sm table-bordered">
         <thead class="bg-success text-center">
     <tr>
             <th>Jam Masuk</th>
             <th>Durasi</th>
             <th>Mata Pelajaran</th>
             <th>Pengampu</th>
            
         </tr>
         </thead>
         <tbody class="text-center">
         @forelse( $selasas as $selasa)
       
         <tr>
             <td>{{$selasa->waktu}}</td>
             <td>{{$selasa->duration}} x {{$senin->perjam}} Menit</td>
             <td>{{$selasa->subject_name}}</td>
             <td>{{$selasa->cikgu_name}}</td>
             
         </tr>
         @empty
         @endforelse
         </tbody>
     </table>
  
   </div>
 </div>
 <div class="card">
   
   <div class="card-body text-center">
     <h5 class="card-title">RABU</h5>
     <table class="table table-responsive-sm table-bordered">
         <thead class="bg-success text-center">
     <tr>
             <th>Jam Masuk</th>
             <th>Durasi</th>
             <th>Mata Pelajaran</th>
             <th>Pengampu</th>
            
         </tr>
         </thead>
         <tbody class="text-center">
         @forelse( $rabus as $rabu)
       
         <tr>
             <td>{{$rabu->waktu}}</td>
             <td>{{$rabu->duration}} x {{$rabu->perjam}} Menit</td>
             <td>{{$rabu->subject_name}}</td>
             <td>{{$rabu->cikgu_name}}</td>
             
         </tr>
         @empty
         <tr>
          <td colspan="4" class="alert alert-warning">Jadwal belum di input</td>
         </tr>
         @endforelse
         </tbody>
     </table>
  
   </div>
 </div>
  
</div>

<div class="card-deck mt-3">
<div class="card">
   
   <div class="card-body text-center">
     <h5 class="card-title">KAMIS</h5>
     <table class="table table-responsive-sm table-bordered">
         <thead class="bg-success text-center">
     <tr>
             <th>Jam Masuk</th>
             <th>Durasi</th>
             <th>Mata Pelajaran</th>
             <th>Pengampu</th>
            
         </tr>
         </thead>
         <tbody class="text-center">
         @forelse( $kamiss as $kamis)
       
         <tr>
             <td>{{$kamis->waktu}}</td>
             <td>{{$kamis->duration}} x {{$kamis->perjam}} Menit</td>
             <td>{{$kamis->subject_name}}</td>
             <td>{{$kamis->cikgu_name}}</td>
             
         </tr>
         @empty
         <tr>
          <td colspan="4" class="alert alert-warning">Jadwal belum di input</td>
         </tr>
         @endforelse
         </tbody>
     </table>

   </div>
 </div>
 <div class="card">
   
   <div class="card-body text-center">
     <h5 class="card-title">JUM'AT</h5>
     <table class="table table-responsive-sm table-bordered">
         <thead class="bg-success text-center">
     <tr>
             <th>Jam Masuk</th>
             <th>Durasi</th>
             <th>Mata Pelajaran</th>
             <th>Pengampu</th>
            
         </tr>
         </thead>
         <tbody class="text-center">
         @forelse( $jumats as $jumat)
       
         <tr>
             <td>{{$jumat->waktu}}</td>
             <td>{{$jumat->duration}} x {{$jumat->perjam}} Menit</td>
             <td>{{$jumat->subject_name}}</td>
             <td>{{$jumat->cikgu_name}}</td>
             
         </tr>
         @empty
         <tr>
          <td colspan="4" class="alert alert-warning">Jadwal belum di input</td>
         </tr>  
         @endforelse
         </tbody>
     </table>
  
   </div>
 </div>
  <<div class="card">
   
   <div class="card-body text-center">
     <h5 class="card-title">SABTU</h5>
     <table class="table table-responsive-sm table-bordered">
         <thead class="bg-success text-center " >
     <tr>
             <th>Jam Masuk</th>
             <th>Durasi</th>
             <th>Mata Pelajaran</th>
             <th>Pengampu</th>
            
         </tr>
         </thead>
         <tbody class="text-center">
         @forelse( $sabtus as $sabtu)
       
         <tr>
             <td>{{$sabtu->waktu}}</td>
             <td>{{$sabtu->duration}} x {{$sabtu->perjam}} Menit</td>
             <td>{{$sabtu->subject_name}}</td>
             <td>{{$sabtu->cikgu_name}}</td>
             
         </tr>
         @empty
         <tr>
          <td colspan="4" class="alert alert-warning">Jadwal belum di input</td>
         </tr>
         @endforelse
         </tbody>
     </table>
  
   </div>
 </>
  
</div>