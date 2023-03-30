<?php
namespace App\Http\Services;

use App\Http\Repositories\AdminRepository;

class AdminService
{
    protected $adminRepository;

    public function __construct(AdminRepository $adminRepository)
    {
        $this->adminRepository = $adminRepository;
    }

    public function all()
    {
        // dd($this->adminRepository->getAll());
        return $this->adminRepository->all();
    }
 
    public function findById($id)
    {
        return $this->adminRepository->findById($id, 'id_mahasiswa');
    }

    public function find($id)
    {
        return $this->adminRepository->find($id, 'id_mahasiswa');
    }

    public function create(array $data)
    {
        return $this->adminRepository->create($data);
    }

    public function update($mahasiswaData, $id)
    {
        return $this->adminRepository->update($mahasiswaData, $id);
    }

    public function delete($id)
    {
        return $this->adminRepository->delete($id);
    }
}
?>