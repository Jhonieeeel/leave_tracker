<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Leave extends Model
{
    protected $fillable = [
        'user_id',
        'event_type',
        'leave_type',
        'balance',
        'starts_at',
        'ends_at',
        'event_tag'
    ];

    protected $casts = [
        'starts_at' => 'datetime',
        'ends_at' => 'datetime',
        'balance' => 'decimal:3'
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    // data
    public function scopeFromDate(Builder $query, Carbon $date): Builder
    {
        return $query->where('starts_at', '>=', $date);
    }
}
