<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Services\jurnalService;
use App\Models\jurnal;
use DB;

class jurnalController extends Controller
{
    protected $jurnalService;

    public function __construct(jurnalService $jurnalService)
    {
        // dd("testbrow");
        $this->jurnalService = $jurnalService;
    }

    public function index()
    {
        $jurnal = $this->jurnalService->all();
        return view('jurnal.index', compact('jurnal'));
    }

    public function show($id)
    {
        $jurnal = $this->jurnalService->find($id);
        return view('', compact('jurnal'));
    }

    public function create()
    {
        return view('jurnal.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'jam_input' => 'required',
            'jurnal' => 'required'
        ]);
        
        $jurnal = $this->jurnalService->create($data);
        return redirect()->route('jurnal.index');
    }

    public function edit($id)
    {
        $jurnal = $this->jurnalService->find($id);
        return view('jurnal.edit', compact('jurnal'));
    }

    public function update(Request $request, $id)
    {
        $data = $request->only([
            'jam_input',
            'jurnal', 
        ]);
        $jurnal = $this->jurnalService->update($data, $id);
        return redirect()->route('jurnal.index');
    }

    public function destroy($id)
    {
        $this->jurnalService->delete($id);
        return redirect()->route('jurnal.index');
    }

    // function convertObjectToArray($jurnal) {
    //     $array = get_object_vars($jurnal);
    //     return $array;
    // }
}
