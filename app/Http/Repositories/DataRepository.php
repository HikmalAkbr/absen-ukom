<?php

namespace App\Http\Repositories;

use App\Models\Absen;

class AbsenRepository  {
    protected $absen;
    
    public function __construct(){
        $this->absen = New Absen;
    }

    public function create(array $data)
    {
    return Data::create($data);
    }   
}
