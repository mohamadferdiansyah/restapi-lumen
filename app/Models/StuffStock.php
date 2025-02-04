<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class StuffStock extends Model
{
    use HasFactory, HasUuids, SoftDeletes;

    protected $fillable = [
        'stuff_id',
        'total_avaliable',
        'total_defec'
    ];

    public function stuff()
    {
        return $this->belongsTo(Stuff::class);
    }
}
