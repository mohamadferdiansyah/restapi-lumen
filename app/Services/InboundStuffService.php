<?php

namespace App\Services;

use App\Repositories\InboundStuffRepository;
use Carbon\Carbon;

class InboundStuffService
{
    private $inboundStuffRepository;

    public function __construct(InboundStuffRepository $inboundStuffRepository)
    {
        $this->inboundStuffRepository = $inboundStuffRepository;
    }

    public function store($data)
    {
        if($data->file('proof_file')){
            $imageLink = $this->inboundStuffRepository->uploadImage($data->file('proof_file'));
        }

        $inboundStuff = [
            'stuff_id' => $data->stuff_id,
            'total' => $data->total,
            'date_time' => Carbon::now(),
            'proof_file' => $imageLink 
        ];

        $store = $this->inboundStuffRepository->storeNewInboud($inboundStuff);
        return $store;
    }

    public function delete($id)
    {
        return $this->inboundStuffRepository->delete($id);
    }
}