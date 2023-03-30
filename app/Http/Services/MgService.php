<?php

namespace App\Http\Services;

use App\Models\Chirp;
use App\Http\Repositories\ChirpRepository;
use Exception;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use InvalidArgumentException;

class ChirpService
{
    /**
     * @var ChirpRepository
     */

    protected $chirpRepository;
    /**
     * ChirpService constructor.
     *
     * @param ChirpRepository $chirpRepository
     */
    public function __construct(ChirpRepository $chirpRepository)
    {
        $this->chirpRepository = $chirpRepository;
    }

    public function saveChirp($datau)
    {
        $validated = Validator::make($datau, [
            'message' => 'required|string|max:255',
        ]);
        if ($validated->fails()) {
            throw new InvalidArgumentException($validated->errors()->first());
        }
        $result = $this->chirpRepository->save($datau);
        return $result;
    }
}
