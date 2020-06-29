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
use App\Kelompok_halaqoh;
use App\Pembimbing_halaqoh;
use App\Rombel_halaqoh;
use App\Laporan_halaqoh_online;
use App\Rekaman_halaqoh_online;
use App\Mapel;
use App\Ta;
use App\Banksoal;
use App\Surat_alquran;
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

class HalaqohsiswaController extends Controller
{
    public function halaqoh(){
        $username= Auth::user()->username;
        $nis=Student::where('username',"$username")->first();
        $id_kelompok=DB::table('rombel_halaqohs')
        ->where('nis',$nis->nis)
        ->where('status', 1)
        ->first()->id_kelompok;

        $halaqoh_online=DB::table('laporan_halaqoh_onlines')
        ->leftjoin('tas','tas.id_ta','=','laporan_halaqoh_onlines.id_ta')
        ->where('id_kelompok', $id_kelompok)
        ->orderBy('tanggal','desc')
        ->get();
      
        return view('siswa.halaqoh-online', ['halaqohs'=>$halaqoh_online]);
        
    }

    public function halaqoh_save(Request $request)
    {
   

        $username= Auth::user()->username;
        $nis=Student::where('username',"$username")->first();
            
        $laporan = DB::table('laporan_halaqoh_onlines')
        ->where('id', $request["id"])
        ->get();

    
        $halaqoh= new Rekaman_halaqoh_online();
        $halaqoh->nis = $nis->nis;
        $halaqoh->id_halaqoh = $laporan[0]->id;
        $halaqoh->surat_mulai = $request["surat_mulai"];
        $halaqoh->surat_akhir = $request["surat_akhir"];
        $halaqoh->ayat_mulai = $request["ayat_mulai"];
        $halaqoh->ayat_akhir = $request["ayat_akhir"];
        $halaqoh->rekaman = $request["rekaman"];
        $halaqoh->check = 1;
        $halaqoh->tanggal = $laporan[0]->tanggal;
        $halaqoh->semester= $laporan[0]->semester;
        $halaqoh->id_ta= $laporan[0]->id_ta;
        $halaqoh->id_kelompok = $laporan[0]->id_kelompok;
       

        $cek = DB::table('rekaman_halaqoh_onlines')
        ->where('nis',$nis->nis)
        ->where('id_halaqoh',$laporan[0]->id)
        ->get();
   
        $waktu = date('H:i:s');
        $tanggal = date('d-m-Y');
      
     
               
       if(count($cek) == NULL){
           if(strtotime($tanggal) <= strtotime($laporan[0]->tanggal)){

           
           if($waktu > $laporan[0]->waktu){
               return "Mohon maaf waktu upload rekaman sudah habis";
           }else{
            $halaqoh->save();
            return "Alhamdulilah rekaman hafalan tersimpan";
           }
        }else{
            return "Mohon maaf waktu upload rekaman sudah habis";
        }
          
           
       } else{
           return "Mohon maaf anda sudah upload rekaman hafalan di tanggal ini";
       }
       
       
            
       
    }


    public function halaqoh_hasil($id)
    {
        $username= Auth::user()->username;
        $nis=Student::where('username',"$username")->first();
        $halaqoh = DB::table('rekaman_halaqoh_onlines')
        ->where('nis',$nis->nis)
        ->where('id_halaqoh',$id)
        ->get();

  
        $jml_halaqoh=count($halaqoh);
        $surat =DB::table('surat_alqurans')
        ->get();

        $i=0;
        $jml_surat=count($surat);
        if($jml_halaqoh == NULL){
            $halaqoh_=[];
        }else{
        while($i < $jml_surat){
            if($halaqoh[0]->surat_mulai == $surat[$i]->id_surat){
                $halaqoh_[] = 
                [
                    'id'=> $halaqoh[0]->id,
                'surat_mulai' =>$surat[$i]->nama_surat,
                'ayat_mulai' => $halaqoh[0]->ayat_mulai,
                'check' => $halaqoh[0]->check,
                'komentar' => $halaqoh[0]->komentar,
                ];
            }
                if($halaqoh[0]->surat_akhir == $surat[$i]->id_surat){
                    $halaqoh_[] = 
                    [
                    'surat_akhir' =>$surat[$i]->nama_surat,
                    'ayat_akhir' => $halaqoh[0]->ayat_akhir,
                    ];
                }
           
            $i++;
        }
    }


        $json = json_encode($halaqoh_);
        $halaqoh_siswa = json_decode($json);

      
        return view('siswa.setoran-halaqoh-online',['halaqoh'=>$halaqoh_siswa]);
    }
}
