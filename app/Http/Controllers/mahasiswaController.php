<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use App\Models\absen;
use Illuminate\Http\RedirectResponse;
use App\Http\Services\AbsenService;
use DB;

class mahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    protected $AbsenService;
    public function __construct(AbsenService $AbsenService)
    {
        $this->AbsenService = $AbsenService;
    }


    public function index()
    {
        $absens = $this->AbsenService->getAll();
        return view('mahasiswa.index', compact('absens'));
        // // dd('test');
        // $katakunci = $request->katakunci;
        // $jumlahbaris = 4;
        
        // if(strlen($katakunci)){
        //     $mhs = absen::where('nama', 'like', "%$katakunci%")
        //                     ->orWhere('jurusan', 'like', "%$katakunci%")
        //                     ->paginate($jumlahbaris);
        // }else{
        // $mhs = absen::orderby('nama', 'desc')->paginate(5);
        // }
        // return view('mahasiswa/index', ['mhs' => $mhs]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('mahasiswa/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',  
            'jurusan' => 'required',
            'tanggal_absen' => 'required',

            'status' => 'required',
        ]);

        $mhs = [
            'nama' => $request->nama,
            'jurusan'=> $request->jurusan,
            'tanggal_absen' => $request->tanggal_absen,
            'jam_masuk' => $request->jam_masuk,
            'status' => $request->status,
        ];
        absen::create($mhs);
        return redirect()->route('mahasiswa.create')
                    ->with('success', 'Data berhasil disimpan.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $mhs = absen::where('nama',$id)->get();
        return view('mahasiswa.edit')->with('mhs', $mhs);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',  
            'jurusan' => 'required',
            'tanggal_absen' => 'required',
            // 'jam_masuk' => 'required',
            'status' => 'required',
        ]);
        $mhs = [
            'nama' => $request->nama,
            'jurusan' => $request->jurusan,
            'tanggal_absen' => $request->tanggal_absen,
            'jam_masuk' => $request->jam_masuk,
            
            'status' => $request->status,
        ];
        absen::where('nama',$id)->update($mhs);
        return redirect()->to('mahasiswa')->with('success', 'Berhasil di update');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        absen::where('tanggal_absen', $id)->delete();
        return redirect()->to('mahasiswa')->with('success', 'Berhasil menghapus mhs');
    }
}
