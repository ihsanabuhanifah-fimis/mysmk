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
use App\Rombel_halaqoh;
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
                
               
            $users= DB::table('users')
            ->orderby('tanggal', 'desc')
            ->get();
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
        $id_pembimbing = DB::table('pembimbing_halaqohs')
        ->leftjoin('cikgus','cikgus.id_cikgu','=','pembimbing_halaqohs.id_cikgu')
      
        ->get();

        $student = DB::table('student_rombels')
        ->leftjoin('rombels','rombels.id_rombel','=','student_rombels.id_rombel')
      
        ->get();

        $halaqoh = DB::table('rombel_halaqohs')
        ->leftjoin('cikgus','cikgus.id_cikgu','=','rombel_halaqohs.id_cikgu')
        ->get();

       
    

     
      
        
 
       

        return view('admin.daftar-siswa',
        [
            'siswas'=>$siswa,
            'rombels'=>$rombel,
            'tas'=>$ta,
            'halaqohs'=>$halaqoh,
            'students'=>$student,
            'pembimbings' =>$id_pembimbing,
            
        ]);
    }

    public function daftar_wali()
    {
       
        $wali = DB::table('users')
        ->where('daftar_sebagai',5)
        ->where('secret_number', 'KMX787762XJ#$')
        ->get();
       
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
    public function simpan_halaqoh(Request $request)
    {
        $id_ta = $request["id_ta"];
      
        $id_pembimbing = $request["id_pembimbing"];
        $id_kelompok = $request["id_kelompok"];
        $id_cikgu = DB::table('pembimbing_halaqohs')
        ->where('id_pembimbing', $id_pembimbing)
        ->get();
        $siswa = $request["pilih-siswa"];
        $semester = $request["semester"];  $semester = $request["semester"];
      
        if(count($request["pilih-siswa"]) == NULL){
            return "tidak ada siswa di pilih";
        }else{
        $jml_siswa = count($siswa);
      


       

        $i=0;
        while($i < $jml_siswa){

            $rombel= new Rombel_halaqoh();
           
            $rombel-> id_pembimbing = $id_pembimbing;
            $rombel-> id_kelompok = $id_kelompok;
            $rombel-> semester = $semester;
            $rombel-> id_cikgu = $id_cikgu[0]->id_cikgu;
            $rombel-> id_ta = $id_ta;
            $rombel-> time_stamp = NOW();
            $rombel-> nis = $siswa[$i];
            $rombel-> status = 1;

        
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
       ->orderby('nama','asc')
       ->get();

    $jml_siswa=count($siswa);
     
       return view('admin.daftar-rombel-siswa',['siswas' =>$siswa, 'jml_siswa'=>$jml_siswa]);
    }

    public function jadwal_kelas()
    {
        $rombel = DB::table('rombels')
        ->get();
        $ta = DB::table('tas')
        ->get();
        $subject = DB::table('mapels')
        ->get();
        $cikgu = DB ::table('cikgus')
        ->get();


        return view('admin.jadwal',[
            'rombels'=>$rombel,
            'tas'=>$ta,
            'subjects'=>$subject,
            'cikgus'=>$cikgu
            ]);
    }

    public function simpan_jadwal_kelas(Request $request)
    {
        $days= $request['days'];
        $id_subject=$request['id_subject'];
        $id_rombel = $request['id_rombel'];
        $id_cikgu=$request['id_cikgu'];
        $id_ta= $request['id_ta'];
        $waktu=$request['waktu'];
        $semester = $request['semester'];
        $jam_ke= $request['jam_ke'];
        $durasi= $request['durasi'];
        $mulai=  $request['mulai'];
        $perjam= $request['perjam'];


        $jml = count($mulai);

        $i=0;
        while($i < $jml){
            $jadwal= new Jadwal();
            $jadwal -> id_subject = $id_subject[$i];
            $jadwal -> id_rombel = $id_rombel;
            $jadwal -> id_cikgu = $id_cikgu[$i];
            $jadwal -> days = $days;
            $jadwal -> perjam= $perjam[$i];
            $jadwal-> waktu = $waktu[$i];
            $jadwal -> jam_ke = $jam_ke[$i];
            $jadwal -> id_ta = $id_ta; 
            $jadwal -> semester = $semester;
            $jadwal -> duration = $durasi[$i];
            $jadwal -> mulai = $mulai[$i];
            $jadwal -> status =1;

           
            $jadwal->save();
            $i++;
        }
        return "Alhamdulilah Jadwal tersimpan   ";

    }

    public function tampilkan_jadwal_kelas()
    {
       $jadwal = DB::table('jadwals')
       ->leftjoin('mapels','mapels.id_subject','=','jadwals.id_subject')
       ->leftjoin('rombels','rombels.id_rombel','=','jadwals.id_rombel')
       ->leftjoin('cikgus','cikgus.id_cikgu','=','jadwals.id_cikgu')
       ->leftjoin('tas','tas.id_ta','=','jadwals.id_ta')
       ->where('jadwals.status',1)
       ->get();

   

       return view('admin.jadwal-siswa',['jadwals'=>$jadwal]);
    }

    public function edit_jadwal($id)
    {
        $jadwal = DB::table('jadwals')
        ->leftjoin('mapels','mapels.id_subject','=','jadwals.id_subject')
       ->leftjoin('rombels','rombels.id_rombel','=','jadwals.id_rombel')
       ->leftjoin('cikgus','cikgus.id_cikgu','=','jadwals.id_cikgu')
       ->leftjoin('tas','tas.id_ta','=','jadwals.id_ta')
        ->where('no', $id)
        ->get();

        return count($jadwal);
    }
}
