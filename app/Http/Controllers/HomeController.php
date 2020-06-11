<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use App\User;
use App\Jadwal;
use App\Student_rombel;
use App\Student;
use App\Model_has_role;
use App\Rombel;
use App\Cikgu;
use App\Mapel;
use App\Materi;
use App\Banksoal;
use App\Bab;
use App\Ta;
use App\Jenis_ujian;
use App\Tipe_ujian;
use App\Kbm;
use App\Wali;
use App\Penilaian;
use App\Providers;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
      
        if(auth()->user()->hasRole('admin')){  
            return view('admin.index');
          }elseif(auth()->user()->hasRole('guru')){
            $days =date('l');
            
            $username= Auth::user()->username;
            $id_cikgu=Cikgu::where('username',"$username")->first();
            
            
            $rombel = DB::table('rombels')->get();
            $babs = DB::table('babs')->get();
            $subject = DB::table('mapels')->get();
            $ujian = DB::table('jenis_ujians')->get();
            $tipe = DB::table('tipe_ujians')->get();
            $user=User::where('username',"$username")->first();
            return view('guru.index',['user'=>$user,'babs'=>$babs, 'rombels'=>$rombel,'subjects'=>$subject,
            'tipes'=>$tipe, 'ujians'=>$ujian]);
            
          }elseif(auth()->user()->hasRole('siswa')){
            return view('siswa.index');
          }elseif(auth()->user()->hasRole('wali')){
              return view('wali.index');
          }else{
            
            $username= Auth::user()->email;
            $data = DB::table('users')
           ->where('email',$username)
            ->get()[0];
            return view('nonactive',['data'=>$data]);
        }
        
        }
    //Menu Admin
        public function user()
        {
            // return view('admin.users');
            if(auth()->user()->hasRole('admin')){  
                
               
            $users=User::all();
            //ketika method user di akses, maka ambil semua data di table users dengan methode User::all();
            return view('admin.users',['users'=>$users]);
                 }else{
            return view('home');
            }
        }
    //Menu Admin
    public function edit($id)
    {
        $result=User::find($id);
        return view('admin.edit',['user'=>$result]);
    }


    public function data_diri(request $request){

        $users = DB::table('users')
        ->where('email',$request["email"])
        ->get();

        if($users[0]->secret_number == "KMX787762XJ#$"){
        $wali= new Wali();   
        $username= Auth::user()->username;
        $wali-> email=$request["email"];
        $wali-> name=$request["nama_santri"];
        $wali-> nisn=$request["nisn"];
        $wali-> hubungan=$request["hubungan"];
        auth()->user()->assignRole('wali');
        $wali->save();
        return "Alhamdulilah data berhasil tersimpan, silahkan reload untuk masuk menu utama";
        
        }else if($users[0]->secret_number == "KMX78665@J#$"){
           
            $cikgu= new Cikgu();   
            $username= Auth::user()->username;
     
            $validateData = $request->validate([
            'cikgu_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:cikgus'],
            'username'=>['required', 'string', 'max:255', 'unique:cikgus'],
            'tempat'=>['required'],
            'tanggal'=>['required','max:2'],
            'bulan'=>['required','max:2'],
            'tahun'=>['required','max:4'],
            'status'=>['required'],
           
            'tahun2'=>['required'],
            'bulan2'=>['required']
        ]);
      
            $cikgu= new Cikgu();   
            $cikgu-> email=  $validateData["email"];
            $cikgu-> username=  $validateData["username"];
            $cikgu-> cikgu_name=  $validateData['cikgu_name'];
          
            $cikgu-> status=  $validateData["status"];
            $cikgu-> tempat=  $validateData["tempat"];
            $cikgu-> tanggal=  $validateData["tanggal"];
            $cikgu-> bulan=  $validateData["bulan"];
            $cikgu-> tahun=  $validateData["tahun"];
           
            $cikgu-> bulan2=$validateData["bulan2"];
            $cikgu-> tahun2=$validateData["tahun2"];
         
           
           
            $cikgu->save();
            auth()->user()->assignRole('guru');
            return "Alhamdulilah data berhasil tersimpan, silahkan reload untuk masuk menu utama";
        }else{
            return "ok";
        }
       


    
       
    }
    // public function guru()
    // {
    //     $username ="ihsans";
    //     $result=User::where('username','ihsans')->get();
    //     return view('guru.index2',['guru'=>$result]);
        
    //     }
}
