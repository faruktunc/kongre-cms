<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Session extends Model
{
    use HasFactory;

    protected $table = 'conference_sessions';

    protected $fillable = [
        'event_id',
        'title',
        'description',
        'date',
        'start_time',
        'end_time',
        'speakers',
        'order',
        'is_active',
    ];

    protected function casts(): array
    {
        return [
            'speakers' => 'array',
            'is_active' => 'boolean',
            'order' => 'integer',
        ];
    }

    public function scopeActive(Builder $query): Builder
    {
        return $query->where('is_active', true);
    }

    public function event(): BelongsTo
    {
        return $this->belongsTo(Event::class);
    }
}
