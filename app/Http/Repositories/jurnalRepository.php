<?php

namespace App\Http\Repositories;

use App\Models\jurnal;

class jurnalRepository  {
    protected $jurnal;
    
    public function __construct(){
        $this->jurnal = New Jurnal;
    }

    public function all()
    {
        // dd($this->absen->all());
        return $this->jurnal->all();
    }

    public function bebas(array $data)
    {
        $jurnal = new $this->jurnal;
        $jurnal->jam_input = $data['jam_input'];
        $jurnal->jurnal = $data['jurnal'];
        $jurnal->save();

        return $jurnal;
    }

    public function find($id)
    {
        return $this->jurnal->find($id);
    }

    public function findById($id, $request)
    {
        $jurnal = $this->jurnal->where('id_jurnal', $id)->first();
        $jurnal->update($request->all());
        return $jurnal->fresh();
    }

    public function create($data)
    {
        return $this->jurnal->create($data);
    }

    public function update($data, $id)
    {
        $jurnal = $this->jurnal->find($id);
        $jurnal->jam_input = $data['jam_input'];
        $jurnal->jurnal = $data['jurnal'];
        $jurnal->update();
    }

    public function delete($id)
    {
        $jurnal = $this->jurnal->find($id);
        $jurnal->delete($id);
    }

    
    
}
