<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use App\User;
use App\Jadwal;
use App\Student_rombel;
use App\Student;
use App\Rombel;
use App\Penilaian_siswa_praktek;
use App\Cikgu;
use App\Mapel;
use App\Materi;
use App\Banksoal;
use App\Bab;
use App\Jenis_ujian;
use App\Tipe_ujian;
use App\Kbm;
use Illuminate\Support\Collection;
use Illuminate\Support\Str;
use App\Penilaian_siswa;
use App\Penilaian;
use App\Providers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class PenilaianController extends Controller
{
    //Controleer siswa
    public function tugas()
    {
        $username= Auth::user()->username;
        $nis=Student::where('username',"$username")->first();
        $id_rombel=Student_rombel::where('nis',$nis->nis)->first();
        $pengumuman=DB::table('pengumumen')
        ->leftjoin('rombels','rombels.id_rombel','=','pengumumen.id_rombel')
        ->leftjoin('mapels','mapels.id_subject','=','pengumumen.id_subject')
        ->leftjoin('cikgus','cikgus.id_cikgu','=','pengumumen.id_cikgu')
        
        ->where('pengumumen.id_rombel',$id_rombel->id_rombel)
        ->orderby('pengumumen.tanggal', 'desc')
        ->get();
          

          
        return view('siswa.pengumuman',['umums'=>$pengumuman]);
    }
    public function jadwal_ujian()
    {
        $username= Auth::user()->username;
     
        $nis=Student::where('username',"$username")->first();
        $id_rombel=DB::table('student_rombels')
      
        ->leftjoin('rombels','rombels.id_rombel','=','student_rombels.id_rombel')
        ->where('nis',$nis->nis)
        ->get();
       

       
        $ta=DB::table('tas')->get();
        $rombel=DB::table('rombels')->get();
        $ujian=DB::table('penilaians')
        ->leftjoin('rombels','rombels.id_rombel','=','penilaians.id_rombel')
        ->leftjoin('mapels','mapels.id_subject','=','penilaians.id_subject')
        ->leftjoin('cikgus','cikgus.id_cikgu','=','penilaians.id_cikgu')
        ->leftjoin('jenis_ujians','jenis_ujians.id_ujian','=','penilaians.id_ujian')
        ->leftjoin('tipe_ujians','tipe_ujians.id_tipe','=','penilaians.id_tipe')
        ->where('penilaians.id_rombel',$id_rombel[0]->id_rombel)->get();

        $jml_ujian=count($ujian);
        $nilai=DB::table('penilaian_siswas')
        ->where('nis',$nis->nis)
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
            if($nilai_akhir_saya[$i]->s == $nis->nis){
                $nilai_akhir[$a] = $nilai_akhir_saya[$i]->n;
            }
            
            $i++;
        }
        $a++;
    }

    
        // return $nilai_akhir;
        // return $nilai;

       return view('siswa.jadwal-ujian',
       [
           'ujian'=>$ujian,
           'tas'=>$ta,
           'rombels'=>$rombel, 
           'nilais'=>$nilai,
           'semester'=>$id_rombel
       ]);
    }

    public function jadwal_ujian_praktek()
    {
        $username= Auth::user()->username;
        $nis=Student::where('username',"$username")->first();
        $id_rombel=DB::table('student_rombels')
      
        ->leftjoin('rombels','rombels.id_rombel','=','student_rombels.id_rombel')
        ->where('nis',$nis->nis)
        ->get();
        $ta=DB::table('tas')->get();
        $rombel=DB::table('rombels')->get();
        $ujian=DB::table('penilaians')
        ->leftjoin('rombels','rombels.id_rombel','=','penilaians.id_rombel')
        ->leftjoin('mapels','mapels.id_subject','=','penilaians.id_subject')
        ->leftjoin('cikgus','cikgus.id_cikgu','=','penilaians.id_cikgu')
        ->leftjoin('jenis_ujians','jenis_ujians.id_ujian','=','penilaians.id_ujian')
        ->leftjoin('tipe_ujians','tipe_ujians.id_tipe','=','penilaians.id_tipe')
        ->where('penilaians.id_rombel',$id_rombel[0]->id_rombel)->get();
        $jml_ujian=count($ujian);
        $nilai=DB::table('penilaian_siswas')
        ->where('nis',$nis->nis)
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
            if($nilai_akhir_saya[$i]->s == $nis->nis){
                $nilai_akhir[$a] = $nilai_akhir_saya[$i]->n;
            }
            
            $i++;
        }
        $a++;
    }

    
        // return $nilai_akhir;
        // return $nilai;

       return view('siswa.jadwal-ujian-praktek',
       [
           'tas'=>$ta,
           'ujian'=>$ujian,
           'rombels'=>$rombel, 
           'nilais'=>$nilai,
           'semester'=>$id_rombel
       ]);
    }

    public function jadwal_ujian_teori(Request $request)
    {
     
        
        $username= Auth::user()->username;
        $nis=Student::where('username',"$username")->first();
        $id_rombel=Student_rombel::where('nis',$nis->nis)->first();
        $ta=DB::table('tas')->get();
        $rombel=DB::table('rombels')->get();
        $ujian=DB::table('penilaians')
        ->leftjoin('rombels','rombels.id_rombel','=','penilaians.id_rombel')
        ->leftjoin('mapels','mapels.id_subject','=','penilaians.id_subject')
        ->leftjoin('cikgus','cikgus.id_cikgu','=','penilaians.id_cikgu')
        ->leftjoin('jenis_ujians','jenis_ujians.id_ujian','=','penilaians.id_ujian')
        ->leftjoin('tipe_ujians','tipe_ujians.id_tipe','=','penilaians.id_tipe')
        ->where('penilaians.id_rombel',$id_rombel->id_rombel)
        ->where('penilaians.id_ta',$request["id_ta"])
        ->where('penilaians.semester',$request["semester"])
        ->where('penilaians.id_tipe',2)
        ->get();
        
        $jml_ujian=count($ujian);
    
      

    //            // return $nilai;
        $a=0;
        while($a<$jml_ujian){
        $kumpulan_nilai_akhir =  $ujian[$a]->hasil;
        $nilai_akhir_saya = json_decode($kumpulan_nilai_akhir);
        $i = 0;
        $jml= count($nilai_akhir_saya);
        while($i < $jml){
            if($nilai_akhir_saya[$i]->s == $nis->nis){
                $nilai_akhir[$a] = $nilai_akhir_saya[$i]->n;
            break;
            }else{
                $nilai_akhir[$a] = '';
            }
            
            $i++;
        }
        $a++;
    }

    
       
        

       return view('siswa.jadwal-ujian-teori',
       [
           'ujians'=>$ujian,
           'tas'=>$ta, 
           'rombels'=>$rombel,
           'nilai_akhir'=>$nilai_akhir
           ]);
    }

    public function history($id)
    {
        $username= Auth::user()->username;
        $nis=Student::where('username',"$username")->first();
        $id_rombel=Student_rombel::where('nis',$nis->nis)->first();
        $nilai=DB::table('penilaian_siswas')
        ->where('nis',$nis->nis)
        ->where('status',1)
        ->where('id_penilaian', $id)
        ->get();

        return view('siswa.history',['nilais'=>$nilai]);
    }

    public function jadwal_ujian_praktek2(Request $request)
    {
     
        
        $username= Auth::user()->username;
        $nis=Student::where('username',"$username")->first();
        $id_rombel=Student_rombel::where('nis',$nis->nis)->first();
        $ta=DB::table('tas')->get();
        $rombel=DB::table('rombels')->get();
        $ujian=DB::table('penilaians')
        ->leftjoin('rombels','rombels.id_rombel','=','penilaians.id_rombel')
        ->leftjoin('mapels','mapels.id_subject','=','penilaians.id_subject')
        ->leftjoin('cikgus','cikgus.id_cikgu','=','penilaians.id_cikgu')
        ->leftjoin('jenis_ujians','jenis_ujians.id_ujian','=','penilaians.id_ujian')
        ->leftjoin('tipe_ujians','tipe_ujians.id_tipe','=','penilaians.id_tipe')
        ->where('penilaians.id_rombel',$id_rombel->id_rombel)
        ->where('penilaians.id_ta',$request["id_ta"])
        ->where('penilaians.semester',$request["semester"])
        ->where('penilaians.id_tipe',1)
        ->get();

        
        if(count($ujian) == NULL){
           
            $nilai=[];
            $nilai_akhir=[];
            return view('siswa.jadwal-ujian-praktek2',
            [
                'ujians'=>$ujian,'tas'=>$ta,
                 'rombels'=>$rombel,
                  'nilais'=>$nilai ,
                  'nilai_akhir'=>$nilai_akhir
            ]);
        }
        $jml_ujian=count($ujian);
        $nilai=DB::table('penilaian_siswas')
        ->where('nis',$nis->nis)
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
            if($nilai_akhir_saya[$i]->s == $nis->nis){
                $nilai_akhir[$a] = $nilai_akhir_saya[$i]->n;
            break;
            }else{
                $nilai_akhir[$a] = '';
            }
            
            $i++;
        }
        $a++;
    }



    
        // return $nilai_akhir;

       return view('siswa.jadwal-ujian-praktek2',
       [
           'ujians'=>$ujian,
            'tas'=>$ta, 
             'rombels'=>$rombel, 
             'nilais'=>$nilai,
             'nilai_akhir'=>$nilai_akhir
        ]);
    }


    public function masuk_ujian($id)
    {
        $username= Auth::user()->username;
        $nis=Student::where('username',"$username")->first();
        $id_rombel=Student_rombel::where('nis',$nis->nis)->first();
        $ujian=DB::table('penilaians')
        ->leftjoin('rombels','rombels.id_rombel','=','penilaians.id_rombel')
        ->leftjoin('mapels','mapels.id_subject','=','penilaians.id_subject')
        ->leftjoin('cikgus','cikgus.id_cikgu','=','penilaians.id_cikgu')
        ->leftjoin('jenis_ujians','jenis_ujians.id_ujian','=','penilaians.id_ujian')
        ->leftjoin('tipe_ujians','tipe_ujians.id_tipe','=','penilaians.id_tipe')
        ->where('id',$id)
        ->where('penilaians.id_rombel',$id_rombel->id_rombel)
        ->get();

        $ujian_aktif = DB::table('penilaian_siswas')
                        ->where('id_penilaian',$ujian[0]->id )
                        ->where('nis',$nis->nis)
                        ->orderby('status', 'desc')
                        ->get();
        $jml_ujian_aktif=count($ujian_aktif);
      
        if($jml_ujian_aktif == 0) {
            $attemp = Penilaian_siswa::where('id_penilaian',$id)
            ->where('nis',$nis->nis)->get();
            $jml_attemp = count($attemp);
            $attemp_saya=$jml_attemp + 1;
            $hash_attemp_saya = Hash::make($attemp_saya);// $attemp= $ujian[0]->remidial;
        
   

        return view('siswa.validasi-ujian',['ujians' =>$ujian, 'attemp'=>$hash_attemp_saya]);

        }else{
        $cek = $ujian_aktif[0]->status;
        $sisa_waktu=$ujian_aktif[0]->sisa_waktu;
    
        if($cek == 2 ){
            $hash_attemp_saya = Hash::make($ujian_aktif[0]->attemp); 
            return view('siswa.validasi-lanjut',['ujians' =>$ujian,'ujian_aktif'=>$ujian_aktif, 'attemp'=>$hash_attemp_saya]);
        }else{
        
        
        $attemp = Penilaian_siswa::where('id_penilaian',$id)
        ->where('nis',$nis->nis)->get();
        $jml_attemp = count($attemp);
        $attemp_saya=$jml_attemp + 1;
        $hash_attemp_saya = Hash::make($attemp_saya);// $attemp= $ujian[0]->remidial;
        
   

        return view('siswa.validasi-ujian',['ujians' =>$ujian, 'attemp'=>$hash_attemp_saya]);
        }
    }
    }

    public function masuk_ujian_praktek($id)
    {
        $username= Auth::user()->username;
        $nis=Student::where('username',"$username")->first();
        $id_rombel=Student_rombel::where('nis',$nis->nis)->first();
        $soal = DB::table('penilaians')
        ->leftjoin('cikgus','cikgus.id_cikgu','=','penilaians.id_cikgu')
        ->leftjoin('mapels','mapels.id_subject','=','penilaians.id_subject')
        ->leftjoin('rombels','rombels.id_rombel','=','penilaians.id_rombel')
        ->where('penilaians.id',$id)
        ->get();
        $soal_prakteks = $soal[0]->soal_praktek;
        $soal_praktek = json_decode($soal_prakteks);
        $akses = json_decode($soal[0]->akses);
        $jml = count($akses);

        $i=0;
        
        if($soal[0]->disable_waktu == 1){
            while($i < $jml){
            if($nis->nis == $akses[$i]->s){
                if($akses[$i]->a == 1){
                    return view('siswa.soal-praktek',
                    [
                        'soals'=>$soal_praktek,
                        'penilaians'=>$soal,
                    ]); 
                }
            }
            $i++;
            }
        }else{
            "ok";
        }

        

        return view('siswa.soal-praktek',
        [
            'soals'=>$soal_praktek,
            'penilaians'=>$soal,
        ]);
    }
    public function siswa_ujian(Request $request)
    {
       
        $username= Auth::user()->username;
        $nis=Student::where('username',"$username")->first();
        $id_rombel=Student_rombel::where('nis',$nis->nis)->first();
        $id=$request["id"];
      
        
  
        
        $validasi=DB::table('penilaians')
        ->where('id',$id)
        ->where('penilaians.id_rombel',$id_rombel->id_rombel)
        ->get();



        //cek validasi ujian
        if($validasi[0]->disable_waktu == 1){
            $banksoal=DB::table('penilaians')
            ->leftjoin('mapels','mapels.id_subject','=','penilaians.id_subject')
            ->where('id',$id)
            ->where('penilaians.id_rombel',$id_rombel->id_rombel)
            ->get();

            $soal1=$banksoal[0]->soal1;
            $soal2=$banksoal[0]->soal2;
            $soal3=$banksoal[0]->soal3;

          
            $soals1=json_decode($soal1);
            $soals2=json_decode($soal2);
            $soals3=json_decode($soal3);

       

            $hak_akses = $banksoal[0]->akses;
            $akses= json_decode($hak_akses);
          
            $jml=count($akses);
            $nilaisaya = DB::table('penilaian_siswas')
            ->where('id_penilaian',$id)
            ->where('nis',$nis->nis)
            ->get();

            $jml_nilaisaya=count($nilaisaya);
 
           
            $attemp = $banksoal[0]->remidial;
          
            $i=0; $j=0;
            while($i< $jml){

                if($nis->nis == $akses[$i]->s){
                 
                    if($akses[$i]->a == 1){
                        $ujian_saya = DB::table('penilaian_siswas')
                        ->where('id_penilaian',$banksoal[0]->id )
                        ->where('nis',$nis->nis)
                        ->orderby('status', 'desc')
                        ->get();
                        $ujian_aktif = DB::table('penilaian_siswas')
                        ->where('id_penilaian',$banksoal[0]->id )
                        ->where('nis',$nis->nis)
                        ->orderby('status', 'desc')
                        ->get();
                        
                        // return $ujian_saya;
                        $x=0;
                    
                        $jml_ujian = count($ujian_saya);    
                        if($jml_ujian == 0){
                            $attemp_sekarang = $jml_ujian +1;
                                if($jml_nilaisaya < $attemp){
                                $attemp=$request["attemp"];
                                $jml_soal1=count($soals1);
                                $jml_soal2=count($soals2);
                                $jml_soal3=count($soals3);
                                $a=0; $b=0; $c=0;
                                if($soals1[0]->s != "xr"){
                                    while($a<$jml_soal1){
                                    $jwbpg[$a]=[
                                        'k'=>"lk",
                                        'n'=>$soals1[$a]->n
                                    ];
                                    $a++;
                                }
                                }else{
                                    $jwbpg=[];
                                }
                                if($soals2[0]->s != "xr"){
                                    while($b<$jml_soal2){
                                    $jwbisi[$b]=[
                                        'k'=>"lk",
                                        'n'=>$soals2[$b]->n
                                    ];
                                    $b++;
                                }
                                }else{
                                    $jwbisi=[];
                                }
                                if($soals3[0]->s != "xr"){
                                    while($c<$jml_soal3){
                                    $jwbtruefalse[$c]=[
                                        'k'=>"lk",
                                        'n'=>$soals3[$c]->n
                                    ];
                                    $c++;
                                }
                                }else{
                                    $jwbtruefalse=[];
                                }
                               
                               
                                $jawaban_soal_pg=json_encode($jwbpg);
                                $jawaban_soal_isi=json_encode($jwbisi);
                                $jawaban_soal_truefalse=json_encode($jwbtruefalse);
                                if(Hash::check($attemp_sekarang,$attemp)){
                                    $nilai = new Penilaian_siswa();
                                    $nilai -> id_cikgu = $banksoal[0]->id_cikgu;
                                    $nilai -> id_penilaian = $banksoal[0]->id;
                                    $nilai -> id_subject = $banksoal[0]->id_subject;
                                    $nilai -> id_rombel = $banksoal[0]->id_rombel;
                                    $nilai -> id_ta = $banksoal[0]->id_ta;
                                    $nilai -> semester = $banksoal[0]->semester;
                                    $nilai -> nis = $nis->nis;
                                    $nilai-> nilai = 0;
                                    $nilai -> tanggal= date('y-m-d h:i');
                                    $nilai-> status=2;
                                    $nilai-> sisa_waktu =$banksoal[0]->durasi;
                                    $nilai -> jawab_soal1 = $jawaban_soal_pg;
                                    $nilai -> jawab_soal2 = $jawaban_soal_isi;
                                    $nilai -> jawab_soal3 = $jawaban_soal_truefalse;
                                    $nilai ->attemp = $attemp_sekarang;
                                    $nilai -> save();
                                            
                                    $idujian=DB::table('penilaian_siswas')
                                    ->where('id_penilaian',$banksoal[0]->id)
                                    ->where('nis',$nis->nis)
                                    ->where('attemp',$attemp_sekarang)
                                    ->get();
    
                               
    
                                    $jwb_soal1=json_decode($jawaban_soal_pg);
                                    $jwb_soal2=json_decode($jawaban_soal_isi);
                                    $jwb_soal3=json_decode($jawaban_soal_truefalse);
                                    return view('siswa.ujian',['attemp'=>$idujian,'jwb_soal1'=>$jwb_soal1,'jwb_soal2'=>$jwb_soal2,'jwb_soal3'=>$jwb_soal3,'banksoals'=>$banksoal,'soals1'=>$soals1,'soals2'=>$soals2,'soals3'=>$soals3]);
                                }else{
                                    return "okdd";
                                }
                                }else{
                                    return back()->with('pesan',"Mohon Maaf anda sudah mengejakan ujian ini.");
                                }
                        }else{
                        
                            if($ujian_saya[0]->status ==2){
                                return "mohon maaf terdapat ujian aktfi";
                            }else{
                                $attemp_sekarang = $jml_ujian +1;
                                $jml_soal1=count($soals1);
                                $jml_soal2=count($soals2);
                                $jml_soal3=count($soals3);
                                if($jml_nilaisaya < $attemp){
                                    $attemp=$request["attemp"];
                                    $a=0; $b=0; $c=0;
                                    if($soals1[0]->s != "xr"){
                                        while($a<$jml_soal1){
                                        $jwbpg[$a]=[
                                            'k'=>"lk",
                                            'n'=>$soals1[$a]->n
                                        ];
                                        $a++;
                                    }
                                    }else{
                                        $jwbpg=[];
                                    }
                                    if($soals2[0]->s != "xr"){
                                        while($b<$jml_soal2){
                                        $jwbisi[$b]=[
                                            'k'=>"lk",
                                            'n'=>$soals2[$b]->n
                                        ];
                                        $b++;
                                    }
                                    }else{
                                        $jwbisi=[];
                                    }
                                    if($soals3[0]->s != "xr"){
                                        while($c<$jml_soal3){
                                        $jwbtruefalse[$c]=[
                                            'k'=>"lk",
                                            'n'=>$soals3[$c]->n
                                        ];
                                        $c++;
                                    }
                                    }else{
                                        $jwbtruefalse=[];
                                    }
                                   
                                   
                                    $jawaban_soal_pg=json_encode($jwbpg);
                                    $jawaban_soal_isi=json_encode($jwbisi);
                                    $jawaban_soal_truefalse=json_encode($jwbtruefalse);
                                    $idujian=DB::table('penilaian_siswas')
                                    ->where('id_penilaian',$banksoal[0]->id)
                                    ->where('nis',$nis->nis)
                                    ->where('attemp',$attemp_sekarang)
                                    ->get();
    
                               
    
                                    $jwb_soal1=json_decode($jawaban_soal_pg);
                                    $jwb_soal2=json_decode($jawaban_soal_isi);
                                    $jwb_soal3=json_decode($jawaban_soal_truefalse);
                               
                                if(Hash::check($attemp_sekarang,$attemp)){
                                    $nilai = new Penilaian_siswa();
                                    $nilai -> id_cikgu = $banksoal[0]->id_cikgu;
                                    $nilai -> id_penilaian = $banksoal[0]->id;
                                    $nilai -> id_subject = $banksoal[0]->id_subject;
                                    $nilai -> id_rombel = $banksoal[0]->id_rombel;
                                    $nilai -> id_ta = $banksoal[0]->id_ta;
                                    $nilai -> semester = $banksoal[0]->semester;
                                    $nilai -> nis = $nis->nis;
                                    $nilai-> nilai = 0;
                                    $nilai -> tanggal= NOW();
                                    $nilai-> status=2;
                                    $nilai-> sisa_waktu =$banksoal[0]->durasi;
                                    $nilai -> jawab_soal1 = $jawaban_soal_pg;
                                    $nilai -> jawab_soal2 = $jawaban_soal_isi;
                                    $nilai -> jawab_soal3 = $jawaban_soal_truefalse;
                                    $nilai ->attemp = $attemp_sekarang;
                                    $nilai -> save();
                                            
                                    $idujian=DB::table('penilaian_siswas')
                                    ->where('id_penilaian',$banksoal[0]->id)
                                    ->where('nis',$nis->nis)
                                    ->where('attemp',$attemp_sekarang)
                                    ->get();
    
                               
                                    return view('siswa.ujian',['attemp'=>$idujian,'jwb_soal1'=>$jwb_soal1,'jwb_soal2'=>$jwb_soal2,'jwb_soal3'=>$jwb_soal3,'banksoals'=>$banksoal,'soals1'=>$soals1,'soals2'=>$soals2,'soals3'=>$soals3]);
                                }else{
                                    return "okdd";
                                }
                                }else{
                                    return back()->with('pesan',"Mohon Maaf anda sudah mengejakan ujian ini.");
                                }
                           
                            }
                        }
                       
                    }
                    
                }
                   
                
                $i++;
            }
            return back()->with('pesan',"Mohon Maaf anda tidak memiliki akses, silahkan hubungi guru pengampu");
    
           

            //bagian kedua
        } elseif($validasi[0]->disable_waktu == 2) {
           
            if($validasi[0]->tanggal_mulai > date('Y-m-d'))
            {
                return back()->with('pesan',"Mohon maaf Belum masuk Tanggal Ujian");
            } else {
                if($validasi[0]->waktu_mulai > date('h:i:s') and $validasi[0]->tanggal_mulai > date('Y-m-d') )
                {
                    return back()->with('pesan',"Belum masuk waktu ujian");
                } else{
                    if($validasi[0]->tanggal_selesai < date('Y-m-d'))
                    {
                        return back()->with('pesan',"Mohon maaf waktu ujian sudah lewat");
                    }else{
                        if($validasi[0]->waktu_selesai < date('h:i:s') and $validasi[0]->tanggal_selesai < date('Y-m-d'))
                        {
                            return back()->with('pesan',"waktu waktu ujian sudah lewat");
                        }else{
                            $banksoal=DB::table('penilaians')
            ->leftjoin('mapels','mapels.id_subject','=','penilaians.id_subject')
            ->where('id',$id)
            ->where('penilaians.id_rombel',$id_rombel->id_rombel)
            ->get();

            $soal1=$banksoal[0]->soal1;
            $soal2=$banksoal[0]->soal2;
            $soal3=$banksoal[0]->soal3;
            $soals1=json_decode($soal1);
            $soals2=json_decode($soal2);
            $soals3=json_decode($soal3);

            $hak_akses = $banksoal[0]->akses;
            $akses= json_decode($hak_akses);
            $jml=count($akses);
            $nilaisaya = DB::table('penilaian_siswas')
            ->where('id_penilaian',$id)
            ->where('nis',$nis->nis)
            ->get();

            $jml_nilaisaya=count($nilaisaya);
 
            $attemp = $banksoal[0]->remidial;
          
            $i=0; $j=0;
            while($i< $jml){

                if($nis->nis == $akses[$i]->s){
                    if($akses[$i]->a == 1){
                        $ujian_saya = DB::table('penilaian_siswas')
                        ->where('id_penilaian',$banksoal[0]->id )
                        ->where('nis',$nis->nis)
                        ->orderby('status', 'desc')
                        ->get();
                        $ujian_aktif = DB::table('penilaian_siswas')
                        ->where('id_penilaian',$banksoal[0]->id )
                        ->where('nis',$nis->nis)
                        ->orderby('status', 'desc')
                        ->get();
                        
                        // return $ujian_saya;
                        $x=0;
                    
                        $jml_ujian = count($ujian_saya);    
                        if($jml_ujian == 0){
                            $attemp_sekarang = $jml_ujian +1;
                                if($jml_nilaisaya < $attemp){
                                $attemp=$request["attemp"];
                                $jml_soal1=count($soals1);
                                $jml_soal2=count($soals2);
                                $jml_soal3=count($soals3);
                                $a=0; $b=0; $c=0;
                                if($soals1[0]->s != "xr"){
                                    while($a<$jml_soal1){
                                    $jwbpg[$a]=[
                                        'k'=>"lk",
                                        'n'=>$soals1[$a]->n
                                    ];
                                    $a++;
                                }
                                }else{
                                    $jwbpg=[];
                                }
                                if($soals2[0]->s != "xr"){
                                    while($b<$jml_soal2){
                                    $jwbisi[$b]=[
                                        'k'=>"lk",
                                        'n'=>$soals2[$b]->n
                                    ];
                                    $b++;
                                }
                                }else{
                                    $jwbisi=[];
                                }
                                if($soals3[0]->s != "xr"){
                                    while($c<$jml_soal3){
                                    $jwbtruefalse[$c]=[
                                        'k'=>"lk",
                                        'n'=>$soals3[$c]->n
                                    ];
                                    $c++;
                                }
                                }else{
                                    $jwbtruefalse=[];
                                }
                               
                               
                                $jawaban_soal_pg=json_encode($jwbpg);
                                $jawaban_soal_isi=json_encode($jwbisi);
                                $jawaban_soal_truefalse=json_encode($jwbtruefalse);
                                if(Hash::check($attemp_sekarang,$attemp)){
                                    $nilai = new Penilaian_siswa();
                                    $nilai -> id_cikgu = $banksoal[0]->id_cikgu;
                                    $nilai -> id_penilaian = $banksoal[0]->id;
                                    $nilai -> id_subject = $banksoal[0]->id_subject;
                                    $nilai -> id_rombel = $banksoal[0]->id_rombel;
                                    $nilai -> id_ta = $banksoal[0]->id_ta;
                                    $nilai -> semester = $banksoal[0]->semester;
                                    $nilai -> nis = $nis->nis;
                                    $nilai-> nilai = 0;
                                    $nilai -> tanggal= date('y-m-d h:i');
                                    $nilai-> status=2;
                                    $nilai-> sisa_waktu =$banksoal[0]->durasi;
                                    $nilai -> jawab_soal1 = $jawaban_soal_pg;
                                    $nilai -> jawab_soal2 = $jawaban_soal_isi;
                                    $nilai -> jawab_soal3 = $jawaban_soal_truefalse;
                                    $nilai ->attemp = $attemp_sekarang;
                                    
                                    $nilai -> save();
                                            
                                    $idujian=DB::table('penilaian_siswas')
                                    ->where('id_penilaian',$banksoal[0]->id)
                                    ->where('nis',$nis->nis)
                                    ->where('attemp',$attemp_sekarang)
                                    ->get();
    
                               
    
                                    $jwb_soal1=json_decode($jawaban_soal_pg);
                                    $jwb_soal2=json_decode($jawaban_soal_isi);
                                    $jwb_soal3=json_decode($jawaban_soal_truefalse);
                                    return view('siswa.ujian',['attemp'=>$idujian,'jwb_soal1'=>$jwb_soal1,'jwb_soal2'=>$jwb_soal2,'jwb_soal3'=>$jwb_soal3,'banksoals'=>$banksoal,'soals1'=>$soals1,'soals2'=>$soals2,'soals3'=>$soals3]);
                                }else{
                                    return "okdd";
                                }
                                }else{
                                    return back()->with('pesan',"Mohon Maaf anda sudah mengejakan ujian ini.");
                                }
                        }else{
                        
                            if($ujian_saya[0]->status ==2){
                                return "mohon maaf terdapat ujian aktfi";
                            }else{
                                $attemp_sekarang = $jml_ujian +1;
                                $jml_soal1=count($soals1);
                                $jml_soal2=count($soals2);
                                $jml_soal3=count($soals3);
                                if($jml_nilaisaya < $attemp){
                                    $attemp=$request["attemp"];
                                    $a=0; $b=0; $c=0;
                                    if($soals1[0]->s != "xr"){
                                        while($a<$jml_soal1){
                                        $jwbpg[$a]=[
                                            'k'=>"lk",
                                            'n'=>$soals1[$a]->n
                                        ];
                                        $a++;
                                    }
                                    }else{
                                        $jwbpg=[];
                                    }
                                    if($soals2[0]->s != "xr"){
                                        while($b<$jml_soal2){
                                        $jwbisi[$b]=[
                                            'k'=>"lk",
                                            'n'=>$soals2[$b]->n
                                        ];
                                        $b++;
                                    }
                                    }else{
                                        $jwbisi=[];
                                    }
                                    if($soals3[0]->s != "xr"){
                                        while($c<$jml_soal3){
                                        $jwbtruefalse[$c]=[
                                            'k'=>"lk",
                                            'n'=>$soals3[$c]->n
                                        ];
                                        $c++;
                                    }
                                    }else{
                                        $jwbtruefalse=[];
                                    }
                                   
                                   
                                    $jawaban_soal_pg=json_encode($jwbpg);
                                    $jawaban_soal_isi=json_encode($jwbisi);
                                    $jawaban_soal_truefalse=json_encode($jwbtruefalse);
                                    $idujian=DB::table('penilaian_siswas')
                                    ->where('id_penilaian',$banksoal[0]->id)
                                    ->where('nis',$nis->nis)
                                    ->where('attemp',$attemp_sekarang)
                                    ->get();
    
                               
    
                                    $jwb_soal1=json_decode($jawaban_soal_pg);
                                    $jwb_soal2=json_decode($jawaban_soal_isi);
                                    $jwb_soal3=json_decode($jawaban_soal_truefalse);
                               
                                if(Hash::check($attemp_sekarang,$attemp)){
                                    $nilai = new Penilaian_siswa();
                                    $nilai -> id_cikgu = $banksoal[0]->id_cikgu;
                                    $nilai -> id_penilaian = $banksoal[0]->id;
                                    $nilai -> id_subject = $banksoal[0]->id_subject;
                                    $nilai -> id_rombel = $banksoal[0]->id_rombel;
                                    $nilai -> id_ta = $banksoal[0]->id_ta;
                                    $nilai -> semester = $banksoal[0]->semester;
                                    $nilai -> nis = $nis->nis;
                                    $nilai-> nilai = 0;
                                    $nilai -> tanggal= NOW();
                                    $nilai-> status=2;
                                    $nilai-> sisa_waktu =$banksoal[0]->durasi;
                                    $nilai -> jawab_soal1 = $jawaban_soal_pg;
                                    $nilai -> jawab_soal2 = $jawaban_soal_isi;
                                    $nilai -> jawab_soal3 = $jawaban_soal_truefalse;

                                    $nilai ->attemp = $attemp_sekarang;
                                    $nilai -> save();
                                            
                                    $idujian=DB::table('penilaian_siswas')
                                    ->where('id_penilaian',$banksoal[0]->id)
                                    ->where('nis',$nis->nis)
                                    ->where('attemp',$attemp_sekarang)
                                    ->get();
    
                               
                                    return view('siswa.ujian',['attemp'=>$idujian,'jwb_soal1'=>$jwb_soal1,'jwb_soal2'=>$jwb_soal2,'jwb_soal3'=>$jwb_soal3,'banksoals'=>$banksoal,'soals1'=>$soals1,'soals2'=>$soals2,'soals3'=>$soals3]);
                                }else{
                                    return "okdd";
                                }
                                }else{
                                    return back()->with('pesan',"Mohon Maaf anda sudah mengejakan ujian ini.");
                                }
                           
                            }
                        }
                       
                    }
                    
                }
                $i++;
            }
            
                return back()->with('pesan',"Mohon Maaf anda tidak memiliki akses, silahkan hubungi guru pengampu");
            
                        }
                    }
                }
            }
         }
    }

    public function simpan_ujian(Request $request)
    {
        $username= Auth::user()->username;
        $nis=Student::where('username',"$username")->first();   
        $id=$request["id"];
            $id_ujian=$request["attemp"];
           
        
    
            $banksoal = Penilaian::findorFail($id);
            $soal1=$banksoal->soal1;
            $soal2=$banksoal->soal2;
            $soal3=$banksoal->soal3;
            $soals1=json_decode($soal1);
            $soals2=json_decode($soal2);
            $soals3=json_decode($soal3);
            $ujian_saya = DB::table('penilaian_siswas')
            ->where('id_penilaian',$banksoal->id )
            ->where('nis',$nis->nis)
            ->where('status',2)
            ->get();
           
            $jawab_soal1=$ujian_saya[0]->jawab_soal1;
            $jawab_soal2=$ujian_saya[0]->jawab_soal2;
            $jawab_soal3=$ujian_saya[0  ]->jawab_soal3;
            $jawab_soals1=json_decode($jawab_soal1);
            $jawab_soals2=json_decode($jawab_soal2);
            $jawab_soals3=json_decode($jawab_soal3);

         

            $jml_soal_total = count($jawab_soals1) + count($jawab_soals2) + count($jawab_soals3);
           
            
            $u=0;
            $p=0;
            $o=0;
            // return "ok";

            // return count($jawab_soals3);
           
            if(count($jawab_soals1)!=NULL){
            while($u < count($jawab_soals1)){
                if($jawab_soals1[$u]->k ==0){
                    $sudah_jawab_pg[$u]="0";
                }else{
                    $sudah_jawab_pg[$u]="1";
                }
               
                $u++;
            }
        }else{
            $sudah_jawab_pg[0]="0";
        }
        if(count($jawab_soals3)!=NULL){
            while($p < count($jawab_soals3)){
               
                if($jawab_soals3[$p]->k == 0){
                  
                    $sudah_jawab_truefalse[$p]="0";
                }else{
                    $sudah_jawab_truefalse[$p]="1";
                }
               
                $p++;
            }
        }else{
            $sudah_jawab_truefalse[]="0";
        }

       
        if(count($jawab_soals2)!=NULL){
            while($o < count($jawab_soals2)){
               
                if($jawab_soals2[$o]->k == null  ){
                  
                    $sudah_jawab_isian[$o]="0";
                }else if($jawab_soals2[$o]->k == "lk"  ){
                  
                        $sudah_jawab_isian[$o]="0";
                }else{
                    $sudah_jawab_isian[$o]="1";
                }
               
                $o++;
            }
        }else{
            $sudah_jawab_isian[]="0";
        }
       

      
        $jml_soal_dijawab = array_sum($sudah_jawab_pg)+ array_sum ($sudah_jawab_isian)+ array_sum($sudah_jawab_truefalse);
           
        
        
        $persentase_sudah_dijawab = ($jml_soal_dijawab / $jml_soal_total) * 100 ;
          
      
             if($request["tipe_soal1"] != NULL){
            $jml_soal=count($request["tipe_soal1"]);
            $jml_database_soal=count($soals1);
            $jawaban_pg=[];

               $a=0;
            while($a < $jml_soal){

               
                if($request["nomor_soal1"] !== NULL){
                    if($request["pg$a"][0] < 0 and $request["pg$a"][0] > 5){
                        $jawaban_pg[$a]=[
                            'k'=> "lk",
                            'n'=> $request["nomor_soal1"][$a]
                        ];
                        $skor_pg[$a]=0;
                    }else{
                        $b=0;
                        while($b < $jml_database_soal){
                            if($request["nomor_soal1"][$a] == $soals1[$b]->n){
                                    $jawaban_pg[$a]=[
                                        'k'=> $request["pg$a"][0],
                                        'n'=> $request["nomor_soal1"][$a]
                                    ];
                                    if($request["pg$a"][0] == $soals1[$b]->k){
                                        $skor_pg[$a]=$soals1[$b]->v;
                                    }else{
                                        $skor_pg[$a]=0;
                                    }
                                    
                                  
                            }
                            $b++;
                           
                        }
                        
                    }
                    
                }
                $skor_pg_max[$a]=$soals1[$a]->v; 
                $a++;
              
            }
            
            // return $jawaban_soal_pg;
   
        }else{
            $skor_pg=[0];
            $skor_pg_max=[0];
            $jawaban_pg=[];
        }
        
        $jawaban_soal_pg=json_encode($jawaban_pg);
        $skor_pg_saya = array_sum($skor_pg);
        $skor_pg_max= array_sum($skor_pg_max);

      
         if($request["tipe_soal2"] != NULL){
             
            

          
            $jawabanisi=[];
            $jawaban_max_isian=[];
            $jml_soal_isi=count($request["tipe_soal2"]);
          
            $jmlsoals2=count($soals2);
         
            $m=0 ;
            while($m <$jml_soal_isi){
               
                $n=0;
                while($n < $jmlsoals2){
                    if($request["nomor_soal2"][$m]==$soals2[$n]->n){
                        $jwbisi[$m]=[
                            'k'=> $request["isi$m"][0],
                            'n'=> $request["nomor_soal2"][$m]
                        ];

                        
                       
                        if($soals2[$n]->a == strtolower($request["isi$m"][0]) || $soals2[$n]->b == strtolower($request["isi$m"][0]) || 
                        $soals2[$n]->c == strtolower($request["isi$m"][0])){
                            $jawabanisi[$n]= $soals2[$n]->v ;
                        }else{
                            $jawabannisi[$n]=0 ;
                        }
                        
                    }
                  
                    $n++;
                }
                $jawaban_max_isian[$m]=$soals2[$m]->v;
            $m++;
            }
            $skor_isian = array_sum($jawabanisi);
            $skor_max_isian=array_sum($jawaban_max_isian);
            $jawaban_soal_isi=json_encode($jwbisi);
            
           
            
         }else{
            $skor_isian = 0;
            $skor_max_isian= 0;
            $jawaban_soal_isi=[];
         }

        
       
      
       
         if($request["tipe_soal3"] != NULL){
            $i=0 ;
            $jawabantruefalse=[];
            $jawaban_max_truefalse=[];
            $jmltruefalse=count($request["tipe_soal3"]);
            $jmlsoals3=count($soals3);
            
            while($i<$jmltruefalse){
                $j=0;
                while($j < $jmlsoals3){
                
            
                    if($request["nomor_soal3"][$i]==$soals3[$j]->n){
                        
                        $jwbtruefalse[$i]=[
                            'k'=> $request["truefalse$i"][0],
                            'n'=> $request["nomor_soal3"][$i]
                        ];
                        if($soals3[$j]->k == $request["truefalse$i"][0]){
                            $jawabantruefalse[$j]= $soals3[$j]->v ;
                        }else{
                            $jawabantruefalse[$j]=0 ;
                        }
                        
                    }
             
                    $j++;
                }
              
            $jawaban_max_truefalse[$i]=$soals3[$i]->v;
            $i++;
            }
            
            $skor_truefalse = array_sum($jawabantruefalse);
            
            $skor_max_truefalse=array_sum($jawaban_max_truefalse);
            $jawaban_soal_truefalse=json_encode($jwbtruefalse);
           
         } else{
            $skor_truefalse = 0;
            $skor_max_truefalse=0;
            $jawaban_soal_truefalse=[];
         }
      
         $skor_saya = ($skor_truefalse + $skor_pg_saya + $skor_isian);
         $skor_maximal= ($skor_pg_max + $skor_max_isian+  $skor_max_truefalse);
         $skor_akhir  = ($skor_saya/$skor_maximal)*100;

         
            $username= Auth::user()->username;
            $nis=Student::where('username',"$username")->first();
            $id_rombel=Student_rombel::where('nis',$nis->nis)->first();
          
            $ujian_saya = DB::table('penilaian_siswas')
            ->where('id_penilaian',$banksoal->id )
            ->where('nis',$nis->nis)
            ->get();
         
            
                $nilai = new Penilaian_siswa();
               
                $nilai = Penilaian_siswa::where('id',$id_ujian)
                ->where('nis',$nis->nis)->first();
                $update_save=date('y-m-d h:i:s');
                $nilai->  tanggal_update = $update_save;
                $nilai-> nilai = $skor_akhir;  
               
                $nilai -> jawab_soal1 = $jawaban_soal_pg;
             
                $nilai -> jawab_soal2 = $jawaban_soal_isi;
                
                $nilai -> jawab_soal3 = $jawaban_soal_truefalse;
                
                $nilai -> save(); 

                $data_ujian= [
                    'update'=> $update_save,
                    'persen'=>number_format($persentase_sudah_dijawab)
                ];

                $json=json_encode($data_ujian);
                $json2=json_decode($json);
       
               
              
                return view('siswa.data-ujian',['data'=>$json2]);
       }

       public function selesai_ujian(Request $request)
    {
        
        $id=$request["id"];
            $id_ujian=$request["attemp"];
           
    
            $banksoal = Penilaian::findorFail($id);
            $soal1=$banksoal->soal1;
            $soal2=$banksoal->soal2;
            $soal3=$banksoal->soal3;
            $soals1=json_decode($soal1);
            $soals2=json_decode($soal2);
            $soals3=json_decode($soal3);
             if($request["tipe_soal1"] != NULL){
            $jml_soal=count($request["tipe_soal1"]);
            $jml_database_soal=count($soals1);
            $jawaban_pg=[];

               $a=0;
            while($a < $jml_soal){

               
                if($request["nomor_soal1"] !== NULL){
                    if($request["pg$a"][0] < 0 and $request["pg$a"][0] > 5){
                        $jawaban_pg[$a]=[
                            'k'=> "lk",
                            'n'=> $request["nomor_soal1"][$a]
                        ];
                        $skor_pg[$a]=0;
                    }else{
                        $b=0;
                        while($b < $jml_database_soal){
                            if($request["nomor_soal1"][$a] == $soals1[$b]->n){
                                    $jawaban_pg[$a]=[
                                        'k'=> $request["pg$a"][0],
                                        'n'=> $request["nomor_soal1"][$a]
                                    ];
                                    if($request["pg$a"][0] == $soals1[$b]->k){
                                        $skor_pg[$a]=$soals1[$b]->v;
                                    }else{
                                        $skor_pg[$a]=0;
                                    }
                                    
                                  
                            }
                            $b++;
                           
                        }
                        
                    }
                    
                }
                $skor_pg_max[$a]=$soals1[$a]->v; 
                $a++;
              
            }
            
            // return $jawaban_soal_pg;
   
        }else{
            $skor_pg=[0];
            $skor_pg_max=[0];
            $jawaban_pg=[];
        }
        $jawaban_soal_pg=json_encode($jawaban_pg);
            $skor_pg_saya = array_sum($skor_pg);
            $skor_pg_max= array_sum($skor_pg_max);
       
         if($request["tipe_soal2"] != NULL){
            $i=0 ; $k=0;
            $jawabanisi=[];
            $jawaban_max_isian=[];
            $jmlpg=count($request["tipe_soal2"]);
            $jmlsoals2=count($soals2);
            while($i<$jmlpg){
                $j=0;
                while($j < $jmlsoals2){
                    if($request["nomor_soal2"][$i]==$soals2[$j]->n){
                       
                        $jwbisi[$i]=[
                            'k'=> $request["isi$i"][0],
                            'n'=> $request["nomor_soal2"][$i]
                        ];
                        if($soals2[$j]->a == strtolower($request["isi$i"][0]) || $soals2[$j]->b == strtolower($request["isi$i"][0]) || 
                        $soals2[$j]->c == strtolower($request["isi$i"][0])){
                            $jawabanisi[$j]= $soals2[$j]->v ;
                        }else{
                            $jawabannisi[$j]=0 ;
                        }
                        
                    }

                    $j++;
                }
                $jawaban_max_isian[$i]=$soals2[$i]->v;
            $i++;
            }
            $skor_isian = array_sum($jawabanisi);
            $skor_max_isian=array_sum($jawaban_max_isian);
            $jawaban_soal_isi=json_encode($jwbisi);
            
            
         }else{
            $skor_isian = 0;
            $skor_max_isian= 0;
            $jawaban_soal_isi=[];
         }

        
         if($request["tipe_soal3"] != NULL){
            $i=0 ; $k=0;
            $jawabantruefalse=[];
            $jawaban_max_truefalse=[];
            $jmltruefalse=count($request["tipe_soal3"]);
            $jmlsoals3=count($soals3);
            
            while($i<$jmltruefalse){
                $j=0;
                while($j < $jmlsoals3){
                
            
                    if($request["nomor_soal3"][$i]==$soals3[$j]->n){
                        
                        $jwbtruefalse[$i]=[
                            'k'=> $request["truefalse$i"][0],
                            'n'=> $request["nomor_soal3"][$i]
                        ];
                        if($soals3[$j]->k == $request["truefalse$i"][0]){
                            $jawabantruefalse[$j]= $soals3[$j]->v ;
                        }else{
                            $jawabantruefalse[$j]=0 ;
                        }
                        
                    }
             
                    $j++;
                }
              
            $jawaban_max_truefalse[$i]=$soals3[$i]->v;
            $i++;
            }
            
            $skor_truefalse = array_sum($jawabantruefalse);
            
            $skor_max_truefalse=array_sum($jawaban_max_truefalse);
            $jawaban_soal_truefalse=json_encode($jwbtruefalse);
           
         } else{
            $skor_truefalse = 0;
            $skor_max_truefalse=0;
            $jawaban_soal_truefalse=[];
         }
      
         $skor_saya = ($skor_truefalse + $skor_pg_saya + $skor_isian);
         $skor_maximal= ($skor_pg_max + $skor_max_isian+  $skor_max_truefalse);
         $skor_akhir  = ($skor_saya/$skor_maximal)*100;

         
            $username= Auth::user()->username;
            $nis=Student::where('username',"$username")->first();
            $id_rombel=Student_rombel::where('nis',$nis->nis)->first();
          
            $ujian_saya = DB::table('penilaian_siswas')
            ->where('id_penilaian',$banksoal->id )
            ->where('nis',$nis->nis)
            ->get();
         
            
                $nilai = new Penilaian_siswa();
               
                $nilai = Penilaian_siswa::where('id',$id_ujian)
                ->where('nis',$nis->nis)->first();            
                $nilai-> tanggal_update = date('y-m-d h:i:s');
                // $nilai->sisa_waktu = $update_waktu;
                $nilai-> nilai = $skor_akhir;  
               
                $nilai -> jawab_soal1 = $jawaban_soal_pg;
             
                $nilai -> jawab_soal2 = $jawaban_soal_isi;
                
                $nilai -> jawab_soal3 = $jawaban_soal_truefalse;
                 
                $nilai-> status=1;
                $nilai-> sisa_waktu=0;
                
                $nilai -> save(); 
                
                return $id_ujian;
                
       }
   

       public function nilai_ujian($id)
       {
        $username= Auth::user()->username;
        $nis=Student::where('username',"$username")->first();
        $id_rombel=Student_rombel::where('nis',$nis->nis)->first();
        $ujian_saya = DB::table('penilaian_siswas')
            ->where('id',$id )
            ->where('nis',$nis->nis)
            ->get();
            $banksoal = DB::table('penilaians')
            ->WHERE('id', $ujian_saya[0]->id_penilaian)->first();
        return view('siswa.nilai',['nilai'=>$ujian_saya[0]->nilai, 'kkm'=>$banksoal->kkm]);
       }

       public function lanjut_ujian(Request $request)
       {
        $username= Auth::user()->username;
        $nis=Student::where('username',"$username")->first();
        $id_rombel=Student_rombel::where('nis',$nis->nis)->first();
        $status=$request["status"];
        $id=$request["id"];
      
        $banksoal=DB::table('penilaians')
            ->leftjoin('mapels','mapels.id_subject','=','penilaians.id_subject')
            ->where('id',$id)
            ->where('penilaians.id_rombel',$id_rombel->id_rombel)
            ->get();

            $soal1=$banksoal[0]->soal1;
            $soal2=$banksoal[0]->soal2;
            $soal3=$banksoal[0]->soal3;
            $soals1=json_decode($soal1);
            $soals2=json_decode($soal2);
            $soals3=json_decode($soal3);
        
        
        $idujian=DB::table('penilaian_siswas')
        // ->leftjoin('mapels','mapels.id_subject','=','penilaian_siswas.id_subject')
        // ->leftjoin('cikgus','cikgus.id_cikgu','=','penilaian_siswas.id_cikgu')
        // ->leftjoin('rombels','rombels.id_rombel','=','penilaian_siswas.id_rombel')
        ->where('nis',$nis->nis)
        ->where('attemp',$request["attemp"])
        ->where('penilaian_siswas.id_cikgu',$request["id_cikgu"] )
        ->where('penilaian_siswas.id_subject',$request["id_subject"] )
        ->where('penilaian_siswas.id_penilaian',$request["id_ujian"])
        ->get();

                $nilai = new Penilaian_siswa();
               
                $nilai = Penilaian_siswa::where('id',$idujian[0]->id)
                ->where('nis',$nis->nis)->first();
                $nilai-> tanggal = date('y-m-d h:i');      
                $status = $nilai->status;
                $waktu_sisa= $nilai->sisa_waktu;
                

        $jwb_soal1 = json_decode($idujian[0]->jawab_soal1);
        $jwb_soal2 = json_decode($idujian[0]->jawab_soal2);
        $jwb_soal3 = json_decode($idujian[0]->jawab_soal3);

        if($idujian[0]->sisa_waktu <= 0){
            if($nilai->status = 2){
                $nilai->status = 1;
                $nilai->save();
                return back();
            }
            
        }

        
        return view('siswa.ujian',['attemp'=>$idujian,'jwb_soal1'=>$jwb_soal1,'jwb_soal2'=>$jwb_soal2,'jwb_soal3'=>$jwb_soal3,'banksoals'=>$banksoal,'soals1'=>$soals1,'soals2'=>$soals2,'soals3'=>$soals3]);
       }

       
       public function update_ujian(Request $request)
       {
               $id=$request["id"];
               $id_ujian=$request["attemp"];
              
               $banksoal = Penilaian::findorFail($id);
               $soal1=$banksoal->soal1;
               $soal2=$banksoal->soal2;
               $soal3=$banksoal->soal3;
               $soals1=json_decode($soal1);
               $soals2=json_decode($soal2);
               $soals3=json_decode($soal3);  
          
               $username= Auth::user()->username;
               $nis=Student::where('username',"$username")->first();
               $id_rombel=Student_rombel::where('nis',$nis->nis)->first();
             
               $ujian_saya = DB::table('penilaian_siswas')
               ->where('id_penilaian',$banksoal->id )
               ->where('nis',$nis->nis)
               ->get();
            
               
                   $nilai = new Penilaian_siswa();
                  
                   $nilai = Penilaian_siswa::where('id',$id_ujian)
                   ->where('nis',$nis->nis)->first();
                  
                   $sisa_waktu= $nilai->sisa_waktu;
                   return $sisa_waktu;
          }

          public function siswa_ujian_refresh()
          {
              return back();
          }

          public function lanjut_ujian_refresh()
          {
              return back();
          }

          public function simpan_jawaban(Request $request)
          {
            $username= Auth::user()->username;
            $nis=Student::where('username',"$username")->first();
            $id_rombel=Student_rombel::where('nis',$nis->nis)->first();
            $penilaian = DB::table('penilaians')
            ->where('id',$request['id'])
            ->first();


            
           
            $nilai = new Penilaian_siswa_praktek();
            $nilai -> id_penilaian = $request["id"];
            $nilai -> jawaban = $request["jawaban"];
            $nilai -> id_cikgu = $penilaian->id_cikgu;
            $nilai -> id_subject = $penilaian->id_subject;
            $nilai -> id_ta = $penilaian->id_ta;
            $nilai -> semester = $penilaian->semester;
            $nilai -> nis = $nis->nis;
            $nilai -> status = 1;
            $nilai-> tanggal = date('y-m-d h:i:s');

            $cek = DB::table('penilaian_siswa_prakteks')
            ->where('id_penilaian', $request["id"])
            ->where('nis', $nis->nis)
            ->first();


           
        
            if($cek == NULL){
                $nilai->save();
                return "alhamdulilah jawaban berhasil tersimpan";
            }
          

            return "Mohon maaf anda sudah menyimpan untuk penilaian ini, untuk melakukan perubahan silahkan hubungi pengampu";
           
          }
   
}
