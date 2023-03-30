<?php

namespace App\Http\Repositories;

use App\Models\Chirp;
use App\Models\User;

class ChirpRepository
{
    /**
     * @var Chirp
     */
    protected $chirp;

    /**
     * ChirpRepository constructor.
     *
     * @param Chirp $chirp
     */
    public function __construct(Chirp $chirp)
    {
        $this->chirp = $chirp;
    }

    public function save($datau)
    {

        $chirp = new $this->chirp;
        $user = User::find(1); // Replace with the appropriate user
        $chirp = $user->chirps()->create($datau);
        return $chirp->fresh();

    }
}
