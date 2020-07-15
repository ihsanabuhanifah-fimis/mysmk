<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use DB;
use App\User;
use App\Jadwal;
use App\Student_rombel;
use App\Student;
use App\Rombel;
use App\Harian;
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
        ->get();

        $surat = DB::table('surat_alqurans')
        ->orderby('id_surat', 'asc')
        ->get();

        

        if(count($id_kelompok) == NULL)
        {
           
            
            $halaqoh_online =[];
            return view('siswa.halaqoh-online', ['halaqohs'=>$halaqoh_online]);
        }

        $cikgu = DB::table('cikgus')->get();

        $halaqoh_online=DB::table('laporan_halaqoh_onlines')
        ->leftjoin('tas','tas.id_ta','=','laporan_halaqoh_onlines.id_ta')
        ->where('id_kelompok', $id_kelompok[0]->id_kelompok)
        ->orderBy('tanggal','desc')
        ->get();

        

        if($halaqoh_online == NULL)
        {
            $halaqoh_online =[];
           
        }
      
        return view('siswa.halaqoh-online', 
        [
            'halaqohs'=>$halaqoh_online,
            'cikgus'=>$cikgu,
            'surats'=>$surat
        ]);
        
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
        $halaqoh->id_cikgu = $laporan[0]->id_cikgu;
       

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

    public function harian()

    {
        return view('siswa.harian');
    }

    public function simpan_harian(Request $request)
    {
        $username= Auth::user()->username;
        $nis=Student::where('username',"$username")->first();
        $rombel=Student_rombel::where('nis', $nis->nis)->first();
      
        $data [] = 
        [
            'ta'=> $request["tahajud"],
            'k1'=> $request["ket1"],
            'su'=> $request["subuh"],
            'k2'=> $request["ket2"],
            'ha'=> $request["halaqoh"],
            'k3'=> $request["ket3"],
            'du'=> $request["dhuha"],
            'k4'=> $request["ket4"],
            'dz'=> $request["dzukur"],
            'k5'=> $request["ket5"],
            'as'=> $request["ashar"],
            'k6'=> $request["ket6"],
            'pa'=> $request["pagi"],
            'k7'=> $request["ket7"],
            'pe'=> $request["petang"],
            'k8'=> $request["ket8"],
            'ma'=> $request["maghrib"],
            'k9'=> $request["ket9"],
            'is'=> $request["isya"],
            'k10'=> $request["ket10"],
            'qu'=> $request["quran"],
            'k11'=> $request["ket11"],
        ];

     

        $kegiatan =json_encode($data);
        
        $harian = new Harian();
        $harian -> tanggal = $request["tanggal"];
        $harian -> hari = $request["hari"];
        $harian -> nis =$nis->nis;
        $harian -> kegiatan = $kegiatan;
        $harian -> id_rombel = $rombel->id_rombel;
     
        $cek = DB::table("harians")
        ->where('tanggal', $request["tanggal"])
        ->get();

       
        if(count($cek) != NULL){
            return "Mohon Maaf Kegiatan Harian di tanggal ini sudah tersimpan";
        }

    
        $harian->save();
        return "Alhamdulilah kegiatan Harian tersimpan";

    }


    public function tampil_harian()
    {
        $username= Auth::user()->username;
        $nis=Student::where('username',"$username")->first();
        $rombel=Student_rombel::where('nis', $nis->nis)->first();
        $daftar = DB::table('harians')
        ->where('nis', $nis->nis)
        ->orderby('tanggal', 'desc')
        ->get();

        return view('siswa.daftar-harian',
        [
            'daftars'=>$daftar
        ]);
    }
    
}
