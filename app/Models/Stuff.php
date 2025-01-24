<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stuff extends Model
{
    use HasFactory;
    use HasUuids;

    protected $fillable = [
        'name',
        'type'
    ];

    public const HTL_KLN = 'HTL/KLN';
    public const LAB = 'Lab';
    public const SARPRAS = 'Sarpras';
}
