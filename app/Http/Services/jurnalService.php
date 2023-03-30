<?php
namespace App\Http\Services;

use App\Http\Repositories\jurnalRepository;

class jurnalService
{
    protected $jurnalRepository;

    public function __construct(jurnalRepository $jurnalRepository)
    {
        $this->jurnalRepository = $jurnalRepository;
    }

    public function all()
    {
        // dd($this->jurnalRepository->all());
        return $this->jurnalRepository->all();
    }

    public function find($id)
    {
        return $this->jurnalRepository->find($id);
    }

    public function findById($id)
    {
        return $this->jurnalRepository->findById($id);
    }

    public function create(array $data)
    {
        return $this->jurnalRepository->create($data);
    }

    public function update($data, $id)
    {
        return $this->jurnalRepository->update($data, $id);
    }

    public function delete($id)
    {
        return $this->jurnalRepository->delete($id);
    }
    
}
