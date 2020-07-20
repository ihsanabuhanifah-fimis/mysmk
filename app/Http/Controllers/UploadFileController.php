<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Upload_file;
use Illuminate\Support\Facades\Auth;
use App\Cikgu;

class UploadFileController extends Controller
{
    public function uploadFile()
    {
        return view('guru.uploadfile');
    }

    public function StoreUploadFile(Request $request)
    {
        $username= Auth::user()->username;
        $id_cikgu=Cikgu::where('username',"$username")->first();
        $validator = Validator::make($request->all(), [
      
        'gambar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:100',
      ]);

      if ($validator->passes()) {
        $input = $request->all();
        $input['id_cikgu']= $id_cikgu->id_cikgu;
        $input['gambar'] = time().'.'.$request->gambar->getClientOriginalExtension();
        $request->gambar->move(public_path('gambar'), $input['gambar']);
        $path= asset('/gambar/'.$input["gambar"]);

        Upload_file::create($input);
        return response()->json(['gambar'=>$input['gambar']]);
      }

      return response()->json(['error'=>$validator->errors()->all()]);
    }

    public function media()
    {
        return view('media');
    }
}

