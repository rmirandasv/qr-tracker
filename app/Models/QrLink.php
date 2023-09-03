<?php

namespace App\Models;

use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphOne;

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

    public function group(): BelongsTo
    {
        return $this->belongsTo(QrLinkGroup::class, 'qr_link_group_id');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function qr(): MorphOne
    {
        return $this->morphOne(Qr::class, 'qrable');
    }

    public function scopeOfUser(Builder $query, $userId)
    {
        return $query->where('user_id', $userId);
    }
}
