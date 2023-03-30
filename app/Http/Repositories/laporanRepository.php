<?php

namespace App\Http\Repositories;

use App\Models\laporan;

class laporanRepository  {
    protected $laporan;
    
    public function __construct(){
        $this->laporan = New laporan;
    }

    public function all()
    {
        // dd($this->absen->all());
        return $this->laporan->all();
    }

    public function bebas(array $data)
    {
        $laporan = new $this->laporan;
        $laporan->jam_input = $data['jam_input'];
        $laporan->jurnal = $data['jurnal'];
        $laporan->save();

        return $laporan;
    }

    public function find($id)
    {
        return $this->laporan->find($id);
    }

    public function findById($id, $request)
    {
        $laporan = $this->laporan->where('id_jurnal', $id)->first();
        $laporan->update($request->all());
        return $laporan->fresh();
    }

    public function create($data)
    {
        return $this->laporan->create($data);
    }

    public function update($data, $id)
    {
        $laporan = $this->laporan->find($id);
        $laporan->jam_input = $data['jam_input'];
        $laporan->jurnal = $data['jurnal'];
        $laporan->update();
    }

    public function delete($id)
    {
        $laporan = $this->laporan->find($id);
        $laporan->delete($id);
    }

    
    
}
