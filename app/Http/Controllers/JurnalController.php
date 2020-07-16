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
use App\Jurnal_guru;
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

class JurnalController extends Controller
{
    public function jurnal_guru()
    {
        $username= Auth::user()->username;
        $id_cikgu=Cikgu::where('username',"$username")->first();
        $rombel= DB::table("rombels")->get();
        $mapel =DB::table('mapels')->get();
        $ta=DB::table('tas')->get();
        
        return view('guru.jurnal-guru');
    }

    public function simpan_jurnal_guru(Request $request)
    {
        $username= Auth::user()->username;
        $id_cikgu=Cikgu::where('username',"$username")->first();
        $jml=count($request["waktu_mulai"]);
        $i=0;
        while($i < $jml){
            $kegiatans [$i] = 
            [
                'm' => $request["waktu_mulai"][$i],
                's' => $request["waktu_selesai"][$i],
                'k' => $request["kegiatan"][$i],
            ];
            $i++;
        }

      
        $kegiatan = json_encode($kegiatans);
        $jurnal_sudah_ada = DB::table("jurnal_gurus")
        ->where("tanggal",$request["tanggal"] )
        ->where("id_cikgu",$id_cikgu->id_cikgu)
        ->get();

    
    
        
        $jurnal = new Jurnal_guru();
        $jurnal -> id_cikgu = $id_cikgu->id_cikgu;
        $jurnal -> tanggal = $request["tanggal"];
        if($request["hari"] == "Monday"){
            $jurnal -> hari = 1;
        }elseif($request["hari"] == "Tuesday"){
            $jurnal -> hari = 2;
        }elseif($request["hari"] == "Wednesday"){
            $jurnal -> hari = 3;
        }elseif($request["hari"] == "Thursday"){
            $jurnal -> hari = 4;
        }elseif($request["hari"] == "Friday"){
            $jurnal -> hari = 5;
        }elseif($request["hari"] == "Saturday"){
            $jurnal -> hari = 6;
        }elseif($request["hari"] == "Sunday"){
            $jurnal -> hari = 7;
        }
        $jurnal -> kegiatan = $kegiatan;
        $jurnal -> save = NOW();
       
        
        if(count($jurnal_sudah_ada) != NULL){
            return "Untuk melakukan penambahan, silahkan gunakan edit";
        }else{
            $jurnal->save();
        return "Alhamdulilah Jurnal tersimpan";
        }
        
    }

    public function rekap_jurnal_guru()

    {
        $username= Auth::user()->username;
        $id_cikgu=Cikgu::where('username',"$username")->first();
        $jurnal = DB::table("jurnal_gurus")
        ->orderBy('tanggal','desc')
        ->where("id_cikgu",$id_cikgu->id_cikgu )
        ->get();

        $jml=count($jurnal);
       
        $i=0;
        while($i < $jml){

        
        $kegiatan[$i] = json_decode($jurnal[$i]->kegiatan);
        $i++;
        }

        $j=0;
        while($j < $jml){
            $jml_kegiatan = count($kegiatan[$j]);
            $k=0;
            while($k < $jml_kegiatan){
                $jurnal_guru[] = 
                [
                    'waktu_mulai' => $kegiatan[$j][$k]->m,
                    'waktu_selesai' => $kegiatan[$j][$k]->s,
                    'kegiatan' => $kegiatan[$j][$k]->k,
                    'hari' => $jurnal[$j]->hari,
                    'tanggal' =>$jurnal[$j]->tanggal,
                    'id'=>$jurnal[$j]->id,
                ];
                $k++;
            }
            $j++;
        }
        $json=json_encode($jurnal_guru);
        $jurnal_gurus = json_decode($json);
        
        return view('guru.rekap-jurnal-guru', [ 'jurnals' =>$jurnal_gurus]);
    }

    public function cari_jurnal_guru($id)
    {
        $username= Auth::user()->username;
        $id_cikgu=Cikgu::where('username',"$username")->first();
        $jurnal = DB::table("jurnal_gurus")
        ->where("id_cikgu", $id_cikgu->id_cikgu)
        ->where("id", $id)
        ->first();
      
        $kegiatan = json_decode($jurnal->kegiatan);
        return view("guru.edit-jurnal-guru",['jurnal' =>$jurnal, 'kegiatans'=>$kegiatan]);
    }
    public function edit_jurnal_guru(Request $request )
    {
        $id=$request["id"];
 
        $username= Auth::user()->username;
        $id_cikgu=Cikgu::where('username',"$username")->first();
        $jurnal = new Jurnal_guru();
        $jurnal = Jurnal_guru::where('id',$id)->where('id_cikgu',$id_cikgu->id_cikgu)->get()[0];
        if($request["kegiatan"] == NULL){
           $jurnal->delete();
           return "ok";
        }
        $jml=count($request["waktu_mulai"]);
        $i=0;
        while($i < $jml){
            $kegiatans [$i] = 
            [
                'm' => $request["waktu_mulai"][$i],
                's' => $request["waktu_selesai"][$i],
                'k' => $request["kegiatan"][$i],
            ];
            $i++;
        }
        $kegiatan = json_encode($kegiatans);
        if($request["hari"] == "Monday"){
            $jurnal -> hari = 1;
        }elseif($request["hari"] == "Tuesday"){
            $jurnal -> hari = 2;
        }elseif($request["hari"] == "Wednesday"){
            $jurnal -> hari = 3;
        }elseif($request["hari"] == "Thursday"){
            $jurnal -> hari = 4;
        }elseif($request["hari"] == "Friday"){
            $jurnal -> hari = 5;
        }elseif($request["hari"] == "Saturday"){
            $jurnal -> hari = 6;
        }elseif($request["hari"] == "Sunday"){
            $jurnal -> hari = 7;
        }
        $jurnal-> tanggal = $request["tanggal"];
        $jurnal-> kegiatan = $kegiatan;
        $jurnal->save();

        return "ok";
        
    }
}
