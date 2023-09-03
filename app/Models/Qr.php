<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Qr extends Model
{
    use HasFactory;

    protected $fillable = [
        'disk',
        'path',
        'qrable_id',
        'qrable_type',
    ];

    public function qrable(): MorphTo
    {
        return $this->morphTo();
    }
}
