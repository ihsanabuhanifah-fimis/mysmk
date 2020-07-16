<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use App\User;
use App\Jadwal;
use App\Student_rombel;
use App\Student;
use App\Rombel;
use App\Cikgu;
use App\Mapel;
use App\Materi;
use App\Banksoal;
use App\Bab;
use App\Jenis_ujian;
use App\Tipe_ujian;
use App\Kbm;
use App\Penilaian_siswa;
use App\Penilaian;
use App\Providers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class MateriController extends Controller
{
    public function materi_siswa()
    {
      
        $username= Auth::user()->username;
        $nis=Student::where('username',"$username")->first();
        $id_rombel=Student_rombel::where('nis',$nis->nis)->first();

        
        if($id_rombel->id_rombel == 1){
            $id_angkatan = 1;

        }elseif($id_rombel->id_rombel == 2){
            $id_angkatan = 1;
        }elseif($id_rombel->id_rombel == 3){
            $id_angkatan = 2;
        }elseif($id_rombel->id_rombel == 4){
            $id_angkatan = 2;
        }elseif($id_rombel->id_rombel == 5){
            $id_angkatan = 3;
        }elseif($id_rombel->id_rombel == 6){
            $id_angkatan = 3;
        }
        
        $mapel=DB::table('materis')
        ->leftjoin('rombels','rombels.id_rombel','=','materis.id_rombel')
        ->leftjoin('mapels','mapels.id_subject','=','materis.id_subject') 
        ->leftjoin('cikgus','cikgus.id_cikgu','=','materis.id_cikgu')
        ->where('materis.id_rombel',$id_rombel->id_rombel)->OrWhere('materis.id_angkatan', $id_angkatan)
        ->groupBy('materis.id_subject')
        ->get();
        
        

        if(count($mapel)==NULL){
            $materi=[];
            return view('siswa.materi-siswa',['mapels'=>$mapel,'materis'=>$materi]);

        }
        

        $jml_mapel=count($mapel);
        $i = 0 ;
        for($i ; $i < $jml_mapel ; $i++){
            $materi[$i]=DB::table('materis')
            ->leftjoin('rombels','rombels.id_rombel','=','materis.id_rombel')
            ->leftjoin('mapels','mapels.id_subject','=','materis.id_subject') 
            ->leftjoin('cikgus','cikgus.id_cikgu','=','materis.id_cikgu')
            ->leftjoin('babs','babs.id_bab','=','materis.id_bab')
            ->where('materis.id_subject', $mapel[$i]->id_subject)
            ->where('mareris.id_cikgu', $mapel[$i]->id_cikgu)
            ->groupby('materis.id_bab')
            ->get(); 
        }
       
        // return dump($materi[0][0]->nama_bab);
        return view('siswa.materi-siswa',['mapels'=>$mapel,'materis'=>$materi]);

    }

    public function bab_siswa($id)
    {
        $username= Auth::user()->username;
        $nis=Student::where('username',"$username")->first();
        $id_rombel=Student_rombel::where('nis',$nis->nis)->first();

        $materi=DB::table('materis')
        ->leftjoin('rombels','rombels.id_rombel','=','materis.id_rombel')
        ->leftjoin('mapels','mapels.id_subject','=','materis.id_subject') 
        ->leftjoin('cikgus','cikgus.id_cikgu','=','materis.id_cikgu')
        ->where('materis.id_rombel',$id_rombel->id_rombel)
        ->where('id_bab', $id)
        ->get();

        $bab=DB::table('babs')
        ->where('id_bab',$id)
        ->first();

        return view('siswa.bab-siswa',['materis'=>$materi,'bab'=>$bab]);
    }

    public function akses_siswa($id)
    {
        $username= Auth::user()->username;
        $nis=Student::where('username',"$username")->first();
        $id_rombel=Student_rombel::where('nis',$nis->nis)->first();
        $materi=DB::table('materis')
        
        ->where('id_rombel',$id_rombel->id_rombel)
        ->where('id', $id)
        ->get()[0];

        return view('siswa.akses-materi',['materi'=>$materi]);
    }
    public function jadwal()
    {
        $username= Auth::user()->username;
        $nis=Student::where('username',"$username")->first();
        $rombel=Student_rombel::where('nis',$nis->nis)->first();

       
  
     $jadwal = DB:: table('jadwals')
     ->leftjoin('cikgus','cikgus.id_cikgu','=','jadwals.id_cikgu')
     ->leftjoin('rombels','rombels.id_rombel','=','jadwals.id_rombel')
     ->leftjoin('mapels','mapels.id_subject','=','jadwals.id_subject')
     ->leftjoin('tas','tas.id_ta','=','jadwals.id_ta')
     ->where('jadwals.id_rombel',$rombel->id_rombel)
     ->where('jadwals.status', 1)
   
     ->get();
     $senin = DB:: table('jadwals')
     ->leftjoin('cikgus','cikgus.id_cikgu','=','jadwals.id_cikgu')
     ->leftjoin('rombels','rombels.id_rombel','=','jadwals.id_rombel')
     ->leftjoin('mapels','mapels.id_subject','=','jadwals.id_subject')
     ->leftjoin('tas','tas.id_ta','=','jadwals.id_ta')
     ->where('jadwals.id_rombel',$rombel->id_rombel)
     ->where('jadwals.status', 1)
     ->where('days','Monday')
   
     ->get();
     $senin = DB:: table('jadwals')
     ->leftjoin('cikgus','cikgus.id_cikgu','=','jadwals.id_cikgu')
     ->leftjoin('rombels','rombels.id_rombel','=','jadwals.id_rombel')
     ->leftjoin('mapels','mapels.id_subject','=','jadwals.id_subject')
     ->leftjoin('tas','tas.id_ta','=','jadwals.id_ta')
     ->where('jadwals.id_rombel',$rombel->id_rombel)
     ->where('jadwals.status', 1)
     ->where('days','Monday')
     ->orderby('waktu','asc')
     ->get();
  
     $selasa = DB:: table('jadwals')
     ->leftjoin('cikgus','cikgus.id_cikgu','=','jadwals.id_cikgu')
     ->leftjoin('rombels','rombels.id_rombel','=','jadwals.id_rombel')
     ->leftjoin('mapels','mapels.id_subject','=','jadwals.id_subject')
     ->leftjoin('tas','tas.id_ta','=','jadwals.id_ta')
     ->where('jadwals.id_rombel',$rombel->id_rombel)
     ->where('jadwals.status', 1)
     ->where('days','Tuesday')
     ->orderby('waktu','asc')
     ->get();
     $rabu = DB:: table('jadwals')
     ->leftjoin('cikgus','cikgus.id_cikgu','=','jadwals.id_cikgu')
     ->leftjoin('rombels','rombels.id_rombel','=','jadwals.id_rombel')
     ->leftjoin('mapels','mapels.id_subject','=','jadwals.id_subject')
     ->leftjoin('tas','tas.id_ta','=','jadwals.id_ta')
     ->where('jadwals.id_rombel',$rombel->id_rombel)
     ->where('jadwals.status', 1)
     ->where('days','Wednesday')
     ->orderby('waktu','asc')
     ->get();
     $kamis = DB:: table('jadwals')
     ->leftjoin('cikgus','cikgus.id_cikgu','=','jadwals.id_cikgu')
     ->leftjoin('rombels','rombels.id_rombel','=','jadwals.id_rombel')
     ->leftjoin('mapels','mapels.id_subject','=','jadwals.id_subject')
     ->leftjoin('tas','tas.id_ta','=','jadwals.id_ta')
     ->where('jadwals.id_rombel',$rombel->id_rombel)
     ->where('jadwals.status', 1)
     ->where('days','Thursday')
     ->orderby('waktu','asc')
     ->get();
     $jumat = DB:: table('jadwals')
     ->leftjoin('cikgus','cikgus.id_cikgu','=','jadwals.id_cikgu')
     ->leftjoin('rombels','rombels.id_rombel','=','jadwals.id_rombel')
     ->leftjoin('mapels','mapels.id_subject','=','jadwals.id_subject')
     ->leftjoin('tas','tas.id_ta','=','jadwals.id_ta')
     ->where('jadwals.id_rombel',$rombel->id_rombel)
     ->where('jadwals.status', 1)
     ->where('days','Friday')
      ->orderby('waktu','asc')
     ->get();
     $sabtu = DB:: table('jadwals')
     ->leftjoin('cikgus','cikgus.id_cikgu','=','jadwals.id_cikgu')
     ->leftjoin('rombels','rombels.id_rombel','=','jadwals.id_rombel')
     ->leftjoin('mapels','mapels.id_subject','=','jadwals.id_subject')
     ->leftjoin('tas','tas.id_ta','=','jadwals.id_ta')
     ->where('jadwals.id_rombel',$rombel->id_rombel)
     ->where('jadwals.status', 1)
     ->where('days','Saturday')
     ->orderby('waktu','asc')
     ->get();
     return view('wali.jadwal-mapel',
     [
         'jadwals'=>$jadwal,
         'senins'=>$senin,
         'selasas'=>$selasa,
         'rabus'=>$rabu,
         'kamiss'=>$kamis,
         'jumats'=>$jumat,
         'sabtus'=>$sabtu,
         ]);
}
public function mapel_aktif()
{
    $username= Auth::user()->username;
        $nis=Student::where('username',"$username")->first();
        $rombel=Student_rombel::where('nis',$nis->nis)->first();

   $mapel = DB:: table('jadwals')
   ->leftjoin('cikgus','cikgus.id_cikgu','=','jadwals.id_cikgu')
   ->leftjoin('rombels','rombels.id_rombel','=','jadwals.id_rombel')
   ->leftjoin('mapels','mapels.id_subject','=','jadwals.id_subject')
   ->leftjoin('tas','tas.id_ta','=','jadwals.id_ta')
   ->where('jadwals.id_rombel',$rombel->id_rombel)
   ->where('jadwals.status', 1)
   ->groupby('jadwals.id_subject')
   ->get();


   return view('wali.mapel-aktif',['mapels'=>$mapel]);
   return dump($mapel);
}


}