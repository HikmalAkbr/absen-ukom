<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Services\AbsenService;
use App\Models\Absen;
use App\Policies\PostPolicy;
use Illuminate\Support\Facades\Gate;
use DB;

class AbsenController extends Controller
{
    protected $AbsenService;

    public function __construct(AbsenService $AbsenService)
    {
        // dd("testbrow");
        $this->AbsenService = $AbsenService;
    }

    public function login(Request $request)
{
    $credentials = $request->only('id', 'email', 'password');
    
    if (Auth::attempt($credentials)) {
        $user = Auth::user();
        session()->put('user_id', $user->id);
        session()->put('user_level', $user->level);
        return redirect('/mahasiswa');
    } else {
        return redirect('/login')->withErrors('Invalid login credentials');
    }
}


    public function index()
    {
        $absen = $this->AbsenService->getAll();
        // $absen = Absen::paginate(5);
        return view('mahasiswa.index', compact('absen'));
    }

    public function show($id)
    {
        
    }

    public function create()
    {
        return view('mahasiswa.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nama' => 'required',
            'jurusan' => 'required',
            // 'tanggal_absen' => 'required',
            // 'jam_masuk' => 'required',
            'status' => 'required'
        ]);
        
        $absen = $this->AbsenService->create($data);
        return redirect()->route('mahasiswa.index');
    }

    public function edit($id)
    {
        $absen = $this->AbsenService->find($id);
        return view('mahasiswa.edit', compact('absen'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->only([
            'nama',
            'jurusan',  
            'status'
        ]);
        $absen = $this->AbsenService->update($data, $id);
        return redirect()->route('mahasiswa.index');
    }

    public function destroy(Request $request, $id)
    {
        // if (Gate::denies('isAuthor')) {
        $this->AbsenService->delete($id);
        return redirect()->route('mahasiswa.index');
        // } else {
        //     return redirect()->back()->with('alert', 'gabisa cuy wkwkwk');
        // }
    }

    // public function destroy(Request $request, $id)
    // {
        // $absen = Absen::find($Id);
        // if (Gate::denies('isAuthor', $absen)) {
        //     abort(403, 'Unauthorized action.');
        // }
        // $this->authorize('delete', $id);
        // $absen->delete();
        // return redirect()->route('mahasiswa.index')->with('success', 'Post has been deleted.');
    // }

    // public function destroy($id)
    // {
    //     $absen = Absen::find($id);
    //     if (Gate::denies('delete-post', $id)) {
    //         abort(403, 'Unauthorized action.');
    //     } else {
    //         $absen->delete();
    //         return redirect()->route('posts')->with('success', 'Post has been deleted successfully');
    //     }
    // }



}
