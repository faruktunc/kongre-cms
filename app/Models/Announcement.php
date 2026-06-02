<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Announcement extends Model
{
    /** @use HasFactory<\Database\Factories\AnnouncementFactory> */
    use HasFactory;

    protected $fillable = [
        'title', 'slug', 'subtitle', 'content', 'gallery', 'documents', 'is_active',
    ];

    protected function casts(): array
    {
        return [
            'content' => 'array',
            'gallery' => 'array',
            'documents' => 'array',
            'published_at' => 'datetime',
            'is_active' => 'boolean',
        ];
    }

    protected static function booted(): void
    {
        static::creating(function (Announcement $announcement): void {
            $announcement->published_at ??= now();
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

    public static function generateUniqueSlug(string $title, ?int $excludeId = null): string
    {
        $base = Str::slug($title);

        if (! $base) {
            return Str::lower(Str::random(8));
        }

        $exists = static::where('slug', $base)
            ->when($excludeId, fn ($query) => $query->where('id', '!=', $excludeId))
            ->exists();

        return $exists ? $base.'-'.Str::lower(Str::random(4)) : $base;
    }
}
