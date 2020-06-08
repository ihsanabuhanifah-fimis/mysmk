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
use App\Ta;
use App\Jenis_ujian;
use App\Tipe_ujian;
use App\Kbm;
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
            auth()->user()->assignRole('nonuser');
            return view('nonactive');
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

    // public function guru()
    // {
    //     $username ="ihsans";
    //     $result=User::where('username','ihsans')->get();
    //     return view('guru.index2',['guru'=>$result]);
        
    //     }
}
