<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Services\PresensiService;
use App\Models\Presensi;
use Illuminate\Support\Facades\Gate;
use DB;

class PresensiController extends Controller
{
    protected $PresensiService;

    public function __construct(PresensiService $PresensiService)
    {
        // dd("testbrow");
        $this->PresensiService = $PresensiService;
    }

    public function login(Request $request)
{
    $credentials = $request->only('id', 'email', 'password');
    
    if (Auth::attempt($credentials)) {
        $user = Auth::user();
        session()->put('user_id', $user->id);
        session()->put('user_level', $user->level);
        return redirect('/mahasiswa2');
    } else {
        return redirect('/login')->withErrors('Invalid login credentials');
    }
}


    public function index()
    {
        $Presensi = $this->PresensiService->getAll();
        // $Presensi = Absen::paginate(5);
        return view('mahasiswa2.index', compact('Presensi'));
    }

    public function show($id)
    {
        
    }

    public function create()
    {
        return view('mahasiswa2.create');
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
        
        $Presensi = $this->PresensiService->create($data);
        return redirect()->route('mahasiswa2.index');
    }

    public function edit($id)
    {
        $Presensi = $this->PresensiService->find($id);
        return view('mahasiswa2.edit', compact('Presensi'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->only([
            'nama',
            'jurusan', 
            // 'tanggal_absen', 
            // 'jam_masuk', 
            'status'
        ]);
        $Presensi = $this->PresensiService->update($data, $id);
        return redirect()->route('mahasiswa2.index');
    }

    public function destroy($id)
    {
        if (Gate::denies('access-admin-panel')) {
            Gate::define('access-admin-panel', function ($user) {
                return $user->level === 1;
            });
         } else {
            Gate::define('access-user-panel', function ($user) {
                return $user->level === 0;
            });
         }
        $this->PresensiService->delete($id);
        return redirect()->route('mahasiswa2.index');
    }

}
