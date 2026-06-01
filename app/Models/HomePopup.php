<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use SolutionForest\FilamentTree\Concern\ModelTree;

class HomePopup extends Model
{
    use HasFactory, ModelTree;

    protected $fillable = [
        'title',
        'message',
        'banner_image',
        'button_label',
        'button_url',
        'parent_id',
        'order',
        'is_active',
    ];

    protected function casts(): array
    {
        return [
            'parent_id' => 'integer',
            'order' => 'integer',
            'is_active' => 'boolean',
        ];
    }

    public function scopeActive(Builder $query): Builder
    {
        return $query->where('is_active', true);
    }

    public function determineTitleColumnName(): string
    {
        return 'title';
    }
}
