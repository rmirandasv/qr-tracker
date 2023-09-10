<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QrLinkVisit extends Model
{
    use HasFactory;

    protected $fillable = [
        'qr_link_id',
        'ip_address',
        'user_agent',
    ];
}
