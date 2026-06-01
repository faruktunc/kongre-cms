<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use SolutionForest\FilamentTree\Concern\ModelTree;

class Page extends Model
{
    use HasFactory, ModelTree;

    protected $table = 'menus';

    protected $fillable = [
        'title', 'subtitle', 'content', 'gallery', 'documents', 'slug', 'parent_id', 'order', 'is_active',
    ];

    protected function casts(): array
    {
        return [
            'content' => 'array',
            'gallery' => 'array',
            'documents' => 'array',
            'is_active' => 'boolean',
            'order' => 'integer',
            'parent_id' => 'integer',
        ];
    }

    public const STATIC_PAGES = [
        [
            'id' => 1001,
            'name' => 'Kongremiz',
            'slug' => '/',
            'parentId' => 0,
            'order' => -1000,
            'isActive' => true,
        ],
        [
            'id' => 1002,
            'name' => 'Konuşmacılar',
            'slug' => 'konusmacilar',
            'parentId' => 0,
            'order' => 20,
            'isActive' => true,
        ],
        [
            'id' => 1003,
            'name' => 'Kongre Takvimi',
            'slug' => 'kongre-takvimi',
            'parentId' => 0,
            'order' => 30,
            'isActive' => true,
        ],
        [
            'id' => 1004,
            'name' => 'Kurullar',
            'slug' => 'kurullar',
            'parentId' => 0,
            'order' => 40,
            'isActive' => true,
        ],
        [
            'id' => 1005,
            'name' => 'İletişim',
            'slug' => 'iletisim',
            'parentId' => 0,
            'order' => 50,
            'isActive' => true,
        ],
    ];

    public function scopeActive(Builder $query): Builder
    {
        return $query->where('is_active', true);
    }

    public function parent()
    {
        return $this->belongsTo(self::class, 'parent_id');
    }

    public function determineTitleColumnName(): string
    {
        return 'title';
    }

    public static function staticPages(): array
    {
        return self::STATIC_PAGES;
    }

    public static function staticIds(): array
    {
        return collect(self::STATIC_PAGES)->pluck('id')->all();
    }

    public static function staticSlugs(): array
    {
        return collect(self::STATIC_PAGES)
            ->pluck('slug')
            ->filter(fn (?string $slug): bool => is_string($slug) && $slug !== '')
            ->values()
            ->all();
    }

    public function isStaticPage(): bool
    {
        return in_array($this->id, self::staticIds(), true);
    }

    public static function generateUniqueSlug(string $title, ?int $excludeId = null): string
    {
        $base = Str::slug($title);

        if (! $base) {
            return Str::lower(Str::random(8));
        }

        $exists = static::where('slug', $base)
            ->when($excludeId, fn ($q) => $q->where('id', '!=', $excludeId))
            ->exists();

        return $exists ? $base.'-'.Str::lower(Str::random(4)) : $base;
    }
}
