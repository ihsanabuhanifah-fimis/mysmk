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

class PenilaianController extends Controller
{
    //Controleer siswa

    public function jadwal_ujian()
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
        ->where('penilaians.id_rombel',$id_rombel->id_rombel)->get();

       return view('siswa.jadwal-ujian',['ujians'=>$ujian]);
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
        if($validasi[0]->status == 1){
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
                                    return" anda sudah mengejakan ini";
                                }
                        }else{
                        
                            if($ujian_saya[0]->status ==2){
                                return "mohon maaf terdapat ujian aktfi";
                            }else{
                                $attemp_sekarang = $jml_ujian +1;
                                if($jml_nilaisaya < $attemp){
                                    $attemp=$request["attemp"];
                                $jwbpg[0]=['k'=> "lk"];
                                $jwbisi[0]=['k'=> "lk"];
                                $jwbtruefalse[0]=['k'=> "lk"];
                                $jawaban_soal_pg=json_encode($jwbpg);
                                $jawaban_soal_isi=json_encode($jwbisi);
                                $jawaban_soal_truefalse=json_encode($jwbtruefalse);
                                if(Hash::check($attemp_sekarang,$attemp)){
                                    $nilai = new Penilaian_siswa();
                                    $nilai -> id_cikgu = $banksoal[0]->id_cikgu;
                                    $nilai -> id_penilaian = $banksoal[0]->id;
                                    $nilai -> id_subject = $banksoal[0]->id_subject;
                                    $nilai -> id_rombel = $banksoal[0]->id_rombel;
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
    
                               
    
                                    $jwb_soal1=json_decode($jawaban_soal_pg);
                                    $jwb_soal2=json_decode($jawaban_soal_isi);
                                    $jwb_soal3=json_decode($jawaban_soal_truefalse);
                                    return view('siswa.ujian',['attemp'=>$idujian,'jwb_soal1'=>$jwb_soal1,'jwb_soal2'=>$jwb_soal2,'jwb_soal3'=>$jwb_soal3,'banksoals'=>$banksoal,'soals1'=>$soals1,'soals2'=>$soals2,'soals3'=>$soals3]);
                                }else{
                                    return "okdd";
                                }
                                }else{
                                    return" anda sudah mengejakan ini";
                                }
                           
                            }
                        }
                       
                    }
                    
                }
                $i++;
            }

    
           

            //bagian kedua
        } elseif($validasi[0]->status == 2) {
           
            return "ujian belum siap";
         }
    }

    public function simpan_ujian(Request $request)
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
            $i=0 ; $k=0;
            $jawabanpg=[];
            $jawaban_max=[];
            $jmlpg=count($request["tipe_soal1"]);
            $jmlsoals1=count($soals1);
            while($i<$jmlpg){
                
                $j=0;
                while($j < $jmlsoals1){
                    if($request["nomor_soal1"][$i]==$soals1[$j]->n){
                        if($request["pg$i"]!= NULL){
                            $jwbpg[$i]=[
                                'k'=> $request["pg$i"][$i],
                                'n'=> $request["nomor_soal1"][$i]
                            ];
                            $jawabanpg[$j]= $soals1[$j]->v ;
                    
                    }else{
                        $jawabanpg[$j]=0 ;
                        $jwbpg[$i]=[
                            'k'=> "lk",
                            'n'=> $request["nomor_soal1"][$i]
                        ];
                    }
                    }

                    $j++;
                }

            $jawaban_max[$i]=$soals1[$i]->v;
            $i++;
    
            }
            
            $jawaban_soal_pg=json_encode($jwbpg);
            $skor_pilihan_ganda = array_sum($jawabanpg);
            $skor_max_pg=array_sum($jawaban_max);
        
         }else{
            $jawaban_soal_pg[]=[];
            $skor_pilihan_ganda = 0;
            $skor_max_pg= 0;
         }
        
  
                  //akhir soal pg


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
                            'k'=> $request["isi$i"][$i],
                            'n'=> $request["nomor_soal2"][$i]
                        ];
                        if($soals2[$j]->a == strtolower($request["isi$i"][$i]) || $soals2[$j]->b == strtolower($request["isi$i"][$ai]) || 
                        $soals2[$j]->c == strtolower($request["isi$i"][$i])){
                            $jawabanisi[$j]= $soals2[$j]->v ;
                        }else{
                            $jawabannisi[$j]=0 ;
                        }
                        
                    }else{
                        $jwbisi[$i]=[
                            'k'=> "lk",
                            'n'=> $request["nomor_soal2"][$i]
                        ];
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
                            'k'=> $request["truefalse$i"][$i],
                            'n'=> $request["nomor_soal3"][$i]
                        ];
                        if($soals3[$j]->k == $request["truefalse$i"][$i]){
                            $jawabantruefalse[$j]= $soals3[$j]->v ;
                        }else{
                            $jawabantruefalse[$j]=0 ;
                        }
                        
                    }else{
                        $jwbtruefalse[$i]=[
                            'k'=> "lk   ",
                            'n'=> $request["nomor_soal3"][$i]
                        ];
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
      
         $skor_saya = ($skor_truefalse + $skor_pilihan_ganda + $skor_isian);
         $skor_maximal= ($skor_max_pg + $skor_max_isian+  $skor_max_truefalse);
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
                
                // $waktu_mulai=$nilai->tanggal ;
                // $waktu_saat_ini=date('y-m-d h:i');
                // $selisih = strtotime($waktu_saat_ini) - strtotime($waktu_mulai);
                // $jam= floor($selisih/(60*60));
                // $menit= $selisih/60;
                // $update_waktu= $nilai->sisa_waktu - $menit;
              
            
                $nilai-> tanggal_update = date('y-m-d h:i:s');
                // $nilai->sisa_waktu = $update_waktu;
                $nilai-> nilai = $skor_akhir;  
               
                $nilai -> jawab_soal1 = $jawaban_soal_pg;
             
                $nilai -> jawab_soal2 = $jawaban_soal_isi;
                
                $nilai -> jawab_soal3 = $jawaban_soal_truefalse;
                
                $nilai -> save(); 
                $update = $nilai->tanggal_update;
                return $update;
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
            $i=0 ; $k=0;
            $jawabanpg=[];
            $jawaban_max=[];
            $jmlpg=count($request["tipe_soal1"]);


            $jmlsoals1=count($soals1);
            while($i<$jmlpg){
                
                $j=0;
                while($j < $jmlsoals1){
                   
                    if($request["nomor_soal1"][$i]==$soals1[$j]->n){
                        if($request["pg$i"]!= NULL){
                            $jwbpg[$i]=[
                                'k'=> $request["pg$i"][0],
                                'n'=> $request["nomor_soal1"][$i]
                            ];
                        if($soals1[$j]->k == $request["pg$i"][0]){
                            $jawabanpg[$j]= $soals1[$j]->v ;
                        } else{
                            $jawabanpg[$j]=0 ;
                        }
                    }else{
                        $jawabanpg[$j]=0 ;
                        $jwbpg[$i]=[
                            'k'=> "lk",
                            'n'=> $request["nomor_soal1"][$i]
                        ];
                    }
                    }

                    $j++;
                }
            $jawaban_max[$i]=$soals1[$i]->v;
            $i++;
            }
            
            $jawaban_soal_pg=json_encode($jwbpg);
            $skor_pilihan_ganda = array_sum($jawabanpg);
            $skor_max_pg=array_sum($jawaban_max);
        
         }else{
            $jawaban_soal_pg[]=[];
            $skor_pilihan_ganda = 0;
            $skor_max_pg= 0;
         }
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
                        
                    }else{
                        $jwbisi[$i]=[
                            'k'=> "lk",
                            'n'=> $request["nomor_soal2"][$i]
                        ];
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
                        
                    }else{
                        $jwbtruefalse[$i]=[
                            'k'=> "lk   ",
                            'n'=> $request["nomor_soal3"][$i]
                        ];
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
         
         $skor_saya = ($skor_truefalse + $skor_pilihan_ganda + $skor_isian);
         $skor_maximal= ($skor_max_pg + $skor_max_isian+  $skor_max_truefalse);
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
             
                $nilai-> nilai = $skor_akhir;
                 
                $nilai-> status=1;
                $nilai-> sisa_waktu=0;
          
                $nilai -> jawab_soal1 = $jawaban_soal_pg;
        
                $nilai -> jawab_soal2 = $jawaban_soal_isi;
                
                $nilai -> jawab_soal3 = $jawaban_soal_truefalse;
                
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

   
}
