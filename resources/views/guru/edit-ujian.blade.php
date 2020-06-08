        <input type="hidden" name="id" value="{{$ujiandata->id}}" >
        <label for="tanggal">Tanggal Mulai</label>
        <br>
        <div class="d-flex justify-content-lg-between">
        <input class="form-control" type="date" value="{{$ujiandata->tanggal_mulai}}" name="tanggal_mulai" id="tanggal" />
        <input class=" ml-2 btn border" type="time" value="{{$ujiandata->waktu_mulai}}" name="waktu_mulai">
        </div>
        <br>
        <label for="tanggal">Tanggal Selesai</label>
        <br>
        <div class="d-flex justify-content-lg-between">
        <input class="form-control" value="{{$ujiandata->tanggal_selesai}}" type="date" name="tanggal_selesai"  id="tanggal" />
        <input class=" ml-2 btn border" type="time" value="{{$ujiandata->waktu_selesai}}" name="waktu_selesai">
        </div>
        <label for="durasi">Durasi Ujian</label>
        <input class="form-control" type="number" name="durasi" value="{{$ujiandata->durasi}}" id="durasi" placeholder="Waktu dalam menit" required />
        <br>
        <label for="id_subject">Mata Pelajaran</label>
        <select  class="form-control" name="id_subject" id="id_subject">
        <option class="font-weight-bold" selected value="{{$ujiandata->id_subject}}">{{$ujiandata->subject_name}}</option>
        @forelse ($subjects as $subject)
          <option value="{{$subject->id_subject}}">{{$subject->subject_name}}</option>
        @empty
        @endforelse

          </select>
        <!-- <br>
        <label for="id_rombel">Kelas</label> -->
        <!-- <select class="form-control" name="id_rombel" id="id_rombel">
        <option class="font-weight-bold" selected value="{{$ujiandata->id_rombel}}">{{$ujiandata->nama_rombel}}</option>
        @forelse($rombels as $rombel)
          
            <option value="{{$rombel->id_rombel}}">{{$rombel->nama_rombel}}</option>
        @empty
        @endforelse
        </select>` -->
        <br>
        <label for="kkm">KKM</label>
        <input class="form-control" type="number" value="{{$ujiandata->kkm}}" name="kkm" id="kkm" required  />
        
        <label for="materi">Materi</label>
        <input class="form-control" type="text" value="{{$ujiandata->materi}}" name="materi" id="materi" required />
        <br>
        <label for="nama_ujian">Nama Ujian</label>
        <select class="form-control" name="id_ujian" id="id_ujian">
        <option class="font-weight-bold" selected value="{{$ujiandata->id_ujian}}">{{$ujiandata->nama_ujian}}</option>
       @forelse ($ujians as $ujian)
          <option value="{{$ujian->id_ujian}}">{{$ujian->nama_ujian}}</option>
       @empty
       @endforelse

        </select>
        <br>
        <label for="tipe_ujian">Tipe Ujian</label>
        <select class="form-control" name="id_tipe" id="tipe_ujian">
        <option class="font-weight-bold" selected value="{{$ujiandata->id_tipe}}">{{$ujiandata->nama_tipe}}</option>
           @forelse ($tipes as $tipe)
          <option value="{{$tipe->id_tipe}}">{{$tipe->nama_tipe}}</option>
          @empty
          @endforelse
        
        </select>
        <label for="remidial">Attemp</label>  
        <select class="form-control" name="remidial" id="remidial">
        <option class="font-weight-bold" selected value="{{$ujiandata->remidial}}">{{$ujiandata->remidial}}</option>
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
    <label for="remidial">Status</label>
        <select class="form-control" name="status" id="status">
        @if($ujiandata->status == 1)
          <option selected value="1">Aktif</option>
          <option value="2">Tidak Aktif</option>
        @else
          <option selected value="2">Tidak Aktif</option>
          <option value="1">Aktif</option>
        @endif
        </select>
        <label for="tnilai">Tampilkan Nilai</label>
        <br>
        <select class="form-control" name="tampilkan_nilai" id="tnilai">
        @if($ujiandata->tampil_nilai == 1)
        <option selected value="1">Ya</option>
        <option value="2">Tidak</option>
        @else
        <option selected value="2">Tidak</option>
        <option value="1">Ya</option>
        @endif
        </select>
    <div class="noticeujian text-center"></div>  