<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FileUploadController extends Controller
{
    public function fileUpload()
    {
        return view('guru.file-upload');
    }

    public function prosesFileUpload(Request $request)
    {
    
        $this->validate($request, [
			'file' => 'required|file|image|max:1000',
			
		]);
 
      
        // menyimpan data file yang diupload ke variabel $file
    $extFile = $request->file->getClientOriginalName();
    $namaFile = time()."-".$extFile;
    $path = $request->file->move('image',$namaFile);
    $pathBaru = asset('image/'.$namaFile);
    echo "Proses upload berhasil, file berada di: <a href='$pathBaru'>$pathBaru</a>";
      	//         // nama file
		// echo 'File Name: '.$file->getClientOriginalName();
		// echo '<br>';
 
      	//         // ekstensi file
		// echo 'File Extension: '.$file->getClientOriginalExtension();
		// echo '<br>';
 
      	//         // real path
		// echo 'File Real Path: '.$file->getRealPath();
		// echo '<br>';
 
      	//         // ukuran file
		// echo 'File Size: '.$file->getSize();
		// echo '<br>';
 
      	//         // tipe mime
		// echo 'File Mime Type: '.$file->getMimeType();
 
      	//         // isi dengan nama folder tempat kemana file diupload
		// $tujuan_upload = 'data_file';
 
        //         // upload file
		// $file->move($tujuan_upload,$file->getClientOriginalName());
	
    }
}
