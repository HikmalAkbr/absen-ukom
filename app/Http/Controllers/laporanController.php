<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Services\laporanService;
use App\Models\laporan;
use DB;

class laporanController extends Controller
{
    protected $laporanService;

    public function __construct(laporanService $laporanService)
    {
        // dd("testbrow");
        $this->laporanService = $laporanService;
    }

    public function index()
    {
        $laporan = $this->laporanService->all();
        return view('laporan.index', compact('laporan'));
    }

    public function show($id)
    {
        $laporan = $this->laporanService->find($id);
        return view('', compact('laporan'));
    }

    public function create()
    {
        return view('laporan.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'jam_input' => 'required',
            'jurnal' => 'required'
        ]);
        
        $laporan = $this->laporanService->create($data);
        return redirect()->route('laporan.index');
    }

    public function edit($id)
    {
        $laporan = $this->laporanService->find($id);
        return view('laporan.edit', compact('laporan'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->only([
            'jam_input',
            'jurnal', 
        ]);
        $laporan = $this->laporanService->update($data, $id);
        return redirect()->route('laporan.index');
    }

    public function destroy($id)
    {
        $this->laporanService->delete($id);
        return redirect()->route('laporan.index');
    }

    // function convertObjectToArray($jurnal) {
    //     $array = get_object_vars($jurnal);
    //     return $array;
    // }
}
