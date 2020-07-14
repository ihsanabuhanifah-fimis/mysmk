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
        
        $mapel=DB::table('materis')
        ->leftjoin('rombels','rombels.id_rombel','=','materis.id_rombel')
        ->leftjoin('mapels','mapels.id_subject','=','materis.id_subject') 
        ->leftjoin('cikgus','cikgus.id_cikgu','=','materis.id_cikgu')
        ->where('materis.id_rombel',$id_rombel->id_rombel)->OrWhere('materis.id_angkatan', $id_rombel->id_angkatan)
        ->groupBy('materis.id_subject')
        ->get();

        

        $jml_mapel=count($mapel);
        $i = 0 ;
        for($i ; $i < $jml_mapel ; $i++){
            $materi[$i]=DB::table('materis')
            ->leftjoin('rombels','rombels.id_rombel','=','materis.id_rombel')
            ->leftjoin('mapels','mapels.id_subject','=','materis.id_subject') 
            ->leftjoin('cikgus','cikgus.id_cikgu','=','materis.id_cikgu')
            ->leftjoin('babs','babs.id_bab','=','materis.id_bab')
            ->where('materis.id_subject', $mapel[$i]->id_subject)
            ->groupby('materis.id_subject')
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

  
}