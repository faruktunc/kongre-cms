<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Board extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'slug', 'icon', 'members', 'order', 'is_active',
    ];

    protected function casts(): array
    {
        return [
            'members' => 'array',
            'is_active' => 'boolean',
            'order' => 'integer',
        ];
    }

    protected static function booted(): void
    {
        static::creating(function (Board $board): void {
            if (blank($board->slug)) {
                $board->slug = static::generateUniqueSlug($board->name);
            }
        });
    }

    public function scopeActive(Builder $query): Builder
    {
        return $query->where('is_active', true);
    }

    public function getRouteKeyName(): string
    {
        return 'slug';
    }

    public static function generateUniqueSlug(string $name, ?int $excludeId = null): string
    {
        $base = Str::slug($name);

        if (! $base) {
            return 'kurul-'.Str::lower(Str::random(6));
        }

        $count = 1;
        $candidate = $base;
        while (static::where('slug', $candidate)->when($excludeId, fn ($q) => $q->where('id', '!=', $excludeId))->exists()) {
            $candidate = $base.'-'.$count++;
        }

        return $candidate;
    }
}
