<?php
namespace App\Http\Services;

use App\Http\Repositories\presensiRepository;

class PresensiService
{
    protected $presensiRepository;

    public function __construct(presensiRepository $presensiRepository)
    {
        $this->presensiRepository = $presensiRepository;
    }

    public function getAll()
    {
        // dd($this->presensiRepository->getAll());
        return $this->presensiRepository->getAll();
    }

    public function find($id)
    {
        return $this->presensiRepository->find($id);
    }

    public function findById($id)
    {
        return $this->presensiRepository->findById($id);
    }

    public function create(array $data)
    {
        return $this->presensiRepository->create($data);
    }

    public function update($data, $id)
    {
        return $this->presensiRepository->update($data, $id);
    }

    public function delete($id)
    {
        // $this->authorize('delete', $post);
        return $this->presensiRepository->delete($id);
    }
    
}
