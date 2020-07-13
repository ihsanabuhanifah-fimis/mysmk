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
use App\Pengumuman;
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

class PengumumanController extends Controller
{
    public function pengumuman(){
        $username= Auth::user()->username;
        $id_cikgu=Cikgu::where('username',"$username")->first();
        $rombel=DB::table('rombels')->get();
        $mapel=DB::table('mapels')->get();
      return view('guru.pengumuman',
      [
          'rombels'=>$rombel,
          'subjects'=>$mapel
      ]);
    }

    public function simpan_pengumuman(Request $request)
    {
        $username= Auth::user()->username;
        $id_cikgu=Cikgu::where('username',"$username")->first();
        $jurnal= new Pengumuman();
   
        $jurnal-> id_cikgu= $id_cikgu->id_cikgu;
        $jurnal-> id_rombel=$request["id_rombel"];
        $jurnal-> id_subject=$request["id_subject"];
        $jurnal-> tanggal = $request["tanggal"];
        $jurnal->pengumuman = $request["umum"];
        $jurnal->save();
        return "Alhamdulilah Pengumuman tersimpan";
    }

    public function daftar_pengumuman()
    {
        $username= Auth::user()->username;
        $id_cikgu=Cikgu::where('username',"$username")->first();
        $daftar= DB ::table('pengumumen')
        ->leftjoin('rombels','rombels.id_rombel','=','pengumumen.id_rombel')
        ->leftjoin('mapels','mapels.id_subject','=','pengumumen.id_subject')
        ->where('pengumumen.id_cikgu',$id_cikgu->id_cikgu)
        ->orderby('pengumumen.tanggal', 'desc')
        ->get();
     
        return view('guru.daftar-pengumuman',['daftars'=>$daftar]);
    }

    public function edit_pengumuman($id)
    {
        $username= Auth::user()->username;
        $id_cikgu=Cikgu::where('username',"$username")->first();
        $daftar= DB ::table('pengumumen')
        ->leftjoin('rombels','rombels.id_rombel','=','pengumumen.id_rombel')
        ->leftjoin('mapels','mapels.id_subject','=','pengumumen.id_subject')
        ->where('pengumumen.id_cikgu',$id_cikgu->id_cikgu)
        ->where('id',$id)
        ->get();
        $rombel=DB::table('rombels')->get();
        $mapel=DB::table('mapels')->get();
        return view('guru.edit-pengumuman',
        [
            'daftars'=>$daftar,
            'rombels'=>$rombel,
          'subjects'=>$mapel
        ]);
    }

    public function edit_pengumuman_saya(Request $request)
    {
        $username= Auth::user()->username;
        $id_cikgu=Cikgu::where('username',"$username")->first();
        $pengumuman= new Pengumuman();
        $pengumuman = Pengumuman::where('id',$request["id"])->where('id_cikgu',$id_cikgu->id_cikgu)->first();

        if($request["hapus"] != NULL)
        {
            $pengumuman -> delete($id_cikgu->id_cikgu);
            return "Alhamdulilah pengumuman telah terhapus";
        };

        $pengumuman -> id_subject = $request["id_subject"];
        $pengumuman -> tanggal = $request["tanggal"];
        $pengumuman -> id_rombel = $request["id_rombel"];
        $pengumuman -> pengumuman = $request["umum"];
        $pengumuman -> save();

      
        return "Alhamdulilah pengumuman berhasil diperbaharui";
        
        
    }
}
