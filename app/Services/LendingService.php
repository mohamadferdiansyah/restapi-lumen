<?php

namespace App\Services;

use App\Repositories\LendingRepository;
use App\Repositories\StuffStockRepository;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class LendingService{
    private $lendingRepository;
    private $stuffStockRepository;

    public function __construct(LendingRepository $lendingRepository, StuffStockRepository $stuffStockRepository){
        $this->lendingRepository = $lendingRepository;
    }

    public function check(array $data){
        return $this->lendingRepository->checkStock($data);
    }

    public function store(array $data){
        $payload = [
            'stuff_id' => $data['stuff_id'],
            'date_time' => Carbon::now(),
            'name' => $data['name'],
            'user_id' => Auth::user()->id,
            'notes' => $data['notes'] ?? null,
            'total_stuff' => $data['total_stuff'],
        ];

        $lending = $this->lendingRepository->store($payload);
        
        return $lending;
    }
}