<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Contracts\Cache\LockTimoutException;
use Illuminate\Cache\FileStore;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
    // auth()->user()->assignRole('admin');
    // if(auth()->user()->hasRole('admin')){ 
    //     return 'Oke';
    // }else{
    //     return 'tidak oke';
    // }
});
//Route Admin
Route::post('/admin/simpan-rombel','AdminController@simpan_rombel')->name('save.rombel');
Route::get('/admin/daftar-siswa-rombel/{id}','AdminController@daftar_siswa_rombel')->name('siswa.rombel');
Route::post('/data-diri','HomeController@data_diri')->name('data');
Route::prefix('/admin')->middleware('CekSessionAdmin')->group(function (){
// Route::get('/user','HomeController@user')->name('admin.users');
Route::get('/user/{id}','HomeController@edit')->name('admin.edituser');
Route::get('/user','AdminController@user')->name('admin.users');
Route::get('/daftar-siswa','AdminController@daftar_siswa')->name('admin.siswa');
Route::get('/daftar-wali','AdminController@daftar_wali')->name('admin.wali');
Route::get('/kelas','AdminController@daftar_kelas')->name('admin.kelas');
Route::get('/jadwal','AdminController@jadwal_kelas')->name('admin.jadwal');
Route::post('/simpan/jadwal','AdminController@simpan_jadwal_kelas')->name('simpan.jadwal.kelas');
Route::post('/tampilkan/jadwal','AdminController@tampilkan_jadwal_kelas')->name('jadwal.kelas');
Route::get('/tampilkan/jadwal','AdminController@tampilkan_jadwal_kelas')->name('tampilkanjadwal.kelas');




});
//Route Admin

//Route Guru
Route::prefix('/guru')->middleware('CekSessionGuru')->group(function (){
Route::post('/jadwal-saya', 'GuruController@requestjadwal')->name('jadwal');
Route::post('/edit-absen', 'GuruController@edit_absen')->name('edit.absen');
Route::get('/absensi/{id}', 'GuruController@absensi')->name('absensi');
Route::get('/materi','GuruController@tambahmateri')->name('materi');
Route::put('/save-form', 'GuruController@store')->name('savekbm');
Route::put('/save-jurnal', 'GuruController@store_jurnal')->name('savejurnal');
Route::put('/edit-jurnal', 'GuruController@edit_jurnal')->name('editjurnal');
Route::post('/tambahmateri', 'GuruController@savemateri')->name('savemateri');
Route::put('/edit-materi', 'GuruController@updatemateri')->name('updatemateri');
Route::get('/edit-materi/{materi}', 'GuruController@editmateri')->name('editmateri');
Route::get('/tampilkanmateri','GuruController@tampilkanmateri')->name('tampilkanmateri');
Route::get('/tampilkanbab','GuruController@tampilkanbab')->name('tampilkanbab');
Route::get('/hapus-materi/{id}','GuruController@hapusmateri')->name('hapusmateri');
Route::post('/tambahujian','GuruController@tambahujian')->name('tambahujian');
Route::get('/tampilkanujian','GuruController@tampilkanujian')->name('tampilkanujian');
Route::get('/rekapnilai','GuruController@rekapnilai')->name('rekapnilai');
Route::get('/rekapnilaipraktek','GuruController@rekapnilaipraktek')->name('rekapnilaipraktek');
Route::post('/rekapnilai','GuruController@rekapnilaiteori')->name('rekapnilai');
Route::post('/rekapnilaipraktek','GuruController@rekapnilaipraktek2')->name('rekapnilaipraktek');
Route::get('/hapusujian/{id}','GuruController@hapusujian')->name('hapusujian');
Route::get('/nilai/{nilai}','GuruController@nilaiujian')->name('nilaiujian');
Route::get('/edit/ujian/{nilai}','GuruController@editujian')->name('editujian');
Route::put('/edit/ujian/','GuruController@edit_ujian_ini')->name('edit_ujian_ini');
Route::get('/akses/ujian/{nilai}','GuruController@aksesujian')->name('aksesujian');
Route::get('/ujian/soal/{nilai}','GuruController@soalujian')->name('soalujian');
Route::get('/ujian/praktek/{nilai}','GuruController@soalujianpraktek')->name('soalujianpraktek');
Route::put('/ujian/soal/','GuruController@simpansoalujian')->name('simpansoalujian');
Route::put('/ujian/akses/','GuruController@aksessoalujian')->name('aksessoalujian');
Route::post('/ujian/cari-soal/','GuruController@carisoal')->name('carisoal');
Route::post('/ujian/cari-soal-praktek/','GuruController@carisoalpraktek')->name('carisoal.praktek');

Route::put('/simpan-nilai','GuruController@simpannilai')->name("simpannilai");
Route::post('banksoal','BanksoalController@savebank')->name('banksoal');
Route::get('/banksoal','BanksoalController@banksoal')->name('tampilkanbanksoal');
Route::get('/preview/{id}','BanksoalController@preview')->name('preview');
Route::get('/banksoallain','BanksoalController@banksoallain')->name('tampilkanbanksoal');
Route::get('/banksoal/{id}','BanksoalController@buatsoal')->name('buatsoal');
Route::get('/banksoal/praktek/{id}','BanksoalController@buatsoalpraktek')->name('buatsoalpraktek');
Route::patch('/editsoal','BanksoalController@editsoal')->name('editsoal');
Route::patch('/editsoalpraktek','BanksoalController@editsoalpraktek')->name('editsoalpraktek');
Route::get('/hapusbanksoal/{id}','BanksoalController@hapusbanksoal')->name('hapusbanksoal');
Route::get('/banksoal/pdf/{id}','BanksoalController@pdf')->name('banksoal_pdf');
Route::post('/tambah_bab/','GuruController@tambah_bab')->name('tambah_bab');
Route::get('/dapatkan_bab/{id}','GuruController@dapatkan_bab')->name('dapatkan_bab');
Route::get('/halaqoh','HalaqohController@get_halaqoh')->name('halaqoh');
Route::get('/halaqoh/daftar','HalaqohController@daftar_halaqoh')->name('daftar.halaqoh');
Route::get('/halaqoh/siswa/{id}','HalaqohController@siswa_halaqoh')->name('siswa.halaqoh');
Route::post('/halaqoh','HalaqohController@add_halaqoh')->name('halaqoh.add');
Route::get('/mapel','JadwalController@mapel_saya')->name('guru.mapel-saya');
Route::get('/edit/mapel/{id}','JadwalController@edit_mapel_saya')->name('guru.edit-mapel-saya');
Route::put('/simpan-mapel','JadwalController@simpan_mapel_saya')->name('guru.simpan-mapel-saya');
Route::get('/rekap-absen','JadwalController@rekap_absen')->name('guru.rekap-absen');
Route::post('/cari-rekap-absen', 'JadwalController@cari_rekap_absen')->name('cari-rekap-absen');
Route::get('/jurnal-guru', 'JurnalController@jurnal_guru')->name('jurnal-guru');
Route::get('/rekap-jurnal-guru', 'JurnalController@rekap_jurnal_guru')->name('rekap-jurnal-guru');
Route::post('/jurnal-guru/simpan', 'JurnalController@simpan_jurnal_guru')->name('simpan-jurnal-guru');
Route::get('/jurnal-guru/cari/{id}', 'JurnalController@cari_jurnal_guru')->name('cari-jurnal-guru');
Route::put('/jurnal-guru/edit', 'JurnalController@edit_jurnal_guru')->name('edit-jurnal-guru');
Route::get('/kelas','AdminController@daftar_kelas')->name('admin.kelas');
Route::get('/daftar-siswa-rombel/{id}','AdminController@daftar_siswa_rombel')->name('siswa.rombel');
Route::get('/tampilkan/jadwal','AdminController@tampilkan_jadwal_kelas')->name('tampilkanjadwal.kelas');
});

//Route Guru

//Route Siswa Ujian
Route::prefix('/siswa')->middleware('CekSessionSiswa')->group(function (){
Route::get('/jadwal-ujian','PenilaianController@jadwal_ujian')->name("jadwal_ujian");
Route::get('/jadwal-ujian-praktek','PenilaianController@jadwal_ujian_praktek')->name("jadwal_ujian_praktek");
Route::post('/jadwal-ujian-teori','PenilaianController@jadwal_ujian_teori')->name("jadwal_ujian_teori");
Route::post('/jadwal-ujian-praktek2','PenilaianController@jadwal_ujian_praktek2')->name("jadwal_ujian_praktek2");

Route::get('/Validasi/{id}','PenilaianController@masuk_ujian')->name("masuk_ujian")->middleware('prevent-back-history');
Route::post('/ujian','PenilaianController@siswa_ujian')->name("kerjakan_ujian")->middleware('prevent-back-history');
Route::get('/ujian','PenilaianController@siswa_ujian_refresh')->name("kerjakan_ujian_refresh")->middleware('prevent-back-history');
Route::post('/ujian/lanjut','PenilaianController@lanjut_ujian')->name("lanjut_ujian")->middleware('prevent-back-history');
Route::get('/ujian/lanjut','PenilaianController@lanjut_ujian_refresh')->name("lanjut_ujian_refresh")->middleware('prevent-back-history');
Route::put('/selesai','PenilaianController@selesai_ujian')->name("selesai_ujian")->middleware('prevent-back-history');
Route::put('/simpan','PenilaianController@simpan_ujian')->name("simpan_ujian")->middleware('prevent-back-history');
Route::put('/update','PenilaianController@update_ujian')->name("update_ujian")->middleware('prevent-back-history');
Route::get('/ujian/nilai/{nilai}','PenilaianController@nilai_ujian')->name("nilai_ujian")->middleware('prevent-back-history');
//Route Siswa Ujian
//route siswa Materi
Route::get('/materi','MateriController@materi_siswa')->name("materi_siswa");
Route::get('/materi/bab/{id}','MateriController@bab_siswa')->name("bab.siswa");
Route::get('/materi/akses/{id}','MateriController@akses_siswa')->name("akses.siswa");
//route siswa Materi

Route::get('/halaqoh','HalaqohsiswaController@halaqoh')->name("halaqoh");
Route::get('/halaqoh-hasil/{id}','HalaqohsiswaController@halaqoh_hasil')->name("halaqoh.hasil");
Route::put('/halaqoh','HalaqohsiswaController@halaqoh_save')->name("halaqoh.save");
});
//Route Uplod
Route::get('/file-upload', 'FileUploadController@fileUpload')->name('fileupload');
Route::post('/file-upload', 'FileUploadController@prosesFileUpload')->name('prosesfileupload');


//Route Wali
    Route::prefix('/wali')->middleware('CekSessionWali')->group(function (){
    Route::post('/kehadiran','WalisController@kehadiran')->name('kehadiran');
    Route::get('/jadwal-ujian','WalisController@jadwal_ujian')->name('jadwal.ujian');
    Route::get('/catatan-halaqoh-online','WalisController@catatan_halaqoh_online')->name('halaqoh.online');

    
   
    });

//routeWali
//Route Upload
Auth::routes(['verify' => true]);

Route::get('/Dashboard', 'HomeController@index')->name('dashboard'); 

