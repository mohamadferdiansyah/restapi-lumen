<?php

namespace App\Services;

use App\Repositories\StuffStockRepository;

class StuffStockService
{
    private $stuffStockRepository;

    public function __construct(StuffStockRepository $stuffStockRepository)
    {
        $this->stuffStockRepository = $stuffStockRepository;
    }

    public function update(array $data)
    {
        return $this->stuffStockRepository->update($data);
    }

}