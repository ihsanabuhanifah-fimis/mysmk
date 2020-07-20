<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Upload_file;
use Illuminate\Support\Facades\Auth;
use App\Cikgu;
use App\Student;

class UploadFileController extends Controller
{
    public function uploadFile()
    {
        return view('guru.uploadfile');
    }

    public function StoreUploadFile(Request $request)
    {
      
        request()->validate([
             'gambar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        
        if ($files = $request->file('gambar')) {
            
           // for save original image
            $extFile = $request['gambar']->getClientOriginalExtension();
            $namaFile = time().".".$extFile;
           
          
           

           
            if(auth()->user()->hasRole('guru')){ $username= Auth::user()->username;
            $id_cikgu=Cikgu::where('username',"$username")->first();
             $photo = new Upload_file();
             $photo-> gambar = $namaFile;
             $photo-> id_cikgu = $id_cikgu->id_cikgu;
             $photo->save();
             $request['gambar']->move(public_path('images'), $namaFile);
             return '/images/'.$namaFile; 
            } elseif(auth()->user()->hasRole('siswa')){
              
                $username= Auth::user()->username;
               
                $nis=Student::where('username',"$username")->first();
              
                $photo = new Upload_file();
                $photo-> gambar = $namaFile;
              
                $photo-> id_cikgu = $nis->nis;
                $request['gambar']->move(public_path('images'), $namaFile);
                $photo->save();
                return '/images/'.$namaFile; 
            }
            
         }
        
        
        
       }

    public function media()
    {
        return view('media');
    }
}

