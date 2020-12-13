<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

use App\Laporan;

class UploadController extends Controller
{
    public function upload(){
		$kelas = \App\Kelas::all();
		$jurusans = \App\Jurusan::all();
		
        return view('laporan.create', ['kelases' => $kelas, 'jurusans' => $jurusans]);
	}

	public function laporan(){
		$lapor = \App\laporan::all();
		return view('laporan/index', compact('lapor'));
	}

	public function proses_upload(Request $request){
		$pengajuans = new \App\Laporan;
		
		$this->validate($request, [
			'nama' => 'required',
			'jurusan' => 'required',
			'file'    => 'required',
		]);
 
		// menyimpan data file yang diupload ke variabel $file
		$file = $request->file('file');

		$nama_file = time()."_".$file->getClientOriginalName();

      	 // isi dengan nama folder tempat kemana file diupload
		$tujuan_upload = 'uploads';
 
        // upload file
		$file->move($tujuan_upload,$nama_file);

		$pengajuans->user_id = $request->nama;
        $pengajuans->jurusan = $request->jurusan;
		$pengajuans->file = $nama_file;
		
		$pengajuans->save();

		return redirect('/upload')->with(['success' => 'Laporan berhasil di kirim']);
	}
}
