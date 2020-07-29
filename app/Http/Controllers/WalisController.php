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
use App\Jurnal;
use App\Penilaian;
use App\Providers;
use Validator,Redirect,Response;
use Illuminate\Support\Facades\Auth;

class WalisController extends Controller
{
    public function kehadiran (Request $request)
    {
        $email= Auth::user()->email;
     
        $nisn = DB::table('walis')
        ->where('email', $email)
        ->get()[0]->nisn;
        $rombel=DB::table('student_rombels')
        ->where('nis', $nisn)
        ->get();
        
        $kbm = DB::table('jurnals')
        ->leftJoin('kbms', function($join)
        {
            $join->on('kbms.tanggal', '=', 'jurnals.tanggal')
            ->on('kbms.id_subject', '=', 'jurnals.id_subject')
            ->on('kbms.id_rombel', '=', 'jurnals.id_rombel')
            ->on('kbms.id_cikgu', '=', 'jurnals.id_cikgu');
        })
        
        ->leftjoin('rombels','rombels.id_rombel','=','jurnals.id_rombel')
        ->leftjoin('mapels','mapels.id_subject','=','jurnals.id_subject')
        ->leftjoin('cikgus','cikgus.id_cikgu','=','jurnals.id_cikgu')
        ->where('jurnals.tanggal','=',$request["tanggal"])
        ->where ('jurnals.id_rombel','=', $rombel[0]->id_rombel)
        ->orderby('jurnals.jam_ke')
        
        ->get([
            'jurnals.tanggal',
            'jurnals.materi',
            'jurnals.jam_ke',
            'kbms.absen',   
            'mapels.subject_name',
            'rombels.nama_rombel',
            'cikgus.cikgu_name' 
           
        ]);


     
      

        $i=0;
        $jml_kbm = count($kbm);
        
        
       if($jml_kbm == 0){
           $rekap_absen =[];
        return view('wali.kehadiran',["kbms"=>$rekap_absen]);
       }
        while($i < $jml_kbm){
            $absensi = $kbm[$i]->absen;
        
            $absensi_siswa = json_decode($absensi);
            $j=0;
            $jml_siswa=count($absensi_siswa);
          
            while($j < $jml_siswa){
                if($nisn == $absensi_siswa[$j]->n){
                    $rekap[$i] = 
                    [
                        'id_cikgu'=>$kbm[$i]->cikgu_name,
                        'id_subject'=>$kbm[$i]->subject_name,
                        'id_rombel'=>$kbm[$i]->nama_rombel,
                        'materi'=> $kbm[$i]->materi,
                        'jam_ke'=> $kbm[$i]->jam_ke,
                        'kehadiran'=> $absensi_siswa[$j]->k,
                        'kehadiran2'=> $absensi_siswa[$j]->s,
                    ];
                break;

                }else{
                    $rekap[$i] = 
                    [
                        'id_cikgu'=>$kbm[$i]->cikgu_name,
                        'id_subject'=>$kbm[$i]->subject_name,
                        'id_rombel'=>$kbm[$i]->nama_rombel,
                        'materi'=> $kbm[$i]->materi,
                        'jam_ke'=> $kbm[$i]->jam_ke,
                        'kehadiran'=> '4',
                        'kehadiran2'=> 'Saat Absensi dibuat,  santri belum masuk rombel',
                    ];
                }
                $j++;
            }
            $i++;
        }

            $json=json_encode($rekap);
            $rekap_absen=json_decode($json);
       
        return view('wali.kehadiran',["kbms"=>$rekap_absen]);
      
    }
        public function jadwal_ujian()
        {
           
            $email= Auth::user()->email;
     
            $nisn = DB::table('walis')
            ->where('email', $email)
            ->get()[0]->nisn;
            $rombel=DB::table('student_rombels')
            ->where('nis', $nisn)
            ->get();

           
            $ta=DB::table('tas')->get();
            $rombels=DB::table('rombels')->get();
            $ujian=DB::table('penilaians')
            ->leftjoin('rombels','rombels.id_rombel','=','penilaians.id_rombel')
            ->leftjoin('mapels','mapels.id_subject','=','penilaians.id_subject')
            ->leftjoin('cikgus','cikgus.id_cikgu','=','penilaians.id_cikgu')
            ->leftjoin('jenis_ujians','jenis_ujians.id_ujian','=','penilaians.id_ujian')
            ->leftjoin('tipe_ujians','tipe_ujians.id_tipe','=','penilaians.id_tipe')
            ->where('penilaians.id_rombel',$rombel[0]->id_rombel)
            
          
            ->get();

            
            $jml_ujian=count($ujian);
           
            $nilai = [];
            $nilai_akhir = [];
            if($jml_ujian == 0){
                return view('wali.jadwal-ujian',['ujians'=>$ujian,'tas'=>$ta, 'rombels'=>$rombels, 'nilais'=>$nilai ,'nilai_akhir'=>$nilai_akhir]); 
            }
            $nilai=DB::table('penilaian_siswas')
            ->where('nis',$nisn)
            ->where('status',1)
            ->get();

            
            // return $nilai;
            $a=0;
            while($a<$jml_ujian){
            $kumpulan_nilai_akhir =  $ujian[$a]->hasil;
            $nilai_akhir_saya = json_decode($kumpulan_nilai_akhir);
            $i = 0;
            $jml= count($nilai_akhir_saya);
            while($i < $jml){
                if($nilai_akhir_saya[$i]->s == $nisn){
                    $nilai_akhir[$a] = $nilai_akhir_saya[$i]->n;
                break;
                }else{
                    $nilai_akhir[$a] = $nilai_akhir_saya[$i]->n;
                }
                
                $i++;
            }
            $a++;
        }

   
          
           return view('wali.jadwal-ujian',
           [
               'ujians'=>$ujian,
               'tas'=>$ta,
                'rombels'=>$rombel,
                'nilai_akhir'=>$nilai_akhir]);

      
        }

        public function catatan_halaqoh_online()
        {
            $email= Auth::user()->email;
     
            $nisn = DB::table('walis')
            ->where('email', $email)
            ->get()[0]->nisn;
            $rombel=DB::table('rombel_halaqohs')
            ->where('nis', $nisn)
            ->where('status',1)
            ->get();

            $cikgu = DB::table('cikgus')->get();

          
           
      
            if(count($rombel) == NULL){
                $surat = [];
                $datas=[];
                return view('wali.halaqoh-online',["surat"=>$surat, "rekamans"=>$datas]);
            }

            
            $jadwal = DB::table("laporan_halaqoh_onlines")
            ->where('laporan_halaqoh_onlines.id_kelompok', $rombel[0]->id_kelompok)
            ->orderBy('tanggal','desc')
            ->get();
           
          
            if(count($jadwal) == NULL){
                $surat = [];
                $datas=[];
                return view('wali.halaqoh-online',["surat"=>$surat, "rekamans"=>$datas]);
            }

            $rekaman = DB::table("rekaman_halaqoh_onlines")
            ->where('nis', $nisn)
            ->get();

            $surat=DB::table("surat_alqurans")
            ->get();

             
            $jml_rekaman=count($rekaman);
            $jml_jadwal=count($jadwal);
            

            $i=0;
            while($i < $jml_jadwal){
                $j=0;
                if($jml_rekaman == 0){
                    $data[$i]=[
                        'tanggal'=>$jadwal[$i]->tanggal,
                        'id_pembimbing'=>$jadwal[$i]->id_cikgu,
                        'rekaman'=>NULL ,
                        'surat_mulai'=>0,
                        'surat_akhir'=>0,
                        'ayat_mulai'=>0,
                        'ayat_akhir'=>0,    
                        'check'=>"0",
                        'komentar'=>""
                        ];
                }
                while($j < $jml_rekaman){
                    if($jadwal[$i]->id == $rekaman[$j]->id_halaqoh){

                        $data[$i]=[
                        'tanggal'=>$jadwal[$i]->tanggal,
                        'id_pembimbing'=>$jadwal[$i]->id_cikgu,
                        'rekaman'=>$rekaman[$j]->rekaman,
                        'surat_mulai'=>$rekaman[$j]->surat_mulai,
                        'surat_akhir'=>$rekaman[$j]->surat_akhir,
                        'ayat_mulai'=>$rekaman[$j]->ayat_mulai,
                        'ayat_akhir'=>$rekaman[$j]->ayat_akhir,    
                        'check'=>$rekaman[$j]->check,
                        'komentar'=>$rekaman[$j]->komentar
                        ];
                    break;
                    }else{
                        $data[$i]=[
                            'tanggal'=>$jadwal[$i]->tanggal,
                            'id_pembimbing'=>$jadwal[$i]->id_cikgu,
                            'rekaman'=>NULL ,
                            'surat_mulai'=>0,
                            'surat_akhir'=>0,
                            'ayat_mulai'=>0,
                            'ayat_akhir'=>0,    
                            'check'=>"0",
                            'komentar'=>""
                            ];
                    }
                    $j++;
                }
                $i++;
            }

            $json=json_encode($data);
            $datas=json_decode($json);
            return view('wali.halaqoh-online',["surat"=>$surat, "rekamans"=>$datas, 'cikgus'=>$cikgu]);
        }
       
public function mapel_aktif()
{
    $email= Auth::user()->email;
     
    $nisn = DB::table('walis')
    ->where('email', $email)
    ->get()[0]->nisn;
    $rombel=DB::table('student_rombels')
    ->where('nis', $nisn)
    ->get();

   $mapel = DB:: table('jadwals')
   ->leftjoin('cikgus','cikgus.id_cikgu','=','jadwals.id_cikgu')
   ->leftjoin('rombels','rombels.id_rombel','=','jadwals.id_rombel')
   ->leftjoin('mapels','mapels.id_subject','=','jadwals.id_subject')
   ->leftjoin('tas','tas.id_ta','=','jadwals.id_ta')
   ->where('jadwals.id_rombel',$rombel[0]->id_rombel)
   ->where('jadwals.status', 1)
   ->groupby('jadwals.id_subject')
   ->get();


   return view('wali.mapel-aktif',['mapels'=>$mapel]);
   return dump($mapel);
}

  public function identitas()
  {
    $email= Auth::user()->email;
     
    $nisn = DB::table('walis')
    ->where('email', $email)
    ->get()[0]->nisn;
    $rombel=DB::table('student_rombels')
    ->leftjoin('rombels','rombels.id_rombel','=','student_rombels.id_rombel')
    ->where('nis', $nisn)
    ->get();
    $siswa = DB::table('students')
    ->where('nis', $nisn)
    ->first();
    

    
   
    return view('wali.identitas',
    [
        'siswa'=>$siswa,
        'rombels'=>$rombel,
    ]);


    
  }      


  public function jadwal()
  {
    $email= Auth::user()->email;
     
    $nisn = DB::table('walis')
    ->where('email', $email)
    ->get()[0]->nisn;
    $rombel=DB::table('student_rombels')
    ->where('nis', $nisn)
    ->get();

   $jadwal = DB:: table('jadwals')
   ->leftjoin('cikgus','cikgus.id_cikgu','=','jadwals.id_cikgu')
   ->leftjoin('rombels','rombels.id_rombel','=','jadwals.id_rombel')
   ->leftjoin('mapels','mapels.id_subject','=','jadwals.id_subject')
   ->leftjoin('tas','tas.id_ta','=','jadwals.id_ta')
   ->where('jadwals.id_rombel',$rombel[0]->id_rombel)
   ->where('jadwals.status', 1)
 
   ->get();
   $senin = DB:: table('jadwals')
   ->leftjoin('cikgus','cikgus.id_cikgu','=','jadwals.id_cikgu')
   ->leftjoin('rombels','rombels.id_rombel','=','jadwals.id_rombel')
   ->leftjoin('mapels','mapels.id_subject','=','jadwals.id_subject')
   ->leftjoin('tas','tas.id_ta','=','jadwals.id_ta')
   ->where('jadwals.id_rombel',$rombel[0]->id_rombel)
   ->where('jadwals.status', 1)
   ->where('days','Monday')
 
   ->get();
   $senin = DB:: table('jadwals')
   ->leftjoin('cikgus','cikgus.id_cikgu','=','jadwals.id_cikgu')
   ->leftjoin('rombels','rombels.id_rombel','=','jadwals.id_rombel')
   ->leftjoin('mapels','mapels.id_subject','=','jadwals.id_subject')
   ->leftjoin('tas','tas.id_ta','=','jadwals.id_ta')
   ->where('jadwals.id_rombel',$rombel[0]->id_rombel)
   ->where('jadwals.status', 1)
   ->where('days','Monday')
   ->orderby('waktu','asc')
   ->get();

   $selasa = DB:: table('jadwals')
   ->leftjoin('cikgus','cikgus.id_cikgu','=','jadwals.id_cikgu')
   ->leftjoin('rombels','rombels.id_rombel','=','jadwals.id_rombel')
   ->leftjoin('mapels','mapels.id_subject','=','jadwals.id_subject')
   ->leftjoin('tas','tas.id_ta','=','jadwals.id_ta')
   ->where('jadwals.id_rombel',$rombel[0]->id_rombel)
   ->where('jadwals.status', 1)
   ->where('days','Tuesday')
   ->orderby('waktu','asc')
   ->get();
   $rabu = DB:: table('jadwals')
   ->leftjoin('cikgus','cikgus.id_cikgu','=','jadwals.id_cikgu')
   ->leftjoin('rombels','rombels.id_rombel','=','jadwals.id_rombel')
   ->leftjoin('mapels','mapels.id_subject','=','jadwals.id_subject')
   ->leftjoin('tas','tas.id_ta','=','jadwals.id_ta')
   ->where('jadwals.id_rombel',$rombel[0]->id_rombel)
   ->where('jadwals.status', 1)
   ->where('days','Wednesday')
   ->orderby('waktu','asc')
   ->get();
   $kamis = DB:: table('jadwals')
   ->leftjoin('cikgus','cikgus.id_cikgu','=','jadwals.id_cikgu')
   ->leftjoin('rombels','rombels.id_rombel','=','jadwals.id_rombel')
   ->leftjoin('mapels','mapels.id_subject','=','jadwals.id_subject')
   ->leftjoin('tas','tas.id_ta','=','jadwals.id_ta')
   ->where('jadwals.id_rombel',$rombel[0]->id_rombel)
   ->where('jadwals.status', 1)
   ->where('days','Thursday')
   ->orderby('waktu','asc')
   ->get();
   $jumat = DB:: table('jadwals')
   ->leftjoin('cikgus','cikgus.id_cikgu','=','jadwals.id_cikgu')
   ->leftjoin('rombels','rombels.id_rombel','=','jadwals.id_rombel')
   ->leftjoin('mapels','mapels.id_subject','=','jadwals.id_subject')
   ->leftjoin('tas','tas.id_ta','=','jadwals.id_ta')
   ->where('jadwals.id_rombel',$rombel[0]->id_rombel)
   ->where('jadwals.status', 1)
   ->where('days','Friday')
    ->orderby('waktu','asc')
   ->get();
   $sabtu = DB:: table('jadwals')
   ->leftjoin('cikgus','cikgus.id_cikgu','=','jadwals.id_cikgu')
   ->leftjoin('rombels','rombels.id_rombel','=','jadwals.id_rombel')
   ->leftjoin('mapels','mapels.id_subject','=','jadwals.id_subject')
   ->leftjoin('tas','tas.id_ta','=','jadwals.id_ta')
   ->where('jadwals.id_rombel',$rombel[0]->id_rombel)
   ->where('jadwals.status', 1)
   ->where('days','Saturday')
   ->orderby('waktu','asc')
   ->get();

  




//    return dump($jadwal);


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

  public function profil()
  {
    $username= Auth::user()->username;
    $nisn=Student::where('username',"$username")->first()->nis;
     
 
    $rombel=DB::table('student_rombels')
    ->leftjoin('rombels','rombels.id_rombel','=','student_rombels.id_rombel')
    ->where('nis', $nisn)
    ->get();
    $siswa = DB::table('students')
    ->where('nis', $nisn)
    ->first();
    

    
   
    return view('wali.identitas',
    [
        'siswa'=>$siswa,
        'rombels'=>$rombel,
    ]);


    
  }  
      
}
