<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\User;
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
use App\Mapel_aktif;
use App\Jurnal;
use App\Penilaian;
use App\Providers;
use Validator,Redirect,Response;
use Illuminate\Support\Facades\Auth;

class JadwalController extends Controller
{
    public function mapel_aktif_save(Request $request)
    {
        $username= Auth::user()->username;
        $id_cikgu=Cikgu::where('username',"$username")->first();
        $mapel = new Mapel_aktif();
        $mapel->status = $request["status"];
        $mapel->id_tipe = $request["id_tipe"];
        $mapel->id_subject = $request["id_subject"];
        $mapel->id_rombel = $request["id_rombel"];
        $mapel->id_ta = $request["id_ta"];
        $mapel->semester = $request["semester"];
        $mapel->id_cikgu = $id_cikgu->id_cikgu  ;
        $mapel->PH = $request["ph"];
        $mapel->PTS = $request["pts"];
        $mapel->PAS = $request["pas"];
        $mapel->Tugas = $request["tugas"];
        $mapel->Kuis = $request["kuis"];
        $mapel->save();
        return "Alhamdulilah berhasil diperbaharui";
    }
    
    public function mapel_saya(){

        $username= Auth::user()->username;
        $id_cikgu=Cikgu::where('username',"$username")->first();
        $mapel= DB::table("mapel_aktifs")
        ->leftjoin('tas','tas.id_ta','=','mapel_aktifs.id_ta')
        -> leftjoin ('mapels','mapels.id_subject','=','mapel_aktifs.id_subject')
        -> leftjoin('rombels','rombels.id_rombel','=','mapel_aktifs.id_rombel')
        ->leftjoin('tipe_ujians','tipe_ujians.id_tipe','=','mapel_aktifs.id_tipe')
        ->where('id_cikgu', $id_cikgu->id_cikgu)
        ->where('mapel_aktifs.status', 1)
        ->get();

        $rombel = DB::table('rombels')->get();
        $subject = DB::table('mapels')->get();
        $ta = DB::table('tas')->get();
        $tipe = DB::table('tipe_ujians')->get();

      
        return view('guru.mapel-saya',
        [
            'mapels'=>$mapel,
            'rombels'=>$rombel,
            'subjects'=>$subject,
            'tas'=>$ta,
            'tipes'=>$tipe,
        ]);
    }
    public function edit_mapel_saya($id)
    {
        
        $username= Auth::user()->username;
        $id_cikgu=Cikgu::where('username',"$username")->first();
        $mapel= DB::table("mapel_aktifs")
        ->leftjoin('tas','tas.id_ta','=','mapel_aktifs.id_ta')
        -> leftjoin ('mapels','mapels.id_subject','=','mapel_aktifs.id_subject')
        -> leftjoin('rombels','rombels.id_rombel','=','mapel_aktifs.id_rombel')
        ->leftjoin('tipe_ujians','tipe_ujians.id_tipe','=','mapel_aktifs.id_tipe')
        ->where('id_cikgu', $id_cikgu->id_cikgu)
        ->where('mapel_aktifs.id', $id)
        ->get();

        
      
        return view('guru.edit-pres-mapel', ['mapels'=>$mapel]);
    }

    public function simpan_mapel_saya(Request $request)
    {
        $username= Auth::user()->username;
        $id_cikgu=Cikgu::where('username',"$username")->first();
        $id=$request["id"];
     
        $mapel = new Mapel_aktif();
        $mapel = Mapel_aktif::where('id',$id)->where('id_cikgu',$id_cikgu->id_cikgu)->first();
        
        if($request['hapus-data'] == 1){
            $mapel -> delete();
            return "Alhamdulilah berhasil terhapus ";
        }
        $mapel->PH = $request["ph"];
        $mapel->PTS = $request["pts"];
        $mapel->PAS = $request["pas"];
        $mapel->Tugas = $request["tugas"];
        $mapel->Kuis = $request["kuis"];
        $mapel->save();
        return "Alhamdulilah berhasil diperbaharui";
    }



    public function rekap_absen()
    {
        $username= Auth::user()->username;
        $id_cikgu=Cikgu::where('username',"$username")->first();
        $rombel= DB::table("rombels")->get();
        $mapel =DB::table('mapels')->get();
        $ta=DB::table('tas')->get();


        
       
     return view('guru.rekap-absensi',['rombels'=>$rombel, 'mapels'=>$mapel,'tas'=>$ta]);
    }
    public function cari_rekap_absen(Request $request)
   
    {
        
        $username= Auth::user()->username;
        $id_cikgu=Cikgu::where('username',"$username")->first();
     
        $rekap = DB::table('kbms')
        ->leftjoin('rombels','rombels.id_rombel','=','kbms.id_rombel')
        ->leftjoin('mapels','mapels.id_subject','=','kbms.id_subject')
        ->leftjoin('tas','tas.id_ta','=','kbms.id_ta')
        ->where('id_cikgu', $id_cikgu->id_cikgu)
        ->where('kbms.id_rombel', $request["id_rombel"])
        ->where('kbms.id_subject', $request["id_subject"])
        ->where('kbms.id_ta',$request["id_ta"])
        ->where('semester', $request["semester"])
        ->get();
        

      
        $siswa=DB::table('students')
        
        ->get([
            'nis',
            'nama',
        ]);

        $siswa_rombel= DB::table('student_rombels')
        ->where('id_rombel', $request["id_rombel"])
        ->where('id_ta',$request["id_ta"])
        ->where('semester', $request["semester"])
      
        ->get();
        

       $jml_rekap = count($rekap);
       $a = 0;
       while($a < $jml_rekap){
           $kehadiran[$a]= json_decode($rekap[$a]->absen);
           $a++;
       }

       
    
       $jml_siswa = count($siswa_rombel);
       $jml_rekap = count($rekap);
       $jml_kehadiran = count($kehadiran);
       $jml_nama_siswa= count($siswa);
      
       

      
//  return dump($kehadiran);

       $b=0;
       while($b < $jml_kehadiran){
           $jml [$b] = count($kehadiran[$b]);        
           $b++;
       }
       $jml_siswa_absen= array_sum($jml);
       
      $i=0;
     
      while($i < $jml_kehadiran){
          $jml_absen = count($kehadiran[$i]);
          $j=0;
       
          while($j < $jml_absen){
              $k=0;
             
              while($k < $jml_siswa){
               
              
               
                  if($siswa_rombel[$k]->nis == $kehadiran[$i][$j]->n){
                    
                     $l=0;
                     while($l < $jml_nama_siswa){
                        
                         if($kehadiran[$i][$j]->n == $siswa[$l]->nis){
                             $absen[]=
                             [
                                 'nama' =>$siswa[$l]->nama,
                                 'nis' => $siswa[$l]->nis,
                                 'status' =>$kehadiran[$i][$j]->k,
                                 'keterangan' =>$kehadiran[$i][$j]->s,
                                 'semester' =>$rekap[$i]->semester,
                                 'nama_ta' =>$rekap[$i]->nama_ta,
                                 'tanggal' =>$rekap[$i]->tanggal,
                                 'subject_name' =>$rekap[$i]->subject_name,    
                                 'nama_rombel' =>$rekap[$i]->nama_rombel,    
                             ];
                           
                         }
                         $l++;
                     }
                   
                     
                  }else{
                   
                    
               
                  }
                  
                  $k++;
              }
              $j++;
          }
          $i++;
      }

     $json=json_encode($absen);
     $absen_siswa=json_decode($json);

   
  

        return view('guru.hasil-rekap',
        [
            'rekaps'=>$absen_siswa, 
           
        ]);

      
    }
   
}
