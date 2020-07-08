<div class="d-none d-md-block p-4 border">

<style>


</style>
<table class="table1 table table-responsive-sm">
        <thead class="bg-success thread1">
            <tr class="tr1">
                <th >Jam ke-</th>
                <th ">Mata Pelajaran</th>
                <th >Pengampu</th>
                <th >Status Kehadiran Siswa</th>
                <th >Keterangan</th>
                <th >Materi</th>
               
            </tr>
        </thead>
        <tbody class="tbody1">
       @forelse($kbms as $kbm)
            <tr class="tr1">
            
                <td >{{$kbm->jam_ke}}</td>
               
                <td ">{{$kbm->id_subject}}</td>
                 <td>{{$kbm->id_cikgu}}</td>
                
                @if($kbm->kehadiran == 1)
                <td class="td1" ">Hadir</td>
                @elseif($kbm->kehadiran == 2)
                <td class="td1" :">Sakit</td>
                @elseif($kbm->kehadiran == 3)
                <td class="td1"">Izin</td>
                @elseif($kbm->kehadiran == 4)
                  <td class="td1" ">Tanpa Keterangan</td>
                @elseif($kbm->kehadiran == 5)
                  <td class="td1"">Tidak Mengerjakan Tugas</td>
                @endif
              
                <td>{{$kbm->kehadiran2}}</td>
          
                <td>{{$kbm->materi}}</td>
                <!-- <td data-header="Pengampu :">Ihsan</td>
                <td data-header="Status Kehadiran siswa :">izin</td>
                <td data-header="Keterangan :">pulang ke rumah</td> -->
              
            </tr>
          @empty
          @endforelse
        </tbody>
       
    </table>

    </div>


    <div class="d-sm-block  d-md-none">
    @forelse($kbms as $kbm)
    <div class="col mb-4 border mb-3 bg-white">
      <div class="card-body">
        <div class="card-title text-center">
           
            <table class="table text-left table-borderless">
            <div class="mb-2 p-3 border-bottom">
            <b>PELAJARAN JAM KE- {{$kbm->jam_ke}}</b>
            </div>
          
              <tr class="border-bottom">
                  <td>Mata Pelajaran</td>
                  <td>:</td>
                  <td>{{$kbm->id_subject}}</td>
              </tr>
              <tr class="border-bottom">
                  <td>Pengampu</td>
                  <td>:</td>
                  <td>{{$kbm->id_cikgu}}</td>
              </tr>
              <tr class="border-bottom">
                  <td>Status Kehadiran Siswa</td>
                  <td>:</td>
                  @if($kbm->kehadiran == 1)
                <td class="td1" ">Hadir</td>
                @elseif($kbm->kehadiran == 2)
                <td class="td1" :">Sakit</td>
                @elseif($kbm->kehadiran == 3)
                <td class="td1"">Izin</td>
                @elseif($kbm->kehadiran == 4)
                  <td class="td1" ">Tanpa Keterangan</td>
                @elseif($kbm->kehadiran == 5)
                  <td class="td1"">Tidak Mengerjakan Tugas</td>
                @endif
              </tr>
              <tr class="border-bottom">
                  <td>Keterangan</td>
                  <td>:</td>
                  <td>{{$kbm->kehadiran2}}</td>
              </tr>
             
             
            
            </table>
         
        </div>
        <!-- <p class="card-text">This is a longer card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p> -->
    
        </tbody>
        <div class="text-center font-smaller">Materi
        <div class="border card text-left p-1"">
             {{$kbm->materi}}</div>
    </div>
    </div>
  </div>
  @empty
          @endforelse
    </div>