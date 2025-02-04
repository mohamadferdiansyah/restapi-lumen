<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class InboundStuffResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'stuff' => $this->stuff,
            'stuff_stock' => $this->stuff->stuffStock,
            'total' => $this->total,
            'date_time' => $this->date_time,
            'proof_file' => $this->proof_file,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'deleted_at' => $this->deleted_at,
        ];
    }
}