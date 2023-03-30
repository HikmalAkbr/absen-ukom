<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Unggah;
use File;

class UnggahController extends Controller
{
    public function upload(Request $request){
        $Unggah = Unggah::get();
        return view('form-unggah', compact('Unggah'));
    }

    public function proses_upload(Request $request){
		$this->validate($request, [
			'file' => 'required|file|image|mimes:jpeg,png,jpg|max:2048',
			'keterangan' => 'required',
			'tanggal_upload' => 'required',
		]);
 
		// menyimpan data file yang diupload ke variabel $file
		$file = $request->file('file');
 
		$nama_file = time()."_".$file->getClientOriginalName();
 
      	        // isi dengan nama folder tempat kemana file diupload
		$tujuan_upload = 'data_file2';
		$file->move($tujuan_upload,$nama_file);
 
		Unggah::create([
			'file' => $nama_file,
			'keterangan' => $request->keterangan,
            'tanggal_upload' => $request->tanggal_upload,
		]);
 
		return redirect()->back();
	}

    public function hapus($id){
        // hapus file
        $Unggah = Unggah::where('id',$id)->first();
        File::delete('data_file2/'.$Unggah->file);
     
        // hapus data
        Unggah::where('id',$id)->delete();
     
        return redirect()->back();
    }
}
    


