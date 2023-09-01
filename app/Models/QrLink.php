<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QrLink extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'url',
        'uuid',
        'qr_link_group_id',
        'description',
        'user_id',
    ];
}
