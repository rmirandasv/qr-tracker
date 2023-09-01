<?php

namespace App\Models;

use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QrLinkGroup extends Model
{
    use HasFactory;

    public function scopeOfUser(Builder $query, $userId)
    {
        return $query->where('user_id', $userId);
    }
}
