<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use DB;
use App\User;
use App\Mapel_aktif;
use App\Jadwal;
use App\Student_rombel;
use App\Student;
use App\Rombel;
use App\Cikgu;
use App\Mapel;
use App\Ta;
use App\Banksoal;
use App\Materi;
use App\Bab;
use App\Jenis_ujian;
use App\Tipe_ujian;
use App\Kbm;
use App\Jurnal;
use App\Penilaian;
use App\Providers;
use Validator,Redirect,Response;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function user()
    {
      
            // return view('admin.users');
            if(auth()->user()->hasRole('admin')){  
                
               
            $users=User::all();
            //ketika method user di akses, maka ambil semua data di table users dengan methode User::all();
            return view('admin.users',['users'=>$users]);
                 }else{
            return view('home');
            }
        
    }

    public function daftar_siswa()
    {
        $siswa=Student::all();

        return view('admin.daftar-siswa',['siswas'=>$siswa]);
    }

    public function daftar_wali()
    {
       
        $wali = DB::table('walis')
       
        ->leftjoin('users','users.email','=','walis.email')
        
        ->get();

        return dump($wali);
        return view('admin.daftar-wali',['walis'=>$wali]);
    }
}
