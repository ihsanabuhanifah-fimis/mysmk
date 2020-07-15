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

class HalaqohController extends Controller
{
    public function get_halaqoh()
    {
        return view('guru.halaqoh');
    }

    public function add_halaqoh(Request $request)
    {
     
        $username= Auth::user()->username;
        $id_cikgu=Cikgu::where('username',"$username")->first();
        $id_pembimbing = DB::table('pembimbing_halaqohs')
        ->where('id_cikgu', $id_cikgu->id_cikgu)
        ->get();

       
        
        $rombel = DB::table('rombel_halaqohs')
        ->where('id_pembimbing', $id_pembimbing[0]->id_pembimbing)
        ->where('status', 1)
        ->get();

        
       

        $i=0;
        $jml_santri = count($rombel);
        while($i < $jml_santri){
            $nama[$i]= [
                'n' => $rombel[$i]->nis
            ];
            $i++;
        }

        

        $nama_santri = json_encode($nama);
       
        $halaqoh= new Laporan_halaqoh_online();
        $halaqoh -> id_pembimbing = $id_pembimbing[0]->id_pembimbing;
        $halaqoh -> id_kelompok = $rombel[0]->id_kelompok;
      
        $halaqoh -> tanggal = $request["tanggal"];
        $halaqoh -> waktu = $request["waktu"];
        $halaqoh ->id_cikgu = $id_cikgu->id_cikgu;
        $halaqoh -> semester = $request["semester"];
        $halaqoh -> id_ta = $request["id_ta"];
        $halaqoh -> nama_santri = $nama_santri;

        if($request["hari"] == "Monday"){
            $halaqoh -> hari = 1;
        }elseif($request["hari"] == "Tuesday"){
            $halaqoh -> hari = 2;
        }elseif($request["hari"] == "Wednesday"){
            $halaqoh -> hari = 3;
        }elseif($request["hari"] == "Thursday"){
            $halaqoh -> hari = 4;
        }elseif($request["hari"] == "Friday"){
            $halaqoh -> hari = 5;
        }elseif($request["hari"] == "Saturday"){
            $halaqoh -> hari = 6;
        }elseif($request["hari"] == "Sunday"){
            $halaqoh -> hari = 7;
        }
       
        $cek = DB::table('laporan_halaqoh_onlines')
        ->where('tanggal', $request["tanggal"])
        ->where('id_pembimbing', $id_pembimbing[0]->id_pembimbing)
        ->get();

     
        
        if(count($cek) == NULL){
            $halaqoh->save();
            return "Alhamdulilah";
        }else{
            return "Mohon maaf sudah terdapat penilaian pada kelompok ini di tanggal yang dipilih";
        }
    }

    public function daftar_halaqoh()
    {
     
        $username= Auth::user()->username;
        $id_cikgu=Cikgu::where('username',"$username")->first();

        $id_pembimbing = DB::table('pembimbing_halaqohs')

        ->where('id_cikgu', $id_cikgu->id_cikgu)
        ->get();

       
       

        $rombel = DB::table('rombel_halaqohs')
        ->where('id_pembimbing', $id_pembimbing[0]->id_pembimbing)
        ->get();
      
        $cek = DB::table('laporan_halaqoh_onlines')
     
        ->leftjoin('tas','tas.id_ta','=','laporan_halaqoh_onlines.id_ta')
        ->orderBy('tanggal','desc')
        ->get();



        return view('guru.daftar-halaqoh',['daftars'=>$cek]);
    }


    public function siswa_halaqoh($id)
    {
        $username= Auth::user()->username;
        $id_cikgu=Cikgu::where('username',"$username")->first();
        
        $id_pembimbing = DB::table('pembimbing_halaqohs')
        ->where('id_cikgu', $id_cikgu->id_cikgu)
        ->get();    
        $surat =DB::table('surat_alqurans')
        ->get();

       

        $halaqoh = DB::table('laporan_halaqoh_onlines')
        ->where('id_pembimbing', $id_pembimbing[0]->id_pembimbing)
        ->where('id', $id)
        ->get();

        $rekaman = DB::table('rekaman_halaqoh_onlines')        
        ->where('id_halaqoh', $id)
        ->get();


        $jml_rekaman=count($rekaman);
        $jml_surat=count($surat);
        if($jml_rekaman == NULL){
           

                $rekam=[];
        }else{
        $a=0;
        while($a < $jml_rekaman){
            
            $b=0;
            while($b < $jml_surat){
                if($rekaman[$a]->surat_mulai == $surat[$b]->id_surat){
                   
                  
                    $rek[0] =
                    [
                    'id' =>$rekaman[$a]->id,
                    'nis' =>$rekaman[$a]->nis,
                    'surat_mulai' =>$surat[$b]->nama_surat,
                    'ayat_mulai' => $rekaman[$a]->ayat_mulai,
                    'rekaman' =>$rekaman[$a]->rekaman,
                    'komentar' =>$rekaman[$a]->komentar,
            
                    ];
                    
                }
                if($rekaman[$a]->surat_akhir == $surat[$b]->id_surat){
                   
               
                    $rek[1] =
                    [
                    'surat_akhir' =>$surat[$b]->nama_surat,
                    'ayat_akhir' => $rekaman[$a]->ayat_akhir,
                    
                    ];
                    
                }
                   
                    $b++;
                }
                $rekam[$a]=$rek;
                $a++; 
             
            }
        }
            $json = json_encode($rekam);
            $halaqoh_siswa = json_decode($json);
    
            // return dump($halaqoh_siswa);

        $siswa = json_decode($halaqoh[0]->nama_santri);
        $jml_siswa=count($siswa);


     
        $i = 0;
        while($i < $jml_siswa){
           
            $data [$i] = 
            DB::table("students")
            ->where("students.nis", $siswa[$i]->n)
            ->first([
                'nis',
                'nama'
            ]);
            $i++;
        }
 
     
   
        return view('guru.halaqoh-online',['siswas'=>$data,'rekaman'=>$halaqoh_siswa,'surat'=>$surat]);
      
     
      
      
        
    }
}
