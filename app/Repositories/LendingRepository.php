<?php

namespace App\Repositories;

use App\Models\Lending;
use App\Models\StuffStock;

class LendingRepository
{
    public function checkStock(array $data)
    {
        $stuffStock = StuffStock::where('stuff_id', $data['stuff_id'])->first();

        if ($data['total_stuff'] > $stuffStock['total_available']) {
            return response()->json('Jumlah yang dipinjam lebih dari yang tersedia', 400)->send();
            exit();
        } else {
            return NULL;
        }
    }

    public function store(array $data)
    {
        // return Lending::create($data);
        $lending = Lending::create($data);
        $stuffStock = StuffStock::where('stuff_id', $data['stuff_id'])->first();

        

    }
}
