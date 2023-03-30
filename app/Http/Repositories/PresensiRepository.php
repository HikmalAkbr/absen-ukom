<?php

namespace App\Http\Repositories;

use App\Models\Presensi;
use App\Http\Repositories\Post;
use App\Policies\PostPolicy;
use Illuminate\Auth\Access\HandlesAuthorization;

class PresensiRepository  {
    protected $Presensi;
    
    public function __construct(){
        $this->Presensi = New Presensi;
    }

    public function getAll()
    {
        // dd($this->absen->all());
        return $this->Presensi->all();
    }

    public function bebas(array $data)
    {
        $Presensi = new $this->Presensi;
        $Presensi->nama = $data['nama'];
        $Presensi->jurusan = $data['jurusan'];
        // $Presensi->tanggal_masuk = $data['tanggal_masuk'];
        // $Presensi->jam_masuk = $data['jam_masuk'];
        $Presensi->status = $data['status'];
        $Presensi->save();

        return $Presensi;
    }

    public function find($id)
    {
        return $this->Presensi->find($id);
    }

    public function findById($id, $request)
    {
        $Presensi = $this->Presensi->where('id_absen', $id)->first();
        $Presensi->update($request->all());
        return $produk->fresh();
    }

    public function create($data)
    {
        return $this->Presensi->create($data);
    }

    public function update($data, $id)
    {
        // $Presensi = Post::findOrFail($id);
        // $this->authorize('update', $Presensi);

        $Presensi = $this->Presensi->find($id);
        $Presensi->nama = $data['nama'];
        $Presensi->jurusan = $data['jurusan'];
        // $Presensi->tanggal_absen = $data['tanggal_absen'];
        // $Presensi->jam_masuk = $data['jam_masuk'];
        $Presensi->status = $data['status'];
        $Presensi->update();
    }

    public function delete($id)
    {
        $Presensi = $this->Presensi->find($id);
        $Presensi->delete($id);
    }

    
    
}
