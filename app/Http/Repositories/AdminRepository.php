<?php

namespace App\Http\Repositories;

use App\Models\mahasiswa;

class AdminRepository  {
    protected $mahasiswa;
    
    public function __construct(){
        $this->mahasiswa = New Mahasiswa;
    }

    public function all()
    {
        return $this->mahasiswa->all();
    }

    public function findById($value, $column = 'id_mahasiswa')
    {
        return $this->mahasiswa->where($column, $value)->first();
        // $mahasiswa = $this->mahasiswa->where('id_mahasiswa', $id)->first();
        // $mahasiswa->update($request->all());
        // return $mahasiswa>fresh();
    }

    public function create(array $data)
    {
        $mahasiswa = new $this->mahasiswa; 
        $mahasiswa->nama = $data['nama']; 
        $mahasiswa->jurusan = $data['jurusan']; 
        $mahasiswa->periode = $data['periode']; 
        $mahasiswa->email = $data['email']; 
        $mahasiswa->password = $data['password']; 
        $mahasiswa->save();
        return $mahasiswa;
        // return $this->mahasiswa->create($data);

    }

    public function save(array $mahasiswaData)
    {
        $mahasiswa = new $this->mahasiswa;
        $mahasiswa->nama = $mahasiswaData['nama'];
        $mahasiswa->jurusan = $mahasiswaData['jurusan'];
        $mahasiswa->periode = $mahasiswaData['periode'];
        $mahasiswa->email = $mahasiswaData['email'];
        $mahasiswa->password = $mahasiswaData['password'];
        $mahasiswa->save();
        return $mahasiswa->fresh();
    }

    public function update($mahasiswaData, $id)
    {
        $mahasiswa = $this->mahasiswa->find($id);
        // $mahasiswa->nama = $mahasiswaData['nama'];
        $mahasiswa->jurusan = $mahasiswaData['jurusan'];
        $mahasiswa->periode = $mahasiswaData['periode'];
        $mahasiswa->email = $mahasiswaData['email'];
        $mahasiswa->password = $mahasiswaData['password'];
        $mahasiswa->update();
        return $mahasiswa;
    }

    public function delete($id)
    {
        $mahasiswa = $this->mahasiswa->find($id);
        // dd($this->mahasiswa->find($id));
        $mahasiswa->delete();
    }
}
?>