<?php
namespace App\Http\Services;

use App\Http\Repositories\laporanRepository;

class laporanService
{
    protected $laporanRepository;

    public function __construct(laporanRepository $laporanRepository)
    {
        $this->laporanRepository = $laporanRepository;
    }

    public function all()
    {
        // dd($this->laporanRepository->all());
        return $this->laporanRepository->all();
    }

    public function find($id)
    {
        return $this->laporanRepository->find($id);
    }

    public function findById($id)
    {
        return $this->laporanRepository->findById($id);
    }

    public function create(array $data)
    {
        return $this->laporanRepository->create($data);
    }

    public function update($data, $id)
    {
        return $this->laporanRepository->update($data, $id);
    }

    public function delete($id)
    {
        return $this->laporanRepository->delete($id);
    }
    
}
