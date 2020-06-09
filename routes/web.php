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
Route::prefix('/admin')->middleware('CekSessionAdmin')->group(function (){
Route::get('/user','HomeController@user')->name('admin.users');
Route::get('/user/{id}','HomeController@edit')->name('admin.edituser');
});
//Route Admin

//Route Guru
Route::prefix('/guru')->middleware('CekSessionGuru')->group(function (){
Route::post('/jadwal', 'GuruController@requestjadwal')->name('jadwal');
Route::get('/absensi/{id}', 'GuruController@absensi')->name('absensi');
Route::get('/materi','GuruController@tambahmateri')->name('materi');
Route::put('/save-form', 'GuruController@store')->name('savekbm');
Route::put('/save-jurnal', 'GuruController@store_jurnal')->name('savejurnal');
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
});
//Route Uplod
Route::get('/file-upload', 'FileUploadController@fileUpload')->name('fileupload');
Route::post('/file-upload', 'FileUploadController@prosesFileUpload')->name('prosesfileupload');

//Route Upload
Auth::routes();

Route::get('/Dashboard', 'HomeController@index')->name('dashboard');

