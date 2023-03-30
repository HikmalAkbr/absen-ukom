<?php

namespace App\Http\Repositories;

use App\Models\Absen;
use App\Http\Repositories\Post;
use App\Policies\PostPolicy;
use Illuminate\Auth\Access\HandlesAuthorization;

class AbsenRepository  {
    protected $absen;
    
    public function __construct(){
        $this->absen = New Absen;
    }

    public function getAll()
    {
        // dd($this->absen->all());
        return $this->absen->all();
    }

    public function bebas(array $data)
    {
        $absen = new $this->absen;
        $absen->nama = $data['nama'];
        $absen->jurusan = $data['jurusan'];
        // $absen->tanggal_masuk = $data['tanggal_masuk'];
        // $absen->jam_masuk = $data['jam_masuk'];
        $absen->status = $data['status'];
        $absen->save();

        return $absen;
    }

    public function find($id)
    {
        return $this->absen->find($id);
    }

    public function findById($id, $request)
    {
        $absen = $this->absen->where('id_absen', $id)->first();
        $absen->update($request->all());
        return $produk->fresh();
    }

    public function create($data)
    {
        return $this->absen->create($data);
    }

    public function update($data, $id)
    {
        // $absen = Post::findOrFail($id);
        // $this->authorize('update', $absen);

        $absen = $this->absen->find($id);
        // $absen->nama = $data['nama'];
        $absen->jurusan = $data['jurusan'];
        $absen->status = $data['status'];
        $absen->update();
    }

    public function delete($id)
    {
        $absen = $this->absen->find($id);
        $absen->delete($id);
    }

    
    
}
