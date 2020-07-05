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
        $rombel = DB::table('rombels')
        ->get();
        $ta = DB::table('tas')
        ->get();
        
 
       

        return view('admin.daftar-siswa',['siswas'=>$siswa,'rombels'=>$rombel,'tas'=>$ta]);
    }

    public function daftar_wali()
    {
       
        $wali = DB::table('walis')
       
        ->leftjoin('users','users.email','=','walis.email')
        
        ->get();

        return dump($wali);
        return view('admin.daftar-wali',['walis'=>$wali]);
    }

    public function daftar_kelas()
    {
        $kelas=Rombel::all();
       
        return view('admin.daftar-kelas',['rombels' => $kelas]);
    
    }

    public function simpan_rombel(Request $request)
    {
        $id_ta = $request["id_ta"];
        $id_rombel = $request["id_rombel"];
        $semester = $request["semester"];
        $siswa = $request["pilih-siswa"];

        if($request["pilih-siswa"]=NULL){
            return "tidak ada siswa di pilih";
        }else{
        $jml_siswa = count($siswa);
        if($request["id_rombel"] == 1)
        $id_angkatan = 1;
        elseif($request["id_rombel"] == 2)
        $id_angkatan = 1;
        elseif($request["id_rombel"] == 3)
        $id_angkatan = 2;
        elseif($request["id_rombel"] == 4)
        $id_angkatan = 2;
        elseif($request["id_rombel"] == 5)
        $id_angkatan = 3;
        elseif($request["id_rombel"] == 6)
        $id_angkatan = 3;

       
      
        $i=0;
        while($i < $jml_siswa){

            $rombel= new Student_rombel();
           
            $rombel-> id_rombel = $id_rombel;
            $rombel-> semester = $semester;
            $rombel-> id_ta = $id_ta;
            $rombel-> time_stamp = NOW();
            $rombel-> nis = $siswa[$i];
            $rombel-> id_angkatan = $id_angkatan;
            $rombel->save();


           

            $i++;
        }
        }
        

        
        

        return "Alhamdulilah";
    }
    

    public function daftar_siswa_rombel($id)
    {
       $siswa = DB::table('student_rombels')
       ->leftjoin('students','students.nis','=','student_rombels.nis')
       ->leftjoin('tas','tas.id_ta','=','student_rombels.id_ta')
       ->leftjoin('rombels','rombels.id_rombel','=','student_rombels.id_rombel')
       ->where('student_rombels.id_rombel', $id)
       ->get();

    $jml_siswa=count($siswa);
     
       return view('admin.daftar-rombel-siswa',['siswas' =>$siswa, 'jml_siswa'=>$jml_siswa]);
    }
}
