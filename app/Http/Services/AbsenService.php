<?php
namespace App\Http\Services;

use App\Http\Repositories\AbsenRepository;

class AbsenService
{
    protected $absenRepository;

    public function __construct(AbsenRepository $absenRepository)
    {
        $this->absenRepository = $absenRepository;
    }

    public function getAll()
    {
        // dd($this->absenRepository->getAll());
        return $this->absenRepository->getAll();
    }

    public function find($id)
    {
        return $this->absenRepository->find($id);
    }

    public function findById($id)
    {
        return $this->absenRepository->findById($id);
    }

    public function create(array $data)
    {
        return $this->absenRepository->create($data);
    }

    public function update($data, $id)
    {
        return $this->absenRepository->update($data, $id);
    }

    public function delete($id)
    {
        // $this->authorize('delete', $post);
        return $this->absenRepository->delete($id);
    }
    
}
