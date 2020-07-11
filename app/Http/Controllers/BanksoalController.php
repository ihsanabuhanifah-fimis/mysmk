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
use App\Materi;
use App\Banksoal;
use App\Bab;
use App\Jenis_ujian;
use App\Tipe_ujian;
use App\Kbm;
use App\Penilaian;
use App\Providers;
use Validator,Redirect,Response;
use Illuminate\Support\Facades\Auth;
use PDF;

class BanksoalController extends Controller
{
    public function savebank(Request $request)
    {
        $bank= new Banksoal();
        $username= Auth::user()->username;
        $id_cikgu=Cikgu::where('username',"$username")->first();
        $bank->id_subject = $request["id_subject"];
        $bank->id_bab = $request["id_bab"];
        $bank->materi = $request["materi"];
        $bank->status = $request["status"];
        $bank->id_tipe = $request["id_tipe"];
        $bank->id_cikgu = $id_cikgu->id_cikgu;
        $bank->tanggal=NOW();
        $soal1[0] = [
            't'=>'pg',
            's'=>"xr",
            
        ];
        $soal2[0] = [
            't'=>'isi',
            's'=>"xr",
            
        ];
        $soal3[0] = [
            't'=>'tf',
            's'=>"xr",
            
        ];
        $soal_praktek[0] = [
            'ns'=>'',
            'm'=>'',
            's'=>"",
            
        ];
        $soal1=json_encode($soal1);
        $soal2=json_encode($soal2);
        $soal3=json_encode($soal3);
        $soal_praktek=json_encode($soal_praktek);
        $bank->soal1=$soal1;
        $bank->soal2=$soal2;
        $bank->soal3=$soal3;
        $bank->soal_praktek=$soal_praktek;
        $bank->save();
        return "sukses";
    }

    public function banksoal()
    {
  
        $username= Auth::user()->username;
        $id_cikgu=Cikgu::where('username',"$username")->first();
       
        $banksoal = DB::table('banksoals')
        ->leftjoin('mapels','mapels.id_subject','=','banksoals.id_subject')
        ->leftjoin('babs','babs.id_bab','=','banksoals.id_bab')
        ->leftjoin('tipe_ujians','tipe_ujians.id_tipe','=','banksoals.id_tipe')
        ->where('banksoals.id_cikgu',$id_cikgu->id_cikgu)
        ->get();
        
    

        return view('guru.banksoal',['banksoals'=>$banksoal]);


    }

    public function banksoallain()
    {
        
        $username= Auth::user()->username;
        $id_cikgu=Cikgu::where('username',"$username")->first();
        $banksoal2 = DB::table('banksoals')
        ->leftjoin('mapels','mapels.id_subject','=','banksoals.id_subject')
        ->leftjoin('babs','babs.id_bab','=','banksoals.id_bab')
        ->where('status',2)
        ->where('banksoals.id_cikgu','!=',$id_cikgu->id_cikgu)
        ->get();


        return view('guru.bank-soal-lain',['banksoals2'=>$banksoal2]);


    }

    
    public function buatsoal($id)
    {
        $username= Auth::user()->username;
        $id_cikgu=Cikgu::where('username',"$username")->first();
        $banksoal = DB::table('banksoals')
        ->leftjoin('mapels','mapels.id_subject','=','banksoals.id_subject')
        ->where('id',$id)
        ->where('id_cikgu',$id_cikgu->id_cikgu)->get();
        $soal1= $banksoal[0]->soal1;
        $soals=json_decode($soal1);
        $soal2= $banksoal[0]->soal2;
        $soals2=json_decode($soal2);
        $soal3= $banksoal[0]->soal3;
        $soals3=json_decode($soal3);
        
      
        
        return view('guru.buat-soal',['soals'=>$soals,'soals2'=>$soals2,'soals3'=>$soals3, 'banksoals'=>$banksoal]);
    }
    public function buatsoalpraktek($id)
    {
        $username= Auth::user()->username;
        $id_cikgu=Cikgu::where('username',"$username")->first();
        $banksoal = DB::table('banksoals')
        ->leftjoin('mapels','mapels.id_subject','=','banksoals.id_subject')
        ->where('id',$id)
        ->where('id_cikgu',$id_cikgu->id_cikgu)->get();
              
        $soal_praktek = $banksoal[0]->soal_praktek;
        $soal_praktek_siswa = json_decode($soal_praktek);
      return view('guru.buat-soal-praktek',['banksoals'=>$banksoal,'soal_prakteks'=>$soal_praktek_siswa]);
        
        // return view('guru.buat-soal',['soals'=>$soals,'soals2'=>$soals2,'soals3'=>$soals3, 'banksoals'=>$banksoal]);
    }

    public function editsoal(Request $request)
    {
        $username= Auth::user()->username;
        $id_cikgu=Cikgu::where('username',"$username")->first();
        $id=$request["id"];
        $soal = new Banksoal();
        $soal = Banksoal::where('id',$id)->where('id_cikgu',$id_cikgu->id_cikgu)->first();

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
            't'=>'pg',
            'ns'=>"",
            's'=>"xr",
            'v'=>"1",
            'a'=>"",
            'k1'=>"1",
            'b'=>"",
            'k2'=>"2",
            'c'=>"",
            'k3'=>"3",
            'd'=>"",
            'k4'=>"4",
            'e'=>"",
            'k5'=>"5",
            'k'=>'1',
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
            'ns'=>"",
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
                'ns'=>"",
                's'=>"xr",
            ];
        $soal3=json_encode($data3);
        $soal->soal3=$soal3;

        }
    // kempat
    // if($request["soal4"]!==NULL){
    //     \value
    // $jml4=count($request["soal4"]);
    // while($l < $jml4){
    
    //     $data4[$l]=[

    //         's'=>$request->soal4[$l],
            

    //     ];
        
    // }

    // }else{

    // }
        $soal->save();
        $success_output = 'ok';
        $output=[
            'success' => $success_output
        ];
        return back();
    }

    public function editsoalpraktek(Request $request)
    {
        
      ;
        $username= Auth::user()->username;
        $id_cikgu=Cikgu::where('username',"$username")->first();
        $id=$request["id"];

        $soal = new Banksoal();
        $soal = Banksoal::where('id',$id)->where('id_cikgu',$id_cikgu->id_cikgu)->first();
        
        if($request["materi"] != NULL){
        $jml_soal = count($request["materi"]);
      
        $i=0;
        while($i < $jml_soal){
            $soal_praktek[$i]= 
            [
                'm'=> $request["materi"][$i],
                's'=> $request["soal"][$i],
            ];
            $i++;
        }
    }else{
        $soal_praktek[0]= 
        [
            'm'=> '',
            's'=> '',
        ];
    }
    
        $soal_praktek_save = json_encode($soal_praktek);
 
        $soal-> soal_praktek = $soal_praktek_save;
        $soal->save();
        $success_output = 'ok';
        $output=[
            'success' => $success_output
        ];
        return back();
    }

    public function hapusbanksoal($id)
    {
        $username= Auth::user()->username;
        $id_cikgu=Cikgu::where('username',"$username")->first();
        $ujian = new Banksoal();
        $ujian = Banksoal::find($id);
      
        $ujian -> delete($id_cikgu->id_cikgu);
        
        return "Alhamdulilah Bank Soal berhasil di hapus";
    
    }


    public function preview($id)
    {
        
        $username= Auth::user()->username;
        $id_cikgu=Cikgu::where('username',"$username")->first();
        $banksoal = DB::table('banksoals')
        ->leftjoin('mapels','mapels.id_subject','=','banksoals.id_subject')
        ->leftjoin('cikgus','cikgus.id_cikgu','=','banksoals.id_cikgu')
 
        ->where('id',$id)
        ->where('banksoals.id_cikgu',$id_cikgu->id_cikgu)->get()[0];
        $soal1=$banksoal->soal1;
        $soal2=$banksoal->soal2;
        $soal3=$banksoal->soal3;
        $soals1=json_decode($soal1);
        $soals2=json_decode($soal2);
        $soals3=json_decode($soal3);
        

        return view('guru.preview-teori',['banksoals'=>$banksoal,'soals1'=>$soals1,'soals2'=>$soals2,'soals3'=>$soals3]);
    }

    public function pdf($id)
    {
        $username= Auth::user()->username;
        $id_cikgu=Cikgu::where('username',"$username")->first();
        $banksoal = DB::table('banksoals')
        ->leftjoin('mapels','mapels.id_subject','=','banksoals.id_subject')
        ->leftjoin('cikgus','cikgus.id_cikgu','=','banksoals.id_cikgu')
       
        ->where('id',$id)
        ->where('banksoals.id_cikgu',$id_cikgu->id_cikgu)->get()[0];
        $soal1=$banksoal->soal1;
        $soal2=$banksoal->soal2;
        $soal3=$banksoal->soal3;
        $soals1=json_decode($soal1);
        $soals2=json_decode($soal2);
        $soals3=json_decode($soal3);
        
        $pdf = PDF::loadview('guru.preview-teori',['banksoals'=>$banksoal,'soals1'=>$soals1,'soals2'=>$soals2,'soals3'=>$soals3]);
        return $pdf->stream();
    }
}

