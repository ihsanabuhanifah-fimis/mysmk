<div class="text-center bg-gradient-success">
   
   <h4 class="mt-5 mb-3 text-center">KEGIATAN HARIAN </h4>
                       <ol class="breadcrumb mb-4">
                           <li class="breadcrumb-item active">
                             <div class="text-center">  Setiap santri wajib melaporkan kegiatan harian yang akan diperiksa oleh wali kelas</div>
                           
                           </li>
                       </ol>
</h4>
</div>
<div class="d-flex justify-content-end border p-md-4 p-sm-0">
    <button data-toggle="modal" data-target="#modalHarian" class="btn btn-success"><i class="fa fa-plus mr-2" aria-hidden="true"></i>Tambah</button>
</div>
<div>
<div class="kegiatan-harian"></div>
</div>

<!-- Modal -->
<div class="modal fade" id="modalHarian" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Kegiatan Harian</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <form method="post" id="form-simpan-harian" action="javascript:void(0)">
          @csrf
          <div class="border p-3">
          <label for="hari"><b>Hari</b></label>
          
          <select class="ml-2 form-control"  name="hari" id="hari">
                             
          <option class="font-weight-bold " selected value="<?= date('l') ;?>"><?= date('l') ;?>
                                
                              <option value="Monday">Monday</option>
                              <option value="Tuesday">Tuesday</option>
                              <option value="Wednesday">Wednesday</option>
                              <option value="Thursday">Thursday</option>
                              <option value="Friday">Friday</option>
                              <option value="Saturday">Saturday</option>
                              <option value="Sunday">Sunday</option>
                        
                      </select>
          <label for="tanggal"><b>Tanggal</b></label>
          <input required class="form-control" type="date" name="tanggal" id="tanggal" />
          </div>
          <div class="mt-3">
          <table class="table table-borderless table-responsive-sm">
              <thead class="bg-success text-center">
              <tr>
                  <th class="text-center">No</th>
                  <th class="text-left">Kegiatan</th>
                  <th>Melaksanakan</th>
                  <th>Keterangan</th>
              </tr>
              </thead>
              <tbody>
                  <tr>
                      <th class="text-center">1</th>
                      <th>Sholat Tahajjud & Witir</th>
                      <td>
                          <select required class="form-control" name="tahajud" id="tahajud">
                          <option value="">-</option>
                              <option value="1">Ya</option>
                              <option value="2">Tidak</option>
                          </select>
                      </td>
                      <td>
                          <input  placeholder="Keterangan"   class="form-control"  type="text" name="ket1">
                      </td>
                  </tr>
                  <tr>
                      <th class="text-center">2</th>
                      <th>Sholat Subuh</th>
                      <td>
                          <select required class="form-control" name="subuh" id="subuh">
                          <option value="">-</option>
                              <option value="1">Berjamaah di Mesjid</option>
                              <option value="2">Berjamaah di Rumah</option>
                              <option value="3">Sendirian</option>
                          </select>
                      </td>
                      <td>
                          <input placeholder="Keterangan" class="form-control"  type="text" name="ket2">
                      </td>
                  </tr>
                  <tr>
                      <th class="text-center">3</th>
                      <th>Halaqoh Quran</th>
                      <td>
                          <select required class="form-control" name="halaqoh" id="halaqoh">
                          <option value="">-</option>
                              <option value="1">Ya</option>
                              <option value="2">Tidak</option>
                          </select>
                      </td>
                      <td>
                          <input  placeholder="Tuliskan nama surat dan ayat" class="form-control"  type="text" name="ket3">
                      </td>
                  </tr>
                  <tr>
                      <th class="text-center">4</th>
                      <th>sholat Dhuha</th>
                      <td>
                          <select required class="form-control" name="dhuha" id="dhuha">
                          <option value="">-</option>
                              <option value="1">Ya</option>
                              <option value="2">Tidak</option>
                          </select>
                      </td>
                      <td>
                          <input  placeholder="Keterangan"   class="form-control"  type="text" name="ket4">
                      </td>
                  </tr>
                  <tr>
                      <th class="text-center">5</th>
                      <th>Sholat Dzuhur</th>
                      <td>
                          <select required class="form-control" name="dzuhur" id="dzuhur">
                          <option value="">-</option>
                              <option value="1">Berjamaah di Mesjid</option>
                              <option value="2">Berjamaah di Rumah</option>
                              <option value="3">Sendirian</option>
                          </select>
                      </td>
                      <td>
                          <input placeholder="Keterangan" class="form-control"  type="text" name="ket5">
                      </td>
                  </tr>
                  <tr>
                      <th class="text-center">6</th>
                      <th>Sholat Ashar</th>
                      <td>
                          <select required class="form-control" name="ashar" id="ashar">
                          <option value="">-</option>
                              <option value="1">Berjamaah di Mesjid</option>
                              <option value="2">Berjamaah di Rumah</option>
                              <option value="3">Sendirian</option>
                          </select>
                      </td>
                      <td>
                          <input placeholder="Keterangan" class="form-control"  type="text" name="ket6">
                      </td>
                  </tr>
                  <tr>
                      <th class="text-center">7</th>
                      <th>Dzikir Pagi</th>
                      <td>
                          <select required class="form-control" name="pagi" id="pagi">
                          <option value="">-</option>
                              <option value="1">Ya</option>
                              <option value="2">Tidak</option>
                             
                          </select>
                      </td>
                      <td>
                          <input placeholder="Keterangan" class="form-control"  type="text" name="ket7">
                      </td>
                  </tr>
                  <tr>
                      <th class="text-center">8</th>
                      <th>Dzikir Petang</th>
                      <td>
                          <select required class="form-control" name="petang" id="petang">
                          <option value="">-</option>
                          <option value="1">Ya</option>
                              <option value="2">Tidak</option>
                             
                          </select>
                      </td>
                      <td>
                          <input placeholder="Keterangan" class="form-control"  type="text" name="ket8">
                      </td>
                  </tr>
                  <tr>
                      <th class="text-center">9</th>
                      <th>Sholat Maghrib</th>
                      <td>
                          <select required class="form-control" name="maghrib" id="maghrib">
                          <option value="">-</option>
                              <option value="1">Berjamaah di Mesjid</option>
                              <option value="2">Berjamaah di Rumah</option>
                              <option value="3">Sendirian</option>
                          </select>
                      </td>
                      <td>
                          <input placeholder="Keterangan" class="form-control"  type="text" name="ket9">
                      </td>
                  </tr>
                  <tr>
                      <th class="text-center">10</th>
                      <th>Sholat Isya</th>
                      <td>
                          <select required class="form-control" name="isya" id="isya">
                          <option value="">-</option>
                              <option value="1">Berjamaah di Mesjid</option>
                              <option value="2">Berjamaah di Rumah</option>
                              <option value="3">Sendirian</option>
                          </select>
                      </td>
                      <td>
                          <input placeholder="Keterangan" class="form-control"  type="text" name="ket10">
                      </td>
                  </tr>
                  <tr>
                      <th class="text-center">11</th>
                      <th>Baca Alquran Mandiri</th>
                      <td>
                          <select required class="form-control" name="quran" id="quran">
                            <option value="">-</option>
                              <option value="1">Ya</option>
                              <option value="2">Tidak</option>
                             
                          </select>
                      </td>
                      <td>
                          <input placeholder="Tuliskan nama surat dan ayat" class="form-control"  type="text" name="ket11">
                      </td>
                  </tr>
              </tbody>
             
          </table>
          </div>
      </form>
      </div>
      <div class="ket-harian text-center text-bold"></div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
        <button type="button" class="btn btn-success simpan-harian">Simpan</button>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript">
	$(document).ready(function(){
        $('.kegiatan-harian').load("/siswa/harian/tampil");
		$(".simpan-harian").click(function(){
            $(this).text("Menyimpan ...");
            $('.ket-harian').removeClass('alert alert-success');
            $('.ket-harian').removeClass('alert alert-danger');
            $('.ket-harian').empty();
                   
            $.ajaxSetup({
              headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
            });
            $.ajax({
				type: 'POST',
				url: "{{route('simpan.harian')}}",
				data: $('#form-simpan-harian').serialize(),
				success: function(data) {
                   
                    $(".simpan-harian").text("Simpan");
                    $('.ket-harian').addClass('alert alert-success');
                    $('.ket-harian').text(data);
                   
                    setTimeout(function(){
                        $('.ket-harian').removeClass('alert alert-success');
                        $('.ket-harian').removeClass('alert alert-danger');
                        $('.ket-harian').empty();
                        $('#modalHarian').modal('toggle');
                        $('.kegiatan-harian').load("/siswa/harian/tampil");

                    }, 1000);
                   
                },
                error: function (jqXHR, exception) {
                    $(".simpan-harian").text("Simpan");
                    $('.ket-harian').addClass('alert alert-danger');
                    $('.ket-harian').text('Kegiatan Harian tidak tersimpan, Silahkan periksa tanggal dan pastikan koneksi internet lancar'); 
                    setTimeout(function(){
                        $('.ket-harian').removeClass('alert alert-success');
                        $('.ket-harian').removeClass('alert alert-danger');
                        $('.ket-harian').empty();
                    }, 3000);
                }
			});
			
			
			});
		});
	



</script> 