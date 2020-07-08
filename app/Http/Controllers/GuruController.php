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

class GuruController extends Controller
{

   public function requestjadwal(request $hari)
   {
        $days =$hari->hari;
        $username= Auth::user()->username;
        $id_cikgu=Cikgu::where('username',"$username")->first();
        $jadwal = DB::table('jadwals')
        -> leftjoin ('mapels','mapels.id_subject','=','jadwals.id_subject')
        -> leftjoin('rombels','rombels.id_rombel','=','jadwals.id_rombel')
        -> leftjoin('tas','tas.id_ta','=','jadwals.id_ta')
        ->where('days',$days )
       
        ->where('id_cikgu',$id_cikgu->id_cikgu)->get();
  
        

            return view('guru.jadwal',['jadwals'=>$jadwal]);
            
   }

   public function edit_absen(request $request)
   {

        $username= Auth::user()->username;
        $id_cikgu=Cikgu::where('username',"$username")->first();
        $kbm = DB::table('kbms')
        -> leftjoin ('mapels','mapels.id_subject','=','kbms.id_subject')
        -> leftjoin('rombels','rombels.id_rombel','=','kbms.id_rombel')
        -> leftjoin('tas','tas.id_ta','=','kbms.id_ta')
        ->where('kbms.id_rombel',$request["id_rombel"] )
        ->where('kbms.id_subject',$request["id_subject"] )
        ->where('kbms.tanggal',$request["tanggal"] )
        ->where('kbms.id_cikgu',$id_cikgu->id_cikgu)
        ->get();
      
        $absen = $kbm[0]->absen;
        $absens = json_decode($absen); 
      
        
        $absensi=[];      
        $namasiswa = DB::table('student_rombels') 
        -> leftjoin ('students','students.nis','=','student_rombels.nis')
        ->where('id_rombel', $kbm[0]->id_rombel) 
        ->get();

        $i=0;
       
        $jml = count ($absens);
        $jml_siswa= count($namasiswa);
        while($i<$jml){
            $j=0;
            while($j<$jml_siswa){
            if($namasiswa[$i]->nis == $absens[$j]->n){
                $absensi[$i]=[
                    'i'=>$namasiswa[$i]->nama,
                    'n'=>$absens[$j]->n,
                    's'=>$absens[$j]->s,
                    'k'=>$absens[$j]->k,
                  ];
            }
            $j++;
        }
        $i++;
        }

        $json=json_encode($absensi);
        $json2=json_decode($json);

        $jurnal = DB::table('jurnals')
        -> leftjoin ('mapels','mapels.id_subject','=','jurnals.id_subject')
        -> leftjoin('rombels','rombels.id_rombel','=','jurnals.id_rombel')
        -> leftjoin('tas','tas.id_ta','=','jurnals.id_ta')
        ->where('jurnals.id_rombel',$request["id_rombel"] )
        ->where('jurnals.id_subject',$request["id_subject"] )
        ->where('jurnals.tanggal',$request["tanggal"] )
        ->where('jurnals.id_cikgu',$id_cikgu->id_cikgu)
        ->get();


        $jml_jurnal=$jurnal[0]->total_jam;
        
       
        return view('guru.edit-absen',['absensi'=>$json2,'kbms'=>$kbm, 'jurnal'=>$jurnal, 'jml_jurnal'=>$jml_jurnal]);

 


      

        // return view('guru.edit-absen',['absensi'=>$absensi,'nama'=>$namasiswa]);
   }
   public function absensi($id)
   {
     
    $username= Auth::user()->username;
    $id_cikgu=Cikgu::where('username',"$username")->first();
    $jadwal = DB::table('jadwals')
    -> leftjoin ('mapels','mapels.id_subject','=','jadwals.id_subject')
    -> leftjoin('rombels','rombels.id_rombel','=','jadwals.id_rombel')
    -> leftjoin('tas','tas.id_ta','=','jadwals.id_ta')
    ->where('no',$id )
    ->where('id_cikgu',$id_cikgu->id_cikgu)
    ->first();
        
        
      $absensi = DB::table('student_rombels')
      -> leftjoin ('students','students.nis','=','student_rombels.nis')
      ->where('id_rombel',$jadwal->id_rombel)
      ->orderby('nama','asc')
      ->get();

      return view('guru.absen',['absensi'=>$absensi,'jadwal'=>$jadwal]);
    // return dump($data);  
   }

   public function store(Request $request)
   {  
        $kbm= new Kbm();
        $username= Auth::user()->username;
        $id_cikgu=Cikgu::where('username',"$username")->first();
        $id = $request["no"];
        $jadwal = DB::table('jadwals')
        ->where('no',$id )
        ->where('id_cikgu',$id_cikgu->id_cikgu)
        ->first();
        $kbm-> id_cikgu= $id_cikgu->id_cikgu;
        $kbm-> id_rombel=$jadwal->id_rombel;
        $kbm-> id_subject=$jadwal->id_subject;
        $kbm-> id_ta=$jadwal->id_ta;
        $kbm-> semester=$jadwal->semester;
        $kbm-> tanggal = $request["tanggal"];
        $nis = $request["nis"];
        $ket = $request["ket"];
        $nis = $request["nis"];
        $materi = $request["materi"];
        $jam = $request["jam"];
        $ket = $request["ket"];
        $status = $request["status"];
        $jml=count($nis);
        $i=0;
        while($i<$jml){
        $data[$i]=[
            'n'=>$nis[$i],
            's'=>$ket[$i],
            'k'=>$status[$i],
          ];
        $i++;
        }

       
      
        
        $soal=json_encode($data);

        $kbm-> absen=$soal;
     
        
        $cek_kbm = Kbm::where('id_cikgu',$id_cikgu->id_cikgu)
            ->where('id_subject',$jadwal->id_subject)
            ->where('id_rombel',$jadwal->id_rombel)
            ->where('tanggal',$request["tanggal"])->first();

        if($cek_kbm != NULL){
            return "Mohon maaf ustadz sudah melakukan absensi di kelas ini. Jazakumullahu Khairan";
        } else{
            $kbm->save();
            return "Alhamduliah Absensi Hari telah tersimpan. Jazakumullahu Khairan";
        }
       
  
      
   }
   public function edit(Request $request)
   {  
        $username= Auth::user()->username;
        $id_cikgu=Cikgu::where('username',"$username")->first();
        $id = $request["id"];
   
        $kbm= new Kbm();
        $kbm = Kbm::where('id',$request["id"])->where('id_cikgu',$id_cikgu->id_cikgu)->first();
        $ket = $request["ket"];
        $nis = $request["nis"];
        $status = $request["status"];
        $jml=count($nis);
        $i=0;
       
        while($i<$jml){
        $data[$i]=[
            'n'=>$nis[$i],
            's'=>$ket[$i],
            'k'=>$status[$i],
          ];
        $i++;
        }
        $soal=json_encode($data);
      
        $kbm-> absen=$soal;
        $kbm->save();
            return "Alhamduliah Absensi berhasil diperbaharui.
            Jazakumullahu Khairan";
  
   }
   public function store_jurnal(Request $request)
   {  
     
    
        $jurnal= new Jurnal();
        $username= Auth::user()->username;
        $id_cikgu=Cikgu::where('username',"$username")->first();
        $id = $request["no"];
        $jadwal = DB::table('jadwals')
        ->where('no',$id )
        ->where('id_cikgu',$id_cikgu->id_cikgu)
        ->first();
       
       
        $jurnal-> id_cikgu= $id_cikgu->id_cikgu;
        $jurnal-> id_rombel=$jadwal->id_rombel;
        $jurnal-> id_subject=$jadwal->id_subject;
        $jurnal-> id_ta=$jadwal->id_ta;
        $jurnal-> semester=$jadwal->semester;
        $jurnal-> tanggal = $request["tanggal"];
        $jurnal-> total_jam = $request["total"];
        $jurnal-> materi = $request["materi"];
        $jurnal-> jam_ke = $request["jam"];
        $cek_jurnal = Jurnal::where('id_cikgu',$id_cikgu->id_cikgu)
        ->where('id_subject',$jadwal->id_subject)
        ->where('id_rombel',$jadwal->id_rombel)
        ->where('jam_ke',$request["jam"])
        ->where('tanggal',$request["tanggal"])->first();

     
        if($cek_jurnal != NULL){
            return "Mohon maaf ustadz sudah menyimpan materi jam ke-Jazakumullahu Khairan";
        } else{
            $jurnal->save();
            return "Alhamduliah Materi jam ke-telah tersimpan. Jazakumullahu Khairan";
        }

      
        

        return "Materi berhasil tersimpan";
     

  
        
        // $kbm-> absen=$soal;
        
        // $cek_kbm = Kbm::where('id_cikgu',$id_cikgu->id_cikgu)
        //     ->where('id_subject',$jadwal->id_subject)
        //     ->where('id_rombel',$jadwal->id_rombel)
        //     ->where('tanggal',$request["tanggal"])->first();

        // if($cek_kbm != NULL){
        //     return "Mohon maaf ustadz sudah melakukan absensi di kelas ini. Jazakumullahu Khairan";
        // } else{
        //     $kbm->save();
        //     return "Alhamduliah Absensi Hari telah tersimpan. Jazakumullahu Khairan";
        // }
       
  
      
   }

   public function edit_jurnal(Request $request)
   {  
     

     

        $username= Auth::user()->username;
        $id_cikgu=Cikgu::where('username',"$username")->first();
        
        $jurnal = new Jurnal();
        $jurnal = Jurnal::where('no',$request["id"])->where('id_cikgu',$id_cikgu->id_cikgu)->first();
     
         $materi = $request["materi"];
      
        $jurnal-> materi = $materi; 
        $jurnal-> save(); 
     
     
       

        return $materi;
     

  
        
        
       
  
      
   }

   public function tambahmateri()
   {
       $mapel = Mapel::all();
       $bab = Bab::all();
       $rombel=Rombel::all();
       $materi=[
           'urut'=>"",
           'id_subject'=>"0",
           'id_cikgu' =>"",
           'id_rombel' =>"",
           'id_angkatan'=>"",
           'id_bab'=>"",
           'submateri'=>"",
           'youtube'=>"",
           'isi_materi'=>"",
           'waktu'=>""
       ];
       $materis=json_encode($materi);
       $mater=json_decode($materis);
       return view('guru.materi',['mapels'=>$mapel,'babs'=>$bab,'rombels'=>$rombel,'materi'=>$mater]);

   }

   public function savemateri(Request $request)
   
    {
        $validateData = $request->validate([
            'submateri'=> 'required',
            'id_bab'=> 'required',
            'id_subject'=> 'required',
        ]);
        $materi= new Materi();
        $username= Auth::user()->username;
        $id_cikgu=Cikgu::where('username',"$username")->first();
        $materi-> id_cikgu= $id_cikgu->id_cikgu;
        $materi-> id_rombel=$request["id_rombel"];
        $materi-> id_subject=$validateData["id_subject"];
        $materi-> id_bab=$validateData["id_bab"];
        $materi-> urut=$request["index"];
        $materi-> isi_materi=$request["isi_materi"];
        $materi-> submateri=$validateData["submateri"];
        $materi-> youtube=$request["youtube"];
        $materi-> id_angkatan=$request["angkatan"];
        $materi->save();


        return "alhamdulilah materi di tambahkan";



    }

    public function updatemateri(Request $request)
   
    {
        $validateData = $request->validate([
            'submateri'=> 'required',
            'id_bab'=> 'required',
            'id_subject'=> 'required',
        ]);
        $materi= new Materi();
        $id=$request["id"];
        $materi = Materi::find($id);
        $username= Auth::user()->username;
        $id_cikgu=Cikgu::where('username',"$username")->first();
        $materi-> id_cikgu= $id_cikgu->id_cikgu;
        $materi-> id_rombel=$request["id_rombel"];
        $materi-> id_subject=$validateData["id_subject"];
        $materi-> id_bab=$validateData["id_bab"];
        $materi-> urut=$request["index"];
        $materi-> isi_materi=$request["isi_materi"];
        $materi-> submateri=$validateData["submateri"];
        $materi-> youtube=$request["youtube"];
        $materi-> id_angkatan=$request["angkatan"];
        $materi->save();


        return "Alhamdulilah Materi berhasil di perbaharui";

    

    }
    public function hapusmateri($id)
    {
        $username= Auth::user()->username;
        $id_cikgu=Cikgu::where('username',"$username")->first();
        $ujian = new Materi();
        $ujian = Materi::find($id);
        $ujian -> delete($id_cikgu->id_cikgu);
        return "Alhamdulilah";
    }
 
    
    public function tampilkanmateri()
    {
        $username= Auth::user()->username;
        $id_cikgu=Cikgu::where('username',"$username")->first();
        $materi = DB::table('materis')
        -> leftjoin ('mapels','mapels.id_subject','=','materis.id_subject')
        -> leftjoin ('babs','babs.id_bab','=','materis.id_bab')
        -> where('materis.id_cikgu',$id_cikgu->id_cikgu)->get();
        return view('guru.listmateri',['materis'=>$materi]);

    }
    public function tampilkanbab()
    {
        $username= Auth::user()->username;
        $id_cikgu=Cikgu::where('username',"$username")->first();
        $bab = DB::table('babs')
        -> leftjoin ('mapels','mapels.id_subject','=','babs.id_subject')
        -> where('babs.id_cikgu',$id_cikgu->id_cikgu)
        ->get();
        return view('guru.list-bab',['babs'=>$bab]);

    }
    public function editmateri($id)
    {
        $username= Auth::user()->username;
        $id_cikgu=Cikgu::where('username',"$username")->first();
        $materi = DB::table('materis')
        ->leftjoin('rombels','rombels.id_rombel','=','materis.id_rombel')
        ->leftjoin('mapels','mapels.id_subject','=','materis.id_subject')
        ->leftjoin('babs','babs.id_bab','=','materis.id_bab')
        ->where('materis.id_cikgu',$id_cikgu->id_cikgu)
        ->where('materis.id',$id)
        ->get();
        $mapel = Mapel::all();
        $bab = Bab::all();
        $rombel=Rombel::all();
        return view('guru.materi',['mapels'=>$mapel,'babs'=>$bab,'rombels'=>$rombel,'materi'=>$materi[0]]);

    }

    public function tambahujian(Request $request)
    {

        $ujian = new Penilaian();
        $username= Auth::user()->username;
        $id_cikgu=Cikgu::where('username',"$username")->first();
        $ujian-> id_cikgu= $id_cikgu->id_cikgu;
        $ujian-> tanggal_mulai= $request["tanggal_mulai"];
        $ujian-> tanggal_selesai= $request["tanggal_selesai"];
        $ujian-> waktu_mulai= $request["waktu_mulai"];
        $ujian-> waktu_selesai= $request["waktu_selesai"];
        $ujian-> durasi= $request["durasi"];
        $ujian-> id_subject= $request["id_subject"];
        $ujian-> id_rombel= $request["id_rombel"];
        $ujian-> id_subject= $request["id_subject"];
        $ujian-> id_ujian= $request["id_ujian"];
        $ujian-> id_tipe= $request["id_tipe"];
        $ujian-> materi= $request["materi"];
        $ujian-> disable_waktu  = $request["status"];
        $ujian-> remidial=$request["remidial"];
        $ujian-> kkm=$request["kkm"];
        $ujian-> tampil_nilai=$request["tampilkan_nilai"];
        $ujian-> id_ta=$request["id_ta"];
        $ujian-> semester=$request["semester"];
       
        $soal[0] = [
            't'=>'pg',
            's'=>"xr",
            
        ];
        $soals=json_encode($soal);
        $ujian->soal1=$soals;
        $ujian->soal2=$soals;
        $ujian->soal3=$soals;
        $siswa=DB::table('student_rombels')
        ->where('id_rombel',$request["id_rombel"])->get();
        $jml=count($siswa);
        $i=0;
        while($i<$jml){
            $datas[$i]=[
                's'=>$siswa[$i]->nis,
                'a'=>"1",
            ];
            $data[$i]=[
                's'=>$siswa[$i]->nis,
                'n'=>""];
            $i++;
        };
        $hasil=json_encode($data);
        $akses=json_encode($datas);
        $ujian->hasil=$hasil;
        $ujian->akses=$akses; 
        $ujian->save();

        return "Alhamdulilah Penilaian berhasil ditambahkan";


        
    }
    public function editujian($id){
        $username= Auth::user()->username;
        $id_cikgu=Cikgu::where('username',"$username")->first();
        $ujians = DB::table('penilaians')
        ->leftjoin('rombels','rombels.id_rombel','=','penilaians.id_rombel')
        ->leftjoin('mapels','mapels.id_subject','=','penilaians.id_subject')
        ->leftjoin('tipe_ujians','tipe_ujians.id_tipe','=','penilaians.id_tipe')
        ->leftjoin('jenis_ujians','jenis_ujians.id_ujian','=','penilaians.id_ujian')
        ->where('id',$id)
        ->where('id_cikgu',$id_cikgu->id_cikgu)
        ->get()[0];
        $rombel = DB::table('rombels')->get();
        $babs = DB::table('babs')->get();
        $subject = DB::table('mapels')->get();
        $ujian = DB::table('jenis_ujians')->get();
        $tipe = DB::table('tipe_ujians')->get();

        return view('guru.edit-ujian',['ujiandata'=>$ujians,'babs'=>$babs, 'rombels'=>$rombel,'subjects'=>$subject,
        'tipes'=>$tipe, 'ujians'=>$ujian]);
    }

    public function aksesujian($id){
        $username= Auth::user()->username;
        $id_cikgu=Cikgu::where('username',"$username")->first();
        $akses = new Penilaian();
        $akses = Penilaian::where('id',$id)
        ->where('id_cikgu', $id_cikgu->id_cikgu)->first();

        
        $akses_siswa = $akses->akses;
        $aksess = json_decode($akses_siswa);
        $jml_akses=count($aksess);
        $nama_siswa= DB::table("students")
        ->get([
            'nis',
            'nama',
            
        ]);
        $jml_siswa=count($nama_siswa);
        $i=0;
        while($i < $jml_akses){
            $j=0;
            while($j < $jml_siswa){

                if($aksess[$i]->s == $nama_siswa[$j]->nis){

                    $hak_akses[$i] = [
                        'nis' =>$nama_siswa[$j]->nis,
                        'nama'=>$nama_siswa[$j]->nama,
                        'hak_akses'=>$aksess[$i]->a
                    ];
                   
                }

                $j++;
            }
            $i++;
        }
      
      
        return view('guru.akses-ujian',['akses'=> $hak_akses,'id' => $akses]);
    }
    public function nilaiujian($id)
    {
        $username= Auth::user()->username;
        $id_cikgu=Cikgu::where('username',"$username")->first();
        $penilaian = DB::table('penilaians')
        ->leftjoin('jenis_ujians','jenis_ujians.id_ujian','=','penilaians.id_ujian')
        ->leftjoin('tipe_ujians','tipe_ujians.id_tipe','=','penilaians.id_tipe')
        ->leftjoin('rombels','rombels.id_rombel','=','penilaians.id_rombel')
        ->leftjoin('mapels','mapels.id_subject','=','penilaians.id_subject')
        ->where('id_cikgu',$id_cikgu->id_cikgu)
        ->where('id',$id)
        ->first();
      
       

        // return dump($nilai_ujian);
        $hasils = $penilaian->hasil;
        $hasil = json_decode($hasils);
        $jml=count($hasil);
        $i=0;
        while($i<$jml)
        {
            $siswa[$i] =DB::table('students')
            ->where('nis',$hasil[$i]->s)->get();
            $i++;   
        }
        
    
        if($hasil == NULL){
            return "ok";
        }
        $nilai=DB::table('penilaian_siswas')
        ->where('id_penilaian',$id)
        ->get();
        // return $nilai[3]->nis;
        return view('guru.nilai',['hasils'=>$hasil,'penilaians'=>$penilaian,'siswas'=>$siswa,'nilai'=>$nilai]);

    }
    public function hapusujian($id)
    {
        $ujian = new Penilaian();
        $ujian = Penilaian::find($id);
        $ujian -> delete($id);
       return "success";
    }
    public function soalujian($id)
    {
        $username= Auth::user()->username;
        $id_cikgu=Cikgu::where('username',"$username")->first();
        $penilaian = DB::table('penilaians')
        ->where('id_cikgu',$id_cikgu->id_cikgu)
        ->where('id',$id)
        ->first();
        $babs = DB::table('babs')
        ->where('id_subject',$penilaian->id_subject)
        ->get();
        $soal1 = $penilaian->soal1;
        $soal2 = $penilaian->soal2;
        $soal3 = $penilaian->soal3;
        $soals1=json_decode($soal1);
        $soals2=json_decode($soal2);
        $soals3=json_decode($soal3);
        
        
        
        // return $babs;
        
        return view('guru.soal-ujian',['babs'=>$babs,'penilaian'=>$penilaian,
        'soals1'=>$soals1,'soals2'=>$soals2,'soals3'=>$soals3]);
    }

    public function soalujianpraktek($id)
    {
        $username= Auth::user()->username;
        $id_cikgu=Cikgu::where('username',"$username")->first();
        $penilaian = DB::table('penilaians')
        ->where('id_cikgu',$id_cikgu->id_cikgu)
        ->where('id',$id)
        ->first();
        $babs = DB::table('babs')
        ->where('id_subject',$penilaian->id_subject)
        ->get();
        $soal = $penilaian->soal_praktek;
        
        $soals=json_decode($soal);

       
        
        
        
        // return $babs;
        
        return view('guru.soal-ujian-praktek',['babs'=>$babs,'penilaian'=>$penilaian, 'soals'=>$soals
        ]);
    }
    public function carisoal(Request $request)
    {
       
        $username= Auth::user()->username;
        $id_cikgu=Cikgu::where('username',"$username")->first();
        $key = $request["cari-soal"];

      
        $banksoal =DB::table('banksoals')
        ->where('id_bab',$key)
        ->where('id_cikgu',$id_cikgu->id_cikgu)
        ->where('id_tipe', 2)
        ->get();

        $jml=count($banksoal);
        $i=0;
        while($i < $jml)
        {
           $data[$i]=[
                $materi[$i]=$banksoal[$i]->materi,
                $soal1=json_decode($banksoal[$i]->soal1),
                $soal2=json_decode($banksoal[$i]->soal2),
                $soal3=json_decode($banksoal[$i]->soal3)
                
           ];
           $i++;
        }
        // $json1=json_encode($data);
        // $json=json_decode($json1);
        //return $key;
        
        return view('guru.pilih-bank-soal',['datas'=>$data, 'key'=>$key]);   
        }

        public function carisoalpraktek(Request $request)
    {
        $username= Auth::user()->username;
        $id_cikgu=Cikgu::where('username',"$username")->first();
        $key = $request["cari-soal"];
        $banksoal =DB::table('banksoals')
        ->where('id_bab',$key)
        ->where('id_cikgu',$id_cikgu->id_cikgu)
        ->where('id_tipe', 1)
        ->get();

        
        $soals = $banksoal[0]->soal_praktek;
        $soal = json_decode($soals);
       
        // $json1=json_encode($data);
        // $json=json_decode($json1);
        //return $key;
        
        return view('guru.pilih-bank-soal-praktek',['soals'=>$soal, 'key'=>$key]);   
        }
        public function aksessoalujian(Request $request)
        {
                $username= Auth::user()->username;
                $id_cikgu=Cikgu::where('username',"$username")->first();
                $jml=count($request["nis"]);

              
                $id=$request["id"];

           
                $i=0;
                while($i<$jml){
                    $data[$i]=[
                        's'=>$request->nis[$i],
                        'a'=>$request->izin[$i]];
                    $i++;
                };
                $hasil=json_encode($data);
                $ujian = new Penilaian();
                $ujian = Penilaian::find($id);
                $ujian->akses=$hasil;
                $ujian->save();
                return "Alhamdulilah Hak Akses berhasil diperharui";
        }

        

    
    public function simpannilai(request $request)
    {
        $username= Auth::user()->username;
        $id_cikgu=Cikgu::where('username',"$username")->first();
        $jml=count($request["nis"]);
        $id=$request["id"];
        $i=0;
        while($i<$jml){
            $data[$i]=[
                's'=>$request->nis[$i],
                'n'=>$request->nilai[$i]];
            $i++;
        };
        $hasil=json_encode($data);
        $ujian = new Penilaian();
        $ujian = Penilaian::find($id);
        $ujian->hasil=$hasil;
        $ujian->save();

        return "Alhamdilah nilai berhasil tersimpan";
        
    }
    public function tampilkanujian()
    {
        $username= Auth::user()->username;
        $id_cikgu=Cikgu::where('username',"$username")->first();
        $rombel = DB::table('rombels')->get();
        $subject = DB::table('mapels')->get();
        $ujian = DB::table('jenis_ujians')->get();
        $tipe = DB::table('tipe_ujians')->get();
        $ujian=DB::table('penilaians')
        ->leftjoin('rombels','rombels.id_rombel','=','penilaians.id_rombel')
        ->leftjoin('mapels','mapels.id_subject','=','penilaians.id_subject')
        ->leftjoin('jenis_ujians','jenis_ujians.id_ujian','=','penilaians.id_ujian')
        ->leftjoin('tipe_ujians','tipe_ujians.id_tipe','=','penilaians.id_tipe')
        ->leftjoin('tas','tas.id_ta','=','penilaians.id_ta')
        ->where('id_cikgu',$id_cikgu->id_cikgu)
        ->orderby('id', 'desc')
        ->get();
        return view('guru.listujian',['ujians'=>$ujian,'rombels'=>$rombel,'subjects'=>$subject,
        'tipes'=>$tipe, 'ujians'=>$ujian]);
        
    }

    public function simpansoalujian(Request $request)
    {
        $username= Auth::user()->username;
        $id_cikgu=Cikgu::where('username',"$username")->first();
        $id=$request["id"];
        $soal= new Penilaian(); 
        $soal = Penilaian::find($id);
        $i=0;
        $j=0;
        $k=0;
        $l=0;
        //pertama
        if($request["soal"]!==NULL){
            $jml=count($request["soal"]);
        while($i<$jml){
            $data[$i]=[
                't'=>'pg',
                'ns'=>$request->nama_soal[$i],
                'n'=>$request->nomor_soal[$i],
                's'=>$request->soal[$i],
                'v'=>$request->skor[$i],
                'a'=>$request->pg1[$i],
                'k1'=>"1",
                'b'=>$request->pg2[$i],
                'k2'=>"2",
                'c'=>$request->pg3[$i],
                'k3'=>"3",
                'd'=>$request->pg4[$i],
                'k4'=>"4",
                'e'=>$request->pg5[$i],
                'k5'=>"5",
                'k'=>$request->kuncijawaban[$i]
            ];
            $i++;
        };
        $soal1=json_encode($data);
        $soal->soal1=$soal1;
    } else{
        $data[0] = [
            
            's'=>"xr",
            
        ];
        $soal1=json_encode($data);
        $soal->soal1=$soal1;
    }
     //kedua

        if($request["soal2"]!==NULL){
        $jmlx=count($request["soal2"]);

       
        
        while($j < $jmlx){
            if($request->isi1[$j]==NULL){
                $isi1="xrty";
            }else{
                $isi1=$request->isi1[$j];
            };
            if($request->isi2[$j]==NULL){
                $isi2="xrty";
            }else{
                $isi2=$request->isi2[$j];
            };
            if($request->isi3[$j]==NULL){
                $isi3="xrty";
            }else{
                $isi3=$request->isi3[$j];
            };
            $datax[$j]=[
                't'=>'isi',
                'ns'=>$request->nama_soal2[$j],
                's'=>$request->soal2[$j],
                'n'=>$request->nomor_soal2[$j],
                'v'=>$request->skor2[$j],
                'a'=>strtolower($isi1),
                'b'=>strtolower($isi2),
                'c'=>strtolower($isi3)
                
            ];
            
            $j++;

        };
        $soal2=json_encode($datax);
        $soal->soal2=$soal2;
    }else{
        $datax[0]=[
            't'=>'isi',
            's'=>"xr",
            
        ];
        $soal2=json_encode($datax);
        $soal->soal2=$soal2;
    }
//ketiga
        if($request["soal3"]!==NULL){
            $jml3=count($request["soal3"]);
            while($k < $jml3){
                $data3[$k]=[
                    't'=>'tf',
                    'ns'=>$request->nama_soal3[$k],
                    'n'=>$request->nomor_soal3[$k],
                    's'=>$request->soal3[$k],
                    'v'=>$request->skor3[$k],
                    'k'=>$request->truefalse[$k],
                ];
            
            $k++;

        };
        $soal3=json_encode($data3);
        $soal->soal3=$soal3;
        }else{
            $data3[0]=[
                't'=>'tf',
                's'=>"xr",
            ];
        $soal3=json_encode($data3);
        $soal->soal3=$soal3;

        }
    
        $soal->save();
        return "Alhamdulilah soal ujian berhasil tersimpan";
    }
    public function simpansoalujianpraktek(Request $request)
    {
        $username= Auth::user()->username;
        $id_cikgu=Cikgu::where('username',"$username")->first();
        $id=$request["id"];
        $soal= new Penilaian(); 
        $soal = Penilaian::find($id);

        if(!isset($request['materi']))
        {
            $soal -> soal_praktek = NULL;
            $soal ->save();
            return "Alhamdulilah Ujian Tersimpan";
        }else{
    
        $materi = $request["materi"][0];
        $soals = $request["soal"][0];
      
        $data[]= 
        [
            'm' => $materi,
            's' => $soals
        ];

        $soal_praktek = json_encode($data);

      
        $soal -> soal_praktek = $soal_praktek;
        $soal ->save();

        return "Alhamdulilah Ujian Tersimpan";         

    }
        
        
    }
    public function rekapnilai()
    {
        $username= Auth::user()->username;
        $id_cikgu=Cikgu::where('username',"$username")->first();
        $rombel = DB::table('rombels')->get();
        $subject = DB::table('mapels')->get();
        $ta = DB::table('tas')->get();
        
       

        //return count($siswa);
        return view('guru.rekapnilai',['rombels'=>$rombel,'subjects'=>$subject,'tas'=>$ta]);
    }

    public function rekapnilaipraktek()
    {
        $username= Auth::user()->username;
        $id_cikgu=Cikgu::where('username',"$username")->first();
        $rombel = DB::table('rombels')->get();
        $subject = DB::table('mapels')->get();
        $ta = DB::table('tas')->get();
        
       

        //return count($siswa);
        return view('guru.rekapnilaipraktek',['rombels'=>$rombel,'subjects'=>$subject,'tas'=>$ta]);
    }



    public function rekapnilaiteori(Request $request)
    {
       
        
        $username= Auth::user()->username;
        $id_cikgu=Cikgu::where('username',"$username")->first();
        $siswa=DB::table('student_rombels')
        ->leftjoin('students','students.nis','=','student_rombels.nis')
        ->where('id_rombel',$request["id_rombel"])
        ->get();
       

        $persen=DB::table('mapel_aktifs')
        ->where('id_rombel', $request["id_rombel"])
        ->where('id_subject',$request["id_subject"])
        ->where('status',1)
        ->where('id_tipe',2)
        ->where('id_cikgu',$id_cikgu->id_cikgu)
        ->first();


     
        $ujian=DB::table('penilaians')
        ->leftjoin('rombels','rombels.id_rombel','=','penilaians.id_rombel')
        ->leftjoin('mapels','mapels.id_subject','=','penilaians.id_subject')
        ->leftjoin('jenis_ujians','jenis_ujians.id_ujian','=','penilaians.id_ujian')
        ->leftjoin('tipe_ujians','tipe_ujians.id_tipe','=','penilaians.id_tipe')
        ->leftjoin('tas','tas.id_ta','=','penilaians.id_ta')
        ->where('penilaians.id_tipe',2)
        ->where('id_cikgu',$id_cikgu->id_cikgu)
        ->where('penilaians.id_rombel',$request["id_rombel"])
        ->where('penilaians.id_subject',$request["id_subject"])
        ->where('penilaians.id_ta',$request["id_ta"])
        ->where('penilaians.semester',$request["semester"])
        ->get();
         $jml=count($ujian);
         $i=0;
         while($i < $jml)
         {
            $hasil[$i]=json_decode($ujian[$i]->hasil);
            $jenis[$i]=$ujian[$i]->id_ujian;
            $i++;
         }

         $PH=DB::table('penilaians')
         ->leftjoin('jenis_ujians','jenis_ujians.id_ujian','=','penilaians.id_ujian')
         ->where('penilaians.id_tipe',2)
         ->where('id_cikgu',$id_cikgu->id_cikgu)
         ->where('penilaians.id_rombel',$request["id_rombel"])
         ->where('penilaians.id_subject',$request["id_subject"])
         ->where('penilaians.id_ta',$request["id_ta"])
         ->where('penilaians.semester',$request["semester"])
         ->where('penilaians.id_ujian',1)
         ->get();

      
         $PTS=DB::table('penilaians')
         ->leftjoin('jenis_ujians','jenis_ujians.id_ujian','=','penilaians.id_ujian')
         ->where('penilaians.id_tipe',2)
         ->where('id_cikgu',$id_cikgu->id_cikgu)
         ->where('penilaians.id_rombel',$request["id_rombel"])
         ->where('penilaians.id_subject',$request["id_subject"])
         ->where('penilaians.id_ta',$request["id_ta"])
         ->where('penilaians.semester',$request["semester"])
         ->where('penilaians.id_ujian',2)
         ->get();
         $PAS=DB::table('penilaians')
         ->leftjoin('jenis_ujians','jenis_ujians.id_ujian','=','penilaians.id_ujian')
         ->where('penilaians.id_tipe',2)
         ->where('id_cikgu',$id_cikgu->id_cikgu)
         ->where('penilaians.id_rombel',$request["id_rombel"])
         ->where('penilaians.id_subject',$request["id_subject"])
         ->where('penilaians.id_ta',$request["id_ta"])
         ->where('penilaians.semester',$request["semester"])
         ->where('penilaians.id_ujian',3)
         ->get();
         $Kuis=DB::table('penilaians')
         ->leftjoin('jenis_ujians','jenis_ujians.id_ujian','=','penilaians.id_ujian')
         ->where('penilaians.id_tipe',2)
         ->where('id_cikgu',$id_cikgu->id_cikgu)
         ->where('penilaians.id_rombel',$request["id_rombel"])
         ->where('penilaians.id_subject',$request["id_subject"])
         ->where('penilaians.id_ta',$request["id_ta"])
         ->where('penilaians.semester',$request["semester"])
         ->where('penilaians.id_ujian',4)
         ->get();
         $Tugas=DB::table('penilaians')
         ->leftjoin('jenis_ujians','jenis_ujians.id_ujian','=','penilaians.id_ujian')
         ->where('penilaians.id_tipe',2)
         ->where('id_cikgu',$id_cikgu->id_cikgu)
         ->where('penilaians.id_rombel',$request["id_rombel"])
         ->where('penilaians.id_subject',$request["id_subject"])
         ->where('penilaians.id_ta',$request["id_ta"])
         ->where('penilaians.semester',$request["semester"])
         ->where('penilaians.id_ujian',5)
         ->get();
         
     
         

    
        return view('guru.rekap-nilai-teori',
        [
            'ujians'=>$ujian,'hasils'=>$hasil,'siswas'=>$siswa,'persen'=>$persen,
            'PH'=>$PH,
            'PTS'=>$PTS,
            'PAS'=>$PAS,
            'Kuis'=>$Kuis,
            'Tugas'=>$Tugas,
            'jenis'=>$jenis,
        ]);
    }

    public function rekapnilaipraktek2(Request $request)
    {
        $username= Auth::user()->username;
        $id_cikgu=Cikgu::where('username',"$username")->first();
        $siswa=DB::table('student_rombels')
        ->leftjoin('students','students.nis','=','student_rombels.nis')
        ->where('id_rombel',$request["id_rombel"])
        ->get();

    
        $ujian=DB::table('penilaians')
        ->leftjoin('rombels','rombels.id_rombel','=','penilaians.id_rombel')
        ->leftjoin('mapels','mapels.id_subject','=','penilaians.id_subject')
        ->leftjoin('jenis_ujians','jenis_ujians.id_ujian','=','penilaians.id_ujian')
        ->leftjoin('tipe_ujians','tipe_ujians.id_tipe','=','penilaians.id_tipe')
        ->leftjoin('tas','tas.id_ta','=','penilaians.id_ta')
        ->where('penilaians.id_tipe',1)
        ->where('id_cikgu',$id_cikgu->id_cikgu)
        ->where('penilaians.id_rombel',$request["id_rombel"])
        ->where('penilaians.id_subject',$request["id_subject"])
        ->where('penilaians.id_ta',$request["id_ta"])
        ->where('penilaians.semester',$request["semester"])
        ->get();
         $jml=count($ujian);
         $i=0;
         while($i < $jml)
         {
            $hasil[$i]=json_decode($ujian[$i]->hasil);
            $i++;
         }
        return view('guru.rekap-nilai-praktek',['ujians'=>$ujian,'hasils'=>$hasil,'siswas'=>$siswa]);
    }


    public function edit_ujian_ini(Request $request)
    {
        $username= Auth::user()->username;
        $id_cikgu=Cikgu::where('username',"$username")->first();
        $id=$request["id"];
        $penilaian = new Penilaian();
        $penilaian = Penilaian::where('id',$id)->where('id_cikgu',$id_cikgu->id_cikgu)->first();
        $penilaian->kkm = $request["kkm"];
        $penilaian->durasi = $request["durasi"];
        $penilaian->tanggal_mulai=$request["tanggal_mulai"]; 
        $penilaian->tanggal_selesai=$request["tanggal_selesai"];
        $penilaian->waktu_mulai=$request["waktu_mulai"];
        $penilaian->waktu_selesai=$request["waktu_selesai"];
        $penilaian->tanggal_mulai=$request["tanggal_mulai"]; 
        $penilaian->materi=$request["materi"];
        $penilaian->id_ujian=$request["id_ujian"];
        $penilaian->id_tipe=$request["id_tipe"];
        $penilaian->id_subject=$request["id_subject"];
        $penilaian->remidial=$request["remidial"];
        $penilaian->tampil_nilai=$request["tampilkan_nilai"];
        
        $penilaian->save();
        
        return "ok";
    }

    public function tambah_bab(Request $request)
    {
        $username= Auth::user()->username;
        $id_cikgu=Cikgu::where('username',"$username")->first();
        $Bab = new Bab();
        $Bab ->id_cikgu = $id_cikgu->id_cikgu;
        $Bab -> id_subject = $request["id_subject"];  
        $Bab -> nama_bab = $request["id_bab"];
     
        $Bab->save();
        return "Alhamdulilah berhasil tersimpan, Jazakumullahu Khairan";
       
    }

    public function dapatkan_bab($id)
    {
        $username= Auth::user()->username;
        $id_cikgu=Cikgu::where('username',"$username")->first();
     
        $bab = Bab::where('id_subject',$id)->get();
       
        return view('guru.bab',['babs' => $bab]);
      
    }

    
}
