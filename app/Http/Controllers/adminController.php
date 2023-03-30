<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Services\AdminService;
use App\Models\mahasiswa;

class AdminController extends Controller
{
    protected $AdminService;

    public function __construct(AdminService $AdminService)
    {
        // dd("testbrow");
        $this->AdminService = $AdminService;
    }

    public function index(Request $request)
    {    
        // dd($this->AdminService->all());
        $mahasiswa = $this->AdminService->all();
        return view('admin.index', compact('mahasiswa'));
    }

    public function show($id)
    {
        // dd("testbrow");
        $mahasiswa = $this->AdminService->findById($id);
        return view('admin.index', compact('mahasiswa'));
    }

    public function create()
    {
        // dd("test");
        return view('admin.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nama' => 'required',
            'jurusan' => 'required',
            'periode' => 'required',
            'email' => 'required',
            'password' => 'required'
        ]);
        
        $mahasiswa = $this->AdminService->create($data);
        return redirect()->route('admin.index');
    }

    public function edit($id)
    {
        $mahasiswa = $this->AdminService->findById($id);
        return view('admin.edit', compact('mahasiswa'));
    }

    public function update(Request $request, $id)
    {
        $mahasiswaData = $request->only([
            // 'nama',
            'jurusan',
            'periode',
            'email' ,
            'password'
        ]);
        $mahasiswa = $this->AdminService->update($mahasiswaData, $id);
        return redirect()->route('admin.index', ['id' => $mahasiswa->id_mahasiswa])->with('success', 'Produk berhasil diupdate.');
    }

    public function destroy($id)
    {   
        $this->AdminService->delete($id);
        return redirect()->route('admin.index');
    }
}
?>